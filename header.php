<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://codetrait.com/Peacock
 *
 * @package Peacock
 * @subpackage ct-peacock
 * @since Peacock 1.0.0
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <?php wp_title(''); ?>
  </head>
  <body <?php body_class(); ?>>
  <?php
    if (function_exists('wp_body_open')) {
      wp_body_open();
    } 
  ?>
<!-- header -->
<header id="site-header" class="page-header static">
    <?php get_template_part('template-parts/header/header', 'static'); ?>
</header>
<!-- ./header -->
<h1>Header</h1>