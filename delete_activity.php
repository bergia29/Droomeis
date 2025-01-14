<?php
// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM activité WHERE idActivité = :id");
    $stmt->execute([':id' => $id]);
    echo "L'activité a été supprimée avec succès.";
} else {
    echo "ID de l'activité non spécifié.";
}
?>

<h2>Supprimer une Activité</h2>
<p>L'activité a été supprimée.</p>
