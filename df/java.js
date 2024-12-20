// Sélection des filtres et des éléments de la grille
const filters = document.querySelectorAll('.bubble');
const gridItems = document.querySelectorAll('.grid-item');

// Gestion des filtres actifs
filters.forEach(filter => {
  filter.addEventListener('click', function () {
    // Identifier les filtres actifs
    const activeFilters = Array.from(filters)
      .filter(f => f.classList.contains('active'))
      .map(f => f.dataset.filter);

    // Ajouter/Retirer la classe "active" sur le bouton cliqué
    if (this.classList.contains('active')) {
      this.classList.remove('active');
    } else {
      this.classList.add('active');
    }

    // Mise à jour des éléments affichés en fonction des filtres actifs
    gridItems.forEach(item => {
      const categories = item.dataset.category.split(' ');

      // Si aucun filtre actif, tout afficher
      if (activeFilters.length === 0) {
        item.classList.remove('hidden');
      } else {
        // Vérifier si l'élément correspond à tous les filtres actifs
        const matchesAllFilters = activeFilters.every(filter => categories.includes(filter));
        if (matchesAllFilters) {
          item.classList.remove('hidden');
        } else {
          item.classList.add('hidden');
        }
      }
    });

    // Réorganiser les éléments visibles pour éviter les "trous"
    reorganizeGrid();
  });
});

// Fonction pour réorganiser la grille et éviter les trous
function reorganizeGrid() {
  const gridContainer = document.querySelector('.grid-container');
  const visibleItems = Array.from(gridItems).filter(item => !item.classList.contains('hidden'));

  // Réorganiser les éléments visibles sans effacer tout le contenu
  visibleItems.forEach(item => {
    gridContainer.appendChild(item);
  });
}

// Fonction pour vérifier si l'utilisateur est connecté
const isUserLoggedIn = () => {
  // Remplacez cette condition par votre propre logique de connexion
  return sessionStorage.getItem("loggedIn") === "true";
};

// Gérer les clics sur les boutons de cœur
const heartButtons = document.querySelectorAll(".price-bubble1");

heartButtons.forEach((button) => {
  button.addEventListener("click", (event) => {
    if (isUserLoggedIn()) {
      // Si l'utilisateur est connecté, remplir le cœur en rouge
      if (!button.classList.contains("liked")) {
        button.textContent = "❤️";
        button.classList.add("liked");

        // Appel à une API ou enregistrement dans la base de données
        fetch("/save-favorite", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            destination: button.parentElement.querySelector(".image-caption p strong").textContent,
          }),
        })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Erreur lors de l'enregistrement du favori.");
          }
        })
        .catch((error) => {
          console.error("Erreur:", error);
          button.textContent = "♡";
          button.classList.remove("liked");
        });
      } else {
        // Si déjà aimé, le désaimer
        button.textContent = "♡";
        button.classList.remove("liked");
      }
    } else {
      // Afficher le pop-up de connexion au lieu de rediriger vers une autre page
      showLoginModal();
    }
  });
});

// Fonction pour afficher le pop-up de connexion
function showLoginModal() {
  const modal = document.getElementById("loginModal");
  const closeButton = document.getElementById("closeModalBtn");

  // Afficher le pop-up modale
  modal.style.display = "block";

  // Fermer le pop-up si l'utilisateur clique sur le bouton de fermeture
  closeButton.addEventListener("click", function() {
    modal.style.display = "none";
  });
}

// Cacher le pop-up lorsque l'utilisateur clique en dehors de la modale
window.onclick = function(event) {
  const modal = document.getElementById("loginModal");
  if (event.target === modal) {
    modal.style.display = "none";
  }
}

document.addEventListener("DOMContentLoaded", () => {
  // Vérifiez si l'utilisateur est déjà connecté au moment du chargement de la page
  if (!isUserLoggedIn()) {
    console.log("Utilisateur non connecté.");
  } else {
    console.log("Utilisateur connecté.");
  }
});
