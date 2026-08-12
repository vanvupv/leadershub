# Quy tắc Cấu hình & Render Trường Ảnh (ACF Image Field)

Tài liệu này định nghĩa các nguyên tắc bắt buộc khi khai báo và hiển thị trường Hình ảnh (`image`) và Bộ sưu tập (`gallery`) trong dự án.

---

## 1. Nguyên Tắc Khai Báo (PHP Declaration Rules)

* **Return Format (Định dạng trả về)**:
  * **Bắt buộc**: Luôn chọn `'return_format' => 'array'` (Mảng) hoặc `'return_format' => 'id'` (ID ảnh).
  * **Cấm tuyệt đối**: Không bao giờ chọn `'return_format' => 'url'`.
  * *Lý do*: Dùng URL trực tiếp sẽ không tận dụng được các hàm sinh ảnh tối ưu của WordPress (`wp_get_attachment_image`), làm mất khả năng tải ảnh Responsive (`srcset` & `sizes`) và mất thẻ SEO `alt`.

* **Preview Size**: Bắt buộc cài đặt `'preview_size' => 'medium'` hoặc `'thumbnail'` để khung hiển thị trong WP Admin gọn gàng, không bị vỡ layout khi Admin tải ảnh dung lượng lớn.

```php
array(
    'key'           => 'field_portfolio_hero_image',
    'label'         => 'Hình ảnh Hero Banner',
    'name'          => 'portfolio_hero_image',
    'type'          => 'image',
    'return_format' => 'array',
    'preview_size'  => 'medium',
    'library'       => 'all',
)
```

---

## 2. Nguyên Tắc Render ngoài Frontend

* **Nạp dữ liệu Safe Fallback**:
  ```php
  $hero_img = get_field( 'portfolio_hero_image' ) ?: array();
  ```

* **Kiểm tra empty trước khi mở HTML bao ngoài**:
  ```php
  if ( ! empty( $hero_img['id'] ) ) :
  ?>
      <div class="hero-image-wrap">
          <?php 
          // Ưu tiên dùng hàm chuẩn WordPress với ID ảnh
          echo wp_get_attachment_image( 
              $hero_img['id'], 
              'full', 
              false, 
              array( 
                  'class' => 'hero-img w-full h-auto object-cover',
                  'loading' => 'eager' // Hoặc 'lazy' cho ảnh bên dưới fold
              ) 
          ); 
          ?>
      </div>
  <?php 
  endif;
  ```

* **Trường hợp dùng 'return_format' => 'array'**:
  Có thể lấy thêm thẻ `alt` hoặc thông số `width`/`height` trực tiếp từ mảng `$hero_img['alt']`, `$hero_img['url']` nhưng vẫn ưu tiên xuất qua `wp_get_attachment_image( $hero_img['id'] )`.
