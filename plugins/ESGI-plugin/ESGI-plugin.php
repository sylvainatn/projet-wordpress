<?php
/*
Plugin Name: Plugin ESGI
Plugin URI: https:esgi.fr
Description: Ajout d'un lien de duplication des articles et pages
Author: ESGI
Version: 1.0
*/

add_filter('post_row_actions', 'esgi_displayDuplicateLink', 10, 2);
function esgi_displayDuplicateLink($actions, $post)
{
    if (!current_user_can('edit_posts')) {
        return $actions;
    }
    $url = wp_nonce_url(
        add_query_arg(
            [
                'action' => 'esgi_duplicate_post',
                'post' => $post->ID,
            ],
            'admin.php'
        )
    );
    $actions['duplicate'] = '<a href="' . $url . '">' . __('Duplicate', 'ESGI') . '</a>';
    return $actions;
}

add_action('admin_action_esgi_duplicate_post', 'esgi_duplicate_post');
function esgi_duplicate_post()
{

    if (isset($_GET['post']) || check_admin_referer()) {
        // crée un post à partir de l'id présent dans l'url
        $original_post = get_post($_GET['post']);
        // Récupérer les clés de l'objet orignal pour les mettre dans tableau d'arguments
        $args = get_object_vars($original_post);

        unset($args['ID']);
        $args['post_status'] = 'draft';
        $args['post_title'] .= ' - DUPLICATE';

        $new_post_id = wp_insert_post($args);

        // ajout du post thumbnail
        $original_thumbnail_id = get_post_thumbnail_id($original_post);
        set_post_thumbnail($new_post_id, $original_thumbnail_id);
    }

    wp_safe_redirect(
        add_query_arg(
            ['post_type' => 'post'],
            admin_url('edit.php')
        )
    );
}

function wporg_custom_post_type()
{
    register_post_type(
        'wporg_product',
        array(
            'labels'      => array(
                'name'          => __('Projets', 'textdomain'),
                'singular_name' => __('Projet', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
        )
    );
}
add_action('init', 'wporg_custom_post_type');
