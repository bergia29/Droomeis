<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: Formulaire_connexion.php");
    exit;
}

// Récupérer l'email de l'utilisateur connecté
$email_utilisateur = htmlspecialchars($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Droomreis</title>
  
  <link rel="stylesheet" href="General.css">
  <link rel="stylesheet" href="Style_accueil_php.css">
  <script src="script_accueil.js" defer></script>
</head>

<body>
  <!-- En-tête avec navigation -->
  <header class="header">
    <div class="logo">
      <a href="accueil.php"><img src="Logo.png" alt="Logo Droomreis" class="logo-image"></a>
    </div>
    <nav class="nav">
      <a href="accueil.php" class="active">Accueil</a>
      <a href="destination.php">Destinations</a>
      <a href="messagerie.php">Messagerie</a>
      <a href="contact.php">Contact</a>
      <a href="propos.php">A propos de nous</a>
    </nav>
    <div class="auth-buttons">
      <a href="deconnexion.php">Se déconnecter</a>
    </div>
  </header>

  <!-- Message de bienvenue -->
  <section class="welcome-message">
    <p>Bienvenue, <?php echo $email_utilisateur; ?>!</p>
  </section>

  <!-- Section de recherche -->
  <section class="search-section">
    <form class="search-form" method="GET" action="recherche.php">
      <label for="destination">Destination:</label>
      <input type="text" id="destination" name="destination" placeholder="Destination" aria-label="Recherche de destination">
      
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" aria-label="Choisir une date">
      
      <label for="destination-select">Choisir une destination:</label>
      <select id="destination-select" name="destination-select" aria-label="Choisir une destination">
        <option value="1">Paris</option>
        <option value="2">Milan</option>
        <option value="3">Etretat</option>
        <option value="4">Lyon</option>
        <option value="5">5+</option>
      </select>
      
      <button type="submit">Rechercher</button>
    </form>
  </section>

  <!-- Section avec images de destinations -->
  <section class="destinations-section">
    <!-- Bouton gauche -->
    <button class="scroll-button left">&lt;</button>
    
    <!-- Galerie d'images -->
    <div class="image-gallery">
      <div class="image-container">
        <img src="Destination_Maldives.jpg" alt="Plage et lagon des Maldives" />
        <div class="hover-text">Maldives</div>
      </div>
      <div class="image-container">
        <img src="Destination_Niagara.jpg" alt="Chute du Niagara" />
        <div class="hover-text">Niagara</div>
      </div>
      <div class="image-container">
        <img src="Destination_Paris.jpg" alt="Vue de Paris" />
        <div class="hover-text">Paris</div>
      </div>
      <div class="image-container">
        <img src="Destination_Milan.png" alt="Vue de Milan" />
        <div class="hover-text">Milan</div>
      </div>
      <div class="image-container">
        <img src="Destination_Madrid.jpg" alt="Vue de Madrid" />
        <div class="hover-text">Madrid</div>
      </div>
      <div class="image-container">
        <img src="Destination_Amazonie.jpg" alt="Forêt tropicale de l'Amazonie" />
        <div class="hover-text">Amazonie</div>
      </div>
    </div>
    
    <!-- Bouton droit -->
    <button class="scroll-button right">&gt;</button>
  </section>
  
  <h1>Droomreis est un site de réservation de guides locaux. 
    Vous pourrez préparer vos vacances en toute tranquillité et vous laisser emporter par nos guides locaux!</h1>

  <!-- Pied de page -->
  <footer class="footer">
    <a href="accueil.php"><img src="Logo.png" alt="Logo Droomreis" class="logo-image-footer"></a>
    <a href="#">Mentions légales</a>
    <a href="#">Twitter</a>
    <a href="#">TikTok</a>
    <a href="#">Instagram</a>
    <p class="copyright">Droomreis © 2024</p>
  </footer>
</body>
</html>
