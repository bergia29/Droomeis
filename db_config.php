<?php
// db_config.php

$host = "localhost"; // Adresse de votre serveur de base de données
$dbname = "mydb"; // Nom de votre base de données
$username = "root"; // Votre utilisateur de base de données
$password = ""; // Votre mot de passe de base de données

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
