<?php
session_start(); // Démarre la session

// Configuration des informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$success_message = ''; // Message de succès
$error_message = ''; // Message d'erreur

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verificationCode'])) {
    $verificationCode = $_POST['verificationCode'];

    // Vérifier si le code existe et correspond à l'utilisateur
    $stmt = $conn->prepare("SELECT idUtilisateur, code_verification, is_verified FROM utilisateur WHERE code_verification = :verificationCode");
    $stmt->bindParam(':verificationCode', $verificationCode);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($user['is_verified'] == 0) {
            // Mettre à jour l'état de l'utilisateur en vérifié
            $stmt = $conn->prepare("UPDATE utilisateur SET is_verified = 1 WHERE idUtilisateur = :idUtilisateur");
            $stmt->bindParam(':idUtilisateur', $user['idUtilisateur']);
            $stmt->execute();
            $success_message = "Inscription validée ! Votre compte a été vérifié avec succès.";
        } else {
            $error_message = "Ce code a déjà été utilisé.";
        }
    } else {
        $error_message = "Code incorrect. Veuillez vérifier votre code de vérification.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification du Code</title>
</head>
<body>

    <!-- Affichage des messages de succès ou d'erreur -->
    <?php if (!empty($success_message)): ?>
        <div style="color: green; font-weight: bold;">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($error_message)): ?>
        <div style="color: red; font-weight: bold;">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>


</body>
</html>
