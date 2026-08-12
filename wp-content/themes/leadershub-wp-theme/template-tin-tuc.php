<?php
/**
 * Template Name: Tin Tức (News)
 *
 * @package The_Leaders_Hub
 */

get_header();
?>

<main class="pt-32 pb-20 bg-surface">
    <div class="max-w-container-max mx-auto px-gutter">
        <h1 class="font-display-lg text-4xl md:text-5xl font-bold text-deep-navy mb-8">Tin tức mới nhất</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- News loop or fallback list of posts -->
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
            ?>
                <div class="bg-white rounded-2xl overflow-hidden border border-surface-container-high hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="h-52 overflow-hidden relative">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105' ) ); ?>
                        <?php else : ?>
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=600&q=80" alt="News Image" />
                        <?php endif; ?>
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-bold text-prestige-gold uppercase tracking-wider block mb-2"><?php the_category(', '); ?></span>
                            <h3 class="font-headline-md text-lg text-deep-navy font-bold mb-3 line-clamp-2 group-hover:text-prestige-gold transition-colors"><?php the_title(); ?></h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3"><?php echo wp_strip_all_tags( get_the_excerpt() ); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text-sm font-semibold text-deep-navy hover:text-prestige-gold transition-colors inline-block mt-4">Xem chi tiết &rarr;</a>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- Fallback Mock Posts -->
                <div class="bg-white rounded-2xl overflow-hidden border border-surface-container-high hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="h-52 overflow-hidden relative">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=600&q=80" alt="News Image" />
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-bold text-prestige-gold uppercase tracking-wider block mb-2">Sự kiện</span>
                            <h3 class="font-headline-md text-lg text-deep-navy font-bold mb-3 line-clamp-2 group-hover:text-prestige-gold transition-colors">Tương lai của mô hình văn phòng Hybrid 2024</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3">Xu hướng làm việc linh hoạt đang thay đổi cách các doanh nghiệp vận hành và lựa chọn không gian làm việc tối ưu.</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();
