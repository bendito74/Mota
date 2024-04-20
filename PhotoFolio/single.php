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
        function display_post_image($post, $class) {
            $post_image_id = get_field('photo', $post->ID);
            $post_image_url = $post_image_id ? wp_get_attachment_image_url($post_image_id, 'thumbnail') : '';

            if (!empty($post_image_url)) {
                echo '<img src="' . $post_image_url . '" class="post-image ' . $class . '" alt="Image de publication">'; 
            }
        }
        function display_post_arrow($arrow_image, $class) {
            echo '<img src="' . get_template_directory_uri() . '/assets/img/' . $arrow_image . '" class="arrow ' . $class . '" alt="Flèche" title="' . ucfirst($arrow_image) . '">';
        }

        $previous_post = get_previous_post();
        $next_post = get_next_post();?>

            <div class="single-contact_right-photo">
                <?php if (!empty($previous_post)) : ?>
                    <a href="<?php echo get_permalink($previous_post->ID); ?>">
                        <?php display_post_image($previous_post, 'precedent')?>
                    </a>
                <?php endif;

                if (!empty($next_post)) : ?>
                    <a href="<?php echo get_permalink($next_post->ID); ?>">
                        <?php display_post_image($next_post, 'suivant'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="single-contact_right-arrow">
                <?php
                $previous_post = get_previous_post();
                if (!empty($previous_post)) : ?>
                    <a href="<?php echo get_permalink($previous_post->ID); ?>">
                        <?php display_post_arrow('precedent.png', 'previous'); ?>
                    </a>
                <?php endif; ?>

                <?php
                $next_post = get_next_post();
                if (!empty($next_post)) : ?>
                    <a href="<?php echo get_permalink($next_post->ID); ?>">
                        <?php display_post_arrow('suivant.png', 'next'); ?>
                    </a>
                <?php endif; ?>
            </div>
    </div>
</div>
<div class="like-more">
    <p>VOUS AIMEREZ AUSSI</p>
</div>


<?php
get_footer();
