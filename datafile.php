<?php
// Sauvegarde du favori (ajout ou suppression)
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Utilisateur non connecté']);
    exit();
}

$userId = $_SESSION['user_id']; // L'ID de l'utilisateur connecté
$data = json_decode(file_get_contents("php://input"), true); // Récupération des données envoyées via AJAX

$activityId = $data['activityId']; // L'ID de l'activité
$isActive = $data['isActive']; // L'état du cœur : actif (1) ou non (0)

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', ''); // Remplacez par vos paramètres de connexion

// Vérification si l'activité est déjà dans les favoris
$query = $pdo->prepare('SELECT * FROM `Favoris` WHERE `idUtilisateur` = :userId AND `Activité_idActivité` = :activityId');
$query->execute(['userId' => $userId, 'activityId' => $activityId]);
$favorite = $query->fetch();

// Si l'activité existe déjà, on la supprime si le cœur est désactivé
if ($favorite) {
    if ($isActive == 0) {
        // Supprimer de la table `Favoris`
        $deleteQuery = $pdo->prepare('DELETE FROM `Favoris` WHERE `idUtilisateur` = :userId AND `Activité_idActivité` = :activityId');
        $deleteQuery->execute(['userId' => $userId, 'activityId' => $activityId]);
    }
} else {
    // Si l'activité n'est pas encore dans les favoris, on l'ajoute si le cœur est activé
    if ($isActive == 1) {
        // Ajouter à la table `Favoris`
        $insertQuery = $pdo->prepare('INSERT INTO `Favoris` (`idUtilisateur`, `Activité_idActivité`, `Activité_Destination_idDestination`) 
                                      VALUES (:userId, :activityId, (SELECT `Destination_idDestination` FROM `Activité` WHERE `idActivité` = :activityId))');
        $insertQuery->execute(['userId' => $userId, 'activityId' => $activityId]);
    }
}

// Réponse au client
echo json_encode(['success' => true]);
?>
