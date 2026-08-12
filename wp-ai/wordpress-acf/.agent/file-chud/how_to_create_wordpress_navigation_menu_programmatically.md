# Hướng dẫn tạo và sắp xếp WordPress Navigation Menu tự động bằng PHP (Custom Link /products#ID)

Tài liệu này cung cấp mã nguồn kịch bản PHP chạy trực tiếp trên hosting giúp khởi tạo một **Menu WordPress mới** (hiển thị trong Giao diện -> Menu) và tự động liên kết các danh mục sản phẩm thành các **Custom Link dạng đường dẫn kèm anchor (ví dụ: `/products#ev-charger`)** để hỗ trợ việc cuộn mượt khi đang ở trang sản phẩm, hoặc điều hướng trực tiếp về trang sản phẩm rồi cuộn khi click từ các trang khác (như Trang chủ, Giới thiệu...).

---

## 🚀 Hướng dẫn thực hiện trên Hosting

1. **Tạo file**: Tạo tệp tin `create-wp-menu.php` ở gốc thư mục WordPress trên hosting của bạn.
2. **Dán mã nguồn**: Copy toàn bộ nội dung file PHP ở mục dưới đây và dán vào tệp tin.
3. **Thực thi**: Đăng nhập Admin rồi truy cập đường dẫn: `https://ten-mien-cua-ban.com/create-wp-menu.php?key=growatt_setup`.
   * *Hệ thống sẽ tự động tạo Menu tên là **"Menu Sản Phẩm Growatt"**, liên kết chính xác các danh mục vào cấu trúc cha-con dưới dạng `/products#id`.*
   * *File sẽ tự động xóa ngay lập tức sau khi hoàn tất để bảo mật.*

---

## 📄 Mã nguồn File `create-wp-menu.php`

```php
<?php
/**
 * TỰ ĐỘNG TẠO MENU WORDPRESS TỪ DANH MỤC SẢN PHẨM CÓ SẴN (DẠNG BASE_URL#ID)
 * Chạy trực tiếp trên trình duyệt. Tự động xóa file sau khi chạy để bảo mật.
 */

// 1. Nạp môi trường WordPress
if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( 'Không tìm thấy file wp-load.php. Vui lòng đặt file này ở thư mục gốc chứa WordPress.' );
}
require_once __DIR__ . '/wp-load.php';

// 2. Bảo mật: Chỉ cho phép Admin chạy (hoặc dùng key)
$secret_key = 'growatt_setup';
if ( ! isset( $_GET['key'] ) || $_GET['key'] !== $secret_key ) {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Bạn cần đăng nhập quyền Admin hoặc điền tham số ?key=' . $secret_key . ' để thực thi.' );
	}
}

// CẤU HÌNH ĐƯỜNG DẪN CƠ SỞ (BASE URL):
// Điền đường dẫn trang sản phẩm của bạn (ví dụ: '/products' hoặc '/san-pham' hoặc 'https://domain.com/products')
// Để trống '' nếu bạn chỉ muốn sử dụng hashtag thuần dạng '#id'
$base_url = '/products';

// 3. Lấy tất cả danh mục sản phẩm đang có sẵn trong database
$taxonomy = 'product_cat';
$terms = get_terms( [
	'taxonomy'   => $taxonomy,
	'hide_empty' => false,
	'orderby'    => 'id',
	'order'      => 'ASC',
] );

if ( is_wp_error( $terms ) || empty( $terms ) ) {
	wp_die( 'Không tìm thấy danh mục sản phẩm nào trong database.' );
}

// 4. Tạo hoặc dọn dẹp Menu
$menu_name = 'Menu Sản Phẩm Growatt';
$menu_exists = wp_get_nav_menu_object( $menu_name );

if ( ! $menu_exists ) {
	$menu_id = wp_create_nav_menu( $menu_name );
} else {
	$menu_id = $menu_exists->term_id;
	// Xóa các menu item cũ để tạo lại mới hoàn toàn sạch sẽ
	$old_items = wp_get_nav_menu_items( $menu_id );
	if ( ! empty( $old_items ) ) {
		foreach ( $old_items as $item ) {
			wp_delete_post( $item->ID, true );
		}
	}
}

// 5. Thuật toán phân cấp: Sắp xếp terms theo cấu trúc cha-con
$terms_by_parent = [];
foreach ( $terms as $term ) {
	$terms_by_parent[ $term->parent ][] = $term;
}

// Map lưu trữ: term_id => menu_item_db_id
$term_to_menu_map = [];

?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Tự động tạo Menu Custom Link từ Danh mục có sẵn</title>
	<style>
		body { font-family: sans-serif; background: #f0f2f5; padding: 40px 20px; }
		.container { max-width: 700px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
		h2 { color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px; margin-top: 0; }
		.log { background: #f8fafc; border: 1px solid #e2e8f0; padding: 15px; border-radius: 6px; font-family: monospace; font-size: 13px; max-height: 400px; overflow-y: auto; }
		.success { color: #1d4ed8; font-weight: bold; }
		.alert { background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; padding: 12px; border-radius: 6px; margin-top: 20px; }
	</style>
</head>
<body>
<div class="container">
	<h2>Tự động tạo Menu từ danh mục sản phẩm dưới dạng đường dẫn kèm #ID</h2>
	<div class="log">
		<?php
		// Đệ quy để thêm các mục vào menu giữ nguyên cấp bậc cha-con dưới dạng Custom Link với base_url prefix
		function build_menu_from_terms( $parent_id, $parent_menu_item_id, $terms_by_parent, &$term_to_menu_map, $menu_id, $depth = 0 ) {
			global $base_url;
			if ( ! isset( $terms_by_parent[ $parent_id ] ) ) {
				return;
			}
			$indent = str_repeat( '&nbsp;&nbsp;&nbsp;&nbsp;', $depth );
			foreach ( $terms_by_parent[ $parent_id ] as $term ) {
				// CÁCH 1 (Mặc định & Khuyên dùng): Lấy trực tiếp slug không dấu của danh mục trong DB (ví dụ: #bien-tan-hoa-luoi)
				// Cách này an toàn nhất và khớp với cách code template động trong WordPress.
				$anchor_url = $base_url . '#' . $term->slug;

				// CÁCH 2 (Nếu các section của bạn đang hardcode ID tiếng Việt có dấu, hãy bỏ comment dòng bên dưới):
				/*
				$anchor_slug = mb_strtolower( $term->name, 'UTF-8' );
				$anchor_slug = preg_replace( '/\s+/u', '-', $anchor_slug );
				$anchor_slug = preg_replace( '/-+/', '-', $anchor_slug );
				$anchor_slug = trim( $anchor_slug, '-' );
				$anchor_url  = $base_url . '#' . $anchor_slug;
				*/

				$menu_item_data = [
					'menu-item-type'      => 'custom',
					'menu-item-url'       => $anchor_url,
					'menu-item-title'     => $term->name,
					'menu-item-status'    => 'publish',
					'menu-item-parent-id' => $parent_menu_item_id,
				];

				$menu_item_db_id = wp_update_nav_menu_item( $menu_id, 0, $menu_item_data );
				$term_to_menu_map[ $term->term_id ] = $menu_item_db_id;

				if ( $depth === 0 ) {
					echo "<div>📁 <span class='success'>Đã thêm mục cha:</span> <strong>{$term->name}</strong> -> Link: <code>{$anchor_url}</code> (Menu Item ID: {$menu_item_db_id})</div>";
				} else {
					echo "<div>{$indent}📄 Đã thêm mục con: {$term->name} -> Link: <code>{$anchor_url}</code> (Menu Item ID: {$menu_item_db_id})</div>";
				}

				// Tiếp tục đệ quy cho các danh mục con của danh mục hiện tại
				build_menu_from_terms( $term->term_id, $menu_item_db_id, $terms_by_parent, $term_to_menu_map, $menu_id, $depth + 1 );
			}
		}

		build_menu_from_terms( 0, 0, $terms_by_parent, $term_to_menu_map, $menu_id );
		?>
	</div>
	<?php
	// 6. Tự hủy file script để đảm bảo bảo mật cho Hosting
	if ( unlink( __FILE__ ) ) {
		echo '<div class="alert">🛡️ File <code>create-wp-menu.php</code> đã được tự động xóa khỏi host để bảo mật!</div>';
	}
	?>
</div>
</body>
</html>
```

---

## ⚙️ Hướng dẫn quản trị Menu trong WordPress Dashboard (Sau khi chạy)

Các mục menu sẽ được tạo lập dưới dạng **Liên kết tự chọn (Custom Links)**. Nhờ đó, bạn hoặc khách hàng có thể quản trị dễ dàng:

1. **Vào trang quản lý**: Truy cập **Giao diện ➔ Menu** (Appearance ➔ Menus) trong trang Admin.
2. **Chọn Menu**: Chọn đúng menu **"Menu Sản Phẩm Growatt"** ở phần lựa chọn menu cần chỉnh sửa.
3. **Chỉnh sửa URL / Tên hiển thị**:
   * Nhấp chuột vào nút mũi tên xuống bên phải của bất kỳ mục menu nào để mở rộng tuỳ chỉnh.
   * **Đổi link**: Chỉnh sửa ô **URL** (ví dụ: đổi `/products#ev-charger` sang bất cứ link mong muốn nào).
   * **Đổi tên hiển thị**: Chỉnh sửa ô **Nhãn điều hướng** (Navigation Label) nếu muốn tên hiển thị khác đi so với tên danh mục sản phẩm gốc.
4. **Thay đổi phân cấp**: Kéo thả dịch chuyển sang trái/phải để thiết lập cấp cha con theo ý muốn.
5. **Lưu lại**: Nhấn nút **Lưu Menu** để áp dụng thay đổi ra ngoài trang chủ.

---

## 🛠️ Giải quyết lỗi Tự đóng của Elementor Nav Menu mặc định (Accordion Fix)

Khi bạn sử dụng Widget **Nav Menu mặc định của Elementor** hoặc **Menu của WordPress** để làm menu điều hướng dọc (sidebar), Elementor có cơ chế tự động đóng (collapse) toàn bộ menu khi click vào một liên kết hashtag (nhằm phục vụ menu mobile).

Để biến Menu mặc định này thành một **Accordion thực thụ** (click cha mở ra, click lại lần nữa đóng lại, click cha khác thì đóng các mục còn lại và không bị tự đóng khi click con):

1. **Cơ chế hoạt động**:
   * Đoạn mã jQuery đã được tích hợp tự động vào footer của theme (`functions.php`) thông qua hook `wp_footer`.
   * Sử dụng lệnh `e.stopPropagation()` để chặn không cho sự kiện click nổi bọt lên Elementor, loại bỏ hoàn toàn tính năng tự động đóng (auto-collapse) lỗi của Elementor.
   * Sử dụng hàm `slideToggle()` để đóng mở mượt mà và thêm class `.active-accordion` để quản lý trạng thái.
2. **Đối tượng áp dụng**:
   * Áp dụng chính xác cho Widget Nav Menu của Elementor được bạn gán CSS ID là **`menu-cat-main`** (trong phần nâng cao của Widget).
   * Đoạn script tự động kiểm tra xem ID này được gán cho thẻ bao ngoài (Widget container) hay gán trực tiếp cho thẻ `ul` bên trong để áp dụng chính xác hiệu ứng.
   * Cách này đảm bảo tính đóng gói an toàn và không gây ảnh hưởng đến bất kỳ menu ngang nào khác trên Header của website.


