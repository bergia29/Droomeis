<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Droomreis - Accueil</title>
  
  <!--Fichier css pour le menu, la barre de recherche et le pied de-->
  <link rel="stylesheet" href="General.css"> 
  
  <link rel="stylesheet" href="Style_accueil.css">
  <script src="Script_accueil.js" defer></script>

  <!--Logo dans l'onglet-->
  <link rel="icon" href="Flaticon1.png" type="image/png" sizes="48x48">

</head>

<body>
  <!-- En-tête avec navigation -->
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


  <div class="main-content">
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

    <!-- Section avec images de destinations -->
    <section class="destinations-section">
      <!-- Galerie d'images -->
      <div class="image-gallery">
        <div class="image-container">
          <img src="Destination_Maldives.jpg" alt="Destination Maldives">
          <div class="hover-text">Maldives</div>
        </div>
        <div class="image-container">
          <img src="Destination_Niagara.jpg" alt="Chute du Niagara">
          <div class="hover-text">Niagara</div>
        </div>
        <div class="image-container">
          <img src="Destination_Paris.jpg" alt="Paris">
          <div class="hover-text">Paris</div>
        </div>
        <div class="image-container">
          <img src="Destination_Milan.png" alt="Milan">
          <div class="hover-text">Milan</div>
        </div>
        <div class="image-container">
          <img src="Destination-_Madrid.jpg" alt="Madrid">
          <div class="hover-text">Madrid</div>
        </div>
      </div>
    </section>


    <!-- Section des avis fictifs -->
    <section class="reviews-section">
      <div class="review">
        <div class="review-text">
          <p><strong>John Doe</strong></p>
          <p>"Super expérience, les guides étaient incroyables et les destinations époustouflantes. Je recommande vivement Droomreis !"</p>
        </div>
      </div>
      
      <div class="review">
        <div class="review-text">
          <p><strong>Sarah Martin</strong></p>
          <p>"Des vacances inoubliables ! Le service était parfait et les guides locaux ont fait toute la différence. Une expérience à refaire."</p>
        </div>
      </div>
      <div class="review">
        <div class="review-text">
          <p><strong>Jack Dawson</strong></p>
          <p>"Des vacances inoubliables ! Le service était parfait et les guides locaux ont fait toute la différence. Une expérience à refaire."</p>
        </div>
      </div>
    </section>
  </div>


  <!-- Footer-->
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


  <!--
  <a href="accueil.php">
      <img src="Logo.png" alt="Logo Droomreis" class="logo-image-footer">
    </a>
    <a href="#">Mentions légales</a>
    <a href="#">Twitter</a>
    <a href="#">TikTok</a>
    <a href="#">Instagram</a>
    <p class="copyright">Droomreis © 2024</p>
-->
</body>
</html>
