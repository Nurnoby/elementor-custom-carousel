<?php
/*
Plugin Name: Elementor Custom Carousel
Description: A custom Elementor widget for creating a carousel.
Version: 1.0
Author: Md Nur Nobi
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include the widget file
function ecc_include_widget_file() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/custom-carousel-widget.php';
}
add_action( 'elementor/widgets/widgets_registered', 'ecc_include_widget_file' );

function ecc_enqueue_swiper_assets() {
    wp_enqueue_style( 'swiper-style', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
    wp_enqueue_script( 'swiper-script', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), null, true );
    wp_enqueue_style( 'custom-carousel-style', plugins_url( 'css/custom-carousel-style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'ecc_enqueue_swiper_assets' );
// Register widget with Elementor
function ecc_register_custom_widget( $widgets_manager ) {
    require_once plugin_dir_path( __FILE__ ) . 'includes/custom-carousel-widget.php';
    $widgets_manager->register_widget_type( new \Elementor_Custom_Carousel_Widget() );
}
add_action( 'elementor/widgets/widgets_registered', 'ecc_register_custom_widget' );
