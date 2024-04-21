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
