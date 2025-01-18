<?php
// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Si l'ID est spécifié dans l'URL, on supprime l'activité
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  // On récupère l'ID de l'activité à supprimer
    $stmt = $conn->prepare("DELETE FROM activité WHERE idActivité = :id");
    $stmt->execute([':id' => $id]);

    // Affichage d'un message de succès via une alerte JavaScript
    echo "<script type='text/javascript'>
            alert('L\'activité a été supprimée avec succès.');
            window.location.href = 'dashboard.php'; // Redirection vers la page des activités
          </script>";
} else {
    // Affichage d'un message d'erreur si l'ID de l'activité n'est pas trouvé
    echo "<script type='text/javascript'>
            alert('L\'activité n\'a pas été trouvée.');
            window.location.href = 'dashboard.php'; // Redirection vers la page des activités
          </script>";
}

// Récupérer toutes les activités
$stmt = $conn->prepare("SELECT a.idActivité, a.nom, a.durée, a.date, a.descriptionA, d.nomD AS destination
                        FROM activité a
                        JOIN destination d ON a.Destination_idDestination = d.idDestination");
$stmt->execute();
$activites = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Liste des Activités</h2>

<?php if (count($activites) > 0): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Nom de l'activité</th>
                <th>Durée</th>
                <th>Date</th>
                <th>Description</th>
                <th>Destination</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activites as $activite): ?>
                <tr>
                    <td><?= htmlspecialchars($activite['nom']) ?></td>
                    <td><?= htmlspecialchars($activite['durée']) ?></td>
                    <td><?= htmlspecialchars($activite['date']) ?></td>
                    <td><?= htmlspecialchars($activite['descriptionA']) ?></td>
                    <td><?= htmlspecialchars($activite['destination']) ?></td>
                    <td>
                        <!-- Lien de suppression avec l'ID de l'activité -->
                        <a href="delete_activity.php?id=<?= $activite['idActivité'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette activité ?');">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucune activité trouvée.</p>
<?php endif; ?>
