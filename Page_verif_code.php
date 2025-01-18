<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_verif_code.css">
    <title>Vérification du Code</title>
</head>

<body>
    <!-- En-tête avec navigation et sélection de langue -->
    <header class="header">
        <div class="logo">
            <img src="Logo.png" alt="Logo Droomreis" class="logo-image">
        </div>
        <nav class="nav">
            <a href="accueil.php">Accueil</a>
            <a href="destination.php" class="active">Destinations</a>
            <a href="messagerie.php">Messagerie</a>
            <a href="contact.php">Contact</a>
            <a href="propos.php">A propos de nous</a>
        </nav>
        <div class="auth-buttons">
            <a href="Formulaire_inscription.html" class="button"> S'inscrire </a>
            <a href="Formulaire_connexion.html" class="button"> Se connecter </a>
        </div>
    </header>

    <div class="Verification">
        <h1>Vérification du Code</h1>
        <p>Un code vous a été envoyé par e-mail. Veuillez le saisir ci-dessous pour finaliser votre inscription.</p>

        <form action="verifier_code.php" method="post">
            <div>
                <label for="code">Code de vérification</label>
                <input type="text" id="code" name="verificationCode" placeholder="Entrez le code reçu" required>
            </div>
            <div>
                <button type="submit">Vérifier</button>
            </div>
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
