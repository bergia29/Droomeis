<?php
// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Vérification de l'ID de la destination pour la modification
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Récupérer les informations de la destination à modifier
    $stmt = $conn->prepare("SELECT * FROM destination WHERE idDestination = :id");
    $stmt->execute([':id' => $id]);
    $destination = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$destination) {
        echo "Destination non trouvée.";
        exit;
    }

    // Traitement du formulaire de modification
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $nomD = $_POST['nomD'];
        $description = $_POST['description'];
        $localisation = $_POST['localisation'];

        // Mise à jour de la destination dans la base de données
        $stmt = $conn->prepare("UPDATE destination SET nomD = :nomD, description = :description, localisation = :localisation WHERE idDestination = :id");
        $stmt->execute([
            ':nomD' => $nomD,
            ':description' => $description,
            ':localisation' => $localisation,
            ':id' => $id
        ]);

        echo "Destination modifiée avec succès.";
    }
} else {
    // Si aucune destination n'est sélectionnée pour modification, afficher toutes les destinations
    $stmt = $conn->prepare("SELECT * FROM destination");
    $stmt->execute();
    $destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!-- Affichage de la liste des destinations -->
<h2>Liste des Destinations</h2>

<?php if (isset($destinations) && count($destinations) > 0): ?>
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
                        <!-- Lien pour modifier cette destination -->
                        <a href="edit_destination.php?id=<?= $destination['idDestination'] ?>">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucune destination trouvée.</p>
<?php endif; ?>

<!-- Formulaire de modification d'une destination -->
<?php if (isset($destination)): ?>
    <h2>Modifier la Destination</h2>
    <form action="edit_destination.php?id=<?= $destination['idDestination'] ?>" method="POST">
        <div>
            <label for="nomD">Nom de la Destination :</label>
            <input type="text" id="nomD" name="nomD" value="<?= htmlspecialchars($destination['nomD']) ?>" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($destination['description']) ?></textarea>
        </div>

        <div>
            <label for="localisation">Localisation :</label>
            <input type="text" id="localisation" name="localisation" value="<?= htmlspecialchars($destination['localisation']) ?>" required>
        </div>

        <button type="submit">Modifier</button>
    </form>
<?php endif; ?>
