document.addEventListener('DOMContentLoaded', function() {
    
    //MODALE DE CONTACT POPUP
var contactButton = document.querySelector('.menu-item.contact-button a');
var modal = document.querySelector('.modal-container'); // Correction ici
var modalOverlay = document.querySelector('.modal-overlay');

// Fonction pour fermer la modal quand on clique en dehors d'elle
function closeOnClickOutside(event) {
    if (!modal.contains(event.target) && event.target !== contactButton && event.target !== singleContactButton) {
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

//JS POUR AJAX DES FILTRES
jQuery(document).ready(function($) {
    // Gestionnaire d'événements pour les filtres de catégorie
    $('#category-filter').change(function() {
        var categoryId = $(this).val();
        var formatId = $('#format-filter').val();
        var dateOrder = $('#date-filter').val();
        filterPhotos(categoryId, formatId, dateOrder);
    });

    // Gestionnaire d'événements pour les filtres de format
    $('#format-filter').change(function() {
        var categoryId = $('#category-filter').val();
        var formatId = $(this).val();
        var dateOrder = $('#date-filter').val();
        filterPhotos(categoryId, formatId, dateOrder);
    });

    // Gestionnaire d'événements pour le filtre de date
    $('#date-filter').change(function() {
        var categoryId = $('#category-filter').val();
        var formatId = $('#format-filter').val();
        var dateOrder = $(this).val();
        filterPhotos(categoryId, formatId, dateOrder);
    });

    function filterPhotos(categoryId, formatId, dateOrder) {
        // Vérifie si l'option "formats" est sélectionnée
        if (formatId === 'all') {
            // Si oui, définit formatId à vide pour indiquer aucun filtre de format
            formatId = '';
        }

        $.ajax({
            url: my_ajax_obj.ajaxurl,
            type: 'post',
            data: {
                action: 'filter_photos',
                category_id: categoryId,
                format_id: formatId,
                date_order: dateOrder
            },
            beforeSend: function() {
                $('#load-more').hide();
            },
            success: function(response) {
                $('.index-photo').html(response);
                $('#load-more').hide();
            }
        });
    }
});


});











