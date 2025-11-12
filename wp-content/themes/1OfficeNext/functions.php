<?php

function theme_setup()
{
    register_nav_menus(array(
        'navbar_desktop' => esc_html__('Menu Header'),
        'footer_desktop'  => esc_html__('Menu Footer'),
    ));

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'theme_setup');

function theme_scripts()
{
    $css_version = filemtime(get_stylesheet_directory() . '/style.css');
    //main stylesheet
    wp_enqueue_style('theme-main-style', get_stylesheet_uri(), array(), $css_version);
    // font
    wp_enqueue_style('inter-tight-font', 'https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;700&display=swap', false);

    // Bootstrap 5
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), '5.3.2', true);
}   
    
   


    
add_action('wp_enqueue_scripts', 'theme_scripts');