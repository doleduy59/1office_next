<?php
if (! isset($menu_name) || ! isset($menu_href)) {
    return;
}
// mặc định
$menu_title       = isset($menu_title) ? $menu_title : '';
$menu_class       = isset($menu_class) ? $menu_class : '';
$menu_description = isset($menu_description) ? $menu_description : '';
?>

<a href="<?php echo esc_url($menu_href); ?>" class="<?php echo 'sub-menu-link ' . esc_attr($menu_class); ?>">

    <div class="sub-menu-content">
        <span class="sub-menu-content__title"><?php echo esc_html($menu_name); ?></span>

        <?php if (! empty($menu_description)) : ?>
            <span class="sub-menu-content__description">
                <?php echo esc_html($menu_description); ?>
            </span>
        <?php endif; ?>
    </div>

    <span class="sub-menu-arrow" aria-hidden="true">
        &gt;
    </span>
</a>