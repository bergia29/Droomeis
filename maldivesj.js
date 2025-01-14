document.querySelectorAll('.rating').forEach(ratingElement => {
    const score = parseFloat(ratingElement.getAttribute('data-score'));
    const fullStars = Math.floor(score);
    const halfStar = score % 1 >= 0.5;
    const maxStars = 5;

    let starsHTML = '';

    for (let i = 0; i < fullStars; i++) {
        starsHTML += '&#9733;'; // Étoile pleine
    }

    if (halfStar) {
        starsHTML += '&#9733;'; // Étoile pleine pour une demi-étoile (utilisez une icône spécifique si nécessaire)
    }

    for (let i = fullStars + halfStar; i < maxStars; i++) {
        starsHTML += '&#9734;'; // Étoile vide
    }

    ratingElement.innerHTML = starsHTML;
})

const express = require('express');
const app = express();
const mysql = require('mysql');
app.use(express.json());

// Connexion à la base de données MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',  // Ajoute ton mot de passe si nécessaire
  database: 'activites'
});

// Route pour enregistrer une note
app.post('/rate', (req, res) => {
  const { activityId, userId, score } = req.body;

  // Insérer la note dans la base de données
  db.query('INSERT INTO ratings (activity_id, user_id, score) VALUES (?, ?, ?)', [activityId, userId, score], (err) => {
    if (err) return res.status(500).send('Erreur de base de données');
    res.status(200).send('Note enregistrée avec succès');
  });
});

// Route pour récupérer la moyenne des notes d'une activité
app.get('/average-rating/:activityId', (req, res) => {
  const activityId = req.params.activityId;

  // Calculer la moyenne des notes pour cette activité
  db.query('SELECT AVG(score) AS average FROM ratings WHERE activity_id = ?', [activityId], (err, results) => {
    if (err) return res.status(500).send('Erreur de base de données');
    
    const average = results[0].average;
    res.json({ average });
  });
});

// Démarrer le serveur sur le port 3000
app.listen(3000, () => {
  console.log('Serveur démarré sur http://localhost:3000');
});

 document.querySelectorAll('.rating').forEach(ratingElement => {
        const score = parseFloat(ratingElement.getAttribute('data-score'));
        const fullStars = Math.floor(score);
        const halfStar = score % 1 >= 0.5;
        const maxStars = 5;

        let starsHTML = '';

        // Ajouter des étoiles pleines
        for (let i = 0; i < fullStars; i++) {
            starsHTML += '&#9733;'; // Étoile pleine
        }

        // Ajouter une demi-étoile si nécessaire
        if (halfStar) {
            starsHTML += '&#9733;'; // Étoile pleine pour une demi-étoile
        }

        // Ajouter des étoiles vides pour le reste
        for (let i = fullStars + halfStar; i < maxStars; i++) {
            starsHTML += '&#9734;'; // Étoile vide
        }

        // Insérer les étoiles dans l'élément
        ratingElement.innerHTML = starsHTML;
    });