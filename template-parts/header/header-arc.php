<?php
/**
 * Template part for displaying page header except Arc page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peacock
 */

 ?>



<header id="page-header" class="d-block">
    <div id='stars-1'></div>
    <div id='stars-2'></div>
    <div id='stars-3'></div>
    <div id='title'>
        <?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
    </div>                
</header><!-- .page-header -->