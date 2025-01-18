<?php
include('connexion.php');
// Vérifier si un ID est passé dans l'URL
if (isset($_GET['id'])) {
    $idDestination = (int) $_GET['id'];

    // Récupérer les informations de la destination
    $stmt = $pdo->prepare('SELECT * FROM destination WHERE idDestination = ?');
    $stmt->execute([$idDestination]);
    $destination = $stmt->fetch();

    // Récupérer les activités associées à cette destination
    $stmt = $pdo->prepare('SELECT * FROM activite WHERE idDestination = ?');
    $stmt->execute([$idDestination]);
    $activites = $stmt->fetchAll();
} else {
    die('ID de destination manquant.');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($destination['nom'] ?? 'Destination inconnue') ?></title>
    <link rel="stylesheet" href="assets/stylemaldives.css"> <!-- Lien vers le fichier CSS -->
</head>
<body
 >   <?php if ($destination): ?>
        <h1>Bienvenue à <?= htmlspecialchars($destination['nom']) ?></h1>
        <p>Prix : <?= htmlspecialchars($destination['prix']) ?>€ TTC*</p>

        <h2>Activités disponibles :</h2>
        <?php if ($activites): ?>
            <ul>
                <?php foreach ($activites as $activite): ?>
                    <li>
                        <h3><?= htmlspecialchars($activite['nom']) ?></h3>
                        <p><?= htmlspecialchars($activite['description']) ?></p>
                        <p>Prix : <?= htmlspecialchars($activite['prix']) ?>€</p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucune activité disponible pour cette destination.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Cette destination n'existe pas.</p>
    <?php endif; ?>

    <script src="assets/activite.js"></script> <!-- Lien vers le fichier JavaScript -->
</body>
</html>
