<?php
// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $descriptionA = htmlspecialchars($_POST['descriptionA']);
    $duree = $_POST['duree'];
    $date = $_POST['date'];
    $idDestination = intval($_POST['idDestination']);

    if (!empty($nom) && !empty($descriptionA) && !empty($duree) && !empty($date) && !empty($idDestination)) {
        $stmt = $conn->prepare("INSERT INTO activité (nom, durée, date, descriptionA, idDestination) VALUES (:nom, :duree, :date, :descriptionA, :idDestination)");
        $stmt->execute([
            ':nom' => $nom,
            ':duree' => $duree,
            ':date' => $date,
            ':descriptionA' => $descriptionA,
            ':idDestination' => $idDestination
        ]);
        echo "Activité ajoutée avec succès.";
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>

<h2>Ajouter une Activité</h2>
<form action="add_activity.php" method="POST">
    <label>Nom de l'activité :</label>
    <input type="text" name="nom" required>
    <label>Description :</label>
    <textarea name="descriptionA" required></textarea>
    <label>Durée :</label>
    <input type="time" name="duree" required>
    <label>Date :</label>
    <input type="date" name="date" required>
    <label>Destination :</label>
    <select name="idDestination" required>
        <?php
        $stmt = $conn->query("SELECT idDestination, nomD FROM destination");
        while ($row = $stmt->fetch()) {
            echo "<option value='{$row['idDestination']}'>{$row['nomD']}</option>";
        }
        ?>
    </select>
    <button type="submit">Ajouter</button>
</form>
