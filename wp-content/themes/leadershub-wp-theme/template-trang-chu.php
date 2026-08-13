<?php
/**
 * Template Name: Trang Chủ (Homepage)
 *
 * @package The_Leaders_Hub
 */

get_header();

// ==========================================
// 1. KHAI BÁO BIẾN & SAFE FALLBACKS ĐẦU TEMPLATE (.agent Rules)
// ==========================================
$hero_subtitle = ( function_exists( 'get_field' ) ? get_field( 'home_hero_subtitle' ) : '' ) ?: '';
$hero_title    = ( function_exists( 'get_field' ) ? get_field( 'home_hero_title' ) : '' ) ?: '';
$hero_desc     = ( function_exists( 'get_field' ) ? get_field( 'home_hero_desc' ) : '' ) ?: '';
$hero_video    = ( function_exists( 'get_field' ) ? get_field( 'home_hero_video' ) : '' ) ?: '';
$hero_poster   = ( function_exists( 'get_field' ) ? get_field( 'home_hero_poster' ) : '' ) ?: '';
$hero_btn_1    = ( function_exists( 'get_field' ) ? get_field( 'home_hero_btn_1' ) : array() ) ?: array();
$hero_btn_2    = ( function_exists( 'get_field' ) ? get_field( 'home_hero_btn_2' ) : array() ) ?: array();
$services_subtitle    = ( function_exists( 'get_field' ) ? get_field( 'home_services_subtitle' ) : '' ) ?: '';
$services_title       = ( function_exists( 'get_field' ) ? get_field( 'home_services_title' ) : '' ) ?: '';
$pricing_title        = ( function_exists( 'get_field' ) ? get_field( 'home_pricing_title' ) : '' ) ?: '';
$pricing_desc         = ( function_exists( 'get_field' ) ? get_field( 'home_pricing_desc' ) : '' ) ?: '';
$reviews_subtitle     = ( function_exists( 'get_field' ) ? get_field( 'home_reviews_subtitle' ) : '' ) ?: '';
$reviews_title        = ( function_exists( 'get_field' ) ? get_field( 'home_reviews_title' ) : '' ) ?: '';
$reviews_google_link  = ( function_exists( 'get_field' ) ? get_field( 'home_reviews_google_link' ) : '' ) ?: '';
$reviews_google_score = ( function_exists( 'get_field' ) ? get_field( 'home_reviews_google_score' ) : '' ) ?: '';
$reviews_shortcode    = ( function_exists( 'get_field' ) ? get_field( 'home_reviews_shortcode' ) : '' ) ?: '';
$news_title           = ( function_exists( 'get_field' ) ? get_field( 'home_news_title' ) : '' ) ?: 'Tin tức mới nhất';
$news_btn_text        = ( function_exists( 'get_field' ) ? get_field( 'home_news_btn_text' ) : '' ) ?: 'Xem tất cả';
$gallery_subtitle     = ( function_exists( 'get_field' ) ? get_field( 'home_gallery_subtitle' ) : '' ) ?: 'THƯ VIỆN HÌNH ẢNH';
$gallery_title        = ( function_exists( 'get_field' ) ? get_field( 'home_gallery_title' ) : '' ) ?: 'Không Gian Thực Tế Tại The Leaders Hub';
?>

<!-- Hero Banner Section -->
<?php if ( ! empty( $hero_title ) || ! empty( $hero_video ) || ! empty( $hero_desc ) ) : ?>
<header class="relative min-h-[85vh] flex items-center pt-24 pb-12 overflow-hidden text-white bg-deep-navy">
    <?php if ( ! empty( $hero_video ) ) : ?>
        <video autoplay muted loop playsinline
            <?php if ( ! empty( $hero_poster ) ) : ?>poster="<?php echo esc_url( $hero_poster ); ?>"<?php endif; ?>
            class="absolute inset-0 w-full h-full object-cover z-0 opacity-40">
            <source src="<?php echo esc_url( $hero_video ); ?>" type="video/mp4">
        </video>
    <?php endif; ?>
    <div class="absolute inset-0 bg-gradient-to-r from-deep-navy via-deep-navy/85 to-transparent z-10"></div>

    <div class="relative z-20 max-w-container-max mx-auto px-gutter w-full grid grid-cols-1 gap-12 items-center">
        <div class="space-y-6 max-w-2xl">
            <?php if ( ! empty( $hero_subtitle ) ) : ?>
                <span class="inline-block px-4 py-1 rounded-full bg-prestige-gold/20 text-prestige-gold font-label-sm text-xs tracking-widest uppercase font-bold border border-prestige-gold/30">
                    <?php echo esc_html( $hero_subtitle ); ?>
                </span>
            <?php endif; ?>
            
            <?php if ( ! empty( $hero_title ) ) : ?>
                <h1 class="font-display-lg text-4xl md:text-6xl font-bold leading-tight">
                    <?php echo wp_kses_post( $hero_title ); ?>
                </h1>
            <?php endif; ?>

            <?php if ( ! empty( $hero_desc ) ) : ?>
                <p class="font-body-lg text-base md:text-lg text-white/85 max-w-xl leading-relaxed">
                    <?php echo esc_html( $hero_desc ); ?>
                </p>
            <?php endif; ?>

            <?php if ( ! empty( $hero_btn_1['url'] ) || ! empty( $hero_btn_2['url'] ) ) : ?>
                <div class="flex flex-wrap gap-4 pt-4">
                    <?php if ( ! empty( $hero_btn_1['url'] ) ) : ?>
                        <a href="<?php echo esc_url( $hero_btn_1['url'] ); ?>"
                           target="<?php echo esc_attr( ! empty( $hero_btn_1['target'] ) ? $hero_btn_1['target'] : '_self' ); ?>"
                           class="bg-success-green hover:bg-success-green/90 text-white px-8 py-4 rounded-lg font-label-sm text-sm hover:scale-105 transition-transform duration-200 shadow-md uppercase tracking-wider font-semibold">
                            <?php echo esc_html( ! empty( $hero_btn_1['title'] ) ? $hero_btn_1['title'] : 'Đăng ký tư vấn' ); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $hero_btn_2['url'] ) ) : ?>
                        <a href="<?php echo esc_url( $hero_btn_2['url'] ); ?>"
                           target="<?php echo esc_attr( ! empty( $hero_btn_2['target'] ) ? $hero_btn_2['target'] : '_self' ); ?>"
                           class="border border-white/50 text-white px-8 py-4 rounded-lg font-label-sm text-sm hover:bg-white/10 transition-all font-semibold">
                            <?php echo esc_html( ! empty( $hero_btn_2['title'] ) ? $hero_btn_2['title'] : 'Khám phá dịch vụ' ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
<?php endif; ?>

<!-- Services Section (Danh mục dịch vụ) -->
<?php if ( ! empty( $services_title ) || ( function_exists( 'have_rows' ) && have_rows( 'home_services_list' ) ) ) : ?>
<section class="py-section-padding-desktop bg-white scroll-mt-20" id="services">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $services_subtitle ) || ! empty( $services_title ) ) : ?>
            <div class="text-center mb-16">
                <?php if ( ! empty( $services_subtitle ) ) : ?>
                    <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-2 font-bold text-center">
                        <?php echo esc_html( $services_subtitle ); ?>
                    </span>
                <?php endif; ?>
                <?php if ( ! empty( $services_title ) ) : ?>
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold text-center">
                        <?php echo esc_html( $services_title ); ?>
                    </h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ( function_exists( 'have_rows' ) && have_rows( 'home_services_list' ) ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php while ( have_rows( 'home_services_list' ) ) : the_row();
                    $s_title = get_sub_field( 'title' );
                    $s_desc  = get_sub_field( 'desc' );
                    $s_link  = get_sub_field( 'link' );
                    $s_img   = get_sub_field( 'image' );

                    if ( empty( $s_title ) ) continue;
                ?>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-surface-container-high hover:shadow-2xl transition-all duration-300 flex flex-col group">
                        <?php if ( ! empty( $s_img ) ) : ?>
                            <div class="h-48 overflow-hidden relative">
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="<?php echo esc_attr( $s_title ); ?>" src="<?php echo esc_url( $s_img ); ?>" />
                            </div>
                        <?php endif; ?>
                        <div class="p-8 flex-grow flex flex-col justify-between">
                            <div class="space-y-4">
                                <span class="material-symbols-outlined text-prestige-gold text-3xl">domain</span>
                                <h3 class="font-headline-md text-xl text-deep-navy font-bold"><?php echo esc_html( $s_title ); ?></h3>
                                <?php if ( ! empty( $s_desc ) ) : ?>
                                    <p class="text-on-surface-variant text-sm leading-relaxed"><?php echo esc_html( $s_desc ); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if ( ! empty( $s_link ) ) : ?>
                                <a href="<?php echo esc_url( $s_link ); ?>" class="inline-flex items-center text-success-green font-semibold text-sm hover:translate-x-1 transition-transform mt-6">
                                    Tìm hiểu thêm <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- Pricing Cards Section -->
<?php if ( ! empty( $pricing_title ) || ( function_exists( 'have_rows' ) && have_rows( 'home_pricing_plans' ) ) ) : ?>
<section class="py-section-padding-desktop bg-surface" id="pricing">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $pricing_title ) || ! empty( $pricing_desc ) ) : ?>
            <div class="text-center mb-16">
                <?php if ( ! empty( $pricing_title ) ) : ?>
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-4 font-bold">
                        <?php echo esc_html( $pricing_title ); ?>
                    </h2>
                <?php endif; ?>
                <?php if ( ! empty( $pricing_desc ) ) : ?>
                    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-4xl mx-auto">
                        <?php echo esc_html( $pricing_desc ); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ( function_exists( 'have_rows' ) && have_rows( 'home_pricing_plans' ) ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php $i = 0; while ( have_rows( 'home_pricing_plans' ) ) : the_row(); $i++;
                    $name          = get_sub_field( 'name' );
                    $price         = get_sub_field( 'price' );
                    $desc          = get_sub_field( 'desc' );
                    $features      = get_sub_field( 'features' );
                    $features_list = explode( "\n", str_replace( "\r", "", $features ) );

                    if ( empty( $name ) ) continue;
                ?>
                    <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all border <?php echo ($i === 2) ? 'border-2 border-prestige-gold relative scale-105 z-10' : 'border-surface-container-highest'; ?> flex flex-col group">
                        <?php if ($i === 2) : ?>
                            <div class="absolute top-0 right-8 -translate-y-1/2 bg-prestige-gold text-white px-4 py-1 rounded-full font-label-sm text-[12px] uppercase tracking-wider">Phổ biến nhất</div>
                        <?php endif; ?>
                        <div class="mb-8">
                            <h3 class="font-headline-md text-headline-md text-deep-navy font-bold"><?php echo esc_html( $name ); ?></h3>
                            <?php if ( ! empty( $desc ) ) : ?>
                                <p class="text-on-surface-variant text-sm mt-2"><?php echo esc_html( $desc ); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if ( ! empty( $price ) ) : ?>
                            <div class="mb-8">
                                <span class="text-on-surface-variant text-sm">Chỉ từ</span>
                                <div class="flex items-baseline">
                                    <span class="text-3xl font-bold text-deep-navy"><?php echo esc_html( $price ); ?></span>
                                    <span class="text-on-surface-variant ml-1 font-label-sm">đ/tháng</span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $features_list ) ) : ?>
                            <ul class="space-y-4 mb-8 flex-grow">
                                <?php foreach ( $features_list as $feature ) : if ( trim( $feature ) === '' ) continue; ?>
                                    <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                                        <?php echo esc_html( $feature ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <a href="#register" class="w-full text-center py-3 border border-deep-navy rounded-lg font-label-sm text-sm font-semibold group-hover:bg-deep-navy group-hover:text-white transition-all">Chọn Gói Này</a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <p class="text-center text-sm text-on-surface-variant/70 mt-8">* Giá chưa bao gồm VAT (nếu áp dụng)</p>
    </div>
</section>
<?php endif; ?>


<!-- Environment Showcase Section -->
<?php if ( ! empty( $gallery_title ) || ( function_exists( 'have_rows' ) && have_rows( 'home_gallery_images' ) ) ) : ?>
<section class="py-section-padding-desktop bg-surface-container-low scroll-mt-20" id="space">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $gallery_subtitle ) || ! empty( $gallery_title ) ) : ?>
            <div class="text-center mb-16">
                <?php if ( ! empty( $gallery_subtitle ) ) : ?>
                    <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-2 font-bold text-center">
                        <?php echo esc_html( $gallery_subtitle ); ?>
                    </span>
                <?php endif; ?>
                <?php if ( ! empty( $gallery_title ) ) : ?>
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold text-center">
                        <?php echo esc_html( $gallery_title ); ?>
                    </h2>
                <?php endif; ?>
                <div class="w-16 h-1 bg-prestige-gold mx-auto mt-4"></div>
            </div>
        <?php endif; ?>

        <?php if ( function_exists( 'have_rows' ) && have_rows( 'home_gallery_images' ) ) : ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ( have_rows( 'home_gallery_images' ) ) : the_row(); 
                    $img   = get_sub_field( 'image' );
                    $title = get_sub_field( 'title' );
                    $desc  = get_sub_field( 'desc' );

                    if ( empty( $img ) ) continue;
                    $img_url = is_array( $img ) ? $img['url'] : $img;
                ?>
                    <div class="group relative rounded-xl overflow-hidden shadow-md bg-white aspect-[4/3] cursor-pointer">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                             src="<?php echo esc_url( $img_url ); ?>" 
                             alt="<?php echo esc_attr( $title ?: 'Không gian thực tế tại The Leaders Hub' ); ?>" 
                             loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/90 via-deep-navy/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <div>
                                <?php if ( ! empty( $title ) ) : ?>
                                    <h4 class="text-white font-semibold text-lg"><?php echo esc_html( $title ); ?></h4>
                                <?php endif; ?>
                                <?php if ( ! empty( $desc ) ) : ?>
                                    <p class="text-prestige-gold text-xs mt-1 leading-relaxed"><?php echo esc_html( $desc ); ?></p>
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
<?php if ( ! empty( $reviews_title ) || ! empty( $reviews_shortcode ) || ! empty( $reviews_google_link ) || ( function_exists( 'have_rows' ) && have_rows( 'home_reviews_list' ) ) ) : ?>
<section class="py-section-padding-desktop bg-surface scroll-mt-20" id="reviews">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $reviews_subtitle ) || ! empty( $reviews_title ) ) : ?>
            <div class="text-center mb-12">
                <?php if ( ! empty( $reviews_subtitle ) ) : ?>
                    <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-2 font-bold">
                        <?php echo esc_html( $reviews_subtitle ); ?>
                    </span>
                <?php endif; ?>
                <?php if ( ! empty( $reviews_title ) ) : ?>
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">
                        <?php echo esc_html( $reviews_title ); ?>
                    </h2>
                <?php endif; ?>
                <div class="w-16 h-1 bg-prestige-gold mx-auto mt-4"></div>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $reviews_google_link ) || ! empty( $reviews_google_score ) ) : ?>
            <div class="flex items-center justify-center gap-3 mb-12 mt-2 max-w-md mx-auto">
                <a href="<?php echo esc_url( $reviews_google_link ?: 'https://www.google.com/search?q=The+Leaders+Hub' ); ?>"
                   target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-3 bg-white px-6 py-3 rounded-full border border-surface-container-high shadow-sm hover:shadow-md transition-all group">
                    <img class="h-4" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google Logo">
                    <span class="text-sm font-bold text-deep-navy group-hover:text-prestige-gold transition-colors">
                        <?php echo esc_html( $reviews_google_score ?: 'Xem tất cả đánh giá trên Google' ); ?>
                    </span>
                    <span class="material-symbols-outlined text-sm text-on-surface-variant group-hover:translate-x-1 transition-transform">open_in_new</span>
                </a>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $reviews_shortcode ) ) : ?>
            <!-- Google Review Plugin Widget Shortcode -->
            <div class="google-reviews-widget-container max-w-5xl mx-auto">
                <?php echo do_shortcode( $reviews_shortcode ); ?>
            </div>
        <?php elseif ( function_exists( 'have_rows' ) && have_rows( 'home_reviews_list' ) ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php while ( have_rows( 'home_reviews_list' ) ) : the_row(); 
                    $name    = get_sub_field( 'name' );
                    $role    = get_sub_field( 'role' );
                    $comment = get_sub_field( 'comment' );
                    $avatar  = get_sub_field( 'avatar' );

                    if ( empty( $name ) ) continue;
                ?>
                    <div class="bg-white p-8 rounded-xl border border-surface-container-highest shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex text-amber-400 mb-4">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            </div>
                            <?php if ( ! empty( $comment ) ) : ?>
                                <p class="text-on-surface text-sm italic leading-relaxed mb-6">"<?php echo esc_html( $comment ); ?>"</p>
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center gap-4 border-t border-surface-container-low pt-4">
                            <?php if ( ! empty( $avatar ) ) : ?>
                                <div class="w-10 h-10 rounded-full bg-deep-navy text-white flex items-center justify-center font-bold text-sm shrink-0">
                                    <?php echo esc_html( $avatar ); ?>
                                </div>
                            <?php endif; ?>
                            <div>
                                <h4 class="font-semibold text-sm text-deep-navy"><?php echo esc_html( $name ); ?></h4>
                                <?php if ( ! empty( $role ) ) : ?>
                                    <p class="text-xs text-on-surface-variant"><?php echo esc_html( $role ); ?></p>
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

<!-- News Section -->
<?php
$news_args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 3,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => true,
);
$news_query = new WP_Query( $news_args );

if ( $news_query->have_posts() ) :
?>
<section class="py-section-padding-desktop bg-white scroll-mt-20" id="news">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold"><?php echo esc_html( $news_title ); ?></h2>
                <div class="w-20 h-1 bg-prestige-gold mt-4"></div>
            </div>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/tin-tuc' ) ); ?>" class="text-sm font-semibold text-deep-navy hover:text-prestige-gold transition-colors flex items-center gap-1 border-b border-deep-navy/20 pb-1">
                <?php echo esc_html( $news_btn_text ); ?> <span class="material-symbols-outlined text-xs">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php while ( $news_query->have_posts() ) : $news_query->the_post();
                $cats     = get_the_category();
                $cat_name = ! empty( $cats[0] ) ? $cats[0]->name : 'Tin tức';
            ?>
                <a href="<?php the_permalink(); ?>" class="bg-white rounded-2xl overflow-hidden border border-surface-container-high hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="h-52 overflow-hidden relative">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105', 'alt' => get_the_title() ) ); ?>
                        <?php else : ?>
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="<?php the_title_attribute(); ?>" src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=600&q=80" />
                        <?php endif; ?>
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-bold text-prestige-gold uppercase tracking-wider block mb-2"><?php echo esc_html( $cat_name ); ?></span>
                            <h3 class="font-headline-md text-lg text-deep-navy font-bold mb-3 line-clamp-2 group-hover:text-prestige-gold transition-colors"><?php the_title(); ?></h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 25 ) ); ?></p>
                        </div>
                    </div>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Banner Section -->
<section class="py-section-padding-desktop bg-deep-navy text-white overflow-hidden relative">
    <div class="absolute right-0 top-1/2 -translate-y-1/2 w-96 h-96 border-[40px] border-prestige-gold rounded-full pointer-events-none translate-x-1/2 opacity-25"></div>
    <div class="max-w-container-max mx-auto px-gutter relative z-10 text-center">
        <h2 class="font-display-lg text-3xl md:text-5xl font-bold mb-6 text-white">Sẵn sàng nâng tầm doanh nghiệp?</h2>
        <p class="text-surface-variant/80 max-w-2xl mx-auto mb-10 font-body-lg text-base md:text-lg">
            Liên hệ với The Leaders Hub ngay hôm nay để nhận được báo giá và trải nghiệm không gian làm việc đẳng cấp nhất.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="#register" class="bg-success-green hover:bg-success-green/90 text-white font-bold px-8 py-4 rounded-lg transition-all shadow-lg text-sm uppercase tracking-wider text-center">Đăng ký tư vấn ngay</a>
            <a href="<?php echo esc_url( lh_opt('lh_hotline_url', 'tel:+84378919119') ); ?>" class="border border-white/20 hover:bg-white/10 text-white font-semibold px-8 py-4 rounded-lg transition-all text-sm text-center">Hotline: <?php echo esc_html( lh_opt('lh_hotline', '+84 3789 19119') ); ?></a>
        </div>
    </div>
</section>



<!-- Consultation Form Section -->
<section class="py-section-padding-desktop bg-surface-container overflow-hidden scroll-mt-20" id="register">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="glass-card rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
            
            <div class="w-full md:w-1/2 p-12 bg-deep-navy text-white relative flex flex-col justify-between">
                <div class="relative z-10">
                    <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-2 font-bold">Đăng ký ngay</span>
                    <h2 class="font-headline-xl text-headline-xl mb-6 font-bold">Bắt Đầu Nâng Tầm Doanh Nghiệp</h2>
                    <p class="text-surface-variant font-body-lg mb-8">Hãy điền thông tin biểu mẫu bên cạnh. Đội ngũ tư vấn viên của chúng tôi sẽ chủ động liên hệ lại sau ít phút để giải đáp mọi nhu cầu.</p>
                </div>
                <div class="space-y-4 relative z-10 border-t border-white/10 pt-6">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-prestige-gold">call</span>
                        <a href="<?php echo esc_url( lh_opt('lh_hotline_url', 'tel:+84378919119') ); ?>" class="hover:text-prestige-gold transition-colors">Hotline: <?php echo esc_html( lh_opt('lh_hotline', '+84 3789 19119') ); ?></a>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-prestige-gold">mail</span>
                        <a href="mailto:<?php echo esc_attr( lh_opt('lh_email', 'contact@theleadershub.vn') ); ?>" class="hover:text-prestige-gold transition-colors">Email: <?php echo esc_html( lh_opt('lh_email', 'contact@theleadershub.vn') ); ?></a>
                    </div>
                </div>
            </div>

            <!-- Right Form Block (Interactive Tab Layout) -->
            <div class="w-full md:w-1/2 p-12 bg-white flex flex-col justify-between">
                <div>
                    <!-- Form Tabs Selection -->
                    <div class="flex border-b border-surface-container-high mb-6">
                        <button onclick="switchFormTab('general-office')" id="tab-general-office" class="flex-1 pb-3 text-sm font-semibold border-b-2 border-deep-navy text-deep-navy transition-all focus:outline-none">
                            Văn Phòng & Chỗ Ngồi
                        </button>
                        <button onclick="switchFormTab('meeting-room-tab')" id="tab-meeting-room-tab" class="flex-1 pb-3 text-sm font-semibold border-b-2 border-transparent text-on-surface-variant hover:text-deep-navy transition-all focus:outline-none">
                            Đặt Phòng Họp Riêng
                        </button>
                    </div>

                    <!-- Tab 1: Virtual Office & Serviced Office Form (Airtable Integration) -->
                    <div id="form-general-office" class="airtable-embed-container w-full border border-surface-container-high bg-white p-2">
                        <iframe class="w-full" src="<?php echo esc_url( lh_opt( 'lh_form_office', 'https://airtable.com/embed/app0nmwylnsZLQTuu/pag0tggimRE7gA3xw/form' ) ); ?>" frameborder="0" onmousewheel="" width="100%"></iframe>
                    </div>

                    <!-- Tab 2: Dedicated Meeting Room Form (Airtable Integration) -->
                    <div id="form-meeting-room-tab" class="airtable-embed-container w-full border border-surface-container-high bg-white p-2 hidden">
                        <iframe class="w-full" src="<?php echo esc_url( lh_opt( 'lh_form_meeting', 'https://airtable.com/embed/appVuZe9KkkvAwc2Y/pagJ4pWOKeV6FNhuB/form' ) ); ?>" frameborder="0" onmousewheel="" width="100%"></iframe>
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
