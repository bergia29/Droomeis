<?php
session_start();

// Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Requête pour récupérer l'utilisateur
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = :id");
    $stmt->execute([':id' => $userId]);
    $user = $stmt->fetch();

    // Si l'utilisateur existe, afficher la page de confirmation
    if ($user) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer l'utilisateur de la base de données
            $stmt = $conn->prepare("DELETE FROM utilisateur WHERE idUtilisateur = :id");
            $stmt->execute([':id' => $userId]);

            echo "Utilisateur supprimé avec succès.";
            exit();
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "Aucun ID utilisateur trouvé.";
}
?>

<main>
    <h2>Suppression d'un utilisateur</h2>
    <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>

    <form method="POST">
        <button type="submit">Oui, supprimer cet utilisateur</button>
        <a href="index.php">Annuler</a>
    </form>
</main>
