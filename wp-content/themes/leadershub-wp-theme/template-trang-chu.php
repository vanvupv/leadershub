<?php
/**
 * Template Name: Trang Chủ (Homepage)
 *
 * @package The_Leaders_Hub
 */

get_header();

if (!function_exists('lh_field')) {
    function lh_field($name, $default = '')
    {
        if (function_exists('get_field')) {
            $val = get_field($name);
            return ($val !== null && $val !== '' && $val !== false) ? $val : $default;
        }
        return $default;
    }
}

// ==========================================
// 1. KHAI BÁO BIẾN & SAFE FALLBACKS ĐẦU TEMPLATE (.agent Rules)
// ==========================================
$hero_subtitle = lh_field('home_hero_subtitle', '');
$hero_title = lh_field('home_hero_title', '');
$hero_desc = lh_field('home_hero_desc', '');
$hero_video = lh_field('home_hero_video', '');
$hero_poster = lh_field('home_hero_poster', '');
$hero_btn_1 = lh_field('home_hero_btn_1', array());
$hero_btn_2 = lh_field('home_hero_btn_2', array());
$services_subtitle = lh_field('home_services_subtitle', '');
$services_title = lh_field('home_services_title', '');
$pricing_title = lh_field('home_pricing_title', '');
$pricing_desc = lh_field('home_pricing_desc', '');
$reviews_subtitle = lh_field('home_reviews_subtitle', 'ĐÁNH GIÁ THỰC TẾ');
$reviews_title = lh_field('home_reviews_title', 'Khách Hàng Nói Gì Về The Leaders Hub');
$reviews_shortcode = lh_field('home_reviews_shortcode', '[trustindex no-registration=google]');
$news_title = lh_field('home_news_title', 'Tin tức mới nhất');
$news_btn_text = lh_field('home_news_btn_text', 'Xem tất cả');
$gallery_subtitle = lh_field('home_gallery_subtitle', 'THƯ VIỆN HÌNH ẢNH');
$gallery_title = lh_field('home_gallery_title', 'Không Gian Thực Tế Tại The Leaders Hub');
?>

<!-- Hero Banner Section -->
<?php if (!empty($hero_title) || !empty($hero_video) || !empty($hero_desc)): ?>
    <section class="relative min-h-[85vh] flex items-center mt-20 pt-12 pb-12 overflow-hidden text-white bg-slate-950"
        id="hero">
        <?php if (!empty($hero_video)): ?>
            <video autoplay muted loop playsinline <?php if (!empty($hero_poster)): ?>poster="<?php echo esc_url($hero_poster); ?>" <?php endif; ?>
                class="absolute inset-0 w-full h-full object-cover z-0 opacity-70">
                <source src="<?php echo esc_url($hero_video); ?>" type="video/mp4">
            </video>
        <?php endif; ?>
        <div class="absolute inset-0 z-10"></div>

        <div class="relative z-20 max-w-container-max mx-auto px-gutter w-full grid grid-cols-1 gap-12 items-center">
            <div class="space-y-6 max-w-2xl">
                <?php if (!empty($hero_subtitle)): ?>
                    <span
                        class="inline-block px-4 py-1 rounded-full bg-prestige-gold/20 text-prestige-gold font-label-sm text-xs tracking-widest uppercase font-bold border border-prestige-gold/30">
                        <?php echo esc_html($hero_subtitle); ?>
                    </span>
                <?php endif; ?>

                <?php if (!empty($hero_title)): ?>
                    <h1 class="font-display-lg text-4xl md:text-6xl font-bold leading-tight">
                        <?php echo wp_kses_post($hero_title); ?>
                    </h1>
                <?php endif; ?>

                <?php if (!empty($hero_desc)): ?>
                    <p class="font-body-lg text-base md:text-lg text-white/85 max-w-xl leading-relaxed">
                        <?php echo esc_html($hero_desc); ?>
                    </p>
                <?php endif; ?>

                <?php
                $hero_btn_1_url = !empty($hero_btn_1['url']) ? $hero_btn_1['url'] : '';
                $hero_btn_1_title = !empty($hero_btn_1['title']) ? $hero_btn_1['title'] : 'Đăng ký tư vấn';
                $hero_btn_1_target = !empty($hero_btn_1['target']) ? $hero_btn_1['target'] : '_self';

                $hero_btn_2_url = !empty($hero_btn_2['url']) ? $hero_btn_2['url'] : '#services';
                $hero_btn_2_title = !empty($hero_btn_2['title']) ? $hero_btn_2['title'] : 'Khám phá dịch vụ';
                $hero_btn_2_target = !empty($hero_btn_2['target']) ? $hero_btn_2['target'] : '_self';
                ?>
                <div class="flex flex-wrap gap-4 pt-4">
                    <?php if (!empty($hero_btn_1_url)): ?>
                        <a href="<?php echo esc_url($hero_btn_1_url); ?>" target="<?php echo esc_attr($hero_btn_1_target); ?>"
                            class="bg-success-green hover:bg-success-green/90 text-white px-8 py-4 rounded-lg font-label-sm text-sm hover:scale-105 transition-transform duration-200 shadow-md uppercase tracking-wider font-semibold">
                            <?php echo esc_html($hero_btn_1_title); ?>
                        </a>
                    <?php endif; ?>

                    <a href="<?php echo esc_url($hero_btn_2_url); ?>" target="<?php echo esc_attr($hero_btn_2_target); ?>"
                        class="border border-white/50 text-white px-8 py-4 rounded-lg font-label-sm text-sm hover:bg-white/10 transition-all font-semibold">
                        <?php echo esc_html($hero_btn_2_title); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Services Section (Danh mục dịch vụ) -->
<?php if (!empty($services_title) || (function_exists('have_rows') && have_rows('home_services_list'))): ?>
    <section class="py-section-padding-desktop bg-white scroll-mt-20" id="services">
        <div class="max-w-container-max mx-auto px-gutter">
            <?php if (!empty($services_subtitle) || !empty($services_title)): ?>
                <div class="text-center mb-16">
                    <?php if (!empty($services_subtitle)): ?>
                        <span
                            class="text-prestige-gold font-label-sm text-sm md:text-base uppercase tracking-widest block mb-3 font-bold text-center">
                            <?php echo esc_html($services_subtitle); ?>
                        </span>
                    <?php endif; ?>
                    <?php if (!empty($services_title)): ?>
                        <h2 class="font-display-lg text-3xl md:text-4xl text-deep-navy font-bold text-center">
                            <?php echo esc_html($services_title); ?>
                        </h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if (function_exists('have_rows') && have_rows('home_services_list')): ?>
                <div class="swiper services-swiper overflow-hidden pb-12">
                    <div class="swiper-wrapper">
                        <?php while (have_rows('home_services_list')):
                            the_row();
                            $s_title = get_sub_field('title');
                            $s_desc = get_sub_field('desc');
                            $s_link = get_sub_field('link');
                            $s_img = get_sub_field('image');

                            if (empty($s_title))
                                continue;
                            ?>
                            <div class="swiper-slide h-auto">
                                <div
                                    class="bg-white rounded-2xl overflow-hidden shadow-lg border border-surface-container-high hover:shadow-2xl transition-all duration-300 flex flex-col h-full group">
                                    <?php if (!empty($s_img)): ?>
                                        <div class="h-48 overflow-hidden relative flex-shrink-0">
                                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                                alt="<?php echo esc_attr($s_title); ?>" src="<?php echo esc_url($s_img); ?>"
                                                loading="lazy" />
                                        </div>
                                    <?php endif; ?>
                                    <div class="p-8 flex-grow flex flex-col justify-between">
                                        <div class="space-y-4">
                                            <span class="material-symbols-outlined text-prestige-gold text-3xl">domain</span>
                                            <h3 class="font-headline-md text-xl text-deep-navy font-bold">
                                                <?php echo esc_html($s_title); ?>
                                            </h3>
                                            <?php if (!empty($s_desc)): ?>
                                                <p class="text-on-surface-variant text-sm leading-relaxed">
                                                    <?php echo esc_html($s_desc); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($s_link)): ?>
                                            <a href="<?php echo esc_url($s_link); ?>"
                                                class="inline-flex items-center text-success-green font-semibold text-sm hover:translate-x-1 transition-transform mt-6">
                                                Tìm hiểu thêm <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <script>
                    (function () {
                        var retries = 0;
                        function initServicesSwiper() {
                            if (typeof Swiper !== 'undefined' && document.querySelector('.services-swiper')) {
                                new Swiper('.services-swiper', {
                                    slidesPerView: 1,
                                    spaceBetween: 24,
                                    loop: true,
                                    autoplay: {
                                        delay: 3500,
                                        disableOnInteraction: false,
                                    },
                                    pagination: {
                                        el: '.services-swiper .swiper-pagination',
                                        clickable: true,
                                    },
                                    breakpoints: {
                                        640: { slidesPerView: 2, spaceBetween: 24 },
                                        1024: { slidesPerView: 4, spaceBetween: 32 }
                                    }
                                });
                            } else if (retries < 50) {
                                retries++;
                                setTimeout(initServicesSwiper, 100);
                            }
                        }
                        if (document.readyState === 'loading') {
                            document.addEventListener('DOMContentLoaded', initServicesSwiper);
                        } else {
                            initServicesSwiper();
                        }
                    })();
                </script>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<!-- Services Section -- 2 (Danh mục dịch vụ - 5 Cột Tràn Viền Tông Sáng Tự Nhiên) -->
<section class="w-full bg-slate-900 overflow-hidden" id="services-showcase">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 w-full min-h-[480px] lg:h-[560px]">

        <!-- Item 01 -->
        <a href="<?php echo esc_url( home_url( '/van-phong-cao-cap' ) ); ?>"
            class="group relative overflow-hidden cursor-pointer flex flex-col justify-between p-7 lg:p-8 border-b sm:border-b-0 border-r-0 sm:border-r border-white/20 min-h-[380px] lg:min-h-full">
            <!-- Background Image -->
            <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1000"
                alt="Văn phòng trọn gói" loading="lazy" />
            <!-- Soft / Lighter Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/85 via-deep-navy/40 to-black/10 group-hover:from-deep-navy/90 group-hover:via-deep-navy/55 transition-colors duration-500"></div>

            <!-- Top Content -->
            <div class="relative z-10">
                <span class="text-2xl font-bold text-white mb-2 block font-display-lg drop-shadow">01</span>
                <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wide leading-tight mb-4 text-white drop-shadow">
                    VĂN PHÒNG <br class="hidden sm:inline">TRỌN GÓI
                </h3>
                <div class="w-10 h-1 bg-success-green mb-2 group-hover:w-16 transition-all duration-300"></div>

                <!-- Slide Down Description on Hover -->
                <div class="max-h-0 opacity-0 overflow-hidden group-hover:max-h-96 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                    <p class="text-xs lg:text-sm text-white/95 leading-relaxed pt-3 drop-shadow-sm">
                        Không gian làm việc riêng tư trọn gói tiện ích cao cấp, đầy đủ nội thất hiện đại, lễ tân chuyên nghiệp và sảnh tiếp đón sang trọng.
                    </p>
                </div>
            </div>

            <!-- Bottom Action Link -->
            <div class="relative z-10 pt-6 flex items-center gap-1.5 text-white group-hover:text-success-green font-semibold text-xs lg:text-sm group-hover:translate-x-1 transition-all duration-300 drop-shadow">
                <span>Tìm hiểu thêm</span>
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>

        <!-- Item 02 -->
        <a href="<?php echo esc_url( home_url( '/van-phong-ao' ) ); ?>"
            class="group relative overflow-hidden cursor-pointer flex flex-col justify-between p-7 lg:p-8 border-b sm:border-b-0 border-r-0 sm:border-r border-white/20 min-h-[380px] lg:min-h-full">
            <!-- Background Image -->
            <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1000"
                alt="Văn phòng ảo" loading="lazy" />
            <!-- Soft / Lighter Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/85 via-deep-navy/40 to-black/10 group-hover:from-deep-navy/90 group-hover:via-deep-navy/55 transition-colors duration-500"></div>

            <!-- Top Content -->
            <div class="relative z-10">
                <span class="text-2xl font-bold text-white mb-2 block font-display-lg drop-shadow">02</span>
                <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wide leading-tight mb-4 text-white drop-shadow">
                    VĂN PHÒNG <br class="hidden sm:inline">ẢO UY TÍN
                </h3>
                <div class="w-10 h-1 bg-success-green mb-2 group-hover:w-16 transition-all duration-300"></div>

                <!-- Slide Down Description on Hover -->
                <div class="max-h-0 opacity-0 overflow-hidden group-hover:max-h-96 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                    <p class="text-xs lg:text-sm text-white/95 leading-relaxed pt-3 drop-shadow-sm">
                        Địa chỉ kinh doanh đắc địa tại trung tâm, hỗ trợ nhận thư từ, tiếp đón khách hàng và tối ưu hóa tối đa chi phí vận hành.
                    </p>
                </div>
            </div>

            <!-- Bottom Action Link -->
            <div class="relative z-10 pt-6 flex items-center gap-1.5 text-white group-hover:text-success-green font-semibold text-xs lg:text-sm group-hover:translate-x-1 transition-all duration-300 drop-shadow">
                <span>Tìm hiểu thêm</span>
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>

        <!-- Item 03 -->
        <a href="<?php echo esc_url( home_url( '/van-phong-cao-cap' ) ); ?>"
            class="group relative overflow-hidden cursor-pointer flex flex-col justify-between p-7 lg:p-8 border-b sm:border-b-0 border-r-0 sm:border-r border-white/20 min-h-[380px] lg:min-h-full">
            <!-- Background Image -->
            <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1000"
                alt="Văn phòng theo yêu cầu" loading="lazy" />
            <!-- Soft / Lighter Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/85 via-deep-navy/40 to-black/10 group-hover:from-deep-navy/90 group-hover:via-deep-navy/55 transition-colors duration-500"></div>

            <!-- Top Content -->
            <div class="relative z-10">
                <span class="text-2xl font-bold text-white mb-2 block font-display-lg drop-shadow">03</span>
                <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wide leading-tight mb-4 text-white drop-shadow">
                    VĂN PHÒNG <br class="hidden sm:inline">THEO YÊU CẦU
                </h3>
                <div class="w-10 h-1 bg-success-green mb-2 group-hover:w-16 transition-all duration-300"></div>

                <!-- Slide Down Description on Hover -->
                <div class="max-h-0 opacity-0 overflow-hidden group-hover:max-h-96 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                    <p class="text-xs lg:text-sm text-white/95 leading-relaxed pt-3 drop-shadow-sm">
                        Thiết kế và xây dựng không gian làm việc theo đúng diện tích, phong cách và nhận diện thương hiệu riêng của doanh nghiệp.
                    </p>
                </div>
            </div>

            <!-- Bottom Action Link -->
            <div class="relative z-10 pt-6 flex items-center gap-1.5 text-white group-hover:text-success-green font-semibold text-xs lg:text-sm group-hover:translate-x-1 transition-all duration-300 drop-shadow">
                <span>Tìm hiểu thêm</span>
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>

        <!-- Item 04 -->
        <a href="<?php echo esc_url( home_url( '/phong-hop' ) ); ?>"
            class="group relative overflow-hidden cursor-pointer flex flex-col justify-between p-7 lg:p-8 border-b sm:border-b-0 border-r-0 sm:border-r border-white/20 min-h-[380px] lg:min-h-full">
            <!-- Background Image -->
            <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=1000"
                alt="Phòng họp hiện đại" loading="lazy" />
            <!-- Soft / Lighter Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/85 via-deep-navy/40 to-black/10 group-hover:from-deep-navy/90 group-hover:via-deep-navy/55 transition-colors duration-500"></div>

            <!-- Top Content -->
            <div class="relative z-10">
                <span class="text-2xl font-bold text-white mb-2 block font-display-lg drop-shadow">04</span>
                <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wide leading-tight mb-4 text-white drop-shadow">
                    PHÒNG HỌP <br class="hidden sm:inline">HIỆN ĐẠI
                </h3>
                <div class="w-10 h-1 bg-success-green mb-2 group-hover:w-16 transition-all duration-300"></div>

                <!-- Slide Down Description on Hover -->
                <div class="max-h-0 opacity-0 overflow-hidden group-hover:max-h-96 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                    <p class="text-xs lg:text-sm text-white/95 leading-relaxed pt-3 drop-shadow-sm">
                        Hệ thống phòng họp chuyên nghiệp trang bị đầy đủ màn hình TV thông minh, thiết bị hội nghị trực tuyến, wifi tốc độ cao và phục vụ chu đáo.
                    </p>
                </div>
            </div>

            <!-- Bottom Action Link -->
            <div class="relative z-10 pt-6 flex items-center gap-1.5 text-white group-hover:text-success-green font-semibold text-xs lg:text-sm group-hover:translate-x-1 transition-all duration-300 drop-shadow">
                <span>Tìm hiểu thêm</span>
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>

        <!-- Item 05 -->
        <a href="<?php echo esc_url( home_url( '/#register' ) ); ?>"
            class="group relative overflow-hidden cursor-pointer flex flex-col justify-between p-7 lg:p-8 min-h-[380px] lg:min-h-full">
            <!-- Background Image -->
            <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                src="https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?auto=format&fit=crop&w=1000"
                alt="Chỗ ngồi linh hoạt" loading="lazy" />
            <!-- Soft / Lighter Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/85 via-deep-navy/40 to-black/10 group-hover:from-deep-navy/90 group-hover:via-deep-navy/55 transition-colors duration-500"></div>

            <!-- Top Content -->
            <div class="relative z-10">
                <span class="text-2xl font-bold text-white mb-2 block font-display-lg drop-shadow">05</span>
                <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wide leading-tight mb-4 text-white drop-shadow">
                    CHỖ NGỒI <br class="hidden sm:inline">LINH HOẠT
                </h3>
                <div class="w-10 h-1 bg-success-green mb-2 group-hover:w-16 transition-all duration-300"></div>

                <!-- Slide Down Description on Hover -->
                <div class="max-h-0 opacity-0 overflow-hidden group-hover:max-h-96 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                    <p class="text-xs lg:text-sm text-white/95 leading-relaxed pt-3 drop-shadow-sm">
                        Chỗ ngồi làm việc tự do trong không gian mở năng động, tiện nghi, kết nối cộng đồng doanh nhân và chuyên gia sáng tạo.
                    </p>
                </div>
            </div>

            <!-- Bottom Action Link -->
            <div class="relative z-10 pt-6 flex items-center gap-1.5 text-white group-hover:text-success-green font-semibold text-xs lg:text-sm group-hover:translate-x-1 transition-all duration-300 drop-shadow">
                <span>Tìm hiểu thêm</span>
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>

    </div>
</section>


<!-- Pricing Cards Section -->
<?php if (!empty($pricing_title) || (function_exists('have_rows') && have_rows('home_pricing_plans'))): ?>
    <section class="py-section-padding-desktop bg-surface" id="pricing">
        <div class="max-w-container-max mx-auto px-gutter">
            <?php if (!empty($pricing_title) || !empty($pricing_desc)): ?>
                <div class="text-center mb-16">
                    <?php if (!empty($pricing_title)): ?>
                        <h2 class="font-display-lg text-3xl md:text-4xl text-deep-navy mb-4 font-bold">
                            <?php echo esc_html($pricing_title); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (!empty($pricing_desc)): ?>
                        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-4xl mx-auto">
                            <?php echo esc_html($pricing_desc); ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if (function_exists('have_rows') && have_rows('home_pricing_plans')): ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php $i = 0;
                    while (have_rows('home_pricing_plans')):
                        the_row();
                        $i++;
                        $name = get_sub_field('name');
                        $price = get_sub_field('price');
                        $desc = get_sub_field('desc');
                        $features = get_sub_field('features');
                        $features_list = explode("\n", str_replace("\r", "", $features));

                        if (empty($name))
                            continue;
                        ?>
                        <div
                            class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all border <?php echo ($i === 2) ? 'border-2 border-prestige-gold relative scale-105 z-10' : 'border-surface-container-highest'; ?> flex flex-col group">
                            <?php if ($i === 2): ?>
                                <div
                                    class="absolute top-0 right-8 -translate-y-1/2 bg-prestige-gold text-white px-4 py-1 rounded-full font-label-sm text-[12px] uppercase tracking-wider">
                                    Phổ biến nhất</div>
                            <?php endif; ?>
                            <div class="mb-8">
                                <h3 class="font-headline-md text-headline-md text-deep-navy font-bold">
                                    <?php echo esc_html($name); ?>
                                </h3>
                                <?php if (!empty($desc)): ?>
                                    <p class="text-on-surface-variant text-sm mt-2"><?php echo esc_html($desc); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($price)): ?>
                                <div class="mb-8">
                                    <span class="text-on-surface-variant text-sm">Chỉ từ</span>
                                    <div class="flex items-baseline">
                                        <span class="text-3xl font-bold text-deep-navy"><?php echo esc_html($price); ?></span>
                                        <span class="text-on-surface-variant ml-1 font-label-sm">đ/tháng</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($features_list)): ?>
                                <ul class="space-y-4 mb-8 flex-grow">
                                    <?php foreach ($features_list as $feature):
                                        if (trim($feature) === '')
                                            continue; ?>
                                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                                            <?php echo esc_html($feature); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <a href="#register"
                                class="w-full text-center py-3 border border-deep-navy rounded-lg font-label-sm text-sm font-semibold group-hover:bg-deep-navy group-hover:text-white transition-all">Chọn
                                Gói Này</a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <p class="text-center text-sm text-on-surface-variant/70 mt-8">* Giá chưa bao gồm VAT (nếu áp dụng)</p>
        </div>
    </section>
<?php endif; ?>


<!-- Environment Showcase Section -->
<?php if (!empty($gallery_title) || (function_exists('have_rows') && have_rows('home_gallery_images'))): ?>
    <section class="py-section-padding-desktop bg-surface-container-low scroll-mt-20" id="space">
        <div class="max-w-container-max mx-auto px-gutter">
            <?php if (!empty($gallery_subtitle) || !empty($gallery_title)): ?>
                <div class="text-center mb-16">
                    <?php if (!empty($gallery_subtitle)): ?>
                        <span
                            class="text-prestige-gold font-label-sm text-sm md:text-base uppercase tracking-widest block mb-3 font-bold text-center">
                            <?php echo esc_html($gallery_subtitle); ?>
                        </span>
                    <?php endif; ?>
                    <?php if (!empty($gallery_title)): ?>
                        <h2 class="font-display-lg text-3xl md:text-4xl text-deep-navy font-bold text-center">
                            <?php echo esc_html($gallery_title); ?>
                        </h2>
                    <?php endif; ?>
                    <div class="w-16 h-1 bg-prestige-gold mx-auto mt-4"></div>
                </div>
            <?php endif; ?>

            <?php if (function_exists('have_rows') && have_rows('home_gallery_images')): ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php while (have_rows('home_gallery_images')):
                        the_row();
                        $img = get_sub_field('image');
                        $title = get_sub_field('title');
                        $desc = get_sub_field('desc');

                        if (empty($img))
                            continue;
                        $img_url = is_array($img) ? $img['url'] : $img;
                        ?>
                        <div class="group relative rounded-xl overflow-hidden shadow-md bg-white aspect-[4/3] cursor-pointer">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                src="<?php echo esc_url($img_url); ?>"
                                alt="<?php echo esc_attr($title ?: 'Không gian thực tế tại The Leaders Hub'); ?>" loading="lazy" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-deep-navy/90 via-deep-navy/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div>
                                    <?php if (!empty($title)): ?>
                                        <h4 class="text-white font-semibold text-lg"><?php echo esc_html($title); ?></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($desc)): ?>
                                        <p class="text-prestige-gold text-xs mt-1 leading-relaxed"><?php echo esc_html($desc); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>


<!-- Google Reviews Section -->
<?php if (!empty($reviews_shortcode)): ?>
    <section class="py-section-padding-desktop bg-surface scroll-mt-20" id="reviews">
        <div class="max-w-container-max mx-auto px-gutter">
            <?php if (!empty($reviews_subtitle) || !empty($reviews_title)): ?>
                <div class="text-center mb-12">
                    <?php if (!empty($reviews_subtitle)): ?>
                        <span
                            class="text-prestige-gold font-label-sm text-sm md:text-base uppercase tracking-widest block mb-3 font-bold">
                            <?php echo esc_html($reviews_subtitle); ?>
                        </span>
                    <?php endif; ?>
                    <?php if (!empty($reviews_title)): ?>
                        <h2 class="font-display-lg text-3xl md:text-4xl text-deep-navy font-bold">
                            <?php echo esc_html($reviews_title); ?>
                        </h2>
                    <?php endif; ?>
                    <div class="w-16 h-1 bg-prestige-gold mx-auto mt-4"></div>
                </div>
            <?php endif; ?>

            <!-- Google Review Plugin Widget Shortcode -->
            <div class="google-reviews-widget-container max-w-5xl mx-auto">
                <?php echo do_shortcode($reviews_shortcode); ?>
                <script>
                    (function () {
                        function renderTrustindexWidget() {
                            var container = document.querySelector('.google-reviews-widget-container');
                            if (!container) return;

                            var loaderDiv = container.querySelector('div[data-src]');
                            var template = container.querySelector('template#trustindex-google-widget-html') || container.querySelector('template');

                            if (loaderDiv && loaderDiv.getAttribute('data-src')) {
                                var src = loaderDiv.getAttribute('data-src');
                                if (!document.querySelector('script[src="' + src + '"]')) {
                                    var s = document.createElement('script');
                                    s.src = src;
                                    s.async = true;
                                    document.body.appendChild(s);
                                }
                            }

                            function unpackTemplate() {
                                if (template && loaderDiv && (!loaderDiv.children || loaderDiv.children.length === 0)) {
                                    var content = template.content ? template.content.cloneNode(true) : null;
                                    if (content) {
                                        loaderDiv.appendChild(content);
                                    } else if (template.innerHTML) {
                                        loaderDiv.innerHTML = template.innerHTML;
                                    }

                                    var cssUrl = loaderDiv.getAttribute('data-css-url');
                                    if (cssUrl && !document.querySelector('link[href*="trustindex"]')) {
                                        var link = document.createElement('link');
                                        link.rel = 'stylesheet';
                                        link.href = cssUrl;
                                        document.head.appendChild(link);
                                    }
                                }
                            }

                            unpackTemplate();
                            setTimeout(unpackTemplate, 300);
                            setTimeout(unpackTemplate, 800);
                        }

                        if (document.readyState === 'loading') {
                            document.addEventListener('DOMContentLoaded', renderTrustindexWidget);
                        } else {
                            renderTrustindexWidget();
                        }
                    })();
                </script>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- News Section -->
<?php
$news_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'ignore_sticky_posts' => true,
);
$news_query = new WP_Query($news_args);

if ($news_query->have_posts()):
    ?>
    <section class="py-section-padding-desktop bg-white scroll-mt-20" id="news">
        <div class="max-w-container-max mx-auto px-gutter">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="font-display-lg text-3xl md:text-4xl text-deep-navy font-bold">
                        <?php echo esc_html($news_title); ?>
                    </h2>
                    <div class="w-20 h-1 bg-prestige-gold mt-4"></div>
                </div>
                <a href="<?php echo esc_url(get_post_type_archive_link('post') ?: home_url('/tin-tuc')); ?>"
                    class="text-sm font-semibold text-deep-navy hover:text-prestige-gold transition-colors flex items-center gap-1 border-b border-deep-navy/20 pb-1">
                    <?php echo esc_html($news_btn_text); ?> <span
                        class="material-symbols-outlined text-xs">arrow_forward</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php while ($news_query->have_posts()):
                    $news_query->the_post();
                    $cats = get_the_category();
                    $cat_name = !empty($cats[0]) ? $cats[0]->name : 'Tin tức';
                    ?>
                    <a href="<?php the_permalink(); ?>"
                        class="bg-white rounded-2xl overflow-hidden border border-surface-container-high hover:shadow-xl transition-all duration-300 flex flex-col group">
                        <div class="h-52 overflow-hidden relative">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105', 'alt' => get_the_title())); ?>
                            <?php else: ?>
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    alt="<?php the_title_attribute(); ?>"
                                    src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=600&q=80" />
                            <?php endif; ?>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <span
                                    class="text-xs font-bold text-prestige-gold uppercase tracking-wider block mb-2"><?php echo esc_html($cat_name); ?></span>
                                <h3
                                    class="font-headline-md text-lg text-deep-navy font-bold mb-3 line-clamp-2 group-hover:text-prestige-gold transition-colors">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3">
                                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), 25)); ?>
                                </p>
                            </div>
                        </div>
                    </a>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- CTA Banner Section -->
<section class="py-section-padding-desktop bg-deep-navy text-white overflow-hidden relative">
    <div
        class="absolute right-0 top-1/2 -translate-y-1/2 w-96 h-96 border-[40px] border-prestige-gold rounded-full pointer-events-none translate-x-1/2 opacity-25">
    </div>
    <div class="max-w-container-max mx-auto px-gutter relative z-10 text-center">
        <h2 class="font-display-lg text-3xl md:text-5xl font-bold mb-6 text-white">Sẵn sàng nâng tầm doanh nghiệp?</h2>
        <p class="text-surface-variant/80 max-w-2xl mx-auto mb-10 font-body-lg text-base md:text-lg">
            Liên hệ với The Leaders Hub ngay hôm nay để nhận được báo giá và trải nghiệm không gian làm việc đẳng cấp
            nhất.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="#register"
                class="bg-success-green hover:bg-success-green/90 text-white font-bold px-8 py-4 rounded-lg transition-all shadow-lg text-sm uppercase tracking-wider text-center">Đăng
                ký tư vấn ngay</a>
            <a href="<?php echo esc_url(lh_opt('lh_hotline_url', 'tel:+84378919119')); ?>"
                class="border border-white/20 hover:bg-white/10 text-white font-semibold px-8 py-4 rounded-lg transition-all text-sm text-center">Hotline:
                <?php echo esc_html(lh_opt('lh_hotline', '+84 3789 19119')); ?></a>
        </div>
    </div>
</section>



<!-- Consultation Form Section -->
<section class="py-section-padding-desktop bg-surface-container overflow-hidden scroll-mt-20" id="register">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="glass-card rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">

            <div class="w-full md:w-1/2 p-12 bg-deep-navy text-white relative flex flex-col justify-between">
                <div class="relative z-10">
                    <span
                        class="text-prestige-gold font-label-sm text-sm md:text-base uppercase tracking-widest block mb-3 font-bold">Đăng
                        ký ngay</span>
                    <h2 class="font-display-lg text-3xl md:text-4xl mb-6 font-bold">Bắt Đầu Nâng Tầm Doanh Nghiệp</h2>
                    <p class="text-surface-variant font-body-lg mb-8">Hãy điền thông tin biểu mẫu bên cạnh. Đội ngũ tư
                        vấn viên của chúng tôi sẽ chủ động liên hệ lại sau ít phút để giải đáp mọi nhu cầu.</p>
                </div>
                <div class="space-y-4 relative z-10 border-t border-white/10 pt-6">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-prestige-gold">call</span>
                        <a href="<?php echo esc_url(lh_opt('lh_hotline_url', 'tel:+84378919119')); ?>"
                            class="hover:text-prestige-gold transition-colors">Hotline:
                            <?php echo esc_html(lh_opt('lh_hotline', '+84 3789 19119')); ?></a>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-prestige-gold">mail</span>
                        <a href="mailto:<?php echo esc_attr(lh_opt('lh_email', 'contact@theleadershub.vn')); ?>"
                            class="hover:text-prestige-gold transition-colors">Email:
                            <?php echo esc_html(lh_opt('lh_email', 'contact@theleadershub.vn')); ?></a>
                    </div>
                </div>
            </div>

            <!-- Right Form Block (Interactive Tab Layout) -->
            <div class="w-full md:w-1/2 p-12 bg-white flex flex-col justify-between">
                <div>
                    <!-- Form Tabs Selection -->
                    <div class="flex border-b border-surface-container-high mb-6">
                        <button onclick="switchFormTab('general-office')" id="tab-general-office"
                            class="flex-1 pb-3 text-sm font-semibold border-b-2 border-deep-navy text-deep-navy transition-all focus:outline-none">
                            Văn Phòng & Chỗ Ngồi
                        </button>
                        <button onclick="switchFormTab('meeting-room-tab')" id="tab-meeting-room-tab"
                            class="flex-1 pb-3 text-sm font-semibold border-b-2 border-transparent text-on-surface-variant hover:text-deep-navy transition-all focus:outline-none">
                            Đặt Phòng Họp Riêng
                        </button>
                    </div>

                    <!-- Tab 1: Virtual Office & Serviced Office Form (Airtable Integration) -->
                    <div id="form-general-office"
                        class="airtable-embed-container w-full border border-surface-container-high bg-white p-2">
                        <iframe class="w-full"
                            src="<?php echo esc_url(lh_opt('lh_form_office', 'https://airtable.com/embed/app0nmwylnsZLQTuu/pag0tggimRE7gA3xw/form')); ?>"
                            frameborder="0" onmousewheel="" width="100%"></iframe>
                    </div>

                    <!-- Tab 2: Dedicated Meeting Room Form (Airtable Integration) -->
                    <div id="form-meeting-room-tab"
                        class="airtable-embed-container w-full border border-surface-container-high bg-white p-2 hidden">
                        <iframe class="w-full"
                            src="<?php echo esc_url(lh_opt('lh_form_meeting', 'https://airtable.com/embed/appVuZe9KkkvAwc2Y/pagJ4pWOKeV6FNhuB/form')); ?>"
                            frameborder="0" onmousewheel="" width="100%"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function switchFormTab(tabName) {
        const tabOffice = document.getElementById('tab-general-office');
        const tabMeeting = document.getElementById('tab-meeting-room-tab');
        const formOffice = document.getElementById('form-general-office');
        const formMeeting = document.getElementById('form-meeting-room-tab');

        if (tabName === 'general-office') {
            tabOffice.classList.add('border-deep-navy', 'text-deep-navy');
            tabOffice.classList.remove('border-transparent', 'text-on-surface-variant');
            tabMeeting.classList.add('border-transparent', 'text-on-surface-variant');
            tabMeeting.classList.remove('border-deep-navy', 'text-deep-navy');
            formOffice.classList.remove('hidden');
            formMeeting.classList.add('hidden');
        } else {
            tabMeeting.classList.add('border-deep-navy', 'text-deep-navy');
            tabMeeting.classList.remove('border-transparent', 'text-on-surface-variant');
            tabOffice.classList.add('border-transparent', 'text-on-surface-variant');
            tabOffice.classList.remove('border-deep-navy', 'text-deep-navy');
            formMeeting.classList.remove('hidden');
            formOffice.classList.add('hidden');
        }
    }
</script>

<?php
get_footer();
