<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peacock
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-inner">
        <div class="image">
            <a href="<?php the_permalink(); ?>">
                <?php
                    if ( has_post_thumbnail() ) :
                        the_post_thumbnail( 'large' ); // full, large, medium, custom size
                    endif;
                ?>
            </a>
            <div class="post-date">
                <?php the_time( 'j M' ); ?>
            </div>
        </div><!-- .image -->
        <div class="post-content">
            <ul class="post-categories">
                <?php 
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                    $output = '';
                    foreach( $categories as $category ) {
                        $category_link = get_category_link( $category->term_id );
                        $output .= '<li><a href="' . esc_url( $category_link ) . '">' . esc_html( $category->name ) . '</a></li>/';
                    }
                    echo trim( $output, '/' );
                    }
                ?>
            </ul>
            <h3 class="entry-title">
                <?php the_title(); ?>
            </h3>
            <ul class="posts-info">
                <li class="author">
                    Posted by <?php the_author(); ?>
                </li>
                <li> / </li>
                <li class="time">
                    <?php 
                        $post_time = get_the_time('U');
                        $current_time = current_time('U');
                        echo human_time_diff( $post_time, $current_time ) . ' ago';
                    ?>
                </li>
            </ul>
            <div class="entry-summary">
                <?php the_content(); ?>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'peacock' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div><!-- .entry-summary -->
        </div><!-- .post-content -->
    </div><!-- .post-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
