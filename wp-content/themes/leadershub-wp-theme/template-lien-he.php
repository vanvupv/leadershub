<?php
/**
 * Template Name: Liên Hệ (Contact)
 *
 * @package The_Leaders_Hub
 */

get_header();

// ACF Variables: Section 1 Contact Main Content
$contact_badge         = lh_field( 'contact_badge', 'Kết nối với chúng tôi' );
$contact_title         = lh_field( 'contact_title', 'Liên hệ với' );
$contact_gold_title    = lh_field( 'contact_gold_title', 'The Leaders Hub' );
$contact_desc          = lh_field( 'contact_desc', 'Hãy gửi yêu cầu của bạn bằng cách sử dụng biểu mẫu hoặc liên hệ trực tiếp với chúng tôi qua thông tin liên hệ dưới đây.' );
$contact_hotline_label = lh_field( 'contact_hotline_label', 'Hotline tư vấn' );
$contact_email_label   = lh_field( 'contact_email_label', 'Địa chỉ Email' );
$contact_address_label = lh_field( 'contact_address_label', 'Trụ sở chính' );
$contact_map_bg        = lh_field( 'contact_map_bg', 'https://lh3.googleusercontent.com/aida-public/AB6AXuC5AQWvOaUndJeICTK6aWY61WATQwdfTV4BPJ2a9XRMX0uO3khen4I9NqRiRLnj3Bf8gRprA7d7ssA-qRvCqDbT48_joZG3I7YuGIzb34Lx_LpwWwW6iz_NCyDhPxhCn12EyuSDjoJWCgj-NQ7lA4WgM_Zokh7ZackMMFEPa0ojmucd17f4Up1meDucWoJ9FCXrOnvEGHiOoqSAiKbaDOj5_5M0xuRVfzXXf7Q7ezXpR_a8ITcFiUQ7uW56M8QK5pLN2GXZ_mE4vMGx' );
$contact_map_title     = lh_field( 'contact_map_title', 'Capital Place, Hà Nội' );

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

<!-- Main Content -->
<main class="pt-32 pb-20 bg-surface">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Contact Info Column -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <?php if ( ! empty( $contact_badge ) ) : ?>
                        <span class="inline-block px-4 py-1.5 bg-prestige-gold/10 text-prestige-gold font-label-sm text-xs rounded-full uppercase tracking-wider mb-4 font-bold"><?php echo esc_html( $contact_badge ); ?></span>
                    <?php endif; ?>

                    <?php if ( ! empty( $contact_title ) ) : ?>
                        <h1 class="font-display-lg text-4xl md:text-5xl font-bold text-deep-navy leading-tight mb-6">
                            <?php echo esc_html( $contact_title ); ?>
                            <?php if ( ! empty( $contact_gold_title ) ) : ?>
                                <br/><span class="text-prestige-gold"><?php echo esc_html( $contact_gold_title ); ?></span>
                            <?php endif; ?>
                        </h1>
                    <?php endif; ?>

                    <?php if ( ! empty( $contact_desc ) ) : ?>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            <?php echo esc_html( $contact_desc ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="space-y-6 bg-white p-8 rounded-2xl border border-surface-container-high shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-deep-navy flex items-center justify-center text-prestige-gold shrink-0">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                        <div>
                            <p class="font-label-sm text-xs text-on-surface-variant uppercase mb-1"><?php echo esc_html( $contact_hotline_label ); ?></p>
                            <a href="<?php echo esc_url( lh_opt( 'lh_hotline_url', 'tel:+84378919119' ) ); ?>" class="font-headline-md text-deep-navy font-bold hover:text-prestige-gold transition-colors"><?php echo esc_html( lh_opt( 'lh_hotline', '+84 3789 19119' ) ); ?></a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-deep-navy flex items-center justify-center text-prestige-gold shrink-0">
                            <span class="material-symbols-outlined">mail</span>
                        </div>
                        <div>
                            <p class="font-label-sm text-xs text-on-surface-variant uppercase mb-1"><?php echo esc_html( $contact_email_label ); ?></p>
                            <a href="mailto:<?php echo esc_attr( lh_opt( 'lh_email', 'contact@theleadershub.vn' ) ); ?>" class="font-headline-md text-deep-navy font-semibold hover:text-prestige-gold transition-colors"><?php echo esc_html( lh_opt( 'lh_email', 'contact@theleadershub.vn' ) ); ?></a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-deep-navy flex items-center justify-center text-prestige-gold shrink-0">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <div>
                            <p class="font-label-sm text-xs text-on-surface-variant uppercase mb-1"><?php echo esc_html( $contact_address_label ); ?></p>
                            <p class="font-headline-md text-sm text-deep-navy leading-relaxed"><?php echo esc_html( lh_opt( 'lh_address', 'Tầng 19, Tháp 1, Tòa nhà Capital Place, Số 29 Liễu Giai, P. Ngọc Khánh, Q. Ba Đình, Hà Nội' ) ); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Map Widget -->
                <div class="rounded-2xl overflow-hidden shadow-lg h-64 relative group">
                    <div class="bg-cover bg-center w-full h-full grayscale group-hover:grayscale-0 transition-all duration-700" style="background-image: url('<?php echo esc_url( $contact_map_bg ); ?>')"></div>
                    <div class="absolute inset-0 bg-deep-navy/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="<?php echo esc_url( lh_opt( 'lh_map_url', 'https://maps.app.goo.gl/yQk3nU7pYk2cK1dXA' ) ); ?>" target="_blank" rel="noopener noreferrer" class="bg-white text-deep-navy px-6 py-2 rounded-full font-label-sm text-sm shadow-xl flex items-center gap-2 font-bold">
                            <span class="material-symbols-outlined">map</span> Xem bản đồ lớn
                        </a>
                    </div>
                    <?php if ( ! empty( $contact_map_title ) ) : ?>
                        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur px-4 py-2 rounded-lg shadow-sm">
                            <p class="font-label-sm text-xs text-deep-navy font-bold"><?php echo esc_html( $contact_map_title ); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Contact Form Column -->
            <div class="lg:col-span-7">
                <div class="airtable-embed-container bg-white p-2 border border-surface-container-high">
                    <iframe class="w-full" src="<?php echo esc_url( lh_opt( 'lh_form_contact', lh_opt( 'lh_form_office', 'https://airtable.com/embed/app0nmwylnsZLQTuu/pag0tggimRE7gA3xw/form' ) ) ); ?>" frameborder="0" onmousewheel="" width="100%"></iframe>
                </div>
            </div>

        </div>
    </div>
</main>

<?php
get_footer();
