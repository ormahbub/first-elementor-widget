<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class MFE_Button_Widget extends Widget_Base {

    public function get_name() {
        return 'mfe_button';
    }

    public function get_title() {
        return __( 'MFE Button', 'mfe' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return [ 'mfe-widgets' ];
    }

    /**
     * =========================
     * REGISTER CONTROLS
     * =========================
     */
    protected function register_controls() {

        /* ---------- CONTENT TAB ---------- */
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Button', 'mfe' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'   => __( 'Text', 'mfe' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'Click Me', 'mfe' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label'       => __( 'Link', 'mfe' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com', 'mfe' ),
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        /* ---------- STYLE TAB ---------- */
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'mfe' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label'     => __( 'Text Color', 'mfe' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mfe-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'mfe' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mfe-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color_hover',
            [
                'label'     => __( 'Hover Background Color', 'mfe' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mfe-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * =========================
     * RENDER OUTPUT
     * =========================
     */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute(
            'button',
            'class',
            'mfe-button'
        );

        if ( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute(
                'button',
                'href',
                esc_url( $settings['button_link']['url'] )
            );
        }

        echo '<a ' . $this->get_render_attribute_string( 'button' ) . '>';
        echo esc_html( $settings['button_text'] );
        echo '</a>';
    }
}
