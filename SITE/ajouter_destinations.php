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
    $categorie = $_POST['categorie'];

    // Gestion de l'upload de l'image
    $image = "uploads/" . basename($_FILES["image"]["name"]); // Chemin pour sauvegarder l'image

    // Déplacer l'image vers le dossier "uploads"
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
        echo "L'image a été téléchargée avec succès.";
    } else {
        echo "Désolé, il y a eu une erreur lors du téléchargement de l'image.";
    }

    // Insérer les données dans la base de données
    $sql = "INSERT INTO destinations ( description, ville, pays, image, prix)
            VALUES ('$description', '$ville', '$pays', '$image', '$prix')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvelle destination ajoutée avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>
