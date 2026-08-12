# Hướng dẫn Kỹ thuật: Hiệu ứng Zoom hình ảnh nhẹ khi Hover vào Card (Image Zoom on Hover)

Tài liệu này ghi lại cách thiết lập hiệu ứng tương tác cao cấp: **Hình ảnh zoom nhẹ khi hover vào thẻ card cha, trong khi bản thân khung card đứng yên**, giúp website có trải nghiệm mượt mà, sang trọng và không bị dịch chuyển giật cục.

---

## 💡 Ý tưởng thiết kế & Trải nghiệm người dùng (UX)
* Tránh sử dụng hiệu ứng dịch chuyển card lên trên (`transform: translateY(-8px)`) vì có thể gây lệch hàng hoặc che mất các phần tử xung quanh trên các dòng khít nhau.
* Thay vào đó, giữ card ngoài đứng yên (chỉ đổ bóng hoặc đổi màu viền nhẹ), và tác động trực tiếp vào hình ảnh bên trong bằng hiệu ứng zoom phóng lớn khoảng `8%` (`scale(1.08)`).
* Điều kiện bắt buộc: **Ảnh khi phóng to phải nằm gọn bên trong khung bọc của nó (không tràn đè lên chữ hoặc viền ngoài)**.

---

## 🛠️ Giải pháp CSS & HTML chuẩn

### 1. Cấu trúc HTML (Wrapper bọc ảnh)
Để ảnh không bị tràn ra ngoài khi zoom, ta **bắt buộc** phải bọc thẻ `<img>` trong một thẻ `<div>` có thuộc tính `overflow: hidden;`.

```html
<!-- Cấu trúc Card Sản phẩm / Dự án -->
<a href="#" class="card-link-wrapper">
  
  <!-- Hộp bọc hình ảnh giới hạn zoom -->
  <div class="card-image-box">
    <img src="product-image.jpg" alt="Product Name">
  </div>
  
  <!-- Nội dung chữ bên dưới -->
  <div class="card-body">
    <h5>Tên sản phẩm</h5>
  </div>

</a>
```

### 2. Cấu trúc CSS Cốt Lõi

```css
/* 1. Hộp chứa hình ảnh (Đảm bảo ẩn phần ảnh thừa khi phóng to) */
.card-image-box {
  overflow: hidden;      /* 🌟 CỰC KỲ QUAN TRỌNG: Cắt phần ảnh tràn ra ngoài */
  border-radius: 12px;   /* Bo góc cho khung ảnh */
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* 2. Thiết lập chuyển động mượt mà cho hình ảnh */
.card-image-box img {
  width: 100%;
  height: auto;
  object-fit: cover;
  
  /* Cấu hình transition với đường cong chuyển động mượt mà (cubic-bezier) */
  transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
}

/* 3. Hiệu ứng Zoom nhẹ hình ảnh khi HOVER vào thẻ cha (thẻ <a>) */
.card-link-wrapper:hover .card-image-box img {
  transform: scale(1.08); /* Zoom nhẹ lên 8% */
}

/* 4. Tương tác nhẹ cho khung card viền ngoài (đứng yên, chỉ đổi viền và đổ bóng) */
.card-link-wrapper {
  display: block;
  border: 1px solid #f1f5f9;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}
.card-link-wrapper:hover {
  border-color: #6eb92b; /* Đổi màu viền xanh lá */
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.05); /* Đổ bóng nhẹ dưới chân */
}
```

---

## ⚡ Các lưu ý quan trọng khi triển khai
1. **Thuộc tính `overflow: hidden`**: Nếu thiếu thuộc tính này trên thẻ cha bọc hình ảnh, ảnh khi zoom lên sẽ tràn đè lên các văn bản và phá vỡ cấu trúc bo góc của card.
2. **Transition**: Nên đặt thuộc tính `transition` trên ảnh gốc (`img`) chứ không đặt ở trạng thái `:hover` để đảm bảo khi di chuột ra ngoài, hình ảnh thu nhỏ lại cũng có chuyển động mượt mà.
3. **Độ lớn zoom**: Chỉ nên đặt `scale` từ `1.05` đến `1.1` (phóng to từ 5% đến 10%). Nếu zoom quá to (ví dụ `scale(1.3)`) sẽ khiến ảnh bị mờ hạt và tạo cảm giác giật cục cho người dùng.
