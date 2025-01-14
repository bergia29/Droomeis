<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_formulaire_reinitialisation.css">
    <title>Réinitialisation du mot de passe</title>
</head>


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

    <body>
    <div class="reinitialisation-container">
    <h2>Réinitialisation de votre mot de passe</h2>
    <p>Entrez votre nouveau mot de passe.</p>

    <form action="changer_mdp.php" method="POST">
        <!-- Champ caché pour envoyer le token -->
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">

        <!-- Champ pour le nouveau mot de passe -->
        <label for="new_password">Nouveau mot de passe :</label>
        <input type="password" name="new_password" required>

        <!-- Champ pour confirmer le mot de passe -->
        <label for="confirm_password">Confirmer le mot de passe :</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Changer le mot de passe</button>
    </form>
    </div>

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
