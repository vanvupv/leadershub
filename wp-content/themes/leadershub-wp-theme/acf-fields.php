<?php
/**
 * Programmatic ACF/SCF Field Registration.
 *
 * Defines field groups for Theme Settings and Custom Page Templates.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add Options Page for Theme Settings
if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title'    => 'Cấu hình Website Leaders Hub',
        'menu_title'    => 'Leaders Hub Options',
        'menu_slug'     => 'leadershub-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ) );
}

add_action( 'acf/init', 'leadershub_register_field_groups' );

function leadershub_register_field_groups() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    // 1. Theme Settings (Options Page)
    acf_add_local_field_group( array(
        'key' => 'group_lh_options',
        'title' => 'Thông tin chung (Global Options)',
        'fields' => array(
            array(
                'key' => 'field_lh_logo',
                'label' => 'Logo Website',
                'name' => 'lh_logo',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lh_hotline',
                'label' => 'Hotline hiển thị',
                'name' => 'lh_hotline',
                'type' => 'text',
                'default_value' => '+84 3789 19119',
            ),
            array(
                'key' => 'field_lh_hotline_url',
                'label' => 'Hotline link (tel:)',
                'name' => 'lh_hotline_url',
                'type' => 'text',
                'default_value' => 'tel:+84378919119',
            ),
            array(
                'key' => 'field_lh_email',
                'label' => 'Email',
                'name' => 'lh_email',
                'type' => 'text',
                'default_value' => 'contact@theleadershub.vn',
            ),
            array(
                'key' => 'field_lh_address',
                'label' => 'Địa chỉ chính',
                'name' => 'lh_address',
                'type' => 'textarea',
                'default_value' => 'Tầng 19, Tháp 1, Tòa nhà Capital Place, Số 29 Liễu Giai, P. Ngọc Khánh, Q. Ba Đình, Hà Nội',
            ),
            array(
                'key' => 'field_lh_map_url',
                'label' => 'Google Map Link',
                'name' => 'lh_map_url',
                'type' => 'text',
                'default_value' => 'https://maps.app.goo.gl/yQk3nU7pYk2cK1dXA',
            ),
            array(
                'key' => 'field_lh_facebook',
                'label' => 'Facebook / Messenger Link',
                'name' => 'lh_facebook',
                'type' => 'text',
                'default_value' => 'https://m.me/theleadershub',
            ),
            array(
                'key' => 'field_lh_zalo',
                'label' => 'Zalo Link',
                'name' => 'lh_zalo',
                'type' => 'text',
                'default_value' => 'https://zalo.me/84378919119',
            ),
            array(
                'key' => 'field_lh_linkedin',
                'label' => 'LinkedIn Link',
                'name' => 'lh_linkedin',
                'type' => 'text',
                'default_value' => '#',
            ),
            array(
                'key' => 'field_lh_form_office',
                'label' => 'Airtable Form URL - Văn phòng & Chỗ ngồi',
                'name' => 'lh_form_office',
                'type' => 'text',
                'default_value' => 'https://airtable.com/embed/app0nmwylnsZLQTuu/pag0tggimRE7gA3xw/form',
            ),
            array(
                'key' => 'field_lh_form_meeting',
                'label' => 'Airtable Form URL - Đặt Phòng họp',
                'name' => 'lh_form_meeting',
                'type' => 'text',
                'default_value' => 'https://airtable.com/embed/appVuZe9KkkvAwc2Y/pagJ4pWOKeV6FNhuB/form',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'leadershub-options',
                ),
            ),
        ),
    ) );

    // 2. Homepage fields
    acf_add_local_field_group( array(
        'key' => 'group_lh_home',
        'title' => 'Cấu hình Trang Chủ (Homepage)',
        'fields' => array(
            // TAB: HERO
            array(
                'key' => 'tab_home_hero',
                'label' => 'Hero Banner',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_hero_subtitle',
                'label' => 'Tiêu đề phụ (Subtitle / Badge)',
                'name' => 'home_hero_subtitle',
                'type' => 'text',
            ),
            array(
                'key' => 'field_home_hero_title',
                'label' => 'Tiêu đề chính',
                'name' => 'home_hero_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_home_hero_desc',
                'label' => 'Mô tả ngắn',
                'name' => 'home_hero_desc',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_home_hero_video',
                'label' => 'URL Video nền',
                'name' => 'home_hero_video',
                'type' => 'text',
            ),
            array(
                'key' => 'field_home_hero_poster',
                'label' => 'Ảnh dự phòng Video (Poster)',
                'name' => 'home_hero_poster',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_home_hero_btn_1',
                'label' => 'Nút bấm 1 (Link)',
                'name' => 'home_hero_btn_1',
                'type' => 'link',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_home_hero_btn_2',
                'label' => 'Nút bấm 2 (Link)',
                'name' => 'home_hero_btn_2',
                'type' => 'link',
                'return_format' => 'array',
            ),

            // TAB: SERVICES
            array(
                'key' => 'tab_home_services',
                'label' => 'Dịch Vụ',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_services_subtitle',
                'label' => 'Tiêu đề phụ / Subtitle',
                'name' => 'home_services_subtitle',
                'type' => 'text',
            ),
            array(
                'key' => 'field_home_services_title',
                'label' => 'Tiêu đề chính',
                'name' => 'home_services_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_home_services_repeater',
                'label' => 'Danh sách thẻ dịch vụ',
                'name' => 'home_services_list',
                'type' => 'repeater',
                'layout' => 'row',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_title',
                        'label' => 'Tên dịch vụ',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_desc',
                        'label' => 'Mô tả ngắn',
                        'name' => 'desc',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_service_link',
                        'label' => 'Link trang chi tiết',
                        'name' => 'link',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_image',
                        'label' => 'Hình ảnh',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                ),
            ),

            // TAB: PRICING
            array(
                'key' => 'tab_home_pricing',
                'label' => 'Bảng giá ảo',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_pricing_title',
                'label' => 'Tiêu đề chính',
                'name' => 'home_pricing_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_home_pricing_desc',
                'label' => 'Mô tả ngắn',
                'name' => 'home_pricing_desc',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_home_pricing_plans',
                'label' => 'Danh sách gói văn phòng ảo',
                'name' => 'home_pricing_plans',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_home_plan_name',
                        'label' => 'Tên gói',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_home_plan_desc',
                        'label' => 'Mô tả ngắn',
                        'name' => 'desc',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_home_plan_price',
                        'label' => 'Giá cước',
                        'name' => 'price',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_home_plan_features',
                        'label' => 'Tính năng (Mỗi dòng 1 tính năng)',
                        'name' => 'features',
                        'type' => 'textarea',
                    ),
                ),
            ),

            // TAB: GALLERY
            array(
                'key' => 'tab_home_gallery',
                'label' => 'Thư viện ảnh',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_gallery_subtitle',
                'label' => 'Tiêu đề phụ / Subtitle',
                'name' => 'home_gallery_subtitle',
                'type' => 'text',
                'default_value' => 'THƯ VIỆN HÌNH ẢNH',
            ),
            array(
                'key' => 'field_home_gallery_title',
                'label' => 'Tiêu đề chính',
                'name' => 'home_gallery_title',
                'type' => 'text',
                'default_value' => 'Không Gian Thực Tế Tại The Leaders Hub',
            ),
            array(
                'key' => 'field_home_gallery_images',
                'label' => 'Danh sách hình ảnh thực tế',
                'name' => 'home_gallery_images',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_gallery_img',
                        'label' => 'Hình ảnh',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_gallery_title',
                        'label' => 'Tên khu vực',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_gallery_desc',
                        'label' => 'Mô tả ngắn',
                        'name' => 'desc',
                        'type' => 'text',
                    ),
                ),
            ),

            // TAB: REVIEWS
            array(
                'key' => 'tab_home_reviews',
                'label' => 'Đánh Giá',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_reviews_subtitle',
                'label' => 'Tiêu đề phụ / Subtitle',
                'name' => 'home_reviews_subtitle',
                'type' => 'text',
            ),
            array(
                'key' => 'field_home_reviews_title',
                'label' => 'Tiêu đề chính',
                'name' => 'home_reviews_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_home_reviews_google_link',
                'label' => 'Link trang Google Review thực tế',
                'name' => 'home_reviews_google_link',
                'type' => 'text',
                'instructions' => 'Nhập URL xem đánh giá trực tiếp trên Google Maps (VD: https://maps.google.com/...)',
            ),
            array(
                'key' => 'field_home_reviews_google_score',
                'label' => 'Điểm & Số lượng đánh giá Google (VD: 4.9/5 (120+ reviews))',
                'name' => 'home_reviews_google_score',
                'type' => 'text',
            ),
            array(
                'key' => 'field_home_reviews_shortcode',
                'label' => 'Shortcode Plugin Google Reviews (Tự động đồng bộ)',
                'name' => 'home_reviews_shortcode',
                'type' => 'text',
                'instructions' => 'Dán Shortcode của Plugin Google Reviews tại đây (VD: [place_saved_reviews_widget] hoặc [trustindex no-registration=google])',
            ),
            array(
                'key' => 'field_home_reviews_list',
                'label' => 'Danh sách Review thủ công (Nếu không dùng Shortcode)',
                'name' => 'home_reviews_list',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_rev_name',
                        'label' => 'Tên khách hàng',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_rev_role',
                        'label' => 'Chức vụ',
                        'name' => 'role',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_rev_comment',
                        'label' => 'Nội dung đánh giá',
                        'name' => 'comment',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_rev_avatar',
                        'label' => 'Avatar / Viết tắt (VD: HA)',
                        'name' => 'avatar',
                        'type' => 'text',
                    ),
                ),
            ),

            // TAB: FAQ
            array(
                'key' => 'tab_home_faq',
                'label' => 'Câu Hỏi (FAQ)',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_faq_repeater',
                'label' => 'Danh sách FAQ',
                'name' => 'home_faq_list',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_faq_q',
                        'label' => 'Câu hỏi',
                        'name' => 'question',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_faq_a',
                        'label' => 'Câu trả lời',
                        'name' => 'answer',
                        'type' => 'textarea',
                    ),
                ),
            ),

            // TAB: NEWS
            array(
                'key' => 'tab_home_news',
                'label' => 'Tin Tức',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_news_title',
                'label' => 'Tiêu đề Section Tin Tức',
                'name' => 'home_news_title',
                'type' => 'text',
                'default_value' => 'Tin tức mới nhất',
            ),
            array(
                'key' => 'field_home_news_btn_text',
                'label' => 'Nút Xem Tất Cả (Text)',
                'name' => 'home_news_btn_text',
                'type' => 'text',
                'default_value' => 'Xem tất cả',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-trang-chu.php',
                ),
            ),
        ),
    ) );

    // 3. Virtual Office Template Fields (group_lh_virtual)
    acf_add_local_field_group( array(
        'key' => 'group_lh_virtual',
        'title' => 'Cấu hình Trang Địa Chỉ Doanh Nghiệp (Virtual Office)',
        'fields' => array(
            // TAB 1: HERO BANNER
            array(
                'key' => 'tab_vo_hero',
                'label' => '1. Hero Banner',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_vo_hero_badge',
                'label' => 'Badge nhỏ trên cùng',
                'name' => 'vo_hero_badge',
                'type' => 'text',
                'default_value' => 'Premium Business Solution',
            ),
            array(
                'key' => 'field_vo_hero_title',
                'label' => 'Tiêu đề chính Hero (Dòng 1)',
                'name' => 'vo_hero_title',
                'type' => 'text',
                'default_value' => 'Gói văn phòng cơ bản',
            ),
            array(
                'key' => 'field_vo_hero_subtitle',
                'label' => 'Tiêu đề phụ Hero (Dòng 2 màu vàng)',
                'name' => 'vo_hero_subtitle',
                'type' => 'text',
                'default_value' => 'Địa chỉ kinh doanh hạng A',
            ),
            array(
                'key' => 'field_vo_hero_desc',
                'label' => 'Mô tả ngắn Hero',
                'name' => 'vo_hero_desc',
                'type' => 'textarea',
                'default_value' => 'Thiết lập vị thế doanh nghiệp tại những tòa tháp tài chính biểu tượng. Giải pháp tối ưu chi phí, nâng tầm thương hiệu chuyên nghiệp ngay từ điểm khởi đầu.',
            ),
            array(
                'key' => 'field_vo_hero_image',
                'label' => 'Hình ảnh văn phòng Hero',
                'name' => 'vo_hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_vo_hero_btn1_text',
                'label' => 'Tên nút 1 (VD: Đăng ký tư vấn ngay)',
                'name' => 'vo_hero_btn1_text',
                'type' => 'text',
                'default_value' => 'Đăng ký tư vấn ngay',
            ),
            array(
                'key' => 'field_vo_hero_btn1_url',
                'label' => 'Đường dẫn nút 1 (VD: #register)',
                'name' => 'vo_hero_btn1_url',
                'type' => 'text',
                'default_value' => '#register',
            ),
            array(
                'key' => 'field_vo_hero_btn2_text',
                'label' => 'Tên nút 2 (VD: Xem bảng giá)',
                'name' => 'vo_hero_btn2_text',
                'type' => 'text',
                'default_value' => 'Xem bảng giá',
            ),
            array(
                'key' => 'field_vo_hero_btn2_url',
                'label' => 'Đường dẫn nút 2 (VD: #pricing)',
                'name' => 'vo_hero_btn2_url',
                'type' => 'text',
                'default_value' => '#pricing',
            ),

            // TAB 2: PRICING PLANS
            array(
                'key' => 'tab_vo_pricing',
                'label' => '2. Gói Dịch Vụ & Bảng Giá',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_vo_pricing_title',
                'label' => 'Tiêu đề Section Bảng Giá',
                'name' => 'vo_pricing_title',
                'type' => 'text',
                'default_value' => 'Các Gói Dịch Vụ Linh Hoạt',
            ),
            array(
                'key' => 'field_vo_pricing_desc',
                'label' => 'Mô tả mức giá khởi điểm',
                'name' => 'vo_pricing_desc',
                'type' => 'text',
                'default_value' => 'Chỉ từ 980,000đ/tháng để sở hữu địa chỉ kinh doanh đẳng cấp tại tòa tháp Capital Place.',
            ),
            array(
                'key' => 'field_vo_pricing_vat_note',
                'label' => 'Ghi chú thuế VAT',
                'name' => 'vo_pricing_vat_note',
                'type' => 'text',
                'default_value' => '(Giá chưa bao gồm VAT nếu áp dụng)',
            ),
            array(
                'key' => 'field_vo_plans',
                'label' => 'Danh sách gói dịch vụ (Repeater)',
                'name' => 'vo_plans',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_vo_plan_name',
                        'label' => 'Tên gói (VD: Gói Economy)',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_plan_desc',
                        'label' => 'Mô tả ngắn đối tượng (VD: Dành cho cá nhân khởi nghiệp)',
                        'name' => 'desc',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_plan_price',
                        'label' => 'Mức giá (VD: 980,000)',
                        'name' => 'price',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_plan_unit',
                        'label' => 'Đơn vị tính (VD: đ/tháng)',
                        'name' => 'unit',
                        'type' => 'text',
                        'default_value' => 'đ/tháng',
                    ),
                    array(
                        'key' => 'field_vo_plan_is_popular',
                        'label' => 'Đánh dấu gói nổi bật / Phổ biến nhất',
                        'name' => 'is_popular',
                        'type' => 'true_false',
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_vo_plan_popular_label',
                        'label' => 'Nhãn gói nổi bật (VD: Phổ biến nhất)',
                        'name' => 'popular_label',
                        'type' => 'text',
                        'default_value' => 'Phổ biến nhất',
                    ),
                    array(
                        'key' => 'field_vo_plan_features',
                        'label' => 'Danh sách tính năng / quyền lợi (Mỗi dòng 1 tính năng)',
                        'name' => 'features',
                        'type' => 'textarea',
                    ),
                ),
            ),

            // TAB 3: FEATURE COMPARISON
            array(
                'key' => 'tab_vo_comp',
                'label' => '3. Bảng So Sánh Tiện Ích',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_vo_comp_title',
                'label' => 'Tiêu đề Section So Sánh',
                'name' => 'vo_comp_title',
                'type' => 'text',
                'default_value' => 'So Sánh Tiện Ích',
            ),
            array(
                'key' => 'field_vo_comp_rows',
                'label' => 'Danh sách các hàng so sánh (Repeater)',
                'name' => 'vo_comp_rows',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_vo_comp_feature_name',
                        'label' => 'Tên dịch vụ & tiện ích',
                        'name' => 'feature_name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_comp_economy',
                        'label' => 'Gói Economy (Nhập: yes, no, hoặc text như: Tính phí lẻ)',
                        'name' => 'economy_val',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_comp_standard',
                        'label' => 'Gói Standard (Nhập: yes, no, hoặc text như: 4 giờ/tháng)',
                        'name' => 'standard_val',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_comp_premium',
                        'label' => 'Gói Premium (Nhập: yes, no, hoặc text như: 10 giờ/tháng)',
                        'name' => 'premium_val',
                        'type' => 'text',
                    ),
                ),
            ),

            // TAB 4: REGISTRATION PROCESS
            array(
                'key' => 'tab_vo_process',
                'label' => '4. Quy Trình 3 Bước',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_vo_process_title',
                'label' => 'Tiêu đề Quy Trình',
                'name' => 'vo_process_title',
                'type' => 'text',
                'default_value' => 'Quy Trình 3 Bước Đơn Giản',
            ),
            array(
                'key' => 'field_vo_process_steps',
                'label' => 'Các bước thực hiện (Repeater)',
                'name' => 'vo_process_steps',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_vo_step_num',
                        'label' => 'Số thứ tự (VD: 01, 02, 03)',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_step_icon',
                        'label' => 'Material Symbol Icon (VD: support_agent, history_edu, business_center)',
                        'name' => 'icon',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_step_title',
                        'label' => 'Tên bước (VD: Tư vấn giải pháp)',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_step_desc',
                        'label' => 'Mô tả bước',
                        'name' => 'desc',
                        'type' => 'textarea',
                    ),
                ),
            ),

            // TAB 5: ENVIRONMENT SHOWCASE
            array(
                'key' => 'tab_vo_showcase',
                'label' => '5. Hạ Tầng & Vì Sao Chọn',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_vo_showcase_badge',
                'label' => 'Badge nhỏ',
                'name' => 'vo_showcase_badge',
                'type' => 'text',
                'default_value' => 'VÌ SAO CHỌN THE LEADERS HUB',
            ),
            array(
                'key' => 'field_vo_showcase_title',
                'label' => 'Tiêu đề chính Section Showcase',
                'name' => 'vo_showcase_title',
                'type' => 'text',
                'default_value' => 'Hạ tầng chuẩn mực / Dịch vụ tận tâm',
            ),
            array(
                'key' => 'field_vo_showcase_content',
                'label' => 'Nội dung chi tiết (Chấp nhận HTML)',
                'name' => 'vo_showcase_content',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_vo_showcase_image',
                'label' => 'Hình ảnh lễ tân / không gian thực tế',
                'name' => 'vo_showcase_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_vo_showcase_badge_text',
                'label' => 'Nhãn trên thẻ hình ảnh',
                'name' => 'vo_showcase_badge_text',
                'type' => 'text',
                'default_value' => 'Tiêu chuẩn 5 sao',
            ),
            array(
                'key' => 'field_vo_showcase_card_desc',
                'label' => 'Mô tả thẻ nổi bật trên hình ảnh',
                'name' => 'vo_showcase_card_desc',
                'type' => 'textarea',
                'default_value' => 'Môi trường làm việc chuyên nghiệp được thiết kế theo tiêu chuẩn quốc tế.',
            ),

            // TAB 6: CONSULTATION FORM
            array(
                'key' => 'tab_vo_cta',
                'label' => '6. Form Tư Vấn & Đăng Ký',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_vo_cta_title',
                'label' => 'Tiêu đề Form Tư Vấn',
                'name' => 'vo_cta_title',
                'type' => 'text',
                'default_value' => 'Sẵn sàng để vươn xa?',
            ),
            array(
                'key' => 'field_vo_cta_desc',
                'label' => 'Mô tả Form Tư Vấn',
                'name' => 'vo_cta_desc',
                'type' => 'textarea',
                'default_value' => 'Hãy gửi yêu cầu của bạn, đội ngũ tư vấn viên của The Leaders Hub sẽ liên hệ tư vấn trong thời gian sớm nhất trong giờ làm việc.',
            ),

            // TAB 7: FAQS
            array(
                'key' => 'tab_vo_faq',
                'label' => '7. Câu Hỏi Thường Gặp (FAQ)',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_vo_faq_title',
                'label' => 'Tiêu đề Section FAQ',
                'name' => 'vo_faq_title',
                'type' => 'text',
                'default_value' => 'Câu hỏi thường gặp',
            ),
            array(
                'key' => 'field_vo_faq_list',
                'label' => 'Danh sách FAQ (Repeater)',
                'name' => 'vo_faq_list',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_vo_faq_q',
                        'label' => 'Câu hỏi',
                        'name' => 'question',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_faq_a',
                        'label' => 'Câu trả lời',
                        'name' => 'answer',
                        'type' => 'textarea',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-van-phong-ao.php',
                ),
            ),
        ),
    ) );

    // 5. Serviced Office Page Fields
    acf_add_local_field_group( array(
        'key' => 'group_lh_serviced',
        'title' => 'Cấu hình Trang Văn Phòng Cao Cấp (Serviced Office)',
        'fields' => array(
            // TAB 1: HERO BANNER
            array(
                'key' => 'tab_so_hero',
                'label' => '1. Hero Banner',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_so_hero_badge',
                'label' => 'Badge nhỏ Hero',
                'name' => 'so_hero_badge',
                'type' => 'text',
                'default_value' => 'DỊCH VỤ ĐẲNG CẤP',
            ),
            array(
                'key' => 'field_so_hero_title',
                'label' => 'Tiêu đề chính Dòng 1',
                'name' => 'so_hero_title',
                'type' => 'text',
                'default_value' => 'Văn phòng dịch vụ',
            ),
            array(
                'key' => 'field_so_hero_gold_title',
                'label' => 'Tiêu đề vàng Dòng 2',
                'name' => 'so_hero_gold_title',
                'type' => 'text',
                'default_value' => '(Serviced Office)',
            ),
            array(
                'key' => 'field_so_hero_desc',
                'label' => 'Mô tả ngắn',
                'name' => 'so_hero_desc',
                'type' => 'textarea',
                'default_value' => 'Giải pháp văn phòng riêng đầy đủ nội thất và dịch vụ vận hành chuyên nghiệp tiêu chuẩn 5 sao tại Capital Place.',
            ),
            array(
                'key' => 'field_so_hero_image',
                'label' => 'Hình ảnh nền Hero',
                'name' => 'so_hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_so_hero_btn1_text',
                'label' => 'Tên nút 1',
                'name' => 'so_hero_btn1_text',
                'type' => 'text',
                'default_value' => 'ĐẶT LỊCH THAM QUAN',
            ),
            array(
                'key' => 'field_so_hero_btn1_url',
                'label' => 'Đường dẫn nút 1',
                'name' => 'so_hero_btn1_url',
                'type' => 'text',
                'default_value' => '#booking-form',
            ),
            array(
                'key' => 'field_so_hero_btn2_text',
                'label' => 'Tên nút 2',
                'name' => 'so_hero_btn2_text',
                'type' => 'text',
                'default_value' => 'NHẬN BÁO GIÁ NGAY',
            ),
            array(
                'key' => 'field_so_hero_btn2_url',
                'label' => 'Đường dẫn nút 2',
                'name' => 'so_hero_btn2_url',
                'type' => 'text',
                'default_value' => '#booking-form',
            ),

            // TAB 2: INTRODUCTION
            array(
                'key' => 'tab_so_intro',
                'label' => '2. Giới Thiệu Không Gian',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_so_intro_title',
                'label' => 'Tiêu đề phần Giới thiệu',
                'name' => 'so_intro_title',
                'type' => 'text',
                'default_value' => 'Không gian riêng tư / Nâng tầm doanh nghiệp',
            ),
            array(
                'key' => 'field_so_intro_content',
                'label' => 'Nội dung giới thiệu (Chấp nhận HTML)',
                'name' => 'so_intro_content',
                'type' => 'wysiwyg',
                'default_value' => '<p>Tại The Leaders Hub, chúng tôi kiến tạo một hệ sinh thái làm việc chuyên nghiệp và đẳng cấp, nơi các nhà lãnh đạo và doanh nghiệp có thể tập trung hoàn toàn vào giá trị cốt lõi.</p><ul class="space-y-4"><li class="flex items-start gap-3"><span class="material-symbols-outlined text-prestige-gold mt-1">check_circle</span><span>Văn phòng riêng đầy đủ nội thất và dịch vụ vận hành (Serviced Office).</span></li><li class="flex items-start gap-3"><span class="material-symbols-outlined text-prestige-gold mt-1">check_circle</span><span>Thời gian thuê linh hoạt từ ngắn hạn đến dài hạn tùy nhu cầu.</span></li></ul>',
            ),
            array(
                'key' => 'field_so_intro_image_1',
                'label' => 'Hình ảnh giới thiệu 1',
                'name' => 'so_intro_image_1',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_so_intro_image_2',
                'label' => 'Hình ảnh giới thiệu 2',
                'name' => 'so_intro_image_2',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // TAB 3: UTILITIES GRID
            array(
                'key' => 'tab_so_utils',
                'label' => '3. Tiện Ích Đặc Quyền',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_so_utils_badge',
                'label' => 'Badge nhỏ góc trên',
                'name' => 'so_utils_badge',
                'type' => 'text',
                'default_value' => 'TIỆN ÍCH ĐẶC QUYỀN',
            ),
            array(
                'key' => 'field_so_utils_title',
                'label' => 'Tiêu đề Tiện ích',
                'name' => 'so_utils_title',
                'type' => 'text',
                'default_value' => 'Hơn cả một văn phòng',
            ),
            array(
                'key' => 'field_so_utils_list',
                'label' => 'Danh sách Tiện ích (Repeater)',
                'name' => 'so_utils_list',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_so_util_icon',
                        'label' => 'Material Icon',
                        'name' => 'icon',
                        'type' => 'text',
                        'default_value' => 'local_cafe',
                    ),
                    array(
                        'key' => 'field_so_util_title',
                        'label' => 'Tên tiện ích',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_so_util_desc',
                        'label' => 'Mô tả tiện ích',
                        'name' => 'desc',
                        'type' => 'textarea',
                    ),
                ),
            ),

            // TAB 4: REAL GALLERY
            array(
                'key' => 'tab_so_gallery',
                'label' => '4. Thư Viện Ảnh Thực Tế',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_so_gallery_title',
                'label' => 'Tiêu đề Gallery',
                'name' => 'so_gallery_title',
                'type' => 'text',
                'default_value' => 'Thư viện ảnh thực tế',
            ),
            array(
                'key' => 'field_so_gallery_desc',
                'label' => 'Mô tả Gallery',
                'name' => 'so_gallery_desc',
                'type' => 'text',
                'default_value' => 'Tham quan không gian làm việc hiện đại tại Capital Place.',
            ),
            array(
                'key' => 'field_so_gallery_image_1',
                'label' => 'Hình ảnh thực tế 1 (Lớn bên trái)',
                'name' => 'so_gallery_image_1',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_so_gallery_caption_1',
                'label' => 'Chú thích ảnh 1',
                'name' => 'so_gallery_caption_1',
                'type' => 'text',
                'default_value' => 'Khu vực Lounge sang trọng',
            ),
            array(
                'key' => 'field_so_gallery_image_2',
                'label' => 'Hình ảnh thực tế 2 (Phải - Trên)',
                'name' => 'so_gallery_image_2',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_so_gallery_caption_2',
                'label' => 'Chú thích ảnh 2',
                'name' => 'so_gallery_caption_2',
                'type' => 'text',
                'default_value' => 'Phòng họp Boardroom',
            ),
            array(
                'key' => 'field_so_gallery_image_3',
                'label' => 'Hình ảnh thực tế 3 (Phải - Dưới)',
                'name' => 'so_gallery_image_3',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_so_gallery_caption_3',
                'label' => 'Chú thích ảnh 3',
                'name' => 'so_gallery_caption_3',
                'type' => 'text',
                'default_value' => 'Khu vực Pantry hiện đại',
            ),

            // TAB 5: PRICING & CTA
            array(
                'key' => 'tab_so_cta',
                'label' => '5. Báo Giá & Đặt Lịch',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_so_cta_title',
                'label' => 'Tiêu đề CTA',
                'name' => 'so_cta_title',
                'type' => 'text',
                'default_value' => 'Sẵn sàng nâng tầm vị thế doanh nghiệp?',
            ),
            array(
                'key' => 'field_so_cta_desc',
                'label' => 'Mô tả CTA',
                'name' => 'so_cta_desc',
                'type' => 'textarea',
                'default_value' => 'Liên hệ ngay với The Leaders Hub để nhận được báo giá chi tiết và các chương trình ưu đãi đặc biệt cho gói Văn phòng dịch vụ (Serviced Office).',
            ),
            array(
                'key' => 'field_so_cta_price_label',
                'label' => 'Nhãn thông số 1',
                'name' => 'so_cta_price_label',
                'type' => 'text',
                'default_value' => 'Giá dịch vụ',
            ),
            array(
                'key' => 'field_so_cta_price_val',
                'label' => 'Giá trị thông số 1',
                'name' => 'so_cta_price_val',
                'type' => 'text',
                'default_value' => 'Liên hệ nhận báo giá',
            ),
            array(
                'key' => 'field_so_cta_price_sub',
                'label' => 'Phụ đề thông số 1',
                'name' => 'so_cta_price_sub',
                'type' => 'text',
                'default_value' => 'Theo diện tích và thời hạn',
            ),
            array(
                'key' => 'field_so_cta_capacity_label',
                'label' => 'Nhãn thông số 2',
                'name' => 'so_cta_capacity_label',
                'type' => 'text',
                'default_value' => 'Sức chứa',
            ),
            array(
                'key' => 'field_so_cta_capacity_val',
                'label' => 'Giá trị thông số 2',
                'name' => 'so_cta_capacity_val',
                'type' => 'text',
                'default_value' => '1 - 20 nhân sự',
            ),
            array(
                'key' => 'field_so_cta_capacity_sub',
                'label' => 'Phụ đề thông số 2',
                'name' => 'so_cta_capacity_sub',
                'type' => 'text',
                'default_value' => 'Tùy biến linh hoạt',
            ),

            // TAB 6: SERVICE STEPS
            array(
                'key' => 'tab_so_process',
                'label' => '6. Quy Trình 3 Bước',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_so_process_title',
                'label' => 'Tiêu đề Quy trình',
                'name' => 'so_process_title',
                'type' => 'text',
                'default_value' => 'Quy trình đăng ký dịch vụ',
            ),
            array(
                'key' => 'field_so_process_steps',
                'label' => 'Danh sách 3 bước (Repeater)',
                'name' => 'so_process_steps',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_so_step_num',
                        'label' => 'Số thứ tự',
                        'name' => 'number',
                        'type' => 'text',
                        'default_value' => '01',
                    ),
                    array(
                        'key' => 'field_so_step_title',
                        'label' => 'Tên bước',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_so_step_desc',
                        'label' => 'Mô tả bước',
                        'name' => 'desc',
                        'type' => 'textarea',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-van-phong-cao-cap.php',
                ),
            ),
        ),
    ) );

    // About Page Fields (group_lh_about)
    acf_add_local_field_group( array(
        'key' => 'group_lh_about',
        'title' => 'Cấu hình Trang Về Chúng Tôi (About Us)',
        'fields' => array(
            // TAB 1: HERO BANNER
            array(
                'key' => 'tab_about_hero',
                'label' => '1. Hero Banner',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_about_hero_image',
                'label' => 'Hình ảnh nền Hero',
                'name' => 'about_hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_about_hero_title',
                'label' => 'Tiêu đề chính Hero',
                'name' => 'about_hero_title',
                'type' => 'text',
                'default_value' => 'Về Chúng Tôi',
            ),
            array(
                'key' => 'field_about_hero_desc',
                'label' => 'Mô tả ngắn Hero',
                'name' => 'about_hero_desc',
                'type' => 'textarea',
                'default_value' => 'Hành trình kiến tạo không gian làm việc chuyên nghiệp bậc nhất dành cho các nhà lãnh đạo và doanh nghiệp tinh hoa.',
            ),

            // TAB 2: BRAND STORY
            array(
                'key' => 'tab_about_story',
                'label' => '2. Câu Chuyện Thương Hiệu',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_about_story_badge',
                'label' => 'Badge / Tiêu đề phụ',
                'name' => 'about_story_badge',
                'type' => 'text',
                'default_value' => 'Câu chuyện thương hiệu',
            ),
            array(
                'key' => 'field_about_story_title',
                'label' => 'Tiêu đề chính',
                'name' => 'about_story_title',
                'type' => 'text',
                'default_value' => 'Không gian làm việc chuyên nghiệp tại Capital Place',
            ),
            array(
                'key' => 'field_about_story_content',
                'label' => 'Nội dung chi tiết (Chấp nhận HTML)',
                'name' => 'about_story_content',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_about_story_image',
                'label' => 'Hình ảnh minh họa',
                'name' => 'about_story_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_about_stats',
                'label' => 'Chỉ số thống kê ấn tượng',
                'name' => 'about_stats',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_about_stat_number',
                        'label' => 'Con số (VD: 500+)',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_about_stat_label',
                        'label' => 'Mô tả nhãn (VD: Doanh nghiệp tin tưởng)',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                ),
            ),

            // TAB 3: CORE VALUES
            array(
                'key' => 'tab_about_values',
                'label' => '3. Giá Trị Cốt Lõi',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_about_values_title',
                'label' => 'Tiêu đề Section Giá Trị Cốt Lõi',
                'name' => 'about_values_title',
                'type' => 'text',
                'default_value' => 'Giá Trị Cốt Lõi',
            ),
            array(
                'key' => 'field_about_values_list',
                'label' => 'Danh sách Trụ Cột Giá Trị Cốt Lõi',
                'name' => 'about_values_list',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_value_icon',
                        'label' => 'Material Symbol Icon (VD: rocket_launch, visibility, diamond)',
                        'name' => 'icon',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_value_image',
                        'label' => 'Logo / Biểu tượng hình ảnh (Tùy chọn)',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_value_title',
                        'label' => 'Tên trụ cột (VD: Sứ mệnh, Tầm nhìn)',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_value_desc',
                        'label' => 'Mô tả nội dung',
                        'name' => 'desc',
                        'type' => 'textarea',
                    ),
                ),
            ),

            // TAB 4: CERTIFICATIONS
            array(
                'key' => 'tab_about_cert',
                'label' => '4. Chứng Nhận Tòa Nhà',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_about_cert_title',
                'label' => 'Tiêu đề Section Chứng Nhận',
                'name' => 'about_cert_title',
                'type' => 'text',
                'default_value' => 'Chứng nhận tòa nhà văn phòng Capital Place',
            ),
            array(
                'key' => 'field_about_cert_logos',
                'label' => 'Danh sách chứng nhận & logo',
                'name' => 'about_cert_logos',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_cert_name',
                        'label' => 'Tên chứng nhận (VD: LEED GOLD)',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_cert_logo',
                        'label' => 'Hình ảnh Logo chứng nhận',
                        'name' => 'logo',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                ),
            ),

            // TAB 5: REAL OFFICE GALLERY
            array(
                'key' => 'tab_about_gallery',
                'label' => '5. Hình Ảnh Thực Tế',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_about_gallery_title',
                'label' => 'Tiêu đề Section Hình Ảnh',
                'name' => 'about_gallery_title',
                'type' => 'text',
                'default_value' => 'Hình ảnh thực tế',
            ),
            array(
                'key' => 'field_about_gallery_desc',
                'label' => 'Mô tả phụ Section Hình Ảnh',
                'name' => 'about_gallery_desc',
                'type' => 'text',
                'default_value' => 'Khám phá không gian sống động tại The Leaders Hub',
            ),
            array(
                'key' => 'field_about_gallery_images',
                'label' => 'Thư viện ảnh thực tế không gian (Repeater)',
                'name' => 'about_gallery_images',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_gallery_img_file',
                        'label' => 'Hình ảnh thực tế',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_gallery_img_title',
                        'label' => 'Tên khu vực / Tên dịch vụ (VD: Lễ tân 5 sao)',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_gallery_img_desc',
                        'label' => 'Mô tả ngắn / Chú thích (Caption & Alt text)',
                        'name' => 'desc',
                        'type' => 'textarea',
                    ),
                ),
            ),

            // TAB 6: CTA & BROCHURE
            array(
                'key' => 'tab_about_cta',
                'label' => '6. Kêu Gọi Hành Động (CTA)',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_about_cta_title',
                'label' => 'Tiêu đề CTA',
                'name' => 'about_cta_title',
                'type' => 'text',
                'default_value' => 'Bạn đã sẵn sàng nâng tầm thương hiệu?',
            ),
            array(
                'key' => 'field_about_cta_desc',
                'label' => 'Mô tả CTA',
                'name' => 'about_cta_desc',
                'type' => 'textarea',
                'default_value' => 'Liên hệ ngay để nhận chương trình ưu đãi đặc biệt dành cho văn phòng dịch vụ trọn gói.',
            ),
            array(
                'key' => 'field_about_cta_btn_text',
                'label' => 'Tên nút kêu gọi (VD: Gửi yêu cầu ngay)',
                'name' => 'about_cta_btn_text',
                'type' => 'text',
                'default_value' => 'Gửi yêu cầu ngay',
            ),
            array(
                'key' => 'field_about_cta_btn_url',
                'label' => 'Đường dẫn nút kêu gọi (VD: /lien-he)',
                'name' => 'about_cta_btn_url',
                'type' => 'text',
                'default_value' => '/lien-he',
            ),
            array(
                'key' => 'field_about_brochure_text',
                'label' => 'Tên nút Brochure (VD: Tải brochure (PDF))',
                'name' => 'about_brochure_text',
                'type' => 'text',
                'default_value' => 'Tải brochure (PDF)',
            ),
            array(
                'key' => 'field_about_brochure_url',
                'label' => 'Đường dẫn File Brochure (PDF)',
                'name' => 'about_brochure_url',
                'type' => 'text',
                'default_value' => 'https://drive.google.com/file/d/17XgepUrAOqAzGUmikI9dgV8C7nMv3lF7/view?usp=sharing',
            ),
            array(
                'key' => 'field_about_cta_working_hours',
                'label' => 'Thời gian hỗ trợ',
                'name' => 'about_cta_working_hours',
                'type' => 'text',
                'default_value' => 'Hỗ trợ trong giờ làm việc',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-ve-chung-toi.php',
                ),
            ),
        ),
    ) );
}
