<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foire aux questions - Droomreis</title>

    <link rel="stylesheet" href="General.css">
    <link rel="stylesheet" href="faq.css">

    <!-- Logo dans l'onglet -->
    <link rel="icon" href="Flaticon1.png" type="image/png" sizes="48x48">
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="accueil.php"><img src="Logo.png" alt="Logo Droomreis" class="logo-image"></a>
        </div>
        <nav class="nav"> <!-- Menu -->
            <a href="accueil.php">Accueil</a>
            <a href="destination.php">Destinations</a>
            <a href="messagerie.php">Messagerie</a>
            <a href="contact.php">Contact</a>
            <a href="propos.php">À propos de nous</a>
        </nav>
        <div class="auth-buttons">
            <a href="Formulaire_inscription.html" class="auth-button">S'inscrire</a>
            <a href="Formulaire_connexion.html" class="auth-button">Se connecter</a>
        </div>
    </header>

    <section class="search-section">
        <form class="search-form" action="recherche.php" method="GET">
            <input type="text" placeholder="Pays" name="destination" aria-label="Recherche de destination">
            <input type="date" name="date" aria-label="Choisir une date">
            <select name="ville" aria-label="Choisir une destination">
                <?php include 'get_villes.php'; ?>
            </select>
            <button type="submit">Rechercher</button>
        </form>
    </section>

    <section class="faq">
        <h1>Foire aux Questions</h1>
        <?php
        // Connexion à la base de données
        $host = 'localhost';
        $dbname = 'mydb'; // Nom de la base de données
        $username = 'root';
        $password = ''; // Mot de passe vide

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Récupération des données de la table `faq`
            $stmt = $pdo->query("SELECT questionF, réponseF FROM faq ORDER BY dateCréationF DESC");
            $faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Affichage dynamique des questions/réponses
            if (!empty($faqs)) {
                foreach ($faqs as $faq) {
                    echo '<details>';
                    echo '<summary>' . htmlspecialchars($faq['questionF'], ENT_QUOTES, 'UTF-8') . '</summary>';
                    echo '<p>' . htmlspecialchars($faq['réponseF'], ENT_QUOTES, 'UTF-8') . '</p>';
                    echo '</details>';
                }
            } else {
                echo '<p>Aucune question fréquemment posée pour le moment.</p>';
            }
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
        }
        ?>
    </section>

    <footer>
        <div class="footer-content">
          <div class="img_footer">
            <a href="accueil.php"><img src="Logo.png" alt="Logo Droomreis" class="logo-size"></a>
          </div>
          <table class="table_footer">
            <tr>
              <th>Assistance et FAQ</th>
              <th>Réseaux sociaux</th>
              <th>Politiques</th>
            </tr>
            <tr>
              <td><a href="faq.php">FAQ</a></td>
              <td><a href="#">Instagram</a></td>
              <td><a href="#">Mentions légales</a></td>
            </tr>
            <tr>
              <td><a href="contact.php">Nous Contacter</a></td>
              <td></td>
              <td><a href="#">Cookies</a></td>
            </tr>
          </table>
          <p class="copyright">Droomreis © 2025</p>
        </div>
    </footer>
</body>
</html>
