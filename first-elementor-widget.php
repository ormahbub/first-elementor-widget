<?php
/**
 * Plugin Name: My First Elementor Widget
 * Description: A very basic Elementor widget for learning.
 * Version: 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Check if Elementor is loaded
 */
function mfe_widget_init() {

    // Elementor not active
    if ( ! did_action( 'elementor/loaded' ) ) {
        return;
    }

    // Register widget
    add_action( 'elementor/widgets/register', 'mfe_register_widget' );
}
add_action( 'plugins_loaded', 'mfe_widget_init' );

/**
 * Register the widget
 */
function mfe_register_widget( $widgets_manager ) {

    require_once __DIR__ . '/widgets/hello-widget.php';

    $widgets_manager->register( new \MFE_Hello_Widget() );
}

