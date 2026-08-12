# Hướng dẫn tạo trang Elementor tự động bằng PHP (Không cần kéo thả)

Tài liệu này hướng dẫn cách tạo lập trình một trang WordPress mới và cấu hình sẵn bố cục kéo thả của Elementor (Sections, Columns, Widgets) hoàn toàn bằng mã PHP. Phương pháp này rất hữu ích khi bạn muốn tạo các trang Demo mẫu cho khách hàng mà không cần thực hiện thủ công trên giao diện.

---

## 1. Cơ chế lưu trữ của Elementor

Khi một trang được xây dựng bằng Elementor, dữ liệu cấu trúc và thiết kế không nằm trong `post_content` thông thường của WordPress mà được lưu trữ dưới dạng các **Post Meta** trong cơ sở dữ liệu:

* `_elementor_edit_mode` = `'builder'` (Thông báo cho WordPress chuyển hướng sang Elementor Editor thay vì Block Editor).
* `_elementor_template_type` = `'page'` (Khai báo loại layout là trang).
* `_elementor_version` = Phiên bản Elementor đang chạy (Ví dụ: `3.20.0`).
* `_elementor_data` = Chuỗi **JSON** chứa cấu trúc cây phân cấp của trang.

### Cấu trúc JSON của `_elementor_data`

Dữ liệu JSON là một mảng tuần tự chứa các Section, mỗi Section chứa Column, mỗi Column chứa các Widget:

```json
[
  {
    "id": "7-char-id",
    "elType": "section",
    "settings": {},
    "elements": [
      {
        "id": "7-char-id",
        "elType": "column",
        "settings": {
          "_column_size": 100
        },
        "elements": [
          {
            "id": "7-char-id",
            "elType": "widget",
            "widgetType": "tên-widget",
            "settings": {
              "tham_so_1": "giá trị 1"
            },
            "elements": []
          }
        ]
      }
    ]
  }
]
```

* **Yêu cầu quan trọng**: Mỗi phần tử (Section, Column, Widget) bắt buộc phải có thuộc tính `id` dài đúng **7 ký tự** ngẫu nhiên (chứa chữ và số viết thường). Elementor sử dụng ID này để làm CSS selectors định dạng riêng cho từng phần tử.

---

## 2. Mã PHP mẫu tạo trang Elementor tự động

Dưới đây là tệp tin mã nguồn PHP hoàn chỉnh giúp tạo trang **"Trang Demo Growatt"** gồm **1 Section chia thành 3 Cột**, mỗi cột chứa sẵn widget tùy chỉnh `growatt-product-card`.

Bạn có thể tạo file `create-elementor-page.php` ở gốc thư mục WordPress trên hosting của mình, dán đoạn mã này vào và chạy qua trình duyệt: `https://ten-mien-cua-ban.com/create-elementor-page.php`.

```php
<?php
/**
 * Script khởi tạo trang Elementor tự động bằng PHP.
 * Tự động xóa file sau khi chạy để đảm bảo an toàn.
 */

// 1. Nạp WordPress
if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( 'Không tìm thấy file wp-load.php.' );
}
require_once __DIR__ . '/wp-load.php';

// Bảo mật: Chỉ cho phép Admin chạy
if ( ! current_user_can( 'manage_options' ) ) {
	wp_die( 'Bạn cần đăng nhập tài khoản Admin để thực hiện hành động này.' );
}

/**
 * Hàm tạo ID ngẫu nhiên 7 ký tự thập lục phân theo tiêu chuẩn Elementor
 */
function generate_elementor_element_id() {
	return substr( md5( uniqid( rand(), true ) ), 0, 7 );
}

// 2. Định nghĩa cấu trúc Layout JSON
$section_id  = generate_elementor_element_id();
$col_1_id    = generate_elementor_element_id();
$col_2_id    = generate_elementor_element_id();
$col_3_id    = generate_elementor_element_id();

$widget_1_id = generate_elementor_element_id();
$widget_2_id = generate_elementor_element_id();
$widget_3_id = generate_elementor_element_id();

$elementor_layout = [
	[
		'id'       => $section_id,
		'elType'   => 'section',
		'settings' => [
			'structure' => '30', // Cấu trúc 3 cột bằng nhau
		],
		'elements' => [
			// Cột 1 (Rộng 33.33%)
			[
				'id'       => $col_1_id,
				'elType'   => 'column',
				'settings' => [
					'_column_size' => 33,
				],
				'elements' => [
					[
						'id'         => $widget_1_id,
						'elType'     => 'widget',
						'widgetType' => 'growatt-product-card',
						'settings'   => [
							'acf_key_1'   => 'cong_suat',
							'acf_key_2'   => 'mppt',
							'acf_key_3'   => 'pha',
							'button_text' => 'Xem chi tiết sản phẩm 1',
						],
						'elements'   => [],
					]
				],
			],
			// Cột 2 (Rộng 33.33%)
			[
				'id'       => $col_2_id,
				'elType'   => 'column',
				'settings' => [
					'_column_size' => 33,
				],
				'elements' => [
					[
						'id'         => $widget_2_id,
						'elType'     => 'widget',
						'widgetType' => 'growatt-product-card',
						'settings'   => [
							'acf_key_1'   => 'cong_suat',
							'acf_key_2'   => 'mppt',
							'acf_key_3'   => 'pha',
							'button_text' => 'Xem chi tiết sản phẩm 2',
						],
						'elements'   => [],
					]
				],
			],
			// Cột 3 (Rộng 33.33%)
			[
				'id'       => $col_3_id,
				'elType'   => 'column',
				'settings' => [
					'_column_size' => 33,
				],
				'elements' => [
					[
						'id'         => $widget_3_id,
						'elType'     => 'widget',
						'widgetType' => 'growatt-product-card',
						'settings'   => [
							'acf_key_1'   => 'cong_suat',
							'acf_key_2'   => 'mppt',
							'acf_key_3'   => 'pha',
							'button_text' => 'Xem chi tiết sản phẩm 3',
						],
						'elements'   => [],
					]
				],
			],
		],
	]
];

// Chuyển mảng thành chuỗi JSON không bị escape ký tự unicode/slash
$elementor_data_json = wp_slash( wp_json_encode( $elementor_layout ) );

// 3. Tạo trang WordPress mới
$new_page_args = [
	'post_title'   => 'Trang Sản Phẩm Mẫu Growatt',
	'post_content' => '', // Elementor không sử dụng post_content
	'post_status'  => 'draft', // Lưu nháp (Hoặc 'publish' để công khai trực tiếp)
	'post_type'    => 'page',
];

$page_id = wp_insert_post( $new_page_args );

if ( ! is_wp_error( $page_id ) && $page_id > 0 ) {
	// 4. Thiết lập các Meta Fields của Elementor
	update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
	update_post_meta( $page_id, '_elementor_template_type', 'page' );
	update_post_meta( $page_id, '_elementor_data', $elementor_data_json );
	
	// Lấy phiên bản Elementor hiện tại để đồng bộ
	if ( defined( 'ELEMENTOR_VERSION' ) ) {
		update_post_meta( $page_id, '_elementor_version', ELEMENTOR_VERSION );
	} else {
		update_post_meta( $page_id, '_elementor_version', '3.20.0' );
	}

	echo "<h3>🎉 Tạo trang thành công!</h3>";
	echo "ID Trang mới: <strong>{$page_id}</strong><br>";
	echo "Link sửa bằng Elementor: <a href='" . admin_url( "post.php?post={$page_id}&action=elementor" ) . "' target='_blank'>Nhấp vào đây để xem và sửa trang</a><br><br>";
} else {
	wp_die( 'Lỗi khởi tạo trang mới: ' . $page_id->get_error_message() );
}

// 5. Tự hủy file script để đảm bảo bảo mật
if ( unlink( __FILE__ ) ) {
	echo "<p style='color: green;'>🛡️ Kịch bản đã tự động xóa tệp <code>" . basename(__FILE__) . "</code> khỏi server để bảo mật.</p>";
} else {
	echo "<p style='color: orange;'>⚠️ Vui lòng xóa file <code>" . basename(__FILE__) . "</code> thủ công trên host ngay lập tức.</p>";
}
```

---

## 3. Cách tùy chỉnh và mở rộng

Nếu muốn thiết kế các khối phức tạp hơn, cách tốt nhất là:
1. Bạn tự tạo một trang mẫu bằng kéo thả Elementor trên môi trường Local.
2. Sử dụng lệnh PHP để truy vấn và in ra chuỗi JSON của trang đó:
   ```php
   echo get_post_meta( $your_page_id, '_elementor_data', true );
   ```
3. Copy chuỗi JSON đó và đặt vào kịch bản import tự động của bạn.
