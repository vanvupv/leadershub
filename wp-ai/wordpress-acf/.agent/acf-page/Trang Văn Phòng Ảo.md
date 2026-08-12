# 📋 Cấu Hình ACF Page: Trang Văn Phòng Ảo (Virtual Office)

Tệp template: [template-van-phong-ao.php](file:///e:/1.%20D%E1%BB%B0%20%C3%81N%20TH%E1%BB%B0C%20T%E1%BA%BE%20%282026%29/%2816%29%20LEADERSHUB%20%2811082026%29/wp-content/themes/leadershub-wp-theme/template-van-phong-ao.php)
Field Group ACF: `group_lh_virtual` (Cấu hình Trang Địa Chỉ Doanh Nghiệp - Virtual Office)

---

## 🎯 Danh Sách Section & Trường ACF Đã Phân Theo Tab

### 🚀 1. Section 1: Hero Banner (Dịch Vụ Văn Phòng Ảo Hạng A) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Giới thiệu ngắn gọn giải pháp địa chỉ đăng ký kinh doanh uy tín tại tháp tài chính Capital Place.
- **Trường ACF (`group_lh_virtual` -> Tab 1. Hero Banner):**
  1. `vo_hero_badge` *(Type: text)* - Badge nhỏ góc trên (Mặc định: `Premium Business Solution`).
  2. `vo_hero_title` *(Type: text)* - Tiêu đề chính Dòng 1 (Mặc định: `Gói văn phòng cơ bản`).
  3. `vo_hero_subtitle` *(Type: text)* - Tiêu đề phụ Dòng 2 (Mặc định: `Địa chỉ kinh doanh hạng A`).
  4. `vo_hero_desc` *(Type: textarea)* - Đoạn giới thiệu mô tả giá trị.
  5. `vo_hero_image` *(Type: image)* - File hình ảnh thực tế tòa nhà / văn phòng.
  6. `vo_hero_btn1_text` *(Type: text)* - Tên nút 1 (Mặc định: `Đăng ký tư vấn ngay`).
  7. `vo_hero_btn1_url` *(Type: text)* - Đường dẫn nút 1 (Mặc định: `#register`).
  8. `vo_hero_btn2_text` *(Type: text)* - Tên nút 2 (Mặc định: `Xem bảng giá`).
  9. `vo_hero_btn2_url` *(Type: text)* - Đường dẫn nút 2 (Mặc định: `#pricing`).

---

## 💳 2. Section 2: Service Plans / Pricing Cards (Các Gói Dịch Vụ Linh Hoạt) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Hiển thị 3 gói dịch vụ chính (Economy, Standard, Premium) kèm giá bán, tính năng và nhãn "Phổ biến nhất".
- **Trường ACF (`group_lh_virtual` -> Tab 2. Gói Dịch Vụ & Bảng Giá):**
  1. `vo_pricing_title` *(Type: text)* - Tiêu đề section (Mặc định: `Các Gói Dịch Vụ Linh Hoạt`).
  2. `vo_pricing_desc` *(Type: text)* - Mô tả mức giá khởi điểm (Mặc định: `Chỉ từ 980,000đ/tháng...`).
  3. `vo_pricing_vat_note` *(Type: text)* - Ghi chú thuế (Mặc định: `(Giá chưa bao gồm VAT nếu áp dụng)`).
  4. `vo_plans` *(Type: repeater)* - Danh sách các gói dịch vụ:
     - `name` *(Type: text)* - Tên gói (VD: `Gói Economy`, `Gói Standard`, `Gói Premium`).
     - `desc` *(Type: text)* - Mối quan tâm / Đối tượng (VD: `Dành cho cá nhân khởi nghiệp`).
     - `price` *(Type: text)* - Mức giá (VD: `980,000`, `1,500,000`, `2,500,000`).
     - `unit` *(Type: text)* - Đơn vị tính (VD: `đ/tháng`).
     - `is_popular` *(Type: true_false)* - Nổi bật gói này (Viền vàng Prestige Gold & Badge).
     - `popular_label` *(Type: text)* - Nhãn gói nổi bật (VD: `Phổ biến nhất`).
     - `features` *(Type: textarea)* - Danh sách quyền lợi / tính năng (Mỗi dòng 1 mục).

---

## 📊 3. Section 3: Feature Comparison Table (So Sánh Tiện Ích) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** So sánh bảng chi tiết tính năng hỗ trợ từng gói dịch vụ minh bạch.
- **Trường ACF (`group_lh_virtual` -> Tab 3. Bảng So Sánh Tiện Ích):**
  1. `vo_comp_title` *(Type: text)* - Tiêu đề section (Mặc định: `So Sánh Tiện Ích`).
  2. `vo_comp_rows` *(Type: repeater)* - Danh sách từng hàng tiện ích so sánh:
     - `feature_name` *(Type: text)* - Tên dịch vụ & tiện ích.
     - `economy_val` *(Type: text)* - Trạng thái gói Economy (`yes`, `no`, hoặc chữ như `Tính phí lẻ`).
     - `standard_val` *(Type: text)* - Trạng thái gói Standard (`yes`, `no`, hoặc chữ như `4 giờ/tháng`).
     - `premium_val` *(Type: text)* - Trạng thái gói Premium (`yes`, `no`, hoặc chữ như `10 giờ/tháng`).

---

## 🔄 4. Section 4: Registration Process (Quy Trình 3 Bước Đơn Giản) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Tối giản quy trình ký kết và đưa dịch vụ vào vận hành nhanh chóng trong 3 bước.
- **Trường ACF (`group_lh_virtual` -> Tab 4. Quy Trình 3 Bước):**
  1. `vo_process_title` *(Type: text)* - Tiêu đề quy trình (Mặc định: `Quy Trình 3 Bước Đơn Giản`).
  2. `vo_process_steps` *(Type: repeater)* - Danh sách các bước:
     - `number` *(Type: text)* - Số thứ tự (VD: `01`, `02`, `03`).
     - `icon` *(Type: text)* - Material Symbol Icon (VD: `support_agent`, `history_edu`, `business_center`).
     - `title` *(Type: text)* - Tên bước (VD: `Tư vấn giải pháp`).
     - `desc` *(Type: textarea)* - Mô tả chi tiết thực hiện.

---

## 🏢 5. Section 5: Environment Showcase (Hạ Tầng & Vì Sao Chọn The Leaders Hub) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Khẳng định chất lượng hạ tầng 5 sao và dịch vụ tiếp đón tận tâm.
- **Trường ACF (`group_lh_virtual` -> Tab 5. Hạ Tầng & Vì Sao Chọn):**
  1. `vo_showcase_badge` *(Type: text)* - Badge nhỏ (Mặc định: `VÌ SAO CHỌN THE LEADERS HUB`).
  2. `vo_showcase_title` *(Type: text)* - Tiêu đề chính (Mặc định: `Hạ tầng chuẩn mực / Dịch vụ tận tâm`).
  3. `vo_showcase_content` *(Type: wysiwyg)* - Nội dung văn bản diễn giải.
  4. `vo_showcase_image` *(Type: image)* - Hình ảnh lễ tân / không gian thực tế.
  5. `vo_showcase_badge_text` *(Type: text)* - Nhãn nổi bật trên thẻ ảnh (Mặc định: `Tiêu chuẩn 5 sao`).
  6. `vo_showcase_card_desc` *(Type: textarea)* - Mô tả thẻ nổi bật trên hình ảnh.

---

## 📝 6. Section 6: Consultation Form & Contact (Form Đăng Ký & Tư Vấn) - [x] DONE
- **Trạng thái:** ✅ **DONE**
- **Mục đích:** Thu thập thông tin khách hàng muốn đăng ký thuê văn phòng ảo qua Airtable Form.
- **Trường ACF (`group_lh_virtual` -> Tab 6. Form Tư Vấn & Đăng Ký):**
  1. `vo_cta_title` *(Type: text)* - Tiêu đề form (Mặc định: `Sẵn sàng để vươn xa?`).
  2. `vo_cta_desc` *(Type: textarea)* - Lời nhắn phản hồi tư vấn.
