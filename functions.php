<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );

add_action( 'admin_head', 'hide_editor' );

function hide_editor() {
    global $pagenow;
    if( !( 'post.php' == $pagenow ) ) return;

    global $post;
    // Get the Post ID.
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return;  // Hide the editor on the page titled 'Homepage'
	  $homepgname = get_the_title($post_id);
	  if($homepgname == 'Home' || $homepgname == 'Search' || $homepgname == 'FAQ' || $homepgname == 'Benefits' || $homepgname == 'About' || $homepgname == 'Posting' || strpos(strtolower($homepgname), strtolower("Program")) !== false){ 
	    remove_post_type_support('page', 'editor');
	  }
	  // Hide the editor on a page with a specific page template
	  // Get the name of the Page Template file.
	  $template_file = get_post_meta($post_id, '_wp_page_template', true);
	  if($template_file == 'program.php'){ // the filename of the page template
	    remove_post_type_support('page', 'editor');
	  }
}