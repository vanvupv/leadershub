<?php
/**
 * Template Name: Văn Phòng Ảo (Virtual Office)
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
<header class="relative min-h-[80vh] flex items-center pt-20 overflow-hidden bg-surface">
    <div class="absolute inset-0 bg-gradient-to-r from-surface via-surface/60 to-transparent z-10"></div>
    <div class="relative z-20 max-w-container-max mx-auto px-gutter w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <span class="inline-block px-4 py-1 rounded-full bg-prestige-gold/10 text-prestige-gold font-label-sm text-xs tracking-widest uppercase font-semibold">Premium Business Solution</span>
            <h1 class="font-display-lg text-4xl md:text-5xl text-deep-navy leading-tight font-bold">
                <?php echo esc_html( lh_field( 'vo_hero_title', 'Gói văn phòng cơ bản' ) ); ?> <br />
                <span class="text-prestige-gold"><?php echo esc_html( lh_field( 'vo_hero_subtitle', 'Địa chỉ kinh doanh hạng A' ) ); ?></span>
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">
                <?php echo esc_html( lh_field( 'vo_hero_desc', 'Thiết lập vị thế doanh nghiệp tại những tòa tháp tài chính biểu tượng. Giải pháp tối ưu chi phí, nâng tầm thương hiệu chuyên nghiệp ngay từ điểm khởi đầu.' ) ); ?>
            </p>
            <div class="flex flex-wrap gap-4 pt-4">
                <a class="bg-deep-navy text-white px-8 py-4 rounded-lg font-label-sm text-sm hover:bg-prestige-gold transition-all duration-300 shadow-lg font-semibold" href="#pricing">Đăng ký tư vấn ngay</a>
                <a class="border border-deep-navy text-deep-navy px-8 py-4 rounded-lg font-label-sm text-sm hover:bg-deep-navy/5 transition-all font-semibold" href="#pricing">Xem bảng giá</a>
            </div>
        </div>
        <div class="hidden md:block relative group">
            <div class="absolute -inset-4 bg-prestige-gold/20 rounded-2xl blur-2xl group-hover:bg-prestige-gold/30 transition-all"></div>
            <div class="relative glass-card p-4 rounded-2xl shadow-2xl overflow-hidden aspect-[4/3]">
                <img class="w-full h-full object-cover rounded-xl transition-transform duration-700 group-hover:scale-110" src="<?php echo esc_url( lh_field( 'vo_hero_image', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAaakQuaYGl4qlZYaDDwDjg8pahGKkcecCBlDeRU7iLIb-4GEE-J-8eJyuHWqxT-a4UKzehBmb5CZmiAnZ5MERO2lHpBoZMNbj-L40MUSEVCd-447JiwyNfbG2LcUaU3VlgdD3rbLI-HYkgzkrZna2A3scY010khkmi-Zs-_h83R9bzeAZwebKGx_4kalXdibRbYKKnXP5B8zQpYVUZtWF7IZDWzt6xCAcY2ouE3S_JBgW6zoHf-bN4wJ3Wt3lNnojA8zj8mDpnSXqu' ) ); ?>" />
            </div>
        </div>
    </div>
</header>

<!-- Pricing Cards Section -->
<section class="py-section-padding-desktop bg-surface" id="pricing">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-4 font-bold">Các Gói Dịch Vụ Linh Hoạt</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-4xl mx-auto">Chỉ từ 980,000đ/tháng để sở hữu địa chỉ kinh doanh đẳng cấp tại tòa tháp Capital Place.</p>
            <p class="text-xs text-on-surface-variant/70 mt-2 text-center">(Giá chưa bao gồm VAT nếu áp dụng)</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Economy -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all border border-surface-container-highest flex flex-col group">
                <div class="mb-8">
                    <h3 class="font-headline-md text-headline-md text-deep-navy font-bold">Gói Economy</h3>
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
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Địa chỉ đăng ký kinh doanh hạng A
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Đặt bảng tên công ty tại sảnh
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Tiếp nhận thư từ &amp; bưu phẩm
                    </li>
                </ul>
                <a href="#register" class="w-full text-center py-3 border border-deep-navy rounded-lg font-label-sm text-sm font-semibold group-hover:bg-deep-navy group-hover:text-white transition-all">Chọn Gói Này</a>
            </div>

            <!-- Standard (Popular) -->
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
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Mọi quyền lợi gói Economy
                    </li>
                    <li class="flex items-center gap-3 text-sm font-semibold">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Số điện thoại &amp; Fax riêng
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Lễ tân tiếp khách chuyên nghiệp
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        4h sử dụng phòng họp/tháng
                    </li>
                </ul>
                <a href="#register" class="w-full text-center py-3 bg-deep-navy text-white rounded-lg font-label-sm text-sm font-semibold hover:bg-prestige-gold transition-all">Chọn Gói Này</a>
            </div>

            <!-- Premium -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all border border-surface-container-highest flex flex-col group">
                <div class="mb-8">
                    <h3 class="font-headline-md text-headline-md text-deep-navy font-bold">Gói Premium</h3>
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
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Mọi quyền lợi gói Standard
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Chỗ ngồi làm việc linh hoạt
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Hỗ trợ tiếp nhận bưu phẩm thư từ
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-success-green text-lg">check_circle</span>
                        Phục vụ cafe &amp; trà miễn phí
                    </li>
                </ul>
                <a href="#register" class="w-full text-center py-3 border border-deep-navy rounded-lg font-label-sm text-sm font-semibold group-hover:bg-deep-navy group-hover:text-white transition-all">Chọn Gói Này</a>
            </div>
        </div>
        <p class="text-center text-sm text-on-surface-variant/70 mt-8">* Giá chưa bao gồm VAT (nếu áp dụng)</p>
    </div>
</section>

<!-- Comparison Table Section -->
<section class="py-section-padding-desktop bg-surface-container-low">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="mb-12">
            <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold">So Sánh Tiện Ích</h2>
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
                        <td class="p-6 font-body-md text-sm">Hỗ trợ nhận thư từ &amp; bưu phẩm</td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                        <td class="p-6 text-center text-success-green"><span class="material-symbols-outlined">check</span></td>
                    </tr>
                    <tr>
                        <td class="p-6 font-body-md text-sm">Cafe, trà &amp; nước uống pantry</td>
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
                <h4 class="font-headline-md text-headline-md text-deep-navy mb-4 font-bold">Tư vấn giải pháp</h4>
                <p class="text-on-surface-variant font-body-md text-sm">Đội ngũ chuyên viên lắng nghe nhu cầu và đề xuất gói dịch vụ phù hợp nhất với mô hình kinh doanh của bạn.</p>
            </div>
            <!-- Step 2 -->
            <div class="relative text-center group">
                <div class="step-number text-[120px] leading-none text-deep-navy/5 absolute -top-12 left-1/2 -translate-x-1/2 select-none group-hover:text-prestige-gold/10 transition-colors">02</div>
                <div class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto mb-6 relative z-10 border border-surface-container-highest group-hover:border-prestige-gold transition-colors">
                    <span class="material-symbols-outlined text-3xl text-prestige-gold">history_edu</span>
                </div>
                <h4 class="font-headline-md text-headline-md text-deep-navy mb-4 font-bold">Ký kết hợp đồng</h4>
                <p class="text-on-surface-variant font-body-md text-sm">Thủ tục nhanh gọn, chuyên nghiệp. Hợp đồng pháp lý minh bạch, bảo vệ quyền lợi tối đa cho doanh nghiệp.</p>
            </div>
            <!-- Step 3 -->
            <div class="relative text-center group">
                <div class="step-number text-[120px] leading-none text-deep-navy/5 absolute -top-12 left-1/2 -translate-x-1/2 select-none group-hover:text-prestige-gold/10 transition-colors">03</div>
                <div class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto mb-6 relative z-10 border border-surface-container-highest group-hover:border-prestige-gold transition-colors">
                    <span class="material-symbols-outlined text-3xl text-prestige-gold">business_center</span>
                </div>
                <h4 class="font-headline-md text-headline-md text-deep-navy mb-4 font-bold">Sẵn sàng sử dụng</h4>
                <p class="text-on-surface-variant font-body-md text-sm">Nhận địa chỉ đăng ký ngay lập tức. Bắt đầu vận hành doanh nghiệp với đầy đủ hạ tầng chuyên nghiệp.</p>
            </div>
        </div>
    </div>
</section>

<!-- Environment Showcase -->
<section class="py-section-padding-desktop bg-deep-navy text-white overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div class="relative">
            <img alt="Lễ tân chuyên nghiệp" class="w-full h-auto rounded-2xl shadow-2xl" src="<?php echo esc_url( lh_field( 'vo_showcase_image', 'https://lh3.googleusercontent.com/aida/AP1WRLtyksja9WCL5cKjTcT3_BRk2m038DAazrOt-NquHXciE1NU1QnJCg48DfAGIEP9ZPvAEbb4cWAnjYp9WMlyi2lK77gsgOoxRToHb6EM_cjRAhHJhBRlMAGVfvcZG3_O_HB7UeC7dIEBozj0Ap2whBP_VKXP_gezK0X-mcB9bWe68yiFjRxIeIg81NtMiRxgMii4AhA3ZbqJ3OZVwMs90qntxXYe8pyHewB95ocmDalNJfT5fuTbblzXou0' ) ); ?>" />
            <div class="absolute -bottom-8 -right-8 glass-card p-6 rounded-xl hidden md:block max-w-[240px]">
                <div class="flex items-center gap-4 mb-2">
                    <span class="material-symbols-outlined text-prestige-gold" style="font-variation-settings: 'FILL' 1;">stars</span>
                    <span class="font-label-sm text-deep-navy font-bold text-xs">Tiêu chuẩn 5 sao</span>
                </div>
                <p class="text-xs text-on-surface-variant">Môi trường làm việc chuyên nghiệp được thiết kế theo tiêu chuẩn quốc tế.</p>
            </div>
        </div>
        <div>
            <span class="text-prestige-gold font-label-sm text-xs uppercase tracking-widest block mb-4 font-bold">VÌ SAO CHỌN THE LEADERS HUB</span>
            <h2 class="font-headline-xl text-headline-xl text-white mb-8 font-bold">Hạ tầng chuẩn mực / Dịch vụ tận tâm</h2>
            <div class="space-y-6 text-surface-variant font-body-md text-sm leading-relaxed">
                <p>Chúng tôi hiểu rằng một địa chỉ giao dịch uy tín và chuyên nghiệp đóng vai trò quan trọng đối với sự thành công ban đầu của một thương hiệu. Do đó, Leaders Hub không chỉ cung cấp địa chỉ, mà còn cung cấp một đội ngũ hỗ trợ nhiệt tình đứng sau mọi giao dịch và tiếp đón khách hàng của bạn.</p>
            </div>
        </div>
    </div>
</section>

<!-- Consultation Form Section -->
<section class="py-section-padding-desktop bg-surface-container overflow-hidden scroll-mt-20" id="register">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="glass-card rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
            <div class="w-full md:w-1/2 p-12 bg-deep-navy text-white relative flex flex-col justify-between">
                <div class="relative z-10">
                    <h2 class="font-headline-xl text-headline-xl mb-6 font-bold">Sẵn sàng để vươn xa?</h2>
                    <p class="text-surface-variant font-body-lg mb-8">Hãy gửi yêu cầu của bạn, đội ngũ tư vấn viên của The Leaders Hub sẽ liên hệ tư vấn trong thời gian sớm nhất trong giờ làm việc.</p>
                    <div class="space-y-4">
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
            </div>
            <div class="w-full md:w-1/2 p-2 bg-white">
                <div class="airtable-embed-container w-full border border-surface-container-high bg-white p-2">
                    <iframe class="w-full" src="<?php echo esc_url( lh_opt( 'lh_form_office', 'https://airtable.com/embed/app0nmwylnsZLQTuu/pag0tggimRE7gA3xw/form' ) ); ?>" frameborder="0" onmousewheel="" width="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
