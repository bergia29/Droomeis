document.getElementById("form-ajouter-destination").addEventListener("submit", function(e) {
    e.preventDefault(); // Empêche le comportement par défaut du formulaire (rechargement de la page)

    var formData = new FormData(this); // Crée un objet FormData avec les données du formulaire

    // Envoie la requête AJAX
    fetch("ajouter_destinations.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Affiche le message de réponse (succès ou erreur)
        
        // Après ajout réussi, ajouter la nouvelle destination à la page dynamiquement
        let nouvelleDestination = `
            <div class="grid-item" data-category="${formData.get('categorie')}">
                <img src="${URL.createObjectURL(formData.get('image'))}" alt="${formData.get('nom')}" class="grid-item-image">
                <div class="image-caption">
                    <p><strong>${formData.get('nom')}</strong></p>
                    <p class="caption">${formData.get('description')}</p>
                </div>
                <button class="price-bubble">À partir de ${formData.get('prix')}€ TTC*</button>
            </div>
        `;
        
        // Ajoute la nouvelle destination à la grille
        document.querySelector('.grid-container').innerHTML += nouvelleDestination;
    })
    .catch(error => console.error("Erreur:", error));
});
