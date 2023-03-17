<?php
/**
 * Template part for displaying post header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peacock
 */

 ?>

<header id="post-header" class="w-100">
	<?php
		if ( has_post_thumbnail( $post->ID ) ) { ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<div class="header-conainer px-5" style="background-image: url('<?php echo $image[0]; ?>')">
				<div class="container">
					<div class="row">
						<div class="col">
							<?php the_title( '<h3 class="entry-title text-white">', '</h3>' ); ?>
						</div>
					</div>
				</div>
				<div class="overlay"></div>
			</div>
			
		<?php } else { ?>
			<div class="header-conainer px-5" style="background-image: url('<?php bloginfo( 'template_directory' ); ?>/assets/images/thumbnail-default.jpg');">
				<div class="container">
					<div class="row">
						<div class="col">
							<?php the_title( '<h3 class="entry-title text-white">', '</h3>' ); ?>
						</div>
					</div>
				</div>
				<div class="overlay"></div>
			</div>
		<?php

		}
	?>
</header><!-- .entry-header -->