<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Si vous utilisez Composer

// Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']); // Protéger contre les attaques XSS

    // Vérifier si l'email existe dans la base de données
    $stmt = $conn->prepare("SELECT idUtilisateur FROM utilisateur WHERE emailU = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Générer un token unique
        $token = bin2hex(random_bytes(32)); // Génération d'un token sécurisé
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour')); // Expiration dans 1 heure

        // Enregistrer le token dans la base de données
        $stmt = $conn->prepare("INSERT INTO password_resets (emailU, token, expiration) VALUES (:email, :token, :expiration)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':expiration', $expiration);
        $stmt->execute();

        // Lien de réinitialisation
        $resetLink = "http://localhost/HTML_vs_CSS/reinitialiser_mdp.php?token=" . $token;

        // Envoi de l'email avec PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bignondjidonou@gmail.com';
            $mail->Password = 'rtej ldjr zibc lgbz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Expéditeur et destinataire
            $mail->setFrom('bignondjidonou@gmail.com', 'Admin');
            $mail->addAddress($email);

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Réinitialisation de votre mot de passe';
            $mail->Body    = "Bonjour,<br><br>Cliquez sur ce lien pour reinitialiser votre mot de passe : <a href='{$resetLink}'>Reinitialiser le mot de passe</a><br><br>Ce lien expirera dans 1 heure.";

            // Envoyer l'email
            $mail->send();
            echo "Un email de réinitialisation a été envoyé à votre adresse.";
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
        }
    } else {
        // Pour des raisons de sécurité, ne pas préciser si l'email n'existe pas
        echo "Si un compte existe avec cet email, un lien de réinitialisation vous a été envoyé.";
    }
}
?>
