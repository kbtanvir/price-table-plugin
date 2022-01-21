<?php

function wcc_create_custom_post_type() {
  /*
  * The $labels describes how the post type appears.
  */
  $labels = array(
    'name' => 'Integrations', // Plural name
    'singular_name' => 'wccintegrations' // Singular name
  );
  $postType = $labels['singular_name'];
  /*
  * The $supports parameter describes what the post type supports
  */
  $supports = array(
    'title', // Post title
    "custom-fields",
  );

  /*
  * The $args parameter holds important parameters for the custom post type
  */
  $args = array(
    'labels' => $labels,
    'description' => 'Post type post product', // Description
    'supports'  =>  $supports,
    'show_in_rest' => true,
    'hierarchical' => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
    'public' => true, // Makes the post type public
    'show_ui' => true, // Displays an interface for this post type
    'show_in_menu' => true, // Displays in the Admin Menu (the left panel)
    'show_in_nav_menus' => true, // Displays in Appearance -> Menus
    'show_in_admin_bar' => true, // Displays in the black admin bar
    'menu_position' => 5, // The position number in the left menu
    'menu_icon' => true, // The URL for the icon used for this post type
    'can_export' => true, // Allows content export using Tools -> Export
    'has_archive' => true, // Enables post type archive (by month, date, or year)
    'exclude_from_search' => false, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
    'publicly_queryable' => false, // Allows queries to be performed on the front-end part if set to true
    'capability_type' => 'post' // Allows read, edit, delete like “Post”
  );

  register_post_type($postType, $args); //Create a post type with the slug is ‘product’ and arguments in $args.


  /* Add custom field to endpoint */

  // $meta_args = array(
  //   'type'         => 'string',
  //   'description'  => 'A meta key associated with a string meta value.',
  //   'single'       => true,
  //   'show_in_rest' => true,
  // );
  // register_meta($labels['singular_name'], 'settings', $meta_args);

  // ----------------------------
  // register_rest_field($postType, 'settings', array(
  //   'get_callback' => function ($post_arr) {
  //     return get_post_meta($post_arr['id'], 'settings', true);
  //   },
  // ));

  // add meta box

  function wporg_add_custom_box() {
    $screens = [$postType, 'wporg_cpt'];
    foreach ($screens as $screen) {
      add_meta_box(
        'wporg_box_id',                 // Unique ID
        'Custom Meta Box Title',      // Box title
        'wporg_custom_box_html',  // Content callback, must be of type callable
        $screen                            // Post type
      );
    }
    function wporg_custom_box_html($post) {
?>
      <label for="wporg_field">Description for this field</label>
      <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="">Select something...</option>
        <option value="something">Something</option>
        <option value="else">Else</option>
      </select>
<?php
    }
  }
  add_action('add_meta_boxes', 'wporg_add_custom_box');
}
add_action('init', 'wcc_create_custom_post_type');
