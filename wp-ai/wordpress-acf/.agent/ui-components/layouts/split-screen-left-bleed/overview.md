# Hướng dẫn bố cục: Hàng chia hai cột (Ảnh tràn viền trái)

Bố cục chia hai cột với phần hình ảnh/video nằm ở bên trái (có thể mở rộng tràn viền trái) và phần nội dung chữ ở bên phải là một mẫu thiết kế phổ biến, hiện đại. Dưới đây là hướng dẫn chi tiết cách dựng bố cục này bằng **Bootstrap 5**.

---

## 1. Cấu trúc HTML mẫu (Bootstrap 5)

Sử dụng hệ thống lưới Flexbox (`.row`) kết hợp tiện ích căn dọc giữa (`.align-items-center`) và sắp xếp lại cột trên thiết bị di động:

```html
<div class="jjyb container py-5">
  <div class="row align-items-center">
    
    <!-- Cột trái: Hình ảnh hoặc Video (Media Column) -->
    <div class="jjybt col-md-6 order-md-1">
      <img src="path/to/image.jpg" alt="Description" class="img-fluid rounded shadow-sm">
      
      <!-- Hoặc nếu là Video -->
      <!--
      <video class="w-100 rounded shadow-sm" controls poster="path/to/poster.png">
        <source src="path/to/video.mp4" type="video/mp4">
      </video>
      -->
    </div>
    
    <!-- Cột phải: Nội dung văn bản (Text Column) -->
    <div class="jjybw col-md-6 order-md-2 ps-md-5 mt-4 mt-md-0">
      <h3 class="fw-bold mb-3">Tiêu đề chính</h3>
      <h5 class="text-muted mb-4">Tiêu đề phụ hoặc thông điệp bổ trợ</h5>
      
      <p class="mb-2">Dòng mô tả đặc điểm 1</p>
      <p class="mb-2">Dòng mô tả đặc điểm 2</p>
      <p class="mb-2">Dòng mô tả đặc điểm 3</p>
    </div>
    
  </div>
</div>
```

---

## 2. Hướng dẫn Tích hợp PHP & ACF Pro

Bố cục này có thể dễ dàng quản lý động bằng trường **ACF Pro Flexible Content** với tên layout `layout_image_text` (hoặc `layout_video_text`).

```php
<?php
$image = get_sub_field( 'image' );
$pos   = get_sub_field( 'image_position' ) ?: 'left'; // Trái / Phải
$title = get_sub_field( 'title' );
$sub   = get_sub_field( 'subtitle' );
$lines = get_sub_field( 'description_items' );

$wrapper_class = 'jjyb row align-items-center py-5';
$img_align     = 'order-md-1';
$text_align    = 'order-md-2 ps-md-5';

// Nếu là ảnh tràn viền phải
if ( $pos === 'right' ) {
	$wrapper_class .= ' jjyb1';
	$img_align     = 'order-md-2';
	$text_align    = 'order-md-1 pe-md-5';
}
?>
<div class="commen container">
  <div class="<?php echo esc_attr( $wrapper_class ); ?>">
    
    <!-- Cột ảnh/video -->
    <div class="jjybt col-md-6 <?php echo esc_attr( $img_align ); ?>">
      <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="img-fluid rounded shadow-sm">
    </div>
    
    <!-- Cột chữ -->
    <div class="jjybw col-md-6 <?php echo esc_attr( $text_align ); ?> mt-4 mt-md-0">
      <h3 class="fw-bold mb-3"><?php echo esc_html( $title ); ?></h3>
      <?php if ( ! empty( $sub ) ) : ?>
        <h5 class="text-muted mb-4"><?php echo esc_html( $sub ); ?></h5>
      <?php endif; ?>
      <?php if ( ! empty( $lines ) && is_array( $lines ) ) : ?>
        <?php foreach ( $lines as $row ) : ?>
          <p class="mb-2"><?php echo esc_html( $row['desc_val'] ); ?></p>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    
  </div>
</div>
```

---

## 3. Các lưu ý quan trọng về UX & Responsive
- **Thứ tự hiển thị (Order Mobile):** Lớp `.order-md-1` và `.order-md-2` đảm bảo rằng trên desktop, ảnh hiển thị trước (bên trái) và chữ hiển thị sau (bên phải). Nhưng trên di động (`<768px`), các cột sẽ tự động xếp chồng từ trên xuống dưới theo thứ tự xuất hiện trong HTML (ảnh nằm trên chữ).
- **Khoảng đệm (Spacing):** Thêm `.mt-4 .mt-md-0` vào cột chữ để tạo khoảng cách phía trên ảnh khi màn hình thu nhỏ về mobile, và triệt tiêu khoảng cách này khi ở màn hình desktop.
