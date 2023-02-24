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
    <!-- favicon -->
    <?php include_once('inc/int/read-scss.php'); ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . '/assets/images/favicon/apple-touch-icon.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . '/assets/images/favicon/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . '/assets/images/favicon/favicon-16x16.png' ?>">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- ./favicon -->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php
      if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
      } else {
        do_action( 'wp_body_open' );
      } 
    ?>
    <div id="cursor"></div>
    <div id="circle"></div>
    <div id="main-wrapper" class="site">
      <!-- header -->
      <header id="site-header" class="page-header static">
          <?php get_template_part('template-parts/header/header', 'static'); ?>
      </header>
      <!-- ./header -->
      <div id="main-content" class="site-content">
        <main id="main" class="site-main">