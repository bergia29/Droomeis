<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Inscription Administrateur</title>
</head>
<body>
    <form action="traitement_inscription_admin.php" method="post">
        <h1>Inscription Administrateur</h1>
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirmer le mot de passe</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
