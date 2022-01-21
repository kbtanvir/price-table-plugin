<?php

add_action('rest_api_init', 'custom_api_get_all_posts');

function custom_api_get_all_posts() {
    register_rest_route('custom/v2', '/get-post-fields', array(
        'methods'  => 'GET',
        'callback' => 'custom_api_get_all_posts_callback',
    ));
}

function custom_api_get_all_posts_callback($request) {
    // Initialize the array that will receive the post fields
    $post_fields = [];

    // requested post type
    $requested_post_type = $request->get_param('post_type');

    // Get the posts using the requested post types
    $posts = get_posts(
        array(
            'posts_per_page' => 1,
            'post_type'      => array($requested_post_type), // This line allows to fetch multiple post types.
        )
    );

    // the fields that we dont want to show in front end
    $ignored_fields = [
        "ID",
        "post_author",
        "post_date",
        "post_date_gmt",
        "post_status",
        "comment_status",
        "ping_status",
        "post_password",
        "post_name",
        "to_ping",
        "pinged",
        "post_modified",
        "post_modified_gmt",
        "post_content_filtered",
        "post_parent",
        "guid",
        "menu_order",
        "post_type",
        "post_mime_type",
        "comment_count",
        "filter",
    ];



    // add regular fields to post_fields array
    foreach ($posts[0] as $key => $value) {
        if (!in_array($key, $ignored_fields)) {
            array_push($post_fields, $key);
        }
    }
    if (function_exists('get_field_objects')) {

        // get all custom fields
        $acf_custom_fields = get_field_objects($posts[0]->ID);
        // add custom fields to post_fields
        foreach ($acf_custom_fields as $key => $value) {
            // if ( !in_array( $key, $ignored_fields ) ) {
            array_push($post_fields, $key);
            // }
        }
    }

    return ($post_fields);
}
