# Hướng dẫn nhập nhanh danh mục sản phẩm WooCommerce trên Hosting

Tài liệu này cung cấp mã nguồn kịch bản PHP chạy trực tiếp trên trình duyệt giúp bạn khởi tạo nhanh chóng và chính xác toàn bộ cấu trúc danh mục sản phẩm phân cấp trên hosting dự án thực tế.

---

## 🚀 Hướng dẫn 3 bước thực hiện trên Hosting

1. **Tạo file**: Tạo một tệp tin tên là `import-categories.php` ở ngay thư mục gốc chứa mã nguồn WordPress trên hosting của bạn (thư mục có chứa các file `wp-config.php`, `wp-load.php`, `wp-content`...).
2. **Dán mã nguồn**: Copy toàn bộ nội dung file PHP ở mục dưới đây và dán vào tệp `import-categories.php` vừa tạo.
3. **Thực thi**: Mở trình duyệt web và truy cập đường dẫn: `https://ten-mien-cua-ban.com/import-categories.php`.
   * *Hệ thống sẽ chạy và in ra bảng báo cáo danh mục thành công trực quan.*
   * *Kịch bản được tích hợp tính năng **Tự hủy (Self-Destruct)** - File sẽ tự động xóa ngay lập tức khỏi hosting sau khi chạy xong để đảm bảo tuyệt đối an toàn bảo mật.*

---

## 📄 Mã nguồn File `import-categories.php`

```php
<?php
/**
 * Script import nhanh danh mục sản phẩm WooCommerce (product_cat) phân cấp.
 * Hỗ trợ tự động đăng ký tạm thời taxonomy nếu WooCommerce chưa kích hoạt.
 * Tự động xóa chính nó sau khi hoàn tất để bảo mật.
 */

// 1. Nạp môi trường WordPress
if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( 'Không tìm thấy file wp-load.php. Vui lòng đặt file này ở thư mục gốc chứa WordPress.' );
}
require_once __DIR__ . '/wp-load.php';

// 2. Chỉ cho phép Administrator chạy (nếu đã đăng nhập) hoặc chạy trực tiếp bằng URL bảo mật
// Bạn có thể đổi khóa này để tăng tính bảo mật
$secret_key = 'growatt_import_cats';
if ( ! isset( $_GET['key'] ) || $_GET['key'] !== $secret_key ) {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Bạn không có quyền truy cập trang này hoặc thiếu khóa bảo mật. Vui lòng đăng nhập quyền Admin hoặc điền tham số ?key=' . $secret_key );
	}
}

// 3. Đăng ký tạm thời CPT và Taxonomy nếu WooCommerce chưa kích hoạt trên hosting
if ( ! post_type_exists( 'product' ) ) {
	register_post_type( 'product', [ 'public' => true ] );
}
if ( ! taxonomy_exists( 'product_cat' ) ) {
	register_taxonomy( 'product_cat', 'product', [ 'hierarchical' => true ] );
}

// 4. Mảng dữ liệu phân cấp danh mục
$categories = [
	'Biến tần hòa lưới' => [
		'Biến tần hòa lưới dân dụng',
		'Biến tần hòa lưới Thương Mại & Công Nghiệp',
		'Biến tần hòa lưới quy mô lớn',
	],
	'LƯU TRỮ NĂNG LƯỢNG' => [
		'Biến tần cổng chờ sẵn ắcquy',
		'Biến tần Hybrid' => [
			'Hybrid 1 pha',
			'Hybrid 3 pha',
		],
		'Biến tần AC-couple',
		'Biến tần lưu trữ Off-grid' => [
			'Off-grid 1 pha',
			'Biến tần bơm nước',
		],
		'Hệ thống ắcquy' => [
			'Ắcquy điện áp thấp dân dụng',
			'Ắcquy điện áp cao dân dụng',
		],
		'Phụ kiện ESS',
	],
	'Bộ sạc xe điện' => [
		'Bộ Sạc Xe Điện AC',
		'Bộ Sạc Xe Điện DC',
	],
	'Quản Lý Năng Lượng Thông Minh' => [
		'Giám sát',
		'GroHome',
		'Phụ Kiện',
	],
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Khởi tạo Danh mục Sản phẩm Growatt</title>
	<style>
		body {
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
			background-color: #f0f2f5;
			color: #1e293b;
			padding: 40px 20px;
			margin: 0;
		}
		.container {
			max-width: 800px;
			margin: 0 auto;
			background: #ffffff;
			border-radius: 12px;
			box-shadow: 0 10px 25px rgba(0,0,0,0.05);
			padding: 30px;
		}
		h2 {
			color: #0f172a;
			border-bottom: 2px solid #e2e8f0;
			padding-bottom: 15px;
			margin-top: 0;
			display: flex;
			align-items: center;
			gap: 10px;
		}
		.log-list {
			background: #f8fafc;
			border: 1px solid #e2e8f0;
			border-radius: 8px;
			padding: 15px 20px;
			max-height: 400px;
			overflow-y: auto;
			font-family: "SFMono-Regular", Consolas, "Liberation Mono", Menlo, monospace;
			font-size: 13px;
			line-height: 1.6;
			margin-bottom: 25px;
		}
		.log-item {
			margin-bottom: 6px;
			padding-bottom: 6px;
			border-bottom: 1px dashed #f1f5f9;
		}
		.success { color: #16a34a; font-weight: bold; }
		.exists { color: #475569; }
		.error { color: #dc2626; font-weight: bold; }
		.alert {
			border-radius: 8px;
			padding: 15px;
			font-size: 14px;
			line-height: 1.5;
			margin-top: 20px;
		}
		.alert-success {
			background-color: #f0fdf4;
			border: 1px solid #bbf7d0;
			color: #15803d;
		}
		.alert-warning {
			background-color: #fffbeb;
			border: 1px solid #fef08a;
			color: #a16207;
		}
		.btn {
			display: inline-block;
			background: #2563eb;
			color: #ffffff;
			padding: 10px 20px;
			border-radius: 6px;
			text-decoration: none;
			font-weight: 600;
			font-size: 14px;
			transition: background 0.2s;
		}
		.btn:hover { background: #1d4ed8; }
	</style>
</head>
<body>
<div class="container">
	<h2>📦 Báo cáo tiến trình nhập danh mục sản phẩm</h2>
	<div class="log-list">
		<?php
		function import_product_cats_web( $items, $parent_id = 0, $depth = 0 ) {
			foreach ( $items as $key => $value ) {
				$indent = str_repeat( '&nbsp;&nbsp;&nbsp;&nbsp;', $depth );
				if ( is_array( $value ) ) {
					$term_name = $key;
					$term = term_exists( $term_name, 'product_cat', $parent_id );
					if ( ! $term ) {
						$inserted = wp_insert_term( $term_name, 'product_cat', [ 'parent' => $parent_id ] );
						if ( ! is_wp_error( $inserted ) ) {
							$current_parent_id = $inserted['term_id'];
							echo "<div class='log-item'>{$indent}➕ <span class='success'>Đã tạo mục cha:</span> {$term_name} (ID: {$current_parent_id})</div>";
						} else {
							echo "<div class='log-item error'>{$indent}❌ Lỗi tạo mục {$term_name}: " . $inserted->get_error_message() . "</div>";
							continue;
						}
					} else {
						$current_parent_id = is_array( $term ) ? $term['term_id'] : $term;
						echo "<div class='log-item exists'>{$indent}➖ {$term_name} đã tồn tại (ID: {$current_parent_id})</div>";
					}
					import_product_cats_web( $value, $current_parent_id, $depth + 1 );
				} else {
					$term_name = $value;
					$term = term_exists( $term_name, 'product_cat', $parent_id );
					if ( ! $term ) {
						$inserted = wp_insert_term( $term_name, 'product_cat', [ 'parent' => $parent_id ] );
						if ( ! is_wp_error( $inserted ) ) {
							echo "<div class='log-item'>{$indent}➕ <span class='success'>Đã tạo:</span> {$term_name} (ID: {$inserted['term_id']})</div>";
						} else {
							echo "<div class='log-item error'>{$indent}❌ Lỗi tạo {$term_name}: " . $inserted->get_error_message() . "</div>";
						}
					} else {
						$term_id = is_array( $term ) ? $term['term_id'] : $term;
						echo "<div class='log-item exists'>{$indent}➖ {$term_name} đã tồn tại (ID: {$term_id})</div>";
					}
				}
				flush(); // Đẩy output ra màn hình liên tục
			}
		}

		import_product_cats_web( $categories );
		?>
	</div>

	<?php
	// 5. Tự hủy file script để đảm bảo bảo mật cho Hosting
	$file_path = __FILE__;
	if ( unlink( $file_path ) ) {
		echo '<div class="alert alert-success">🛡️ <strong>BẢO MẬT:</strong> Tệp tin <code>import-categories.php</code> đã tự động xóa vĩnh viễn khỏi hosting của bạn sau khi import thành công để ngăn chặn việc kẻ xấu khai thác chạy lại.</div>';
	} else {
		echo '<div class="alert alert-warning">⚠️ <strong>CẢNH BÁO:</strong> Không thể tự động xóa file. Vui lòng dùng FTP hoặc File Manager trên Hosting để xóa tệp tin <code>import-categories.php</code> thủ công ngay lập tức để tránh lộ thông tin.</div>';
	}
	?>
	<div style="margin-top: 25px; text-align: right;">
		<a href="/wp-admin/edit-tags.php?taxonomy=product_cat&post_type=product" class="btn">Đi tới Danh mục Sản phẩm →</a>
	</div>
</div>
</body>
</html>
```
