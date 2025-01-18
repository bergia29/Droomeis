<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure les fichiers nécessaires de PHPMailer

require 'vendor/autoload.php'; // Utilisez cette ligne si vous avez installé PHPMailer via Composer


$mail = new PHPMailer(true); // Crée une instance de PHPMailer

try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Serveur SMTP de Gmail
    $mail->SMTPAuth   = true;
    $mail->Username   = 'bignondjidonou@gmail.com'; // Votre adresse Gmail
    $mail->Password   = 'rtej ldjr zibc lgbz'; // Mot de passe Gmail ou mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Chiffrement STARTTLS
    $mail->Port       = 587; // Port SMTP de Gmail

    // Expéditeur et destinataire
    $mail->setFrom('bignondjidonou@gmail.com', 'Admin');
    $mail->addAddress('navalingame.cindia@gmail.com', 'Utilisateur'); // Ajoutez d'autres destinataires si nécessaire

    // Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = 'Test d\'envoi avec PHPMailer';
    $mail->Body    = 'Ceci est un <b>test</b> avec PHPMailer et Gmail.';
    $mail->AltBody = 'Ceci est un test avec PHPMailer et Gmail.';

    // Envoyer l'email
    $mail->send();
    echo 'Message envoyé avec succès';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
}

$mail->SMTPDebug = 2; // Niveau de débogage (plus élevé pour plus de détails)
$mail->Debugoutput = 'html'; // Format de sortie des journaux
