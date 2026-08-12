# Hướng dẫn bố cục: Lưới 3 cột (Three-Column Grid Rows)

Bố cục lưới chia làm 3 cột thường được sử dụng cho danh sách đặc tính ngắn, thông số hoặc giới thiệu dịch vụ nhanh. Dưới đây là hướng dẫn dựng bố cục này bằng **Bootstrap 5**.

---

## 1. Cấu trúc HTML mẫu (Bootstrap 5)

Sử dụng hệ thống lưới tự chia đều cột của Bootstrap 5 (`.row-cols-*`):

```html
<div class="commen container my-4 py-4 bg-light rounded shadow-sm">
  <div class="jjyab row row-cols-1 row-cols-md-3 g-3 text-center">
    
    <!-- Cột 1 -->
    <div class="col">
      <p class="mb-0 py-2 border-end border-md-end-none fw-semibold">Đặc tính số 1</p>
    </div>
    
    <!-- Cột 2 -->
    <div class="col">
      <p class="mb-0 py-2 border-end border-md-end-none fw-semibold">Đặc tính số 2</p>
    </div>
    
    <!-- Cột 3 -->
    <div class="col">
      <p class="mb-0 py-2 fw-semibold">Đặc tính số 3</p>
    </div>
    
  </div>
</div>
```

---

## 2. Hướng dẫn Tích hợp PHP & ACF Pro

Bố cục này được lặp động bằng **ACF Pro Repeater** với tên trường `text_list_items`.

```php
<?php
$items = get_sub_field( 'text_list_items' );
?>
<div class="commen container my-4 py-4 bg-light rounded shadow-sm">
  <div class="jjyab row row-cols-1 row-cols-md-3 g-3 text-center">
    <?php if ( ! empty( $items ) && is_array( $items ) ) : ?>
      <?php foreach ( $items as $row ) : ?>
        <div class="col">
          <p class="mb-0 py-2 border-end border-md-end-none fw-semibold">
            <?php echo esc_html( $row['text_val'] ); ?>
          </p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
```

---

## 3. Các lưu ý quan trọng về UX & Responsive
- **Tự động xếp cột:** Lớp `.row-cols-1 .row-cols-md-3` đảm bảo trên thiết bị di động, lưới sẽ hiển thị dạng danh sách xếp thẳng đứng (1 cột), và tự động chuyển thành hàng ngang 3 cột trên thiết bị có độ rộng màn hình lớn hơn (`md` >= 768px).
- **Đường viền ngăn cách:** Lớp `.border-end` tạo ra đường kẻ thẳng phân biệt các cột trên màn hình desktop, kết hợp với CSS tùy biến hoặc Bootstrap helpers để ẩn đường kẻ này khi hiển thị dọc trên mobile.
