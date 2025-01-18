<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles_connexion_admin.css">
    <title>Connexion Administrateur</title>
</head>
<body>

    <!-- En-tête avec navigation et sélection de langue -->
    <header class="header">
        <div class="logo">
            <img src="Logo.png" alt="Logo Droomreis" class="logo-image">
        </div>
        <nav class="nav">
    
        </nav>
        <div class="auth-buttons">
            <a href="inscription_admin.php"class='auth-button'>S'inscrire</a>
        <a href="connexion_admin.php"class='auth-button'>Se connecter</a>
        </div>
    </header>

    <div class="content">
        <h1>Connexion Administrateur</h1>
        <form action="traitement_connexion_admin.php" method="post">
        
        <div>
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
        </div>

        <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Se connecter</button>

        <div>
        <a href="inscription_admin.php">Vous n'avez pas de compte ? Inscrivez-vous </a>
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
