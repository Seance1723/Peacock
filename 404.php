<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Peacock
 * @subpackage ct-peacock
 * @since Peacock 1.0.0
 */

get_header();
?>

<div id="primary" class="error-404 content-area">
    <main id="main" class="site-main container">
        <div class="row">
            <div class="col-7">
                <div class="page-image">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/404.svg'; ?>" alt="404 error image">
                </div>
            </div>
            <div class="col-5">
                <div class="error not-found">
                    <header class="page-header">
                        <h3 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'peacock' ); ?></h3>
                    </header><!-- .page-header -->

                    <div class="page-content mt-3">
                        <h6><?php _e( "Click here to explore our secret underground tunnels and see where they lead. Happy wandering!", 'peacock' ); ?></h6>
                        <p class="mt-3"><a class="cta cta-primary">Go back!</a></p>
                    </div><!-- .page-content -->
                </div><!-- .error-404 -->
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
