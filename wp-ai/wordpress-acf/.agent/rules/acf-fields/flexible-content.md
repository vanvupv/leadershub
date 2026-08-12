# Quy tắc Cấu hình & Render Flexible Content (ACF Flexible Content Field)

Tài liệu này định nghĩa cách xây dựng hệ thống Trang tùy biến nhiều Block (Page Builder Matrix) bằng Flexible Content.

---

## 1. Nguyên Tắc Khai Báo (PHP Declaration Rules)

* **Layout Name (`name`)**: Đặt tên layout chuẩn snake_case đại diện cho loại Section (như `hero_banner`, `services_grid`, `cta_box`, `testimonial_slider`).
* **Button Label**: Luôn khai báo `'button_label' => 'Thêm Block Layout'` để Admin thao tác rõ ràng.

```php
array(
    'key'          => 'field_page_builder_sections',
    'label'        => 'Trình dựng trang (Page Builder)',
    'name'         => 'page_builder_sections',
    'type'         => 'flexible_content',
    'button_label' => 'Thêm Block Nội Dung',
    'layouts'      => array(
        // Layout 1: Hero Block
        'layout_hero' => array(
            'key'        => 'layout_builder_hero',
            'name'       => 'hero_banner',
            'label'      => 'Hero Banner Block',
            'display'    => 'block',
            'sub_fields' => array(
                array(
                    'key'   => 'field_hero_title',
                    'label' => 'Tiêu đề Hero',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
            ),
        ),
        // Layout 2: CTA Block
        'layout_cta' => array(
            'key'        => 'layout_builder_cta',
            'name'       => 'cta_box',
            'label'      => 'Khối Kêu gọi Hành động (CTA)',
            'display'    => 'block',
            'sub_fields' => array(
                array(
                    'key'   => 'field_cta_headline',
                    'label' => 'Headline CTA',
                    'name'  => 'headline',
                    'type'  => 'text',
                ),
            ),
        ),
    ),
)
```

---

## 2. Nguyên Tắc Render ngoài Frontend

* **Mô hình Modular Partial Files**: Tách từng layout thành các template part riêng trong thư mục `template-parts/blocks/` để code gọn gàng, bảo trì dễ dàng.

```php
<?php
$builder_sections = get_field( 'page_builder_sections' ) ?: array();

if ( ! empty( $builder_sections ) ) :
    foreach ( $builder_sections as $section ) :
        $layout = $section['acf_fc_layout'] ?: '';

        if ( empty( $layout ) ) continue;

        // Gọi Template Part theo layout name
        get_template_part( 
            'template-parts/blocks/block', 
            $layout, 
            array( 'block_data' => $section ) // Truyền dữ liệu block vào template part (WP 5.5+)
        );
    endforeach;
endif;
?>
```

### Mẫu File Template Part (`template-parts/blocks/block-hero_banner.php`):
```php
<?php
$data  = $args['block_data'] ?: array();
$title = $data['title'] ?: '';

if ( empty( $title ) ) return; // Skip block nếu không có dữ liệu
?>
<section class="block-hero">
    <h2><?php echo esc_html( $title ); ?></h2>
</section>
```
