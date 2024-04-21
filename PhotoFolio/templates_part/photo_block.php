<?php
// Fonction pour afficher les photos dans deux div
function display_two_photos($args_photos) {
    $photo_query = new WP_Query($args_photos);

    if ($photo_query->have_posts()) :
        $counter = 0;
        while ($photo_query->have_posts()) :
            $photo_query->the_post();
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
                //afficher le logo oeil
                echo '<img src="' . get_template_directory_uri() . '/assets/img/oeil.png" alt="logo en forme d\'oeil permettant d\'afficher le descriptif de la photo" class="oeil-photo">';
                //afficher le titre
                echo '<span class="title-photo">';
                the_title(); 
                echo '</span>';
                // afficher la catégorie
                $format_names = wp_list_pluck(get_the_terms(get_the_ID(), 'categorie'), 'name');
                if (!empty($format_names)) {
                echo '<span class="category-photo">';
                echo implode(', ', $format_names);
                echo '<span>';
                }
                echo '</div>';
                echo '</div>';
                $counter++;
            }
        endwhile;
        wp_reset_postdata(); // Réinitialiser la requête
    else :
        echo 'Aucune photo trouvée.';
    endif;
}
?>
