<?php
ini_set('display_errors', 1); // Affiche les erreurs PHP
error_reporting(E_ALL); // Affiche toutes les erreurs

$host = 'localhost';
$dbname = 'mydb'; // Nom de la base de données
$username = 'root';
$password = ''; // Mot de passe vide

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once "includes/phpmailer/Exception.php";
require_once "includes/phpmailer/PHPMailer.php";
require_once "includes/phpmailer/SMTP.php";

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom = $_POST['nomC'];         // Correspond à name="nomC" dans le HTML
    $Prenom = $_POST['prénomC'];   // Correspond à name="prénomC" dans le HTML
    $Email = $_POST['emailC'];     // Correspond à name="emailC" dans le HTML
    $Objet = $_POST['objetC'];     // Correspond à name="objetC" dans le HTML
    $Contenu = $_POST['contenuC']; // Correspond à name="contenuC" dans le HTML

    // Préparer la requête d'insertion
    $sql = "INSERT INTO contact (cNom, cPrenom, cEmail, cObjet, cContenu) 
            VALUES (:nom, :prenom, :email, :objet, :contenu)";
    $stmt = $pdo->prepare($sql);

    // Lier les paramètres et exécuter la requête
    $stmt->bindParam(':nom', $Nom);
    $stmt->bindParam(':prenom', $Prenom);
    $stmt->bindParam(':email', $Email);
    $stmt->bindParam(':objet', $Objet);
    $stmt->bindParam(':contenu', $Contenu);

    // Exécuter et vérifier l'insertion
    if ($stmt->execute()) {
        echo "Données insérées avec succès.";

        // Configurer et envoyer l'e-mail avec PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Paramètres SMTP pour Gmail
            $mail->isSMTP();
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->Host = 'smtp.gmail.com';  // Serveur SMTP de Gmail
            $mail->SMTPAuth = true;  // Authentification requise
            $mail->Username = 'bignondjidonou@gmail.com';  // Charnelle mail exp
            $mail->Password = 'rtejldjrzibclgbz';  // Mot de passe d'application Charnelle mdp app
            $mail->SMTPSecure = 'ssl';  // STARTTLS pour une connexion sécurisée
            $mail->Port = 465; 

            // Expéditeur et destinataire
            $mail->setFrom('bignondjidonou@gmail.com'); // Charnelle mail exp
            $mail->addReplyTo($Email);
            $mail->addAddress('bignondjidonou@gmail.com'); // Adresse destinataire

            // Sujet et contenu de l'e-mail
            $mail->Subject = $Objet;
            $mail->Body = $Contenu;

            // Envoi de l'e-mail
            $mail->send();

            echo "<script>
                alert('E-mail envoyé avec succès.');
                window.location.href = 'accueil.php';
            </script>";

        } catch (Exception $e) {
            echo "L'envoi de l'e-mail a échoué. Erreur : {$mail->ErrorInfo}";
        }
    } else {
        echo "Une erreur est survenue lors de l'insertion des données.";
    }
}
?>
