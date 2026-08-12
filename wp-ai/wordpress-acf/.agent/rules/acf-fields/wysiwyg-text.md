# Quy tắc Cấu hình & Render Trình Soạn Thảo & Văn Bản (WYSIWYG & Text Fields)

Tài liệu này phân định ranh giới và cách render chuẩn an toàn giữa trường `wysiwyg`, `textarea` và `text`.

---

## 1. Phân Định Mục Đích Sử Dụng

| Loại Field | Khi Nào Sử Dụng? | Hàm Escape / Render Chuẩn | Lưu ý Quan Trọng |
| :--- | :--- | :--- | :--- |
| **`text`** | Tiêu đề ngắn, hotline, slogan, SKU, nút bấm. | `esc_html( $val )` | Không cho phép xuống dòng hoặc HTML tags. |
| **`textarea`** | Mô tả ngắn, trích dẫn, địa chỉ nhiều dòng. | `wpautop( esc_html( $val ) )` | Dùng `wpautop()` khi cần tự chuyển xuống dòng thành `<p>` và `<br>`. |
| **`wysiwyg`** | Bài viết chi tiết, Case Study, nội dung dài cần in đậm, nghiêng, gắn link. | `wp_kses_post( $val )` | **Tuyệt đối KHÔNG** bọc qua `wpautop()` vì WYSIWYG đã tự sinh thẻ `<p>`. |

---

## 2. Nguyên Tắc Render Chuẩn PHP

### A. Trường `wysiwyg` (WYSIWYG Editor)
```php
$content = get_field( 'portfolio_detail_content' ) ?: '';

if ( ! empty( $content ) ) :
?>
    <div class="entry-content rich-text">
        <?php 
        // Render an toàn chống XSS qua wp_kses_post, không dùng wpautop
        echo wp_kses_post( $content ); 
        ?>
    </div>
<?php 
endif;
```

### B. Trường `textarea` (Textarea nhiều dòng)
```php
$summary = get_field( 'portfolio_short_summary' ) ?: '';

if ( ! empty( $summary ) ) :
?>
    <div class="summary-text">
        <?php 
        // esc_html bảo mật chuỗi, sau đó wpautop tạo thẻ đoạn văn tự động
        echo wpautop( esc_html( $summary ) ); 
        ?>
    </div>
<?php 
endif;
```

### C. Trường `text` (Text đơn dòng)
```php
$sub_title = get_field( 'portfolio_subtitle' ) ?: '';

if ( ! empty( $sub_title ) ) :
?>
    <p class="subtitle"><?php echo esc_html( $sub_title ); ?></p>
<?php 
endif;
```
