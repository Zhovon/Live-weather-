<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class Elementor_Live_Weather_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'elw_live_weather';
    }

    public function get_title() {
        return esc_html__( 'Live Weather', 'elw-weather' );
    }

    public function get_icon() {
        return 'eicon-weather';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {

        // ================= CONTENT =================
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Weather Settings', 'elw-weather' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'api_key',
            [
                'label' => esc_html__( 'OpenWeatherMap API Key', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'password',
                'default' => '',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'city_name',
            [
                'label' => esc_html__( 'City Name', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Dhaka',
            ]
        );

        $this->end_controls_section();

        // ================= CARD =================
        $this->start_controls_section(
            'section_style_card',
            [
                'label' => esc_html__( 'Card Container', 'elw-weather' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'card_background',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .elw-weather-card',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'selector' => '{{WRAPPER}} .elw-weather-card',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .elw-weather-card',
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__( 'Padding', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .elw-weather-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_align',
            [
                'label' => esc_html__( 'Alignment', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'elw-weather' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'elw-weather' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'elw-weather' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .elw-weather-card' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .elw-temp-wrap' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ================= TYPOGRAPHY =================
        $this->start_controls_section(
            'section_style_typography',
            [
                'label' => esc_html__( 'Typography & Colors', 'elw-weather' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // City 
        
        $this->add_control(
            'heading_city',
            [
                'label' => esc_html__( 'City Name', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'city_color',
            [
                'label' => esc_html__( 'Color', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elw-city-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'city_typography',
                'selector' => '{{WRAPPER}} .elw-city-name',
            ]
        );

        // Temperature
        $this->add_control(
            'heading_temp',
            [
                'label' => esc_html__( 'Temperature', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'temp_color',
            [
                'label' => esc_html__( 'Color', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elw-temp' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'temp_typography',
                'selector' => '{{WRAPPER}} .elw-temp',
            ]
        );

        // Description
        $this->add_control(
            'heading_desc',
            [
                'label' => esc_html__( 'Description', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Color', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elw-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'selector' => '{{WRAPPER}} .elw-desc',
            ]
        );

        $this->end_controls_section();

        // ================= ICON =================
        $this->start_controls_section(
            'section_style_icon',
            [
                'label' => esc_html__( 'Icon', 'elw-weather' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__( 'Size', 'elw-weather' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elw-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $city = !empty($settings['city_name']) ? esc_attr($settings['city_name']) : 'Dhaka';
        $api_key = !empty($settings['api_key']) ? esc_attr($settings['api_key']) : '';

        ?>
        <div class="elw-weather-card" 
             data-city="<?php echo $city; ?>" 
             data-key="<?php echo $api_key; ?>">
            
            <div class="elw-loader">Loading...</div>
            
            <div class="elw-content" style="display: none;">
                <h3 class="elw-city-name"></h3>
                <div class="elw-temp-wrap">
                    <img class="elw-icon" src="" alt="Weather Icon">
                    <span class="elw-temp"></span>
                </div>
                <p class="elw-desc"></p>
            </div>

            <div class="elw-error" style="display: none;"></div>
        </div>
        <?php
    }
}
