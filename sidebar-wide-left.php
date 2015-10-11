<!-- *************************************
     ***** Added for BC Star website *****
     *************************************
     Based on (adapted) sidebar-left
       - Different classes for aside
-->
<aside id="sidebar" class="small-12 medium-4 medium-pull-8 columns">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'left-sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>
