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
            $image_url = get_field('photo'); 
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

<section class="filter">
    <div class="select-left">
        <select id="category-filter">
            <option value="" selected hidden>CATEGORIES</option>
            <?php
            // Récupérer les termes de la taxonomie 'categorie' 
            $categories = get_terms('categorie');
            foreach ($categories as $category) {
                echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
            }
            ?>
        </select>
        <select id="format-filter">
            <option value="" selected hidden>FORMATS</option>
            <?php
            // Récupérer les termes de la taxonomie 'format'
            $format = get_terms('format');
            foreach ($format as $formats) {
                echo '<option value="' . $formats->term_id . '">' . $formats->name . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="select-right">
        <select id="date-filter">
        <option value="" selected hidden>TRIER PAR</option>
        <option value="desc">A partir des plus récentes</option>
        <option value="asc">A partir des plus anciennes</option>
        </select>
    </div>
</section>

<section class="index-photo photo-block">
    <?php 
        $args_photos_index = array(
        'post_type'      => 'photo', 
        'posts_per_page' => 8, 
        'order' => 'DESC'
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

