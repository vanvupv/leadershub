<?php
/**
 * Template Name: Phòng Họp (Meeting Room)
 *
 * @package The_Leaders_Hub
 */

get_header();

// ACF Variables: Section 1 Hero Banner
$hero_badge      = lh_field( 'mr_hero_badge', 'KHÔNG GIAN HẠNG A' );
$hero_title      = lh_field( 'mr_hero_title', 'Phòng họp' );
$hero_gold_title = lh_field( 'mr_hero_gold_title', 'chuyên nghiệp' );
$hero_desc       = lh_field( 'mr_hero_desc', 'Nâng tầm thương hiệu và khẳng định vị thế dẫn đầu với hệ thống phòng họp sang trọng, tích hợp công nghệ hiện đại bậc nhất ngay tại trung tâm Thủ đô.' );
$hero_image      = lh_field( 'mr_hero_image', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBiMsNiduxFm1NMAhcX6AfWdR1Zr30jCIAvZXmvmky4Qy8CJkdWpZjSYRo7DH0NYnm2ghsEqMpnBtDsrBzTee6csYP-_3c4jZOE63bz9hhBLeCY7OTfnZwGpAoXZw76nuFMYJUmUMKnXHh-0qsgNMElEzKSnYTAbkfTo1gcAkdohlr-H1aqgU_gyyAayscJ6kdKAPhyvrdXJ18KcWcGrG7qLFwD-E__KKTYGo4au767WRT26fjIVPBMgtTwPHaicZg4wR1KvuI-LHkG' );
$hero_btn1_text  = lh_field( 'mr_hero_btn1_text', 'ĐẶT PHÒNG NGAY' );
$hero_btn1_url   = lh_field( 'mr_hero_btn1_url', '#booking' );
$hero_btn2_text  = lh_field( 'mr_hero_btn2_text', 'XEM CÁC LOẠI PHÒNG' );
$hero_btn2_url   = lh_field( 'mr_hero_btn2_url', '#rooms' );
$hero_card_badge = lh_field( 'mr_hero_card_badge', 'Dịch vụ 5 sao' );
$hero_card_desc  = lh_field( 'mr_hero_card_desc', 'Phục vụ trà, cà phê và hỗ trợ kỹ thuật tận nơi suốt buổi họp.' );

// ACF Variables: Section 2 Room Types Grid
$rooms_title = lh_field( 'mr_rooms_title', 'Lựa chọn không gian phù hợp' );

// ACF Variables: Section 3 Specs & Amenities
$amenities_title   = lh_field( 'mr_amenities_title', 'Tiện ích & Trang thiết bị đi kèm' );
$amenities_desc    = lh_field( 'mr_amenities_desc', 'Tất cả các dịch vụ tiện ích dưới đây được thiết kế và cung cấp theo tiêu chuẩn cao cấp nhất, đảm bảo tính chuyên nghiệp tối đa cho buổi họp của bạn.' );
$amenities_image_1 = lh_field( 'mr_amenities_image_1', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDR3arAjbMDVy6Y7ExqMouxAG6teq1fENt4p6gtBmL6onX6BwmAiPCVUBrSXUdprIVF9JucKDx6yypRPhuFT7tP9tQkQxEUyeI_PNNAPhqicZPZ0IlnBW717pfPbce4oL4lFA4xQ4zBUw8z373-A6CD5HjAjW7M30xFnBvCpJPk56FpMINiYnQhaPCBxUfHX9FO_dO5AAmDHDrC3KEZDU5xP1BPQQwOLmuR4Ke3MLEJ1xuoGpgaSFo_4Y67PawsMOELFICba-_mj59S' );
$amenities_image_2 = lh_field( 'mr_amenities_image_2', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBxOHxWIxX0ldBkJVTxc0dkh6PPOdsSjOEY2I6d43gAjIi011hR7UaPClU0SB-6r9mQS3X9PfUye8bH0ZA1b4M0UmkTf-vA_bHrQEQBAy2wipnmgQVd9TpaZbrOeVw7elx06eRCkmOJfBlbw4-EqEavltsq6Rie4wNLK8mV-un26HUz3bp7OELKbUA1OCDoMXhtWsvJ-0RTMnf2AwGmxdIA9p-ktNJf57Du0HAVOh3EkHaB4Wc-vEUvXI9QWsbAR8_lnmsM2K3dcIBH' );

// ACF Variables: Section 4 Booking Form
$booking_title         = lh_field( 'mr_booking_title', 'Đặt phòng họp ngay' );
$booking_desc          = lh_field( 'mr_booking_desc', 'Đội ngũ sẽ liên hệ trong thời gian sớm nhất trong giờ làm việc để hỗ trợ và hoàn tất thủ tục đặt phòng họp cho quý khách.' );
$booking_hotline_label = lh_field( 'mr_booking_hotline_label', 'Hotline tư vấn' );

function lh_field( $name, $default = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $name );
        return ( $val !== null && $val !== '' && $val !== false ) ? $val : $default;
    }
    return $default;
}
?>

<!-- Hero Banner -->
<?php if ( ! empty( $hero_title ) || ! empty( $hero_desc ) || ! empty( $hero_image ) ) : ?>
<section class="relative pt-32 pb-section-padding-desktop overflow-hidden bg-surface">
    <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="z-10">
            <?php if ( ! empty( $hero_badge ) ) : ?>
                <span class="inline-block px-4 py-1 bg-prestige-gold/10 text-prestige-gold font-label-sm text-xs rounded-full mb-6 font-bold uppercase tracking-widest"><?php echo esc_html( $hero_badge ); ?></span>
            <?php endif; ?>

            <?php if ( ! empty( $hero_title ) ) : ?>
                <h1 class="font-display-lg text-display-lg text-deep-navy mb-8 leading-tight font-bold">
                    <?php echo esc_html( $hero_title ); ?>
                    <?php if ( ! empty( $hero_gold_title ) ) : ?>
                        <br/><span class="text-prestige-gold"><?php echo esc_html( $hero_gold_title ); ?></span>
                    <?php endif; ?>
                </h1>
            <?php endif; ?>

            <?php if ( ! empty( $hero_desc ) ) : ?>
                <p class="font-body-lg text-body-lg text-slate-500 mb-10 max-w-lg">
                    <?php echo esc_html( $hero_desc ); ?>
                </p>
            <?php endif; ?>

            <?php if ( ! empty( $hero_btn1_text ) || ! empty( $hero_btn2_text ) ) : ?>
                <div class="flex flex-wrap gap-4">
                    <?php if ( ! empty( $hero_btn1_text ) ) : ?>
                        <a class="bg-deep-navy text-white px-8 py-4 rounded-lg font-label-sm text-sm flex items-center gap-2 hover:bg-prestige-gold transition-all font-semibold" href="<?php echo esc_url( $hero_btn1_url ); ?>">
                            <?php echo esc_html( $hero_btn1_text ); ?>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $hero_btn2_text ) ) : ?>
                        <a class="border border-deep-navy text-deep-navy px-8 py-4 rounded-lg font-label-sm text-sm hover:bg-surface-container transition-all font-semibold" href="<?php echo esc_url( $hero_btn2_url ); ?>">
                            <?php echo esc_html( $hero_btn2_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $hero_image ) ) : ?>
            <div class="relative">
                <div class="rounded-2xl overflow-hidden ambient-shadow h-[500px]">
                    <img class="w-full h-full object-cover" src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( $hero_title ); ?>" />
                </div>
                <?php if ( ! empty( $hero_card_badge ) || ! empty( $hero_card_desc ) ) : ?>
                    <!-- Floating Card -->
                    <div class="absolute -bottom-10 -left-10 glass-card p-6 rounded-xl ambient-shadow hidden md:block max-w-[240px]">
                        <?php if ( ! empty( $hero_card_badge ) ) : ?>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="material-symbols-outlined text-prestige-gold" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="font-label-sm text-xs text-deep-navy font-bold"><?php echo esc_html( $hero_card_badge ); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $hero_card_desc ) ) : ?>
                            <p class="text-[12px] text-slate-500"><?php echo esc_html( $hero_card_desc ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- Room Types Grid -->
<?php if ( ! empty( $rooms_title ) || ( function_exists( 'have_rows' ) && have_rows( 'mr_rooms_list' ) ) ) : ?>
<section class="py-section-padding-desktop bg-surface-container-low" id="rooms">
    <div class="max-w-container-max mx-auto px-gutter">
        <?php if ( ! empty( $rooms_title ) ) : ?>
            <div class="text-center mb-16">
                <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-4 font-bold"><?php echo esc_html( $rooms_title ); ?></h2>
                <div class="w-20 h-1 bg-prestige-gold mx-auto mt-4"></div>
            </div>
        <?php endif; ?>

        <?php if ( function_exists( 'have_rows' ) && have_rows( 'mr_rooms_list' ) ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <?php while ( have_rows( 'mr_rooms_list' ) ) : the_row();
                    $r_image      = get_sub_field( 'image' );
                    $r_area       = get_sub_field( 'area' );
                    $r_title      = get_sub_field( 'title' );
                    $r_capacity   = get_sub_field( 'capacity' );
                    $r_features   = get_sub_field( 'features' );
                    $r_price_text = get_sub_field( 'price_text' ) ?: 'Liên hệ nhận báo giá';
                    $r_btn_text   = get_sub_field( 'btn_text' ) ?: 'Đặt phòng';
                    $r_btn_url    = get_sub_field( 'btn_url' ) ?: '#booking';

                    if ( empty( $r_title ) ) continue;
                ?>
                    <div class="bg-white rounded-2xl overflow-hidden ambient-shadow group hover:-translate-y-2 transition-transform duration-300">
                        <?php if ( ! empty( $r_image ) ) : ?>
                            <div class="h-72 relative overflow-hidden">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?php echo esc_url( $r_image ); ?>" alt="<?php echo esc_attr( $r_title ); ?>" />
                                <?php if ( ! empty( $r_area ) ) : ?>
                                    <div class="absolute top-4 left-4 bg-deep-navy/80 backdrop-blur-sm text-white px-3 py-1 rounded-full font-label-sm text-xs font-bold">
                                        Diện tích <?php echo esc_html( $r_area ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="p-8">
                            <h3 class="font-headline-md text-headline-md text-deep-navy mb-2 font-bold"><?php echo esc_html( $r_title ); ?></h3>
                            <?php if ( ! empty( $r_capacity ) ) : ?>
                                <p class="font-label-sm text-sm text-prestige-gold mb-4 font-semibold"><?php echo esc_html( $r_capacity ); ?></p>
                            <?php endif; ?>

                            <?php if ( ! empty( $r_features ) ) : ?>
                                <div class="space-y-3 mb-8 text-slate-500 font-body-md text-sm">
                                    <?php echo wp_kses_post( $r_features ); ?>
                                </div>
                            <?php endif; ?>

                            <div class="flex justify-between items-center pt-4 border-t border-surface-container">
                                <span class="font-headline-md text-base text-deep-navy font-bold"><?php echo esc_html( $r_price_text ); ?></span>
                                <a href="<?php echo esc_url( $r_btn_url ); ?>" class="bg-success-green hover:bg-deep-navy text-white px-6 py-2 rounded-lg font-label-sm text-sm font-semibold transition-colors duration-200"><?php echo esc_html( $r_btn_text ); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- Specs/Amenities -->
<?php if ( ! empty( $amenities_title ) || ! empty( $amenities_desc ) || ( function_exists( 'have_rows' ) && have_rows( 'mr_amenities_list' ) ) ) : ?>
<section class="py-section-padding-desktop bg-white">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <?php if ( ! empty( $amenities_image_1 ) || ! empty( $amenities_image_2 ) ) : ?>
                <div class="relative grid grid-cols-2 gap-4">
                    <?php if ( ! empty( $amenities_image_1 ) ) : ?>
                        <div class="pt-12">
                            <div class="rounded-2xl overflow-hidden h-80 mb-4 ambient-shadow">
                                <img class="w-full h-full object-cover" src="<?php echo esc_url( $amenities_image_1 ); ?>" alt="<?php echo esc_attr( $amenities_title ); ?>" />
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $amenities_image_2 ) ) : ?>
                        <div>
                            <div class="rounded-2xl overflow-hidden h-80 ambient-shadow">
                                <img class="w-full h-full object-cover" src="<?php echo esc_url( $amenities_image_2 ); ?>" alt="<?php echo esc_attr( $amenities_title ); ?>" />
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div>
                <?php if ( ! empty( $amenities_title ) ) : ?>
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-6 font-bold"><?php echo esc_html( $amenities_title ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $amenities_desc ) ) : ?>
                    <p class="font-body-lg text-body-lg text-slate-500 mb-10"><?php echo esc_html( $amenities_desc ); ?></p>
                <?php endif; ?>

                <?php if ( function_exists( 'have_rows' ) && have_rows( 'mr_amenities_list' ) ) : ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <?php while ( have_rows( 'mr_amenities_list' ) ) : the_row();
                            $a_icon  = get_sub_field( 'icon' ) ?: 'tv';
                            $a_title = get_sub_field( 'title' );
                            $a_desc  = get_sub_field( 'desc' );

                            if ( empty( $a_title ) ) continue;
                        ?>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-lg bg-deep-navy flex items-center justify-center flex-shrink-0 text-white">
                                    <span class="material-symbols-outlined"><?php echo esc_html( $a_icon ); ?></span>
                                </div>
                                <div>
                                    <h4 class="font-headline-md text-base mb-1 font-semibold"><?php echo esc_html( $a_title ); ?></h4>
                                    <?php if ( ! empty( $a_desc ) ) : ?>
                                        <p class="font-body-md text-xs text-slate-500"><?php echo esc_html( $a_desc ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Booking Form Section -->
<?php if ( ! empty( $booking_title ) || ! empty( $booking_desc ) ) : ?>
<section class="py-section-padding-desktop relative bg-surface-container" id="booking">
    <div class="max-w-container-max mx-auto px-gutter relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <?php if ( ! empty( $booking_title ) ) : ?>
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-6 font-bold"><?php echo esc_html( $booking_title ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $booking_desc ) ) : ?>
                    <p class="font-body-lg text-body-lg text-slate-500 mb-8"><?php echo esc_html( $booking_desc ); ?></p>
                <?php endif; ?>
                
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full border-2 border-prestige-gold flex items-center justify-center text-prestige-gold">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                        <div>
                            <p class="font-label-sm text-xs uppercase text-slate-500 mb-1"><?php echo esc_html( $booking_hotline_label ); ?></p>
                            <p class="font-headline-md text-headline-md text-deep-navy font-bold"><?php echo esc_html( lh_opt( 'lh_hotline', '+84 3789 19119' ) ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="airtable-embed-container bg-white p-2 border border-surface-container-high" id="register-form">
                <iframe class="w-full" src="<?php echo esc_url( lh_opt( 'lh_form_meeting', 'https://airtable.com/embed/appVuZe9KkkvAwc2Y/pagJ4pWOKeV6FNhuB/form' ) ); ?>" frameborder="0" onmousewheel="" width="100%"></iframe>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
get_footer();
