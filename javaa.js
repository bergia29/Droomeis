// Récupérer les éléments nécessaires
const modal = document.getElementById("loginModal");
const closeModalIcon = document.getElementById("closeModalBtn"); // Assurez-vous que c'est le bon bouton de fermeture
const inscriptionLink = document.getElementById("inscriptionLink"); // Lien d'inscription

// Fermer la modale lorsqu'on clique sur la croix
closeModalIcon.onclick = function() {
  modal.style.display = "none";  // Cache la modale
}

// Fermer la modale et ouvrir la page d'inscription lorsqu'on clique sur le lien
inscriptionLink.onclick = function(event) {
  event.preventDefault();  // Empêche l'ouverture dans la modale

  // Fermer la modale
  modal.style.display = "none"; 
  
  // Rediriger normalement vers la page d'inscription, comme un lien classique
  window.location.href = inscriptionLink.href;  // Redirige l'utilisateur vers la page d'inscription
}

// Fermer la modale si on clique en dehors de celle-ci
window.onclick = function(event) {
  if (event.target === modal) {
    modal.style.display = "none";  // Cache la modale si on clique à l'extérieur
  }
}
