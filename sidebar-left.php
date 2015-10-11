<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>

<!-- ***** Mod for BC Star website *****
       - Different classes for aside
       - Call dynamic_sidebar with left-sidebar-widgets instead of sidebar-widgets
-->

<aside id="sidebar" class="small-12 medium-6 medium-pull-3 large-3 large-pull-9 columns">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'left-sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>
