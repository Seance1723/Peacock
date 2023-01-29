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
?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>

<?php
    if ( have_posts() ) {
    
        //Load post loop
        while ( have_posts() ) {
            the_post();
    
            get_template_part( 'template-parts/content/content' );
        }
    } else {
        // If no content, include the "No posts found" template.
	    get_template_part( 'template-parts/content/content', 'none' );
    }

get_footer();