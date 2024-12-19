<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'mydb'; // Nom de la base de données
$username = 'root';
$password = ''; // Mot de passe vide

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifie si une destination a été choisie
    if (isset($_GET['destination']) && !empty($_GET['destination'])) {
        $destination = $_GET['destination']; // Destination sélectionnée

        // Prépare une requête pour récupérer les détails de la destination
        $stmt = $pdo->prepare("SELECT * FROM Destination WHERE nomD = :nomD");
        $stmt->bindParam(':nomD', $destination, PDO::PARAM_STR);
        $stmt->execute();

        // Vérifie si la destination existe
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Affiche les détails de la destination
            echo '<h1>Résultats pour : ' . htmlspecialchars($result['nomD']) . '</h1>';
            echo '<p><strong>Description :</strong> ' . htmlspecialchars($result['description']) . '</p>';
            echo '<p><strong>Localisation :</strong> ' . htmlspecialchars($result['localisation']) . '</p>';
        } else {
            echo '<p>Aucune destination trouvée pour "' . htmlspecialchars($destination) . '".</p>';
        }
    } else {
        echo '<p>Veuillez choisir une destination.</p>';
    }
} catch (PDOException $e) {
    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
}
?>
