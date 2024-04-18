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
            <span class="reading_duration">référence : <?php the_field("reference"); ?></span>
            <?php
                // Récupérer les noms des termes de la taxonomie "categorie" pour le post actuel
                $format_names = wp_list_pluck(get_the_terms(get_the_ID(), 'categorie'), 'name');
                // Afficher les noms des termes
                if (!empty($format_names)) {
                echo '<span class="reading_duration">catégorie : ' . implode(', ', $format_names) . '</span>';
                }
            ?>
            <?php
                // Récupérer les noms des termes de la taxonomie "format" pour le post actuel
                $format_names = wp_list_pluck(get_the_terms(get_the_ID(), 'format'), 'name');
                // Afficher les noms des termes
                if (!empty($format_names)) {
                echo '<span class="reading_duration">Format : ' . implode(', ', $format_names) . '</span>';
                }
            ?>
            <span class="reading_duration">type : <?php echo(get_field("type")); ?></span>
            <span class="published">année : <?php the_date('Y'); ?></span>   
        </div>                 
    </div> 
    <div class="photo-content_right">        
        <?php //code pour afficher l'image
	        $image_id = get_field( 'photo' ); // On récupère cette fois l'ID
	        if( $image_id ) {	
		    echo wp_get_attachment_image( $image_id, 'full' );
            }
        endwhile; ?>
    </div>
</div>
<div class="single-contact">
    <div class="single-contact_left">
        <p>Cette photo vous intéresse ?</p>
        <button>Contact</button>
    </div>
    <div class="single-contact_right">
        <img>
        <div class="single-contact_right-fleche">
            <img>
            <img>
        </div>
    </div>
</div>
<?php
get_footer();
