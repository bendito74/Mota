document.addEventListener('DOMContentLoaded', function() {
    
    //MODALE DE CONTACT POPUP
var contactButton = document.querySelector('.menu-item.contact-button a');
var modal = document.querySelector('.modal-container'); // Correction ici
var modalOverlay = document.querySelector('.modal-overlay');

// Fonction pour fermer la modal quand on clique en dehors d'elle
// Fonction pour fermer la modal quand on clique en dehors d'elle
function closeOnClickOutside(event) {
    if (!modal.contains(event.target) && event.target !== contactButton && event.target !== mobileContactButton) {
        modal.classList.add('hidden');
        document.removeEventListener('click', closeOnClickOutside); // Désactive l'écouteur d'événement après la fermeture
    }
}

// Ouvre la modal quand le bouton "Contact" dans le menu_nav est cliqué
contactButton.addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien

    modal.classList.remove('hidden');

    // Ferme la modal quand on clique sur l'overlay
    modalOverlay.addEventListener('click', function(event) {
        modal.classList.add('hidden');
        document.removeEventListener('click', closeOnClickOutside); // Désactive l'écouteur d'événement après la fermeture
    });
});
    //MODALE MENU MOBILE 
// Sélectionnez le bouton "Contact" dans le menu mobile
var mobileContactButton = document.querySelector('.menu-mobile_nav .contact-button a');

// Fonction pour ouvrir la modale lorsque le bouton "Contact" dans le menu mobile est cliqué
mobileContactButton.addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien

    modal.classList.remove('hidden');

    // Active l'écouteur d'événement pour fermer la modal quand on clique sur l'overlay
    document.addEventListener('click', closeOnClickOutside);
});


//JS POUR AJAX POUR LE BOUTON CHARGER PLUS
jQuery(document).ready(function($) {
    $('#load-more').on('click', function() {
        var btn = $(this);
        var data = {
            'action': 'load_more_photos',
        };

        $.ajax({
            url: my_ajax_obj.ajaxurl,
            type: 'POST',
            data: data,
            beforeSend: function() {
                btn.text('Chargement en cours...');
            },
            success: function(response) {
                btn.hide();
                $('.index-photo').html(response);
            }
        });
    });
});

//JS POUR LES FILTRES
jQuery(document).ready(function($) {
    $('#category-filter, #format-filter, #date-filter').change(function() {
        var category = $('#category-filter').val();
        var format = $('#format-filter').val();
        var order = $('#date-filter').val();
        
        $.ajax({
            url: my_ajax_obj.ajaxurl,
            type: 'POST',
            data: {
                action: 'filter_photos',
                category: category,
                format: format,
                order: order,
            },
            success: function(response) {
                $('#load-more').hide();
                $('.index-photo').html(response);
            }
        });
    });
});








//MENU TOOGLE
    var menuToggleOpen = document.querySelector('.menu-toggle_open');
    var menuMobileOverlay = document.querySelector('.menu-mobile-overlay');

    menuToggleOpen.addEventListener('click', function() {
        menuMobileOverlay.style.display = 'flex'; // Afficher l'overlay
    });

    menuMobileOverlay.addEventListener('click', function() {
        menuMobileOverlay.style.display = 'none'; // Cacher l'overlay
    });

    // Fonction pour cacher l'overlay lorsque la largeur de l'écran est supérieure ou égale à 650 pixels
    function hideOverlay() {
        if (window.innerWidth >= 650) {
            menuMobileOverlay.style.display = 'none';
        }
    }

    // Appeler la fonction pour cacher l'overlay au chargement de la page
    hideOverlay();

    // Écouter les changements de taille de l'écran et cacher l'overlay si nécessaire
    window.addEventListener('resize', hideOverlay)




//LIGHTBOX 
    let images = document.querySelectorAll('.pleinEcran-photo');
    let lightbox = document.querySelector('.lightbox');
    let lightboxImg = document.querySelector('.lightbox__container img');
    let lightboxTitle = document.querySelector('.lightbox__title');
    let lightboxCategory = document.querySelector('.lightbox__category');
    let prevBtn = document.querySelector('.lightbox__prev');
    let nextBtn = document.querySelector('.lightbox__next');
    let currentIndex = 0;

    function showImage(index) {
        let image = images[index];
        if (image) {
            let imageUrl = image.getAttribute('data-image-url');
            let imageTitle = image.getAttribute('data-title');
            let imageCategory = image.getAttribute('data-category');
            lightboxImg.setAttribute('src', imageUrl);
            lightboxTitle.textContent = imageTitle;
            lightboxCategory.textContent = imageCategory;
            currentIndex = index;
        }
    }

    function showPrev() {
        currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
        showImage(currentIndex);
    }

    function showNext() {
        currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
        showImage(currentIndex);
    }

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('pleinEcran-photo')) {
            images = document.querySelectorAll('.pleinEcran-photo'); // Mettre à jour la liste des images
            let index = Array.from(images).indexOf(event.target);
            showImage(index);
            lightbox.style.display = 'block';
        }

        if (event.target.classList.contains('lightbox__close')) {
            lightbox.style.display = 'none';
        }
    });

    prevBtn.addEventListener('click', showPrev);
    nextBtn.addEventListener('click', showNext);

});
