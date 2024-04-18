document.addEventListener('DOMContentLoaded', function() {
    var contactButton = document.querySelector('.menu-item.contact-button a');
    var singleContactButton = document.getElementById("single-contact_left-button");
    var modal = document.getElementById('modal-contact');
    var inputField = modal.querySelector('#wp7-reference'); // Remplacez #input-field par le sélecteur de votre champ de formulaire
    var referenceSpan = document.getElementById('reference');
    var referenceValue = referenceSpan.textContent;
    
    // Ouvre la modal quand le bouton "Contact" est cliqué
    contactButton.addEventListener('click', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        
        // Réinitialiser la valeur du champ de formulaire
        inputField.value = ""; // Effacer la valeur préremplie
        
        modal.classList.remove('hidden');
    });

    // Ouvre la modal quand le bouton "Contact" dans single.php est cliqué
    singleContactButton.addEventListener("click", function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        
        // Préremplir le champ de formulaire
        inputField.value = referenceValue; // Remplacez "Votre valeur préremplie" par la valeur souhaitée
        
        modal.classList.remove('hidden');
    });
    
    // Ferme la modal quand on clique en dehors d'elle
    document.addEventListener('click', function(event) {
        if (!modal.contains(event.target) && event.target !== contactButton && event.target !== singleContactButton) {
            modal.classList.add('hidden');
        }
    });
});





