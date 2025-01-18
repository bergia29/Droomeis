<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = ""; // Si tu n'as pas de mot de passe, laisse vide
$dbname = "mydb"; // Nom de la base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
} else {
    echo "Connexion réussie à la base de données !";
}
?>
