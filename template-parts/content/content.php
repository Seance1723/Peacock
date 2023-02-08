<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peacock
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
		<?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title if">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title else"><a class="entry-link" href="'.esc_url( get_permalink() ).'">', '</a></h2>' );
            endif;
        ?>
	</header><!-- .entry-header -->

    <!-- Post thumbnail -->
    <?php
        if ( has_post_thumbnail() ) :
            the_post_thumbnail( 'large' ); // full, large, medium, custom size
        endif;
    ?>
    <!-- Post Content -->
    <?php if ( is_home() || is_page() ) : ?>
        <div class="entry-content">
            <?php echo wp_trim_words( get_the_content(), 50 ); ?>
        </div>
    <?php elseif( is_single() ) : ?>
        <div class="entry-content">
            <?php
                the_content( sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'peacock' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                        get_the_title()
                    ) );

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'peacock' ),
                        'after'  => '</div>',
                    ) );
            ?>
        </div>
    <?php endif; ?>
</article><!-- .article -->