<?php
/**
 * The template for displaying all single posts
 *
 * @link https://codetrait.com/Peacock
 *
 * @package Peacock
 * @subpackage ct-peacock
 * @since Peacock 1.0.0
 */

get_header();

//echo ('SINGLE');
if ( have_posts() ) { ?>

    <?php get_template_part( 'template-parts/header/header', 'posts' ); ?>
    

    <section id="posts-page" class="default-posts">
        <div class="container">
            <div class="row">
            
                <div class="content-side col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <?php
                        /* Start the Loop */
                        while ( have_posts() ) {

                            the_post();
                            
                            // Include the single post content template.
                            get_template_part( 'template-parts/content/content', 'single' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        }
                    ?>
                </div>
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <?php
                        // Check if the sidebar has any widgets
                        if (is_active_sidebar('left-sidebar')) :
                        ?>
                        <aside id="secondary" class="widget-area">
                            <?php dynamic_sidebar('left-sidebar'); ?>
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