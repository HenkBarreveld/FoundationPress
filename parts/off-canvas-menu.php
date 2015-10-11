<?php
/**
 * Template part for off canvas menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="tab-bar">
  <section class="<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>-small">
<?php
// ***********************************
// ***** Mod for BC Star website *****
// ***********************************
// change menu-icon into star-menu-icon
?>
    <a class="<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>-off-canvas-toggle star-menu-icon" href="#"><span></span></a>
  </section>
  <section class="middle tab-bar-section">

    <h1 class="title">
      <?php bloginfo( 'name' ); ?>
    </h1>

  </section>
</nav>

<aside class="<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>-off-canvas-menu" aria-hidden="true">
    <?php foundationpress_mobile_off_canvas( apply_filters('filter_mobile_nav_position', 'mobile_nav_position') ); ?>
</aside>
