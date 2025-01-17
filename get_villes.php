<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'mydb'; // Nom de la base de données
$username = 'root';
$password = ''; // Mot de passe vide

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les noms des destinations
    $stmt = $pdo->query("SELECT DISTINCT nomD FROM Destination ORDER BY nomD ASC");

    // Génération des balises <option>
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . htmlspecialchars($row['nomD']) . '">' . htmlspecialchars($row['nomD']) . '</option>';
    }
} catch (PDOException $e) {
    echo '<option value="">Erreur : Impossible de charger les destinations</option>';
}
?>
