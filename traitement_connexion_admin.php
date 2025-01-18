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
    $password = $_POST['password'];

    // Valider l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'email est invalide.";
        exit;
    }

    // Requête pour vérifier l'existence de l'admin dans la base de données
    $stmt = $conn->prepare("SELECT idAdmin, password FROM administrateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Vérifier si le mot de passe est correct
        if (password_verify($password, $hashed_password)) {
            // Regénérer l'ID de session pour plus de sécurité
            session_regenerate_id(true);

            // Démarrage de la session et enregistrement des informations de l'administrateur
            $_SESSION['idAdmin'] = $id; // ID de l'administrateur
            $_SESSION['email'] = $email; // E-mail de l'administrateur

            // Redirige l'administrateur vers le tableau de bord
            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = 'Mot de passe incorrect.';
        }
    } else {
        $_SESSION['error'] = 'Aucun administrateur trouvé avec cet e-mail.';
    }

    $stmt->close();
}

$conn->close();
?>

<!-- Affichage des erreurs -->
<?php
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
