<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";  // Remplacez par votre nom d'utilisateur MySQL
$password = "";      // Remplacez par votre mot de passe MySQL
$dbname = "mydb";    // Remplacez par le nom de votre base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $description = $_POST['description'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $prix = $_POST['prix'];

    // Récupérer les catégories sélectionnées (les cases à cocher)
    if (isset($_POST['categorie']) && is_array($_POST['categorie'])) {
        $categories = implode(' ', $_POST['categorie']); // Convertir le tableau de catégories en une chaîne (séparée par des espaces)
    }

    // Gestion de l'upload de l'image
    $image = "uploads/" . basename($_FILES["image"]["name"]); // Chemin pour sauvegarder l'image

    // Déplacer l'image vers le dossier "uploads"
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
        echo "L'image a été téléchargée avec succès.";
    } else {
        echo "Désolé, il y a eu une erreur lors du téléchargement de l'image.";
    }

    // Insérer les données dans la base de données
    // Utilisation d'une requête préparée pour éviter les injections SQL
    $stmt = $conn->prepare("INSERT INTO destinations (description, ville, pays, image, prix, categorie) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssds", $description, $ville, $pays, $image, $prix, $categories);

    if ($stmt->execute()) {
        echo "Nouvelle destination ajoutée avec succès.";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Fermer la requête préparée et la connexion
    $stmt->close();
}

// Fermer la connexion
$conn->close();
?>
