<?php

/*
 * Replaces function definition in library > navigation.php
 *
 *   - Removed <ul> to be able to add an <li> element with website logo and name
 */

function foundationpress_top_bar_l() {
    wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'container_class' => '',                        // Class of container
        'menu' => '',                                   // Menu name
        'menu_class' => 'top-bar-menu left',            // Adding custom nav class
        'theme_location' => 'top-bar-l',                // Where it's located in the theme
        'before' => '',                                 // Before each link <a>
        'after' => '',                                  // After each link </a>
        'link_before' => '',                            // Before each link text
        'link_after' => '',                             // After each link text
        'items_wrap' => '%3$s',                         // ul tag moved to top-bar.php
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Foundationpress_Top_Bar_Walker(),
    ));
}

/*
 * Replaces function definition in library > widget-areas.php
 *
 *   - Add second widget area, for different widgets in left and right sidebar
 *   - Set widths for footer widgets
 *   - Add class="widget-title" to widget titles, so that we can hide the titles of text widgets
 */

function foundationpress_sidebar_widgets() {
	register_sidebar(array(
	  'id' => 'left-sidebar-widgets',
	  'name' => __( 'Left sidebar widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
	  'after_widget' => '</div></article>',
	  'before_title' => '<h6 class="widget-title">',
	  'after_title' => '</h6>',
	));

	register_sidebar(array(
	  'id' => 'right-sidebar-widgets',
	  'name' => __( 'Right sidebar widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
	  'after_widget' => '</div></article>',
	  'before_title' => '<h6 class="widget-title">',
	  'after_title' => '</h6>',
	));
    
	register_sidebar(array(
	  'id' => 'footer-widgets',
	  'name' => __( 'Footer widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="medium-4 large-2 columns widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h6 class="widget-title">',
	  'after_title' => '</h6>',
	));
}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );

/*
 * Function is_tree, used in Widget Logic plugin, to determine which widgets should be shown on which pages
 * Source: http://codex.wordpress.org/Function_Reference/is_page, code snippet 4
 */

function is_tree( $pid ) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;               // load details about this page

    if ( is_page($pid) )
        return true;            // we're at the page or at a sub page

    $anc = get_post_ancestors( $post->ID );
    foreach ( $anc as $ancestor ) {
        if( is_page() && $ancestor == $pid ) {
            return true;
        }
    }

    return false;  // we aren't at the page, and the page is not an ancestor
}

/*
 * Replaces function definiton in library > entry-meta.php
 *
 * Line above post with date, time and author
 */

function foundationpress_entry_meta() {
	echo '<p class="entry-meta"><time '. get_the_time( 'c' ) .'"> <i class="fa fa-calendar"></i>&nbsp;'. get_the_date() .
        '&nbsp;&nbsp;&nbsp; <i class="fa fa-clock-o"></i>&nbsp;'. get_the_time() .
        '</time>&nbsp;&nbsp;&nbsp; <i class="fa fa-pencil"></i>&nbsp;<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .
        '" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

/* 
 * Search only posts, not pages
 */

function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');

/*
 * RSS Feed with shortcode
 *
 * Shortcode example:
 * <ul class="feed-list">[rss size="10" feed="http://wordpress.org/news/feed/" date="true"]</ul>
 *
 * Total eight parameters; see the shortcode definition below
 *
 * Based on information from:
 *     http://www.kevinleary.net/display-rss-feeds-wordpress-shortcodes
 * and http://snipplr.com/view/50654/
 *
 * The following structure is produced (dependent on shortcode parameters): 
 *  
 *      <li id="item-1" class='feed-item'>
 *          <span class='feed-item-date'>date</span>
 *          <span class='feed-item-author'>author</span>
 *          <span class='feed-item-title'>title</span>
 *          <span class='feed-item-desc'>description</span>
 *      </li>
 *      <li id="item-2" class='feed-item'>
 *          ...
 */

if ( !function_exists('base_rss_feed') ) {
	function base_rss_feed($size = 5, $feed = 'http://wordpress.org/news/feed/', $date = false, 
	$date_format = 'j F Y', $author = false, $title = false, $desc = false, $cache_time = 1800 )
	{
		// Include SimplePie RSS parsing engine
		include_once ABSPATH . WPINC . '/feed.php';

		// Set the cache time for SimplePie
		add_filter( 'wp_feed_cache_transient_lifetime', create_function( '$a', "return $cache_time;" ) );

		// Build the SimplePie object
		$rss = fetch_feed($feed);

		// Check for errors in the RSS XML
		if (!is_wp_error( $rss ) ) {

			// Set a limit for the number of items to parse
			$maxitems = $rss->get_item_quantity($size);
			$rss_items = $rss->get_items(0, $maxitems);

			// Store the total number of items found in the feed
			$i = 0;
			$total_entries = count($rss_items);

			// Output HTML
			foreach ($rss_items as $item) {
				$i++;

				// Store the data we need from the feed
				$author_name = $item->get_author()->get_name();
				$title_text = $item->get_title();
				$link = $item->get_permalink();
				$desc_text = $item->get_description();
				$date_posted = date_i18n($date_format, strtotime(get_date_from_gmt($item->get_date() ) ) );

				// Output
				$html .= "<li id='item-$i' class='feed-item'><a target='_blank' href='$link'>";
				if( $date == true ) $html .= "<span class='feed-item-date'>$date_posted</span>";
				if( $author == true ) $html .= "<span class='feed-item-author'>$author_name</span>";
				if( $title == true ) $html .= "<span class='feed-item-title'>$title_text</span>";
                		if( $desc == true ) $html .= "<span class='feed-item-desc'>$desc_text</span>";
				$html .= "</a></li>";
			}

		} else {

			$html = "Er is een fout opgetreden bij het ophalen van de berichten. Laad de pagina opnieuw en waarschuw de webmaster als de fout blijft.";

		}

		return $html;
	}
}
/*
 * Define the [rss] shortcode
 */
if( function_exists('base_rss_feed') && !function_exists('base_rss_shortcode') ) {
	function base_rss_shortcode($atts) {
		extract(shortcode_atts(array(
			'size' => '10',
			'feed' => 'http://wordpress.org/news/feed/',
			'date' => false,
			'date_format' => 'j F Y',
			'author' => false,
			'title' => false,
			'desc' => false,
			'cache_time' => '1800',
		), $atts));

		$content = base_rss_feed($size, $feed, $date, $date_format, $author, $title, $desc, $cache_time);
		return $content;
	}
	add_shortcode("rss", "base_rss_shortcode");
}

/*
 * Dequeue stylesheets; styling instead in _#bcstar.scss"
 *   - Cookie Notice "front" 
 *   - ...
 */

function df_wp_dequeue_styles() {
	wp_dequeue_style( 'cookie-notice-front' );
}
add_action( 'wp_enqueue_scripts', 'df_wp_dequeue_styles', 100 );

/*
 * Enqueue style.css to allow hot fixes in live site
 * Set $priority = 99 to ensure that style.css is loaded after foundation.css
 */

function hb_wp_enqueue_style_css() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'hb_wp_enqueue_style_css', 99 );

/*
 * Extend TinyMCE valid elements and attributes
 * Source: http://wordpress.stackexchange.com/questions/17240/wordpress-keeps-altering-my-embed-code
 * Syntax: http://www.tinymce.com/wiki.php/Configuration:valid_elements
 */

function mytheme_tinymce_config( $init ) {
	$valid = 'h4[*]';
	if ( isset( $init['extended_valid_elements'] ) ) {
		$init['extended_valid_elements'] .= ',' . $valid;
	} else {
		$init['extended_valid_elements'] = $valid;
	}
	return $init;
}
add_filter('tiny_mce_before_init', 'mytheme_tinymce_config');

?>