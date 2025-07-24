<?php




// TOUTE LA LOGIQUE DU THEME //

// Enregistrer les emplacements de menu
add_action('after_setup_theme', 'esgi_register_nav_menu', 0);
function esgi_register_nav_menu()
{
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'ESGI'),
        'footer_menu'  => __('Footer Menu', 'ESGI'),
        'post_footer_menu' => __('Post Footer Menu', 'ESGI'),
        'mobile_menu' => __('Mobile Dropdown Menu', 'ESGI'), // Nouveau menu pour le dropdown
    ));
}

add_action('wp_enqueue_scripts', 'esgi_enqueue_assets', 10);
function esgi_enqueue_assets()
{
    // Google Fonts - Mulish
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), null);

    // CSS principal du thème
    wp_enqueue_style('main', get_stylesheet_uri());

    // JavaScript pour le menu mobile
    wp_enqueue_script('esgi-menu', get_template_directory_uri() . '/js/menu.js', array(), '1.0.0', true);
}

add_action('after_setup_theme', 'esgi_add_theme_support', 0);
function esgi_add_theme_support()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

// Ajout d'un filtre sur les titres
//add_filter('the_title', 'esgi_custom_title', 10, 1);
function esgi_custom_title($title)
{
    return strtoupper($title);
}

// Fonction helper pour l'affichage des svg

function esgi_getIcon($name)
{
    $markups = [
        'twitter' => '<svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18 1.6875C17.325 2.025 16.65 2.1375 15.8625 2.25C16.65 1.8 17.2125 1.125 17.4375 0.225C16.7625 0.675 15.975 0.9 15.075 1.125C14.4 0.45 13.3875 0 12.375 0C10.4625 0 8.775 1.6875 8.775 3.7125C8.775 4.05 8.775 4.275 8.8875 4.5C5.85 4.3875 3.0375 2.925 1.2375 0.675C0.9 1.2375 0.7875 1.8 0.7875 2.5875C0.7875 3.825 1.4625 4.95 2.475 5.625C1.9125 5.625 1.35 5.4 0.7875 5.175C0.7875 6.975 2.025 8.4375 3.7125 8.775C3.375 8.8875 3.0375 8.8875 2.7 8.8875C2.475 8.8875 2.25 8.8875 2.025 8.775C2.475 10.2375 3.825 11.3625 5.5125 11.3625C4.275 12.375 2.7 12.9375 0.9 12.9375C0.5625 12.9375 0.3375 12.9375 0 12.9375C1.6875 13.95 3.6 14.625 5.625 14.625C12.375 14.625 16.0875 9 16.0875 4.1625C16.0875 4.05 16.0875 3.825 16.0875 3.7125C16.875 3.15 17.55 2.475 18 1.6875Z" fill="#1A1A1A"/>
</svg>',
        'facebook' => '<svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.4008 18L3.375 10.125H0V6.75H3.375V4.5C3.375 1.4634 5.25545 0 7.9643 0C9.26187 0 10.3771 0.0966038 10.7021 0.139781V3.3132L8.82333 3.31406C7.35011 3.31406 7.06485 4.01411 7.06485 5.04139V6.75H11.25L10.125 10.125H7.06484V18H3.4008Z" fill="#1A1A1A"/>
</svg>',
        'google' => '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path id="Vector" d="M9.12143 7.71429V10.8H14.3929C14.1357 12.0857 12.85 14.6571 9.25 14.6571C6.16429 14.6571 3.72143 12.0857 3.72143 9C3.72143 5.91429 6.29286 3.34286 9.25 3.34286C11.05 3.34286 12.2071 4.11429 12.85 4.75714L15.2929 2.44286C13.75 0.9 11.6929 0 9.25 0C4.23572 0 0.25 3.98571 0.25 9C0.25 14.0143 4.23572 18 9.25 18C14.3929 18 17.8643 14.4 17.8643 9.25714C17.8643 8.61428 17.8643 8.22857 17.7357 7.71429H9.12143Z" fill="#1A1A1A"/>
</svg>',
        'linkedin' => '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.9698 0H1.64687C1.19966 0 0.864258 0.335404 0.864258 0.782609V17.2174C0.864258 17.5528 1.19966 17.8882 1.64687 17.8882H18.0816C18.5289 17.8882 18.8643 17.5528 18.8643 17.1056V0.782609C18.7525 0.335404 18.4171 0 17.9698 0ZM3.54749 15.205V6.70807H6.23072V15.205H3.54749ZM4.8891 5.59006C3.99469 5.59006 3.32389 4.80745 3.32389 4.02484C3.32389 3.13043 3.99469 2.45963 4.8891 2.45963C5.78351 2.45963 6.45432 3.13043 6.45432 4.02484C6.34252 4.80745 5.67171 5.59006 4.8891 5.59006ZM16.0692 15.205H13.386V11.0683C13.386 10.0621 13.386 8.8323 12.0444 8.8323C10.7028 8.8323 10.4792 9.95031 10.4792 11.0683V15.3168H7.79593V6.70807H10.3674V7.82609C10.7028 7.15528 11.5972 6.48447 12.827 6.48447C15.5102 6.48447 15.9574 8.27329 15.9574 10.5093V15.205H16.0692Z" fill="#1A1A1A"/>
</svg>'
    ];
    return $markups[$name] ?? '';
}



// Parametres custom du thème (via le custom manager de WP)

add_action('customize_register', 'esgi_customize_register');
function esgi_customize_register($wp_customize)
{
    // Ajout d'une section
    $wp_customize->add_section('esgi_param', [
        'title' => __('Réglages ESGI', 'ESGI'),
        'description' => __('Faites-vous plaisir !'),
        'priority' => 1,
        'capability' => 'edit_theme_options',
    ]);

    // Ajout d'un setting
    $wp_customize->add_setting('main_color', [
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => '#3f51b5',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', [
        'label' => __('Couleur principale', 'ESGI'),
        'section' => 'esgi_param',
        'priority' => 1, // Within the section.
    ]));


    // Ajout d'un setting
    $wp_customize->add_setting('dark_mode', [
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => false,
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_bool_value',
    ]);

    // Ajout d'un control
    $wp_customize->add_control(
        'dark_mode',
        [
            'type' => 'checkbox',
            'priority' => 2, // Within the section.
            'section' => 'esgi_param', // Required, core or custom.
            'label' => __('Dark mode', 'ESGI'),
            'description' => __('Black is beautiful :)', 'ESGI'),
        ]
    );


    // Ajout du setting pour la recherche dans le footer
    $wp_customize->add_setting('has_footer_search', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_bool_value'
    ]);

    // Ajout du control
    $wp_customize->add_control('has_footer_search', [
        'type' => 'checkbox',
        'section' => 'esgi_param',
        'label' => __('Afficher la recherche dans le footer', 'ESGI'),
        'description' => __('Cochez pour afficher le formulaire de recherche dans le footer', 'ESGI')
    ]);


    // Réseaux sociaux
    $social_networks = [
        'twitter' => 'Twitter',
        'facebook' => 'Facebook',
        'google' => 'Google',
        'linkedin' => 'LinkedIn'
    ];

    foreach ($social_networks as $key => $label) {
        // Ajout du setting
        $wp_customize->add_setting('url_' . $key, [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ]);

        // Ajout du control
        $wp_customize->add_control('url_' . $key, [
            'type' => 'url',
            'section' => 'esgi_param',
            'label' => sprintf(__('URL %s', 'ESGI'), $label),
            'description' => sprintf(__('Entrez l\'URL de votre page %s', 'ESGI'), $label)
        ]);
    }


    // Ajout du setting pour la recherche dans le footer
    $wp_customize->add_setting('uppercase_title', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_bool_value'
    ]);

    $wp_customize->add_control('uppercase_title', [
        'type' => 'checkbox',
        'section' => 'esgi_param',
        'label' => __('Titres en majuscules', 'ESGI'),
        'description' => __('Afficher tous les titres en majuscules', 'ESGI')
    ]);


    // Customizer pour les sections de la page d'accueil
    // Section Hero
    $wp_customize->add_section('esgi_hero_section', array(
        'title' => __('Hero Section', 'ESGI'),
        'priority' => 30,
    ));

    // Hero - Titre
    $wp_customize->add_setting('esgi_hero_title', array(
        'default' => 'A really professional structure for all your events!',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('esgi_hero_title', array(
        'label' => __('Hero Title', 'ESGI'),
        'section' => 'esgi_hero_section',
        'type' => 'text',
    ));

    // Hero - Image
    $wp_customize->add_setting('esgi_hero_image', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'esgi_hero_image', array(
        'label' => __('Hero Image', 'ESGI'),
        'section' => 'esgi_hero_section',
        'mime_type' => 'image',
        'description' => __('Sélectionnez une image pour la section Hero', 'ESGI'),
    )));


    // Section Services
    $wp_customize->add_section('esgi_services_section', array(
        'title' => __('Services Section', 'ESGI'),
        'priority' => 35,
    ));

    // Services - Titre
    $wp_customize->add_setting('esgi_services_title', array(
        'default' => 'Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_services_title', array(
        'label' => __('Services Title', 'ESGI'),
        'section' => 'esgi_services_section',
        'type' => 'text',
    ));

    // Services - Activer/Désactiver
    $wp_customize->add_setting('esgi_services_enable', array(
        'default' => true,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_services_enable', array(
        'label' => __('Enable Services Section', 'ESGI'),
        'section' => 'esgi_services_section',
        'type' => 'checkbox',
    ));

    // Services - Images
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("esgi_services_image_$i", array(
            'default' => '',
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "esgi_services_image_$i", array(
            'label' => sprintf(__('Service Image %d', 'ESGI'), $i),
            'section' => 'esgi_services_section',
            'mime_type' => 'image',
            'description' => sprintf(__('Sélectionnez l\'image %d pour la section Services', 'ESGI'), $i),
        )));
    }

    // Section About Us
    $wp_customize->add_section('esgi_about_section', array(
        'title' => __('About Us Section', 'ESGI'),
        'priority' => 36,
    ));

    // About Us - Titre
    $wp_customize->add_setting('esgi_about_title', array(
        'default' => 'About Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_about_title', array(
        'label' => __('About Title', 'ESGI'),
        'section' => 'esgi_about_section',
        'type' => 'text',
    ));

    // About Us page - Titre 
    $wp_customize->add_setting('about_page_title', array(
        'default' => 'Sky’s the limit',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_page_title', array(
        'label' => __('About page Title', 'ESGI'),
        'section' => 'esgi_about_section',
        'type' => 'text',
    ));

    // About Us - Contenu
    $wp_customize->add_setting('esgi_about_content', array(
        'default' => 'We are a passionate team dedicated to creating exceptional experiences for our clients. With years of expertise in our field, we strive to deliver innovative solutions that exceed expectations.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('esgi_about_content', array(
        'label' => __('About Content', 'ESGI'),
        'section' => 'esgi_about_section',
        'type' => 'textarea',
        'description' => __('Décrivez votre entreprise ou votre équipe', 'ESGI'),
    ));

    // About Us - Image
    $wp_customize->add_setting('esgi_about_image', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'esgi_about_image', array(
        'label' => __('About Us Image', 'ESGI'),
        'section' => 'esgi_about_section',
        'mime_type' => 'image',
        'description' => __('Sélectionnez une image pour la section About Us', 'ESGI'),
    )));

    // About Us - Who are we? - Titre
    $wp_customize->add_setting('esgi_about_who_title', array(
        'default' => 'Who are we?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_about_who_title', array(
        'label' => __('Who are we? - Title', 'ESGI'),
        'section' => 'esgi_about_section',
        'type' => 'text',
    ));

    // About Us - Who are we? - Contenu
    $wp_customize->add_setting('esgi_about_who_content', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu convallis elit, at convallis magna.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('esgi_about_who_content', array(
        'label' => __('Who are we? - Content', 'ESGI'),
        'section' => 'esgi_about_section',
        'type' => 'textarea',
    ));

    // About Us - Our vision - Titre
    $wp_customize->add_setting('esgi_about_vision_title', array(
        'default' => 'Our vision',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_about_vision_title', array(
        'label' => __('Our vision - Title', 'ESGI'),
        'section' => 'esgi_about_section',
        'type' => 'text',
    ));

    // About Us - Our vision - Contenu
    $wp_customize->add_setting('esgi_about_vision_content', array(
        'default' => 'Nullam faucibus interdum massa. Duis eget leo mattis, pulvinar nisi et, consequat lectus. Suspendisse commodo magna orci, id luctus risus porta pharetra. Fusce vehicula aliquet urna non ultricies.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('esgi_about_vision_content', array(
        'label' => __('Our vision - Content', 'ESGI'),
        'section' => 'esgi_about_section',
        'type' => 'textarea',
    ));

    // About Us - Our mission - Titre
    $wp_customize->add_setting('esgi_about_mission_title', array(
        'default' => 'Our mission',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_about_mission_title', array(
        'label' => __('Our mission - Title', 'ESGI'),
        'section' => 'esgi_about_section',
        'type' => 'text',
    ));

    // About Us - Our mission - Contenu
    $wp_customize->add_setting('esgi_about_mission_content', array(
        'default' => 'Vivamus et viverra neque, ut pharetra ipsum. Aliquam eget consequat libero, quis cursus tortor. Aliquam suscipit eros sit amet velit malesuada dapibus. Fusce in vehicula tellus. Donec quis lorem ut magna tincidunt egestas.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('esgi_about_mission_content', array(
        'label' => __('Our mission - Content', 'ESGI'),
        'section' => 'esgi_about_section',
        'type' => 'textarea',
    ));

    // Section Partners
    $wp_customize->add_section('esgi_partners_section', array(
        'title' => __('Partners Section', 'ESGI'),
        'priority' => 40,
    ));

    // Partners - Titre
    $wp_customize->add_setting('esgi_partners_title', array(
        'default' => 'Our Partners',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_partners_title', array(
        'label' => __('Partners Title', 'ESGI'),
        'section' => 'esgi_partners_section',
        'type' => 'text',
    ));

    // Partners - Activer/Désactiver
    $wp_customize->add_setting('esgi_partners_enable', array(
        'default' => true,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_partners_enable', array(
        'label' => __('Enable Partners Section', 'ESGI'),
        'section' => 'esgi_partners_section',
        'type' => 'checkbox',
    ));

    // Partners - Images
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("esgi_partners_image_$i", array(
            'default' => '',
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "esgi_partners_image_$i", array(
            'label' => sprintf(__('Partner Logo %d', 'ESGI'), $i),
            'section' => 'esgi_partners_section',
            'mime_type' => 'image',
            'description' => sprintf(__('Sélectionnez le logo %d pour la section Partners', 'ESGI'), $i),
        )));
    }

    $wp_customize->add_section('esgi_team_section', array(
        'title' => __('Team Section', 'ESGI'),
        'priority' => 37,
    ));

    // Team - Titre
    $wp_customize->add_setting('esgi_team_title', array(
        'default' => 'Our Team',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_team_title', array(
        'label' => __('Team Title', 'ESGI'),
        'section' => 'esgi_team_section',
        'type' => 'text',
    ));

    // Team - Membres (4 membres)
    for ($i = 1; $i <= 4; $i++) {
        // Image du membre
        $wp_customize->add_setting("esgi_team_image_$i", array(
            'default' => '',
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "esgi_team_image_$i", array(
            'label' => sprintf(__('Photo Membre %d', 'ESGI'), $i),
            'section' => 'esgi_team_section',
            'mime_type' => 'image',
        )));

        // Poste du membre
        $wp_customize->add_setting("esgi_team_position_$i", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("esgi_team_position_$i", array(
            'label' => sprintf(__('Poste Membre %d', 'ESGI'), $i),
            'section' => 'esgi_team_section',
            'type' => 'text',
        ));

        // Téléphone du membre
        $wp_customize->add_setting("esgi_team_phone_$i", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("esgi_team_phone_$i", array(
            'label' => sprintf(__('Téléphone Membre %d', 'ESGI'), $i),
            'section' => 'esgi_team_section',
            'type' => 'text',
        ));

        // Email du membre
        $wp_customize->add_setting("esgi_team_email_$i", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_email',
        ));
        $wp_customize->add_control("esgi_team_email_$i", array(
            'label' => sprintf(__('Email Membre %d', 'ESGI'), $i),
            'section' => 'esgi_team_section',
            'type' => 'email',
        ));
    }

    // Section Corp Parties
    $wp_customize->add_section('esgi_corp_parties_section', array(
        'title' => __('Corp Parties Section', 'ESGI'),
        'priority' => 38,
    ));

    // Corp Parties - Titre
    $wp_customize->add_setting('esgi_corp_parties_title', array(
        'default' => 'Corp. Parties',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_corp_parties_title', array(
        'label' => __('Titre Corp Parties', 'ESGI'),
        'section' => 'esgi_corp_parties_section',
        'type' => 'text',
    ));

    // Corp Parties - Contenu
    $wp_customize->add_setting('esgi_corp_parties_content', array(
        'default' => 'Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('esgi_corp_parties_content', array(
        'label' => __('Contenu Corp Parties', 'ESGI'),
        'section' => 'esgi_corp_parties_section',
        'type' => 'textarea',
        'description' => __('Décrivez vos services pour les entreprises', 'ESGI'),
    ));

    // Corp Parties - Image
    $wp_customize->add_setting('esgi_corp_parties_image', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'esgi_corp_parties_image', array(
        'label' => __('Image Corp Parties', 'ESGI'),
        'section' => 'esgi_corp_parties_section',
        'mime_type' => 'image',
        'description' => __('Sélectionnez une image pour la section Corp Parties', 'ESGI'),
    )));


    // Section Blog
    $wp_customize->add_section('esgi_blog_section', array(
        'title' => __('Blog Page', 'ESGI'),
        'priority' => 50,
    ));

    // Blog - Titre
    $wp_customize->add_setting('esgi_blog_title', array(
        'default' => 'Blog.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_blog_title', array(
        'label' => __('Blog Title', 'ESGI'),
        'section' => 'esgi_blog_section',
        'type' => 'text',
    ));
}


add_action('customize_register', 'esgi_customize_register');

function sanitize_bool_value($value)
{
    return is_bool($value) ? $value : false;
}



// Prise en compte de la couleur principale custom
add_action('wp_head', 'esgi_wp_head', 99);
function esgi_wp_head()
{
    $main_color = get_theme_mod('main_color', '#3f51b5');
    echo '<style>:root{ --main-color: ' . $main_color . '}</style>';

    if (get_theme_mod('uppercase_title', false)) {
        echo '<style>h1, h2, h3, h4, h5, h6, .entry-title { text-transform: uppercase; }</style>';
    }
}


// Prise en compte du mode dark
add_filter('body_class', 'esgi_body_class');
function esgi_body_class($classes)
{
    if (get_theme_mod('dark_mode', false)) {
        $classes[] = 'dark';
    }

    if (get_theme_mod('uppercase_title', false)) {
        $classes[] = 'title-uppercase';
    }

    return $classes;
}

function esgi_get_social_networks()
{
    $networks = [];
    $social_types = ['twitter', 'facebook', 'google', 'linkedin'];

    foreach ($social_types as $type) {
        $url = get_theme_mod('url_' . $type);
        if (!empty($url)) {
            $networks[$type] = $url;
        }
    }

    return $networks;
}

add_filter('the_title', 'esgi_maybe_uppercase_title', 20, 1);
function esgi_maybe_uppercase_title($title)
{
    if (get_theme_mod('uppercase_title', false)) {
        return strtoupper($title);
    }
    return $title;
}

// Fonction de fallback pour le menu mobile
function esgi_fallback_mobile_menu()
{
    echo '<ul class="dropdown-nav-list">';
    echo '<li><a href="' . home_url('/') . '">Home</a></li>';
    echo '<li><a href="' . home_url('/about-us') . '">About Us</a></li>';
    echo '<li><a href="' . home_url('/services') . '">Services</a></li>';
    echo '<li><a href="' . home_url('/partners') . '">Partners</a></li>';
    echo '<li><a href="' . home_url('/blog') . '">Blog</a></li>';
    echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
    echo '</ul>';
}

// Empêcher la redirection automatique vers les archives pour les paramètres de date
add_action('parse_request', 'esgi_handle_blog_filters');
function esgi_handle_blog_filters($wp)
{
    // Vérifier si on a des paramètres de filtre qui pointent vers le blog
    if (isset($_GET['archive']) || isset($_GET['category']) || isset($_GET['tag_filter']) || isset($_GET['search'])) {
        // Forcer WordPress à traiter cela comme une page normale
        $wp->query_vars['pagename'] = 'blog';
        $wp->query_vars['page'] = '';
        $wp->matched_rule = 'blog/?$';
        $wp->matched_query = 'pagename=blog';

        // Supprimer les query vars qui pourraient causer des redirections
        unset($wp->query_vars['m']);
        unset($wp->query_vars['monthnum']);
        unset($wp->query_vars['year']);
        unset($wp->query_vars['category_name']);
        unset($wp->query_vars['tag']);
    }
}

// Intercepter les redirections automatiques
add_filter('redirect_canonical', 'esgi_prevent_blog_redirect', 10, 2);
function esgi_prevent_blog_redirect($redirect_url, $requested_url)
{
    // Si l'URL contient /blog/ avec des paramètres, ne pas rediriger
    if (
        strpos($requested_url, '/blog/') !== false &&
        (strpos($requested_url, '?m=') !== false ||
            strpos($requested_url, '?cat=') !== false ||
            strpos($requested_url, '?tag=') !== false ||
            strpos($requested_url, '?s=') !== false)
    ) {
        return false;
    }
    return $redirect_url;
}

// Ajouter les query vars personnalisées pour les filtres de blog
add_filter('query_vars', 'esgi_add_blog_query_vars');
function esgi_add_blog_query_vars($vars)
{
    $vars[] = 'blog_m';
    $vars[] = 'blog_cat';
    $vars[] = 'blog_tag';
    return $vars;
}

// Enregistre le champ 'author' du formulaire comme meta personnalisée 'author' sur le commentaire
add_action('comment_post', function ($comment_id) {
    if (isset($_POST['author'])) {
        $full_name = sanitize_text_field($_POST['author']);
        add_comment_meta($comment_id, 'author', $full_name, true);
    }
});
