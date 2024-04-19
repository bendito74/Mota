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
}
add_action('wp_enqueue_scripts', 'photofolio_enqueue_styles');

//Chargement des scripts js
function photofolio_enqueue_scripts() {
  // Enregistrer le script JavaScript sans dépendre de jQuery
  wp_enqueue_script('mon-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true);
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'photofolio_enqueue_scripts');




