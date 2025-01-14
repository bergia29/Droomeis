<?php
// Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Vérifier si un token est passé dans l'URL
if (isset($_GET['token'])) {
    $token = htmlspecialchars($_GET['token']);

    // Vérifier si le token existe et n'est pas expiré
    try {
        $stmt = $conn->prepare("SELECT * FROM password_resets WHERE token = :token AND expiration > NOW()");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $reset = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($reset) {
            // Si le token est valide, inclure le formulaire HTML
            include('formulaire_reinitialisation.php');
        } else {
            echo "Ce lien de réinitialisation est invalide ou expiré.";
        }
    } catch (Exception $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else {
    echo "Token non fourni.";
}
?>
