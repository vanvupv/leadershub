# Hướng dẫn Kỹ thuật: Sửa lỗi Lệch Vị trí & Chiều rộng của Elementor Mega Menu (Nested Menu)

Tài liệu này ghi nhận nguyên nhân và giải pháp xử lý triệt để hai lỗi giao diện nghiêm trọng khi thiết kế **Mega Menu bằng Widget Menu mới (Nested Menu) của Elementor Pro** nhằm đồng bộ kích thước với thanh Header lơ lửng.

---

## 🔍 Lỗi 1: Mega Menu bị lệch vị trí (JS Offset Calculation Error)

### 1. Hiện tượng
* Khi cuộn trang hoặc mở menu con, khối Mega Menu thả xuống bị bay lệch hẳn sang bên phải, hoặc nhảy vị trí lung tung.
* Lỗi này xảy ra khi ta cố gắng gỡ bỏ thuộc tính `position: relative` của các thẻ cha trung gian để ép dropdown nhận Header `.top` làm gốc.
* **Nguyên nhân**: Hệ thống Javascript của Elementor tính toán tọa độ tương đối của mục menu dựa trên thuộc tính `position` của thẻ cha. Khi ta ép thẻ cha thành `position: static`, biến `offsetLeft` tính toán bằng JS bị nhảy sai số, khiến nó gán giá trị `left` bậy bạ dạng inline style vào dropdown.

### 2. Giải pháp xử lý
* **Không can thiệp thẻ cha**: Giữ nguyên toàn bộ thuộc tính `position` mặc định của Elementor.
* **Định vị tuyệt đối theo màn hình (Viewport)**: Sử dụng **`position: fixed !important`** cho khối dropdown `.e-n-menu-content`. 
* Khi dùng `position: fixed`, dropdown sẽ định vị trực tiếp theo kích thước trình duyệt, bỏ qua mọi tính toán tương đối của Elementor JS. Ta dễ dàng căn giữa đối xứng khớp 100% với Header `.top` bằng:
  ```css
  left: 50% !important;
  transform: translateX(-50%) !important;
  ```

---

## 🔍 Lỗi 2: Khối nội dung con bị bóp hẹp (Inner Container Width Restriction)

### 1. Hiện tượng
* Thẻ vỏ bọc `.e-n-menu-content` đã được ép rộng bằng Header (`1642px`), nhưng khối nền trắng và nội dung chữ bên trong vẫn bị bóp nhỏ lại bằng chiều rộng của cụm menu chữ hoặc kích thước Boxed của Elementor.
* **Nguyên nhân**: Elementor Nested Menu tạo ra cấu trúc:
  `Vỏ bọc (.e-n-menu-content)` -> `Khối ruột (.elementor-element.e-con-boxed.e-child)`.
  Thẻ con trực tiếp (khối ruột) bị Elementor tự động gán thuộc tính inline CSS biến: **`style="width: var(--width);"`** để bóp hẹp chiều rộng.

### 2. Giải pháp xử lý
* Sử dụng selector con trực tiếp (`>`) để tác động vào khối ruột và triệt tiêu biến tính toán của Elementor:
  ```css
  .top .e-n-menu-content > .elementor-element {
      width: 100% !important;
      max-width: 100% !important;
      --width: 100% !important; /* Ghi đè biến CSS inline của Elementor */
  }
  ```

---

## 🛠️ Code CSS triển khai hoàn chỉnh

Dưới đây là đoạn code CSS tối ưu áp dụng cho cả 2 trạng thái: **Đầu trang (Header lơ lửng)** và **Khi cuộn trang (Header tràn viền)**:

```css
/* ==========================================================================
   TRẠNG THÁI 1: Khi ở đầu trang (Header đang lơ lửng bo góc)
   ========================================================================== */
   
/* 1. Ép vỏ bọc Mega Menu rộng bằng Header và căn giữa theo màn hình */
.top .e-n-menu-content {
    position: fixed !important;
    width: 1642px !important;
    max-width: calc(100% - 40px) !important; /* Tránh tràn trên màn hình nhỏ */
    left: 50% !important;
    transform: translateX(-50%) !important;
    margin-left: 0 !important;
    
    /* Vị trí sát mép dưới Header = Top của Header (57px) + Chiều cao Header (80px) */
    top: 137px !important; 
    
    border-radius: 0 0 20px 20px !important; /* Bo 2 góc dưới */
    border-top: none !important;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08) !important;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
}

/* 2. Ép ruột Mega Menu mở rộng tối đa theo vỏ bọc */
.top .e-n-menu-content > .elementor-element {
    width: 100% !important;
    max-width: 100% !important;
    --width: 100% !important; /* Ghi đè biến width inline */
}

/* ==========================================================================
   TRẠNG THÁI 2: Khi scroll xuống (Header có class .on tràn viền phẳng)
   ========================================================================== */
   
/* 1. Ép vỏ bọc Mega Menu tràn 100% màn hình phẳng */
.top.on .e-n-menu-content {
    width: 100vw !important;
    max-width: 100vw !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    
    /* Sát mép dưới Header lúc này = Chiều cao Header (80px) */
    top: 80px !important; 
    border-radius: 0px !important; /* Bỏ bo góc */
}

/* 2. Giữ ruột Mega Menu tràn 100% */
.top.on .e-n-menu-content > .elementor-element {
    width: 100% !important;
    max-width: 100% !important;
    --width: 100% !important;
}
```
