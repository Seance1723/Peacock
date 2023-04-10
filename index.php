<?php
/**
 * The main template file
 * 
 * @link https://codetrait.com/Peacock
 *
 * @package Peacock
 * @subpackage ct-peacock
 * @since Peacock 1.0.0
 */

header("HTTP/1.0 404 Not Found");

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // get the current page number
$args = array(
    'category__not_in' => array( 1, 5, 8 ), // Replace 4 and 6 with the category IDs of service and portfolio respectively
    'posts_per_page' => 5, // display 5 posts per page
    'paged' => $paged // set the current page number
);
$insight_query = new WP_Query( $args );


if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) :
    ?>
	<?php get_template_part( 'template-parts/header/header', 'single' ); ?>
    <?php
endif;

if ( $insight_query->have_posts() ) { ?>

    <section id="posts-page" class="default-posts">
        <div class="container">
            <div class="row">
                <div class="content-side col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <?php
                        /* Start the Loop */
                        while ( $insight_query->have_posts() ) {
                            $insight_query->the_post();
                            // display the post content using template tags and functions
                            /*
                            * Include the Post-Type-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                            */
                            get_template_part( 'template-parts/content/content' );
                        }

                        // display pagination links after the loop
                        echo '<div class="pagination">';
                        echo paginate_links( array(
                            'total' => $insight_query->max_num_pages, // get the total number of pages
                            'current' => $paged, // set the current page number
                            'prev_text' => '&#8592;', // set a left arrow symbol for the "previous" link
                            'next_text' => '&#8594;', // set a right arrow symbol for the "next" link
                        ) );
                        echo '</div>';

                        wp_reset_postdata(); // reset the loop back to the main query
                    ?>
                </div>
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <?php
                        // Check if the sidebar has any widgets
                        if (is_active_sidebar('right-sidebar')) :
                        ?>
                        <aside id="secondary" class="widget-area">
                            <?php dynamic_sidebar('right-sidebar'); ?>
                        </aside><!-- #secondary -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section><!-- .posts-page -->
<?php
} else {
    // If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content', 'none' );
}

get_footer();