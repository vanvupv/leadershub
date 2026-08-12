<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Leaders_Hub
 */

get_header();
?>

<main class="pt-32 pb-20">
    <div class="max-w-container-max mx-auto px-gutter">
        <h1 class="font-headline-xl text-deep-navy mb-6"><?php the_title(); ?></h1>
        <div class="prose max-w-none">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
