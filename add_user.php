<?php
// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO utilisateur (emailU, passwordU, nomU, prénomU, role, cree_a) VALUES (:email, :password, :nom, :prenom, :role, NOW())");
    $stmt->execute([
        ':email' => $email,
        ':password' => $password,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':role' => $role,
    ]);

    echo "Utilisateur ajouté avec succès.";
}
?>

<main>
    <h2>Ajouter un utilisateur</h2>
    <form action="add_user.php" method="POST">
        <label>Email :</label>
        <input type="email" name="email" required>
        <label>Mot de passe :</label>
        <input type="password" name="password" required>
        <label>Nom :</label>
        <input type="text" name="nom" required>
        <label>Prénom :</label>
        <input type="text" name="prenom" required>
        <label>Rôle :</label>
        <select name="role" required>
            <option value="guide">Guide</option>
            <option value="voyageur">Voyageur</option>
        </select>
        <button type="submit">Ajouter</button>
    </form>
</main>

<?php

?>
