document.addEventListener('DOMContentLoaded', function() {
    
    //MODALE DE CONTACT POPUP
var singleContactButton = document.getElementById("single-contact_left-button");
var modal = document.querySelector('.modal-container'); // Correction ici
var modalOverlay = document.querySelector('.modal-overlay');
var modalContent = document.querySelector('.modal');
var inputField = modalContent.querySelector('#wp7-reference'); // Correction ici
var referenceSpan = document.getElementById('reference');
var referenceValue = referenceSpan ? referenceSpan.textContent : '';

// Fonction pour fermer la modal quand on clique en dehors d'elle
function closeOnClickOutside(event) {
    if (!modal.contains(event.target) && event.target !== contactButton && event.target !== singleContactButton) {
        modal.classList.add('hidden');
        document.removeEventListener('click', closeOnClickOutside); // Désactive l'écouteur d'événement après la fermeture
    }
}

// Ouvre la modal quand le bouton "Contact" dans single.php est cliqué
singleContactButton.addEventListener("click", function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien

    // Préremplir le champ de formulaire
    inputField.value = referenceValue; // Remplacez "Votre valeur préremplie" par la valeur souhaitée

    modal.classList.remove('hidden');

    // Ferme la modal quand on clique sur l'overlay
    modalOverlay.addEventListener('click', function(event) {
        modal.classList.add('hidden');
        document.removeEventListener('click', closeOnClickOutside); // Désactive l'écouteur d'événement après la fermeture
    });
});


//COMPORTEMENT DES PHOTOS ET FLECHES DANS SINGLE.PHP
let imgPrecedent = document.querySelector('.post-image.precedent');
let imgSuivant = document.querySelector('.post-image.suivant');
let arrowPrevious = document.querySelector('.arrow.previous');
let arrowNext = document.querySelector('.arrow.next');

// Fonction pour changer l'opacité d'une image
function changeOpacity(element, opacityValue) {
    element.style.opacity = opacityValue;
}

// Gestionnaire d'événement pour arrowPrevious
arrowPrevious.addEventListener('mouseenter', function() {
    changeOpacity(imgPrecedent, '1');
});

// Pour les tablettes et les mobiles
arrowPrevious.addEventListener('touchstart', function() {
    changeOpacity(imgPrecedent, '1');
});

arrowPrevious.addEventListener('mouseleave', function() {
    changeOpacity(imgPrecedent, '0');
});

// Gestionnaire d'événement pour arrowNext
arrowNext.addEventListener('mouseenter', function() {
    changeOpacity(imgSuivant, '1');
});

// Pour les tablettes et les mobiles
arrowNext.addEventListener('touchstart', function() {
    changeOpacity(imgPrecedent, '1');
});

arrowNext.addEventListener('mouseleave', function() {
    changeOpacity(imgSuivant, '0');
});    
});