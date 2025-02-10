<?php

/**
 * Plugin Name: Add AJAX Form
 * Description: Creating an AJAX form to search posts in WordPress
 * Author:      me & Copilot
 *
 * Version:     1.0
 */

// Register a shortcode for a search form
function custom_search_form() {
    ob_start();
    ?>
    <form id="custom-search-form" action="" method="post">
        <input type="text" id="search-query" name="search-query" placeholder="Search post...">
        <input type="submit" value="Search Post">
    </form>
    <div id="search-results"></div>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_search', 'custom_search_form');

// enqueue and localize scripts for AJAX form handler
function custom_search_scripts() {
    wp_enqueue_script('custom-search', plugins_url('/custom-search.js', __FILE__), array('jquery'), null, true);
    wp_localize_script('custom-search', 'ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'custom_search_scripts');

//AJAX request handler in PHP
function custom_search_handler() {
    $search_query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        's' => $search_query,
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div>';
            echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            echo '<p>' . get_the_excerpt() . '</p>';
            echo '</div>';
        }
        wp_reset_postdata();
    } else {
        echo 'No posts found';
    }

    wp_die();
}
add_action('wp_ajax_custom_search', 'custom_search_handler');
add_action('wp_ajax_nopriv_custom_search', 'custom_search_handler');


