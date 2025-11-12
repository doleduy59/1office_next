<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head() ?>
</head>

<body>
    <header>
        <div class="start">
            <img src=<?php echo get_template_directory_uri() . "/assets/images/Logo1office.svg" ?> alt="">
        </div>
        <div class="center">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'navbar_desktop',
                'container' => 'nav',
                'container_class' => 'main-nav',
                'menu_class' => 'nav-menu',
                'fallback_cb' => false,
            ));
            ?>

        </div>
        <div class="end">
            <button id="search_btn">
                <img src=<?php echo get_template_directory_uri() . "/assets/images/LogoSearch.svg" ?> alt="">
            </button>
            <button id="language_btn">
                <img src=<?php echo get_template_directory_uri() . "/assets/images/LogoLanguage.svg" ?> alt="">
                <p>VIE</p>
            </button>
            <button id="register_btn">Đăng Ký</button>
        </div>
    </header>