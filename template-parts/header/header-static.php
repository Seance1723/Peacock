<?php
/**
 * Static site header.
 *
 * @package Peacock
 * 
 */
$menu_class     = \PEACOCK_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'peacock-header-menu' );
$header_menus   = wp_get_nav_menu_items( $header_menu_id );
?>

<?php if ( has_nav_menu( 'peacock-header-menu' ) ) : ?>
  <nav class="navbar navbar-expand-lg" aria-label="<?php esc_attr_e( 'Header Menu', 'peacock' ); ?>">
    <div class="container">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php endif; ?>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if ( ! empty( $header_menus ) && is_array( $header_menus ) ) { ?>
				  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <?php
              foreach ( $header_menus as $menu_item ) {
                if ( ! $menu_item->menu_item_parent ) {

                  $child_menu_items   = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
                  $has_children       = ! empty( $child_menu_items ) && is_array( $child_menu_items );
                  $has_sub_menu_class = ! empty( $has_children ) ? 'has-submenu' : '';
                  $link_target        = ! empty( $menu_item->target ) && '_blank' === $menu_item->target ? '_blank' : '_self';

                  // Note_: Similar to $menu_item->target, there are other keys available in the $menu_item, such as classes. You can more key values if you need.

                  if ( ! $has_children ) {
                    ?>
                    <li class="nav-item">
                      <a 
                        class="nav-link" 
                        href="<?php echo esc_url( $menu_item->url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"
                        title="<?php echo esc_attr( $menu_item->title ); ?>"
                      >
                        <?php echo esc_html( $menu_item->title ); ?>
                      </a>
                    </li>
                  <?php } else { ?>
                    <li class="nav-item dropdown">
                      <a 
                        class="nav-link dropdown-toggle" 
                        href="<?php echo esc_url( $menu_item->url ); ?>"
                        id="navbarDropdown" 
                        role="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false" 
                        target="<?php echo esc_attr( $link_target ); ?>"
                        title="<?php echo esc_attr( $menu_item->title ); ?>"
                      >
                        <?php echo esc_html( $menu_item->title ); ?>
                      </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php
                      foreach ( $child_menu_items as $child_menu_item ) {
                        $link_target = ! empty( $child_menu_item->target ) && '_blank' === $child_menu_item->target ? '_blank' : '_self';
                        ?>
                        <a class="dropdown-item"
                          href="<?php echo esc_url( $child_menu_item->url ); ?>"
                          target="<?php echo esc_attr( $link_target ); ?>"
                          title="<?php echo esc_attr( $child_menu_item->title ); ?>">
                          <?php echo esc_html( $child_menu_item->title ); ?>
                        </a>
                        <?php
                      }
                      ?>
                    </div>
                  </li>
                  <?php
                }
                ?>
                <?php
              }
            }
            ?>
				</ul>
				<?php
        }
        ?>
      </div><!-- .navbar-collapse -->
    </div><!-- .container-fluid -->
  </nav><!-- .navbar -->
<?php endif; ?>