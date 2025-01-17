let currentIndex = 0;  // Index actuel de la première image visible
const images = document.querySelectorAll('.image-container');  // Toutes les images du carrousel
const totalImages = images.length;  // Nombre total d'images

// Afficher uniquement les 4 premières images par défaut
function updateCarousel() {
  const imageWidth = images[0].clientWidth;  // Récupérer la largeur d'une image
  const newTransformValue = -currentIndex * imageWidth;  // Déplacer les images en fonction de l'index actuel
  document.querySelector('.image-gallery').style.transform = `translateX(${newTransformValue}px)`;
}

// Fonction pour déplacer les images à gauche
function moveLeft() {
  if (currentIndex > 0) {
    currentIndex--;
  } else {
    currentIndex = totalImages - 4; // Revenir à la fin si on est au début
  }
  updateCarousel();
}

// Fonction pour déplacer les images à droite
function moveRight() {
  if (currentIndex < totalImages - 4) {
    currentIndex++;
  } else {
    currentIndex = 0; // Revenir au début si on est à la fin
  }
  updateCarousel();
}

// Ajouter les événements de clic sur les boutons gauche et droit
document.querySelector('.left').addEventListener('click', moveLeft);
document.querySelector('.right').addEventListener('click', moveRight);

// Initialisation du carrousel en affichant les 4 premières images
updateCarousel();



window.onload = function() {
  alert("Bienvenue sur notre site !");
};




function cameleon(id) {
  document.getElementById(id).style.backgroundColor = "#ffcccb"; // Changer la couleur
}