<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foire aux question - Droomreis</title>

    <link rel="stylesheet" href="General.css">

    <link rel="stylesheet" href="faq.css">

    <!--Logo dans l'onglet-->
    <link rel="icon" href="Flaticon1.png" type="image/png" sizes="48x48">

    
</head>
<body>
    <header class="header">
    <div class="logo">
      <a href="accueil.php"><img src="Logo.png" alt="Logo Droomreis" class="logo-image"></a>
    </div>
    <nav class="nav"> <!-- Menu -->
      <a href="accueil.php" class="active">Accueil</a>
      <a href="destination.php">Destinations</a>
      <a href="messagerie.php">Messagerie</a>
      <a href="contact.php">Contact</a>
      <a href="propos.php">À propos de nous</a>
    </nav>
    <div class="auth-buttons">
      <a href="Formulaire_inscription.html" class='auth-button'>S'inscrire</a>
      <a href="Formulaire_connexion.html" class='auth-button'>Se connecter</a>
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
        <details>
            <summary>Question 1 : Comment fonctionne ce site ?</summary>
            <p>Ce site fonctionne grâce à une combinaison de HTML, CSS, et JavaScript.</p>
        </details>

        <details>
            <summary>Question 2 : Où puis-je trouver plus d'informations ?</summary>
            <p>Vous pouvez consulter notre page d'aide ou nous contacter via notre formulaire.</p>
        </details>

        <details>
            <summary>Question 3 : Puis-je vous contacter directement ?</summary>
            <p>Oui, bien sûr. Cliquez sur le bouton "Contactez-nous" en bas de page.</p>
        </details>
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
              <td><a href="#">FAQ</a></td>
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