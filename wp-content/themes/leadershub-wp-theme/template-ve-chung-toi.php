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

function lh_field( $name, $default = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $name );
        return ( $val !== null && $val !== '' && $val !== false ) ? $val : $default;
    }
    return $default;
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

<!-- Brand Story -->
<section class="py-section-padding-desktop bg-white">
    <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div class="order-2 md:order-1">
            <span class="text-prestige-gold font-label-sm text-label-sm uppercase tracking-[0.2em] mb-4 block font-bold"><?php echo esc_html( lh_field( 'about_story_badge', 'Câu chuyện thương hiệu' ) ); ?></span>
            <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-8 font-bold"><?php echo esc_html( lh_field( 'about_story_title', 'Không gian làm việc chuyên nghiệp tại Capital Place' ) ); ?></h2>
            <div class="space-y-6 text-on-surface-variant font-body-md text-body-md leading-relaxed">
                <?php if ( lh_field( 'about_story_content' ) ) : ?>
                    <?php echo wp_kses_post( lh_field( 'about_story_content' ) ); ?>
                <?php else : ?>
                    <p>Tọa lạc tại tầng 19, tháp 1, tòa nhà Capital Place - biểu tượng văn phòng hạng A tại số 29 Liễu Giai, The Leaders Hub cung cấp các giải pháp không gian làm việc chuyên nghiệp và địa chỉ kinh doanh uy tín cho mọi doanh nghiệp.</p>
                    <p>Chúng tôi tập trung mang lại giá trị thực chất thông qua hạ tầng văn phòng hiện đại, quy trình vận hành đồng bộ và dịch vụ hỗ trợ chu đáo.</p>
                <?php endif; ?>
            </div>
            
            <div class="mt-12 grid grid-cols-2 gap-8 border-t border-surface-container-highest pt-8">
                <?php if ( function_exists( 'have_rows' ) && have_rows( 'about_stats' ) ) : ?>
                    <?php while ( have_rows( 'about_stats' ) ) : the_row(); ?>
                        <div>
                            <div class="text-headline-md font-bold text-deep-navy text-2xl"><?php echo esc_html( get_sub_field( 'number' ) ); ?></div>
                            <div class="text-label-sm text-on-surface-variant text-sm"><?php echo esc_html( get_sub_field( 'label' ) ); ?></div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div>
                        <div class="text-headline-md font-bold text-deep-navy text-2xl">500+</div>
                        <div class="text-label-sm text-on-surface-variant text-sm">Doanh nghiệp tin tưởng</div>
                    </div>
                    <div>
                        <div class="text-headline-md font-bold text-deep-navy text-2xl">10+</div>
                        <div class="text-label-sm text-on-surface-variant text-sm">Năm kinh nghiệm</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="order-1 md:order-2 relative">
            <div class="absolute -top-12 -left-12 w-48 h-48 bg-prestige-gold/10 rounded-full blur-3xl"></div>
            <div class="rounded-xl overflow-hidden shadow-2xl relative z-10 aspect-[4/5]">
                <img class="w-full h-full object-cover" src="<?php echo esc_url( lh_field( 'about_story_image', 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=800&q=80' ) ); ?>" alt="Hanoi Skyline View" />
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="bg-surface-container-low py-section-padding-desktop overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-20">
            <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-4 font-bold">Giá Trị Cốt Lõi</h2>
            <div class="w-20 h-1 bg-prestige-gold mx-auto mt-4"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group bg-white p-10 rounded-xl luxury-shadow hover:-translate-y-2 transition-all duration-300 relative overflow-hidden" style="transform: translateZ(0);">
                <div class="absolute top-2 right-4 text-[80px] font-bold text-deep-navy opacity-[0.03] select-none group-hover:scale-110 transition-transform">01</div>
                <div class="w-16 h-16 bg-deep-navy/5 rounded-lg flex items-center justify-center mb-8">
                    <span class="material-symbols-outlined text-prestige-gold text-4xl" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-deep-navy mb-4 font-bold">Sứ mệnh</h3>
                <p class="font-body-md text-body-md text-on-surface-variant">Kiến tạo không gian làm việc tối ưu, giúp doanh nghiệp tập trung vào mục tiêu tăng trưởng và nâng cao giá trị thương hiệu.</p>
            </div>
            <div class="group bg-white p-10 rounded-xl luxury-shadow hover:-translate-y-2 transition-all duration-300 relative overflow-hidden" style="transform: translateZ(0);">
                <div class="absolute top-2 right-4 text-[80px] font-bold text-deep-navy opacity-[0.03] select-none group-hover:scale-110 transition-transform">02</div>
                <div class="w-16 h-16 bg-deep-navy/5 rounded-lg flex items-center justify-center mb-8">
                    <span class="material-symbols-outlined text-prestige-gold text-4xl" style="font-variation-settings: 'FILL' 1;">visibility</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-deep-navy mb-4 font-bold">Tầm nhìn</h3>
                <p class="font-body-md text-body-md text-on-surface-variant">Trở thành biểu tượng của sự chuyên nghiệp và đẳng cấp trong lĩnh vực văn phòng dịch vụ cao cấp tại Đông Nam Á.</p>
            </div>
            <div class="group bg-white p-10 rounded-xl luxury-shadow hover:-translate-y-2 transition-all duration-300 relative overflow-hidden" style="transform: translateZ(0);">
                <div class="absolute top-2 right-4 text-[80px] font-bold text-deep-navy opacity-[0.03] select-none group-hover:scale-110 transition-transform">03</div>
                <div class="w-16 h-16 bg-deep-navy/5 rounded-lg flex items-center justify-center mb-8">
                    <span class="material-symbols-outlined text-prestige-gold text-4xl" style="font-variation-settings: 'FILL' 1;">diamond</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-deep-navy mb-4 font-bold">Giá trị cốt lõi</h3>
                <p class="font-body-md text-body-md text-on-surface-variant">Sự tận tâm, Minh bạch, Đẳng cấp và Đổi mới là những trụ cột vững chắc trong mọi hoạt động của The Leaders Hub.</p>
            </div>
        </div>
    </div>
</section>

<!-- Certifications & Partners -->
<section class="bg-deep-navy py-16 text-white overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter">
        <h3 class="text-center font-label-sm text-xs uppercase tracking-widest text-white/50 mb-8 font-semibold">Chứng nhận tòa nhà văn phòng Capital Place</h3>
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-24 opacity-60 hover:opacity-100 transition-opacity">
            <div class="h-8 md:h-12 w-auto flex items-center justify-center grayscale hover:grayscale-0 transition-all font-bold text-lg md:text-xl">CAPITAL PLACE</div>
            <div class="h-8 md:h-12 w-auto flex items-center justify-center grayscale hover:grayscale-0 transition-all font-bold text-lg md:text-xl">ISO 9001:2015</div>
            <div class="h-8 md:h-12 w-auto flex items-center justify-center grayscale hover:grayscale-0 transition-all font-bold text-lg md:text-xl">LEED GOLD</div>
        </div>
    </div>
</section>

<!-- Real Office Space -->
<section class="py-section-padding-desktop bg-white">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">Hình ảnh thực tế</h2>
            <p class="text-on-surface-variant font-body-md text-body-md mt-4">Khám phá không gian sống động tại The Leaders Hub</p>
        </div>
        <div class="rounded-2xl overflow-hidden shadow-2xl">
            <img class="w-full h-auto hover:scale-[1.02] transition-transform duration-700" src="<?php echo esc_url( lh_field( 'about_gallery_image', 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80' ) ); ?>" alt="Real Workspace Space" />
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-section-padding-desktop bg-surface-container-low">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="relative rounded-3xl overflow-hidden bg-deep-navy p-12 md:p-20 flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="relative z-10 max-w-xl text-center md:text-left">
                <h2 class="font-headline-xl text-headline-xl text-white mb-6 font-bold">Bạn đã sẵn sàng nâng tầm thương hiệu?</h2>
                <p class="font-body-lg text-body-lg text-white/70 mb-8">Liên hệ ngay để nhận chương trình ưu đãi đặc biệt dành cho văn phòng dịch vụ trọn gói.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?php echo esc_url( home_url('/lien-he') ); ?>" class="bg-success-green text-white px-8 py-4 rounded-lg font-label-sm text-sm font-bold shadow-lg hover:bg-success-green/90 transition-all text-center">Gửi yêu cầu ngay</a>
                    <a href="<?php echo esc_url( lh_field( 'about_brochure_url', '#' ) ); ?>" class="bg-transparent border border-white/30 text-white px-8 py-4 rounded-lg font-label-sm text-sm font-semibold hover:bg-white/10 transition-all text-center">Tải brochure (PDF)</a>
                </div>
            </div>
            <div class="relative z-10 hidden lg:block">
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border border-white/20">
                    <p class="text-white/60 font-label-sm text-xs mb-4 font-semibold">Hotline hỗ trợ</p>
                    <p class="text-prestige-gold font-headline-md text-xl font-bold"><?php echo esc_html( lh_opt( 'lh_hotline', '+84 3789 19119' ) ); ?></p>
                    <p class="text-white/80 font-body-md text-sm mt-2">Ms. Tracy</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
