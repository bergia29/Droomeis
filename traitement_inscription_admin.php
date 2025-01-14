<?php
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb"; // Remplacez par le nom de votre base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $nom = $_POST['nom'];  // Champ pour le nom de l'administrateur
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérifiez si les mots de passe correspondent
    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }

    // Vérifiez si l'email existe déjà dans la table administrateur
    $stmt = $conn->prepare("SELECT idAdmin FROM administrateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Un administrateur avec cet email existe déjà.";
        exit;
    }

    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insérer l'administrateur dans la table administrateur
    // La date_creation est automatiquement remplie avec CURRENT_TIMESTAMP dans la base de données
    $stmt = $conn->prepare("INSERT INTO administrateur (email, password, nom) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $hashed_password, $nom);  // Pas besoin de gérer la date_creation en PHP
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Administrateur inscrit avec succès !";
        // Vous pouvez rediriger vers une page de connexion ou un tableau de bord administrateur
        header("Location: index.php");
    } else {
        echo "Une erreur est survenue. Veuillez réessayer.";
    }

    $stmt->close();
}

$conn->close();

var_dump($_POST);
exit;

?>
