# 📋 Cấu Hình ACF Page: Trang Phòng Họp (Meeting Room)

Tệp template: [template-phong-hop.php](file:///e:/1.%20D%E1%BB%B0%20%C3%81N%20TH%E1%BB%B0C%20T%E1%BA%BE%20%282026%29/%2816%29%20LEADERSHUB%20%2811082026%29/wp-content/themes/leadershub-wp-theme/template-phong-hop.php)
Field Group ACF: `group_lh_meeting` (Cấu hình Trang Phòng Họp - Meeting Room)

---

## 🎯 Danh Sách Section & Trường ACF Phân Theo Tab

### 🚀 1. Section 1: Hero Banner (Phòng Họp Chuyên Nghiệp Hạng A)
- **Mục đích:** Giới thiệu tổng quan hệ thống phòng họp sang trọng, đẳng cấp tại trung tâm Thủ đô.
- **Trường ACF (`group_lh_meeting` -> Tab 1. Hero Banner):**
  1. `mr_hero_badge` *(Type: text)* - Badge nhỏ góc trên (Mặc định: `KHÔNG GIAN HẠNG A`).
  2. `mr_hero_title` *(Type: text)* - Tiêu đề chính Dòng 1 (Mặc định: `Phòng họp`).
  3. `mr_hero_gold_title` *(Type: text)* - Tiêu đề chữ vàng Dòng 2 (Mặc định: `chuyên nghiệp`).
  4. `mr_hero_desc` *(Type: textarea)* - Đoạn giới thiệu mô tả giá trị.
  5. `mr_hero_image` *(Type: image)* - Hình ảnh nổi bật không gian phòng họp.
  6. `mr_hero_btn1_text` *(Type: text)* - Tên nút 1 (Mặc định: `ĐẶT PHÒNG NGAY`).
  7. `mr_hero_btn1_url` *(Type: text)* - Đường dẫn nút 1 (Mặc định: `#booking`).
  8. `mr_hero_btn2_text` *(Type: text)* - Tên nút 2 (Mặc định: `XEM CÁC LOẠI PHÒNG`).
  9. `mr_hero_btn2_url` *(Type: text)* - Đường dẫn nút 2 (Mặc định: `#rooms`).
  10. `mr_hero_card_badge` *(Type: text)* - Tiêu đề thẻ nổi Floating Card (Mặc định: `Dịch vụ 5 sao`).
  11. `mr_hero_card_desc` *(Type: textarea)* - Nội dung thẻ nổi Floating Card.

---

## 🏢 2. Section 2: Room Types Grid (Lựa Chọn Không Gian Phù Hợp)
- **Mục đích:** Hiển thị danh sách các loại phòng họp (30m², 28m², v.v.) với đầy đủ thông số diện tích, sức chứa và tính năng.
- **Trường ACF (`group_lh_meeting` -> Tab 2. Danh Sách Phòng Họp):**
  1. `mr_rooms_title` *(Type: text)* - Tiêu đề section (Mặc định: `Lựa chọn không gian phù hợp`).
  2. `mr_rooms_list` *(Type: repeater)* - Danh sách các loại phòng họp:
     - `image` *(Type: image)* - Hình ảnh đại diện phòng.
     - `area` *(Type: text)* - Diện tích (VD: `30 m²`).
     - `title` *(Type: text)* - Tên phòng & sức chứa (VD: `Phòng họp 30 m² – 10 người`).
     - `capacity` *(Type: text)* - Mô tả sức chứa tiêu chuẩn (VD: `Sức chứa tiêu chuẩn: 10 người`).
     - `features` *(Type: wysiwyg)* - Danh sách các tính năng/ưu điểm nổi bật của phòng.
     - `price_text` *(Type: text)* - Chú thích giá (VD: `Liên hệ nhận báo giá`).
     - `btn_text` *(Type: text)* - Tên nút đặt phòng (Mặc định: `Đặt phòng`).
     - `btn_url` *(Type: text)* - Đường dẫn nút đặt phòng (Mặc định: `#booking`).

---

## ⚡ 3. Section 3: Specs & Amenities (Tiện Ích & Trang Thiết Bị Đi Kèm)
- **Mục đích:** Giới thiệu các trang thiết bị hiện đại (TV, Trà/Cà phê, IT Support) đi kèm theo tiêu chuẩn 5 sao.
- **Trường ACF (`group_lh_meeting` -> Tab 3. Tiện Ích & Thiết Bị):**
  1. `mr_amenities_title` *(Type: text)* - Tiêu đề section (Mặc định: `Tiện ích & Trang thiết bị đi kèm`).
  2. `mr_amenities_desc` *(Type: textarea)* - Mô tả cam kết chất lượng dịch vụ.
  3. `mr_amenities_image_1` *(Type: image)* - Hình ảnh minh họa 1.
  4. `mr_amenities_image_2` *(Type: image)* - Hình ảnh minh họa 2.
  5. `mr_amenities_list` *(Type: repeater)* - Danh sách tiện ích đi kèm:
     - `icon` *(Type: text)* - Mã Material Icon (VD: `tv`, `coffee`).
     - `title` *(Type: text)* - Tên tiện ích (VD: `Màn hình TV`, `Trà và cà phê`).
     - `desc` *(Type: textarea)* - Mô tả ngắn tiện ích.

---

## 📝 4. Section 4: Booking Form Section (Đặt Phòng Họp Ngay)
- **Mục đích:** Form đăng ký giữ chỗ và hotline tư vấn trực tiếp qua Airtable iframe.
- **Trường ACF (`group_lh_meeting` -> Tab 4. Đặt Phòng Họp):**
  1. `mr_booking_title` *(Type: text)* - Tiêu đề section (Mặc định: `Đặt phòng họp ngay`).
  2. `mr_booking_desc` *(Type: textarea)* - Mô tả hướng dẫn liên hệ.
  3. `mr_booking_hotline_label` *(Type: text)* - Nhãn Hotline (Mặc định: `Hotline tư vấn`).
