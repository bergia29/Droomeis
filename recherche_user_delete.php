<?php
session_start();


// Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Si l'utilisateur a soumis l'ID pour la recherche
if (isset($_POST['idUtilisateur'])) {
    $idUtilisateur = $_POST['idUtilisateur'];

    // Requête pour récupérer les données de l'utilisateur en fonction de son ID
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = :id");
    $stmt->execute([':id' => $idUtilisateur]);
    $user = $stmt->fetch();

    // Si l'utilisateur existe
    if ($user) {
        // Redirection vers la page de modification avec les données de l'utilisateur
        header('Location: delete_user.php?id=' . $user['idUtilisateur']);
        exit();
    } else {
        echo "Utilisateur non trouvé.";
    }
}
?>

<main>
    <h2>Rechercher un utilisateur par ID</h2>
    <form action="recherche_user_delete.php" method="POST">
        <label>Entrez l'ID de l'utilisateur :</label>
        <input type="number" name="idUtilisateur" required>
        <button type="submit">Rechercher</button>
    </form>
</main>
