<?php
// Inclusion de la bibliothèque PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Si vous utilisez Composer

// Configuration des informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prénom'], $_POST['dateNaissance'], $_POST['adressePostale'], $_POST['role'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prénom'];
        $dateNaissance = $_POST['dateNaissance'];
        $adressePostale = $_POST['adressePostale'];
        $role = $_POST['role'];

        // Validation des champs
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Erreur : Email invalide.";
            exit;
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
            echo "Erreur : Mot de passe invalide.";
            exit;
        }

        // Vérifier si l'email existe déjà dans la base de données
        $stmt = $conn->prepare("SELECT idUtilisateur FROM utilisateur WHERE emailU = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "Erreur : L'email est déjà utilisé.";
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Génération du code de vérification
        $verificationCode = rand(100000, 999999);

        // Insérer l'utilisateur dans la base de données
        $stmt = $conn->prepare("INSERT INTO utilisateur (emailU, passwordU, nomU, prénomU, dateNaissanceU, adressePostalU, role, code_verification, is_verified) 
        VALUES (:email, :password, :nom, :prenom, :dateNaissance, :adressePostale, :role, :code_verification, 0)");

        $stmt->execute([
            ':email' => $email,
            ':password' => $hashedPassword,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':dateNaissance' => $dateNaissance,
            ':adressePostale' => $adressePostale,
            ':role' => $role,
            ':code_verification' => $verificationCode
        ]);

        // Envoi de l'email de vérification avec PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Utiliser votre serveur SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'bignondjidonou@gmail.com'; // Remplacez par votre adresse e-mail
            $mail->Password = 'rtej ldjr zibc lgbz'; // Remplacez par votre mot de passe ou mot de passe d'application
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Expéditeur et destinataire
            $mail->setFrom('bignondjidonou@gmail.com', 'Admin');
            $mail->addAddress($email);

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Vérification de votre compte';
            $mail->Body    = "Bonjour $prenom,<br><br>Merci pour votre inscription !<br>Votre code de verification est : <b>{$verificationCode}</b><br><br>Veuillez entrer ce code sur notre site pour activer votre compte.<br><br>Cordialement,<br>L'equipe Droomreis.";

            // Envoyer l'email
            $mail->send();
            echo "Inscription réussie. Un e-mail de vérification a été envoyé à votre adresse.";

        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    } else {
        echo "Erreur : Tous les champs sont obligatoires.";
    }
}
?>
