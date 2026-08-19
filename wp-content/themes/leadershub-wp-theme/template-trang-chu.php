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
$services_subtitle = lh_field('home_services_subtitle', 'DANH MỤC DỊCH VỤ');
$services_title = lh_field('home_services_title', 'Giải Pháp Không Gian Làm Việc Toàn Diện');
$services_desc = lh_field('home_services_desc', 'Leadershub cung cấp các gói dịch vụ linh hoạt, tối ưu chi phí vận hành và nâng tầm hình ảnh chuyên nghiệp cho doanh nghiệp.');
$cta_title = lh_field('home_cta_title', 'Sẵn sàng nâng tầm doanh nghiệp?');
$cta_desc = lh_field('home_cta_desc', 'Liên hệ với The Leaders Hub ngay hôm nay để nhận được báo giá và trải nghiệm không gian làm việc đẳng cấp nhất.');
$cta_btn_1 = lh_field('home_cta_btn_1', array());
$cta_btn_2 = lh_field('home_cta_btn_2', array());
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

<!-- Services Section (Danh mục dịch vụ - 5 Cột Tràn Viền Tích Hợp ACF) -->
<?php if (!empty($services_title) || (function_exists('have_rows') && have_rows('home_services_list'))): ?>
    <section class="pt-16 md:pt-20 pb-0 bg-surface scroll-mt-20" id="services">
        <?php if (!empty($services_subtitle) || !empty($services_title) || !empty($services_desc)): ?>
            <div class="max-w-container-max mx-auto px-gutter mb-12 text-center">
                <?php if (!empty($services_subtitle)): ?>
                    <span class="text-prestige-gold font-label-sm text-sm uppercase tracking-widest block mb-2 font-bold">
                        <?php echo esc_html($services_subtitle); ?>
                    </span>
                <?php endif; ?>
                <?php if (!empty($services_title)): ?>
                    <h2 class="font-display-lg text-3xl md:text-4xl text-deep-navy font-bold mb-3">
                        <?php echo esc_html($services_title); ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($services_desc)): ?>
                    <p class="max-w-2xl mx-auto text-on-surface-variant text-sm md:text-base leading-relaxed">
                        <?php echo esc_html($services_desc); ?>
                    </p>
                <?php endif; ?>
                <div class="w-16 h-1 bg-prestige-gold mx-auto mt-4 rounded-full"></div>
            </div>
        <?php endif; ?>

        <?php if (function_exists('have_rows') && have_rows('home_services_list')): ?>
            <div class="flex flex-col lg:flex-row w-full min-h-[380px] lg:h-[430px]">
                <?php
                $i = 0;
                while (have_rows('home_services_list')):
                    the_row();
                    $i++;
                    $s_num = sprintf('%02d', $i);
                    $s_title = get_sub_field('title');
                    $s_desc = get_sub_field('desc');
                    $s_link = get_sub_field('link');
                    $s_img = get_sub_field('image');
                    $img_url = is_array($s_img) ? (!empty($s_img['url']) ? $s_img['url'] : '') : $s_img;
                    if (empty($img_url)) {
                        $img_url = 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1000';
                    }
                    $link_url = !empty($s_link) ? $s_link : '#register';

                    if (empty($s_title))
                        continue;
                    ?>
                    <!-- Item <?php echo esc_attr($s_num); ?> -->
                    <a href="<?php echo esc_url($link_url); ?>"
                        class="group relative overflow-hidden cursor-pointer flex flex-col justify-between p-6 w-full lg:w-1/5 flex-1 basis-0 min-w-0 border-b lg:border-b-0 border-r-0 lg:border-r border-white/20 last:border-r-0 min-h-[300px] lg:min-h-full">
                        <!-- Background Image -->
                        <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($s_title); ?>" loading="lazy" />

                        <!-- Lớp phủ nền: Ban đầu phủ nhẹ sáng hơn, Hover vào phủ đen đậm -->
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/15 to-black/40 group-hover:from-black/85 group-hover:via-black/80 group-hover:to-black/85 transition-all duration-500 pointer-events-none z-[1]">
                        </div>

                        <!-- Top Content -->
                        <div class="relative z-10">
                            <span
                                class="text-2xl lg:text-3xl font-bold text-white mb-1.5 block font-display-lg"><?php echo esc_html($s_num); ?></span>
                            <h3 class="text-base lg:text-lg font-bold uppercase tracking-wide leading-tight mb-2.5 text-white">
                                <?php echo nl2br(esc_html($s_title)); ?>
                            </h3>
                            <div class="w-10 h-1 bg-success-green mb-2 group-hover:w-full transition-all duration-500"></div>

                            <!-- Slide Down Description on Hover -->
                            <?php if (!empty($s_desc)): ?>
                                <div
                                    class="max-h-0 opacity-0 overflow-hidden group-hover:max-h-96 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                                    <p class="text-xs text-white leading-relaxed pt-2">
                                        <?php echo esc_html($s_desc); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Bottom Action Link (Giữ màu trắng khi hover) -->
                        <div
                            class="relative z-10 pt-4 flex items-center gap-1.5 text-white font-semibold text-xs group-hover:translate-x-1 transition-all duration-300">
                            <span>Tìm hiểu thêm</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>


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
<?php if (!empty($cta_title) || !empty($cta_desc)): ?>
    <?php
    $cta_btn_1_url = !empty($cta_btn_1['url']) ? $cta_btn_1['url'] : '#register';
    $cta_btn_1_title = !empty($cta_btn_1['title']) ? $cta_btn_1['title'] : 'Đăng ký tư vấn ngay';
    $cta_btn_1_target = !empty($cta_btn_1['target']) ? $cta_btn_1['target'] : '_self';

    $cta_btn_2_url = !empty($cta_btn_2['url']) ? $cta_btn_2['url'] : lh_opt('lh_hotline_url', 'tel:+84378919119');
    $cta_btn_2_title = !empty($cta_btn_2['title']) ? $cta_btn_2['title'] : ('Hotline: ' . lh_opt('lh_hotline', '+84 3789 19119'));
    $cta_btn_2_target = !empty($cta_btn_2['target']) ? $cta_btn_2['target'] : '_self';
    ?>
    <section class="py-section-padding-desktop bg-deep-navy text-white overflow-hidden relative">
        <div
            class="absolute right-0 top-1/2 -translate-y-1/2 w-96 h-96 border-[40px] border-prestige-gold rounded-full pointer-events-none translate-x-1/2 opacity-25">
        </div>
        <div class="max-w-container-max mx-auto px-gutter relative z-10 text-center">
            <?php if (!empty($cta_title)): ?>
                <h2 class="font-display-lg text-3xl md:text-5xl font-bold mb-6 text-white">
                    <?php echo wp_kses_post($cta_title); ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty($cta_desc)): ?>
                <p class="text-surface-variant/80 max-w-2xl mx-auto mb-10 font-body-lg text-base md:text-lg">
                    <?php echo esc_html($cta_desc); ?>
                </p>
            <?php endif; ?>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <?php if (!empty($cta_btn_1_title)): ?>
                    <a href="<?php echo esc_url($cta_btn_1_url); ?>" target="<?php echo esc_attr($cta_btn_1_target); ?>"
                        class="bg-success-green hover:bg-success-green/90 text-white font-bold px-8 py-4 rounded-lg transition-all shadow-lg text-sm uppercase tracking-wider text-center">
                        <?php echo esc_html($cta_btn_1_title); ?>
                    </a>
                <?php endif; ?>
                <?php if (!empty($cta_btn_2_title)): ?>
                    <a href="<?php echo esc_url($cta_btn_2_url); ?>" target="<?php echo esc_attr($cta_btn_2_target); ?>"
                        class="border border-white/20 hover:bg-white/10 text-white font-semibold px-8 py-4 rounded-lg transition-all text-sm text-center">
                        <?php echo esc_html($cta_btn_2_title); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>



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
