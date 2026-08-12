# Quy tắc Cấu hình & Render Các Trường Lựa Chọn (Choice & Toggle Fields)

Tài liệu này định nghĩa nguyên tắc xử lý trường `true_false`, `select`, `checkbox`, `radio` và `button_group`.

---

## 1. Nguyên Tắc Khai Báo (PHP Declaration Rules)

* **Trường `true_false` (Công tắc Bật/Tắt)**:
  * **Bắt buộc**: Luôn cài đặt `'ui' => 1` để giao diện hiển thị công tắc gạt trực quan.
  * Định nghĩa nhãn `'ui_on_text'` và `'ui_off_text'` nếu cần rõ nghĩa (ví dụ: "Hiển thị" / "Ẩn").

```php
array(
    'key'           => 'field_hero_show_overlay',
    'label'         => 'Lớp phủ màu tối (Overlay)',
    'name'          => 'hero_show_overlay',
    'type'          => 'true_false',
    'ui'            => 1,
    'ui_on_text'    => 'Bật Overlay',
    'ui_off_text'   => 'Tắt Overlay',
    'default_value' => 0,
)
```

---

## 2. Nguyên Tắc Render ngoài Frontend

### A. Kiểm tra công tắc `true_false` điều khiển UI

```php
$show_overlay = get_field( 'hero_show_overlay' ) ? true : false;
?>
<section class="hero-banner <?php echo $show_overlay ? 'has-overlay' : ''; ?>">
    <!-- Hero content -->
</section>
```

### B. Kiểm tra trường `select` chọn Style Giao diện

```php
$header_style = get_field( 'header_layout_style' ) ?: 'style-default';
?>
<header class="site-header <?php echo esc_attr( $header_style ); ?>">
    <!-- Header content -->
</header>
```
