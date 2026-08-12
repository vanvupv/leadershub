---
trigger: always_on
---

# Quy trình Xây dựng Website WordPress Cơ bản với ACF

Tài liệu này định nghĩa các bước tuần tự và các quy tắc (Rules) bắt buộc trong quá trình phát triển một website WordPress hoàn chỉnh sử dụng ACF.

---

## Rule 1: Xây dựng Header & Footer (Thành phần chung toàn trang)
* **Mục tiêu**: Thiết lập và hoàn thiện phần khung giao diện chung xuất hiện trên toàn bộ các trang của website.
* **Quy tắc & Tiêu chuẩn**:
  * **Header**: Sử dụng hệ thống Menu mặc định của WordPress (`wp_nav_menu()` hoặc `wp_get_nav_menu_items()`) gắn vào vị trí menu `Primary`. Cho phép kéo thả, phân cấp danh mục điều hướng chuẩn WordPress Core.
  * **Footer**: Đăng ký trang cấu hình chung (ACF Options Page) thông qua hàm `acf_add_options_page()`. Toàn bộ dữ liệu footer (Mô tả, Liên kết Dịch vụ, Liên kết Công ty, Mạng xã hội, Liên kết Chính sách) bắt buộc phải cấu hình động qua trang Options này.
  * **Social Links & Menu cột trong Footer**: Bắt buộc sử dụng trường **ACF Repeater** (chứa label, url hoặc select network) để quản lý danh sách mạng xã hội và danh sách liên kết cột, tối ưu hiệu suất cơ sở dữ liệu (1 câu truy vấn meta).
  * **Không Mock Data & Kiểm tra rỗng**: Không hardcode mảng dữ liệu demo hoặc văn bản mẫu trong PHP. Bọc toàn bộ các block HTML bằng kiểm tra rỗng `if ( ! empty(...) )` để ẩn giao diện an toàn nếu admin chủ ý xóa trống dữ liệu.

---

## Rule 2: Xây dựng các Trang Tĩnh (Static Pages - Giới thiệu, Liên hệ, Trang chủ, Dịch vụ...)
* **Mục tiêu**: Xây dựng giao diện cho các trang có nội dung cố định hoặc có các Section riêng biệt được quản trị viên điền trực tiếp qua ACF.
* **Quy tắc & Tiêu chuẩn**:
  * **Tổ chức Page Template**: Đặt tên tệp theo quy ước `template-[slug].php` (ví dụ: `template-ve-chung-toi.php`, `template-dich-vu.php`).
  * **Phân chia Tab cấu hình**: Với các trang chứa nhiều Section (như Trang chủ, Giới thiệu), bắt buộc sử dụng trường ACF dạng `tab` (`'type' => 'tab'`) trong file `inc/acf-fields.php` để chia nhỏ các vùng chỉnh sửa (ví dụ: Tab Hero, Tab Đội ngũ, Tab Quy trình). Điều này giúp admin dễ thao tác và quản trị.
  * **Hiển thị có điều kiện (Visibility Check)**: Mỗi Section tĩnh trên trang phải được bao bọc bởi điều kiện kiểm tra rỗng đối với các trường thông tin cốt lõi (như Tiêu đề hoặc Mô tả). Section chỉ hiển thị ra frontend khi có ít nhất một trường dữ liệu cốt lõi đã được admin điền thực tế.

---

## Rule 3: Xây dựng các Trang Động (Dynamic Pages - Bài viết, Sản phẩm, Portfolio...)
* **Mục tiêu**: Xây dựng giao diện hiển thị danh sách (Archive) và chi tiết (Single) cho các bài viết tin tức hoặc Custom Post Types (như Portfolio, Sản phẩm, Khách hàng).
* **Quy tắc & Tiêu chuẩn**:
  * **Tổ chức Single Template**: Sử dụng cấu trúc `single-[post_type].php` (ví dụ: `single-portfolio.php` hiển thị chi tiết case study).
  * **Rewrite Slug & Path**: Đăng ký các Custom Post Type với rewrite slug ngắn gọn, dễ hiểu và thân thiện SEO qua hook `init` (ví dụ: đường dẫn chi tiết `/portfolio/chi-tiet-bai-viet`).
  * **Sử dụng đúng loại trường ACF cho Nội dung dài**:
    * Với phần nội dung chi tiết bài viết, cần nhiều định dạng phong phú (in đậm, tạo danh sách, chèn liên kết), **bắt buộc** dùng trường **WYSIWYG Editor** (`wysiwyg`), xuất trực tiếp qua hàm `wp_kses_post($content)` (không bọc qua `wpautop()` để tránh lỗi nhân đôi thẻ đoạn văn `<p>`).
    * Trường **Textarea** chỉ dùng cho tiêu đề phụ (subtitle), đoạn mô tả ngắn (short description) hoặc các khối văn bản tĩnh đơn giản.
  * **Cấu hình định dạng Ảnh**: Đối với các trường Ảnh (`image`), luôn cấu hình trả về dạng mảng (`array`) hoặc ID để tận dụng hàm tối ưu ảnh native của WordPress (`wp_get_attachment_image()`), hỗ trợ tự động tải ảnh responsive (thuộc tính `srcset` và `sizes`) tăng tốc độ tải trang.

---

## Rule 4: Quy trình Xử lý Từng Trang & Từng Section Tuần Tự (Step-by-Step Page & Section Processing Workflow)
* **Mục tiêu**: Đảm bảo luồng phát triển sản phẩm chặt chẽ, tối ưu trải nghiệm kiểm thử và giúp người dùng chủ động kiểm soát chất lượng từng phần của website.
* **Cây Quy trình Xử lý**:
  ```mermaid
  graph TD
      A[Chọn Trang Cần Phát Triển] --> B[Xử lý Section 1 từ trên xuống]
      B --> C[Đăng ký ACF Field Group & Tab tương ứng]
      C --> D[Khai báo biến & Safe Fallback rỗng ở đầu file Template]
      D --> E[Render HTML Section bọc trong kiểm tra if !empty kèm Escaping]
      E --> F[Kiểm thử & Xác nhận Section 1 Hoàn Hảo]
      F --> G[Chuyển sang Section tiếp theo của Trang]
      G --> H[Sau khi hoàn tất toàn bộ Section -> Chuyển sang Trang Tiếp Theo]
  ```
* **Quy tắc & Tiêu chuẩn**:
  1. **Tuần tự theo Cấp độ Trang (Page Level)**: Tiến hành xử lý dứt điểm từng trang một (Trang chủ ➔ Trang Dịch vụ ➔ Trang Chi tiết ➔ ...). Không xây dựng dở dang cùng lúc nhiều trang.
  2. **Tuần tự theo Cấp độ Section (Section Level)**: Trong cùng 1 trang, bắt buộc xử lý và kiểm thử dứt điểm từng **Section một** theo đúng thứ tự từ trên xuống dưới (Section 1: Hero Banner ➔ Section 2: Services ➔ Section 3: Pricing ➔ ...).
  3. **Vòng đời Xử lý cho từng Section**:
     - **Bước 1 (ACF Fields)**: Khai báo cấu hình field nhóm trong `acf-fields.php` (hoặc tài liệu `wp-ai/wordpress-acf/.agent/acf-page/[Tên trang].md`).
     - **Bước 2 (Khai báo biến)**: Đưa toàn bộ hàm lấy dữ liệu `get_field()` / `get_sub_field()` lên **đầu file Template PHP**, gán Safe Fallback rỗng (`?: ''` cho text/url, `?: array()` cho repeater/link/image).
     - **Bước 3 (Render HTML & Escape)**: Render giao diện HTML sạch bọc trong điều kiện `if ( ! empty(...) )` để chỉ hiển thị khi có dữ liệu thực tế nhập từ Admin.
     - **Bước 4 (Nghiệm thu Section)**: Tiến hành kiểm thử giao diện và tương tác của Section hiện tại cùng người dùng trước khi tiến hành viết tiếp Section kế tiếp.
