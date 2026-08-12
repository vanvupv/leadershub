# 📋 Cấu Hình ACF Page: Trang Văn Phòng Cao Cấp (Serviced Office)

Tệp template: [template-van-phong-cao-cap.php](file:///e:/1.%20D%E1%BB%B0%20%C3%81N%20TH%E1%BB%B0C%20T%E1%BA%BE%20%282026%29/%2816%29%20LEADERSHUB%20%2811082026%29/wp-content/themes/leadershub-wp-theme/template-van-phong-cao-cap.php)
Field Group ACF: `group_lh_serviced` (Cấu hình Trang Văn Phòng Cao Cấp - Serviced Office)

---

## 🎯 Danh Sách Section & Trường ACF Đã Phân Theo Tab

### 🚀 1. Section 1: Hero Banner (Dịch Vụ Văn Phòng Cao Cấp Hạng A)
- **Mục đích:** Khẳng định đẳng cấp dịch vụ văn phòng trọn gói tiêu chuẩn 5 sao tại tháp tài chính Capital Place.
- **Trường ACF (`group_lh_serviced` -> Tab 1. Hero Banner):**
  1. `so_hero_badge` *(Type: text)* - Badge nhỏ góc trên (Mặc định: `DỊCH VỤ ĐẲNG CẤP`).
  2. `so_hero_title` *(Type: text)* - Tiêu đề chính Dòng 1 (Mặc định: `Văn phòng dịch vụ`).
  3. `so_hero_gold_title` *(Type: text)* - Tiêu đề phụ chữ vàng Dòng 2 (Mặc định: `(Serviced Office)`).
  4. `so_hero_desc` *(Type: textarea)* - Đoạn giới thiệu mô tả giá trị.
  5. `so_hero_image` *(Type: image)* - File hình ảnh nền không gian sang trọng.
  6. `so_hero_btn1_text` *(Type: text)* - Tên nút 1 (Mặc định: `ĐẶT LỊCH THAM QUAN`).
  7. `so_hero_btn1_url` *(Type: text)* - Đường dẫn nút 1 (Mặc định: `#booking-form`).
  8. `so_hero_btn2_text` *(Type: text)* - Tên nút 2 (Mặc định: `NHẬN BÁO GIÁ NGAY`).
  9. `so_hero_btn2_url` *(Type: text)* - Đường dẫn nút 2 (Mặc định: `#booking-form`).

---

## 🏢 2. Section 2: Introduction (Không Gian Riêng Tư & Nâng Tầm Doanh Nghiệp)
- **Mục đích:** Giới thiệu sâu hơn về hệ sinh thái làm việc riêng tư, đầy đủ nội thất và vận hành chuyên nghiệp.
- **Trường ACF (`group_lh_serviced` -> Tab 2. Giới Thiệu Không Gian):**
  1. `so_intro_title` *(Type: text)* - Tiêu đề chính (Mặc định: `Không gian riêng tư / Nâng tầm doanh nghiệp`).
  2. `so_intro_content` *(Type: wysiwyg)* - Nội dung văn bản diễn giải chi tiết.
  3. `so_intro_image_1` *(Type: image)* - Hình ảnh minh họa 1.
  4. `so_intro_image_2` *(Type: image)* - Hình ảnh minh họa 2.

---

## ✨ 3. Section 3: Special Utilities Grid (Tiện Ích Đặc Quyền)
- **Mục đích:** Trình bày danh mục các tiện ích 5 sao đi kèm như Lounge Pantry & Cafe, Lễ tân chuyên nghiệp, In ấn & IT Support, Phòng họp tiêu chuẩn.
- **Trường ACF (`group_lh_serviced` -> Tab 3. Tiện Ích Đặc Quyền):**
  1. `so_utils_badge` *(Type: text)* - Badge nhỏ góc trên (Mặc định: `TIỆN ÍCH ĐẶC QUYỀN`).
  2. `so_utils_title` *(Type: text)* - Tiêu đề chính (Mặc định: `Hơn cả một văn phòng`).
  3. `so_utils_list` *(Type: repeater)* - Danh sách các tiện ích:
     - `icon` *(Type: text)* - Mã Google Material Icon (VD: `local_cafe`, `support_agent`, `print`, `meeting_room`).
     - `title` *(Type: text)* - Tên tiện ích.
     - `desc` *(Type: textarea)* - Mô tả ngắn về tiện ích.

---

## 📸 4. Section 4: Real Gallery (Thư Viện Ảnh Thực Tế)
- **Mục đích:** Trưng bày hình ảnh thực tế sắc nét về không gian Lounge, Phòng họp Boardroom và Khu vực Pantry.
- **Trường ACF (`group_lh_serviced` -> Tab 4. Thư Viện Ảnh Thực Tế):**
  1. `so_gallery_title` *(Type: text)* - Tiêu đề chính (Mặc định: `Thư viện ảnh thực tế`).
  2. `so_gallery_desc` *(Type: text)* - Đoạn mô tả phụ (Mặc định: `Tham quan không gian làm việc hiện đại tại Capital Place.`).
  3. `so_gallery_image_1` *(Type: image)* - Ảnh thực tế lớn (Bên trái / Lounge).
  4. `so_gallery_caption_1` *(Type: text)* - Chú thích ảnh 1 (Mặc định: `Khu vực Lounge sang trọng`).
  5. `so_gallery_image_2` *(Type: image)* - Ảnh thực tế góc phải trên (Phòng họp Boardroom).
  6. `so_gallery_caption_2` *(Type: text)* - Chú thích ảnh 2 (Mặc định: `Phòng họp Boardroom`).
  7. `so_gallery_image_3` *(Type: image)* - Ảnh thực tế góc phải dưới (Pantry).
  8. `so_gallery_caption_3` *(Type: text)* - Chú thích ảnh 3 (Mặc định: `Khu vực Pantry hiện đại`).

---

## 💼 5. Section 5: Pricing & Consultation CTA (Báo Giá & Đặt Lịch Tham Quan)
- **Mục đích:** Kêu gọi hành động (CTA) đặt lịch tham quan và nhận báo giá ưu đãi qua Airtable Form.
- **Trường ACF (`group_lh_serviced` -> Tab 5. Báo Giá & Đặt Lịch):**
  1. `so_cta_title` *(Type: text)* - Tiêu đề CTA (Mặc định: `Sẵn sàng nâng tầm vị thế doanh nghiệp?`).
  2. `so_cta_desc` *(Type: textarea)* - Mô tả nhận báo giá chi tiết.
  3. `so_cta_price_label` *(Type: text)* - Nhãn thông số 1 (Mặc định: `Giá dịch vụ`).
  4. `so_cta_price_val` *(Type: text)* - Giá trị thông số 1 (Mặc định: `Liên hệ nhận báo giá`).
  5. `so_cta_price_sub` *(Type: text)* - Phụ đề thông số 1 (Mặc định: `Theo diện tích và thời hạn`).
  6. `so_cta_capacity_label` *(Type: text)* - Nhãn thông số 2 (Mặc định: `Sức chứa`).
  7. `so_cta_capacity_val` *(Type: text)* - Giá trị thông số 2 (Mặc định: `1 - 20 nhân sự`).
  8. `so_cta_capacity_sub` *(Type: text)* - Phụ đề thông số 2 (Mặc định: `Tùy biến linh hoạt`).

---

## ⚙️ 6. Section 6: Service Steps (Quy Trình 3 Bước Tham Quan & Nhận Phòng)
- **Mục đích:** Hướng dẫn 3 bước đơn giản từ Đặt lịch tham quan -> Nhận báo giá -> Bàn giao sử dụng.
- **Trường ACF (`group_lh_serviced` -> Tab 6. Quy Trình 3 Bước):**
  1. `so_process_title` *(Type: text)* - Tiêu đề section (Mặc định: `Quy trình đăng ký dịch vụ`).
  2. `so_process_steps` *(Type: repeater)* - Danh sách các bước:
     - `number` *(Type: text)* - Số thứ tự (VD: `01`, `02`, `03`).
     - `title` *(Type: text)* - Tên bước.
     - `desc` *(Type: textarea)* - Diễn giải chi tiết từng bước.
