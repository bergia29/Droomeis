<?php
// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Si un ID d'activité est passé dans l'URL pour modification
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Récupérer les informations de l'activité à éditer
    $stmt = $conn->prepare("SELECT * FROM activité WHERE idActivité = :id");
    $stmt->execute([':id' => $id]);
    $activity = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si l'activité existe
    if (!$activity) {
        echo "<script type='text/javascript'>
                alert('Activité non trouvée.');
                window.location.href = 'edit_activity.php'; // Redirection vers la liste des activités
              </script>";
    }

    // Traitement du formulaire pour mettre à jour l'activité
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = htmlspecialchars($_POST['nom']);
        $descriptionA = htmlspecialchars($_POST['descriptionA']);
        $duree = $_POST['duree'];
        $date = $_POST['date'];
        $idDestination = intval($_POST['idDestination']);

        if (!empty($nom) && !empty($descriptionA) && !empty($duree) && !empty($date) && !empty($idDestination)) {
            // Préparer la requête de mise à jour
            $stmt = $conn->prepare("UPDATE activité SET nom = :nom, descriptionA = :descriptionA, durée = :duree, date = :date, Destination_idDestination = :idDestination WHERE idActivité = :id");
            $stmt->execute([
                ':nom' => $nom,
                ':descriptionA' => $descriptionA,
                ':duree' => $duree,
                ':date' => $date,
                ':idDestination' => $idDestination,
                ':id' => $id
            ]);

            // Afficher un message de succès et rediriger
            echo "<script type='text/javascript'>
                    alert('L\'activité a été mise à jour avec succès.');
                    window.location.href = 'dashboard.php'; // Redirection vers la liste des activités
                  </script>";
        } else {
            // Afficher un message d'erreur si des champs sont manquants
            echo "<script type='text/javascript'>
                    alert('Tous les champs sont obligatoires.');
                  </script>";
        }
    }
} else {
    // Récupérer la liste des activités si aucun ID n'est passé
    $stmt = $conn->query("SELECT * FROM activité");
    $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h2>Liste des Activités</h2>

<?php if (count($activities) > 0): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Nom de l'Activité</th>
                <th>Description</th>
                <th>Durée</th>
                <th>Date</th>
                <th>Destination</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activities as $activity): ?>
                <tr>
                    <td><?= htmlspecialchars($activity['nom']) ?></td>
                    <td><?= htmlspecialchars($activity['descriptionA']) ?></td>
                    <td><?= htmlspecialchars($activity['durée']) ?></td>
                    <td><?= htmlspecialchars($activity['date']) ?></td>
                    <td>
                        <?php
                        // Récupérer le nom de la destination
                        $stmt = $conn->prepare("SELECT nomD FROM destination WHERE idDestination = :id");
                        $stmt->execute([':id' => $activity['Destination_idDestination']]);
                        $destination = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo htmlspecialchars($destination['nomD']);
                        ?>
                    </td>
                    <td>
                        <!-- Lien de modification pour chaque activité -->
                        <a href="edit_activity.php?id=<?= $activity['idActivité'] ?>">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucune activité trouvée.</p>
<?php endif; ?>


<?php if (isset($activity)): ?>
<h2>Modifier l'Activité</h2>
<form action="edit_activity.php?id=<?= $activity['idActivité'] ?>" method="POST">
    <label>Nom de l'activité :</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($activity['nom']) ?>" required>

    <label>Description :</label>
    <textarea name="descriptionA" required><?= htmlspecialchars($activity['descriptionA']) ?></textarea>

    <label>Durée :</label>
    <input type="time" name="duree" value="<?= htmlspecialchars($activity['durée']) ?>" required>

    <label>Date :</label>
    <input type="date" name="date" value="<?= htmlspecialchars($activity['date']) ?>" required>

    <label>Destination :</label>
    <select name="idDestination" required>
        <?php
        // Récupérer toutes les destinations pour remplir le menu déroulant
        $stmt = $conn->query("SELECT idDestination, nomD FROM destination");
        while ($row = $stmt->fetch()) {
            // Vérifier si la destination correspond à celle de l'activité
            $selected = ($row['idDestination'] == $activity['Destination_idDestination']) ? 'selected' : '';
            echo "<option value='{$row['idDestination']}' {$selected}>{$row['nomD']}</option>";
        }
        ?>
    </select>

    <button type="submit">Mettre à jour</button>
</form>
<?php endif; ?>

