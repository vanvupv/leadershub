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

## 🏢 2. Section 2: Services (Danh Mục Dịch Vụ & Giải Pháp Văn Phòng) - [ ] TODO
- **Trạng thái:** ⏳ **TODO (Đang hoàn thiện)**
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
- **Trạng thái:** ⏳ **TODO**
- **Mục đích:** Trình bày rõ ràng bảng giá các gói văn phòng ảo giúp khách hàng dễ chọn lựa và so sánh.
- **Trường ACF:**
  1. `home_pricing_plans` *(Type: repeater)* - Danh sách các gói cước dịch vụ (Economy, Standard, Premium):
     - `name` *(Type: text)* - Tên gói dịch vụ.
     - `price` *(Type: text)* - Giá thuê theo tháng (VD: `980,000`).
     - `desc` *(Type: text)* - Mô tả đối tượng doanh nghiệp phù hợp.
     - `features` *(Type: textarea)* - Danh sách các tiện ích đi kèm (Mỗi tiện ích nằm trên một dòng).

---

## 🖼️ 4. Section 4: Environment Showcase (Thư Viện Ảnh Không Gian Thực Tế) - [ ] TODO
- **Trạng thái:** ⏳ **TODO**
- **Mục đích:** Trực quan hóa hình ảnh thực tế 5 sao tại tòa tháp Capital Place (Khu lễ tân, Business Lounge, Pantry,...).
- **Trường ACF:**
  1. `home_gallery_images` *(Type: repeater)* - Thư viện ảnh thực tế không gian làm việc:
     - `image` *(Type: image)* - File hình ảnh thực tế chất lượng cao.
     - `title` *(Type: text)* - Tên khu vực không gian.
     - `desc` *(Type: text)* - Ghi chú mô tả điểm nổi bật của khu vực.

---

## ⭐ 5. Section 5: Customer Reviews (Đánh Giá Thực Tế Từ Khách Hàng) - [ ] TODO
- **Trạng thái:** ⏳ **TODO**
- **Mục đích:** Tăng chứng thực xã hội (Social Proof) và lòng tin của khách hàng doanh nghiệp.
- **Trường ACF:**
  1. `home_reviews_list` *(Type: repeater)* - Danh sách các bài đánh giá từ CEO & Đối tác:
     - `name` *(Type: text)* - Họ tên khách hàng / Đối tác.
     - `role` *(Type: text)* - Chức vụ và Tên công ty (VD: `CEO, FinTech Solutions`).
     - `comment` *(Type: textarea)* - Nội dung nhận xét chi tiết.
     - `avatar` *(Type: text/image)* - Ký tự đại diện hoặc Ảnh đại diện.