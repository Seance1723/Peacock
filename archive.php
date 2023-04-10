<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peacock
 * @subpackage ct-peacock
 * @since Peacock 1.0.0
 */


 get_header();
 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // get the current page number
$args = array(
	'category__not_in' => array( 5, 8 ), // Replace 4 and 6 with the category IDs of service and portfolio respectively
	'monthnum' => $monthnum,
   	'posts_per_page' => 8, // display 5 posts per page
);

$archive_posts_query = new WP_Query( $args );
 
 
get_template_part( 'template-parts/header/header', 'arc' );
 
if ( $archive_posts_query->have_posts() ) { ?>
	<section id="posts-page" class="archive default-posts">
		<div class="container">
			<div class="row">
				
					<?php
						/* Start the Loop */
						while ( $archive_posts_query->have_posts() ) {
							$archive_posts_query->the_post();
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
						echo paginate_links( array(
							'total' => $archive_posts_query->max_num_pages, // get the total number of pages
							'current' => $paged, // set the current page number
							'prev_text' => '&#8592;', // set a left arrow symbol for the "previous" link
							'next_text' => '&#8594;', // set a right arrow symbol for the "next" link
						) );
						echo '</div>';
 
						wp_reset_postdata(); // reset the loop back to the main query
					?>
			</div>
		</div>
	</section><!-- .posts-page -->
<?php
} else {
	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content', 'none' );
}
 
get_footer();
