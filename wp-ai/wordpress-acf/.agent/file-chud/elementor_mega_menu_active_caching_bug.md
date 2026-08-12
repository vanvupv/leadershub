# Lỗi Caching Trạng thái Active trên Elementor Mega Menu (e-current class stuck)

Tài liệu này ghi chép nguyên nhân, cách khắc phục lỗi trạng thái active (`e-current` hoặc `current-menu-item`) bị giữ cứng (stuck) ở trang đầu tiên hoặc trang sản phẩm ngay cả khi đã điều hướng sang các trang khác (như trang Hỗ trợ, Tin tức...).

---

## 🔴 Triệu chứng lỗi (Symptoms)

* Khi người dùng truy cập trang chủ hoặc trang sản phẩm trước, menu tương ứng sáng xanh (active).
* Sau đó, khi nhấn sang trang Hỗ trợ (`/ho-tro`), menu "Sản phẩm" vẫn tiếp tục được tô sáng active và gán thuộc tính `aria-current="page"`.
* Menu không tự động chuyển đổi trạng thái active theo trang hiện tại của người dùng.

---

## 🔍 Nguyên nhân gốc rễ (Root Cause)

Lỗi này phát sinh do **tính năng Element Caching (Bộ nhớ đệm phần tử)** được giới thiệu trong các phiên bản Elementor mới:
1. Khi có người truy cập trang đầu tiên, Elementor render cấu trúc menu kèm class active (`e-current`) của trang đó.
2. Elementor tự động lưu tĩnh toàn bộ khối HTML này vào bộ nhớ đệm (Cache) để tối ưu hiệu năng cho các lượt truy cập sau.
3. Khi người dùng chuyển sang các trang khác, Elementor nạp trực tiếp HTML tĩnh đã cache ra hiển thị. Hậu quả là trạng thái active bị khóa cứng ở trang đầu tiên được cache.

---

## 🟢 Cách khắc phục lỗi (Solutions)

Có 2 cách khắc phục độc lập hoặc kết hợp dưới đây:

### Cách 1: Tắt Cache của Elementor (Đơn giản nhất)
Bạn cần vô hiệu hóa tính năng lưu cache tĩnh của widget menu để WordPress tính toán lại liên kết thực tế trên mỗi lượt truy cập:

1. **Tắt Cache toàn cục**:
   * Truy cập **Elementor ➔ Thiết lập (Settings)** trong WP-Admin.
   * Chọn tab **Tính năng (Features)**.
   * Tìm mục **Element Caching** (Bộ nhớ đệm phần tử) ➔ chuyển sang **Inactive (Không hoạt động)**.
   * Nhấp **Lưu thay đổi**.
2. **Tắt Cache riêng lẻ trong Widget**:
   * Mở Header bằng Elementor Editor.
   * Click chọn Widget Menu.
   * Chuyển sang Tab **Nâng cao (Advanced)**.
   * Tìm mục **Cache Settings** ➔ chọn **Inactive**.
   * Lưu lại trang.
3. **Xoá Cache hệ thống**: Xoá cache của các plugin tối ưu (LiteSpeed Cache, WP Rocket, W3 Total Cache...) nếu có.

---

### Cách 2: Sử dụng Javascript xử lý ở phía Client (Fallback)
Nếu dự án bắt buộc phải bật Element Caching để tăng tốc độ tải trang, bạn có thể nhúng đoạn mã script này vào footer để nó tự động sửa lại class active ngay sau khi HTML được tải từ cache:

Dán đoạn code PHP sau vào cuối tệp `functions.php`:

```php
add_action( 'wp_footer', 'bro_tu_fix_mega_menu_active_state_caching', 999 );
function bro_tu_fix_mega_menu_active_state_caching() {
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Đợi Elementor render hoàn tất HTML từ cache
		setTimeout(function() {
			var currentPath = window.location.pathname;

			// 1. Gỡ bỏ toàn bộ class active đang bị lỗi cache từ trước
			document.querySelectorAll('.e-n-menu-title, .menu-item').forEach(function(el) {
				el.classList.remove('e-current', 'current-menu-item', 'current-menu-ancestor', 'current_page_item');
			});
			document.querySelectorAll('.e-n-menu-title a').forEach(function(link) {
				link.removeAttribute('aria-current');
			});

			// 2. Tìm liên kết trùng khớp với đường dẫn hiện tại và gắn active
			document.querySelectorAll('.e-n-menu-title a, .elementor-nav-menu a').forEach(function(link) {
				var href = link.getAttribute('href');
				if (href) {
					// So sánh tương đối đường dẫn
					var linkPath = new URL(link.href, window.location.origin).pathname;
					
					// Nếu khớp path hiện tại (ví dụ: /ho-tro/ hoặc /san-pham/)
					if (linkPath === currentPath || (currentPath !== '/' && linkPath.startsWith(currentPath))) {
						// Active link này
						link.setAttribute('aria-current', 'page');
						
						// Active title hoặc container cha
						var parentTitle = link.closest('.e-n-menu-title');
						if (parentTitle) {
							parentTitle.classList.add('e-current');
						}
						
						var parentLi = link.closest('.menu-item');
						if (parentLi) {
							parentLi.classList.add('current-menu-item', 'current_page_item');
						}
					}
				}
			});
		}, 300);
	});
	</script>
	<?php
}
```
