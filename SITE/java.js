// Attendre que le DOM soit complètement chargé avant d'exécuter le code
document.addEventListener('DOMContentLoaded', function () {
  // Récupérer toutes les bulles et les éléments de la grille
  const bubbles = document.querySelectorAll('.bubble');
  const gridItems = document.querySelectorAll('.grid-item');

  // Ajouter un événement de clic à chaque bulle
  bubbles.forEach((bubble) => {
    bubble.addEventListener('click', () => {
      // Vérifier si la bulle est déjà active (si elle est sélectionnée)
      const isActive = bubble.classList.contains('active');
      
      // Si la bulle n'est pas active, on l'active, sinon on la désactive
      if (isActive) {
        bubble.classList.remove('active');
      } else {
        bubble.classList.add('active');
      }

      // Filtrer les éléments de la grille en fonction des bulles sélectionnées
      filterItems();
    });
  });

  // Fonction pour filtrer les éléments de la grille
  function filterItems() {
    // Récupérer toutes les bulles actives
    const activeFilters = Array.from(document.querySelectorAll('.bubble.active')).map(bubble => bubble.getAttribute('data-filter'));

    // Si aucune bulle n'est activée, afficher toutes les destinations
    if (activeFilters.length === 0 || activeFilters.includes('tout')) {
      gridItems.forEach((item) => item.classList.remove('hidden'));
      return;
    }

    // Filtrer les éléments de la grille en fonction des filtres actifs
    gridItems.forEach((item) => {
      const itemCategories = item.getAttribute('data-category').split(' '); // Récupérer les catégories associées à chaque élément
      // Vérifier si l'élément appartient à l'un des filtres actifs
      if (activeFilters.some(filter => itemCategories.includes(filter))) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    });
  }
});
