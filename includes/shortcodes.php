<?php

/**
 * Button Shortcode
 *
 * @param array $atts
 * @param string $content
 * @return void
 */

function barebones_button_shortcode( $atts, $content = null ) {
    $atts['class'] = isset($atts['class']) ? $atts['class'] : 'btn';
    $atts['target'] = isset($atts['target']) ? $atts['target'] : '_self';
    return '<a class="' . esc_attr( $atts['class'] ) . '" href="' . esc_url( $atts['link'] ) . '" target="' . esc_attr( $atts['target'] ) . '">' . esc_html( $content ) . '</a>';
}

add_shortcode('button', 'barebones_button_shortcode');
