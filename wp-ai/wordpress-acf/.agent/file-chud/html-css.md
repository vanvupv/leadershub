# Quy tắc HTML/CSS & Layout

Tài liệu này định nghĩa các nguyên tắc xây dựng giao diện HTML, tích hợp Tailwind CSS và quản lý các tệp stylesheet trong dự án.

---

## 1. Tận dụng Tailwind CSS & CSS Utility
* **Class tiện ích**: Tận dụng tối đa các class tiện ích của Tailwind CSS có sẵn trong `assets/css/main.css` để đảm bảo tốc độ tải trang nhanh và tính nhất quán về kích thước (spacing), màu sắc (colors) và typography.
* **Tối ưu hóa SCSS**: Mã nguồn SCSS chính nằm ở `assets/scss/main.scss`. Khi chỉnh sửa các styles chung, phải tiến hành sửa trong file SCSS này và compile lại thành `assets/css/main.css` thông qua lệnh:
  ```bash
  npm run compile:css
  ```

---

## 2. Stylesheet Đặc thù theo Trang (Split CSS)
* **Quy tắc**: Với các trang có styles đặc thù lớn (ví dụ: Trang chi tiết bài viết, Trang chủ, Về chúng tôi), không chèn đè tất cả CSS vào file `main.css` chung để tránh phình to dung lượng file CSS toàn trang.
* **Xử lý**:
  * Các style tĩnh đặc trưng của trang đó sẽ được lưu riêng thành tệp `assets/css/[page-name].css` (ví dụ: `chi-tiet-portfolio.css`).
  * Chỉ enqueue tệp CSS trang đó khi người dùng truy cập đúng template tương ứng bằng các hàm kiểm tra điều kiện trong `functions.php` (như `is_page_template()` hoặc `is_singular()`).

---

## 3. Hiệu ứng Hoạt họa CSS (Animations)
* Các hiệu ứng chuyển động trượt lên, mờ dần khi cuộn trang phải được xây dựng dựa trên CSS classes chuyển tiếp mượt mà:
  * `.reveal-fade`, `.reveal-slide-up`, `.reveal-slide-left`, `.reveal-slide-right` thiết lập trạng thái ẩn ban đầu (`opacity: 0; transform: ...; transition: ...;`).
  * `.reveal-active` thiết lập trạng thái hiển thị hoàn chỉnh (`opacity: 1; transform: none;`).
  * Tránh hardcode các style hoạt họa bằng inline CSS trực tiếp hoặc dùng JS thay đổi thuộc tính style trực tiếp. Thay vào đó, hãy chuyển đổi trạng thái bằng cách toggle class qua Javascript thuần.
