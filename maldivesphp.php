<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités de Rêve</title>
    <link rel="stylesheet" href="stylemaldives.css">
</head>
<body>
    <header>
        <div class="hero-section">
            <h1>Explorez Nos Activités Exceptionnelles</h1>
            <p>Découvrez des aventures inoubliables avec nos guides experts.</p>
        </div>
    </header>

    <section id="activities" class="activities-section">
        <h2>Donner une note à l'activité</h2>
        <form action="maldivestrait.php" method="POST">
            <input type="hidden" name="activity_id" value="1"> <!-- ID de l'activité -->
            <label for="rating">Donner une note :</label>
            <select name="rating" id="rating">
                <option value="1">1 étoile</option>
                <option value="2">2 étoiles</option>
                <option value="3">3 étoiles</option>
                <option value="4">4 étoiles</option>
                <option value="5">5 étoiles</option>
            </select>
            <button type="submit">Soumettre</button>
        </form>
    </section>

    <footer>
        <p>&copy; Droomreis. Tous droits réservés.</p>
    </footer>
</body>
</html>
