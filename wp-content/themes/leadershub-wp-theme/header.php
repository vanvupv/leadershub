<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .step-number {
            font-family: 'Inter', sans-serif;
            font-weight: 200;
        }

        .airtable-embed-container {
            position: relative;
            overflow: hidden;
            height: 700px;
            width: 100%;
            border-radius: 16px;
        }

        .airtable-embed-container iframe {
            position: absolute;
            top: -148px;
            left: 0;
            width: 100%;
            height: calc(100% + 148px);
            min-height: calc(100% + 148px) !important;
            border: none;
        }

        @media (max-width: 768px) {
            .airtable-embed-container {
                height: 1050px;
            }
            .airtable-embed-container iframe {
                height: calc(100% + 148px);
                min-height: calc(100% + 148px) !important;
            }
        }
    </style>
</head>
<body <?php body_class( 'bg-surface text-on-surface font-body-md overflow-x-hidden' ); ?>>

<?php
// Helper to get ACF options or fallback.
function lh_opt( $name, $default = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $name, 'option' );
        return ( $val !== null && $val !== '' && $val !== false ) ? $val : $default;
    }
    return $default;
}

$hotline = lh_opt( 'lh_hotline', '+84 3789 19119' );
$hotline_url = lh_opt( 'lh_hotline_url', 'tel:+84378919119' );
$logo = lh_opt( 'lh_logo', '' );
?>

<!-- Top Navigation Bar -->
<nav class="fixed top-0 w-full z-50 bg-white/90 dark:bg-deep-navy/90 backdrop-blur-md shadow-sm h-20 flex items-center">
    <div class="max-w-container-max mx-auto px-gutter w-full flex justify-between items-center">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2">
            <?php if ( $logo ) : ?>
                <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-12 w-auto">
            <?php endif; ?>
            <span class="font-headline-md text-headline-md font-bold text-deep-navy dark:text-prestige-gold">The Leaders Hub</span>
        </a>
        <div class="hidden md:flex items-center space-x-8">
            <a class="font-label-sm text-label-sm text-deep-navy hover:text-prestige-gold transition-colors" href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a>
            <a class="font-label-sm text-label-sm text-deep-navy hover:text-prestige-gold transition-colors" href="<?php echo esc_url( home_url( '/ve-chung-toi' ) ); ?>">Về chúng tôi</a>
            <div class="relative group py-2">
                <a class="font-label-sm text-label-sm text-deep-navy hover:text-prestige-gold transition-colors flex items-center gap-1 cursor-pointer">
                    Dịch vụ <span class="material-symbols-outlined text-xs">expand_more</span>
                </a>
                <div class="absolute top-full left-0 pt-2 w-56 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all z-50">
                    <div class="bg-white rounded-lg shadow-xl border border-surface-container-high py-2">
                        <a href="<?php echo esc_url( home_url( '/van-phong-ao' ) ); ?>" class="block px-4 py-2 text-sm text-deep-navy hover:bg-surface-container-low hover:text-prestige-gold">Dịch vụ địa chỉ doanh nghiệp</a>
                        <a href="<?php echo esc_url( home_url( '/van-phong-cao-cap' ) ); ?>" class="block px-4 py-2 text-sm text-deep-navy hover:bg-surface-container-low hover:text-prestige-gold">Văn phòng dịch vụ cao cấp</a>
                        <a href="<?php echo esc_url( home_url( '/phong-hop' ) ); ?>" class="block px-4 py-2 text-sm text-deep-navy hover:bg-surface-container-low hover:text-prestige-gold">Phòng họp chuyên nghiệp</a>
                    </div>
                </div>
            </div>
            <a class="font-label-sm text-label-sm text-deep-navy hover:text-prestige-gold transition-colors" href="<?php echo esc_url( home_url( '/tin-tuc' ) ); ?>">Tin tức</a>
            <a class="font-label-sm text-label-sm text-deep-navy hover:text-prestige-gold transition-colors" href="<?php echo esc_url( home_url( '/lien-he' ) ); ?>">Liên hệ</a>
        </div>
        <a href="<?php echo esc_url( home_url( '/#register' ) ); ?>" class="bg-success-green text-white px-6 py-2.5 rounded-lg font-label-sm text-label-sm hover:scale-105 transition-transform duration-200 shadow-sm inline-block">
            Nhận báo giá
        </a>
    </div>
</nav>
