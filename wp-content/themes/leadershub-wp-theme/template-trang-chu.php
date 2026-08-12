<?php
/**
 * Template Name: Trang Chủ (Homepage)
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

<!-- Hero Banner Section -->
<header class="relative min-h-[85vh] flex items-center pt-24 pb-12 overflow-hidden text-white bg-deep-navy">
    <video autoplay muted loop playsinline
        poster="<?php echo esc_url( lh_field( 'home_hero_poster', 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1920&q=80' ) ); ?>"
        class="absolute inset-0 w-full h-full object-cover z-0 opacity-40">
        <source src="<?php echo esc_url( lh_field( 'home_hero_video', 'https://assets.mixkit.co/videos/preview/mixkit-modern-office-space-with-people-working-34322-large.mp4' ) ); ?>" type="video/mp4">
    </video>
    <div class="absolute inset-0 bg-gradient-to-r from-deep-navy via-deep-navy/85 to-transparent z-10"></div>

    <div class="relative z-20 max-w-container-max mx-auto px-gutter w-full grid grid-cols-1 gap-12 items-center">
        <div class="space-y-6 max-w-2xl">
            <span class="inline-block px-4 py-1 rounded-full bg-prestige-gold/20 text-prestige-gold font-label-sm text-xs tracking-widest uppercase font-bold border border-prestige-gold/30">
                Premium Business Solution
            </span>
            <h1 class="font-display-lg text-4xl md:text-6xl font-bold leading-tight">
                <?php echo wp_kses_post( lh_field( 'home_hero_title', 'VĂN PHÒNG DỊCH VỤ <br /><span class="text-prestige-gold">THE LEADERS HUB - NƠI THÀNH CÔNG HỘI TỤ</span>' ) ); ?>
            </h1>
            <p class="font-body-lg text-base md:text-lg text-white/85 max-w-xl leading-relaxed">
                <?php echo esc_html( lh_field( 'home_hero_desc', 'Giải pháp văn phòng trọn gói - Tiện lợi - Linh hoạt - Chuyên nghiệp cho các lãnh đạo và doanh nghiệp hàng đầu.' ) ); ?>
            </p>
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="#register" class="bg-success-green hover:bg-success-green/90 text-white px-8 py-4 rounded-lg font-label-sm text-sm hover:scale-105 transition-transform duration-200 shadow-md uppercase tracking-wider font-semibold">Đăng ký tư vấn</a>
                <a href="#services" class="border border-white/50 text-white px-8 py-4 rounded-lg font-label-sm text-sm hover:bg-white/10 transition-all font-semibold">Khám phá dịch vụ</a>
            </div>
        </div>
    </div>
</header>

<!-- Services Section (Danh mục dịch vụ) -->
<section class="py-section-padding-desktop bg-white scroll-mt-20" id="services">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-2 font-bold text-center">GIẢI PHÁP CỦA CHÚNG TÔI</span>
            <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold text-center">Văn phòng chuẩn quốc tế</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php if ( function_exists( 'have_rows' ) && have_rows( 'home_services_list' ) ) : ?>
                <?php while ( have_rows( 'home_services_list' ) ) : the_row();
                    $s_title = get_sub_field( 'title' );
                    $s_desc  = get_sub_field( 'desc' );
                    $s_link  = get_sub_field( 'link' );
                    $s_img   = get_sub_field( 'image' );
                ?>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-surface-container-high hover:shadow-2xl transition-all duration-300 flex flex-col group">
                        <div class="h-48 overflow-hidden relative">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="<?php echo esc_attr( $s_title ); ?>" src="<?php echo esc_url( $s_img ?: 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=600&q=80' ); ?>" />
                        </div>
                        <div class="p-8 flex-grow flex flex-col justify-between">
                            <div class="space-y-4">
                                <span class="material-symbols-outlined text-prestige-gold text-3xl">domain</span>
                                <h3 class="font-headline-md text-xl text-deep-navy font-bold"><?php echo esc_html( $s_title ); ?></h3>
                                <p class="text-on-surface-variant text-sm leading-relaxed"><?php echo esc_html( $s_desc ); ?></p>
                            </div>
                            <a href="<?php echo esc_url( $s_link ?: '#register' ); ?>" class="inline-flex items-center text-success-green font-semibold text-sm hover:translate-x-1 transition-transform mt-6">
                                Tìm hiểu thêm <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <!-- Card 1: Văn phòng ảo -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-surface-container-high hover:shadow-2xl transition-all duration-300 flex flex-col group">
                    <div class="h-48 overflow-hidden relative">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Văn phòng ảo" src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=600&q=80" />
                    </div>
                    <div class="p-8 flex-grow flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="material-symbols-outlined text-prestige-gold text-3xl">domain</span>
                            <h3 class="font-headline-md text-xl text-deep-navy font-bold">Văn phòng ảo</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed">Địa chỉ kinh doanh tại trung tâm hạng A với chi phí tối ưu.</p>
                        </div>
                        <a href="<?php echo esc_url( home_url('/van-phong-ao') ); ?>" class="inline-flex items-center text-success-green font-semibold text-sm hover:translate-x-1 transition-transform mt-6">
                            Tìm hiểu thêm <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Văn phòng cao cấp -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-surface-container-high hover:shadow-2xl transition-all duration-300 flex flex-col group">
                    <div class="h-48 overflow-hidden relative">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Văn phòng cao cấp" src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=600&q=80" />
                    </div>
                    <div class="p-8 flex-grow flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="material-symbols-outlined text-prestige-gold text-3xl">verified</span>
                            <h3 class="font-headline-md text-xl text-deep-navy font-bold">Văn phòng cao cấp</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed">Không gian làm việc trọn gói, riêng tư và đầy đủ nội thất.</p>
                        </div>
                        <a href="<?php echo esc_url( home_url('/van-phong-cao-cap') ); ?>" class="inline-flex items-center text-success-green font-semibold text-sm hover:translate-x-1 transition-transform mt-6">
                            Tìm hiểu thêm <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Phòng họp -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-surface-container-high hover:shadow-2xl transition-all duration-300 flex flex-col group">
                    <div class="h-48 overflow-hidden relative">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Phòng họp" src="https://images.unsplash.com/photo-1431540015161-0bf868a2d407?auto=format&fit=crop&w=600&q=80" />
                    </div>
                    <div class="p-8 flex-grow flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="material-symbols-outlined text-prestige-gold text-3xl">groups</span>
                            <h3 class="font-headline-md text-xl text-deep-navy font-bold">Phòng họp</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed">Trang thiết bị hiện đại cho các buổi họp chiến lược quan trọng.</p>
                        </div>
                        <a href="<?php echo esc_url( home_url('/phong-hop') ); ?>" class="inline-flex items-center text-success-green font-semibold text-sm hover:translate-x-1 transition-transform mt-6">
                            Tìm hiểu thêm <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                </div>

                <!-- Card 4: Flexible Workspace -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-surface-container-high hover:shadow-2xl transition-all duration-300 flex flex-col group">
                    <div class="h-48 overflow-hidden relative">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Flexible Workspace" src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=600&q=80" />
                    </div>
                    <div class="p-8 flex-grow flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="material-symbols-outlined text-prestige-gold text-3xl">workspace_premium</span>
                            <h3 class="font-headline-md text-xl text-deep-navy font-bold">Flexible Workspace</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed">Không gian làm việc linh hoạt, chỗ ngồi cố định và bán riêng tư.</p>
                        </div>
                        <a href="#register" class="inline-flex items-center text-success-green font-semibold text-sm hover:translate-x-1 transition-transform mt-6">
                            Tìm hiểu thêm <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Pricing Cards Section -->
<section class="py-section-padding-desktop bg-surface" id="pricing">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-4 font-bold">Các Gói Dịch Vụ Văn Phòng Ảo</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-4xl mx-auto">Chỉ từ 980,000đ/tháng để sở hữu địa chỉ kinh doanh đẳng cấp tại tòa tháp Capital Place.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php if ( function_exists( 'have_rows' ) && have_rows( 'home_pricing_plans' ) ) : ?>
                <?php $i = 0; while ( have_rows( 'home_pricing_plans' ) ) : the_row(); $i++;
                    $name = get_sub_field( 'name' );
                    $price = get_sub_field( 'price' );
                    $desc = get_sub_field( 'desc' );
                    $features = get_sub_field( 'features' );
                    $features_list = explode( "\n", str_replace( "\r", "", $features ) );
                ?>
                    <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all border <?php echo ($i === 2) ? 'border-2 border-prestige-gold relative scale-105 z-10' : 'border-surface-container-highest'; ?> flex flex-col group">
                        <?php if ($i === 2) : ?>
                            <div class="absolute top-0 right-8 -translate-y-1/2 bg-prestige-gold text-white px-4 py-1 rounded-full font-label-sm text-[12px] uppercase tracking-wider">Phổ biến nhất</div>
                        <?php endif; ?>
                        <div class="mb-8">
                            <h3 class="font-headline-md text-headline-md text-deep-navy font-bold"><?php echo esc_html( $name ); ?></h3>
                            <p class="text-on-surface-variant text-sm mt-2"><?php echo esc_html( $desc ); ?></p>
                        </div>
                        <div class="mb-8">
                            <span class="text-on-surface-variant text-sm">Chỉ từ</span>
                            <div class="flex items-baseline">
                                <span class="text-3xl font-bold text-deep-navy"><?php echo esc_html( $price ); ?></span>
                                <span class="text-on-surface-variant ml-1 font-label-sm">đ/tháng</span>
                            </div>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            <?php foreach ( $features_list as $feature ) : if ( trim( $feature ) === '' ) continue; ?>
                                <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                                    <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                                    <?php echo esc_html( $feature ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="#register" class="w-full text-center py-3 border border-deep-navy rounded-lg font-label-sm text-sm font-semibold group-hover:bg-deep-navy group-hover:text-white transition-all">Chọn Gói Này</a>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <!-- Economy -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all border border-surface-container-highest flex flex-col group">
                    <div class="mb-8">
                        <h3 class="font-headline-md text-headline-md text-deep-navy font-semibold">Gói Economy</h3>
                        <p class="text-on-surface-variant text-sm mt-2">Dành cho cá nhân khởi nghiệp</p>
                    </div>
                    <div class="mb-8">
                        <span class="text-on-surface-variant text-sm">Chỉ từ</span>
                        <div class="flex items-baseline">
                            <span class="text-3xl font-bold text-deep-navy">980,000</span>
                            <span class="text-on-surface-variant ml-1 font-label-sm">đ/tháng</span>
                        </div>
                    </div>
                    <ul class="space-y-4 mb-8 flex-grow">
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Địa chỉ đăng ký kinh doanh hạng A
                        </li>
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Đặt bảng tên công ty tại sảnh
                        </li>
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Tiếp nhận thư từ &amp; bưu phẩm
                        </li>
                    </ul>
                    <a href="#register" class="w-full py-3 border border-deep-navy rounded-lg font-label-sm text-sm text-center group-hover:bg-deep-navy group-hover:text-white transition-all block font-semibold">Chọn Gói Này</a>
                </div>

                <!-- Standard -->
                <div class="bg-white p-8 rounded-xl shadow-2xl transition-all border-2 border-prestige-gold flex flex-col relative scale-105 z-10">
                    <div class="absolute top-0 right-8 -translate-y-1/2 bg-prestige-gold text-white px-4 py-1 rounded-full font-label-sm text-[12px] uppercase tracking-wider">Phổ biến nhất</div>
                    <div class="mb-8">
                        <h3 class="font-headline-md text-headline-md text-deep-navy font-bold">Gói Standard</h3>
                        <p class="text-on-surface-variant text-sm mt-2">Nâng tầm hiện diện thương hiệu</p>
                    </div>
                    <div class="mb-8">
                        <span class="text-on-surface-variant text-sm">Chỉ từ</span>
                        <div class="flex items-baseline">
                            <span class="text-3xl font-bold text-deep-navy">1,500,000</span>
                            <span class="text-on-surface-variant ml-1 font-label-sm">đ/tháng</span>
                        </div>
                    </div>
                    <ul class="space-y-4 mb-8 flex-grow">
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Mọi quyền lợi gói Economy
                        </li>
                        <li class="flex items-center gap-3 text-sm text-on-surface font-semibold">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Số điện thoại &amp; Fax riêng
                        </li>
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Lễ tân tiếp khách chuyên nghiệp
                        </li>
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            4h sử dụng phòng họp/tháng
                        </li>
                    </ul>
                    <a href="#register" class="w-full py-3 bg-deep-navy text-white text-center rounded-lg font-label-sm text-sm font-semibold hover:bg-prestige-gold transition-all block">Chọn Gói Này</a>
                </div>

                <!-- Premium -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all border border-surface-container-highest flex flex-col group">
                    <div class="mb-8">
                        <h3 class="font-headline-md text-headline-md text-deep-navy font-semibold">Gói Premium</h3>
                        <p class="text-on-surface-variant text-sm mt-2">Giải pháp trọn gói đẳng cấp</p>
                    </div>
                    <div class="mb-8">
                        <span class="text-on-surface-variant text-sm">Chỉ từ</span>
                        <div class="flex items-baseline">
                            <span class="text-3xl font-bold text-deep-navy">2,500,000</span>
                            <span class="text-on-surface-variant ml-1 font-label-sm">đ/tháng</span>
                        </div>
                    </div>
                    <ul class="space-y-4 mb-8 flex-grow">
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Mọi quyền lợi gói Standard
                        </li>
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Chỗ ngồi làm việc linh hoạt
                        </li>
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Hỗ trợ tiếp nhận bưu phẩm thư từ
                        </li>
                        <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                            Phục vụ cafe &amp; trà miễn phí
                        </li>
                    </ul>
                    <a href="#register" class="w-full py-3 border border-deep-navy rounded-lg font-label-sm text-sm text-center group-hover:bg-deep-navy group-hover:text-white transition-all block font-semibold">Chọn Gói Này</a>
                </div>
            <?php endif; ?>
        </div>
        <p class="text-center text-sm text-on-surface-variant/70 mt-8">* Giá chưa bao gồm VAT (nếu áp dụng)</p>
    </div>
</section>

<!-- Comparison Table Section -->
<section class="py-section-padding-desktop bg-surface-container-low">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="mb-12">
            <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">So Sánh Tiện Ích Các Gói</h2>
            <div class="w-20 h-1 bg-prestige-gold mt-4"></div>
        </div>
        <div class="overflow-x-auto rounded-xl shadow-lg bg-white">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-deep-navy text-white">
                        <th class="p-6 font-label-sm text-sm font-semibold">Dịch vụ &amp; Tiện ích</th>
                        <th class="p-6 font-label-sm text-sm text-center font-semibold">Economy</th>
                        <th class="p-6 font-label-sm text-sm text-center font-semibold">Standard</th>
                        <th class="p-6 font-label-sm text-sm text-center font-semibold">Premium</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-highest">
                    <tr>
                        <td class="p-6 font-body-md text-sm">Địa chỉ đăng ký GPKD Hạng A</td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                    </tr>
                    <tr>
                        <td class="p-6 font-body-md text-sm">Lễ tân chuyên nghiệp &amp; Tiếp khách</td>
                        <td class="p-6 text-center text-on-surface-variant/30"><span class="material-symbols-outlined">close</span></td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                    </tr>
                    <tr>
                        <td class="p-6 font-body-md text-sm">Sử dụng phòng họp hiện đại</td>
                        <td class="p-6 text-center text-on-surface-variant/50 text-sm">Tính phí lẻ</td>
                        <td class="p-6 text-center font-semibold text-sm">4 giờ/tháng</td>
                        <td class="p-6 text-center font-semibold text-sm">10 giờ/tháng</td>
                    </tr>
                    <tr>
                        <td class="p-6 font-body-md text-sm">Hỗ trợ pháp lý &amp; Đăng ký doanh nghiệp</td>
                        <td class="p-6 text-center text-on-surface-variant/50 text-sm">Tư vấn miễn phí</td>
                        <td class="p-6 text-center text-on-surface-variant/50 text-sm">Tư vấn miễn phí</td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                    </tr>
                    <tr>
                        <td class="p-6 font-body-md text-sm">Cafe, trà &amp; nước uống tại pantry</td>
                        <td class="p-6 text-center text-on-surface-variant/30"><span class="material-symbols-outlined">close</span></td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

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

<!-- Environment Showcase -->
<section class="py-section-padding-desktop bg-surface-container-low">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-2 font-bold">Thư viện hình ảnh</span>
            <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">Không Gian Thực Tế Tại The Leaders Hub</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if ( function_exists( 'have_rows' ) && have_rows( 'home_gallery_images' ) ) : ?>
                <?php while ( have_rows( 'home_gallery_images' ) ) : the_row(); 
                    $img = get_sub_field( 'image' );
                    $title = get_sub_field( 'title' );
                    $desc = get_sub_field( 'desc' );
                ?>
                    <div class="group relative rounded-xl overflow-hidden shadow-md bg-white aspect-[4/3] cursor-pointer">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
                        <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/90 via-deep-navy/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <div>
                                <h4 class="text-white font-semibold text-lg"><?php echo esc_html( $title ); ?></h4>
                                <p class="text-prestige-gold text-xs mt-1"><?php echo esc_html( $desc ); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <!-- Image 1 -->
                <div class="group relative rounded-xl overflow-hidden shadow-md bg-white aspect-[4/3] cursor-pointer">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80" />
                    <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/90 via-deep-navy/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <h4 class="text-white font-semibold text-lg">Khu Vực Lễ Tân</h4>
                            <p class="text-prestige-gold text-xs mt-1">Đội ngũ lễ tân chuyên nghiệp hỗ trợ chu đáo</p>
                        </div>
                    </div>
                </div>
                <!-- Image 2 -->
                <div class="group relative rounded-xl overflow-hidden shadow-md bg-white aspect-[4/3] cursor-pointer">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80" />
                    <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/90 via-deep-navy/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <h4 class="text-white font-semibold text-lg">Business Lounge</h4>
                            <p class="text-prestige-gold text-xs mt-1">Nơi tiếp khách hàng và đối tác đẳng cấp</p>
                        </div>
                    </div>
                </div>
                <!-- Image 3 -->
                <div class="group relative rounded-xl overflow-hidden shadow-md bg-white aspect-[4/3] cursor-pointer">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://images.unsplash.com/photo-1568992687947-868a62a9f521?auto=format&fit=crop&w=800&q=80" />
                    <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/90 via-deep-navy/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <h4 class="text-white font-semibold text-lg">Khu Vực Pantry</h4>
                            <p class="text-prestige-gold text-xs mt-1">Phục vụ trà, cafe hảo hạng miễn phí</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Professional Environment Showcase -->
<section class="py-section-padding-desktop bg-deep-navy text-white overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div class="relative">
            <img alt="Lễ tân chuyên nghiệp The Leaders Hub" class="w-full h-auto rounded-2xl shadow-2xl" src="https://images.unsplash.com/photo-1556740758-90de374c12ad?auto=format&fit=crop&w=800&q=80" />
            <div class="absolute -bottom-8 -right-8 glass-card p-6 rounded-xl hidden md:block max-w-[240px]">
                <div class="flex items-center gap-4 mb-2">
                    <span class="material-symbols-outlined text-prestige-gold" style="font-variation-settings: 'FILL' 1;">stars</span>
                    <span class="font-label-sm text-deep-navy font-bold text-xs">Tiêu chuẩn 5 sao</span>
                </div>
                <p class="text-xs text-on-surface-variant">Môi trường làm việc chuyên nghiệp được thiết kế theo tiêu chuẩn quốc tế.</p>
            </div>
        </div>
        <div class="space-y-8">
            <h2 class="font-headline-xl text-headline-xl font-bold text-white">Không gian làm việc <br /><span class="text-prestige-gold font-bold">Đẳng cấp & Hiện đại</span></h2>
            <div class="space-y-6">
                <div class="flex gap-4">
                    <div class="w-12 h-12 shrink-0 bg-white/10 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-prestige-gold">location_on</span>
                    </div>
                    <div>
                        <h5 class="font-headline-md text-lg mb-1 font-semibold text-white">Vị trí đắc địa trung tâm</h5>
                        <p class="text-white/70 text-sm">Tòa nhà Capital Place, Liễu Giai - Trung tâm tài chính hành chính ngoại giao cao cấp.</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 shrink-0 bg-white/10 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-prestige-gold">person_celebrate</span>
                    </div>
                    <div>
                        <h5 class="font-headline-md text-lg mb-1 font-semibold text-white">Lễ tân tiếp khách chuẩn 5 sao</h5>
                        <p class="text-white/70 text-sm">Chào đón đối tác và khách hàng của bạn với quy trình lễ tân bài bản nhất.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Reviews Section -->
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
            <?php if ( function_exists( 'have_rows' ) && have_rows( 'home_reviews_list' ) ) : ?>
                <?php while ( have_rows( 'home_reviews_list' ) ) : the_row(); 
                    $name = get_sub_field( 'name' );
                    $role = get_sub_field( 'role' );
                    $comment = get_sub_field( 'comment' );
                    $avatar = get_sub_field( 'avatar' );
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
                            <div class="w-10 h-10 rounded-full bg-deep-navy text-white flex items-center justify-center font-bold text-sm shrink-0"><?php echo esc_html( $avatar ); ?></div>
                            <div>
                                <h4 class="font-semibold text-sm text-deep-navy"><?php echo esc_html( $name ); ?></h4>
                                <p class="text-xs text-on-surface-variant"><?php echo esc_html( $role ); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <!-- Review 1 -->
                <div class="bg-white p-8 rounded-xl border border-surface-container-highest shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex text-amber-400 mb-4">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-on-surface text-sm italic leading-relaxed mb-6">"Dịch vụ văn phòng ảo tại đây giúp công ty tôi tối ưu hóa chi phí cực tốt mà vẫn đảm bảo được hình ảnh doanh nghiệp chuyên nghiệp tại Capital Place."</p>
                    </div>
                    <div class="flex items-center gap-4 border-t border-surface-container-low pt-4">
                        <div class="w-10 h-10 rounded-full bg-deep-navy text-white flex items-center justify-center font-bold text-sm shrink-0">HA</div>
                        <div>
                            <h4 class="font-semibold text-sm text-deep-navy">Nguyễn Hoàng Anh</h4>
                            <p class="text-xs text-on-surface-variant">CEO, FinTech Solutions</p>
                        </div>
                    </div>
                </div>
                <!-- Review 2 -->
                <div class="bg-white p-8 rounded-xl border border-surface-container-highest shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex text-amber-400 mb-4">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-on-surface text-sm italic leading-relaxed mb-6">"Không gian văn phòng dịch vụ trọn gói tại The Leaders Hub cực kỳ hiện đại và yên tĩnh. View thành phố rất đẹp."</p>
                    </div>
                    <div class="flex items-center gap-4 border-t border-surface-container-low pt-4">
                        <div class="w-10 h-10 rounded-full bg-prestige-gold text-white flex items-center justify-center font-bold text-sm shrink-0">MT</div>
                        <div>
                            <h4 class="font-semibold text-sm text-deep-navy">Trần Minh Tâm</h4>
                            <p class="text-xs text-on-surface-variant">Giám đốc Điều hành, Creative Agency</p>
                        </div>
                    </div>
                </div>
                <!-- Review 3 -->
                <div class="bg-white p-8 rounded-xl border border-surface-container-highest shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex text-amber-400 mb-4">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-on-surface text-sm italic leading-relaxed mb-6">"Chúng tôi thường xuyên sử dụng phòng họp lớn ở đây để làm việc với đối tác nước ngoài. Thiết bị video conference rất mượt mà ổn định."</p>
                    </div>
                    <div class="flex items-center gap-4 border-t border-surface-container-low pt-4">
                        <div class="w-10 h-10 rounded-full bg-success-green text-white flex items-center justify-center font-bold text-sm shrink-0">LP</div>
                        <div>
                            <h4 class="font-semibold text-sm text-deep-navy">Lò Phương</h4>
                            <p class="text-xs text-on-surface-variant">Founder, E-commerce Startup</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="py-section-padding-desktop bg-white scroll-mt-20" id="news">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">Tin tức mới nhất</h2>
                <div class="w-20 h-1 bg-prestige-gold mt-4"></div>
            </div>
            <a href="<?php echo esc_url( home_url('/tin-tuc') ); ?>" class="text-sm font-semibold text-deep-navy hover:text-prestige-gold transition-colors flex items-center gap-1 border-b border-deep-navy/20 pb-1">
                Xem tất cả <span class="material-symbols-outlined text-xs">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl overflow-hidden border border-surface-container-high hover:shadow-xl transition-all duration-300 flex flex-col group">
                <div class="h-52 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="Tương lai của mô hình văn phòng Hybrid 2024" src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=600&q=80" />
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold text-prestige-gold uppercase tracking-wider block mb-2">Sự kiện</span>
                        <h3 class="font-headline-md text-lg text-deep-navy font-bold mb-3 line-clamp-2 group-hover:text-prestige-gold transition-colors">Tương lai của mô hình văn phòng Hybrid 2024</h3>
                        <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3">Xu hình làm việc linh hoạt đang thay đổi cách các doanh nghiệp vận hành và lựa chọn không gian làm việc tối ưu.</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-2xl overflow-hidden border border-surface-container-high hover:shadow-xl transition-all duration-300 flex flex-col group">
                <div class="h-52 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="5 điều cần lưu ý khi thuê văn phòng ảo" src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=600&q=80" />
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold text-prestige-gold uppercase tracking-wider block mb-2">Cẩm nang</span>
                        <h3 class="font-headline-md text-lg text-deep-navy font-bold mb-3 line-clamp-2 group-hover:text-prestige-gold transition-colors">5 điều cần lưu ý khi thuê văn phòng ảo</h3>
                        <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3">Lựa chọn đúng địa chỉ kinh doanh giúp doanh nghiệp của bạn tạo dựng uy tín và tối ưu hóa chi phí vận hành ban đầu.</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white rounded-2xl overflow-hidden border border-surface-container-high hover:shadow-xl transition-all duration-300 flex flex-col group">
                <div class="h-52 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="Thủ tục thành lập doanh nghiệp năm 2024" src="https://images.unsplash.com/photo-1431540015161-0bf868a2d407?auto=format&fit=crop&w=600&q=80" />
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold text-prestige-gold uppercase tracking-wider block mb-2">Pháp lý</span>
                        <h3 class="font-headline-md text-lg text-deep-navy font-bold mb-3 line-clamp-2 group-hover:text-prestige-gold transition-colors">Thủ tục thành lập doanh nghiệp năm 2024</h3>
                        <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3">Cập nhật những quy định mới nhất về đăng ký kinh doanh và các loại giấy phép cần thiết cho startup và doanh nghiệp mới.</p>
                    </div>
                </div>
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
