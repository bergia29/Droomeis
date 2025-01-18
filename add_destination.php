<?php
// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomD = htmlspecialchars($_POST['nomD']);
    $description = htmlspecialchars($_POST['description']);
    $localisation = htmlspecialchars($_POST['localisation']);

    if (!empty($nomD) && !empty($description) && !empty($localisation)) {
        $stmt = $conn->prepare("INSERT INTO destination (nomD, description, localisation) VALUES (:nomD, :description, :localisation)");
        $stmt->execute([
            ':nomD' => $nomD,
            ':description' => $description,
            ':localisation' => $localisation
        ]);
       // Afficher un message de succès via JavaScript
       echo "<script type='text/javascript'>
       alert('Destination ajoutée avec succès.');
       window.location.href = 'dashboard.php'; // Redirection vers la page principale
     </script>";
} else {
// Afficher un message d'erreur si les champs sont vides
echo "<script type='text/javascript'>
       alert('Tous les champs sont obligatoires.');
     </script>";
}
}
?>

<h2>Ajouter une Destination</h2>
<form action="add_destination.php" method="POST">
    <label>Nom :</label>
    <input type="text" name="nomD" required>
    <label>Description :</label>
    <textarea name="description" required></textarea>
    <label>Localisation :</label>
    <input type="text" name="localisation" required>
    <button type="submit">Ajouter</button>
</form>
