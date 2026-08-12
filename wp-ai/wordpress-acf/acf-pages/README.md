# Thư Mục Quản Lý Yêu Cầu ACF Theo Trang (ACF Pages Requirements)

Thư mục này lưu trữ tất cả các tệp quy định **Yêu cầu Khách hàng & Cấu hình Chi tiết (Client Brief & ACF Specifications)** cho từng trang/template trong dự án.

---

## 📂 Cấu Trúc Thư Mục Khuyên Dùng

```
acf-pages/
├── README.md               # File hướng dẫn cấu trúc thư mục
├── home.md                 # Yêu cầu & Cấu hình ACF cho Trang chủ (Homepage)
├── about.md                # Yêu cầu & Cấu hình ACF cho Trang Về chúng tôi
├── services.md             # Yêu cầu & Cấu hình ACF cho Trang Dịch vụ
├── portfolio-single.md     # Yêu cầu & Cấu hình ACF cho Chi tiết Portfolio
└── options-global.md       # Yêu cầu & Cấu hình ACF cho Trang Options (Header/Footer)
```

---

## 📋 Mẫu Cấu Trúc Tệp Yêu Cầu Trang (`home.md`)

```markdown
# Yêu Cầu Cấu Hình ACF - Trang Chủ (Home Page)

## 1. Thông Tin Chung
* **Page Template**: `template-home.php`
* **Field Group Key**: `group_page_home`
* **Field Group Title**: `Cấu hình Trang chủ`

---

## 2. Danh Sách Các Section & Fields

### Section 1: Hero Banner (Tab: `field_tab_home_hero`)
| Field Label (Tiếng Việt) | Field Name (Tiếng Anh) | Field Key | Type | Ghi Chú / Requirements |
| :--- | :--- | :--- | :--- | :--- |
| Tiêu đề Hero | `home_hero_title` | `field_home_hero_title` | `text` | Tiêu đề chính h1 đầu trang |
| Subtitle Hero | `home_hero_subtitle` | `field_home_hero_subtitle` | `textarea` | Mô tả ngắn 2-3 dòng |
| Hình ảnh Hero | `home_hero_image` | `field_home_hero_image` | `image` | Return format: Array, Preview: medium |
| Nút Kêu gọi (Link) | `home_hero_cta` | `field_home_hero_cta` | `link` | Return format: Array (url, title, target) |

### Section 2: Danh sách Tính năng (Tab: `field_tab_home_features`)
* **Repeater Name**: `home_features_list` (`field_home_features_list`)
* **Sub-fields**:
  * `icon` (`image`): Icon minh họa
  * `title` (`text`): Tên tính năng
  * `description` (`textarea`): Mô tả tính năng
```
