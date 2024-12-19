<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Droomreis</title>
  
  <link rel="stylesheet" href="General.css">
  <link rel="stylesheet" href="contact.css">

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
      <a href="contact.php"class="active">Contact</a>
      <a href="propos.php">À propos de nous</a>
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

  <div class="Contact">
    <h1>Nous contacter</h1>
    <form method="post">
      <p class='Contact_admin'>Contactez notre équipe pour en savoir plus sur Droomreis </p>
    </form>
    <form action="traitement_inscription.php" method="post">
        <div>
            <label for="prénomC">Prénom</label>
            <input type="text" id="prénom" name="prénomC" placeholder="Sarah" required autofocus>
        </div>
        <div>
            <label for="nomC">Nom</label>
            <input type="text" id="nom" name="nomC" placeholder="DURAND" required>
        </div>
        <div>
            <label for="emailC">E-mail</label>
            <input type="email" id="email" name="emailC" placeholder="monadresse@gmail.com" required>
        </div>
        <div>
            <label for="objet">Objet :</label>
            <select id="objet" name="objetC" required aria-label="Sélectionnez votre motif">
                <option value="" disabled selected>Choisissez un motif</option>
                <option value="question">Question</option>
                <option value="autre">Autre</option>
            </select>
        </div>
        <div>
          <label for="contenuC">Contenu</label>
          <textarea id="contenuC" name="contenuC" placeholder="Écrivez votre message ici" required></textarea>
        </div>

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
