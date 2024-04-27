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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo Nathalie Mota" title="logo du site : Nathalie Mota">
        </div>
        <nav class="header_nav">
            <?php
            wp_nav_menu( array(
            'theme_location' => 'primary', // Emplacement du menu à afficher (vous devez le définir dans functions.php)
            'menu_class'     => 'primary-menu', // Classe CSS pour le menu
            'container'      => false, // Supprimer le conteneur <nav>
            'items_wrap'     => '<ul id="primary-menu" class="%2$s">%3$s<li class="menu-item contact-button"><a href="#modal-contact">Contact</a></li></ul>', // Ajouter un élément de menu pour le bouton "Contact"
            ));
            ?>
        </nav>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu-toggle.svg" alt="Trois barres qui symbolise le menu" class="menu-toggle_open">
    </header>
    
    <div class="menu-mobile-overlay"> <!-- Overlay pour couvrir la page -->
            <div class="header-overlay">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo Nathalie Mota" title="logo du site : Nathalie Mota">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close.svg" alt="Croix de fermeture du menu" class="menu-toggle_close">
            </div>
        <div class="menu-mobile">
        
            <nav class="menu-mobile_nav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary', 
                    'menu_class'     => 'primary-menu', 
                    'container'      => false, 
                    'items_wrap'     => '<ul id="primary-menu-mobile" class="%2$s">%3$s<li class="menu-item contact-button"><a href="#modal-contact">Contact</a></li></ul>',
                ));
                ?>
            </nav>
        </div>
    </div>
    

    
