<?php
// Activer l'affichage des erreurs (en développement)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    echo "Connexion à la base de données réussie.<br>";
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire et les sécuriser
    $email = htmlspecialchars($_POST['emailU']);
    $password = $_POST['passwordU'];

    // Afficher les données soumises pour débogage
    echo "Email soumis : " . $email . "<br>";
    echo "Mot de passe soumis : " . $password . "<br>";

    // Vérifier si les champs sont vides
    if (empty($email) || empty($password)) {
        echo "Tous les champs doivent être remplis.<br>";
        exit();
    }

    // Rechercher l'utilisateur dans la base de données
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE emailU = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Afficher les données récupérées pour débogage
    if ($user) {
        echo "Utilisateur trouvé : <br>";
        echo "Email : " . $user['emailU'] . "<br>";
        echo "Mot de passe haché : " . $user['passwordU'] . "<br>";
    } else {
        echo "Aucun utilisateur trouvé avec cet email.<br>";
    }

    // Vérification du mot de passe
    if ($user) {
        echo "Tentative de vérification du mot de passe...<br>";

        if (password_verify($password, $user['passwordU'])) {
            echo "Mot de passe correct.<br>";

            // Démarrer une session et régénérer l'ID de session pour sécurité
            session_start();
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['idUtilisateur']; // ID de l'utilisateur
            $_SESSION['email'] = $user['emailU']; // Email de l'utilisateur

            // Rediriger vers la page du tableau de bord
            header('Location: accueil.php');
            exit();
        } else {
            echo "Mot de passe incorrect.<br>";
        }
    }
    
    // Générer un nouveau hachage du mot de passe soumis
    $newHash = password_hash($submittedPassword, PASSWORD_BCRYPT);
    
    // Afficher le nouveau hachage pour comparaison
    echo "Nouveau hachage : " . $newHash . "<br>";
    
    // Vérifier si le mot de passe soumis correspond au mot de passe haché stocké
    if (password_verify($submittedPassword, $hashedPasswordFromDB)) {
        echo "Mot de passe correct !<br>";
    } else {
        echo "Mot de passe incorrect.<br>";
    }
    
}
?>
