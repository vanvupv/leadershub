# Quy tắc Cấu hình & Render Các Trường Liên Kết (Relational Fields)

Tài liệu này định nghĩa cách khai báo và tương tác với các trường liên kết dữ liệu (`post_object`, `relationship`, `taxonomy`, `user`).

---

## 1. Nguyên Tắc Khai Báo (PHP Declaration Rules)

* **Return Format**:
  * `'return_format' => 'object'` (Trả về WP_Post / WP_Term / WP_User Object): Khuyên dùng khi ngoài frontend cần lấy tiêu đề, permalink, thumbnail, excerpt.
  * `'return_format' => 'id'` (Trả về Post ID / Term ID): Khuyên dùng khi chỉ cần ID để chạy custom `WP_Query` mới hoặc tối ưu RAM bộ nhớ.

```php
// Ví dụ: Post Object chọn bài viết liên quan
array(
    'key'           => 'field_related_posts',
    'label'         => 'Bài viết liên quan',
    'name'          => 'related_posts',
    'type'          => 'post_object',
    'post_type'     => array( 'portfolio', 'post' ),
    'multiple'      => 1,
    'return_format' => 'object',
)
```

---

## 2. Nguyên Tắc Render ngoài Frontend

### A. Render `post_object` hoặc `relationship` (Trả về Mảng Object)

```php
$related_posts = get_field( 'related_posts' ) ?: array();

if ( ! empty( $related_posts ) ) :
?>
    <div class="related-posts-grid">
        <?php foreach ( $related_posts as $post_item ) : 
            // Lấy ID bài viết từ object
            $p_id    = $post_item->ID;
            $p_title = get_the_title( $p_id );
            $p_link  = get_permalink( $p_id );
        ?>
            <article class="post-card">
                <?php if ( has_post_thumbnail( $p_id ) ) : ?>
                    <a href="<?php echo esc_url( $p_link ); ?>">
                        <?php echo get_the_post_thumbnail( $p_id, 'medium', array( 'class' => 'card-img' ) ); ?>
                    </a>
                <?php endif; ?>
                <h3>
                    <a href="<?php echo esc_url( $p_link ); ?>"><?php echo esc_html( $p_title ); ?></a>
                </h3>
            </article>
        <?php endforeach; ?>
    </div>
<?php 
endif;
```

### B. Render `taxonomy` (Trả về Term Object)

```php
$categories = get_field( 'portfolio_custom_category' ) ?: array();

if ( ! empty( $categories ) ) :
?>
    <div class="term-tags">
        <?php foreach ( $categories as $term ) : 
            $term_name = $term->name ?: '';
            $term_link = get_term_link( $term );

            if ( empty( $term_name ) || is_wp_error( $term_link ) ) continue;
        ?>
            <a href="<?php echo esc_url( $term_link ); ?>" class="tag-pill">
                <?php echo esc_html( $term_name ); ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php 
endif;
```
