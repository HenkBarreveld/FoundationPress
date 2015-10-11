<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!-- ***********************************
     ***** Mod for BC Star website *****
     ***********************************
        - Added div masthead
        - Added id "topbar" and class "sticky" to top-bar-container
        - Replaced foundationpress_top_bar_l()
-->
<div class="masthead show-for-medium-up">
    <div class="row">
        <div class="site-logo medium-3 large-3 columns">
            <img alt="BC Star logo" src="<?php echo get_template_directory_uri() . '/assets/images/star-logo-128.png' ?>">
        </div>
        <div class="site-name medium-9 large-9 columns">
            <a href="http://192.168.178.73/bcstar/">Bridgeclub Star</a>
        </div>
    </div>
</div>
<div id="topbar" class="top-bar-container contain-to-grid sticky">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area top-bar-<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>">
            <li class="name">
                <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
        </ul>
        <section class="top-bar-section">
            <?php // foundationpress_top_bar_l(); ?>
            <ul id="bc-star-menu" class="top-bar-menu left">
                <li class="logo">
                    <img alt="BC Star logo" width="27" height="27" src="<?php echo get_template_directory_uri() . '/assets/images/star-logo-128.png' ?>"> <span><?php bloginfo( 'name' ); ?></span>
                </li>
                <?php foundationpress_top_bar_l(); ?>
            </ul>
            <?php foundationpress_top_bar_r(); ?>
        </section>
    </nav>
</div>