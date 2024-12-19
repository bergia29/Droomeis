// Script JavaScript

document.getElementById("Menu_Destination").addEventListener("click", function() {
    window.location.href = "destination.html"; 
});

// Défilement dans la galerie d'images
const scrollGallery = (direction) => {
  const gallery = document.querySelector('.image-gallery');
  gallery.scrollBy({
      left: direction === 'left' ? -200 : 200,
      behavior: 'smooth'
  });
};

// Écoute des événements sur les boutons
document.querySelector('.scroll-button.left').addEventListener('click', () => scrollGallery('left'));
document.querySelector('.scroll-button.right').addEventListener('click', () => scrollGallery('right'));
