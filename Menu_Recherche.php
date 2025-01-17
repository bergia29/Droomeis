<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'mydb'; // Nom de la base de données
$username = 'root';
$password = ''; // Mot de passe vide

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Récupération de la requête utilisateur
$query = $_GET['query'] ?? '';

if ($query) {
    // Requête pour chercher les pays correspondant
    $stmt = $pdo->prepare("SELECT localisation FROM destination WHERE localisation LIKE :query");
    $stmt->execute(['query' => $query . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($results); // Retourne les résultats sous forme de JSON        SELECT localisation FROM `destination`
}
?>