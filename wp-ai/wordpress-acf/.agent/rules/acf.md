# Quy tắc Khung Quản lý Advanced Custom Fields (ACF Master Rule)

Tài liệu này định nghĩa các nguyên tắc cốt lõi, quy chuẩn khai báo và kiến trúc tương tác với Advanced Custom Fields (ACF) trong toàn bộ dự án.

---

## 📚 Thư Mục Quy Tắc Chi Tiết Theo Nhóm Field (Sub-Rules)
Để tối ưu hóa truy vấn và áp dụng quy tắc chính xác cho từng loại trường dữ liệu, tham chiếu đến các file quy tắc chuyên biệt trong thư mục `.agent/rules/acf-fields/`:

* 🖼️ [image.md](file:///d:/xampp/htdocs/wordpress-acf/.agent/rules/acf-fields/image.md): Quy tắc cho trường Ảnh (`image`) & Gallery (`gallery`).
* 🔁 [repeater.md](file:///d:/xampp/htdocs/wordpress-acf/.agent/rules/acf-fields/repeater.md): Quy tắc cho trường Lặp (`repeater`).
* 🧱 [flexible-content.md](file:///d:/xampp/htdocs/wordpress-acf/.agent/rules/acf-fields/flexible-content.md): Quy tắc cho trình dựng trang (`flexible_content`).
* 📝 [wysiwyg-text.md](file:///d:/xampp/htdocs/wordpress-acf/.agent/rules/acf-fields/wysiwyg-text.md): Quy tắc cho `wysiwyg`, `textarea`, `text`.
* 🔗 [relational.md](file:///d:/xampp/htdocs/wordpress-acf/.agent/rules/acf-fields/relational.md): Quy tắc cho trường Liên kết (`post_object`, `relationship`, `taxonomy`).
* 🔘 [choice-toggle.md](file:///d:/xampp/htdocs/wordpress-acf/.agent/rules/acf-fields/choice-toggle.md): Quy tắc cho trường Lựa chọn (`true_false`, `select`, `checkbox`).

---

## 1. Khai báo Local Fields qua PHP
* **Nguyên tắc**: Toàn bộ cấu hình nhóm trường (field groups) và trường dữ liệu (fields) bắt buộc phải được khai báo trực tiếp bằng mã nguồn PHP thông qua hàm `acf_add_local_field_group` trong file cấu hình chung `inc/acf-fields.php`.
* **Ranh giới**: **Không** cấu hình trực tiếp trên Database trong WP Admin. Điều này giúp dễ dàng quản lý phiên bản qua Git, tránh xung đột database khi triển khai lên môi trường staging/production.
* **Đăng ký Hàm Fallback Guard**: Để phòng ngừa lỗi Fatal Error khi plugin ACF bị vô hiệu hóa ngoài ý muốn, bắt buộc phải khai báo hàm fallback cho `get_field` và `the_field` trong file `functions.php`:
  ```php
  add_action( 'after_setup_theme', 'project_acf_fallback_functions', 20 );
  function project_acf_fallback_functions() {
      if ( ! is_admin() ) {
          if ( ! function_exists( 'get_field' ) ) {
              function get_field( $selector, $post_id = false, $format_value = true ) {
                  return false;
              }
          }
          if ( ! function_exists( 'the_field' ) ) {
              function the_field( $selector, $post_id = false, $format_value = true ) {
                  echo get_field( $selector, $post_id, $format_value );
              }
          }
      }
  }
  ```

---

## 2. Tổ chức Tab cho các Trường Cấu hình
* **Quy tắc**: Với các trang chứa nhiều trường cấu hình (như Trang chủ, Về chúng tôi, Dịch vụ, Chi tiết bài viết...), bắt buộc phải sử dụng trường loại `tab` (`'type' => 'tab'`) để phân chia cấu hình theo từng Section hiển thị trên trang. Điều này giúp giao diện quản trị trực quan, thân thiện và ngăn nắp.
* **Cấu hình tab tiêu chuẩn**:
  ```php
  array(
      'key'       => 'field_tab_[post_type_or_page]_[section_name]',
      'label'     => '[Tên Section]',
      'type'      => 'tab',
      'placement' => 'top',
      'endpoint'  => 0,
  )
  ```

---

## 3. Quy tắc Xử lý Giá trị Rỗng & Tránh Dữ liệu Mẫu (Empty Handling & No Mock Data)
* **Tuyệt đối không dùng dữ liệu mẫu tĩnh (No Mock Data)**: Cấm sử dụng nội dung tĩnh mặc định (như chữ demo, lorem ipsum, hoặc mảng mock data) làm giá trị fallback cho các trường ACF trong code PHP (ví dụ: tránh dùng `$title = get_field('title') ?: 'Tiêu đề mặc định'`).
* **Cơ chế Fallback an toàn phòng lỗi PHP 8.1+ (Safe Fallbacks)**: Mọi biến nhận từ `get_field()` hoặc `get_sub_field()` cần được gán fallback về kiểu dữ liệu rỗng an toàn (chuỗi rỗng `?: ''` cho text/url, mảng rỗng `?: array()` cho repeater/gallery/select/image) ngay lúc khai báo ở đầu file.
* **Bắt buộc kiểm tra rỗng trước khi render HTML (Empty Check)**: Toàn bộ các block layout, section, hoặc thẻ HTML bao ngoài các trường dữ liệu ACF phải được bọc trong các khối điều kiện kiểm tra dữ liệu như `if ( ! empty($variable) )`.
* **Quy tắc điều kiện hiển thị của một Section**:
  * **Section có trường đơn**: Chỉ hiển thị khi ít nhất một trong các trường thông tin cốt lõi (như Tiêu đề hoặc Mô tả) không rỗng: `if ( ! empty( $title ) || ! empty( $desc ) )`.
  * **Section dạng danh sách (Repeater, Gallery...)**: Chỉ hiển thị khi mảng dữ liệu danh sách đã nhận không rỗng: `if ( ! empty( $repeater_items ) )`.
  * **Mỗi phần tử con trong danh sách/repeater**: Bắt buộc kiểm tra trường bắt buộc cốt lõi của phần tử con (như `empty($item['image']['id'])`), sử dụng `continue` để bỏ qua các hàng rỗng.

---

## 4. Escaping & Security Standards
* **Chuỗi Text**: `esc_html( $text )`.
* **Đường dẫn URL**: `esc_url( $url )`.
* **WYSIWYG HTML**: `wp_kses_post( $content )`.
* **Hình ảnh**: `wp_get_attachment_image( $id, $size )`.
