# Nhánh Dự án: Growatt (Phân hệ Tin tức & Giải pháp)

Tài liệu này định nghĩa cấu trúc, quy tắc phát triển và các yêu cầu kỹ thuật riêng cho phân hệ **Growatt** trong dự án, trọng tâm là xây dựng trang **Tin tức** (Archive & Single).

---

## 1. Tổng quan Phân hệ Growatt
* **Tên phân hệ**: growat (Growatt)
* **Mục tiêu**: Xây dựng trang danh sách tin tức (Archive) và trang chi tiết tin tức (Single) đồng bộ giao diện với trang Giải pháp của Growatt (sử dụng tông màu xanh lá đặc trưng `#6eb92b` và Bootstrap 5).
* **Đặc tính kỹ thuật**:
  * Động hóa dữ liệu qua ACF (Advanced Custom Fields).
  * Enqueue CSS/JS riêng tối ưu hóa tốc độ tải trang.
  * Đảm bảo tính an toàn dữ liệu và Responsive trên mọi thiết bị.
* **Tài liệu liên quan**:
  * [Luồng Xử lý Tìm kiếm & Đồng bộ Đường dẫn](file:///d:/xampp/htdocs/bro-tu062026/.agent/growat_news_search_flow.md)

---

## 2. Đặc tả các trang trong phân hệ Tin tức

### A. Trang Danh sách Tin tức (Archive / Blog Page)
* **Template**: Sử dụng file `home.php` hoặc `archive.php` (hoặc Page Template `template-tin-tuc.php` tùy thuộc vào cấu hình trang Bài viết của WordPress).
* **Giao diện & Bố cục**:
  * **Hero Banner**: Tiêu đề trang "Tin tức & Sự kiện" kèm ảnh nền cấu hình qua ACF.
  * **Bài viết nổi bật (Featured Post)**: Hiển thị bài viết mới nhất hoặc nổi bật với kích thước lớn ở trên cùng.
  * **Lưới bài viết (Grid Feed)**: Bố cục lưới 3 cột (dùng Bootstrap 5 `row-cols-md-3 row-cols-1 g-4`).
  * **Mỗi Card bài viết gồm**:
    * Ảnh đại diện (Thumbnail) có hover zoom effect.
    * Ngày đăng bài viết (`get_the_date()`).
    * Danh mục chuyên mục bài viết (`get_the_category()`).
    * Tiêu đề bài viết ngắn gọn (`the_title()`).
    * Đoạn trích dẫn ngắn (`the_excerpt()` hoặc custom excerpt từ ACF).
    * Nút "Xem chi tiết" với hiệu ứng hover đổi màu nền.
  * **Phân trang (Pagination)**: Dùng `the_posts_pagination()` cách điệu đẹp mắt.
  * **Sidebar**: Bộ lọc chuyên mục, bài viết xem nhiều, bài viết mới nhất.

### B. Trang Chi tiết Tin tức (Single Post Page)
* **Template**: Sử dụng file `single.php` hoặc `single-post.php`.
* **Giao diện & Bố cục**:
  * **Đầu trang (Entry Header)**: Tiêu đề bài viết lớn, thông tin meta (Ngày đăng, chuyên mục, tác giả).
  * **Nội dung chính (Entry Content)**:
    * Sử dụng editor chuẩn hoặc WYSIWYG Editor ACF, xuất ra qua `wp_kses_post()`.
    * Styling chuẩn cho các thẻ HTML nội dung (`h2`, `h3`, `p`, `img`, `ul`, `ol`, `blockquote`).
  * **Chức năng chia sẻ mạng xã hội** (Facebook, LinkedIn, Zalo).
  * **Bài viết liên quan (Related Posts)**: Khối 3 bài viết cùng chuyên mục ở cuối trang.

---

## 3. Cấu hình ACF Fields đề xuất (Phân hệ Tin tức)

### Group: Cấu hình Trang Tin tức (Áp dụng cho Page Template hoặc Options Page)
* **Mục tiêu**: Quản lý banner và các cài đặt chung cho trang tin tức.
* **Các trường**:
  * `news_banner_image` (Image): Ảnh nền banner đầu trang.
  * `news_banner_title` (Text): Tiêu đề banner (mặc định: "Tin tức & Sự kiện").
  * `news_banner_desc` (Textarea): Mô tả ngắn dưới tiêu đề.

### Group: Cấu hình Bài viết (Áp dụng cho Post)
* **Mục tiêu**: Bổ sung các trường thông tin đặc thù cho tin tức Growatt nếu editor mặc định chưa đủ.
* **Các trường**:
  * `post_author_title` (Text): Chức danh tác giả (ví dụ: Chuyên gia năng lượng).
  * `post_estimated_reading_time` (Number): Thời gian đọc ước tính (phút).

---

## 4. Quy ước Đặt tên & Tổ chức Assets
* **CSS File**: `assets/css/tin-tuc.css` (lưu trữ stylesheet riêng của tin tức, được biên dịch từ SASS nếu có).
* **JS File**: `js/tin-tuc.js` (xử lý hiệu ứng động, bộ lọc ajax nếu có).
* **WordPress Enqueue Handle**:
  * Style: `bro-tu-tin-tuc-style`
  * Script: `bro-tu-tin-tuc-script`
