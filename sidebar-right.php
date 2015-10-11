<!-- *************************************
     ***** Added for BC Star website *****
     *************************************
     Based on (adapted) sidebar-left
       - Different id for aside, to allow widget styling for "Nieuws" pages in _#bcstar.scss
       - Different classes for aside
       - Call dynamic_sidebar with right-sidebar-widgets
-->
<aside id="sidebar-right" class="small-12 medium-6 medium-pull-3 large-3 large-reset-order columns">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'right-sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>
