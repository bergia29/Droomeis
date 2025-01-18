<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles_formulaire_connexion.css">
    <title>Formulaire de connexion</title>
</head>

<body>
    <!-- En-tête avec navigation et sélection de langue -->
    <header class="header">
        <div class="logo">
            <img src="Logo.png" alt="Logo Droomreis" class="logo-image">
        </div>
        <nav class="nav">
    <a href="accueil.php" >Accueil</a>
    <a href="destination.php"class="active">Destinations</a>
    <a href="messagerie.php">Messagerie</a>
    <a href="contact.php">Contact</a>
    <a href="propos.php">A propos de nous</a>
        </nav>
        <div class="auth-buttons">
            <a href="Formulaire_inscription.php"class='auth-button'>S'inscrire</a>
        <a href="Formulaire_connexion.php"class='auth-button'>Se connecter</a>
        </div>
    </header>

    <!-- Formulaire de connexion -->
    <div class="Connexion">
        <h1>Connexion</h1>
        <p>Profitez de votre voyage !</p>
        <form action="traitement_connexion.php" method="post">
            <div>
                <label for="email">E-mail</label>
                <input type="email" id="email" name="emailU" placeholder="monadresse@gmail.com" required>
            </div>
    
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="passwordU" placeholder="Votre mot de passe" required>
            </div>
            <div>
                <a href="mdp_oublie.php" class="forgot-password">Mot de passe oublié ?</a>
            </div>
            <div>
                <button type="submit">Me connecter</button>
            </div>
            <div>
                <a href="Formulaire_inscription.php">Vous n'avez pas de compte ? Inscrivez-vous </a>
            </div>
        </form>
    </div>

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
