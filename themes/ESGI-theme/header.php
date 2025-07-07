<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= get_bloginfo('name') ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="header-content">
            <div class="header-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/src/images/svg/logo.svg" alt="Logo ESGI">
            </div>

            <div class="mobile-menu-toggle">
                <img src="<?php echo get_template_directory_uri(); ?>/src/images/svg/menu.svg" alt="Menu" id="menu-toggle">
            </div>

            <!-- Menu déroulant -->
            <div class="dropdown-menu" id="dropdown-menu">
                <div class="dropdown-menu-content">
                    <div class="dropdown-menu-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/images/svg/logo-white.svg" alt="Logo ESGI"
                            onerror="this.src='<?php echo get_template_directory_uri(); ?>/src/images/svg/logo.svg';">

                        <img src="<?php echo get_template_directory_uri(); ?>/src/images/svg/close.svg" alt="Fermer" id="menu-close">
                    </div>
                    <div class="dropdown-menu-search">
                        <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                            <input type="search" name="s" placeholder="Or try Search" value="<?php echo get_search_query(); ?>" />
                        </form>
                    </div>
                    <?php
                    if (has_nav_menu('mobile_menu')) {
                        wp_nav_menu([
                            'theme_location' => 'mobile_menu',
                            'container' => false,
                            'menu_class' => 'dropdown-nav-list',
                            'fallback_cb' => 'esgi_fallback_mobile_menu',
                        ]);
                    } else {
                        // Menu de fallback si aucun menu n'est défini
                        esgi_fallback_mobile_menu();
                    }
                    ?>
                </div>
            </div>


        </div>
    </header>