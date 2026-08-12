<?php
/**
 * Template Name: Văn Phòng Cao Cấp (Serviced Office)
 *
 * @package The_Leaders_Hub
 */

get_header();

// ACF Variables: Section 1 Hero Banner
$hero_badge      = lh_field( 'so_hero_badge', 'DỊCH VỤ ĐẲNG CẤP' );
$hero_title      = lh_field( 'so_hero_title', 'Văn phòng dịch vụ' );
$hero_gold_title = lh_field( 'so_hero_gold_title', '(Serviced Office)' );
$hero_desc       = lh_field( 'so_hero_desc', 'Giải pháp văn phòng riêng đầy đủ nội thất và dịch vụ vận hành chuyên nghiệp tiêu chuẩn 5 sao tại Capital Place.' );
$hero_image      = lh_field( 'so_hero_image', 'https://lh3.googleusercontent.com/aida/AP1WRLs__mEPJqOiaNAI8-KgSJwLDwGOzYLG8yGx4sItV0u-QVeuSUYuc0A4f15ZmcSU3909z917fGcFLHB7BSgdcqJC-TFirnSeYV1iXpx458hLhXF9cmOWHI7g5co1vlpQ7KYblP-FA3X4Jks4pvNUlYVBO7U0gusm4fNP1yyTs4ywjh145wvogEckRXMDQbcZ5TfiGtyQhRPloF4RWRqBaJQyR45m0YPs_kfFTPqseuZjABqJD8w8sTwCdFg' );
$hero_btn1_text  = lh_field( 'so_hero_btn1_text', 'ĐẶT LỊCH THAM QUAN' );
$hero_btn1_url   = lh_field( 'so_hero_btn1_url', '#booking-form' );
$hero_btn2_text  = lh_field( 'so_hero_btn2_text', 'NHẬN BÁO GIÁ NGAY' );
$hero_btn2_url   = lh_field( 'so_hero_btn2_url', '#booking-form' );

// ACF Variables: Section 2 Introduction
$intro_title   = lh_field( 'so_intro_title', 'Không gian riêng tư / Nâng tầm doanh nghiệp' );
$intro_content = lh_field( 'so_intro_content', '<p>Tại The Leaders Hub, chúng tôi kiến tạo một hệ sinh thái làm việc chuyên nghiệp và đẳng cấp, nơi các nhà lãnh đạo và doanh nghiệp có thể tập trung hoàn toàn vào giá trị cốt lõi.</p><ul class="space-y-4"><li class="flex items-start gap-3"><span class="material-symbols-outlined text-prestige-gold mt-1">check_circle</span><span>Văn phòng riêng đầy đủ nội thất và dịch vụ vận hành (Serviced Office).</span></li><li class="flex items-start gap-3"><span class="material-symbols-outlined text-prestige-gold mt-1">check_circle</span><span>Thời gian thuê linh hoạt từ ngắn hạn đến dài hạn tùy nhu cầu.</span></li></ul>' );
$intro_image_1 = lh_field( 'so_intro_image_1', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBe4Fcc5_yJMz0qbFJf7UJa9STWVjghx53tHceGjryBKP7_ha1hwuaCymDNsXCqlcdXX58986mHmZfz8zGoyb3yjixB0RXbrbP5AL6fzlI0LxZPRXto7dglTbu9xaS4zNpEdpcaSkCxac-LqY25dV6aHPBCx7l6ynSfiPCHP9kOQ5TkLD3k_ANjNQhokxqn9lZY_3bMMwE7KCGGVmBt6xHz53ylZx2irb1kpJptF2eKP36ytj0GjCCgJzIoadfCE5gtCTXHk8MdNwIg' );
$intro_image_2 = lh_field( 'so_intro_image_2', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAqrzM479luW7iWxlHGuRUfXV4Q1stJI1RoV5CfhFQ9GHJ0XD3shD7CQ3swtckwWPbKVXEwuyrae9uIHD7WQUNu5IdO5GwJiS4KYi2zDd5QCsJaVVN5YZ53unWXPGNzZ3HWXpfiw4j4pomiHDwDK1DOCMbTWrqFfg8j28tDED-QHGc7jilOjIJ3Y1dyxWYFr8OQs9zJvF52kMEaagZdrUGsKipmzZDEDMLinTAuj657W6tIu9WXKavBhRBovYMj8Xt7q-XCpgU1bLFk' );

// ACF Variables: Section 3 Utilities Grid
$utils_badge = lh_field( 'so_utils_badge', 'TIỆN ÍCH ĐẶC QUYỀN' );
$utils_title = lh_field( 'so_utils_title', 'Hơn cả một văn phòng' );

// ACF Variables: Section 4 Real Gallery
$gallery_title     = lh_field( 'so_gallery_title', 'Thư viện ảnh thực tế' );
$gallery_desc      = lh_field( 'so_gallery_desc', 'Tham quan không gian làm việc hiện đại tại Capital Place.' );
$gallery_image_1   = lh_field( 'so_gallery_image_1', 'https://lh3.googleusercontent.com/aida-public/AB6AXuB9ztHBGSbUx1G9GkhGuYM0Tm2PB1BJc9iESy4N0dyW_MfIrfQ9xKlQayh7SkuyABkcAo12w1qQG6Svnw7OeLwx_k-1CCBVOhJUR9vJLUeQLyBm1Y9_ASF-ipjj0NC5cKpgyHBvzcVZPB_WcmKKlSb_IPHFt6qJEtkMHnVoZIHLg6NeMsj4egLfpXxhuPJxn7yarkpd8uPKciWbedhXTB3Ny8jMpX-r-HGvrthwvt_doB4zyC9qd4g6AiZoGxOZzg3Gw1BoTYRCz-1E' );
$gallery_caption_1 = lh_field( 'so_gallery_caption_1', 'Khu vực Lounge sang trọng' );
$gallery_image_2   = lh_field( 'so_gallery_image_2', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCRAKHtVMpE1Q1Fiba2woIZDpk2pL-_AAHTnynqsQHDzGCfwrsoGjEW6FuQxYuNucq6onv1tOfetpDVKLTHXOAjtICR4JoOWK8VNTMZj04uRxeSu8t57quLGwsgXlMx_MV82A9GCMs9DoU2KeTxLGPDIwqDYwzz7b9Y7GI8vicna9oxF8uGUl0wuBSguIZVyeubJih97KX4aSbeCrIyqvC7uTzFeTsHrW3m-pb7KIurdmmM46BJzRViCXZlN2NKLGNJU-vryThhPEw3' );
$gallery_caption_2 = lh_field( 'so_gallery_caption_2', 'Phòng họp Boardroom' );
$gallery_image_3   = lh_field( 'so_gallery_image_3', 'https://lh3.googleusercontent.com/aida-public/AB6AXuC-BBZSX54I9lPFEapCECcAOXd5uW9Cmv1lSBZfxhB0KEr13L2qn4LTtiNjZiGe_UAAscskqvEo_Eh1JDY6HD6-rO_Ctg7QG-MIq_nYEOWQhh7r1c1T07bTd8J-wy9axOWmzUKVbMCZqP3JKVr6Rexyn0Vv476mg3fXA22aZXyoxlVdN2f_iOFoh4I2tc3_N-Ngi5eC7Zz_QhGh1Ukl6zDrBvdPPEFVc4K5WE-M7BT_uTmhm-kc6YYmVRXDAdKWo7nKdnsldf--TJm5' );
$gallery_caption_3 = lh_field( 'so_gallery_caption_3', 'Khu vực Pantry hiện đại' );

// ACF Variables: Section 5 Pricing & CTA
$cta_title          = lh_field( 'so_cta_title', 'Sẵn sàng nâng tầm vị thế doanh nghiệp?' );
$cta_desc           = lh_field( 'so_cta_desc', 'Liên hệ ngay với The Leaders Hub để nhận được báo giá chi tiết và các chương trình ưu đãi đặc biệt cho gói Văn phòng dịch vụ (Serviced Office).' );
$cta_price_label    = lh_field( 'so_cta_price_label', 'Giá dịch vụ' );
$cta_price_val      = lh_field( 'so_cta_price_val', 'Liên hệ nhận báo giá' );
$cta_price_sub      = lh_field( 'so_cta_price_sub', 'Theo diện tích và thời hạn' );
$cta_capacity_label = lh_field( 'so_cta_capacity_label', 'Sức chứa' );
$cta_capacity_val   = lh_field( 'so_cta_capacity_val', '1 - 20 nhân sự' );
$cta_capacity_sub   = lh_field( 'so_cta_capacity_sub', 'Tùy biến linh hoạt' );

function lh_field( $name, $default = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $name );
        return ( $val !== null && $val !== '' && $val !== false ) ? $val : $default;
    }
    return $default;
}
?>

<!-- Hero Banner -->
<section class="relative h-[80vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <?php if ( ! empty( $hero_image ) ) : ?>
            <img alt="<?php echo esc_attr( $hero_title ); ?>" class="w-full h-full object-cover" src="<?php echo esc_url( $hero_image ); ?>" />
        <?php endif; ?>
        <div class="absolute inset-0 bg-gradient-to-r from-deep-navy/80 to-transparent"></div>
    </div>
    <div class="max-w-container-max mx-auto px-gutter w-full relative z-10">
        <div class="max-w-2xl text-white">
            <?php if ( ! empty( $hero_badge ) ) : ?>
                <span class="inline-block px-4 py-1 bg-prestige-gold/20 text-prestige-gold rounded-full font-label-sm text-xs mb-6 border border-prestige-gold/30 font-bold uppercase tracking-wider"><?php echo esc_html( $hero_badge ); ?></span>
            <?php endif; ?>

            <?php if ( ! empty( $hero_title ) || ! empty( $hero_gold_title ) ) : ?>
                <h1 class="font-display-lg text-4xl md:text-5xl mb-6 leading-tight font-bold">
                    <?php if ( ! empty( $hero_title ) ) : ?>
                        <?php echo esc_html( $hero_title ); ?>
                    <?php endif; ?>
                    <?php if ( ! empty( $hero_gold_title ) ) : ?>
                        <br/>
                        <span class="text-prestige-gold"><?php echo esc_html( $hero_gold_title ); ?></span>
                    <?php endif; ?>
                </h1>
            <?php endif; ?>

            <?php if ( ! empty( $hero_desc ) ) : ?>
                <p class="font-body-lg text-body-lg text-surface-variant mb-10 opacity-90">
                    <?php echo esc_html( $hero_desc ); ?>
                </p>
            <?php endif; ?>

            <?php if ( ! empty( $hero_btn1_text ) || ! empty( $hero_btn2_text ) ) : ?>
                <div class="flex flex-wrap gap-4">
                    <?php if ( ! empty( $hero_btn1_text ) ) : ?>
                        <a class="bg-success-green hover:bg-success-green/90 text-white px-8 py-4 rounded-lg font-label-sm text-sm shadow-lg transition-all font-bold" href="<?php echo esc_url( $hero_btn1_url ); ?>">
                            <?php echo esc_html( $hero_btn1_text ); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $hero_btn2_text ) ) : ?>
                        <a class="border border-white/30 hover:bg-white/10 text-white px-8 py-4 rounded-lg font-label-sm text-sm backdrop-blur-sm transition-all font-bold text-center" href="<?php echo esc_url( $hero_btn2_url ); ?>">
                            <?php echo esc_html( $hero_btn2_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Introduction -->
<?php if ( ! empty( $intro_title ) || ! empty( $intro_content ) || ! empty( $intro_image_1 ) || ! empty( $intro_image_2 ) ) : ?>
<section class="py-section-padding-desktop bg-white">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <?php if ( ! empty( $intro_title ) ) : ?>
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-8 font-bold"><?php echo esc_html( $intro_title ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $intro_content ) ) : ?>
                    <div class="space-y-6 text-on-surface-variant font-body-md text-body-md leading-relaxed">
                        <?php echo wp_kses_post( $intro_content ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ( ! empty( $intro_image_1 ) || ! empty( $intro_image_2 ) ) : ?>
                <div class="relative grid grid-cols-2 gap-4">
                    <?php if ( ! empty( $intro_image_1 ) ) : ?>
                        <div class="pt-12">
                            <img alt="<?php echo esc_attr( $intro_title ); ?>" class="w-full h-[400px] object-cover rounded-xl shadow-xl" src="<?php echo esc_url( $intro_image_1 ); ?>" />
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $intro_image_2 ) ) : ?>
                        <div>
                            <img alt="<?php echo esc_attr( $intro_title ); ?>" class="w-full h-[400px] object-cover rounded-xl shadow-xl" src="<?php echo esc_url( $intro_image_2 ); ?>" />
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Utilities Grid -->
<?php if ( ! empty( $utils_title ) || ( function_exists( 'have_rows' ) && have_rows( 'so_utils_list' ) ) ) : ?>
<section class="py-section-padding-desktop bg-surface">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $utils_badge ) || ! empty( $utils_title ) ) : ?>
            <div class="text-center mb-16">
                <?php if ( ! empty( $utils_badge ) ) : ?>
                    <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest font-semibold"><?php echo esc_html( $utils_badge ); ?></span>
                <?php endif; ?>

                <?php if ( ! empty( $utils_title ) ) : ?>
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy mt-4 font-bold"><?php echo esc_html( $utils_title ); ?></h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ( function_exists( 'have_rows' ) && have_rows( 'so_utils_list' ) ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php while ( have_rows( 'so_utils_list' ) ) : the_row();
                    $u_icon  = get_sub_field( 'icon' ) ?: 'local_cafe';
                    $u_title = get_sub_field( 'title' );
                    $u_desc  = get_sub_field( 'desc' );

                    if ( empty( $u_title ) ) continue;
                ?>
                    <div class="bg-white p-8 rounded-xl shadow-sm hover:-translate-y-2 transition-all duration-300 group border border-transparent hover:border-prestige-gold/20">
                        <div class="w-12 h-12 bg-deep-navy/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-prestige-gold group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined"><?php echo esc_html( $u_icon ); ?></span>
                        </div>
                        <h3 class="font-headline-md text-lg text-deep-navy mb-3 font-bold"><?php echo esc_html( $u_title ); ?></h3>
                        <?php if ( ! empty( $u_desc ) ) : ?>
                            <p class="text-on-surface-variant font-body-md text-sm"><?php echo esc_html( $u_desc ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- Gallery -->
<?php if ( ! empty( $gallery_title ) || ! empty( $gallery_image_1 ) || ! empty( $gallery_image_2 ) || ! empty( $gallery_image_3 ) ) : ?>
<section class="py-section-padding-desktop bg-white">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $gallery_title ) || ! empty( $gallery_desc ) ) : ?>
            <div class="flex justify-between items-end mb-12">
                <div>
                    <?php if ( ! empty( $gallery_title ) ) : ?>
                        <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold"><?php echo esc_html( $gallery_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $gallery_desc ) ) : ?>
                        <p class="text-on-surface-variant mt-2"><?php echo esc_html( $gallery_desc ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-12 gap-4 h-[600px]">
            <?php if ( ! empty( $gallery_image_1 ) ) : ?>
                <div class="col-span-12 md:col-span-8 overflow-hidden rounded-2xl group relative">
                    <img alt="<?php echo esc_attr( $gallery_caption_1 ?: $gallery_title ); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo esc_url( $gallery_image_1 ); ?>" />
                    <?php if ( ! empty( $gallery_caption_1 ) ) : ?>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
                            <span class="text-white font-bold"><?php echo esc_html( $gallery_caption_1 ); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $gallery_image_2 ) || ! empty( $gallery_image_3 ) ) : ?>
                <div class="col-span-12 md:col-span-4 flex flex-col gap-4">
                    <?php if ( ! empty( $gallery_image_2 ) ) : ?>
                        <div class="h-1/2 overflow-hidden rounded-2xl group relative">
                            <img alt="<?php echo esc_attr( $gallery_caption_2 ?: $gallery_title ); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo esc_url( $gallery_image_2 ); ?>" />
                            <?php if ( ! empty( $gallery_caption_2 ) ) : ?>
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                                    <span class="text-white font-bold"><?php echo esc_html( $gallery_caption_2 ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $gallery_image_3 ) ) : ?>
                        <div class="h-1/2 overflow-hidden rounded-2xl group relative">
                            <img alt="<?php echo esc_attr( $gallery_caption_3 ?: $gallery_title ); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo esc_url( $gallery_image_3 ); ?>" />
                            <?php if ( ! empty( $gallery_caption_3 ) ) : ?>
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                                    <span class="text-white font-bold"><?php echo esc_html( $gallery_caption_3 ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Pricing & CTA -->
<?php if ( ! empty( $cta_title ) || ! empty( $cta_desc ) || ! empty( $cta_price_val ) || ! empty( $cta_capacity_val ) ) : ?>
<section class="py-section-padding-desktop bg-deep-navy text-white relative overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <?php if ( ! empty( $cta_title ) ) : ?>
                    <h2 class="font-headline-xl text-headline-xl mb-6 font-bold"><?php echo nl2br( esc_html( $cta_title ) ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $cta_desc ) ) : ?>
                    <p class="text-surface-variant font-body-lg text-body-lg mb-12 opacity-80"><?php echo esc_html( $cta_desc ); ?></p>
                <?php endif; ?>

                <?php if ( ! empty( $cta_price_val ) || ! empty( $cta_capacity_val ) ) : ?>
                    <div class="grid grid-cols-2 gap-8">
                        <?php if ( ! empty( $cta_price_val ) ) : ?>
                            <div class="border-l-2 border-prestige-gold pl-6">
                                <?php if ( ! empty( $cta_price_label ) ) : ?>
                                    <p class="text-prestige-gold font-label-sm text-xs uppercase mb-2 font-bold"><?php echo esc_html( $cta_price_label ); ?></p>
                                <?php endif; ?>

                                <p class="text-xl font-bold"><?php echo esc_html( $cta_price_val ); ?></p>

                                <?php if ( ! empty( $cta_price_sub ) ) : ?>
                                    <p class="text-sm text-surface-variant"><?php echo esc_html( $cta_price_sub ); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $cta_capacity_val ) ) : ?>
                            <div class="border-l-2 border-prestige-gold pl-6">
                                <?php if ( ! empty( $cta_capacity_label ) ) : ?>
                                    <p class="text-prestige-gold font-label-sm text-xs uppercase mb-2 font-bold"><?php echo esc_html( $cta_capacity_label ); ?></p>
                                <?php endif; ?>

                                <p class="text-xl font-bold"><?php echo esc_html( $cta_capacity_val ); ?></p>

                                <?php if ( ! empty( $cta_capacity_sub ) ) : ?>
                                    <p class="text-sm text-surface-variant"><?php echo esc_html( $cta_capacity_sub ); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="airtable-embed-container bg-white p-2 text-on-surface shadow-2xl" id="booking-form">
                <iframe class="w-full" src="<?php echo esc_url( lh_opt( 'lh_form_office', 'https://airtable.com/embed/app0nmwylnsZLQTuu/pag0tggimRE7gA3xw/form' ) ); ?>" frameborder="0" onmousewheel="" width="100%"></iframe>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Service Steps -->
<section class="py-section-padding-desktop bg-surface">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="relative pt-12 group">
                <span class="absolute top-0 left-0 text-9xl font-bold text-deep-navy opacity-5 -z-10 transition-opacity group-hover:opacity-10 select-none">01</span>
                <h4 class="font-headline-md text-lg text-deep-navy mb-4 font-bold">Khám Phá và Trải Nghiệm</h4>
                <p class="text-on-surface-variant text-sm">Đặt lịch tham quan trực tiếp không gian làm việc lý tưởng tại trung tâm của chúng tôi.</p>
            </div>
            <div class="relative pt-12 group">
                <span class="absolute top-0 left-0 text-9xl font-bold text-deep-navy opacity-5 -z-10 transition-opacity group-hover:opacity-10 select-none">02</span>
                <h4 class="font-headline-md text-lg text-deep-navy mb-4 font-bold">Nhận Báo Giá</h4>
                <p class="text-on-surface-variant text-sm">Tư vấn diện tích phù hợp và nhận báo giá ưu đãi tùy theo nhu cầu thực tế của doanh nghiệp.</p>
            </div>
            <div class="relative pt-12 group">
                <span class="absolute top-0 left-0 text-9xl font-bold text-deep-navy opacity-5 -z-10 transition-opacity group-hover:opacity-10 select-none">03</span>
                <h4 class="font-headline-md text-lg text-deep-navy mb-4 font-bold">Vào Sử Dụng</h4>
                <p class="text-on-surface-variant text-sm">Thời điểm bàn giao và bắt đầu sử dụng theo thỏa thuận và tình trạng sẵn có của phòng.</p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
