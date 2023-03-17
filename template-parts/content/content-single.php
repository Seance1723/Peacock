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

    <div class="post-metas">
        <div class="post-date d-inline-block">
            <?php
                // Get the post date in the site's timezone
                $post_date = get_the_date();

                // Format the date using date_i18n()
                $formatted_date = date_i18n( 'F j, Y', strtotime( $post_date ) );
            ?>

            <span><?php echo esc_html( $formatted_date ); ?></span>
        </div>
        <ul class="post-categories  d-inline-block">
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
    </div>
    <!-- <ul class="posts-info">
        <li class="author">
            Posted by <?php //the_author(); ?>
        </li>
        <li> / </li>
        <li class="time">
            <?php 
                //$post_time = get_the_time('U');
                //$current_time = current_time('U');
                //echo human_time_diff( $post_time, $current_time ) . ' ago';
            ?>
        </li>
    </ul> -->
    <div class="post-title">
        <h3 class="entry-title">
            <?php the_title(); ?>
        </h3>
    </div>
    <div class="post-inner">
        <div class="post-content">
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

<section class="posts-link container-fluid">
    <div class="row nav-links">
        <div class="col-6">
            <div class="nav-previous text-start">
                <?php
                    $prev_post = get_previous_post();
                    if (!empty($prev_post)):
                ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                        <p>Previous Post:</p>
                        <h6><?php echo esc_html($prev_post->post_title); ?></h6>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-6">
            <div class="nav-next text-end">
                <?php
                    $next_post = get_next_post();
                    if (!empty($next_post)):
                ?>
                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                    <p>Next Post:</p>
                    <h6><?php echo esc_html($next_post->post_title); ?></h6>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- .nav-links -->
</section>
