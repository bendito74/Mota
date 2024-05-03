    <footer>
        <a href="http://motaphotocom.local/mentions-legales/">Mentions légales</a>
        <a href="http://motaphotocom.local/politique-de-confidentialite/">Vie privée</a>
        <p>Tous droits réservés</p>
    </footer>
    <?php 
        get_template_part("/templates_part/modal_contact");
        wp_footer(); 
    ?>
    <div class="lightbox">
        <img class="lightbox__close" src="<?php echo get_template_directory_uri(); ?>/assets/img/closeWhite.svg" alt="Croix servant à la fermeture du mode plein écran" title="Croix servant à la fermeture du mode plein écran">
        <img class="lightbox__next" src="<?php echo get_template_directory_uri(); ?>/assets/img/Next.svg" alt="Croix servant à la fermeture du mode plein écran" title="Croix servant à la fermeture du mode plein écran">>
        <img class="lightbox__prev" src="<?php echo get_template_directory_uri(); ?>/assets/img/Prev.svg" alt="Croix servant à la fermeture du mode plein écran" title="Croix servant à la fermeture du mode plein écran">>
            <div class="lightbox__container">
                <img alt="image sélectionné en format plein écran">
            </div>
    </div>
    </body>
</html>