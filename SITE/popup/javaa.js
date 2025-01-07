// Récupérer les éléments
var modal = document.getElementById("myModal");
var openModalButton = document.getElementById("openModalButton");
var closeModalIcon = document.getElementById("closeModalIcon");
var modalContent = document.getElementById("modalContent");  // Le contenu de la modale

// Ouvrir la modale lorsqu'on clique sur le bouton
openModalButton.onclick = function() {
    modal.style.display = "block";  // Affiche la modale
}

// Fermer la modale lorsqu'on clique sur la croix
closeModalIcon.onclick = function() {
    modal.style.display = "none";  // Cache la modale
}

// Fermer la modale si on clique n'importe où sur la page sauf sur la modale
window.onclick = function(event) {
    // Si l'élément cliqué est l'arrière-plan de la modale, la fermer
    if (event.target == modal) {
        modal.style.display = "none";  // Cache la modale
    }
}

// Empêcher la propagation du clic à l'extérieur de la modale (ne pas fermer la modale si on clique sur son contenu)
modalContent.onclick = function(event) {
    event.stopPropagation();  // Cela empêche l'événement de se propager à l'élément parent (la modale)
}

