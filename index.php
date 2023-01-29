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
get_header();

echo 'index.php Page';

if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) :
    ?>
	<header class="page-header">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
    <?php
endif;

if ( have_posts() ) { ?>

    <section id="posts-page" class="default-posts">
        <div class="container">
            <div class="row">
                <div class="content-side col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <?php
                        /* Start the Loop */
                        while ( have_posts() ) {
                            echo 'the post start';
                            the_post();
                            /*
                            * Include the Post-Type-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                            */
                            get_template_part( 'template-parts/content/content' );
                        }
                    ?>
                </div>
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <h3>Sidebar</h3>
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