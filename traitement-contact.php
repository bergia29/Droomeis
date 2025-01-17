<?php
$host = 'localhost';
$dbname = 'contact'; // Nom de la base de données
$username = 'root';
$password = ''; // Mot de passe vide

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom = $_POST['nom'];
    $Prenom = $_POST['prenom'];
    $Email = $_POST['email'];
    $Objet = $_POST['objet'];
    $Contenu = $_POST['contenu'];

    // Préparer la requête d'insertion
    $sql = "INSERT INTO utilisateurs (cNom, cPrenom, cEmail, cObjet, cContenu) 
            VALUES (:nom, :prenom, :email, :objet, :contenu)";// (nom variable de BDD)(nom fictive)
    $stmt = $pdo->prepare($sql);

    // Lier les paramètres et exécuter la requête
    $stmt->bindParam(':name', $Nom);
    $stmt->bindParam(':prenom', $Prenom);
    $stmt->bindParam(':email', $Email);
    $stmt->bindParam(':objet', $Objet);
    $stmt->bindParam(':contenu', $Contenu);

    // Exécuter et vérifier l'insertion
    if ($stmt->execute()) {
        echo "Données insérées avec succès."; 
    } else {
        echo "Une erreur est survenue lors de l'insertion des données.";
    }
}
?>
