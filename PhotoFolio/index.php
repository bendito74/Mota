<?php
get_header();
?>

<?php
    $hero_photo = get_posts(array(
        'post_type'      => 'photo', 
        'posts_per_page' => 1,
        'orderby'        => 'rand',
    ));

    // Vérifier si une publication a été trouvée
    if ($hero_photo) {
        foreach ($hero_photo as $post) :
            setup_postdata($post);
            // Récupérer l'URL de l'image à partir du champ ACF 'photo'
            $image_url = get_field('photo'); // Assurez-vous que 'photo' est le nom de votre champ d'image ACF
            ?>
            <section class="hero-header">
                <div class="hero-content">
                    <?php echo wp_get_attachment_image(get_field('photo'), 'full'); ?>
                    <h1>PHOTOGRAPHE EVENT</h1>
                </div>
            </section>
            <?php
        endforeach;
        wp_reset_postdata(); // Réinitialiser la requête WordPress
    }
?>

<section class="index-photo photo-block">
    <?php 
        $args_photos_index = array(
        'post_type'      => 'photo', // nom de la publication
        'posts_per_page' => 8, 
        'orderby'        => 'rand'
        );
    
        get_template_part('/templates_part/photo_block');
    
        display_two_photos($args_photos_index);
 
    ?>
</section>

<section class="load">
    <button id="load-more">Charger plus</button>
</section>


<?php

get_footer();

