<?php

// Theme version used for cache-busting. Bump this when you release new CSS/JS: e.g. '1.0.0' -> '1.1.0'
if (! defined('THEME_VERSION')) {
    define('THEME_VERSION', '1.0.0');
}

add_action('after_setup_theme', function () {
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

add_action('wp_enqueue_scripts', function () {
    $ver = '1.0';
    wp_enqueue_style('theme-main-style', get_stylesheet_uri(), array(), $ver);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '5.3.8');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '5.3.8', true);
    wp_enqueue_script('theme-menu-open', get_stylesheet_directory_uri() . '/assets/scripts/menu-open.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('oneofficenext-header', get_template_directory_uri() . '/assets/scripts/addChervon.js', array(), '1.0', true);
});



//code tham khảo
class Custom_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @see Walker_Nav_Menu::start_el()
     */
    // Trong functions.php, bên trong class Custom_Nav_Walker
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        if ($depth > 0) {

            // ... (Logic Chuẩn bị dữ liệu và Include component sub_menu_btn.php) ...
            $menu_name = apply_filters('the_title', $item->title, $item->ID);
            $menu_href = $item->url;
            $menu_title = $item->attr_title;

            // Lọc classes
            $custom_classes = array_filter($item->classes, function ($class) {
                return ! in_array($class, ['menu-item', 'menu-item-type-custom', 'menu-item-object-custom', 'menu-item-has-children', 'current-menu-item', 'current_page_item']);
            });
            $menu_class = implode(' ', $custom_classes);
            $menu_description = $item->description;

            // 2. Bắt đầu bộ đệm đầu ra (Output Buffer)
            ob_start();

            // 3. Include component
            $component_path = get_template_directory() . '/template_parts/sub_menu_btn.php';

            if (file_exists($component_path)) {
                include($component_path);
            }

            // 4. Lấy nội dung buffer và thêm vào $output
            $button_html = ob_get_clean();
            $li_classes = implode(' ', $item->classes);

            // Dòng 91 (hoặc tương đương) sau khi thêm $indent
            $output .= $indent . '<li class="' . esc_attr($li_classes) . '">' . $button_html;
        } else {
            // ... (xử lý menu cha, nếu cần dùng $indent ở đây cũng phải thêm) ...

            // Nếu bạn cần xử lý menu cha, bạn sẽ cần code đầy đủ của start_el cho menu cha
            // Dưới đây là phần xử lý Menu Cha cơ bản (như trong Walker gốc)
            $attributes = '';
            $atts = array(
                'title'  => ! empty($item->attr_title) ? $item->attr_title : '',
                'target' => ! empty($item->target)     ? $item->target     : '',
                'rel'    => ! empty($item->xfn)        ? $item->xfn        : '',
                'href'   => ! empty($item->url)        ? $item->url        : '',
            );

            foreach ($atts as $attr => $value) {
                if (! empty($value)) {
                    $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $li_classes = implode(' ', $item->classes);

            $output .= $indent . '<li class="' . esc_attr($li_classes) . '">' . $item_output;
        }
    }
}
/*
//hiện desc bằng thẻ <i> menu trong 1 div bên dưới
class My_Description_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target) ? $item->target : '';
        $atts['rel']    = ! empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = ! empty($item->url) ? $item->url : '';

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (! empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $output .= '<a' . $attributes . '><span class="menu-item-title">' . $title . '</span></a>';

        $desc = trim($item->description);
        if ($desc) {
            $output .= '<div class="menu-item-desc-wrap"><span class="menu-item-desc">' . esc_html($desc) . '</span></div>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }
}
    */