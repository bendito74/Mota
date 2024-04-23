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


//FONCTION BOUTON CHARGER PLUS 
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');

function load_more_photos() {
    $page = $_POST['page'];
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
		'orderby' => 'rand',
        'paged' => $page,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Récupérer l'ID de l'image à partir du champ ACF 'photo'
            $image_id = get_field('photo');
            if ($image_id) {
                // Utiliser un compteur pour séparer les deux photos dans deux div différentes
                $div_class = ($counter == 0) ? 'photo-block_left' : 'photo-block_right';
                echo '<div class="' . $div_class . '">';
                    echo wp_get_attachment_image($image_id, 'full');

                    // Ajout de l'overlay
                    echo '<div class="overlay">';
                        //afficher le logo plein écran
                        echo '<img src="' . get_template_directory_uri() . '/assets/img/pleinEcran.png" alt="logo représentant un carré dans un rond et servant à agrandir l\'image" class="pleinEcran-photo">';
                        
                        // Récupérer l'URL du post actuel
                        $post_url = get_permalink();
                        echo '<a href="' . esc_url($post_url) . '">'; //ouverture du lien
                        //afficher le logo oeil
                        echo '<img src="' . get_template_directory_uri() . '/assets/img/oeil.png" alt="logo en forme d\'oeil permettant d\'afficher le descriptif de la photo" class="oeil-photo">';
                        echo '</a>'; //fermeture du lien 
                        
                        //afficher le titre
                        echo '<span class="title-photo">';
                        the_title(); 
                        echo '</span>';
                        
                        // afficher la catégorie
                        $format_names = wp_list_pluck(get_the_terms(get_the_ID(), 'categorie'), 'name');
                        if (!empty($format_names)) {
                        echo '<span class="category-photo">';
                        echo implode(', ', $format_names);
                        echo '</span>';
                        }
                    echo '</div>';
                echo '</div>';
					}
        endwhile;
        wp_reset_postdata();
    else :
        echo 'end';
    endif;

    die();
}





