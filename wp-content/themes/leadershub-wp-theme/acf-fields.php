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
                'key' => 'field_home_hero_title',
                'label' => 'Tiêu đề chính',
                'name' => 'home_hero_title',
                'type' => 'text',
                'default_value' => 'VĂN PHÒNG DỊCH VỤ THE LEADERS HUB - NƠI THÀNH CÔNG HỘI TỤ',
            ),
            array(
                'key' => 'field_home_hero_desc',
                'label' => 'Mô tả ngắn',
                'name' => 'home_hero_desc',
                'type' => 'textarea',
                'default_value' => 'Giải pháp văn phòng trọn gói - Tiện lợi - Linh hoạt - Chuyên nghiệp cho các lãnh đạo và doanh nghiệp hàng đầu.',
            ),
            array(
                'key' => 'field_home_hero_video',
                'label' => 'URL Video nền',
                'name' => 'home_hero_video',
                'type' => 'text',
                'default_value' => 'https://assets.mixkit.co/videos/preview/mixkit-modern-office-space-with-people-working-34322-large.mp4',
            ),
            array(
                'key' => 'field_home_hero_poster',
                'label' => 'Ảnh dự phòng Video (Poster)',
                'name' => 'home_hero_poster',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // TAB: SERVICES
            array(
                'key' => 'tab_home_services',
                'label' => 'Dịch Vụ',
                'type' => 'tab',
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
                'key' => 'field_home_reviews_list',
                'label' => 'Danh sách Review',
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
                        'label' => 'Avatar chữ cái (VD: HA)',
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

    // 3. Virtual Office Template Fields
    acf_add_local_field_group( array(
        'key' => 'group_lh_virtual',
        'title' => 'Cấu hình Trang Địa Chỉ Doanh Nghiệp (Virtual Office)',
        'fields' => array(
            array(
                'key' => 'field_vo_hero_title',
                'label' => 'Tiêu đề Hero',
                'name' => 'vo_hero_title',
                'type' => 'text',
                'default_value' => 'Gói văn phòng cơ bản',
            ),
            array(
                'key' => 'field_vo_hero_subtitle',
                'label' => 'Tiêu đề nhỏ',
                'name' => 'vo_hero_subtitle',
                'type' => 'text',
                'default_value' => 'Địa chỉ kinh doanh hạng A',
            ),
            array(
                'key' => 'field_vo_hero_desc',
                'label' => 'Mô tả Hero',
                'name' => 'vo_hero_desc',
                'type' => 'textarea',
                'default_value' => 'Thiết lập vị thế doanh nghiệp tại những tòa tháp tài chính biểu tượng. Giải pháp tối ưu chi phí, nâng tầm thương hiệu chuyên nghiệp ngay từ điểm khởi đầu.',
            ),
            array(
                'key' => 'field_vo_hero_image',
                'label' => 'Hình ảnh văn phòng',
                'name' => 'vo_hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_vo_plans',
                'label' => 'Danh sách gói dịch vụ',
                'name' => 'vo_plans',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_vo_plan_name',
                        'label' => 'Tên gói',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_plan_price',
                        'label' => 'Giá khởi điểm (số)',
                        'name' => 'price',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_plan_desc',
                        'label' => 'Mô tả ngắn',
                        'name' => 'desc',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_vo_plan_features',
                        'label' => 'Danh sách tính năng (Mỗi dòng 1 tính năng)',
                        'name' => 'features',
                        'type' => 'textarea',
                    ),
                ),
            ),
            array(
                'key' => 'field_vo_showcase_image',
                'label' => 'Hình ảnh lễ tân / Showcase',
                'name' => 'vo_showcase_image',
                'type' => 'image',
                'return_format' => 'url',
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

    // 4. About Us Page Fields
    acf_add_local_field_group( array(
        'key' => 'group_lh_about',
        'title' => 'Cấu hình Trang Về Chúng Tôi (About)',
        'fields' => array(
            array(
                'key' => 'field_about_hero_title',
                'label' => 'Tiêu đề chính',
                'name' => 'about_hero_title',
                'type' => 'text',
                'default_value' => 'Về Chúng Tôi',
            ),
            array(
                'key' => 'field_about_hero_desc',
                'label' => 'Mô tả ngắn',
                'name' => 'about_hero_desc',
                'type' => 'textarea',
                'default_value' => 'Hành trình kiến tạo không gian làm việc chuyên nghiệp bậc nhất dành cho các nhà lãnh đạo và doanh nghiệp tinh hoa.',
            ),
            array(
                'key' => 'field_about_hero_image',
                'label' => 'Hình ảnh nền Hero',
                'name' => 'about_hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_about_story_badge',
                'label' => 'Nhãn câu chuyện',
                'name' => 'about_story_badge',
                'type' => 'text',
                'default_value' => 'Câu chuyện thương hiệu',
            ),
            array(
                'key' => 'field_about_story_title',
                'label' => 'Tiêu đề câu chuyện',
                'name' => 'about_story_title',
                'type' => 'text',
                'default_value' => 'Không gian làm việc chuyên nghiệp tại Capital Place',
            ),
            array(
                'key' => 'field_about_story_content',
                'label' => 'Nội dung câu chuyện (Chấp nhận mã HTML/P)',
                'name' => 'about_story_content',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_about_story_image',
                'label' => 'Hình ảnh câu chuyện bên phải',
                'name' => 'about_story_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_about_stats',
                'label' => 'Thống kê (Số liệu)',
                'name' => 'about_stats',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_stat_num',
                        'label' => 'Số liệu (VD: 500+)',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_stat_label',
                        'label' => 'Nhãn mô tả',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_about_gallery_image',
                'label' => 'Hình ảnh thực tế chính',
                'name' => 'about_gallery_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_about_brochure_url',
                'label' => 'Đường dẫn Brochure PDF',
                'name' => 'about_brochure_url',
                'type' => 'text',
                'default_value' => '#',
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

    // 5. Serviced Office Page Fields
    acf_add_local_field_group( array(
        'key' => 'group_lh_serviced',
        'title' => 'Cấu hình Trang Văn Phòng Cao Cấp (Serviced Office)',
        'fields' => array(
            array(
                'key' => 'field_so_hero_title',
                'label' => 'Tiêu đề chính',
                'name' => 'so_hero_title',
                'type' => 'text',
                'default_value' => 'Văn phòng dịch vụ',
            ),
            array(
                'key' => 'field_so_hero_gold_title',
                'label' => 'Tiêu đề vàng',
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
                'type' => 'textarea',
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
            array(
                'key' => 'field_so_gallery_image_1',
                'label' => 'Hình ảnh thực tế 1 (Lớn)',
                'name' => 'so_gallery_image_1',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_so_gallery_image_2',
                'label' => 'Hình ảnh thực tế 2 (Phải - Trên)',
                'name' => 'so_gallery_image_2',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_so_gallery_image_3',
                'label' => 'Hình ảnh thực tế 3 (Phải - Dưới)',
                'name' => 'so_gallery_image_3',
                'type' => 'image',
                'return_format' => 'url',
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
}
