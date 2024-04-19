<?php
get_header();
?>

<div id="photo-content">
    <?php 
        while ( have_posts() ) : the_post(); 
    ?>
    <div class="photo-content_left">
        <div class="photo-content_left-vide"></div>
        <div class="photo-content_left-pleine">    
            <h1><?php the_title(); ?></h1>
            <span>référence : <span id="reference"><?php the_field("reference"); ?></span></span> 
            <?php
                // Récupérer les noms des termes de la taxonomie "categorie" pour le post actuel
                $format_names = wp_list_pluck(get_the_terms(get_the_ID(), 'categorie'), 'name');
                // Afficher les noms des termes
                if (!empty($format_names)) {
                echo '<span>catégorie : ' . implode(', ', $format_names) . '</span>';
                }
            ?>
            <?php
                // Récupérer les noms des termes de la taxonomie "format" pour le post actuel
                $format_names = wp_list_pluck(get_the_terms(get_the_ID(), 'format'), 'name');
                // Afficher les noms des termes
                if (!empty($format_names)) {
                echo '<span>Format : ' . implode(', ', $format_names) . '</span>';
                }
            ?>
            <span>type : <?php echo(get_field("type")); ?></span>
            <span>année : <?php the_date('Y'); ?></span>   
        </div>                 
    </div> 
    <div class="photo-content_right">        
        <?php //code pour afficher l'image
	        $image_id = get_field( 'photo' ); 
	        if( $image_id ) {	
		    echo wp_get_attachment_image( $image_id, 'full' );
            }
        endwhile; ?>
    </div>
</div>
<div class="single-contact">
    <div class="single-contact_left">
        <p>Cette photo vous intéresse ?</p>
        <button id="single-contact_left-button">Contact</button>
    </div>
    <div class="single-contact_right">
    <?php
    // Récupérer la publication précédente
    $previous_post = get_previous_post();
    
    if (!empty($previous_post)) : ?>
        <a href="<?php echo get_permalink($previous_post->ID); ?>">
            <?php
            $previous_image_id = get_field('photo', $previous_post->ID);
            if ($previous_image_id) : 
                $previous_image_url = wp_get_attachment_image_url($previous_image_id, 'thumbnail');
                if ($previous_image_url) : ?> 
                    <img src="<?php echo $previous_image_url; ?>" class="previous-post-image" alt="Image précédente">
                <?php endif; 
            endif; ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/precedent.png" class="fleche-precedent" alt="flèche en direction de la gauche" title="précédent">
        </a>

    <?php endif; ?>
    
    <?php
    // Récupérer la publication suivante
    $next_post = get_next_post();
    
    if (!empty($next_post)) : ?>
        <a href="<?php echo get_permalink($next_post->ID); ?>">
            <?php
            $next_image_id = get_field('photo', $next_post->ID);
            if ($next_image_id) :
                $next_image_url = wp_get_attachment_image_url($next_image_id, 'thumbnail');
                if ($next_image_url) : ?>
                    <img src="<?php echo $next_image_url; ?>" class="next-post-image" alt="Image suivante">
                <?php endif;
            endif; ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/suivant.png" class="fleche-suivant" alt="flèche en direction de la droite" title="suivant"> 
        </a>
        
    <?php endif; ?>

    </div>
</div>


<?php

get_footer();
