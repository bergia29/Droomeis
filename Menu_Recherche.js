document.getElementById('search-input').addEventListener('input', function () {
    const query = this.value;
    const suggestionsContainer = document.getElementById('suggestions');

    if (query.length >= 2) {
      fetch('autocomplete.php?query=' + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
          suggestionsContainer.innerHTML = '';
          data.forEach(item => {
            const suggestion = document.createElement('div');
            suggestion.textContent = item;
            suggestion.addEventListener('click', function () {
              document.getElementById('search-input').value = this.textContent;
              suggestionsContainer.innerHTML = ''; // Vide les suggestions après la sélection
            });
            suggestionsContainer.appendChild(suggestion);
          });
        })
        .catch(error => console.error('Erreur :', error));
    } else {
      suggestionsContainer.innerHTML = ''; // Vide les suggestions si le texte est trop court
    }
});
