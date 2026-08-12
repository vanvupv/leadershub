# Hướng dẫn Khắc phục & Tự động chuyển đổi Trạng thái Active cho Elementor Mega Menu (Scrollspy JS)

Khi sử dụng các liên kết cuộn trang dạng hashtag (`#id` hoặc `/products#id`) trong Elementor Mega Menu hoặc menu thông thường, Elementor mặc định **không hỗ trợ** tự động cập nhật lớp active (`e-current`) khi người dùng cuộn qua các phần hoặc click chuyển đổi giữa các tab hashtag trên cùng một trang.

Tài liệu này cung cấp giải pháp Javascript chất lượng cao, tối ưu hiệu năng bằng **`IntersectionObserver`** (thay cho sự kiện scroll gây lag giật) để tự động cập nhật trạng thái Active khi cuộn và click.

---

## 🛠️ Hướng dẫn tích hợp vào WordPress

Bạn có thể chèn đoạn code này theo 2 cách:

### Cách 1: Chèn qua Elementor Custom Code (Khuyên dùng)
1. Truy cập **Elementor ➔ Custom Code** trong trang quản trị WordPress.
2. Nhấp **Add New**, đặt tiêu đề: `Scrollspy Mega Menu Active Fix`.
3. Thiết lập: **Location** = `Body End`, **Priority** = `10`.
4. Dán đoạn code dưới đây (bao gồm thẻ `<script>`) và lưu lại, chọn điều kiện hiển thị trên toàn trang (Entire Site).

### Cách 2: Chèn qua file `functions.php` của Theme
Dán đoạn code PHP sau vào cuối tệp [functions.php](file:///d:/xampp/htdocs/bro-tu062026/wp-content/themes/bro-tu/functions.php):

```php
add_action( 'wp_footer', 'bro_tu_mega_menu_scrollspy_js', 99 );
function bro_tu_mega_menu_scrollspy_js() {
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		// 1. CHỨC NĂNG CLICK: Cập nhật active ngay lập tức khi click vào liên kết hashtag
		const navLinks = document.querySelectorAll('.elementor-nav-menu a, .cplz a');
		
		navLinks.forEach(link => {
			link.addEventListener('click', function(e) {
				const href = this.getAttribute('href');
				if (href && href.includes('#')) {
					// Lấy phần hash (ví dụ: #bien-tan-hoa-luoi)
					const targetHash = href.substring(href.indexOf('#'));
					if (targetHash === '#' || targetHash === '') return;

					// Tách các menu cùng cấp
					const menuContainer = this.closest('.elementor-nav-menu, .cplz');
					if (menuContainer) {
						// Xóa active khỏi tất cả liên kết con
						menuContainer.querySelectorAll('a').forEach(el => {
							el.classList.remove('ona', 'active');
							const parentLi = el.closest('.menu-item');
							if (parentLi) parentLi.classList.remove('current-menu-item', 'current-menu-ancestor');
						});
					}

					// Thêm active cho mục được click
					this.classList.add('ona', 'active');
					const parentLi = this.closest('.menu-item');
					if (parentLi) {
						parentLi.classList.add('current-menu-item');
					}

					// Tìm và làm nổi bật tiêu đề menu cha (Mega Menu Title)
					const parentMegaMenu = this.closest('.e-n-menu-dropdown-icon-opened, .e-n-menu-title, .cplz_a');
					if (parentMegaMenu) {
						parentMegaMenu.classList.add('e-current', 'on');
					}
				}
			});
		});

		// 2. CHỨC NĂNG SCROLLSPY (IntersectionObserver): Tự động đổi active khi cuộn màn hình
		// Tìm các section mục tiêu trên trang tương ứng với các ID trong menu
		const targetIds = [];
		navLinks.forEach(link => {
			const href = link.getAttribute('href');
			if (href && href.includes('#')) {
				const hash = href.substring(href.indexOf('#'));
				if (hash && hash !== '#' && !targetIds.includes(hash)) {
					targetIds.push(hash);
				}
			}
		});

		// Lấy các element thực tế trên trang
		const targetElements = [];
		targetIds.forEach(id => {
			try {
				const el = document.querySelector(id);
				if (el) targetElements.push(el);
			} catch (e) {
				// Bỏ qua lỗi selector không hợp lệ
			}
		});

		if (targetElements.length === 0) return;

		// Cấu hình IntersectionObserver: Kích hoạt khi section chiếm 40% diện tích viewport
		const observerOptions = {
			root: null,
			rootMargin: '-20% 0px -40% 0px',
			threshold: 0
		};

		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					const id = '#' + entry.target.getAttribute('id');
					
					// Cập nhật trạng thái active trên thanh menu
					navLinks.forEach(link => {
						const href = link.getAttribute('href');
						if (href && href.endsWith(id)) {
							// Thêm active cho link con
							link.classList.add('ona', 'active');
							const parentLi = link.closest('.menu-item');
							if (parentLi) {
								parentLi.classList.add('current-menu-item');
								
								// Thêm active cho menu cha lớn nhất trong header
								let ancestor = parentLi.parentElement.closest('.menu-item');
								if (ancestor) {
									ancestor.classList.add('current-menu-ancestor');
								}
							}

							// Cập nhật cho Elementor Mega Menu Title
							const menuTitle = link.closest('.e-n-menu-title, .cplz_a');
							if (menuTitle) {
								menuTitle.classList.add('e-current', 'on');
							}
						} else if (href && href.includes('#')) {
							// Xóa active khỏi các link không khớp
							link.classList.remove('ona', 'active');
							const parentLi = link.closest('.menu-item');
							if (parentLi) {
								parentLi.classList.remove('current-menu-item');
								// Chỉ xóa ancestor nếu không còn con nào active (sẽ được cập nhật ở vòng lặp sau nếu khớp)
								let ancestor = parentLi.parentElement.closest('.menu-item');
								if (ancestor) {
									ancestor.classList.remove('current-menu-ancestor');
								}
							}
						}
					});
				}
			});
		}, observerOptions);

		// Theo dõi các phần tử mục tiêu
		targetElements.forEach(el => observer.observe(el));
	});
	</script>
	<?php
}
```
