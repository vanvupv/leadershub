---
trigger: always_on
---

# Quy ước Đặt tên & Cấu trúc Thư mục

Tài liệu này định nghĩa các quy ước đặt tên (Naming Conventions) và cấu trúc tổ chức thư mục assets áp dụng cho dự án WordPress HTML/CSS + ACF.

---

## 1. Quy ước Đặt tên (Naming Conventions)

### 1.1 Advanced Custom Fields (ACF)
* **ACF Field Group Key**:
  * Định dạng: `group_[post_type_or_page]` hoặc `group_[chuc_nang]` (sử dụng chữ thường, không dấu, ngăn cách bằng dấu gạch dưới).
  * Ví dụ: `group_trang_chu`, `group_footer_settings`, `group_chi_tiet_portfolio`.
* **ACF Field Key**:
  * Định dạng: `field_[post_type_or_page]_[field_name]` hoặc `field_[field_name]`.
  * Yêu cầu: Đảm bảo tính duy nhất tuyệt đối trên toàn hệ thống để tránh xung đột cấu hình trường trong Database của WordPress.
  * Ví dụ: `field_hero_title`, `field_about_hero_title`.
* **ACF Tab Key**:
  * Định dạng: `field_tab_[post_type_or_page]_[section_name]`.
  * Ví dụ: `field_tab_trang_chu_hero`, `field_tab_ve_chung_toi_team`.
* **ACF Field Name**:
  * Định dạng: `snake_case`, sử dụng chữ thường, tiếng Anh không dấu, ngắn gọn và mô tả đúng mục đích (ví dụ: `hero_title`, `services_list`). Tuyệt đối không đặt tên có dấu hoặc chứa khoảng trắng.
  * Trường Repeater/Flexible Content: Tên các trường con (`sub_fields`) không cần chứa prefix của trang để tránh trùng lặp dài dòng (ví dụ: repeater `stats` có các sub_fields là `number`, `label`, không đặt là `stats_number`, `stats_label`).
* **Quy ước Ngôn ngữ cho Group, Label & Name**:
  * **Field Name / Field Key / Group Key**: Bắt buộc viết bằng tiếng Anh (hoặc không dấu) viết thường để code PHP sạch sẽ và chuẩn hóa.
  * **Field Label / Group Title**: Bắt buộc viết bằng tiếng Việt đầy đủ, có dấu, mô tả rõ ràng để quản trị viên dễ đọc hiểu (ví dụ: label "Tiêu đề Hero", name "hero_title").

### 1.2 WordPress File Templates
* **Page Templates**:
  * Định dạng: `template-[slug].php`.
  * Ví dụ: `template-case-studies.php`, `template-ve-chung-toi.php`.
* **Single Post Templates**:
  * Định dạng: `single-[post_type].php`.
  * Ví dụ: `single-post.php` (cho post type mặc định `post`), `single-portfolio.php` (nếu có custom post type `portfolio`).

### 1.3 Static Assets (CSS/JS)
* **File stylesheets & scripts**:
  * Định dạng: Trùng tên với file template tương ứng để dễ dàng enqueue động.
  * Ví dụ: `assets/css/chi-tiet-portfolio.css` đi kèm với `js/chi-tiet-portfolio.js` phục vụ cho template `single-post.php`.

---

## 2. Cấu trúc Thư mục Assets

```
wp-content/themes/bro-tu/
├── assets/
│   ├── css/
│   │   ├── main.css              # Style chính chung cho toàn trang (biên dịch từ Sass)
│   │   ├── trang-chu.css         # CSS đặc thù cho Trang chủ
│   │   ├── ve-chung-toi.css      # CSS đặc thù cho Về chúng tôi
│   │   ├── dich-vu.css           # CSS đặc thù cho Dịch vụ
│   │   └── chi-tiet-portfolio.css # CSS đặc thù cho Chi tiết bài viết Case Study
│   ├── scss/
│   │   └── main.scss             # Mã nguồn Sass chính chứa Tailwind / Custom components
│   └── css-split/                # Thư mục chứa CSS sau khi tách
├── js/
│   ├── navigation.js             # Script điều hướng chung & Mobile menu dropdown
│   ├── trang-chu.js              # Hoạt họa đặc thù cho Trang chủ
│   └── chi-tiet-portfolio.js     # Hoạt họa đặc thù cho Chi tiết bài viết Case Study
```
