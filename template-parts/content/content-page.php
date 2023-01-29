<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peacock
 */
echo 'content-page.php Page';

echo '--container--';
 ?>

<section id="posts-page" class="default-posts">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php if ( ! is_front_page() ) : ?>
                    <header class="entry-header">
                        <?php get_template_part( 'template-parts/header/header', 'page' ); ?>
                        <?php
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail( 'large' ); // full, large, medium, custom size
                            endif;
                        ?>
                    </header><!-- .entry-header -->
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
            </div>
        </div>
    </div>
</section>

<?php echo '--container end--'; ?>