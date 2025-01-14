<?php
// Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Vérifier si les mots de passe correspondent
    if ($newPassword !== $confirmPassword) {
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }

    // Validation du mot de passe (minimum 8 caractères, une majuscule, un chiffre)
    if (strlen($newPassword) < 8 || !preg_match('/[A-Z]/', $newPassword) || !preg_match('/[0-9]/', $newPassword)) {
        echo "Erreur : Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.";
        exit;
    }

    // Vérifier si le token existe et n'est pas expiré
    $stmt = $conn->prepare("SELECT * FROM password_resets WHERE token = :token AND expiration > NOW()");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $reset = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($reset) {
        // Récupérer l'email associé au token
        $email = $reset['emailU'];

        // Hacher le nouveau mot de passe
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Mettre à jour le mot de passe dans la table utilisateur
        $stmt = $conn->prepare("UPDATE utilisateur SET passwordU = :password WHERE emailU = :email");
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Supprimer le token de la table password_resets après utilisation
        $stmt = $conn->prepare("DELETE FROM password_resets WHERE token = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        echo "Votre mot de passe a été réinitialisé avec succès.";
    } else {
        echo "Le lien de réinitialisation est invalide ou a expiré.";
    }
}
?>
