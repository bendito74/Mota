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

});







