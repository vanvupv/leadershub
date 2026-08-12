# Hợp phần: Lightbox Popup Slider (Xem chi tiết dự án)

Hợp phần popup hiển thị danh sách hình ảnh dự án (dạng slide) kết hợp thông tin chi tiết và sản phẩm liên quan bên cạnh. Dưới đây là hướng dẫn tích hợp và vận hành bằng **Vanilla JS** và **Bootstrap 5**.

---

## 1. Cấu trúc HTML & Lớp Bootstrap 5

```html
<!-- Khung overlay Lightbox toàn màn hình -->
<div class="altc position-fixed top-0 start-0 w-100 h-100 bg-black bg-opacity-75" style="display: none; z-index: 1050;">
  
  <div class="altca position-absolute top-50 start-50 translate-middle bg-white rounded shadow-lg overflow-hidden" style="width: 90%; max-width: 1000px; height: 80vh;">
    
    <!-- Wrapper chứa danh sách dự án -->
    <div class="altca_width d-flex h-100">
      
      <!-- Slide của mỗi dự án -->
      <div class="altcb d-flex flex-column flex-md-row h-100 w-100">
        
        <!-- Khối bên trái: Trình chiếu ảnh chi tiết của dự án -->
        <div class="altcb_t position-relative w-100 w-md-50 bg-dark h-50 h-md-100">
          <div class="altcb_t_l position-absolute top-50 start-0 translate-middle-y z-3 cursor-pointer"><img src="prev-arrow.png" alt="prev"></div>
          <div class="altcb_t_r position-absolute top-50 end-0 translate-middle-y z-3 cursor-pointer"><img src="next-arrow.png" alt="next"></div>
          
          <!-- Ảnh chi tiết -->
          <img src="project-detail-1.jpg" alt="detail" class="imga w-100 h-100 object-fit-cover">
          <img src="project-detail-2.jpg" alt="detail" class="w-100 h-100 object-fit-cover" style="display: none;">
          
          <!-- Nút chọn chấm tròn -->
          <ul class="altcb_tul position-absolute bottom-0 start-50 translate-middle-x d-flex gap-2 list-unstyled z-3 mb-3">
            <li class="on rounded-circle bg-white" style="width: 10px; height: 10px;"></li>
            <li class="rounded-circle bg-white bg-opacity-50" style="width: 10px; height: 10px;"></li>
          </ul>
        </div>
        
        <!-- Khối bên phải: Nội dung văn bản và Sản phẩm liên quan -->
        <div class="altcb_b w-100 w-md-50 p-4 overflow-auto h-50 h-md-100">
          <div class="altcb_b1 mb-4">
            <h4 class="fw-bold">Tên dự án</h4>
            <h5 class="text-success mb-3">Danh mục dự án</h5>
            <p class="text-muted small">Mô tả chi tiết dự án...</p>
          </div>
          
          <!-- Sản phẩm liên quan -->
          <div class="altcb_b2 border-top pt-3">
            <p class="fw-bold small mb-3">Các sản phẩm liên quan</p>
            <div class="altcb_b2m row g-3">
              <div class="altcb_b2x col-4 text-center">
                <a href="#" class="text-decoration-none">
                  <div class="altcb_b2x_img mb-2 bg-light p-2 rounded">
                    <img src="product.png" alt="product" class="img-fluid">
                  </div>
                  <p class="text-dark small mb-0">Biến tần MIC</p>
                </a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
  
  <!-- Nút đóng Lightbox -->
  <div class="guanb position-absolute top-0 end-0 m-4 cursor-pointer" style="z-index: 1060;"><img src="close.png" alt="close"></div>
  <div class="altc_z position-absolute top-50 start-0 translate-middle-y ms-4 cursor-pointer"></div>
  <div class="altc_y position-absolute top-50 end-0 translate-middle-y me-4 cursor-pointer"></div>
</div>
```

---

## 2. Hướng dẫn Tích hợp JS thuần (Vanilla JS)
Xem mã nguồn điều khiển hoàn chỉnh trong tệp [He-thong-PV-dan-dung-Solutions-Growatt_clean.js](file:///d:/xampp/htdocs/bro-tu062026/wp-content/themes/bro-tu/Chi%20ti%E1%BA%BFt%20gi%E1%BA%A3i%20ph%C3%A1p%20--%20chu%E1%BA%A9n/He-thong-PV-dan-dung-Solutions-Growatt_clean.js).

1. **Đóng mở Lightbox:** Thao tác khóa cuộn màn hình bằng cách gán `document.documentElement.style.overflowY = 'hidden'` khi mở và `'auto'` khi đóng.
2. **Dịch chuyển Wrapper:** Sử dụng `transform: translate3d()` hoặc `margin-left` đi kèm `transition` CSS mượt mà để dịch chuyển slide dự án ngang bằng chiều rộng container.
