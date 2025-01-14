<?php
session_start();

// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Vérifier si l'ID de l'utilisateur à modifier est présent dans l'URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Récupérer les informations de l'utilisateur à partir de la base de données
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = :id");
    $stmt->execute([':id' => $userId]);
    $user = $stmt->fetch();

    // Si l'utilisateur est trouvé et le formulaire est soumis
    if ($user && $_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $role = $_POST['role'];
        $dateNaissance = $_POST['dateNaissance'];
        $adressePostale = $_POST['adressePostale'];
        
        // Si un nouveau mot de passe est fourni, on le hache
        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            // Sinon, conserver l'ancien mot de passe
            $password = $user['passwordU'];
        }

        // Mettre à jour les informations de l'utilisateur, y compris le mot de passe si modifié
        $stmt = $conn->prepare("UPDATE utilisateur SET emailU = :email, passwordU = :password, nomU = :nom, prénomU = :prenom, role = :role, dateNaissanceU = :dateNaissance, adressePostalU = :adressePostale WHERE idUtilisateur = :id");
        $stmt->execute([
            ':email' => $email,
            ':password' => $password,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':role' => $role,
            ':dateNaissance' => $dateNaissance,
            ':adressePostale' => $adressePostale,
            ':id' => $userId
        ]);

        echo "Utilisateur modifié avec succès.";
    }
} else {
    echo "Utilisateur non trouvé.";
}
?>

<main>
    <h2>Modifier l'utilisateur</h2>

    <!-- Formulaire de modification d'utilisateur -->
    <form action="edit_user.php?id=<?= $user['idUtilisateur'] ?>" method="POST">
        <label>Email :</label>
        <input type="email" name="email" value="<?= $user['emailU'] ?>" required>

        <!-- Mot de passe (laisser vide pour ne pas modifier) -->
        <label>Mot de passe (laisser vide pour ne pas modifier) :</label>
        <input type="password" name="password">

        <label>Nom :</label>
        <input type="text" name="nom" value="<?= $user['nomU'] ?>" required>

        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= $user['prénomU'] ?>" required>

        <label>Date de naissance :</label>
        <input type="date" name="dateNaissance" value="<?= $user['dateNaissanceU'] ?>" required>

        <label>Adresse :</label>
        <input type="text" name="adressePostale" value="<?= $user['adressePostalU'] ?>" required>

        <label>Rôle :</label>
        <select name="role" required>
            <option value="guide" <?= ($user['role'] == 'guide') ? 'selected' : '' ?>>Guide</option>
            <option value="voyageur" <?= ($user['role'] == 'voyageur') ? 'selected' : '' ?>>Voyageur</option>
        </select>

        <button type="submit">Modifier</button>
    </form>
</main>
