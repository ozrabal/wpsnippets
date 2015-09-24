<?php

//remove admin menu pages
function pwp_admin_menu_page_remove() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'pwp_admin_menu_page_remove' );

//disable emoji
function pwp_disable_wp_emoji() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  add_filter( 'tiny_mce_plugins', 'pwp_disable_emoji_tinymce' );
}
function pwp_disable_emoji_tinymce( $plugins ) {
  if( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
add_action( 'init', 'pwp_disable_wp_emoji' );