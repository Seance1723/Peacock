<?php
/*
 * Template Name: Website Performance Report
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>

					<form action="#" method="post" id="performance-form">
						<label for="url-input">Enter a URL to test:</label>
						<input type="url" name="url-input" id="url-input" required>
						<button type="submit">Test URL</button>
					</form>

					<div id="performance-results"></div>

				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
