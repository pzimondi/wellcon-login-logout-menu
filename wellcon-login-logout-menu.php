<?php
/**
 * Plugin Name: WellCON Login/Logout Menu
 * Description: Shows "Log In" or "Log Out" for the #loginpress-loginlogout# menu item.
 */
add_filter( 'wp_nav_menu_objects', function ( $items ) {
    foreach ( $items as $item ) {
        if ( strpos( $item->url, '#loginpress-loginlogout#' ) === false ) {
            continue;
        }
        if ( is_user_logged_in() ) {
            $item->title = 'Log Out';
            $item->url   = wp_logout_url( home_url( '/' ) );
        } else {
            $item->title = 'Log In';
            $item->url   = wp_login_url();
        }
    }
    return $items;
} );
