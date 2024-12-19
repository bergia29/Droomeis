<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Droomreis</title>
  
  <link rel="stylesheet" href="General.css">
  <link rel="stylesheet" href="propos.css">
  <script src="script_accueil.js" defer></script>
</head>

<body>
  <!-- En-tête avec navigation -->
  <header class="header">
    <div class="logo">
      <a href="accueil.php"><img src="Logo.png" alt="Logo Droomreis" class="logo-image"></a>
    </div>
    <nav class="nav">
      <a href="accueil.php" >Accueil</a>
      <a href="destination.php">Destinations</a>
      <a href="messagerie.php">Messagerie</a>
      <a href="contact.php">Contact</a>
      <a href="propos.php"class="active">À propos de nous</a>
    </nav>
    <div class="auth-buttons">
      <a href="Formulaire_inscription.html" class='auth-button'>S'inscrire</a>
      <a href="Formulaire_connexion.html" class='auth-button'>Se connecter</a>
    </div>
  </header>


  <!-- Section de recherche -->
  <section class="search-section">
    <form class="search-form" action="recherche.php" method="GET">
      <input type="text" placeholder="Destination" name="destination" aria-label="Recherche de destination">
      <input type="date" name="date" aria-label="Choisir une date">
      <select name="ville" aria-label="Choisir une destination">
        <?php include 'get_villes.php'; ?>
      </select>
      <button type="submit">Rechercher</button>
    </form>
  </section>


  <!-- Formulaire de connexion -->
  <div class="Connexion">
        <h1>Droomreis</h1>
        <form method="post">
            <p>Droomreis est une plateforme permettant de réserver des guides locaux.</p>
            <p>Droomreis est une site concue pour un gain de temps pour nos voyageurs.</p>
            <p>Ce site est conçu par la société 2CDHGroup</p>
        </form>
    </div>

  <!-- Pied de page -->
  <footer class="footer">
    <a href="accueil.php">
      <img src="Logo.png" alt="Logo Droomreis" class="logo-image-footer">
    </a>
    <a href="#">Mentions légales</a>
    <a href="#">Twitter</a>
    <a href="#">TikTok</a>
    <a href="#">Instagram</a>
    <p class="copyright">Droomreis © 2024</p>
  </footer>
</body>
</html>
