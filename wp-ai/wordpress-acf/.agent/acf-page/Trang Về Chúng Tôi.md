# Cấu Trúc ACF Page: Trang Về Chúng Tôi (About Page)

Tài liệu quy định và cấu trúc 6 Section chính cho trang **Về Chúng Tôi (The Leaders Hub)**, liệt kê chi tiết tên các trường ACF (Advanced Custom Fields), loại trường, giá trị mặc định và cách truy xuất dữ liệu.

---

## 📌 1. Section 1: Hero Banner (Banner Đầu Trang) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Hiển thị tiêu đề chính, mô tả ngắn và ảnh nền ấn tượng giới thiệu thương hiệu The Leaders Hub.
- **Trường ACF (`group_lh_about` -> Tab 1. Hero Banner):**
  1. `about_hero_image` *(Type: image)* - Hình ảnh nền Hero Banner (Khuyên dùng kích thước 1920x1080px).
  2. `about_hero_title` *(Type: text)* - Tiêu đề chính Hero Banner (Mặc định: `Về Chúng Tôi`).
  3. `about_hero_desc` *(Type: textarea)* - Đoạn văn mô tả ngắn giới thiệu hành trình thương hiệu.

---

## 📖 2. Section 2: Brand Story (Câu Chuyện Thương Hiệu & Chỉ Số)
- **Mục đích:** Giới thiệu quá trình phát triển, vị trí văn phòng hạng A tại tòa nhà Capital Place và các con số ấn tượng.
- **Trường ACF (`group_lh_about` -> Tab Story):**
  1. `about_story_badge` *(Type: text)* - Subtitle / Badge nhỏ (VD: `Câu chuyện thương hiệu`).
  2. `about_story_title` *(Type: text)* - Tiêu đề chính (VD: `Không gian làm việc chuyên nghiệp tại Capital Place`).
  3. `about_story_content` *(Type: wysiwyg / textarea)* - Nội dung bài viết chi tiết câu chuyện thương hiệu (Chấp nhận định dạng HTML/formatting).
  4. `about_story_image` *(Type: image)* - Hình ảnh minh họa tòa nhà Capital Place / Không gian làm việc.
  5. `about_stats` *(Type: repeater)* - Danh sách các con số thống kê ấn tượng:
     - `number` *(Type: text)* - Con số ấn tượng (VD: `500+`, `10+`).
     - `label` *(Type: text)* - Nhãn mô tả (VD: `Doanh nghiệp tin tưởng`, `Năm kinh nghiệm`).

---

## 💎 3. Section 3: Core Values (Giá Trị Cốt Lõi)
- **Mục đích:** Trình bày 3 trụ cột Sứ mệnh, Tầm nhìn và Giá trị cốt lõi của The Leaders Hub.
- **Trường ACF (`group_lh_about` -> Tab Values):**
  1. `about_values_title` *(Type: text)* - Tiêu đề chính Section (Mặc định: `Giá Trị Cốt Lõi`).
  2. `about_values_list` *(Type: repeater)* - Mảng 3 trụ cột giá trị cốt lõi:
     - `icon` *(Type: text)* - Tên biểu tượng Material Symbol (VD: `rocket_launch`, `visibility`, `diamond`).
     - `title` *(Type: text)* - Tên trụ cột (VD: `Sứ mệnh`, `Tầm nhìn`, `Giá trị cốt lõi`).
     - `desc` *(Type: textarea)* - Nội dung diễn giải chi tiết.

---

## 🏆 4. Section 4: Certifications & Partners (Chứng Nhận Tòa Nhà)
- **Mục đích:** Khẳng định uy tín và tiêu chuẩn văn phòng hạng A thông qua các chứng chỉ quốc tế của Capital Place.
- **Trường ACF (`group_lh_about` -> Tab Certifications):**
  1. `about_cert_title` *(Type: text)* - Tiêu đề phụ (Mặc định: `Chứng nhận tòa nhà văn phòng Capital Place`).
  2. `about_cert_logos` *(Type: repeater)* - Danh sách chứng nhận (Mặc định: `CAPITAL PLACE`, `ISO 9001:2015`, `LEED GOLD`).

---

## 📷 5. Section 5: Real Office Space (Hình Ảnh Thực Tế)
- **Mục đích:** Trình bày hình ảnh toàn cảnh không gian sống động tại The Leaders Hub.
- **Trường ACF (`group_lh_about` -> Tab Gallery):**
  1. `about_gallery_title` *(Type: text)* - Tiêu đề chính (Mặc định: `Hình ảnh thực tế`).
  2. `about_gallery_desc` *(Type: text)* - Mô tả phụ (Mặc định: `Khám phá không gian sống động tại The Leaders Hub`).
  3. `about_gallery_image` *(Type: image)* - File hình ảnh thực tế chất lượng cao.

---

## 🚀 6. Section 6: Call To Action & Brochure (Kêu Gọi Hành Động)
- **Mục đích:** Thúc đẩy chuyển đổi khách hàng tiềm năng gửi yêu cầu tư vấn hoặc tải Brochure PDF.
- **Trường ACF (`group_lh_about` -> Tab CTA):**
  1. `about_cta_title` *(Type: text)* - Tiêu đề kêu gọi (Mặc định: `Bạn đã sẵn sàng nâng tầm thương hiệu?`).
  2. `about_cta_desc` *(Type: textarea)* - Đoạn văn mô tả ngắn ưu đãi.
  3. `about_brochure_url` *(Type: file / text)* - Đường dẫn tải tệp Brochure giới thiệu (PDF).
