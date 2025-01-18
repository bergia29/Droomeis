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
    $idDestination = intval($_POST['idDestination']); // Utilisez $_POST['idDestination'] directement ici

    // Vérification que les champs sont remplis
    if (!empty($nom) && !empty($descriptionA) && !empty($duree) && !empty($date) && !empty($idDestination)) {
        // Préparation de la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO activité (nom, durée, date, descriptionA, Destination_idDestination) 
                                VALUES (:nom, :duree, :date, :descriptionA, :idDestination)");
        // Exécution de la requête avec les valeurs des champs
        $stmt->execute([
            ':nom' => $nom,
            ':duree' => $duree,
            ':date' => $date,
            ':descriptionA' => $descriptionA,
            ':idDestination' => $idDestination // Utilisation de $idDestination ici
        ]);

        // Redirection avec une alerte
        echo "<script type='text/javascript'>
                alert('Activité ajoutée avec succès.');
                window.location.href = 'dashboard.php'; // Redirection vers la page principale
              </script>";
    } else {
        // Affichage d'une alerte si les champs sont manquants
        echo "<script type='text/javascript'>
                alert('Tous les champs sont obligatoires.');
              </script>";
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
        // Récupérer toutes les destinations depuis la base de données
        $stmt = $conn->query("SELECT idDestination, nomD FROM destination");
        while ($row = $stmt->fetch()) {
            echo "<option value='{$row['idDestination']}'>{$row['nomD']}</option>";
        }
        ?>
    </select>
    
    <button type="submit">Ajouter</button>
</form>
