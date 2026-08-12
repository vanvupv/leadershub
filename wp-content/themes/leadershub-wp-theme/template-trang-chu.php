<?php
/**
 * Template Name: Trang Chủ (Homepage)
 *
 * @package The_Leaders_Hub
 */

get_header();

// ==========================================
// 1. KHAI BÁO BIẾN & SAFE FALLBACKS RỖNG ĐẦU TEMPLATE (.agent Rules)
// ==========================================
$hero_title  = ( function_exists( 'get_field' ) ? get_field( 'home_hero_title' ) : '' ) ?: '';
$hero_desc   = ( function_exists( 'get_field' ) ? get_field( 'home_hero_desc' ) : '' ) ?: '';
$hero_video  = ( function_exists( 'get_field' ) ? get_field( 'home_hero_video' ) : '' ) ?: '';
$hero_poster = ( function_exists( 'get_field' ) ? get_field( 'home_hero_poster' ) : '' ) ?: '';
?>

<!-- Section 1: Hero Banner -->
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
            <span class="inline-block px-4 py-1 rounded-full bg-prestige-gold/20 text-prestige-gold font-label-sm text-xs tracking-widest uppercase font-bold border border-prestige-gold/30">
                Premium Business Solution
            </span>
            
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

            <div class="flex flex-wrap gap-4 pt-4">
                <a href="#register" class="bg-success-green hover:bg-success-green/90 text-white px-8 py-4 rounded-lg font-label-sm text-sm hover:scale-105 transition-transform duration-200 shadow-md uppercase tracking-wider font-semibold">Đăng ký tư vấn</a>
                <a href="#services" class="border border-white/50 text-white px-8 py-4 rounded-lg font-label-sm text-sm hover:bg-white/10 transition-all font-semibold">Khám phá dịch vụ</a>
            </div>
        </div>
    </div>
</header>
<?php endif; ?>

<!-- Section 2: Services Section (Danh mục dịch vụ) -->
<?php if ( function_exists( 'have_rows' ) && have_rows( 'home_services_list' ) ) : ?>
<section class="py-section-padding-desktop bg-white scroll-mt-20" id="services">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-2 font-bold text-center">GIẢI PHÁP CỦA CHÚNG TÔI</span>
            <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold text-center">Văn phòng chuẩn quốc tế</h2>
        </div>

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
    </div>
</section>
<?php endif; ?>

<!-- Section 3: Pricing Cards Section -->
<?php if ( function_exists( 'have_rows' ) && have_rows( 'home_pricing_plans' ) ) : ?>
<section class="py-section-padding-desktop bg-surface" id="pricing">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-4 font-bold">Các Gói Dịch Vụ Văn Phòng Ảo</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-4xl mx-auto">Chỉ từ 980,000đ/tháng để sở hữu địa chỉ kinh doanh đẳng cấp tại tòa tháp Capital Place.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $i = 0; while ( have_rows( 'home_pricing_plans' ) ) : the_row(); $i++;
                $name = get_sub_field( 'name' );
                $price = get_sub_field( 'price' );
                $desc = get_sub_field( 'desc' );
                $features = get_sub_field( 'features' );
                $features_list = ! empty( $features ) ? explode( "\n", str_replace( "\r", "", $features ) ) : array();

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
        <p class="text-center text-sm text-on-surface-variant/70 mt-8">* Giá chưa bao gồm VAT (nếu áp dụng)</p>
    </div>
</section>
<?php endif; ?>

<!-- Section 4: Environment Showcase (Gallery) -->
<?php if ( function_exists( 'have_rows' ) && have_rows( 'home_gallery_images' ) ) : ?>
<section class="py-section-padding-desktop bg-surface-container-low">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-2 font-bold">Thư viện hình ảnh</span>
            <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">Không Gian Thực Tế Tại The Leaders Hub</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php while ( have_rows( 'home_gallery_images' ) ) : the_row(); 
                $img = get_sub_field( 'image' );
                $title = get_sub_field( 'title' );
                $desc = get_sub_field( 'desc' );

                if ( empty( $img ) ) continue;
            ?>
                <div class="group relative rounded-xl overflow-hidden shadow-md bg-white aspect-[4/3] cursor-pointer">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
                    <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/90 via-deep-navy/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <?php if ( ! empty( $title ) ) : ?>
                                <h4 class="text-white font-semibold text-lg"><?php echo esc_html( $title ); ?></h4>
                            <?php endif; ?>
                            <?php if ( ! empty( $desc ) ) : ?>
                                <p class="text-prestige-gold text-xs mt-1"><?php echo esc_html( $desc ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Section 5: Customer Reviews (Google Reviews) -->
<?php if ( function_exists( 'have_rows' ) && have_rows( 'home_reviews_list' ) ) : ?>
<section class="py-section-padding-desktop bg-surface scroll-mt-20" id="reviews">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-12">
            <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-2 font-bold">Đánh giá thực tế</span>
            <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">Khách Hàng Đồng Hành Cùng The Leaders Hub</h2>
            <div class="w-16 h-1 bg-prestige-gold mx-auto mt-4"></div>
        </div>

        <div class="flex items-center justify-center gap-3 mb-12 mt-2 max-w-xs mx-auto">
            <a href="https://www.google.com/search?q=The+Leaders+Hub" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 bg-white px-4 py-2 rounded-full border border-surface-container-high shadow-sm hover:shadow-md transition-shadow">
                <img class="h-4" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google Logo">
                <span class="text-sm font-bold text-deep-navy">4.9/5 (120+ reviews)</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php while ( have_rows( 'home_reviews_list' ) ) : the_row(); 
                $name = get_sub_field( 'name' );
                $role = get_sub_field( 'role' );
                $comment = get_sub_field( 'comment' );
                $avatar = get_sub_field( 'avatar' );

                if ( empty( $comment ) ) continue;
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
                        <p class="text-on-surface text-sm italic leading-relaxed mb-6">"<?php echo esc_html( $comment ); ?>"</p>
                    </div>
                    <div class="flex items-center gap-4 border-t border-surface-container-low pt-4">
                        <?php if ( ! empty( $avatar ) ) : ?>
                            <div class="w-10 h-10 rounded-full bg-deep-navy text-white flex items-center justify-center font-bold text-sm shrink-0"><?php echo esc_html( $avatar ); ?></div>
                        <?php endif; ?>
                        <div>
                            <?php if ( ! empty( $name ) ) : ?>
                                <h4 class="font-semibold text-sm text-deep-navy"><?php echo esc_html( $name ); ?></h4>
                            <?php endif; ?>
                            <?php if ( ! empty( $role ) ) : ?>
                                <p class="text-xs text-on-surface-variant"><?php echo esc_html( $role ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Registration Process Section -->
<section class="py-section-padding-desktop bg-surface overflow-hidden relative">
    <div class="max-w-container-max mx-auto px-gutter relative z-10">
        <div class="text-center mb-16">
            <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">Quy Trình 3 Bước Đơn Giản</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
            <div class="hidden md:block absolute top-24 left-1/4 right-1/4 h-0.5 border-t-2 border-dashed border-prestige-gold/30"></div>
            <!-- Step 1 -->
            <div class="relative text-center group">
                <div class="step-number text-[120px] leading-none text-deep-navy/5 absolute -top-12 left-1/2 -translate-x-1/2 select-none group-hover:text-prestige-gold/10 transition-colors">01</div>
                <div class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto mb-6 relative z-10 border border-surface-container-highest group-hover:border-prestige-gold transition-colors">
                    <span class="material-symbols-outlined text-3xl text-prestige-gold">support_agent</span>
                </div>
                <h4 class="font-headline-md text-headline-md text-deep-navy mb-4 font-semibold">Tư vấn giải pháp</h4>
                <p class="text-on-surface-variant font-body-md text-sm">Đội ngũ chuyên viên tư vấn chi tiết giải pháp phù hợp với quy mô và đặc thù ngành nghề của bạn.</p>
            </div>
            <!-- Step 2 -->
            <div class="relative text-center group">
                <div class="step-number text-[120px] leading-none text-deep-navy/5 absolute -top-12 left-1/2 -translate-x-1/2 select-none group-hover:text-prestige-gold/10 transition-colors">02</div>
                <div class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto mb-6 relative z-10 border border-surface-container-highest group-hover:border-prestige-gold transition-colors">
                    <span class="material-symbols-outlined text-3xl text-prestige-gold">history_edu</span>
                </div>
                <h4 class="font-headline-md text-headline-md text-deep-navy mb-4 font-semibold">Ký kết hợp đồng</h4>
                <p class="text-on-surface-variant font-body-md text-sm">Hoàn tất thủ tục hồ sơ chỉ trong 30 phút. Cam kết điều khoản pháp lý minh bạch và nhất quán.</p>
            </div>
            <!-- Step 3 -->
            <div class="relative text-center group">
                <div class="step-number text-[120px] leading-none text-deep-navy/5 absolute -top-12 left-1/2 -translate-x-1/2 select-none group-hover:text-prestige-gold/10 transition-colors">03</div>
                <div class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto mb-6 relative z-10 border border-surface-container-highest group-hover:border-prestige-gold transition-colors">
                    <span class="material-symbols-outlined text-3xl text-prestige-gold">business_center</span>
                </div>
                <h4 class="font-headline-md text-headline-md text-deep-navy mb-4 font-semibold">Sẵn sàng vận hành</h4>
                <p class="text-on-surface-variant font-body-md text-sm">Nhận bàn giao địa chỉ, số điện thoại, sẵn sàng tiếp đón đối tác và triển khai đăng ký doanh nghiệp.</p>
            </div>
        </div>
    </div>
</section>

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

<!-- FAQ Section -->
<section class="py-section-padding-desktop bg-white" id="faq">
    <div class="max-w-container-max mx-auto px-gutter max-w-3xl">
        <h2 class="font-headline-xl text-headline-xl text-deep-navy text-center mb-12 font-bold">Câu hỏi thường gặp</h2>
        <div class="space-y-4">
            <details class="group bg-white rounded-lg shadow-sm border border-surface-container-highest" open="">
                <summary class="flex justify-between items-center p-6 cursor-pointer list-none">
                    <span class="font-headline-md text-lg text-deep-navy font-semibold">Sử dụng văn phòng ảo có hợp pháp không?</span>
                    <span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
                </summary>
                <div class="px-6 pb-6 text-on-surface-variant font-body-md border-t border-surface-container-highest pt-4">
                    Hoàn toàn hợp pháp. Theo Luật Doanh nghiệp Việt Nam, văn phòng ảo là mô hình kinh doanh hợp lệ được pháp luật công nhận, cho phép doanh nghiệp đăng ký trụ sở chính và thực hiện các giao dịch kinh doanh.
                </div>
            </details>
            <details class="group bg-white rounded-lg shadow-sm border border-surface-container-highest">
                <summary class="flex justify-between items-center p-6 cursor-pointer list-none">
                    <span class="font-headline-md text-lg text-deep-navy font-semibold">Tôi có thể sử dụng địa chỉ này để đăng ký hóa đơn điện tử không?</span>
                    <span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
                </summary>
                <div class="px-6 pb-6 text-on-surface-variant font-body-md border-t border-surface-container-highest pt-4">
                    Có, bạn hoàn toàn có thể sử dụng địa chỉ văn phòng ảo tại The Leaders Hub để làm thủ tục đăng ký thuế và phát hành hóa đơn điện tử cho doanh nghiệp của mình.
                </div>
            </details>
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
