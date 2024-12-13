<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles_formulaire_inscription.css">
    <title>Formulaire d'inscription</title>
</head>

<body>
    <!-- En-tête avec navigation et sélection de langue -->
    <header class="header">
        <div class="logo">
            <img src="Logo.png" alt="Logo Droomreis" class="logo-image">
        </div>
        <nav class="nav">
            <a href="#">Accueil</a>
            <a href="#">Destinations</a>
            <a href="#">Messagerie</a>
            <a href="#">Contact</a>
        </nav>
        <div class="auth-buttons">
            <a href="Formulaire_inscription.html" class="button"> S'inscrire </a>
            <a href="Formulaire_connexion.html" class="button"> Se connecter </a>
        </div>
    </header>

    <!-- Formulaire d'inscription -->
    <div class="Inscription">
        <h1>Inscription</h1>
        <p>Envie de vous évader ? Mais pas assez de temps pour planifier une activité ? DROOMREIS est ce qu'il vous
            faut !</p>
        <form action="traitement_inscription.php" method="post">
            <div>
                <label for="prénomU">Prénom</label>
                <input type="text" id="prénom" name="prénomU" placeholder="Charnelle" required autofocus>
            </div>
            <div>
                <label for="nomU">Nom</label>
                <input type="text" id="nom" name="nomU" placeholder="LAROSEE" required>
            </div>
            <div>
                <label for="emailU">E-mail</label>
                <input type="email" id="email" name="emailU" placeholder="monadresse@gmail.com" required>
            </div>
            <div>
                <label for="dateNaissanceU">Date de Naissance</label>
                <input type="date" id="dateNaissance" name="dateNaissanceU" required>
            </div>
            <div>
                <label for="adressePostalU">Adresse postale</label>
                <input type="text" id="adressePostale" name="adressePostalU" placeholder="Paris" required>
            </div>
            <div>
                <label for="passwordU">Mot de passe</label>
                <input type="password" id="password" name="passwordU" placeholder="Votre mot de passe" required>
            </div>
            <div>
                <label for="role">Êtes-vous :</label>
                <select id="role" name="roleU" required aria-label="Sélectionnez votre rôle, guide ou voyageur">
                    <option value="" disabled selected>Choisissez une option</option>
                    <option value="guide">Guide</option>
                    <option value="voyageur">Voyageur</option>
                </select>
            </div>
            <div>
                <button type="submit">M'inscrire</button>
            </div>
            <div>
                <a href="Formulaire_connexion.html">Vous avez un compte ? Connectez-vous </a>
            </div>
        </form>
    </div>

    <!-- <footer>
        <p>&copy; 2024 Droomreis. Tous droits réservés.</p>
    </footer>-->
</body>

</html>
