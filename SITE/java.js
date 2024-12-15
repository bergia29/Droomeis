// Récupérer les boutons de filtre et les éléments de la grille
const filterButtons = document.querySelectorAll('.bubble'); // Boutons de filtre
const gridItems = document.querySelectorAll('.grid-item'); // Éléments de la grille

// Tableau pour stocker les catégories sélectionnées
let selectedCategories = [];

// Ajouter un événement de clic à chaque bouton de filtre
filterButtons.forEach(button => {
  button.addEventListener('click', () => {
    const filterCategory = button.getAttribute('data-filter'); // Récupère la catégorie du bouton

    // Ajouter ou retirer la catégorie de la liste des filtres sélectionnés
    if (selectedCategories.includes(filterCategory)) {
      selectedCategories = selectedCategories.filter(cat => cat !== filterCategory);
      button.classList.remove('active');
    } else {
      selectedCategories.push(filterCategory);
      button.classList.add('active');
    }

    // Mettre à jour l'affichage des éléments
    updateGridDisplay();
  });
});

function updateGridDisplay() {
  // Si aucun filtre n'est sélectionné, afficher uniquement les 6 premières images et cacher les autres
  if (selectedCategories.length === 0) {
    gridItems.forEach((item, index) => {
      if (index < 6) {
        item.classList.remove('hidden'); // Affiche les 6 premières images
      } else {
        item.classList.add('hidden'); // Cache toutes les autres images
      }
    });
  } else {
    // Masquer ou afficher les éléments en fonction des catégories sélectionnées
    gridItems.forEach(item => {
      const itemCategories = item.getAttribute('data-category').trim().split(' ');

      const isMatch = selectedCategories.length === 0 || selectedCategories.every(category => itemCategories.includes(category));

      if (isMatch) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    });
  }

  // Réorganiser les éléments après l'affichage des filtres
  rearrangeGrid();
}

function rearrangeGrid() {
  const gridContainer = document.querySelector('.grid-container');
  const visibleItems = Array.from(gridContainer.children).filter(item => !item.classList.contains('hidden'));

  // Réinitialiser la grille sans vider le conteneur
  gridContainer.style.display = 'none'; // Masquer temporairement
  gridContainer.offsetHeight; // Forcer un recalcul
  gridContainer.style.display = 'grid'; // Réafficher la grille
  
  // S'assurer que les éléments visibles se réorganisent
  visibleItems.forEach(item => {
    gridContainer.appendChild(item); // Ajouter les éléments visibles à la fin
  });
}
