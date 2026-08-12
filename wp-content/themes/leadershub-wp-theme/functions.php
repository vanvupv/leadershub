<?php
/**
 * The Leaders Hub Theme functions and definitions.
 *
 * @package The_Leaders_Hub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Disable Admin Bar on Frontend for clean Landing Page layout.
add_filter( 'show_admin_bar', '__return_false' );

// Theme Setup
function leadershub_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Switch default core markup for search form, comment form, etc.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
}
add_action( 'after_setup_theme', 'leadershub_theme_setup' );

// Enqueue styles and scripts
function leadershub_theme_scripts() {
    // Fonts
    wp_enqueue_style( 'google-fonts-inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null );
    wp_enqueue_style( 'google-material-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap', array(), null );
    
    // Tailwind Play CDN (Used for development, custom theme options)
    wp_enqueue_script( 'tailwind-cdn', 'https://cdn.tailwindcss.com?plugins=forms,container-queries', array(), null, false );
    
    // Inline script to configure Tailwind
    wp_add_inline_script( 'tailwind-cdn', "
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'deep-navy': '#002147',
                        'prestige-gold': '#D4AF37',
                        'success-green': '#00875A',
                        'surface': '#f7f9fb',
                        'on-surface': '#191c1e',
                        'on-surface-variant': '#43474e',
                        'surface-container-low': '#f0f3f6',
                        'surface-container-high': '#e2e5e8',
                        'surface-container-highest': '#d9dce0',
                        'primary': '#002147',
                        'on-primary': '#ffffff',
                    },
                    spacing: {
                        'gutter': '24px',
                        'section-padding-desktop': '50px',
                        'section-padding-mobile': '50px',
                        'unit': '32px'
                    },
                    maxWidth: {
                        'container-max': '1280px'
                    },
                    fontFamily: {
                        'display-lg': ['Inter', 'sans-serif'],
                        'headline-xl': ['Inter', 'sans-serif'],
                        'headline-md': ['Inter', 'sans-serif'],
                        'body-lg': ['Inter', 'sans-serif'],
                        'body-md': ['Inter', 'sans-serif'],
                        'label-sm': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    " );
}
add_action( 'wp_enqueue_scripts', 'leadershub_theme_scripts' );

// Classic Editor for Custom Page Templates
add_filter( 'use_block_editor_for_post', function ( $use, $post ) {
    $template = get_page_template_slug( $post );
    if ( $template && strpos( $template, 'template-' ) === 0 ) {
        return false; // Force Classic Editor
    }
    return $use;
}, 10, 2 );

// Recursive Asset Stripping for Landing Pages
function leadershub_strip_assets() {
    $template = get_page_template_slug();
    // Only strip assets on landing page templates to optimize page speed
    if ( $template && strpos( $template, 'template-' ) === 0 ) {
        add_action( 'wp_enqueue_scripts', function() {
            // Keep only essential plugin CSS/JS (like contact forms if enqueued)
            global $wp_styles, $wp_scripts;
            $keep_styles = array( 'google-fonts-inter', 'google-material-icons', 'admin-bar' );
            $keep_scripts = array( 'tailwind-cdn', 'admin-bar', 'jquery-core', 'jquery-migrate' );
            
            // Resolve form plugin dependencies recursively (wpcf7, wp-i18n, wp-hooks etc)
            $form_styles = array( 'contact-form-7', 'wpcf7-recaptcha' );
            $form_scripts = array( 'contact-form-7', 'wpcf7-recaptcha', 'wp-i18n', 'wp-hooks', 'wp-polyfill', 'wp-includes' );
            
            foreach ( $wp_styles->registered as $handle => $style ) {
                if ( ! in_array( $handle, $keep_styles ) && ! in_array( $handle, $form_styles ) ) {
                    wp_dequeue_style( $handle );
                }
            }
            foreach ( $wp_scripts->registered as $handle => $script ) {
                // If it's a form dependency, resolve and keep it
                $is_form_dep = false;
                foreach ( $form_scripts as $keyword ) {
                    if ( stripos( $handle, $keyword ) !== false ) {
                        $is_form_dep = true;
                        break;
                    }
                }
                if ( ! in_array( $handle, $keep_scripts ) && ! $is_form_dep ) {
                    wp_dequeue_script( $handle );
                }
            }
        }, 999 );
    }
}
add_action( 'template_redirect', 'leadershub_strip_assets' );

// Load ACF fields PHP declaration
require_once get_template_directory() . '/acf-fields.php';
