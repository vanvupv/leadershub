<?php
/**
 * Template Name: Phòng Họp (Meeting Room)
 *
 * @package The_Leaders_Hub
 */

get_header();
?>

<!-- Hero Banner -->
<section class="relative pt-32 pb-section-padding-desktop overflow-hidden bg-surface">
    <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="z-10">
            <span class="inline-block px-4 py-1 bg-prestige-gold/10 text-prestige-gold font-label-sm text-xs rounded-full mb-6 font-bold uppercase tracking-widest">KHÔNG GIAN HẠNG A</span>
            <h1 class="font-display-lg text-display-lg text-deep-navy mb-8 leading-tight font-bold">
                Phòng họp <br/><span class="text-prestige-gold">chuyên&nbsp;nghiệp</span>
            </h1>
            <p class="font-body-lg text-body-lg text-slate-500 mb-10 max-w-lg">
                Nâng tầm thương hiệu và khẳng định vị thế dẫn đầu với hệ thống phòng họp sang trọng, tích hợp công nghệ hiện đại bậc nhất ngay tại trung tâm Thủ đô.
            </p>
            <div class="flex flex-wrap gap-4">
                <a class="bg-deep-navy text-white px-8 py-4 rounded-lg font-label-sm text-sm flex items-center gap-2 hover:bg-prestige-gold transition-all font-semibold" href="#booking">
                    ĐẶT PHÒNG NGAY
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
                <a class="border border-deep-navy text-deep-navy px-8 py-4 rounded-lg font-label-sm text-sm hover:bg-surface-container transition-all font-semibold" href="#rooms">
                    XEM CÁC LOẠI PHÒNG
                </a>
            </div>
        </div>
        <div class="relative">
            <div class="rounded-2xl overflow-hidden ambient-shadow h-[500px]">
                <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBiMsNiduxFm1NMAhcX6AfWdR1Zr30jCIAvZXmvmky4Qy8CJkdWpZjSYRo7DH0NYnm2ghsEqMpnBtDsrBzTee6csYP-_3c4jZOE63bz9hhBLeCY7OTfnZwGpAoXZw76nuFMYJUmUMKnXHh-0qsgNMElEzKSnYTAbkfTo1gcAkdohlr-H1aqgU_gyyAayscJ6kdKAPhyvrdXJ18KcWcGrG7qLFwD-E__KKTYGo4au767WRT26fjIVPBMgtTwPHaicZg4wR1KvuI-LHkG" alt="Premium Meeting Room" />
            </div>
            <!-- Floating Card -->
            <div class="absolute -bottom-10 -left-10 glass-card p-6 rounded-xl ambient-shadow hidden md:block max-w-[240px]">
                <div class="flex items-center gap-3 mb-2">
                    <span class="material-symbols-outlined text-prestige-gold" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="font-label-sm text-xs text-deep-navy font-bold">Dịch vụ 5 sao</span>
                </div>
                <p class="text-[12px] text-slate-500">Phục vụ trà, cà phê và hỗ trợ kỹ thuật tận nơi suốt buổi họp.</p>
            </div>
        </div>
    </div>
</section>

<!-- Room Types Grid -->
<section class="py-section-padding-desktop bg-surface-container-low" id="rooms">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16">
            <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-4 font-bold">Lựa chọn không gian phù hợp</h2>
            <div class="w-20 h-1 bg-prestige-gold mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Room 1: 30m2 -->
            <div class="bg-white rounded-2xl overflow-hidden ambient-shadow group hover:-translate-y-2 transition-transform duration-300">
                <div class="h-72 relative overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQdq9NwC8YCToxxOVi4DL7rDexjVjtLcSMX6QImJQZEj4j7XqUDwm9PdbLhiIUm0sBfE8I3RA_uA7ZQiOHJ5tRZzh8kTmxacwg52wqmtPCNc9-LPnx2lIshCRQ02shWHw0Vh-IwUsKCIKkPp_nwSMZfyFEYLggv_JbZByqKqrOSEy6KBcgIW2u4eZ3SE85ip-RzItAE9j9HQgKzY1CvVcqmfRIOAHcMLcOGWAhF6wQ9KRE_R4fFgmyLfxkFOOdFi2eyGK85LZNrcJp" alt="Room 30m2" />
                    <div class="absolute top-4 left-4 bg-deep-navy/80 backdrop-blur-sm text-white px-3 py-1 rounded-full font-label-sm text-xs font-bold">
                        Diện tích 30 m²
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="font-headline-md text-headline-md text-deep-navy mb-2 font-bold">Phòng họp 30 m² – 10 người</h3>
                    <p class="font-label-sm text-sm text-prestige-gold mb-4 font-semibold">Sức chứa tiêu chuẩn: 10 người</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-2 text-slate-500 font-body-md text-sm">
                            <span class="material-symbols-outlined text-success-green text-sm">check_circle</span>
                            <span>Bố cục linh hoạt: <strong>Standard layout</strong> & <strong>Theatre layout</strong></span>
                        </li>
                        <li class="flex items-center gap-2 text-slate-500 font-body-md text-sm">
                            <span class="material-symbols-outlined text-success-green text-sm">check_circle</span>
                            <span>Có 01 buồng gọi điện thoại (phone booth) riêng trong phòng</span>
                        </li>
                        <li class="flex items-center gap-2 text-slate-500 font-body-md text-sm">
                            <span class="material-symbols-outlined text-success-green text-sm">check_circle</span>
                            <span>Sử dụng riêng biệt TV, camera và micro cao cấp</span>
                        </li>
                    </ul>
                    <div class="flex justify-between items-center pt-4 border-t border-surface-container">
                        <span class="font-headline-md text-base text-deep-navy font-bold">Liên hệ nhận báo giá</span>
                        <a href="#booking" class="bg-success-green hover:bg-deep-navy text-white px-6 py-2 rounded-lg font-label-sm text-sm font-semibold transition-colors duration-200">Đặt phòng</a>
                    </div>
                </div>
            </div>

            <!-- Room 2: 28m2 -->
            <div class="bg-white rounded-2xl overflow-hidden ambient-shadow group hover:-translate-y-2 transition-transform duration-300">
                <div class="h-72 relative overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4hLdLAGdTbaNErXq0sAIKBG_ojffOm_870xesXJFhnF7Vhtxs6Tx2YdRTjWXE-EB7TTGPQxWHaWbwm2cTl3wzQcqu-mAGhIvIdK-AEpUF-xBm0aAi46THBzl9Zz3PH-dChP752jayO8iYlZnDEFDrk9KP6mkCRHO6Iw7E38nLRDO0t5k6QmpWlUbHdOtuDYz9VECzvbvvmB0JeQBeickIGlOGq4BIV6E4_07eiHxmjBKER5zhwkcpBT-uTiRTlAcJIwDnuAOYkOvW" alt="Room 28m2" />
                    <div class="absolute top-4 left-4 bg-deep-navy/80 backdrop-blur-sm text-white px-3 py-1 rounded-full font-label-sm text-xs font-bold">
                        Diện tích 28 m²
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="font-headline-md text-headline-md text-deep-navy mb-2 font-bold">Phòng họp 28 m² – 08 người</h3>
                    <p class="font-label-sm text-sm text-prestige-gold mb-4 font-semibold">Sức chứa tiêu chuẩn: 08 người</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-2 text-slate-500 font-body-md text-sm">
                            <span class="material-symbols-outlined text-success-green text-sm">check_circle</span>
                            <span>Không gian họp chuyên nghiệp, yên tĩnh tuyệt đối</span>
                        </li>
                        <li class="flex items-center gap-2 text-slate-500 font-body-md text-sm">
                            <span class="material-symbols-outlined text-success-green text-sm">check_circle</span>
                            <span>Sử dụng riêng biệt hệ thống TV, camera và micro họp trực tuyến</span>
                        </li>
                    </ul>
                    <div class="flex justify-between items-center pt-4 border-t border-surface-container">
                        <span class="font-headline-md text-base text-deep-navy font-bold">Liên hệ nhận báo giá</span>
                        <a href="#booking" class="bg-success-green hover:bg-deep-navy text-white px-6 py-2 rounded-lg font-label-sm text-sm font-semibold transition-colors duration-200">Đặt phòng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Specs/Amenities -->
<section class="py-section-padding-desktop bg-white">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="relative grid grid-cols-2 gap-4">
                <div class="pt-12">
                    <div class="rounded-2xl overflow-hidden h-80 mb-4 ambient-shadow">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDR3arAjbMDVy6Y7ExqMouxAG6teq1fENt4p6gtBmL6onX6BwmAiPCVUBrSXUdprIVF9JucKDx6yypRPhuFT7tP9tQkQxEUyeI_PNNAPhqicZPZ0IlnBW717pfPbce4oL4lFA4xQ4zBUw8z373-A6CD5HjAjW7M30xFnBvCpJPk56FpMINiYnQhaPCBxUfHX9FO_dO5AAmDHDrC3KEZDU5xP1BPQQwOLmuR4Ke3MLEJ1xuoGpgaSFo_4Y67PawsMOELFICba-_mj59S" alt="specs 1" />
                    </div>
                </div>
                <div>
                    <div class="rounded-2xl overflow-hidden h-80 ambient-shadow">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxOHxWIxX0ldBkJVTxc0dkh6PPOdsSjOEY2I6d43gAjIi011hR7UaPClU0SB-6r9mQS3X9PfUye8bH0ZA1b4M0UmkTf-vA_bHrQEQBAy2wipnmgQVd9TpaZbrOeVw7elx06eRCkmOJfBlbw4-EqEavltsq6Rie4wNLK8mV-un26HUz3bp7OELKbUA1OCDoMXhtWsvJ-0RTMnf2AwGmxdIA9p-ktNJf57Du0HAVOh3EkHaB4Wc-vEUvXI9QWsbAR8_lnmsM2K3dcIBH" alt="specs 2" />
                    </div>
                </div>
            </div>
            <div>
                <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-6 font-bold">Tiện ích & Trang thiết bị đi&nbsp;kèm</h2>
                <p class="font-body-lg text-body-lg text-slate-500 mb-10">Tất cả các dịch vụ tiện ích dưới đây được thiết kế và cung cấp theo tiêu chuẩn cao cấp nhất, đảm bảo tính chuyên nghiệp tối đa cho buổi họp của bạn.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <!-- TV Screen -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-deep-navy flex items-center justify-center flex-shrink-0 text-white">
                            <span class="material-symbols-outlined">tv</span>
                        </div>
                        <div>
                            <h4 class="font-headline-md text-base mb-1 font-semibold">Màn hình TV</h4>
                            <p class="font-body-md text-xs text-slate-500">Màn hình TV trình chiếu chất lượng cao hỗ trợ tối đa cho việc thuyết trình.</p>
                        </div>
                    </div>
                    <!-- Tea & Coffee -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-deep-navy flex items-center justify-center flex-shrink-0 text-white">
                            <span class="material-symbols-outlined">coffee</span>
                        </div>
                        <div>
                            <h4 class="font-headline-md text-base mb-1 font-semibold">Trà và cà phê</h4>
                            <p class="font-body-md text-xs text-slate-500">Trà và cà phê thơm ngon phục vụ miễn phí trong suốt thời gian họp.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
<section class="py-section-padding-desktop relative bg-surface-container" id="booking">
    <div class="max-w-container-max mx-auto px-gutter relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <h2 class="font-headline-xl text-headline-xl text-deep-navy mb-6 font-bold">Đặt phòng họp ngay</h2>
                <p class="font-body-lg text-body-lg text-slate-500 mb-8">Đội ngũ sẽ liên hệ trong thời gian sớm nhất trong giờ làm việc để hỗ trợ và hoàn tất thủ tục đặt phòng họp cho quý khách.</p>
                
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full border-2 border-prestige-gold flex items-center justify-center text-prestige-gold">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                        <div>
                            <p class="font-label-sm text-xs uppercase text-slate-500 mb-1">Hotline tư vấn</p>
                            <p class="font-headline-md text-headline-md text-deep-navy font-bold"><?php echo esc_html( lh_opt('lh_hotline', '+84 3789 19119') ); ?></p>
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

<?php
get_footer();
