<?php
if (! isset($menu_name) || ! isset($menu_href)) {
    return;
}
// mặc định
$menu_title = isset($menu_title) ? $menu_title : '';
$menu_class = isset($menu_class) ? $menu_class : '';
$menu_description = isset($menu_description) ? $menu_description : '';
?>

<a href="<?php echo esc_url($menu_href); ?>" class="<?php echo 'sub_menu_link ' . esc_attr($menu_class); ?>">
    <p class="sub_menu_content_name"><?php echo esc_html($menu_name); ?></p>
    <?php if (! empty($menu_description)) : ?>
    <p class="sub_menu_content_description">
        <?php echo esc_html($menu_description); ?>
    </p>
    <?php endif; ?>



    <img class="chevron_right" src="<?php  echo get_template_directory_uri()?> '/assets/images/Chevron_blue_right.svg'"
        alt="">
</a>