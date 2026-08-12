# Luồng xử lý và Kiến trúc Hệ thống Downloads (Tải xuống tài liệu)

Tài liệu này mô tả chi tiết luồng xử lý định tuyến (Routing) và cơ chế hiển thị danh sách file PDF (Rendering) của phân hệ **Tải xuống tài liệu** trên trang Hỗ trợ của website Growatt.

---

## 1. Cấu trúc Trang & Dữ liệu
* **Trang tĩnh gốc (Pages)**: Trang chủ quản lý có URL `/ho-tro/tai-xuong/` (được thiết kế bằng Elementor và sử dụng widget `Growatt Download List`).
* **Danh mục con (Virtual Routes)**: Các đường dẫn con dạng `/ho-tro/tai-xuong/{slug-danh-muc}/` (ví dụ: `/ho-tro/tai-xuong/manual/`) là các **đường dẫn ảo**, được định tuyến động.
* **Custom Post Type & Taxonomy**:
  - CPT: `download` (quản lý tên tài liệu, đính kèm file).
  - Taxonomy: `download_category` (quản lý nhóm tài liệu: Bảng dữ liệu `datasheet`, Chứng nhận `certificate`, Hướng dẫn `manual`).
* **ACF Fields**:
  - Tên field: `download_file` (Loại file đính kèm). Đăng ký cho CPT `download`.

---

## 2. Định tuyến & Phân tích Request (Rewrite Rules)

Định tuyến được thiết lập trong tệp [functions.php](file:///d:/xampp/htdocs/bro-tu062026/wp-content/themes/bro-tu/functions.php):

### 2.1. Đăng ký biến truy vấn `download_cat`
```php
add_filter( 'query_vars', 'bro_tu_add_download_query_vars' );
function bro_tu_add_download_query_vars( $vars ) {
	$vars[] = 'download_cat';
	return $vars;
}
```

### 2.2. Ghi đè đường dẫn
```php
add_action( 'init', 'bro_tu_download_rewrite_rules' );
function bro_tu_download_rewrite_rules() {
	// Phân trang danh mục con
	add_rewrite_rule(
		'^ho-tro/tai-xuong/([^/]+)/page/([0-9]+)/?',
		'index.php?pagename=ho-tro/tai-xuong&download_cat=$matches[1]&paged=$matches[2]',
		'top'
	);
	// Danh mục con
	add_rewrite_rule(
		'^ho-tro/tai-xuong/([^/]+)/?',
		'index.php?pagename=ho-tro/tai-xuong&download_cat=$matches[1]',
		'top'
	);
}
```
*Lưu ý: Sau khi kích hoạt code, quản trị viên cần vào **Settings -> Permalinks** và bấm **Save Changes** để cập nhật bộ đệm định tuyến của WordPress.*

---

## 3. Hoạt động của Widget `Growatt Download List`

### 3.1. Truy vấn tài liệu
1. Nhận danh mục qua `get_query_var( 'download_cat' )`, nếu rỗng sẽ nhận danh mục đầu tiên làm mặc định.
2. Thực hiện `WP_Query` lấy các bài viết thuộc post type `download` lọc theo danh mục hiện tại và từ khóa tìm kiếm (`s`).

### 3.2. Hiển thị danh sách & Nút tải xuống
- **Bố cục**: Mỗi tài liệu hiển thị dạng dòng ngang (`.download-row`) có đường kẻ phân cách phía dưới.
- **Tiêu đề**: Tên tài liệu hiển thị bên trái, khi hover sẽ đổi sang màu xanh thương hiệu `#6eb92b`.
- **Nút tải**: Biểu tượng mũi tên tải xuống (SVG) đặt bên phải, trượt nhẹ xuống dưới khi hover vào dòng tài liệu.
- **Liên kết**: Trực tiếp trỏ vào URL của file PDF được upload trong ACF trường `download_file` (nếu trống sẽ nhận link demo fallback để kiểm thử).
- **Phân trang**: Phân trang dạng danh sách số tròn tinh tế ở cuối trang.
