<?php
/**
 * Template part for displaying page (page.php -> content-page.php -> header-page.php)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peacock
 */

 ?>

<section id="posts-page" class="default-posts">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if ( ! is_front_page() ) : ?>
            <?php get_template_part( 'template-parts/header/header', 'page' ); ?>
        <?php elseif ( has_post_thumbnail() ) : ?>
            <header class="entry-header">
                <?php
                    if ( has_post_thumbnail() ) :
                        the_post_thumbnail( 'large' ); // full, large, medium, custom size
                    endif;
                ?>
            </header><!-- .entry-header -->
        <?php endif; ?>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
                    'after'    => '</nav>',
                    /* translators: %: Page number. */
                    'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
                )
            );
            ?>
        </div><!-- .entry-content -->

        <?php if ( get_edit_post_link() ) : ?>
            <footer class="entry-footer default-max-width">
                <?php
                edit_post_link(
                    sprintf(
                        /* translators: %s: Post title. Only visible to screen readers. */
                        esc_html__( 'Edit %s', 'twentytwentyone' ),
                        '<span class="screen-reader-text">' . get_the_title() . '</span>'
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>
    </article><!-- #post-<?php the_ID(); ?> -->
            
</section><!-- .posts-page -->

<?php echo '--container end--'; ?>