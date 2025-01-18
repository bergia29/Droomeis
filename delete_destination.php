<?php
// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Si l'ID est spécifié dans l'URL, on supprime la destination
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  // On récupère l'ID de la destination à supprimer
    $stmt = $conn->prepare("DELETE FROM destination WHERE idDestination = :id");
    $stmt->execute([':id' => $id]);
    // Affichage d'un message de succès via une alerte JavaScript
    echo "<script type='text/javascript'>
    alert('La destination a été supprimée avec succès.');
    window.location.href = 'dashboard.php'; // Redirection vers la page principale
  </script>";
} else {
// Affichage d'un message d'erreur si la destination n'existe pas
echo "<script type='text/javascript'>
    alert('Destination non trouvée.');
    window.location.href = 'dashboard.php'; // Redirection vers la page principale
  </script>";
}

// Récupérer toutes les destinations
$stmt = $conn->prepare("SELECT * FROM destination");
$stmt->execute();
$destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Liste des Destinations</h2>

<?php if (count($destinations) > 0): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Nom de la Destination</th>
                <th>Description</th>
                <th>Localisation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($destinations as $destination): ?>
                <tr>
                    <td><?= htmlspecialchars($destination['nomD']) ?></td>
                    <td><?= htmlspecialchars($destination['description']) ?></td>
                    <td><?= htmlspecialchars($destination['localisation']) ?></td>
                    <td>
                        <!-- Lien de suppression avec l'ID de la destination -->
                        <a href="delete_destination.php?id=<?= $destination['idDestination'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette destination ?');">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucune destination trouvée.</p>
<?php endif; ?>

