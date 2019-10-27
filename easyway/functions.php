<?php
/**
 * eazyway  functions and definitions
 *
 * @package eazyway
 */

function eazyway_scripts() {

    wp_enqueue_style( 'eazyway-style', get_stylesheet_uri() );

    wp_enqueue_style( 'eazyway-style-css', get_template_directory_uri() . '/css/main.css', array(), '1.0');

    wp_enqueue_style( 'eazyway-icons', get_template_directory_uri() . '/css/material-design-iconic-font.css', array(), '1.0');

    wp_enqueue_script( 'eazyway-scripts', get_template_directory_uri() . '/js/bundle.js', array(), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'eazyway_scripts' );

add_theme_support( 'post-thumbnails' );

function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

add_action('after_setup_theme', function(){
    register_nav_menus( array(
        'header_menu' => 'Меню в шапке'
    ) );
});


## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
    return preg_replace('~^[^:]+: ~', '', $title );
});


?>