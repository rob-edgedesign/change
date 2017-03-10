<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <main id="main">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edge_starter
 */
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>;   charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, minimum-scale=1,   maximum-scale=1, user-scalable=no" />
  <link rel="icon" type="image/png" href="<?php echo site_url(); ?>/favicon.ico"/>

  <title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog   Archive <?php } ?> <?php wp_title(); ?></title>
  
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name')  ; ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<!-- HEADER START -->
<header class="header">
   <div class="header-block clearfix">

   </div> 
</header>

<main id="main">