# Hướng dẫn Kỹ thuật: Phát triển Custom Widget Elementor - Accordion Ngang (Horizontal Accordion)

Tài liệu này ghi nhận giải pháp phát triển một **Custom Widget Elementor** hoàn chỉnh để hiển thị khối Accordion ngang co giãn, giải quyết triệt để vấn đề hoán đổi 2 Icon (Normal/Active) không bị giật, cho phép kéo thả sắp xếp thứ tự trường nhập và tích hợp tùy biến vị trí Icon cùng Style chuyên nghiệp.

---

## 📂 1. Đăng ký Widget trong Theme Child

Để đăng ký custom widget an toàn cho cả theme cha và theme con, bạn dán đoạn mã sau vào cuối file [functions.php](file:///d:/xampp/htdocs/bro-tu062026/wp-content/themes/bro-tu/functions.php):

```php
/**
 * Register Custom Elementor Widgets
 */
function blocksy_child_register_custom_elementor_widgets( $widgets_manager ) {
    // Sử dụng get_stylesheet_directory() để hỗ trợ tốt nhất cho Theme Child
    require_once get_stylesheet_directory() . '/inc/elementor-widgets/class-elementor-horizontal-accordion-widget.php';
    $widgets_manager->register( new \Elementor_Horizontal_Accordion_Widget() );
}
add_action( 'elementor/widgets/register', 'blocksy_child_register_custom_elementor_widgets' );
```

---

## 📄 2. Mã nguồn Class Widget Elementor

Tạo hoặc đè tệp tin tại đường dẫn: `wp-content/themes/blocksy-child/inc/elementor-widgets/class-elementor-horizontal-accordion-widget.php`:

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Horizontal Accordion Widget.
 */
class Elementor_Horizontal_Accordion_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'horizontal-accordion';
	}

	public function get_title() {
		return esc_html__( 'Accordion Ngang', 'bro-tu' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {

		// Tab Content
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Nội dung', 'bro-tu' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		// 🌟 ĐƯA 2 ẢNH ICON LÊN ĐẦU TRÌNH NHẬP LIỆU (Dưới tiêu đề mục)
		$repeater->add_control(
			'item_icon_normal',
			[
				'label' => esc_html__( 'Icon Bình thường', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'item_icon_active',
			[
				'label' => esc_html__( 'Icon Active (Khi chọn)', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'item_title',
			[
				'label' => esc_html__( 'Tiêu đề', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Tầm nhìn của chúng tôi' , 'bro-tu' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'item_desc',
			[
				'label' => esc_html__( 'Mô tả chi tiết', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Mô tả chi tiết tại đây...', 'bro-tu' ),
			]
		);

		$this->add_control(
			'accordion_items',
			[
				'label' => esc_html__( 'Các khối Accordion', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_title' => esc_html__( 'Tầm nhìn của chúng tôi', 'bro-tu' ),
						'item_desc' => esc_html__( 'Xây dựng hệ sinh thái năng lượng thông minh, bền vững và lớn nhất thế giới cho loài người.', 'bro-tu' ),
					],
					[
						'item_title' => esc_html__( 'Sứ mệnh của chúng tôi', 'bro-tu' ),
						'item_desc' => esc_html__( 'Để mọi người hưởng được lợi ích từ năng lượng bền vững.', 'bro-tu' ),
					],
					[
						'item_title' => esc_html__( 'Giá trị của chúng tôi', 'bro-tu' ),
						'item_desc' => esc_html__( 'Sự đổi mới, ưu tú và định hướng khách hàng.', 'bro-tu' ),
					],
				],
				'title_field' => '{{{ item_title }}}',
			]
		);

		// 🌟 TÙY CHỌN VỊ TRÍ HÌNH ẢNH KHI ACTIVE (Trái, Trên, Phải)
		$this->add_control(
			'image_position_active',
			[
				'label' => esc_html__( 'Vị trí hình ảnh khi Active', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Bên trái', 'bro-tu' ),
						'icon' => 'eicon-h-align-left',
					],
					'top' => [
						'title' => esc_html__( 'Ở trên', 'bro-tu' ),
						'icon' => 'eicon-v-align-top',
					],
					'right' => [
						'title' => esc_html__( 'Bên phải', 'bro-tu' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'left',
				'toggle' => false,
			]
		);

		$this->end_controls_section();

		// Tab Style - Hình ảnh / Icon
		$this->start_controls_section(
			'image_style_section',
			[
				'label' => esc_html__( 'Hình ảnh / Icon', 'bro-tu' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_width',
			[
				'label' => esc_html__( 'Chiều rộng Icon', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .gy1b_at' => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .gy1b_at img' => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'image_margin',
			[
				'label' => esc_html__( 'Khoảng cách Icon (Margin)', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .gy1b_at' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '15',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
			]
		);

		// 🌟 TÙY CHỌN CĂN LỀ DỌC RIÊNG CHO ICON KHI ACTIVE (Chỉ hiển thị khi ảnh ở Trái/Phải)
		$this->add_control(
			'icon_vertical_alignment_active',
			[
				'label' => esc_html__( 'Căn lề dọc Icon khi Active', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Căn trên', 'bro-tu' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Căn giữa', 'bro-tu' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__( 'Căn dưới', 'bro-tu' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'flex-start',
				'toggle' => false,
				'condition' => [
					'image_position_active' => [ 'left', 'right' ],
				],
				'selectors' => [
					'{{WRAPPER}} .gy1b_a.gy1b_b .gy1b_at' => 'align-self: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_section();

		// Tab Style - Tiêu đề
		$this->start_controls_section(
			'title_style_section',
			[
				'label' => esc_html__( 'Tiêu đề', 'bro-tu' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .gy1b_title',
			]
		);

		$this->add_control(
			'title_color_normal',
			[
				'label' => esc_html__( 'Màu sắc bình thường', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .gy1b_a:not(.gy1b_b) .gy1b_title' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'title_color_active',
			[
				'label' => esc_html__( 'Màu sắc active', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .gy1b_a.gy1b_b .gy1b_title' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Khoảng cách Tiêu đề (Margin)', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .gy1b_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->end_controls_section();

		// Tab Style - Mô tả
		$this->start_controls_section(
			'desc_style_section',
			[
				'label' => esc_html__( 'Nội dung mô tả', 'bro-tu' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .gy1b_desc',
			]
		);

		$this->add_control(
			'desc_color_active',
			[
				'label' => esc_html__( 'Màu sắc mô tả (Active)', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .gy1b_desc' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => esc_html__( 'Khoảng cách Mô tả (Margin)', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .gy1b_desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->end_controls_section();

		// Tab Style - Khối chứa (Container)
		$this->start_controls_section(
			'container_style_section',
			[
				'label' => esc_html__( 'Khối chứa (Container)', 'bro-tu' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// 🌟 TRÌNH ĐIỀU CHỈNH CHIỀU CAO CỐ ĐỊNH CỦA KHỐI (Tránh Jank / Layout Shift)
		$this->add_responsive_control(
			'container_height',
			[
				'label' => esc_html__( 'Chiều cao của khối', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh', 'em' ],
				'range' => [
					'px' => [
						'min' => 150,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 350,
				],
				'selectors' => [
					'{{WRAPPER}} .gy1b' => 'height: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .gy1b_a' => 'height: 100% !important;',
				],
			]
		);

		// 🌟 TRÌNH ĐIỀU CHỈNH CĂN LỀ DỌC NỘI DUNG (Căn Trên, Giữa, Dưới)
		$this->add_control(
			'vertical_alignment',
			[
				'label' => esc_html__( 'Căn lề dọc nội dung', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Căn trên', 'bro-tu' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Căn giữa', 'bro-tu' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__( 'Căn dưới', 'bro-tu' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'center',
				'toggle' => false,
			]
		);

		// 🌟 TRÌNH ĐIỀU CHỈNH CĂN LỀ NGANG BÌNH THƯỜNG (Căn Trái, Giữa, Phải)
		$this->add_control(
			'horizontal_alignment_normal',
			[
				'label' => esc_html__( 'Căn lề ngang bình thường', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Căn trái', 'bro-tu' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Căn giữa', 'bro-tu' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Căn phải', 'bro-tu' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => false,
			]
		);

		// 🌟 TRÌNH ĐIỀU CHỈNH CĂN LỀ NGANG KHI ACTIVE (Căn Trái, Giữa, Phải)
		$this->add_control(
			'horizontal_alignment_active',
			[
				'label' => esc_html__( 'Căn lề ngang khi Active', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Căn trái', 'bro-tu' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Căn giữa', 'bro-tu' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Căn phải', 'bro-tu' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => false,
			]
		);

		$this->add_control(
			'active_flex_ratio',
			[
				'label' => esc_html__( 'Tỷ lệ phình to khi active', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1.5,
						'max' => 6,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3.5,
				],
			]
		);

		$this->add_control(
			'bg_color_normal',
			[
				'label' => esc_html__( 'Màu nền bình thường', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f3f4f6',
			]
		);

		$this->add_control(
			'bg_color_active',
			[
				'label' => esc_html__( 'Màu nền active', 'bro-tu' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#72b834',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$items = $settings['accordion_items'];
		$widget_id = $this->get_id();

		if ( empty( $items ) ) {
			return;
		}

		$flex_ratio = ! empty( $settings['active_flex_ratio']['size'] ) ? $settings['active_flex_ratio']['size'] : 3.5;
		$bg_normal = ! empty( $settings['bg_color_normal'] ) ? $settings['bg_color_normal'] : '#f3f4f6';
		$bg_active = ! empty( $settings['bg_color_active'] ) ? $settings['bg_color_active'] : '#72b834';
		$title_normal = ! empty( $settings['title_color_normal'] ) ? $settings['title_color_normal'] : '#000000';
		$title_active = ! empty( $settings['title_color_active'] ) ? $settings['title_color_active'] : '#ffffff';
		$desc_active = ! empty( $settings['desc_color_active'] ) ? $settings['desc_color_active'] : '#ffffff';
		$image_position = ! empty( $settings['image_position_active'] ) ? $settings['image_position_active'] : 'left';
		$vertical_align = ! empty( $settings['vertical_alignment'] ) ? $settings['vertical_alignment'] : 'center';
		$horizontal_align_active = ! empty( $settings['horizontal_alignment_active'] ) ? $settings['horizontal_alignment_active'] : 'left';
		$horizontal_align_normal = ! empty( $settings['horizontal_alignment_normal'] ) ? $settings['horizontal_alignment_normal'] : 'center';
		?>

		<style>
			/* CSS động được sinh ra dựa trên ID của Widget */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> {
				display: flex !important;
				gap: 20px !important;
				width: 100% !important;
			}

			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a {
				flex: 1 !important;
				background-color: <?php echo esc_attr( $bg_normal ); ?> !important;
				border-radius: 20px !important;
				padding: 30px 24px !important;
				cursor: pointer;
				overflow: hidden !important;
				display: flex !important;
				flex-direction: column !important;
				justify-content: <?php echo esc_attr( $vertical_align ); ?> !important; /* Căn dọc wrapper so với card tổng */
				transition: flex 0.6s cubic-bezier(0.25, 1, 0.5, 1), 
							background-color 0.4s ease, 
							color 0.4s ease !important;
			}

			/* Xếp dọc mặc định: Icon ở trên, Tiêu đề ở dưới khi chưa active */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a .gy1b_wrapper {
				display: flex !important;
				flex-direction: column !important;
				align-items: <?php echo esc_attr( $horizontal_align_normal === 'left' ? 'flex-start' : ($horizontal_align_normal === 'right' ? 'flex-end' : 'center') ); ?> !important; /* Căn ngang nội dung */
				text-align: <?php echo esc_attr( $horizontal_align_normal ); ?> !important; /* Căn lề text */
				gap: 15px !important;
				width: 100% !important;
				height: auto !important; /* Chiều cao tự nhiên để justify-content ở card cha hoạt động tốt */
				transition: none !important; /* Triệt tiêu reflow transition gây ra lỗi bay Icon */
			}

			/* KHUNG BỌC ẢNH CHỒNG LÊN NHAU ĐỂ TẠO HIỆU ỨNG TRƯỢT MƯỢT MÀ */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_at {
				position: relative !important;
				width: 60px; /* Bị ghi đè bởi Slider control image_width */
				height: 60px;
				margin: 0 0 15px 0 !important;
			}

			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a .t1,
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a .t2 {
				position: absolute !important;
				top: 0 !important;
				left: 0 !important;
				width: 100% !important;
				height: 100% !important;
				display: block !important;
				animation: none !important; /* Vô hiệu hóa các animation mặc định từ theme/plugin khác */
				transform-origin: center center !important; /* Đảm bảo zoom từ tâm, không bị nảy lệch góc */
				transition: opacity 0.5s cubic-bezier(0.34, 1.56, 0.64, 1), 
							transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
			}

			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a .t1 img,
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a .t2 img {
				width: 100% !important;
				height: 100% !important;
				object-fit: contain !important;
			}

			/* 🌟 HIỆU ỨNG ZOOM MỜ DẦN (FADE & ZOOM) KHI CHUYỂN ĐỔI ICON */
			/* Trạng thái bình thường: Icon lục hiện rõ (scale 1), Icon trắng ẩn và thu nhỏ biến mất (scale 0) */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a .t1 {
				opacity: 1 !important;
				transform: scale(1) !important;
				pointer-events: auto !important;
			}
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a .t2 {
				opacity: 0 !important;
				transform: scale(0) !important; /* Thu nhỏ hoàn toàn về 0 */
				pointer-events: none !important;
			}

			/* Trạng thái Active: Icon lục thu nhỏ về 0 rồi ẩn, Icon trắng zoom lớn từ 0 lên 1 */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a.gy1b_b .t1 {
				opacity: 0 !important;
				transform: scale(0) !important;
				pointer-events: none !important;
			}
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a.gy1b_b .t2 {
				opacity: 1 !important;
				transform: scale(1) !important; /* Phóng to lên 100% */
				pointer-events: auto !important;
			}

			/* Tiêu đề mặc định */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a .gy1b_title {
				display: block !important;
				font-size: 18px !important;
				color: <?php echo esc_attr( $title_normal ); ?> !important;
				font-weight: 700 !important;
				margin: 0 !important;
				transition: color 0.4s ease !important;
			}

			/* Mặc định: Ẩn mô tả */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a .gy1b_desc {
				display: none !important;
				opacity: 0;
				margin: 0 !important;
				transition: opacity 0.3s ease !important;
			}

			/* ==========================
			   Trạng thái Active
			   ========================== */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a.gy1b_b {
				flex: <?php echo esc_attr( $flex_ratio ); ?> !important;
				background-color: <?php echo esc_attr( $bg_active ); ?> !important;
			}

			/* 🌟 ĐỊNH VỊ BỐ CỤC WIDGET KHI ACTIVE THEO CẤU HÌNH DỌC/NGANG ĐỘNG */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a.gy1b_b .gy1b_wrapper {
				height: auto !important; /* Wrapper cao tự nhiên để justify-content ở card cha hoạt động tốt */
				text-align: <?php echo esc_attr( $horizontal_align_active ); ?> !important;
				<?php if ( $image_position === 'left' ) : ?>
					flex-direction: row !important;
					align-items: <?php echo esc_attr( $vertical_align ); ?> !important;
					justify-content: <?php echo esc_attr( $horizontal_align_active === 'center' ? 'center' : ($horizontal_align_active === 'right' ? 'flex-end' : 'flex-start') ); ?> !important;
					gap: 25px !important;
				<?php elseif ( $image_position === 'right' ) : ?>
					flex-direction: row-reverse !important;
					align-items: <?php echo esc_attr( $vertical_align ); ?> !important;
					justify-content: <?php echo esc_attr( $horizontal_align_active === 'center' ? 'center' : ($horizontal_align_active === 'right' ? 'flex-start' : 'flex-end') ); ?> !important;
					gap: 25px !important;
				<?php else : /* top */ ?>
					flex-direction: column !important;
					align-items: <?php echo esc_attr( $horizontal_align_active === 'left' ? 'flex-start' : ($horizontal_align_active === 'right' ? 'flex-end' : 'center') ) ; ?> !important;
					justify-content: <?php echo esc_attr( $vertical_align ); ?> !important;
					gap: 15px !important;
				<?php endif; ?>
			}

			/* Đảm bảo căn lề chữ bên trong đồng bộ với alignment */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a.gy1b_b .gy1b_content_text {
				text-align: <?php echo esc_attr( $horizontal_align_active ); ?> !important;
			}

			/* Tiêu đề khi active */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a.gy1b_b .gy1b_title {
				color: <?php echo esc_attr( $title_active ); ?> !important;
				font-size: 22px !important;
			}

			/* Hiển thị mô tả khi active */
			.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a.gy1b_b .gy1b_desc {
				display: block !important;
				opacity: 1 !important;
				color: <?php echo esc_attr( $desc_active ); ?> !important;
				font-size: 15px !important;
				line-height: 1.5 !important;
				margin-top: 8px !important;
				max-height: 200px !important; /* Chiều cao tối đa cho mô tả để tránh tràn khi khối cao cố định */
				overflow-y: auto !important; /* Tự động xuất hiện thanh cuộn dọc nếu mô tả quá dài */
			}

			/* Responsive */
			@media (max-width: 767px) {
				.gy1b-<?php echo esc_attr( $widget_id ); ?> {
					flex-direction: column !important;
				}
				.gy1b-<?php echo esc_attr( $widget_id ); ?> .gy1b_a.gy1b_b .gy1b_wrapper {
					flex-direction: column !important;
					text-align: center !important;
				}
			}
		</style>

		<div class="gy1b gy1b-<?php echo esc_attr( $widget_id ); ?>">
			<?php foreach ( $items as $index => $item ) : 
				$active_class = ( $index === 0 ) ? ' gy1b_b' : '';
				?>
				<div class="gy1b_a<?php echo esc_attr( $active_class ); ?>">
					<div class="gy1b_wrapper">
						<div class="gy1b_at">
							<?php if ( ! empty( $item['item_icon_normal']['url'] ) ) : ?>
								<div class="t1">
									<img src="<?php echo esc_url( $item['item_icon_normal']['url'] ); ?>" alt="<?php echo esc_attr( $item['item_title'] ); ?>">
								</div>
							<?php endif; ?>
							<?php if ( ! empty( $item['item_icon_active']['url'] ) ) : ?>
								<div class="t2">
									<img src="<?php echo esc_url( $item['item_icon_active']['url'] ); ?>" alt="<?php echo esc_attr( $item['item_title'] ); ?>">
								</div>
							<?php endif; ?>
						</div>
						<div class="gy1b_content_text">
							<span class="gy1b_title"><?php echo esc_html( $item['item_title'] ); ?></span>
							<div class="gy1b_desc">
								<?php echo wp_kses_post( $item['item_desc'] ); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<script>
		jQuery(document).ready(function($) {
			$('.gy1b-<?php echo esc_attr( $widget_id ); ?>').on('click', '.gy1b_a', function() {
				var $container = $(this).closest('.gy1b');
				$container.find('.gy1b_a').removeClass('gy1b_b');
				$(this).addClass('gy1b_b');
			});
		});
		</script>
		<?php
	}
}
```

---

## ⚡ 3. Giải pháp Hiệu ứng và Định vị Động
* **Đảo vị trí nhập liệu (Editor Layout)**: Trong repeater, mã nguồn đặt trường `item_icon_normal` và `item_icon_active` lên trên trường `item_title` giúp editor hiển thị khu vực chọn ảnh trực quan phía trên phần tiêu đề chữ.
* **Định vị ảnh động (Image Position)**: Control `image_position_active` (CHOOSE) cho phép người dùng chọn nhanh vị trí (Trái, Trên, Phải) của ảnh khi phóng to:
  * Trái: `flex-direction: row`.
  * Phải: `flex-direction: row-reverse`.
  * Trên: `flex-direction: column`.
* **Hiệu ứng Zoom mờ dần (Fade & Zoom)**: 
  * Vô hiệu hóa animation đè từ theme gốc bằng `animation: none !important`.
  * Khi thu nhỏ, ảnh trắng (`.t2`) có `transform: scale(0)` và `opacity: 0` (ẩn và thu nhỏ).
  * Khi active, ảnh lục (`.t1`) thu nhỏ `scale(0)` và ẩn đi. Ảnh trắng (`.t2`) phóng lớn `scale(1)` và hiện rõ lên ở tâm.
  * Tốc độ và gia tốc được tinh chỉnh nhẹ nhàng bằng `transition: opacity 0.5s cubic-bezier(0.34, 1.56, 0.64, 1), transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)`.
* **Khắc phục giật nảy chiều cao (Layout Shift / Jank)**:
  * Control `container_height` cấu hình chiều cao cố định cho hàng `.gy1b` và các item con kế thừa `height: 100%`.
  * Khi click chuyển đổi, chiều cao của cả khối tổng thể đứng im không biến động, triệt tiêu CLS giật cục màn hình.
  * Thêm thuộc tính `max-height: 200px` và `overflow-y: auto` vào đoạn mô tả `.gy1b_desc` để chữ tự động cuộn bên trong khối, không làm phá vỡ khung khi nội dung nhập quá dài so với chiều cao được chọn.
* **Căn chỉnh lề dọc (Vertical Alignment)**:
  * Control `vertical_alignment` cho phép người dùng chọn cách căn chỉnh lề dọc (Căn trên, Căn giữa, Căn dưới).
  * Trong CSS, giá trị này tự động map thành `justify-content` của card cha `.gy1b_a` (flex column) để trôi nổi wrapper ở chính giữa, mang lại cấu trúc cân đối tuyệt đối.
* **Căn chỉnh lề ngang khi Active (Horizontal Alignment Active)**:
  * Control `horizontal_alignment_active` cho phép căn lề ngang (Trái, Giữa, Phải) cho toàn bộ nội dung khi active.
  * Tự động điều hướng flexbox `align-items` của wrapper nếu ảnh ở trên đầu, và điều chỉnh `justify-content` kèm `text-align` nếu ảnh nằm bên trái/phải.
* **Căn lề dọc riêng của Icon khi Active (Icon Vertical Alignment Active)**:
  * Control `icon_vertical_alignment_active` cho phép căn lề dọc của Icon độc lập so với khối chữ (Căn đỉnh, Căn giữa, Căn dưới) thông qua thuộc tính `align-self` của CSS.
  * Giúp Icon thẳng hàng chuẩn mực với dòng Tiêu đề đầu tiên (`flex-start`) trong khi toàn bộ nội dung vẫn trôi nổi chính giữa card dọc.
