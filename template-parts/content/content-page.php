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

<section id="home-slider">
    <div id="peacockCarousel" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <?php
                $i = 0;
                $args = array(
                'post_type' => 'peacock_slider',
                'posts_per_page' => -1
                );
                $query = new WP_Query( $args );
                while ( $query->have_posts() ) : $query->the_post();
            ?>
            <button type="button" data-bs-target="#peacock-slider" data-bs-slide-to="<?php echo $i; ?>" <?php if ( $i == 0 ) { echo 'class="active" aria-current="true"'; } ?> aria-label="Slide <?php echo $i; ?>"></button>
            <?php
                $i++;
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
        <div class="carousel-inner">
            <?php
                $i = 0;
                $args = array(
                'post_type' => 'peacock_slider',
                'posts_per_page' => -1
                );
                $query = new WP_Query( $args );
                while ( $query->have_posts() ) : $query->the_post();
                $peacock_slider_image = get_post_meta( get_the_ID(), 'peacock-slider-image', true );
                $peacock_slider_header = get_post_meta( get_the_ID(), 'peacock-slider-header', true );
            ?>
            <div class="carousel-item <?php if ( $i == 0 ) { echo 'active'; } ?>">
                <img src="<?php echo esc_url( $peacock_slider_image ); ?>" class="d-block w-100" alt="<?php the_title(); ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo esc_html( $peacock_slider_header ); ?></h5>
                    <p>Some representative placeholder content for the <?php echo $i; ?> slide.</p>
                </div>
            </div>
            <?php
                $i++;
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#peacockCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#peacockCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section><!-- .home-slider -->

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
</section><!-- .posts-page -->

<?php echo '--container end--'; ?>