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







<?php

get_footer();

