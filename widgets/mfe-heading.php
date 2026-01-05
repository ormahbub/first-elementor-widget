<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class MFE_Heading extends Widget_Base {

    /**
     * Widget unique name
     */
    public function get_name() {
        return 'mfe_heading';
    }

    /**
     * Widget title (shown in Elementor panel)
     */
    public function get_title() {
        return __( 'MFE Heading', 'mfe' );
    }

    /**
     * Widget icon
     */
    public function get_icon() {
        return 'eicon-editor-h2';
    }

    /**
     * Widget category
     */
    public function get_categories() {
        return [ 'mfe-widgets' ];
    }

    /**
     * Register widget controls (settings)
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'mfe' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text',
            [
                'label'       => __( 'Text', 'mfe' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Hello Elementor!', 'mfe' ),
                'placeholder' => __( 'Type your text here', 'mfe' ),
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Frontend output
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        echo '<h2 class="mfe-heading">' . esc_html( $settings['text'] ) . '</h2>';
    }
}
