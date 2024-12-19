<?php
// Configuration des informations de connexion à la base de données
$servername = "localhost"; // Nom d'hôte (souvent localhost)
$username = "root";        // Nom d'utilisateur de la base de données
$password = "";            // Mot de passe de la base de données (s'il y en a un)
$dbname = "mydb";          // Nom de la base de données

// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification que les champs ne sont pas vides
    if (isset($_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prénom'], $_POST['dateNaissance'], $_POST['adressePostale'], $_POST['role'])) {

        // Récupération des données du formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prénom'];
        $dateNaissance = $_POST['dateNaissance'];
        $adressePostale = $_POST['adressePostale'];
        $role = $_POST['role'];

        // Validation de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Erreur : L'email n'est pas valide.";
            exit;
        }

        // Validation de la date de naissance
        $datePattern = '/\d{4}-\d{2}-\d{2}/'; // Format YYYY-MM-DD
        if (!preg_match($datePattern, $dateNaissance)) {
            echo "Erreur : La date de naissance n'est pas valide.";
            exit;
        }

        // Validation du mot de passe (minimum 8 caractères, une majuscule, un chiffre)
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
            echo "Erreur : Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.";
            exit;
        }

        // Sécurisation du mot de passe avec password_hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Préparation de la requête SQL pour insérer les données dans la table Utilisateur
        $stmt = $conn->prepare("INSERT INTO `utilisateur` (emailU, passwordU, nomU, prénomU, dateNaissanceU, adressePostalU, role) VALUES (:email, :password, :nom, :prenom, :dateNaissance, :adressePostale, :role)");

        // Lier les paramètres à la requête
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindValue(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
        $stmt->bindValue(':adressePostale', $adressePostale, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection vers la page de connexion après une inscription réussie
            header('Location: Formulaire_connexion.html');
            exit; // Assurez-vous d'arrêter l'exécution après la redirection
        } else {
            echo "Erreur : Impossible de s'inscrire. Veuillez réessayer.";
        }
    } else {
        echo "Erreur : Tous les champs doivent être remplis.";
    }

    // Fermeture de la connexion
    $conn = null;
}
var_dump($_POST);
exit;


?>
