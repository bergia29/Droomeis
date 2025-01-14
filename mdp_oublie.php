<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mot de Passe Oublié</title>
  <link rel="stylesheet" href="Style_mdp_oublie.css">
</head>

<!-- En-tête avec navigation -->
<header class="header">
    <div class="logo">
      <a href="accueil.html"><img src="Logo.png" alt="Logo Droomreis" class="logo-image"></a>
    </div>
    <nav class="nav">
    <a href="accueil.php" class="active">Accueil</a>
      <a href="destination.php">Destinations</a>
      <a href="messagerie.php">Messagerie</a>
      <a href="contact.php">Contact</a>
      <a href="propos.php">A propos de nous</a>
    </nav>
    <div class="auth-buttons">
    <a href="Formulaire_inscription.php"class='auth-button'>S'inscrire</a>
    <a href="Formulaire_connexion.php"class='auth-button'>Se connecter</a>
    </div>
  </header>

<body>
  <div class="password-reset-container">
    <h2>Mot de Passe Oublié</h2>
    <p>Entrez votre email pour recevoir un lien de réinitialisation.</p>
    
    <form method="POST" action="traitement_mdp_oublie.php">
      <label for="email">Adresse Email :</label>
      <input type="email" id="email" name="email" required placeholder="Votre email">
      <button type="submit">Envoyer le lien</button>
    </form>
    
    <p><a href="Formulaire_connexion.php">Retour à la connexion</a></p>
  </div>

  <!-- Pied de page -->
  <footer class="footer">
    <a href="accueil.html"><img src="Logo.png" alt="Logo Droomreis" class="logo-image-footer"></a>
    <a href="#">Mentions légales</a>
    <a href="#">Twitter</a>
    <a href="#">TikTok</a>
    <a href="#">Instagram</a>
    <p class="copyright">Droomreis © 2024</p>
  </footer>
  
</body>
</html>
