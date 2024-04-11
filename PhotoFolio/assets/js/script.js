document.addEventListener('DOMContentLoaded', function() {
    var contactButton = document.querySelector('.menu-item.contact-button a');
    var modal = document.getElementById('modal-contact');
    
    // Ouvre la modal quand le bouton "Contact" est cliqué
    contactButton.addEventListener('click', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        
        modal.classList.remove('hidden');
    });
    
    // Ferme la modal quand on clique en dehors d'elle
    document.addEventListener('click', function(event) {
        if (!modal.contains(event.target) && event.target !== contactButton) {
            modal.classList.add('hidden');
        }
    });
});

