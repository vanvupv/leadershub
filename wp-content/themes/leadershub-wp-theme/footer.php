<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package The_Leaders_Hub
 */

$hotline = lh_opt( 'lh_hotline', '+84 3789 19119' );
$hotline_url = lh_opt( 'lh_hotline_url', 'tel:+84378919119' );
$email = lh_opt( 'lh_email', 'contact@theleadershub.vn' );
$address = lh_opt( 'lh_address', 'Tầng 19, Tháp 1, Tòa nhà Capital Place, Số 29 Liễu Giai, P. Ngọc Khánh, Q. Ba Đình, Hà Nội' );
$map_url = lh_opt( 'lh_map_url', 'https://maps.app.goo.gl/yQk3nU7pYk2cK1dXA' );
$facebook = lh_opt( 'lh_facebook', 'https://m.me/theleadershub' );
$zalo = lh_opt( 'lh_zalo', 'https://zalo.me/84378919119' );
$linkedin = lh_opt( 'lh_linkedin', '#' );
?>

<!-- Footer -->
<footer class="bg-deep-navy text-surface-container-lowest pt-section-padding-desktop pb-unit border-t border-white/5">
    <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 md:grid-cols-4 gap-gutter">
        <div class="col-span-1 md:col-span-1">
            <div class="font-headline-md text-headline-md text-prestige-gold font-bold mb-6">The Leaders Hub</div>
            <p class="text-surface-container-highest/60 text-sm mb-6 leading-relaxed">Đối tác tin cậy cung cấp giải pháp không gian làm việc và địa chỉ kinh doanh chuyên nghiệp chuẩn quốc tế tại Hà Nội.</p>
            <div class="flex gap-4">
                <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-prestige-gold hover:text-deep-navy transition-all" href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer" title="Bản đồ"><span class="material-symbols-outlined text-sm">location_on</span></a>
                <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-prestige-gold hover:text-deep-navy transition-all" href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" title="Facebook"><span class="material-symbols-outlined text-sm">public</span></a>
                <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-prestige-gold hover:text-deep-navy transition-all" href="mailto:<?php echo esc_attr( $email ); ?>" title="Email"><span class="material-symbols-outlined text-sm">mail</span></a>
            </div>
        </div>
        <div>
            <h6 class="font-label-sm text-white mb-6 uppercase tracking-widest text-xs font-semibold">Dịch vụ</h6>
            <ul class="space-y-4 text-sm">
                <li><a class="text-surface-container-highest/80 hover:text-prestige-gold hover:translate-x-1 transition-all inline-block" href="<?php echo esc_url( home_url( '/van-phong-ao' ) ); ?>">Dịch vụ địa chỉ doanh nghiệp</a></li>
                <li><a class="text-surface-container-highest/80 hover:text-prestige-gold hover:translate-x-1 transition-all inline-block" href="<?php echo esc_url( home_url( '/van-phong-cao-cap' ) ); ?>">Văn phòng cao cấp (Serviced Office)</a></li>
                <li><a class="text-surface-container-highest/80 hover:text-prestige-gold hover:translate-x-1 transition-all inline-block" href="<?php echo esc_url( home_url( '/phong-hop' ) ); ?>">Phòng họp chuyên nghiệp</a></li>
                <li><a class="text-surface-container-highest/80 hover:text-prestige-gold hover:translate-x-1 transition-all inline-block" href="<?php echo esc_url( home_url( '/#flexible-workspace' ) ); ?>">Flexible Workspace</a></li>
            </ul>
        </div>
        <div>
            <h6 class="font-label-sm text-white mb-6 uppercase tracking-widest text-xs font-semibold">Hỗ trợ</h6>
            <ul class="space-y-4 text-sm">
                <li><a class="text-surface-container-highest/80 hover:text-prestige-gold hover:translate-x-1 transition-all inline-block" href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">Câu hỏi thường gặp</a></li>
                <li><a class="text-surface-container-highest/80 hover:text-prestige-gold hover:translate-x-1 transition-all inline-block" href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat' ) ); ?>">Chính sách bảo mật</a></li>
                <li><a class="text-surface-container-highest/80 hover:text-prestige-gold hover:translate-x-1 transition-all inline-block" href="<?php echo esc_url( home_url( '/dieu-khoan-su-dung' ) ); ?>">Điều khoản sử dụng</a></li>
                <li><a class="text-surface-container-highest/80 hover:text-prestige-gold hover:translate-x-1 transition-all inline-block" href="<?php echo esc_url( home_url( '/lien-he' ) ); ?>">Liên hệ</a></li>
            </ul>
        </div>
        <div>
            <h6 class="font-label-sm text-white mb-6 uppercase tracking-widest text-xs font-semibold">Văn phòng</h6>
            <p class="text-surface-container-highest/80 text-sm leading-relaxed mb-4"><?php echo esc_html( $address ); ?></p>
            <p class="text-surface-container-highest/80 text-sm leading-relaxed">Hotline: <a href="<?php echo esc_url( $hotline_url ); ?>" class="hover:text-prestige-gold font-bold"><?php echo esc_html( $hotline ); ?></a></p>
            <p class="text-surface-container-highest/80 text-sm leading-relaxed mt-2">Email: <a href="mailto:<?php echo esc_attr( $email ); ?>" class="hover:text-prestige-gold"><?php echo esc_html( $email ); ?></a></p>
        </div>
    </div>
    <div class="max-w-container-max mx-auto px-gutter mt-20 pt-8 border-t border-white/10 text-center text-sm opacity-60">
        <p>&copy; <?php echo date( 'Y' ); ?> The Leaders Hub. All rights reserved.</p>
    </div>
</footer>

<!-- Floating Quick Actions Menu (Unified FAB) -->
<div class="fixed bottom-8 right-8 z-50 flex flex-col items-end space-y-4">
    <div class="bg-white rounded-full p-2 shadow-2xl flex flex-col gap-2 scale-0 opacity-0 transition-all duration-300" id="quick-menu">
        <a class="bg-deep-navy text-white rounded-full p-4 hover:bg-prestige-gold hover:text-deep-navy transition-all flex items-center justify-center w-12 h-12" href="<?php echo esc_url( $hotline_url ); ?>" title="Gọi Hotline">
            <span class="material-symbols-outlined">call</span>
        </a>
        <a class="bg-[#0068FF] text-white rounded-full p-3 hover:bg-prestige-gold hover:text-deep-navy transition-all flex items-center justify-center w-12 h-12" href="<?php echo esc_url( $zalo ); ?>" target="_blank" rel="noopener noreferrer" title="Chat Zalo">
            <svg class="w-6 h-6 fill-current text-white" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.49 10.2722v-.4496h1.3467v6.3218h-.7704a.576.576 0 01-.5763-.5729l-.0006.0005a3.273 3.273 0 01-1.9372.6321c-1.8138 0-3.2844-1.4697-3.2844-3.2823 0-1.8125 1.4706-3.2822 3.2844-3.2822a3.273 3.273 0 011.9372.6321l.0006.0005zM6.9188 7.7896v.205c0 .3823-.051.6944-.2995 1.0605l-.03.0343c-.0542.0615-.1815.206-.2421.2843L2.024 14.8h4.8948v.7682a.5764.5764 0 01-.5767.5761H0v-.3622c0-.4436.1102-.6414.2495-.8476L4.8582 9.23H.1922V7.7896h6.7266zm8.5513 8.3548a.4805.4805 0 01-.4803-.4798v-7.875h1.4416v8.3548H15.47zM20.6934 9.6C22.52 9.6 24 11.0807 24 12.9044c0 1.8252-1.4801 3.306-3.3066 3.306-1.8264 0-3.3066-1.4808-3.3066-3.306 0-1.8237 1.4802-3.3044 3.3066-3.3044zm-10.1412 5.253c1.0675 0 1.9324-.8645 1.9324-1.9312 0-1.065-.865-1.9295-1.9324-1.9295s-1.9324.8644-1.9324 1.9295c0 1.0667.865 1.9312 1.9324 1.9312zm10.1412-.0033c1.0737 0 1.945-.8707 1.945-1.9453 0-1.073-.8713-1.9436-1.945-1.9436-1.0753 0-1.945.8706-1.945 1.9436 0 1.0746.8697 1.9453 1.945 1.9453z"/>
            </svg>
        </a>
        <a class="bg-[#0084FF] text-white rounded-full p-4 hover:bg-prestige-gold hover:text-deep-navy transition-all flex items-center justify-center w-12 h-12" href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" title="Chat Messenger">
            <span class="material-symbols-outlined">forum</span>
        </a>
    </div>
    <button class="bg-success-green hover:bg-success-green/90 text-white rounded-full p-5 shadow-lg hover:scale-110 active:scale-90 transition-all flex items-center justify-center" id="toggle-fab">
        <span class="material-symbols-outlined text-3xl" id="fab-icon">message</span>
    </button>
</div>

<!-- Success Message Modal -->
<div id="success-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 opacity-0 pointer-events-none transition-opacity duration-300">
    <div id="success-modal-content" class="bg-white rounded-2xl p-8 max-w-sm w-full text-center shadow-2xl transform scale-90 transition-transform duration-300 relative border border-surface-container-high">
        <div class="w-16 h-16 bg-success-green/10 text-success-green rounded-full flex items-center justify-center mx-auto mb-6">
            <span class="material-symbols-outlined text-3xl">check_circle</span>
        </div>
        <h3 class="font-headline-xl text-xl text-deep-navy font-bold mb-3">Gửi Yêu Cầu Thành Công!</h3>
        <p class="font-body-md text-body-md text-on-surface-variant mb-6">
            Cảm ơn bạn đã quan tâm. Đội ngũ chuyên viên tư vấn của The Leaders Hub sẽ chủ động liên hệ hỗ trợ bạn trong thời gian sớm nhất!
        </p>
        <button onclick="closeSuccessModal()" class="w-full py-3 bg-deep-navy hover:bg-prestige-gold hover:text-deep-navy text-white font-semibold rounded-lg text-sm transition-all focus:outline-none">
            Đóng Cửa Sổ
        </button>
    </div>
</div>

<script>
    // Floating Quick Menu Trigger JS
    const fabBtn = document.getElementById('toggle-fab');
    const quickMenu = document.getElementById('quick-menu');
    const fabIcon = document.getElementById('fab-icon');
    let isOpen = false;

    if (fabBtn && quickMenu) {
        fabBtn.addEventListener('click', () => {
            isOpen = !isOpen;
            if (isOpen) {
                quickMenu.classList.remove('scale-0', 'opacity-0');
                quickMenu.classList.add('scale-100', 'opacity-100');
                fabIcon.innerText = 'close';
            } else {
                quickMenu.classList.add('scale-0', 'opacity-0');
                quickMenu.classList.remove('scale-100', 'opacity-100');
                fabIcon.innerText = 'message';
            }
        });
    }

    function showSuccessModal() {
        const modal = document.getElementById('success-modal');
        const modalContent = document.getElementById('success-modal-content');
        if (modal && modalContent) {
            modal.classList.remove('pointer-events-none', 'opacity-0');
            modal.classList.add('opacity-100');
            modalContent.classList.remove('scale-90');
            modalContent.classList.add('scale-100');
        }
    }

    function closeSuccessModal() {
        const modal = document.getElementById('success-modal');
        const modalContent = document.getElementById('success-modal-content');
        if (modal && modalContent) {
            modal.classList.add('pointer-events-none', 'opacity-0');
            modal.classList.remove('opacity-100');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-90');
        }
    }

    // Close modal when clicking outside
    window.onclick = function (event) {
        const modal = document.getElementById('success-modal');
        if (event.target === modal) {
            closeSuccessModal();
        }
    }
</script>

<?php
// Filtered wp_footer output to clean up resources while keeping core plugins scripts
ob_start();
wp_footer();
$wp_footer_output = ob_get_clean();
$wp_footer_output = preg_replace( '/<link[^>]*rel=[\'"]stylesheet[\'"][^>]*>/i', '', $wp_footer_output );
$keep_js = array( 'rocket', 'lazyload', 'contact-form-7', 'wpcf7', 'swv', 'wp-i18n', 'wp-hooks', 'wp-polyfill', 'wp-includes' );
$wp_footer_output = preg_replace_callback(
    '/<script\b[^>]*>.*?<\/script>/si',
    function( $m ) use ( $keep_js ) {
        foreach ( $keep_js as $k ) {
            if ( stripos( $m[0], $k ) !== false ) {
                return $m[0];
            }
        }
        return '';
    },
    $wp_footer_output
);
echo $wp_footer_output;
?>
</body>
</html>
