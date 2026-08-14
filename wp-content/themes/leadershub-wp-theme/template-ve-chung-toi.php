<?php
/**
 * Template Name: Về Chúng Tôi (About)
 *
 * @package The_Leaders_Hub
 */

get_header();

// ACF Variables: Section 1 Hero Banner
$hero_image = ( function_exists( 'get_field' ) ? get_field( 'about_hero_image' ) : '' ) ?: '';
$hero_title = ( function_exists( 'get_field' ) ? get_field( 'about_hero_title' ) : '' ) ?: '';
$hero_desc  = ( function_exists( 'get_field' ) ? get_field( 'about_hero_desc' ) : '' ) ?: '';

// ACF Variables: Section 2 Brand Story
$story_badge   = ( function_exists( 'get_field' ) ? get_field( 'about_story_badge' ) : '' ) ?: '';
$story_title   = ( function_exists( 'get_field' ) ? get_field( 'about_story_title' ) : '' ) ?: '';
$story_content = ( function_exists( 'get_field' ) ? get_field( 'about_story_content' ) : '' ) ?: '';
$story_image   = ( function_exists( 'get_field' ) ? get_field( 'about_story_image' ) : '' ) ?: '';

// ACF Variables: Section 3 Core Values
$values_title = ( function_exists( 'get_field' ) ? get_field( 'about_values_title' ) : '' ) ?: '';

// ACF Variables: Section 4 Certifications & Partners
$cert_title = ( function_exists( 'get_field' ) ? get_field( 'about_cert_title' ) : '' ) ?: '';

// ACF Variables: Section 5 Real Office Gallery
$gallery_title = ( function_exists( 'get_field' ) ? get_field( 'about_gallery_title' ) : '' ) ?: '';
$gallery_desc  = ( function_exists( 'get_field' ) ? get_field( 'about_gallery_desc' ) : '' ) ?: '';

// ACF Variables: Section 6 CTA & Brochure
$cta_title         = ( function_exists( 'get_field' ) ? get_field( 'about_cta_title' ) : '' ) ?: '';
$cta_desc          = ( function_exists( 'get_field' ) ? get_field( 'about_cta_desc' ) : '' ) ?: '';
$cta_btn_text      = ( function_exists( 'get_field' ) ? get_field( 'about_cta_btn_text' ) : '' ) ?: '';
$cta_btn_url       = ( function_exists( 'get_field' ) ? get_field( 'about_cta_btn_url' ) : '' ) ?: '';
$brochure_text     = ( function_exists( 'get_field' ) ? get_field( 'about_brochure_text' ) : '' ) ?: '';
$brochure_url      = ( function_exists( 'get_field' ) ? get_field( 'about_brochure_url' ) : '' ) ?: '';
$cta_working_hours = ( function_exists( 'get_field' ) ? get_field( 'about_cta_working_hours' ) : '' ) ?: 'Hỗ trợ trong giờ làm việc';

if ( ! function_exists( 'lh_field' ) ) {
    function lh_field( $name, $default = '' ) {
        if ( function_exists( 'get_field' ) ) {
            $val = get_field( $name );
            return ( $val !== null && $val !== '' && $val !== false ) ? $val : $default;
        }
        return $default;
    }
}
?>

<!-- Hero Banner Section -->
<?php if ( ! empty( $hero_title ) || ! empty( $hero_image ) || ! empty( $hero_desc ) ) : ?>
<header class="relative h-[60vh] min-h-[500px] flex items-center justify-center pt-20">
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="absolute inset-0 bg-deep-navy/40 z-10"></div>
        <?php if ( ! empty( $hero_image ) ) : ?>
            <img class="w-full h-full object-cover scale-105 hover:scale-100 transition-transform duration-[10000ms]" 
                 src="<?php echo esc_url( is_array( $hero_image ) ? $hero_image['url'] : $hero_image ); ?>" 
                 alt="<?php echo esc_attr( $hero_title ?: 'Capital Place Office' ); ?>" 
                 loading="eager" />
        <?php endif; ?>
    </div>
    <div class="relative z-20 text-center px-gutter max-w-4xl">
        <?php if ( ! empty( $hero_title ) ) : ?>
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-6 drop-shadow-lg font-bold">
                <?php echo esc_html( $hero_title ); ?>
            </h1>
        <?php endif; ?>
        <?php if ( ! empty( $hero_desc ) ) : ?>
            <p class="font-body-lg text-body-lg text-white/90 max-w-2xl mx-auto">
                <?php echo esc_html( $hero_desc ); ?>
            </p>
        <?php endif; ?>
    </div>
</header>
<?php endif; ?>

<!-- Brand Story Section -->
<?php if ( ! empty( $story_title ) || ! empty( $story_content ) || ! empty( $story_image ) || ( function_exists( 'have_rows' ) && have_rows( 'about_stats' ) ) ) : ?>
<section class="py-section-padding-desktop bg-white" id="brand-story">
    <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div class="order-2 md:order-1">
            <?php if ( ! empty( $story_badge ) ) : ?>
                <span class="text-prestige-gold font-label-sm text-sm md:text-base uppercase tracking-[0.2em] mb-4 block font-bold">
                    <?php echo esc_html( $story_badge ); ?>
                </span>
            <?php endif; ?>

            <?php if ( ! empty( $story_title ) ) : ?>
                <h2 class="font-display-lg text-3xl md:text-4xl text-deep-navy mb-8 font-bold">
                    <?php echo esc_html( $story_title ); ?>
                </h2>
            <?php endif; ?>

            <?php if ( ! empty( $story_content ) ) : ?>
                <div class="space-y-6 text-on-surface-variant font-body-md text-body-md leading-relaxed">
                    <?php echo wp_kses_post( $story_content ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( function_exists( 'have_rows' ) && have_rows( 'about_stats' ) ) : ?>
                <div class="mt-12 grid grid-cols-2 gap-8 border-t border-surface-container-highest pt-8">
                    <?php while ( have_rows( 'about_stats' ) ) : the_row();
                        $stat_num   = get_sub_field( 'number' );
                        $stat_label = get_sub_field( 'label' );
                        if ( empty( $stat_num ) ) continue;
                    ?>
                        <div>
                            <div class="text-headline-md font-bold text-deep-navy text-2xl"><?php echo esc_html( $stat_num ); ?></div>
                            <?php if ( ! empty( $stat_label ) ) : ?>
                                <div class="text-label-sm text-on-surface-variant text-sm"><?php echo esc_html( $stat_label ); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if ( ! empty( $story_image ) ) : ?>
            <div class="order-1 md:order-2 relative">
                <div class="absolute -top-12 -left-12 w-48 h-48 bg-prestige-gold/10 rounded-full blur-3xl"></div>
                <div class="rounded-xl overflow-hidden shadow-2xl relative z-10 aspect-[4/5]">
                    <img class="w-full h-full object-cover" 
                         src="<?php echo esc_url( is_array( $story_image ) ? $story_image['url'] : $story_image ); ?>" 
                         alt="<?php echo esc_attr( $story_title ?: 'Brand Story Image' ); ?>" 
                         loading="lazy" />
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- Core Values Section -->
<?php if ( ! empty( $values_title ) || ( function_exists( 'have_rows' ) && have_rows( 'about_values_list' ) ) ) : ?>
<section class="bg-surface-container-low py-section-padding-desktop overflow-hidden" id="core-values">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $values_title ) ) : ?>
            <div class="text-center mb-20">
                <h2 class="font-display-lg text-3xl md:text-4xl text-deep-navy mb-4 font-bold">
                    <?php echo esc_html( $values_title ); ?>
                </h2>
                <div class="w-20 h-1 bg-prestige-gold mx-auto mt-4"></div>
            </div>
        <?php endif; ?>

        <?php if ( function_exists( 'have_rows' ) && have_rows( 'about_values_list' ) ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php 
                $v_index = 0;
                while ( have_rows( 'about_values_list' ) ) : the_row();
                    $v_index++;
                    $v_icon  = get_sub_field( 'icon' );
                    $v_image = get_sub_field( 'image' );
                    $v_title = get_sub_field( 'title' );
                    $v_desc  = get_sub_field( 'desc' );

                    if ( empty( $v_title ) ) continue;
                    $index_str = sprintf( '%02d', $v_index );
                ?>
                    <div class="group bg-white p-10 rounded-xl luxury-shadow hover:-translate-y-2 transition-all duration-300 relative overflow-hidden" style="transform: translateZ(0);">
                        <div class="absolute top-2 right-4 text-[80px] font-bold text-deep-navy opacity-[0.03] select-none group-hover:scale-110 transition-transform">
                            <?php echo esc_html( $index_str ); ?>
                        </div>
                        
                        <div class="w-16 h-16 bg-deep-navy/5 rounded-lg flex items-center justify-center mb-8">
                            <?php if ( ! empty( $v_image ) ) : ?>
                                <img class="w-10 h-10 object-contain" src="<?php echo esc_url( is_array( $v_image ) ? $v_image['url'] : $v_image ); ?>" alt="<?php echo esc_attr( $v_title ); ?>" />
                            <?php elseif ( ! empty( $v_icon ) ) : ?>
                                <span class="material-symbols-outlined text-prestige-gold text-4xl" style="font-variation-settings: 'FILL' 1;"><?php echo esc_html( $v_icon ); ?></span>
                            <?php else : ?>
                                <span class="material-symbols-outlined text-prestige-gold text-4xl" style="font-variation-settings: 'FILL' 1;">star</span>
                            <?php endif; ?>
                        </div>

                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-4 font-bold">
                            <?php echo esc_html( $v_title ); ?>
                        </h3>

                        <?php if ( ! empty( $v_desc ) ) : ?>
                            <p class="font-body-md text-body-md text-on-surface-variant">
                                <?php echo esc_html( $v_desc ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- Certifications & Partners Section -->
<?php if ( ! empty( $cert_title ) || ( function_exists( 'have_rows' ) && have_rows( 'about_cert_logos' ) ) ) : ?>
<section class="bg-deep-navy py-16 text-white overflow-hidden" id="certifications">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $cert_title ) ) : ?>
            <h3 class="text-center font-label-sm text-xs uppercase tracking-widest text-white/50 mb-8 font-semibold">
                <?php echo esc_html( $cert_title ); ?>
            </h3>
        <?php endif; ?>

        <?php if ( function_exists( 'have_rows' ) && have_rows( 'about_cert_logos' ) ) : ?>
            <div class="swiper partner-swiper overflow-hidden py-4">
                <div class="swiper-wrapper items-center">
                    <?php while ( have_rows( 'about_cert_logos' ) ) : the_row();
                        $c_name = get_sub_field( 'name' );
                        $c_logo = get_sub_field( 'logo' );

                        if ( empty( $c_name ) && empty( $c_logo ) ) continue;
                    ?>
                        <div class="swiper-slide flex items-center justify-center">
                            <div class="h-12 md:h-16 w-auto flex items-center justify-center grayscale hover:grayscale-0 opacity-70 hover:opacity-100 transition-all duration-300 font-bold text-lg md:text-xl">
                                <?php if ( ! empty( $c_logo ) ) : ?>
                                    <img class="max-h-full max-w-[180px] object-contain" 
                                         src="<?php echo esc_url( is_array( $c_logo ) ? $c_logo['url'] : $c_logo ); ?>" 
                                         alt="<?php echo esc_attr( $c_name ?: 'Certification Logo' ); ?>" 
                                         loading="lazy" />
                                <?php else : ?>
                                    <span class="tracking-wider uppercase text-white/80"><?php echo esc_html( $c_name ); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <script>
            (function() {
                function initPartnerSwiper() {
                    if (typeof Swiper !== 'undefined' && document.querySelector('.partner-swiper')) {
                        new Swiper('.partner-swiper', {
                            slidesPerView: 2,
                            spaceBetween: 30,
                            loop: true,
                            autoplay: {
                                delay: 2500,
                                disableOnInteraction: false,
                            },
                            breakpoints: {
                                480: { slidesPerView: 3, spaceBetween: 30 },
                                768: { slidesPerView: 4, spaceBetween: 40 },
                                1024: { slidesPerView: 5, spaceBetween: 50 }
                            }
                        });
                    }
                }
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initPartnerSwiper);
                } else {
                    initPartnerSwiper();
                }
            })();
            </script>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- Real Office Space Section -->
<?php if ( ! empty( $gallery_title ) || ( function_exists( 'have_rows' ) && have_rows( 'about_gallery_images' ) ) ) : ?>
<section class="py-section-padding-desktop bg-white" id="gallery">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $gallery_title ) || ! empty( $gallery_desc ) ) : ?>
            <div class="text-center mb-16">
                <?php if ( ! empty( $gallery_title ) ) : ?>
                    <h2 class="font-display-lg text-3xl md:text-4xl text-deep-navy font-bold">
                        <?php echo esc_html( $gallery_title ); ?>
                    </h2>
                <?php endif; ?>
                <?php if ( ! empty( $gallery_desc ) ) : ?>
                    <p class="text-on-surface-variant font-body-md text-body-md mt-4">
                        <?php echo esc_html( $gallery_desc ); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ( function_exists( 'have_rows' ) && have_rows( 'about_gallery_images' ) ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while ( have_rows( 'about_gallery_images' ) ) : the_row();
                    $g_img   = get_sub_field( 'image' );
                    $g_title = get_sub_field( 'title' );
                    $g_desc  = get_sub_field( 'desc' );

                    if ( empty( $g_img ) ) continue;
                    $img_url = is_array( $g_img ) ? $g_img['url'] : $g_img;
                ?>
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-lg border border-surface-container-high hover:shadow-2xl transition-all duration-300 flex flex-col">
                        <div class="h-64 overflow-hidden relative">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                                 src="<?php echo esc_url( $img_url ); ?>" 
                                 alt="<?php echo esc_attr( $g_title ?: $g_desc ?: 'Không gian The Leaders Hub' ); ?>" 
                                 loading="lazy" />
                            <?php if ( ! empty( $g_title ) ) : ?>
                                <div class="absolute bottom-3 left-3 bg-deep-navy/80 backdrop-blur-md text-white text-xs px-3 py-1.5 rounded-full font-bold">
                                    <?php echo esc_html( $g_title ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ( ! empty( $g_title ) || ! empty( $g_desc ) ) : ?>
                            <div class="p-6 flex-1 flex flex-col justify-between">
                                <?php if ( ! empty( $g_title ) ) : ?>
                                    <h3 class="font-headline-sm text-headline-sm font-bold text-deep-navy mb-2">
                                        <?php echo esc_html( $g_title ); ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if ( ! empty( $g_desc ) ) : ?>
                                    <p class="font-body-md text-body-md text-on-surface-variant text-sm leading-relaxed">
                                        <?php echo esc_html( $g_desc ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<?php if ( ! empty( $cta_title ) || ! empty( $cta_desc ) || ! empty( $brochure_url ) ) : ?>
<section class="py-section-padding-desktop bg-surface-container-low" id="cta">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="relative rounded-3xl overflow-hidden bg-deep-navy p-12 md:p-20 flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="relative z-10 max-w-xl text-center md:text-left">
                <?php if ( ! empty( $cta_title ) ) : ?>
                    <h2 class="font-display-lg text-3xl md:text-4xl text-white mb-6 font-bold">
                        <?php echo esc_html( $cta_title ); ?>
                    </h2>
                <?php endif; ?>

                <?php if ( ! empty( $cta_desc ) ) : ?>
                    <p class="font-body-lg text-body-lg text-white/70 mb-8">
                        <?php echo esc_html( $cta_desc ); ?>
                    </p>
                <?php endif; ?>

                <div class="flex flex-col sm:flex-row gap-4">
                    <?php if ( ! empty( $cta_btn_text ) ) : ?>
                        <a href="<?php echo esc_url( ! empty( $cta_btn_url ) ? ( 0 === strpos( $cta_btn_url, 'http' ) ? $cta_btn_url : home_url( $cta_btn_url ) ) : home_url('/lien-he') ); ?>" class="bg-success-green text-white px-8 py-4 rounded-lg font-label-sm text-sm font-bold shadow-lg hover:bg-success-green/90 transition-all text-center">
                            <?php echo esc_html( $cta_btn_text ); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $brochure_url ) && '#' !== trim( $brochure_url ) ) : ?>
                        <a href="<?php echo esc_url( $brochure_url ); ?>" target="_blank" rel="noopener noreferrer" class="bg-transparent border border-white/30 text-white px-8 py-4 rounded-lg font-label-sm text-sm font-semibold hover:bg-white/10 transition-all text-center">
                            <?php echo esc_html( ! empty( $brochure_text ) ? $brochure_text : 'Tải brochure (PDF)' ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="relative z-10 hidden lg:block">
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border border-white/20">
                    <p class="text-white/60 font-label-sm text-xs mb-4 font-semibold">
                        <?php echo esc_html( $cta_working_hours ); ?>
                    </p>
                    <p class="text-prestige-gold font-headline-md text-xl font-bold">
                        <?php echo esc_html( function_exists( 'lh_opt' ) ? lh_opt( 'lh_hotline', '+84 3789 19119' ) : '+84 3789 19119' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
get_footer();
