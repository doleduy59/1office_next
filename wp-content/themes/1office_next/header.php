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
        <div class="container">
            <div class="row">
                <div class="col-xl-2">
                    <div class="start">
                        <img class="" src=<?php echo get_template_directory_uri() . "/assets/images/Logo1office.svg" ?>
                            alt="">
                    </div>
                </div>
                <div class="col-xl-8">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'navbar_desktop',
                        'container'      => 'nav',
                        'container_class' => 'main-nav',
                        'menu_class'     => 'nav-menu',
                        'walker'         => new Custom_Nav_Walker(),
                    ));
                    ?>


                </div>
                <div class="col-xl-2 d-flex justify-content-end">
                    <div class="end">
                        <button id="search_btn">
                            <img src=<?php echo get_template_directory_uri() . "/assets/images/LogoSearch.svg" ?>
                                alt="">
                        </button>
                        <button id="language_btn">
                            <img class
                                src=<?php echo get_template_directory_uri() . "/assets/images/LogoLanguage.svg" ?>
                                alt="">
                            <p>VIE</p>
                        </button>
                        <button id="register_btn">Đăng Ký</button>
                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part('template_parts/mega_menu') ?>
    </header>