// Fonction pour la recherche dynamique des destinations
function searchDestination() {
  const query = document.getElementById('search-destination').value;

  // Si le champ est vide, vide également les résultats
  if (query.length === 0) {
    document.getElementById('search-results').innerHTML = ''; 
    return;
  }

  // Envoie une requête AJAX pour récupérer les destinations correspondant à la recherche
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `recherche.php?query=${encodeURIComponent(query)}`, true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Récupère le conteneur de résultats et vide les anciens
      const resultsContainer = document.getElementById('search-results');
      resultsContainer.innerHTML = '';

      const destinations = JSON.parse(xhr.responseText); // On suppose que la réponse est en JSON

      // Si des destinations sont trouvées, on les affiche sous forme de liste
      if (destinations.length > 0) {
        destinations.forEach(destination => {
          const div = document.createElement('div');
          // Concatène la ville et le pays
          div.textContent = `${destination.ville}, ${destination.pays}`;
          div.classList.add('search-item');  // Ajoute une classe CSS pour la sélection

          // Ajoute un attribut data-id pour stocker l'ID de la destination
          div.setAttribute('data-id', destination.id);
          
          // Affiche les résultats dans le conteneur
          resultsContainer.appendChild(div);
        });
      } else {
        resultsContainer.innerHTML = '<div>Aucune destination trouvée</div>';
      }
    }
  };

  xhr.send();
}

// Fonction pour gérer la sélection d'une destination dans les résultats
document.addEventListener('click', function (e) {
  if (e.target && e.target.matches('.search-item')) {
    const destinationText = e.target.textContent; // Récupère la destination (ville, pays)
    const destinationId = e.target.getAttribute('data-id'); // Récupère l'ID de la destination sélectionnée

    // Insère la destination dans le champ de recherche
    document.getElementById('search-destination').value = destinationText;

    // Ajoute un attribut data-id au champ de recherche pour l'ID de la destination
    document.getElementById('search-destination').setAttribute('data-id', destinationId);

    // Vide la liste des résultats après la sélection
    document.getElementById('search-results').innerHTML = ''; 
  }
});

// Fonction pour traiter la soumission du formulaire
document.querySelector('.search-form').addEventListener('submit', function(e) {
  const destinationId = document.getElementById('search-destination').getAttribute('data-id');

  // Si un ID de destination est sélectionné, on ajoute cet ID à l'URL de la recherche
  if (destinationId) {
    const searchUrl = `activites.php?id=${destinationId}`;
    // Redirige vers la page des activités avec l'ID de la destination
    window.location.href = searchUrl;
  } else {
    // Si aucune destination n'est sélectionnée, la recherche est envoyée normalement
    // Vous pouvez ajouter une validation ici pour empêcher l'envoi si le champ est vide
  }

  // Empêche la soumission du formulaire pour éviter le comportement par défaut
  e.preventDefault();
});

