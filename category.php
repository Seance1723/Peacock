<?php
/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peacock
 * @subpackage ct-peacock
 * @since Peacock 1.0.0
 */

get_header();

// Get the current category
$category = get_queried_object();

get_template_part( 'template-parts/header/header', 'arc' );
?>

<section id="posts-page" class="category default-posts">
	<div class="container">
		<div class="row">
			<?php
				/* Start the Loop */
				while ( have_posts() ) {
					the_post();
					// display the post content using template tags and functions
					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					echo '<div class="content-side col-6">';
					get_template_part( 'template-parts/content/content', 'arc' );
					echo '</div>';
				}
				// display pagination links after the loop
				echo '<div class="pagination">';
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous', 'peacock' ),
					'next_text'          => __( 'Next', 'peacock' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'peacock' ) . ' </span>',
				) );
				echo '</div>';
			?>
		</div>
	</div>
</section><!-- .category-page -->

<?php
get_footer();
?>
