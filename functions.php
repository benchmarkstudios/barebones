<?php

/**
 * Custom functions / External files
 */

require_once 'functions/example.php';



/**
 * Add support for useful stuff
 */

if (function_exists('add_theme_support')) {
    // Add support for document title tag
    add_theme_support('title-tag');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    // add_image_size( 'custom-size', 700, 200, true );

    // Add Support for post formats
    // add_theme_support( 'post-formats', ['post'] );
    // add_post_type_support( 'page', 'excerpt' );

    // Localisation Support
    load_theme_textdomain('barebones', get_template_directory() . '/languages');
}



/**
 * Remove junk
 */

define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function barebones_remove_comments_rss($for_comments)
{
    return;
}

add_filter('post_comments_feed_link', 'barebones_remove_comments_rss');



/**
 * jQuery the right way
 */

function barebones_scripts()
{
    /*
     * For IE8 to play nice, you'll need to include your CSS here, for example:
     */
    // wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Font+Family' );
    // wp_enqueue_style( 'icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/script.min.js?' . getPackageHash(), ['jquery'], null, true);
}

add_action('wp_enqueue_scripts', 'barebones_scripts');



/**
 * Nav menus
 */

if (function_exists('register_nav_menus')) {
    register_nav_menus([
        'header' => 'Header',
        'footer' => 'Footer'
    ]);
}

function barebones_nav_menu_args($args = '')
{
    $args['container']       = false;
    $args['container_class'] = false;
    $args['menu_id']         = false;
    $args['items_wrap']      = '<ul class="%2$s">%3$s</ul>';

    return $args;
}

add_filter('wp_nav_menu_args', 'barebones_nav_menu_args');



/**
 * Email
 */

function barebones_mail_from($email)
{
    return get_option('admin_email');
}

add_filter('wp_mail_from', 'barebones_mail_from');


function barebones_mail_from_name($name)
{
    return get_bloginfo('name');
}

add_filter('wp_mail_from_name', 'barebones_mail_from_name');



/**
 * Shortcodes ([button] shortcode included)
 */

function button_shortcode($atts, $content = null)
{
    $atts['class']  = isset($atts['class']) ? $atts['class'] : 'btn';

    return '<a class="' . $atts['class'] . '" href="' . $atts['link'] . '">' . $content . '</a>';
}

add_shortcode('button', 'button_shortcode');



/**
 * TinyMCE
 */

function barebones_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    $buttons[] = 'hr';

    return $buttons;
}

add_filter('mce_buttons_2', 'barebones_mce_buttons_2');


function barebones_tiny_mce_before_init($settings)
{
    $style_formats = [
        // [
        //     'title'    => '',
        //     'selector' => '',
        //     'classes'  => ''
        // ]
    ];

    $settings['style_formats'] = json_encode($style_formats);
    $settings['style_formats_merge'] = true;

    return $settings;
}

add_filter('tiny_mce_before_init', 'barebones_tiny_mce_before_init');

/**
 * Get hash from package.json used for assets url hash
 * @return string
 */
function getPackageHash()
{
  $package = file_get_contents(get_bloginfo( 'stylesheet_directory' ) . "/package.json");
  $packageJson = json_decode($package, true);

  // if there is problem, fallback to time.
  return isset($packageJson['hash']) ? $packageJson['hash'] : time();
}

/**
 * Get post thumbnail url
 * @param   string    $size    Size of the returned image
 * @param   int       $post_id post id
 * @param   boolean   $icon    if no image found, display icon
 */
function get_post_thumbnail_url( $size = 'full', $post_id = false, $icon = false )
{
    if(!$post_id) {
        $post_id = get_the_ID();
    }

    $thumb_url_array = wp_get_attachment_image_src(get_post_thumbnail_id( $post_id ), $size, $icon);
    return $thumb_url_array[0];
}
