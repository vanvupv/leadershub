# Luồng và Kiến trúc Widget Slide Bản đồ Liên hệ (Contact World Map Slider Widget)

Tài liệu này mô tả kiến trúc kỹ thuật, cấu hình và luồng xử lý tương tác của Widget **Growatt Contact Map Slider** trong hệ thống giao diện Elementor.

---

## 1. Thông tin chung
- **Tên Widget**: `Growatt Contact Map Slider` (slug: `growatt-contact-map-slider`)
- **Tệp mã nguồn**: [class-elementor-contact-map-widget.php](file:///d:/xampp/htdocs/bro-tu062026/wp-content/themes/bro-tu/inc/elementor-widgets/class-elementor-contact-map-widget.php)
- **Đăng ký hệ thống**: Tích hợp thông qua hook `elementor/widgets/register` trong [functions.php](file:///d:/xampp/htdocs/bro-tu062026/wp-content/themes/bro-tu/functions.php).

---

## 2. Các tính năng kỹ thuật cốt lõi

### A. Định vị ghim Responsive theo phần trăm (%)
- Bản đồ nền là ảnh dạng phẳng. Các điểm ghim xanh lá (`.map-pin`) được định vị bằng CSS `position: absolute` với tọa độ `left` và `top` sử dụng đơn vị **phần trăm (%)**.
- Điều này đảm bảo khi trình duyệt co giãn, các ghim vị trí luôn dính chặt vào đúng địa danh trên bản đồ thế giới mà không bao giờ bị lệch.

### B. Tương tác liên kết hai chiều (Two-Way Interaction)
- **Từ Ghim sang Slide**: Click ghim tròn trên bản đồ $\rightarrow$ Trượt slider bên dưới đến thẻ chi nhánh tương ứng thông qua hàm: `swiper.slideTo(index)`.
- **Từ Slide sang Ghim**: Vuốt slide hoặc bấm nút điều hướng trái/phải ở dưới $\rightarrow$ Sự kiện `slideChange` của Swiper kích hoạt hàm `highlightPin(index)` để làm sáng điểm ghim xanh tương ứng và tạo hiệu ứng vòng tròn tỏa sáng (pulsing).

### C. Cơ chế tương thích Elementor Editor
- Khi người dùng chỉnh sửa thiết lập widget trong Elementor, Elementor sẽ render lại HTML của widget bằng AJAX mà không chạy lại sự kiện `jQuery(document).ready()`.
- Để tránh lỗi Swiper không chạy trong trình biên tập, mã JS được bọc trong IIFE và lắng nghe sự kiện đăng ký hook của Elementor:
  ```javascript
  jQuery(window).on('elementor/frontend/init', function() {
      elementorFrontend.hooks.addAction('frontend/element_ready/growatt-contact-map-slider.default', function() {
          initContactMapSlider_...();
      });
  });
  ```

### D. CSS Dự phòng (Flex Fallback) chống xếp dọc
- Để ngăn các slide xếp dọc thành cột lớn khi Swiper đang trong quá trình tải hoặc chưa kịp khởi chạy, widget áp dụng CSS dự phòng:
  ```css
  .swiper:not(.swiper-initialized) .swiper-wrapper {
      display: flex;
      gap: 30px;
  }
  ```

### E. Tùy biến Style & Nền trong suốt
- Thêm các tùy chọn căn chỉnh màu sắc/typography cho Tiêu đề và bo góc/độ mờ/bóng đổ cho Ảnh bản đồ trực tiếp tại tab **Style** của Elementor.
- Màu nền mặc định của widget wrapper được đặt là `transparent` để hoàn toàn tuân thủ các cài đặt màu nền/ảnh nền của Elementor Container/Section bên ngoài.

---

## 3. Cấu hình Swiper Slider hoạt động
- **Căn giữa slide hoạt động**: `centeredSlides: true` (ở mọi kích thước màn hình).
- **Số slide hiển thị đồng thời (`slidesPerView`)**:
  - Mobile: `1`
  - Tablet: `2`
  - Desktop: `3` (Hiển thị đồng thời cả 3 slide).
- **Slide active mặc định khi tải trang**: 
  - Đặt `initialSlide` động trỏ tới slide ở giữa: `Math.floor(totalSlides / 2)` (index `1` đối với 3 chi nhánh).
- **Giao diện thẻ Active**: 
  - Khối active có nền trắng tinh khiết (`#ffffff !important`) và viền màu xanh lá thương hiệu (`#6eb92b !important`), có bóng đổ đậm hơn.
  - Các khối hai bên (không active) hiển thị nền xám nhạt (`#f8fafc`) và viền xám mỏng (`#e2e8f0`).
