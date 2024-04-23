<?php

//Menu de navigation
function register_my_menus() {
    register_nav_menus(
      array(
        'primary' => __( 'Menu Principal' ),
      )
    );
  }
  add_action( 'init', 'register_my_menus' );
  
//Chargement des styles css
function photofolio_enqueue_styles() {
    wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/css/header.css', array(), '1.0', 'all');
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/css/footer.css', array(), '1.0', 'all');
    wp_enqueue_style('general-style', get_template_directory_uri() . '/assets/css/general.css', array(), '1.0', 'all');
    wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/single.css', array(), '1.0', 'all');
    wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/index.css', array(), '1.0', 'all');
    wp_enqueue_style('photoblock-style', get_template_directory_uri() . '/assets/css/photoblock.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'photofolio_enqueue_styles');

//Chargement des scripts js
function photofolio_enqueue_scripts() {
  // Enregistrer le script JavaScript sans dépendre de jQuery
  wp_enqueue_script('mon-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true);
	//wp_localize pour charger définir l'url d'ajaxurl
  wp_localize_script('mon-script', 'my_ajax_obj', array('ajaxurl' => admin_url('admin-ajax.php')));
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'photofolio_enqueue_scripts');

//Chargement du script pour single.php
function enqueue_single_scripts() {
  if (is_single()) {
      wp_enqueue_script('single-custom-script', get_template_directory_uri() . '/assets/js/single-custom.js', array('jquery'), null, true);
  }
}
add_action('wp_enqueue_scripts', 'enqueue_single_scripts');



//CHARGEMENT AJAX POUR LOAD MORE
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');
function load_more_photos() {

    $args_photos_index = array(
        'post_type'      => 'photo',
        'posts_per_page' => -1, 
        'order'          => 'ASC',
    );

    ob_start();
    get_template_part('/templates_part/photo_block');
    display_two_photos($args_photos_index);
    $output = ob_get_clean();

    echo $output;
    exit;
}





