# Hướng dẫn xây dựng Widget Elementor tùy chỉnh cho WooCommerce Loop Grid

Tài liệu này lưu trữ kiến thức kiến trúc và lập trình về phương pháp xây dựng một **Widget Elementor độc lập (Self-contained)** đại diện cho một thẻ sản phẩm đơn lẻ (Product Card) để lặp bên trong **Elementor Loop Grid**.

---

## 1. Khái niệm Kiến trúc: Hybrid Loop Grid (Loop Lai)

### Vấn đề của Elementor Loop Grid truyền thống
Thông thường, để thiết kế một thẻ sản phẩm lặp trong Loop Grid, lập trình viên sẽ kéo thả các Widget nhỏ của Elementor (Ảnh đại diện, Tiêu đề, Giá, Nút thêm vào giỏ...) vào trong mẫu lặp (Loop Item Template).
* **Nhược điểm lớn nhất**: Hiệu năng máy chủ cực kỳ kém. Khi render danh sách $N$ sản phẩm, Elementor phải nạp và biên dịch lặp lại đệ quy hàng chục widget con nhỏ, làm tăng thời gian phản hồi máy chủ (**TTFB**) đáng kể.
* **Hạn chế giao diện**: Khó kiểm soát cấu trúc HTML phẳng và viết CSS cho các hiệu ứng hover nâng cao (zoom ảnh, hiện overlay nút bấm, icon góc trái).

### Giải pháp Hybrid Loop Grid
Tự xây dựng một **Widget Elementor đại diện cho toàn bộ thẻ sản phẩm** (ví dụ: `Thẻ Sản Phẩm Growatt`). 
1. Bạn chỉ kéo **đúng 1 Widget** này vào Loop Item Template.
2. Elementor chỉ cần chạy đúng $N$ lần cho $N$ sản phẩm.
3. Toàn bộ giao diện thẻ được kết xuất trực tiếp bằng mã HTML/PHP gốc vô cùng nhẹ, tăng tốc độ tải trang gấp 5 - 10 lần.

---

## 2. Cách đồng bộ dữ liệu động WooCommerce trong Loop

Khi Elementor Loop Grid chạy qua từng sản phẩm, nó sẽ thiết lập sẵn **Ngữ cảnh bài viết toàn cục (Global Post Context)** cho sản phẩm đó. Do đó, trong hàm `render()` của widget tùy chỉnh, lập trình viên chỉ cần gọi các hàm WordPress và WooCommerce chuẩn:

* `get_the_ID()`: Lấy ID sản phẩm hiện tại trong vòng lặp.
* `get_the_title()` / `get_permalink()`: Lấy tiêu đề và đường dẫn sản phẩm hiện tại.
* `get_field( 'key_acf', $post_id )`: Lấy giá trị các trường tùy chỉnh ACF của sản phẩm đó.
* Đối tượng toàn cục `$product`:
  ```php
  global $product;
  if ( ! is_a( $product, 'WC_Product' ) ) {
      $product = wc_get_product( get_the_ID() );
  }
  ```
  Giúp lấy thông tin WooCommerce chuyên sâu (giá tiền `$product->get_price_html()`, link thêm giỏ `$product->add_to_cart_url()`, v.v.).

---

## 3. Kỹ thuật Đóng gói CSS một lần duy nhất (Static CSS Guard)

### Thách thức
Khi đóng gói toàn bộ CSS vào bên trong file PHP của Widget để đảm bảo tính di động (portable), nếu chỉ in thẻ `<style>` thông thường trong hàm `render()`, trình duyệt sẽ bị lặp mã CSS $N$ lần tương ứng với số sản phẩm.

### Giải pháp Chốt chặn tĩnh (Static Variable Guard)
Sử dụng một biến tĩnh `static $css_printed` trong PHP. Biến tĩnh này lưu giữ giá trị qua các lần chạy hàm `render()` trong cùng một phiên tải trang:

```php
// Khai báo biến tĩnh chống trùng lặp CSS
static $css_printed = false;

if ( ! $css_printed ) {
    $css_printed = true;
    ?>
    <style>
        .cplya_ba {
            width: 100%;
            background-color: transparent;
            /* ... Toàn bộ CSS nằm tại đây ... */
        }
        /* Các hiệu ứng Hover phóng to ảnh, xuất hiện nút */
        .cplya_ba:hover .product-image-wrap img {
            transform: scale(1.08);
        }
    </style>
    <?php
}
```

* **Cơ chế**: Thẻ `<style>` chỉ được render ra trình duyệt **duy nhất 1 lần** ở sản phẩm đầu tiên của Grid. Từ sản phẩm thứ 2 trở đi, biến `$css_printed` đã là `true` nên khối CSS sẽ bị bỏ qua, giúp mã nguồn HTML trả về cực kỳ sạch sẽ và tối ưu hóa tối đa.

---

## 4. Code mẫu triển khai Widget hoàn chỉnh

Tệp tin mẫu: [class-elementor-product-card-widget.php](file:///d:/xampp/htdocs/bro-tu062026/wp-content/themes/bro-tu/inc/elementor-widgets/class-elementor-product-card-widget.php)

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Growatt Product Card Widget.
 *
 * Custom product card widget to be used inside Loop Grid templates.
 * Supports displaying up to 3 custom ACF fields and hover zoom/slide animations.
 */
class Elementor_Product_Card_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'growatt-product-card';
	}

	public function get_title() {
		return esc_html__( 'Thẻ Sản Phẩm Growatt', 'bro-tu' );
	}

	public function get_icon() {
		return 'eicon-product-images';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'product', 'card', 'growatt', 'loop', 'grid', 'acf' ];
	}

	protected function register_controls() {

		/* =====================================================================
		   TAB CONTENT - Cấu hình nội dung & ACF
		   ===================================================================== */
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Cài đặt Sản phẩm & ACF', 'bro-tu' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'acf_key_1',
			[
				'label'       => esc_html__( 'ACF Key 1 (Công suất/Thông số 1)', 'bro-tu' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => 'cong_suat',
				'placeholder' => 'Nhập key ACF hoặc chọn Dynamic Tag',
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'acf_key_2',
			[
				'label'       => esc_html__( 'ACF Key 2 (Thông số 2)', 'bro-tu' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => 'mppt',
				'placeholder' => 'Nhập key ACF hoặc chọn Dynamic Tag',
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'acf_key_3',
			[
				'label'       => esc_html__( 'ACF Key 3 (Thông số 3)', 'bro-tu' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => 'pha',
				'placeholder' => 'Nhập key ACF hoặc chọn Dynamic Tag',
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Chữ nút bấm', 'bro-tu' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Xem chi tiết', 'bro-tu' ),
				'placeholder' => esc_html__( 'Nhập chữ trên nút...', 'bro-tu' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'button_icon',
			[
				'label'       => esc_html__( 'Icon nút bấm', 'bro-tu' ),
				'type'        => \Elementor\Controls_Manager::ICONS,
				'default'     => [
					'value'   => '',
					'library' => '',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'default'   => 'medium',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		/* =====================================================================
		   TAB STYLE - Định dạng giao diện
		   ===================================================================== */
		$this->start_controls_section(
			'style_image_section',
			[
				'label' => esc_html__( 'Hình ảnh', 'bro-tu' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label'      => esc_html__( 'Chiều rộng', 'bro-tu' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range'      => [
					'px' => [
						'min'  => 50,
						'max'  => 800,
						'step' => 5,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-image-wrap img' => 'width: {{SIZE}}{{UNIT}} !important; max-width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'image_ratio',
			[
				'label'      => esc_html__( 'Tỷ lệ hình ảnh (Aspect Ratio)', 'bro-tu' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0.2,
						'max'  => 3,
						'step' => 0.05,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-image-wrap' => 'aspect-ratio: {{SIZE}} !important; height: auto !important;',
					'{{WRAPPER}} .product-image-wrap img' => 'height: 100% !important; object-fit: contain !important;',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_title_section',
			[
				'label' => esc_html__( 'Tiêu đề sản phẩm', 'bro-tu' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Màu chữ', 'bro-tu' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cplya_ba h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .cplya_ba h6',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_badges_section',
			[
				'label' => esc_html__( 'Nhãn thông số (Badges)', 'bro-tu' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'badge_bg_color',
			[
				'label'     => esc_html__( 'Màu nền nhãn', 'bro-tu' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f5f5f5',
				'selectors' => [
					'{{WRAPPER}} .cplya_bap p' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'badge_text_color',
			[
				'label'     => esc_html__( 'Màu chữ nhãn', 'bro-tu' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#666666',
				'selectors' => [
					'{{WRAPPER}} .cplya_bap p span' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'badge_typography',
				'selector' => '{{WRAPPER}} .cplya_bap p',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Lấy ID và thông tin cơ bản từ ngữ cảnh loop sản phẩm hiện tại
		$post_id    = get_the_ID();
		$title      = get_the_title( $post_id );
		$permalink  = get_permalink( $post_id );
		$thumbnail_id = get_post_thumbnail_id( $post_id );

		// Tạo HTML hình ảnh sử dụng Elementor native size control
		$thumbnail_html = '';
		if ( $thumbnail_id ) {
			// Thiết lập khóa tạm thời để tương thích với Group_Control_Image_Size
			$settings['thumbnail'] = [
				'id' => $thumbnail_id,
			];
			$thumbnail_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail' );
		} else {
			// Fallback placeholder nếu không có ảnh đại diện
			$placeholder = function_exists( 'wc_placeholder_img_src' ) ? wc_placeholder_img_src() : '';
			$thumbnail_html = '<img src="' . esc_url( $placeholder ) . '" alt="" class="img">';
		}

		// Lấy giá trị ACF nếu plugin ACF đang hoạt động
		$val_1 = '';
		$val_2 = '';
		$val_3 = '';

		// Phân giải trường tùy chỉnh hoặc dynamic tag
		if ( ! empty( $settings['acf_key_1'] ) ) {
			$val_1 = $settings['acf_key_1'];
			if ( function_exists( 'get_field' ) ) {
				$acf_val = get_field( $settings['acf_key_1'], $post_id );
				if ( ! empty( $acf_val ) ) {
					$val_1 = $acf_val;
				}
			}
		}

		if ( ! empty( $settings['acf_key_2'] ) ) {
			$val_2 = $settings['acf_key_2'];
			if ( function_exists( 'get_field' ) ) {
				$acf_val = get_field( $settings['acf_key_2'], $post_id );
				if ( ! empty( $acf_val ) ) {
					$val_2 = $acf_val;
				}
			}
		}

		if ( ! empty( $settings['acf_key_3'] ) ) {
			$val_3 = $settings['acf_key_3'];
			if ( function_exists( 'get_field' ) ) {
				$acf_val = get_field( $settings['acf_key_3'], $post_id );
				if ( ! empty( $acf_val ) ) {
					$val_3 = $acf_val;
				}
			}
		}

		// Dữ liệu mẫu Demo nếu không có giá trị ACF (cho màn hình thiết kế Elementor Editor dễ nhìn)
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			if ( empty( $val_1 ) ) {
				$val_1 = '750-3300W';
			}
			if ( empty( $val_2 ) ) {
				$val_2 = '1 MPPT';
			}
			if ( empty( $val_3 ) ) {
				$val_3 = '1 pha';
			}
		}

		$button_text = ! empty( $settings['button_text'] ) ? $settings['button_text'] : esc_html__( 'Xem chi tiết', 'bro-tu' );
		$arrow_img   = get_stylesheet_directory_uri() . '/asset/index/img/g58.png';

		// Render CSS Stylesheet (chỉ in ra đúng 1 lần duy nhất trên mỗi trang để tối ưu hiệu năng)
		static $css_printed = false;
		if ( ! $css_printed ) {
			$css_printed = true;
			?>
			<style>
			.cplya_ba {
			  width: 100%;
			  background-color: transparent;
			  padding: 36px 20px 31px;
			  border-radius: 20px;
			  transition: all 0.3s ease-in-out;
			  position: relative;
			  border: 1px solid transparent;
			  text-align: center;
			  box-sizing: border-box;
			}
			.cplya_ba a {
			  text-decoration: none;
			  display: block;
			}
			.cplya_ba h6 {
			  font-size: 20px;
			  font-weight: 700;
			  color: #0f172a;
			  margin: 0 0 12px;
			  transition: color 0.3s ease;
			}
			.cplya_ba:hover h6 {
			  color: #6eb92b;
			}
			.cplya_bap {
			  display: flex;
			  justify-content: center;
			  gap: 8px;
			  margin-bottom: 24px;
			  flex-wrap: wrap;
			}
			.cplya_bap p {
			  background-color: #f5f5f5;
			  border-radius: 20px;
			  padding: 6px 16px;
			  margin: 0 !important;
			  font-size: 13px;
			  line-height: 1.2;
			  font-weight: 500;
			}
			.cplya_bap p span.inner-link {
			  color: #666666 !important;
			  pointer-events: none;
			}
			.product-image-wrap {
			  position: relative;
			  width: 100%;
			  height: 250px;
			  display: flex;
			  align-items: center;
			  justify-content: center;
			  overflow: hidden;
			  margin-bottom: 20px;
			}
			.product-image-wrap img {
			  max-width: 66%;
			  height: auto;
			  transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
			}
			.cplya_ba:hover .product-image-wrap img {
			  transform: scale(1.08);
			}
			.cplya_ba .a {
			  font-size: 16px;
			  color: #6eb92b;
			  font-weight: 700;
			  margin: 0 !important;
			  display: flex;
			  align-items: center;
			  justify-content: center;
			  opacity: 0;
			  transform: translateY(15px);
			  transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
			}
			.cplya_ba:hover .a {
			  opacity: 1;
			  transform: translateY(0);
			}
			.cplya_ba:hover {
			  background-color: #fafafa;
			  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.05);
			  border-color: transparent;
			  z-index: 2;
			}
			</style>
			<?php
		}
		?>
		<div class="cplya_ba">
			<a href="<?php echo esc_url( $permalink ); ?>">
				<h6><?php echo esc_html( $title ); ?></h6>
				<div class="cplya_bap">
					<?php if ( ! empty( $val_1 ) ) : ?>
						<p><span class="inner-link" data-href=""><?php echo esc_html( $val_1 ); ?></span></p>
					<?php endif; ?>
					<?php if ( ! empty( $val_2 ) ) : ?>
						<p><span class="inner-link" data-href=""><?php echo esc_html( $val_2 ); ?></span></p>
					<?php endif; ?>
					<?php if ( ! empty( $val_3 ) ) : ?>
						<p><span class="inner-link" data-href=""><?php echo esc_html( $val_3 ); ?></span></p>
					<?php endif; ?>
				</div>
				<div class="product-image-wrap">
					<?php echo $thumbnail_html; ?>
				</div>
				<p class="a">
					<?php echo esc_html( $button_text ); ?>
					<?php if ( ! empty( $settings['button_icon']['value'] ) ) : ?>
						<span class="button-icon" style="margin-left: 8px; display: inline-flex; align-items: center;">
							<?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</span>
					<?php else : ?>
						<img style="margin-left: 10px;" src="<?php echo esc_url( $arrow_img ); ?>" alt="">
					<?php endif; ?>
				</p>
			</a>
		</div>
		<?php
	}
}
```

---

## 5. Quy trình cấu hình trên Elementor

1. **Đăng ký Widget**:
   Đăng ký widget mới vào action hook `elementor/widgets/register` trong file `functions.php`.
2. **Thiết kế Loop Item**:
   * Truy cập **Elementor** $\rightarrow$ **Theme Builder** $\rightarrow$ Tạo mới một **Loop Item**.
   * Kéo thả duy nhất widget **Thẻ Sản Phẩm Growatt** vào vùng thiết kế. Thiết lập cột bọc ngoài có chiều rộng `100%` để lấp đầy ô lưới.
3. **Gọi hiển thị trong Loop Grid**:
   * Mở trang cửa hàng/sản phẩm chính $\rightarrow$ Kéo widget **Loop Grid** của Elementor vào trang.
   * Chọn Query source là **Products**.
   * Mục **Template** chọn đúng tên Loop Item bạn vừa lưu ở bước trên.
