// Script JavaScript

// Fonction pour défiler les images dans la galerie
document.addEventListener("DOMContentLoaded", () => {
  const leftButton = document.querySelector(".scroll-button.left");
  const rightButton = document.querySelector(".scroll-button.right");
  const imageGallery = document.querySelector(".image-gallery");

  // Définir la largeur d'une image + espace entre elles
  const imageWidth = 220; // 200px image + 20px espace
  let scrollPosition = 0;

  // Gestionnaire pour le bouton de défilement gauche
  leftButton.addEventListener("click", () => {
    scrollPosition = Math.max(scrollPosition - imageWidth, 0);
    imageGallery.style.transform = `translateX(-${scrollPosition}px)`;
  });

  // Gestionnaire pour le bouton de défilement droite
  rightButton.addEventListener("click", () => {
    // Limiter la position de défilement pour éviter un espace vide
    const maxScroll = (imageGallery.children.length - 1) * imageWidth;
    scrollPosition = Math.min(scrollPosition + imageWidth, maxScroll);
    imageGallery.style.transform = `translateX(-${scrollPosition}px)`;
  });
});

// Validation du formulaire de recherche
const searchForm = document.querySelector(".search-form");
searchForm.addEventListener("submit", (event) => {
  const destinationInput = searchForm.querySelector("input[type='text']");
  const dateInput = searchForm.querySelector("input[type='date']");
  const peopleInput = searchForm.querySelector("select");

  if (!destinationInput.value || !dateInput.value || !peopleInput.value) {
    alert("Veuillez remplir tous les champs avant de rechercher !");
    event.preventDefault(); // Empêche l'envoi du formulaire
  }
});


  
  
  // Gestionnaire d'événements pour le changement de langue
 ;
  