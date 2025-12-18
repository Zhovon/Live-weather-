<?php
/**
 * Plugin Name: Elementor Live Weather
 * Description: A custom Elementor widget to display live weather data by city.
 * Version: 1.0.0
 * Author: Shahadat Hossain Shovon
 * Author URI: https://zhovon.com
 * Text Domain: elw-weather
 * License: GPLv2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

final class Elementor_Live_Weather {

    const VERSION = '1.0.0';

    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    public function init() {
        // Check if Elementor is installed and active
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Register Widget
        add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
        
        // Enqueue Assets
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_styles' ] );
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    public function register_widgets( $widgets_manager ) {
        require_once( __DIR__ . '/widgets/class-weather-widget.php' );
        $widgets_manager->register( new \Elementor_Live_Weather_Widget() );
    }

    public function enqueue_styles() {
        wp_enqueue_style( 'elw-style', plugins_url( '/assets/css/weather-style.css', __FILE__ ), [], self::VERSION );
    }

    public function enqueue_scripts() {
        wp_enqueue_script( 'elw-script', plugins_url( '/assets/js/weather-script.js', __FILE__ ), [ 'jquery' ], self::VERSION, true );
    }

    public function admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elw-weather' ),
            '<strong>' . esc_html__( 'Elementor Live Weather', 'elw-weather' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elw-weather' ) . '</strong>'
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
}

Elementor_Live_Weather::instance();