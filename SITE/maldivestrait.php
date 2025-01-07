<?php
// Activer l'affichage des erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure la connexion à la base de données
include('db.php');  // Assure-toi que db.php contient la bonne connexion

// Vérifie que l'ID de l'activité et la note ont été envoyés
if (isset($_POST['activity_id']) && isset($_POST['rating'])) {
    $activity_id = $_POST['activity_id'];
    $rating = $_POST['rating'];

    // Sécuriser les données (éviter les injections SQL)
    $activity_id = $conn->real_escape_string($activity_id);
    $rating = $conn->real_escape_string($rating);

    // Créer la requête d'insertion dans la table ratings
    $sql = "INSERT INTO ratings (activity_id, score) VALUES ($activity_id, $rating)";

    // Afficher la requête pour le débogage
    echo "SQL: $sql<br>";  // Débogage

    // Exécuter la requête d'insertion
    if ($conn->query($sql) === TRUE) {
        // Si l'insertion réussit, afficher un message de succès
        echo "Merci pour votre avis !";
        // Rediriger vers la page principale après soumission
        header('Location: maldivesphp.php');
        exit;  // Assurer que le script s'arrête ici
    } else {
        // Si la requête échoue, afficher l'erreur SQL
        echo "Erreur d'insertion dans la base de données : " . $conn->error;
    }
} else {
    // Si les données sont manquantes ou mal envoyées
    echo "Données manquantes ou mal envoyées.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
