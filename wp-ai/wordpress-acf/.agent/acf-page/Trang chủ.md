# Cấu Trúc ACF Page: Trang Chủ (Homepage)

Tài liệu quy định và cấu trúc 5 Section chính cho trang chủ **The Leaders Hub**, liệt kê chi tiết tên các trường ACF (Advanced Custom Fields), loại trường và cách lấy dữ liệu.

---

## 📌 1. Section 1: Hero Banner (Banner Chính Video / Ảnh Dự Phòng) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Hiển thị ấn tượng đầu tiên khi khách truy cập với video nền tự động phát và thông điệp thương hiệu.
- **Trường ACF (`group_lh_home` -> Tab Hero):**
  1. `home_hero_subtitle` *(Type: text)* - Tiêu đề phụ / Badge thông báo (VD: `Premium Business Solution`).
  2. `home_hero_title` *(Type: text)* - Tiêu đề chính Hero Banner.
  3. `home_hero_desc` *(Type: textarea)* - Đoạn văn mô tả ngắn giới thiệu giải pháp.
  4. `home_hero_video` *(Type: text/url)* - Đường dẫn URL tệp Video nền (`.mp4`).
  5. `home_hero_poster` *(Type: image)* - Hình ảnh dự phòng (Poster) hiển thị khi video đang nạp hoặc trên thiết bị di động.
  6. `home_hero_btn_1` *(Type: link)* - Nút bấm hành động chính (Return: Array: URL, Title, Target).
  7. `home_hero_btn_2` *(Type: link)* - Nút bấm hành động phụ (Return: Array: URL, Title, Target).

---

## 🏢 2. Section 2: Services (Danh Mục Dịch Vụ & Giải Pháp Văn Phòng) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Giới thiệu các loại hình văn phòng chuẩn quốc tế tại The Leaders Hub.
- **Trường ACF (`group_lh_home` -> Tab Services):**
  1. `home_services_subtitle` *(Type: text)* - Tiêu đề phụ / Badge Section (VD: `GIẢI PHÁP CỦA CHÚNG TÔI`).
  2. `home_services_title` *(Type: text)* - Tiêu đề chính Section (VD: `Văn phòng chuẩn quốc tế`).
  3. `home_services_list` *(Type: repeater)* - Mảng danh sách các gói dịch vụ (Văn phòng ảo, Văn phòng cao cấp, Phòng họp, Flexible Workspace):
     - `title` *(Type: text)* - Tên loại hình dịch vụ.
     - `desc` *(Type: textarea)* - Mô tả đặc điểm dịch vụ.
     - `link` *(Type: text/page_link)* - Đường dẫn chuyển hướng tới trang chi tiết dịch vụ.
     - `image` *(Type: image)* - Hình ảnh đại diện cho loại hình dịch vụ.

---

## 💰 3. Section 3: Pricing Plans (Bảng Giá Dịch Vụ Văn Phòng Ảo) - [ ] TODO
- **Trạng thái:** ⏳ **TODO (Đang hoàn thiện)**
- **Mục đích:** Trình bày rõ ràng bảng giá các gói văn phòng ảo giúp khách hàng dễ chọn lựa và so sánh.
- **Trường ACF (`group_lh_home` -> Tab Pricing):**
  1. `home_pricing_title` *(Type: text)* - Tiêu đề chính Bảng giá (VD: `Các Gói Dịch Vụ Văn Phòng Ảo`).
  2. `home_pricing_desc` *(Type: textarea)* - Mô tả ngắn (VD: `Chỉ từ 980,000đ/tháng...`).
  3. `home_pricing_plans` *(Type: repeater)* - Danh sách các gói cước dịch vụ (Economy, Standard, Premium):
     - `name` *(Type: text)* - Tên gói dịch vụ.
     - `price` *(Type: text)* - Giá thuê theo tháng (VD: `980,000`).
     - `desc` *(Type: text)* - Mô tả đối tượng doanh nghiệp phù hợp.
     - `features` *(Type: textarea)* - Danh sách các tiện ích đi kèm (Mỗi tiện ích nằm trên một dòng).

---

## 🖼️ 4. Section 4: Environment Showcase (Thư Viện Ảnh Không Gian Thực Tế) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Trực quan hóa hình ảnh thực tế 5 sao tại tòa tháp Capital Place (Lễ tân, Lounge, Pantry, View thành phố, Văn phòng riêng, Hot desk, Phòng họp).
- **Trường ACF (`group_lh_home` -> Tab Thư viện ảnh):**
  1. `home_gallery_subtitle` *(Type: text)* - Tiêu đề phụ (VD: `THƯ VIỆN HÌNH ẢNH`).
  2. `home_gallery_title` *(Type: text)* - Tiêu đề chính (VD: `Không Gian Thực Tế Tại The Leaders Hub`).
  3. `home_gallery_images` *(Type: repeater)* - Thư viện ảnh thực tế không gian làm việc (Lễ tân, Lounge, Pantry, View thành phố, Văn phòng riêng, Hot desk, Phòng họp):
     - `image` *(Type: image)* - File hình ảnh thực tế chất lượng cao.
     - `title` *(Type: text)* - Tên khu vực không gian.
     - `desc` *(Type: text)* - Chú thích / Alt text mô tả chi tiết khu vực.

---

## ⭐ 5. Section 5: Customer Reviews (Đánh Giá Thực Tế Từ Khách Hàng - Google Reviews) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Đồng bộ hiển thị các đánh giá thật 100% từ Google Business Profile của The Leaders Hub qua Shortcode của Plugin Trustindex.
- **Trường ACF (`group_lh_home` -> Tab Reviews):**
  1. `home_reviews_subtitle` *(Type: text)* - Tiêu đề phụ / Badge Section (Mặc định: `ĐÁNH GIÁ THỰC TẾ`).
  2. `home_reviews_title` *(Type: text)* - Tiêu đề chính Section (Mặc định: `Khách Hàng Nói Gì Về The Leaders Hub`).
  3. `home_reviews_shortcode` *(Type: text)* - Shortcode tự động hiển thị Widget đánh giá từ Plugin Trustindex (Mặc định: `[trustindex no-registration=google]`).

---

## 📰 6. Section 6: Latest News (Tin Tức Mới Nhất - WP_Query) - [ ] TODO
- **Trạng thái:** ⏳ **TODO (Đang hoàn thiện)**
- **Mục đích:** Truy vấn động 3 bài viết mới nhất từ WordPress Core (`post_type => 'post'`), hiển thị thông tin bài viết tự động.
- **Trường ACF (`group_lh_home` -> Tab News):**
  1. `home_news_title` *(Type: text)* - Tiêu đề chính Section Tin tức (VD: `Tin tức mới nhất`).
  2. `home_news_btn_text` *(Type: text)* - Chữ hiển thị trên nút Xem Tất Cả (VD: `Xem tất cả`).