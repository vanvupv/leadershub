<?php
/**
 * Template Name: Văn Phòng Cao Cấp (Serviced Office)
 *
 * @package The_Leaders_Hub
 */

get_header();

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
        <img alt="Premium Office Interior" class="w-full h-full object-cover" src="<?php echo esc_url( lh_field( 'so_hero_image', 'https://lh3.googleusercontent.com/aida/AP1WRLs__mEPJqOiaNAI8-KgSJwLDwGOzYLG8yGx4sItV0u-QVeuSUYuc0A4f15ZmcSU3909z917fGcFLHB7BSgdcqJC-TFirnSeYV1iXpx458hLhXF9cmOWHI7g5co1vlpQ7KYblP-FA3X4Jks4pvNUlYVBO7U0gusm4fNP1yyTs4ywjh145wvogEckRXMDQbcZ5TfiGtyQhRPloF4RWRqBaJQyR45m0YPs_kfFTPqseuZjABqJD8w8sTwCdFg' ) ); ?>" />
        <div class="absolute inset-0 bg-gradient-to-r from-deep-navy/80 to-transparent"></div>
    </div>
    <div class="max-w-container-max mx-auto px-gutter w-full relative z-10">
        <div class="max-w-2xl text-white">
            <span class="inline-block px-4 py-1 bg-prestige-gold/20 text-prestige-gold rounded-full font-label-sm text-xs mb-6 border border-prestige-gold/30 font-bold uppercase tracking-wider">DỊCH VỤ ĐẲNG CẤP</span>
            <h1 class="font-display-lg text-4xl md:text-5xl mb-6 leading-tight font-bold">
                <?php echo esc_html( lh_field( 'so_hero_title', 'Văn phòng dịch vụ' ) ); ?> <br/>
                <span class="text-prestige-gold"><?php echo esc_html( lh_field( 'so_hero_gold_title', '(Serviced Office)' ) ); ?></span>
            </h1>
            <p class="font-body-lg text-body-lg text-surface-variant mb-10 opacity-90">
                <?php echo esc_html( lh_field( 'so_hero_desc', 'Giải pháp văn phòng riêng đầy đủ nội thất và dịch vụ vận hành chuyên nghiệp tiêu chuẩn 5 sao tại Capital Place.' ) ); ?>
            </p>
            <div class="flex flex-wrap gap-4">
                <a class="bg-success-green hover:bg-success-green/90 text-white px-8 py-4 rounded-lg font-label-sm text-sm shadow-lg transition-all font-bold" href="#booking-form">ĐẶT LỊCH THAM QUAN</a>
                <a class="border border-white/30 hover:bg-white/10 text-white px-8 py-4 rounded-lg font-label-sm text-sm backdrop-blur-sm transition-all font-bold text-center" href="#booking-form">NHẬN BÁO GIÁ NGAY</a>
            </div>
        </div>
    </div>
</section>

<!-- Introduction -->
<section class="py-section-padding-desktop bg-white">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-8 font-bold"><?php echo esc_html( lh_field( 'so_intro_title', 'Không gian riêng tư / Nâng tầm doanh nghiệp' ) ); ?></h2>
                <div class="space-y-6 text-on-surface-variant font-body-md text-body-md leading-relaxed">
                    <?php if ( lh_field( 'so_intro_content' ) ) : ?>
                        <?php echo wp_kses_post( lh_field( 'so_intro_content' ) ); ?>
                    <?php else : ?>
                        <p>Tại The Leaders Hub, chúng tôi kiến tạo một hệ sinh thái làm việc chuyên nghiệp và đẳng cấp, nơi các nhà lãnh đạo và doanh nghiệp có thể tập trung hoàn toàn vào giá trị cốt lõi.</p>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-prestige-gold mt-1">check_circle</span>
                                <span>Văn phòng riêng đầy đủ nội thất và dịch vụ vận hành (Serviced Office).</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-prestige-gold mt-1">check_circle</span>
                                <span>Thời gian thuê linh hoạt từ ngắn hạn đến dài hạn tùy nhu cầu.</span>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="relative grid grid-cols-2 gap-4">
                <div class="pt-12">
                    <img class="w-full h-[400px] object-cover rounded-xl shadow-xl" src="<?php echo esc_url( lh_field( 'so_intro_image_1', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBe4Fcc5_yJMz0qbFJf7UJa9STWVjghx53tHceGjryBKP7_ha1hwuaCymDNsXCqlcdXX58986mHmZfz8zGoyb3yjixB0RXbrbP5AL6fzlI0LxZPRXto7dglTbu9xaS4zNpEdpcaSkCxac-LqY25dV6aHPBCx7l6ynSfiPCHP9kOQ5TkLD3k_ANjNQhokxqn9lZY_3bMMwE7KCGGVmBt6xHz53ylZx2irb1kpJptF2eKP36ytj0GjCCgJzIoadfCE5gtCTXHk8MdNwIg' ) ); ?>" />
                </div>
                <div>
                    <img class="w-full h-[400px] object-cover rounded-xl shadow-xl" src="<?php echo esc_url( lh_field( 'so_intro_image_2', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAqrzM479luW7iWxlHGuRUfXV4Q1stJI1RoV5CfhFQ9GHJ0XD3shD7CQ3swtckwWPbKVXEwuyrae9uIHD7WQUNu5IdO5GwJiS4KYi2zDd5QCsJaVVN5YZ53unWXPGNzZ3HWXpfiw4j4pomiHDwDK1DOCMbTWrqFfg8j28tDED-QHGc7jilOjIJ3Y1dyxWYFr8OQs9zJvF52kMEaagZdrUGsKipmzZDEDMLinTAuj657W6tIu9WXKavBhRBovYMj8Xt7q-XCpgU1bLFk' ) ); ?>" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Utilities Grid -->
<section class="py-section-padding-desktop bg-surface">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest font-semibold">Tiện ích đặc quyền</span>
            <h2 class="font-headline-xl text-headline-xl text-deep-navy mt-4 font-bold">Hơn cả một văn phòng</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Pantry & Cafe -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:-translate-y-2 transition-all duration-300 group border border-transparent hover:border-prestige-gold/20">
                <div class="w-12 h-12 bg-deep-navy/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-prestige-gold group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">local_cafe</span>
                </div>
                <h3 class="font-headline-md text-lg text-deep-navy mb-3 font-bold">Pantry &amp; Cafe</h3>
                <p class="text-on-surface-variant font-body-md text-sm">Trà, cafe và nước uống cao cấp miễn phí phục vụ suốt ngày dài.</p>
            </div>
            <!-- Reception -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:-translate-y-2 transition-all duration-300 group border border-transparent hover:border-prestige-gold/20">
                <div class="w-12 h-12 bg-deep-navy/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-prestige-gold group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">support_agent</span>
                </div>
                <h3 class="font-headline-md text-lg text-deep-navy mb-3 font-bold">Lễ tân chuyên nghiệp</h3>
                <p class="text-on-surface-variant font-body-md text-sm">Hỗ trợ nhận bưu phẩm và tiếp đón khách hàng tận tâm.</p>
            </div>
            <!-- Printing -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:-translate-y-2 transition-all duration-300 group border border-transparent hover:border-prestige-gold/20">
                <div class="w-12 h-12 bg-deep-navy/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-prestige-gold group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">print</span>
                </div>
                <h3 class="font-headline-md text-lg text-deep-navy mb-3 font-bold">In ấn &amp; IT Support</h3>
                <p class="text-on-surface-variant font-body-md text-sm">Hệ thống máy in hiện đại và đội ngũ IT hỗ trợ 24/7.</p>
            </div>
            <!-- Meeting Room -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:-translate-y-2 transition-all duration-300 group border border-transparent hover:border-prestige-gold/20">
                <div class="w-12 h-12 bg-deep-navy/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-prestige-gold group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">meeting_room</span>
                </div>
                <h3 class="font-headline-md text-lg text-deep-navy mb-3 font-bold">Phòng họp tiêu chuẩn</h3>
                <p class="text-on-surface-variant font-body-md text-sm">Các phòng họp được trang bị đầy đủ thiết bị trình chiếu cao cấp.</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery -->
<section class="py-section-padding-desktop bg-white">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">Thư viện ảnh thực tế</h2>
                <p class="text-on-surface-variant mt-2">Tham quan không gian làm việc hiện đại tại Capital Place.</p>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-4 h-[600px]">
            <div class="col-span-12 md:col-span-8 overflow-hidden rounded-2xl group relative">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo esc_url( lh_field( 'so_gallery_image_1', 'https://lh3.googleusercontent.com/aida-public/AB6AXuB9ztHBGSbUx1G9GkhGuYM0Tm2PB1BJc9iESy4N0dyW_MfIrfQ9xKlQayh7SkuyABkcAo12w1qQG6Svnw7OeLwx_k-1CCBVOhJUR9vJLUeQLyBm1Y9_ASF-ipjj0NC5cKpgyHBvzcVZPB_WcmKKlSb_IPHFt6qJEtkMHnVoZIHLg6NeMsj4egLfpXxhuPJxn7yarkpd8uPKciWbedhXTB3Ny8jMpX-r-HGvrthwvt_doB4zyC9qd4g6AiZoGxOZzg3Gw1BoTYRCz-1E' ) ); ?>" />
                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
                    <span class="text-white font-bold">Khu vực Lounge sang trọng</span>
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 flex flex-col gap-4">
                <div class="h-1/2 overflow-hidden rounded-2xl group relative">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo esc_url( lh_field( 'so_gallery_image_2', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCRAKHtVMpE1Q1Fiba2woIZDpk2pL-_AAHTnynqsQHDzGCfwrsoGjEW6FuQxYuNucq6onv1tOfetpDVKLTHXOAjtICR4JoOWK8VNTMZj04uRxeSu8t57quLGwsgXlMx_MV82A9GCMs9DoU2KeTxLGPDIwqDYwzz7b9Y7GI8vicna9oxF8uGUl0wuBSguIZVyeubJih97KX4aSbeCrIyqvC7uTzFeTsHrW3m-pb7KIurdmmM46BJzRViCXZlN2NKLGNJU-vryThhPEw3' ) ); ?>" />
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                        <span class="text-white font-bold">Phòng họp Boardroom</span>
                    </div>
                </div>
                <div class="h-1/2 overflow-hidden rounded-2xl group relative">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo esc_url( lh_field( 'so_gallery_image_3', 'https://lh3.googleusercontent.com/aida-public/AB6AXuC-BBZSX54I9lPFEapCECcAOXd5uW9Cmv1lSBZfxhB0KEr13L2qn4LTtiNjZiGe_UAAscskqvEo_Eh1JDY6HD6-rO_Ctg7QG-MIq_nYEOWQhh7r1c1T07bTd8J-wy9axOWmzUKVbMCZqP3JKVr6Rexyn0Vv476mg3fXA22aZXyoxlVdN2f_iOFoh4I2tc3_N-Ngi5eC7Zz_QhGh1Ukl6zDrBvdPPEFVc4K5WE-M7BT_uTmhm-kc6YYmVRXDAdKWo7nKdnsldf--TJm5' ) ); ?>" />
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                        <span class="text-white font-bold">Khu vực Pantry hiện đại</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing & CTA -->
<section class="py-section-padding-desktop bg-deep-navy text-white relative overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="font-headline-xl text-headline-xl mb-6 font-bold">Sẵn sàng nâng tầm <br/>vị thế doanh nghiệp?</h2>
                <p class="text-surface-variant font-body-lg text-body-lg mb-12 opacity-80">Liên hệ ngay với The Leaders Hub để nhận được báo giá chi tiết và các chương trình ưu đãi đặc biệt cho gói Văn phòng dịch vụ (Serviced Office).</p>
                <div class="grid grid-cols-2 gap-8">
                    <div class="border-l-2 border-prestige-gold pl-6">
                        <p class="text-prestige-gold font-label-sm text-xs uppercase mb-2 font-bold">Giá dịch vụ</p>
                        <p class="text-xl font-bold">Liên hệ nhận báo giá</p>
                        <p class="text-sm text-surface-variant">Theo diện tích và thời hạn</p>
                    </div>
                    <div class="border-l-2 border-prestige-gold pl-6">
                        <p class="text-prestige-gold font-label-sm text-xs uppercase mb-2 font-bold">Sức chứa</p>
                        <p class="text-xl font-bold">1 - 20 nhân sự</p>
                        <p class="text-sm text-surface-variant">Tùy biến linh hoạt</p>
                    </div>
                </div>
            </div>
            <div class="airtable-embed-container bg-white p-2 text-on-surface shadow-2xl" id="booking-form">
                <iframe class="w-full" src="<?php echo esc_url( lh_opt( 'lh_form_office', 'https://airtable.com/embed/app0nmwylnsZLQTuu/pag0tggimRE7gA3xw/form' ) ); ?>" frameborder="0" onmousewheel="" width="100%"></iframe>
            </div>
        </div>
    </div>
</section>

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
