<?php

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}, 11);

$page = get_page_by_path( 'dashboard' );
$post_id = $page->ID;

function my_custom_scripts() {
    wp_enqueue_script('dashboard-js-app', get_stylesheet_directory_uri() . '/dashboard/build/bundle.js');
    // wp_enqueue_script('dashboard-js-app', get_stylesheet_directory_uri() . '/dashboard/build/test.js');
    wp_enqueue_style('selectr-css', get_stylesheet_directory_uri() . '/dashboard/selectr.min.css');
    wp_enqueue_style('dashboard-css-bundle', get_stylesheet_directory_uri() . '/dashboard/build/bundle.css');

    // pass data value into bundle.js
    $composite_score_data = get_field('composite_score_data', $post_id);
    wp_localize_script( "dashboard-js-app", "data_field", $composite_score_data );
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );







// if ( get_field('composite_score_data', $post_id) ) {
//     $composite_score_data = get_field('composite_score_data', $post_id);
// }

// function my_scripts_loader() {
//     // $data = array("home"=>site_url());
//     $composite_score_data = get_field('composite_score_data', $post_id);
//     wp_enqueue_script("myscript", get_stylesheet_directory_uri() . '/dashboard/build/test.js');
//     wp_localize_script( "myscript", "blog", $composite_score_data );
// }
// add_action("wp_enqueue_scripts","my_scripts_loader");

?>
