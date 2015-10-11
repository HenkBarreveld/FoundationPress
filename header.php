<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ***** Mod for BC Star website ***** -->
    <!-- ***** Adobe Typekit webfonts support ***** -->

    <!-- default embed code to use the kit "BC Star *nieuw*": -- >

        <script src="https://use.typekit.net/tns4cww.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>   
        
    <!-- end default embed code -->

    <!-- default embed code to use the kit "BC Star fonts": -->

        <script src="https://use.typekit.net/lzp2dxp.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>        

    <!-- end default embed code -->

    <!-- advanced embed codes not included -->

		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-precomposed.png">
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>
	
	<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">
	
	<?php do_action( 'foundationpress_layout_start' ); ?>

	<?php get_template_part( 'parts/off-canvas-menu' ); ?>

	<?php get_template_part( 'parts/top-bar' ); ?>

    <!-- ***** Mod for BC Star website ***** -->
    <!-- ***** 'Scroll to top' button ***** -->
<a class="scroll-to-top button"><br/>TOP</a>

<section class="container" role="document">
	<?php do_action( 'foundationpress_after_header' ); ?>
