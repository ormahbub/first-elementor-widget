<?php
/**
 * Plugin Name: My First Elementor Widget
 * Description: A very basic Elementor widget for learning.
 * Version: 1.0.0
 * Text Domain: mfe
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
    add_action( 'elementor/elements/categories_registered', 'mfe_register_categories' );
}
add_action( 'plugins_loaded', 'mfe_widget_init' );

/**
 * Register the widget
 */

function mfe_register_categories( $elements_manager ) {
    $elements_manager->add_category(
        "mfe-widgets",
        [
            "title" => esc_html__( "MFE Widgets", "mfe" ),
            "icon" => "fa fa-plug",
        ]
        );
}
function mfe_register_widget( $widgets_manager ) {

    require_once __DIR__ . '/widgets/mfe-heading.php';
    require_once __DIR__ . '/widgets/button-widget.php';

    $widgets_manager->register( new \MFE_Heading() );
    $widgets_manager->register( new \MFE_Button_Widget() );
}

