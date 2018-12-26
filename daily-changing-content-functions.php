<?php
/*
 * Plugin Name: Daily changing content
 * Description: Gibt täglich wechselnden Content aus (z.B. Angebot des Tages)
 * Version: 1.0.0
 * Author: Peter R. Stuhlmann
 * Author URI: https://peter-stuhlmann-webentwicklung.de
 */


// Stylesheets and Javascript files

function dailyChangigContent_enqueue_scripts() {
    wp_enqueue_style( 'daily-changig-content-style', plugin_dir_url( __FILE__ ) . '/assets/css/style.css', '20181226' );
 	wp_enqueue_script( 'daily-changig-content-script', plugin_dir_url( __FILE__ ) . '/assets/js/script.js', '20181226' );
}
add_action( 'wp_enqueue_scripts', 'dailyChangigContent_enqueue_scripts' );


// Shortcode also usable in Sidebar

add_filter( 'widget_text', 'do_shortcode' );


// Daily changing content

function dailyChangingContent_output() {
	$a = shortcode_atts( array (
        'prst' => '<script>document.write(DailyChangingContent)</script>',
    ), $atts );
    return  $a['prst'] ;
} 

add_shortcode('dailychangingcontent', 'dailyChangingContent_output');
