<?php
/*
Plugin Name: Expose Yoast SEO Meta to REST API
Description: Exposes Yoast SEO fields (title, meta description, focus keyword) to REST API for posts, pages, and custom post types.
Version: 1.1
Author: Muhammad Bin Saeed
Author URI: https://github.com/muhammad-bin-saeed
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function expose_yoast_seo_meta_in_rest() {
    $yoast_meta_fields = [
        '_yoast_wpseo_title',
        '_yoast_wpseo_metadesc',
        '_yoast_wpseo_focuskw',
    ];

    $post_types = get_post_types(['public' => true], 'names');

    foreach ( $post_types as $post_type ) {
        foreach ( $yoast_meta_fields as $meta_key ) {
            register_post_meta( $post_type, $meta_key, [
                'show_in_rest' => true,
                'single' => true,
                'type' => 'string',
                'auth_callback' => function() {
                    return current_user_can( 'edit_posts' );
                }
            ]);
        }
    }
}
add_action('init', 'expose_yoast_seo_meta_in_rest');
