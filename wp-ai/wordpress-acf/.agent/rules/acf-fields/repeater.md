# Quy tắc Cấu hình & Render Trường Lặp (ACF Repeater Field)

Tài liệu này định nghĩa các quy tắc chuẩn hóa khi làm việc với trường dữ liệu lặp đi lặp lại (`repeater`).

---

## 1. Nguyên Tắc Khai Báo (PHP Declaration Rules)

* **Layout**:
  * `'layout' => 'table'`: Sử dụng cho mảng dữ liệu ngắn, ít field con (dưới 4 fields) như danh sách chỉ số stats, social icons.
  * `'layout' => 'row'` hoặc `'block'`: Sử dụng cho mảng dữ liệu phức tạp, chứa nhiều field con (nội dung, ảnh, link).
* **Button Label**: Luôn định nghĩa rõ ràng `'button_label' => 'Thêm [tên phần tử]'` (Ví dụ: "Thêm câu hỏi FAQ", "Thêm đối tác").
* **Collapsed**: Cấu hình thuộc tính `'collapsed' => 'field_key_title'` trỏ về field key của tiêu đề con để tự động thu gọn các dòng khi Admin soạn thảo.

```php
array(
    'key'          => 'field_faq_list',
    'label'        => 'Danh sách câu hỏi thường gặp',
    'name'         => 'faq_list',
    'type'         => 'repeater',
    'layout'       => 'block',
    'button_label' => 'Thêm câu hỏi mới',
    'collapsed'    => 'field_faq_question',
    'sub_fields'   => array(
        array(
            'key'   => 'field_faq_question',
            'label' => 'Câu hỏi',
            'name'  => 'question',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_faq_answer',
            'label' => 'Câu trả lời',
            'name'  => 'answer',
            'type'  => 'wysiwyg',
        ),
    ),
)
```

---

## 2. Nguyên Tắc Render ngoài Frontend

### Cách 1: Sử dụng Mảng `foreach` (Khuyên dùng - Hiệu năng cao & An toàn PHP 8.1+)

```php
$faq_list = get_field( 'faq_list' ) ?: array();

// 1. Kiểm tra danh sách rỗng trước khi mở HTML bao ngoài
if ( ! empty( $faq_list ) ) :
?>
    <div class="faq-accordion">
        <?php foreach ( $faq_list as $item ) : 
            $question = $item['question'] ?: '';
            $answer   = $item['answer'] ?: '';

            // 2. Bắt buộc kiểm tra rỗng phần tử cốt lõi con -> skip item trống
            if ( empty( $question ) ) {
                continue;
            }
        ?>
            <div class="faq-item">
                <h3 class="faq-title"><?php echo esc_html( $question ); ?></h3>
                <?php if ( ! empty( $answer ) ) : ?>
                    <div class="faq-answer"><?php echo wp_kses_post( $answer ); ?></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php 
endif; 
```

### Cách 2: Sử dụng `have_rows()` / `the_row()` (Chuẩn API ACF)
```php
if ( have_rows( 'faq_list' ) ) :
?>
    <div class="faq-accordion">
        <?php while ( have_rows( 'faq_list' ) ) : the_row();
            $question = get_sub_field( 'question' ) ?: '';
            $answer   = get_sub_field( 'answer' ) ?: '';

            if ( empty( $question ) ) continue;
        ?>
            <div class="faq-item">
                <h3 class="faq-title"><?php echo esc_html( $question ); ?></h3>
                <?php if ( ! empty( $answer ) ) : ?>
                    <div class="faq-answer"><?php echo wp_kses_post( $answer ); ?></div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php
endif;
```
