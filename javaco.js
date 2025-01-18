// Sélection des filtres, des éléments de la grille et du bouton "Voir tout"
const filters = document.querySelectorAll('.bubble');
const gridItems = document.querySelectorAll('.grid-item');
const voirToutButton = document.querySelector('.bubble[data-filter="tout"]'); // Sélectionner le bouton "Voir tout"


// Sauvegarder l'état initial de la grille
let initialGridState = Array.from(gridItems).map(item => ({
  element: item,
  isVisible: !item.classList.contains('hidden'), // Garder une trace de l'état visible
  order: Array.from(item.parentNode.children).indexOf(item) // Sauvegarder l'ordre initial
}));


// Fonction pour réorganiser les éléments dans leur ordre initial
function reorganizeGrid() {
  const gridContainer = document.querySelector('.grid-container');
  initialGridState.sort((a, b) => a.order - b.order); // Trier les éléments par leur ordre initial
  initialGridState.forEach(state => gridContainer.appendChild(state.element)); // Réattacher les éléments
}

// Fonction pour afficher toutes les destinations
function showAllItems() {
  gridItems.forEach(item => {
    item.classList.remove('hidden'); // Afficher toutes les destinations
  });
  reorganizeGrid(); // Réorganiser après avoir montré tous les éléments
}

// Fonction pour restaurer l'état initial de la grille
function restoreInitialState() {

  gridItems.forEach((item, index) => {
    if (initialGridState[index].isVisible) {
      item.classList.remove('hidden');
    } else {
      item.classList.add('hidden');
    }
  });
  reorganizeGrid(); // Réorganiser pour revenir à l'état initial
}








// Fonction pour mettre à jour l'affichage de la grille en fonction des filtres actifs
function updateGridDisplay() {
  const activeFilters = Array.from(filters)
    .filter(f => f.classList.contains('active'))
    .map(f => f.dataset.filter); // Récupérer les filtres actifs

  if (activeFilters.length === 0) {
    // Si aucun filtre actif, restaurer l'état initial
    restoreInitialState();
  } else {
    gridItems.forEach(item => {
      const categories = item.dataset.category.split(' ');

      const matchesAllFilters = activeFilters.every(filter => categories.includes(filter));
      if (matchesAllFilters) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    });

    reorganizeGrid(); // Réorganiser les éléments visibles
  }
}

// Ajouter des gestionnaires d'événements aux filtres
filters.forEach(filter => {
  filter.addEventListener('click', () => {
    // Basculer l'état "active" sur le filtre cliqué
    if (filter === voirToutButton) {
      const isActive = voirToutButton.classList.contains('active');
      filters.forEach(f => f.classList.remove('active')); // Désactiver tous les autres filtres

      if (!isActive) {
        voirToutButton.classList.add('active'); // Activer "Voir tout"
        showAllItems();
      } else {
        voirToutButton.classList.remove('active'); // Désactiver "Voir tout"
        restoreInitialState(); // Restaurer l'état initial
      }
    } else {
      if (voirToutButton.classList.contains('active')) {
        voirToutButton.classList.remove('active'); // Désactiver "Voir tout" si un autre filtre est cliqué
      }
      filter.classList.toggle('active');
      updateGridDisplay(); // Mettre à jour l'affichage de la grille
    }
  });
});

// Initialiser la grille avec l'état initial
restoreInitialState();


// Filtrage des destinations
document.querySelectorAll('.filter-button').forEach(button => {
  button.addEventListener('click', function() {
    const filterCategory = this.getAttribute('data-filter'); // La catégorie du filtre

    document.querySelectorAll('.grid-item').forEach(item => {
      if (item.getAttribute('data-category').includes(filterCategory) || filterCategory === 'all') {
        item.style.display = ''; // Affiche l'élément
      } else {
        item.style.display = 'none'; // Cache l'élément
      }
    });
  });
});




