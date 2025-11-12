<?php

// Theme version used for cache-busting. Bump this when you release new CSS/JS: e.g. '1.0.0' -> '1.1.0'
if ( ! defined( 'THEME_VERSION' ) ) {
    define( 'THEME_VERSION', '1.0.0' );
}

add_action('after_setup_theme', function() {
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
});
    
add_action('wp_enqueue_scripts', function() {
    $ver = '1.0';
    wp_enqueue_style( 'theme-main-style', get_stylesheet_uri(), array(), $ver );
});

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(),'5.3.8');
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js',array('jquery'), '5.3.8', true );
    wp_enqueue_script( 'theme-menu-open', get_stylesheet_directory_uri() . '/assets/scripts/menu-open.js', array('jquery'), '1.0.0', true );
} );




//hiện desc bằng thẻ <i> menu trong 1 div bên dưới
class My_Description_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth=0, $args=array(), $id=0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = $class_names ? ' class="'. esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
        $atts['href']   = ! empty( $item->url ) ? $item->url : '';

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $output .= '<a'. $attributes .'><span class="menu-item-title">'. $title .'</span></a>';

        $desc = trim( $item->description );
        if ( $desc ) {
            $output .= '<div class="menu-item-desc-wrap"><span class="menu-item-desc">' . esc_html( $desc ) . '</span></div>';
        }
    }

    public function end_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "</li>\n";
    }
}