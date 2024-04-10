<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="header_title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo Nathalie Mota">
        </div>
        <nav class="header_nav">
            <?php
            wp_nav_menu( array(
            'theme_location' => 'primary', // Emplacement du menu à afficher (vous devez le définir dans functions.php)
            'menu_class'     => 'primary-menu', // Classe CSS pour le menu
            'container'      => false, // Supprimer le conteneur <nav>
            ));
            ?>
        </nav>
    </header>

    
