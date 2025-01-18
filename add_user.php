<?php
session_start();

// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Traitement de l'ajout de l'utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $role = $_POST['role'];

    // Insertion de l'utilisateur dans la base de données
    $stmt = $conn->prepare("INSERT INTO utilisateur (emailU, passwordU, nomU, prénomU, role) VALUES (:email, :password, :nom, :prenom, :role)");
    $stmt->execute([
        ':email' => $email,
        ':password' => $password,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':role' => $role
    ]);

    // Rediriger pour afficher le pop-up après l'ajout
    echo "<script type='text/javascript'>
    alert('L\'utilisateur a bien été ajouté.');
    window.location.href = 'dashboard.php'; // Redirection vers index.php après l'ajout
  </script>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
</head>
<body>

<h2>Ajouter un utilisateur</h2>

<form method="POST" action="add_user.php">
    <label>Email :</label>
    <input type="email" name="email" required>
    <br>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>
    <br>

    <label>Nom :</label>
    <input type="text" name="nom" required>
    <br>

    <label>Prénom :</label>
    <input type="text" name="prenom" required>
    <br>

    <label>Rôle :</label>
    <select name="role" required>
        <option value="guide">Guide</option>
        <option value="voyageur">Voyageur</option>
    </select>
    <br>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>
