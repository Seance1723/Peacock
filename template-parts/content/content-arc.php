<?php
/**
 * Template part for displaying arc posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peacock
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="thumbnail">
        <!-- Post thumbnail -->
        <?php
            if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'large' ); // full, large, medium, custom size
            endif;
        ?>
    </div><!-- .thumbnail -->
    <header class="entry-header">
		<?php
            if ( is_singular() ) :
                the_title( '<h5 class="entry-title">', '</h5>' );
            else :
                the_title( '<h5 class="entry-title"><a class="entry-link" href="'.esc_url( get_permalink() ).'">', '</a></h5>' );
            endif;
        ?>
	</header><!-- .entry-header -->
    <div class="post-details">
        <ul>
            <li><span>ON </span><span><?php the_time( 'j M' ); ?></span></li>
            <li>|</li>
            <li>BY CODETRAIT</li>
            <li>|</li>
            <li>
                <ul class="post-categories">
                    <?php 
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                        $output = '';
                        foreach( $categories as $category ) {
                            $category_link = get_category_link( $category->term_id );
                            $output .= '<li><a href="' . esc_url( $category_link ) . '">' . esc_html( $category->name ) . '</a></li>';
                        }
                        echo trim( $output, ',' );
                        }
                    ?>
                </ul>
            </li>
            <li>|</li>
            <li>
                <?php 
                    $post_time = get_the_time('U');
                    $current_time = current_time('U');
                    echo human_time_diff( $post_time, $current_time ) . ' ago';
                ?>
            </li>
        </ul>
    </div>
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