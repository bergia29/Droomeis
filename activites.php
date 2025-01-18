<?php
// Inclure la connexion mysqli
include('connexion.php');

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $idDestination = (int) $_GET['id'];  // Récupérer l'ID de la destination

    // Requête pour récupérer les informations de la destination
    $stmt = $conn->prepare('SELECT * FROM destinations WHERE idDestination = ?');
    $stmt->bind_param("i", $idDestination);  // Lier l'ID de la destination comme entier
    $stmt->execute();  // Exécuter la requête
    $result = $stmt->get_result();  // Récupérer le résultat
    $destinations = $result->fetch_assoc();  // Récupérer les données de la destination

    // Requête pour récupérer les activités associées à cette destination
    $stmt_activites = $conn->prepare('SELECT * FROM activite WHERE idDestination = ?');
    $stmt_activites->bind_param("i", $idDestination);  // Lier l'ID de la destination comme entier
    $stmt_activites->execute();  // Exécuter la requête
    $result_activites = $stmt_activites->get_result();  // Récupérer le résultat
    $activites = $result_activites->fetch_all(MYSQLI_ASSOC);  // Récupérer toutes les activités associées
} else {
    die('ID de destination manquant.');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités - <?= htmlspecialchars($destinations['pays'] ?? 'Destination inconnue') ?></title>
    <link rel="stylesheet" href="stylemaldives.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<header> 
    <a href='destination.php' class="logoretour">
        <img src="logoretour.png" alt="Logo" class="logo-img">
    </a>
    <?php
    // Vérifier si l'image0 existe dans l'activité et définir une valeur par défaut si nécessaire
    $backgroundImage = !empty($activites[0]['image0']) ? $activites[0]['image0'] : 'default.jpg';
    ?>
    
    <div class="hero-section" 
         style="background: url('uploadsacti/<?= htmlspecialchars($backgroundImage) ?>') no-repeat center center; background-size: cover;">
        <h1>Explorez Nos Activités Exceptionnelles</h1>
        <p>Découvrez des aventures inoubliables avec nos guides experts.</p>
        <a href="#activities" class="cta-button">Voir toutes les activités</a>
    </div>
</header>
</body>
</html>



    <section id="activities" class="activities-section">
        <h2>Nos Activités Populaires</h2>
        <div class="container">
            <?php 
            // Tableau pour stocker les activités déjà affichées
            $seen_activities = [];  

            if ($activites): 
                foreach ($activites as $activite): 
                    // Vérifier si l'activité a déjà été affichée
                    if (!in_array($activite['idActivité'], $seen_activities)): 
                        // Afficher l'activité
            ?>
           <div class="card">
    <img src="uploadsacti/<?= htmlspecialchars($activite['image1']) ?>" alt="<?= htmlspecialchars($activite['nom1']) ?>">
    <div class="card-content">
        <div class="card-title"><?= htmlspecialchars($activite['nom1']) ?></div>
        <div class="card-info">Guide : <?= htmlspecialchars($activite['guide1'] ?? 'Non précisé') ?></div>
        <div class="card-info">
            Durée : 
            <?php
            if (!empty($activite['durée1'])) {
                $parts = explode(':', $activite['durée1']);
                echo htmlspecialchars($parts[0] . 'h ' . $parts[1] . '');
            } else {
                echo 'Non précisée';
            }
            ?>
        </div>
        <a href="#" class="details-button">Réserver seulement pour <?= htmlspecialchars($activite['prix1']) ?>€ !</a>
        <div class="description-bubble"><?= htmlspecialchars($activite['descriptionA1']) ?></div>
    </div>
</div>

<div class="card">
    <img src="uploadsacti/<?= htmlspecialchars($activite['image2']) ?>" alt="<?= htmlspecialchars($activite['nom2']) ?>">
    <div class="card-content">
        <div class="card-title"><?= htmlspecialchars($activite['nom2']) ?></div>
        <div class="card-info">Guide : <?= htmlspecialchars($activite['guide2'] ?? 'Non précisé') ?></div>
        <div class="card-info">
            Durée : 
            <?php
            if (!empty($activite['durée2'])) {
                $parts = explode(':', $activite['durée2']);
                echo htmlspecialchars($parts[0] . 'h ' . $parts[1] . '');
            } else {
                echo 'Non précisée';
            }
            ?>
        </div>
        <a href="#" class="details-button">Réserver seulement pour <?= htmlspecialchars($activite['prix2']) ?>€ !</a>
        <div class="description-bubble"><?= htmlspecialchars($activite['descriptionA2']) ?></div>
    </div>
</div>

<div class="card">
    <img src="uploadsacti/<?= htmlspecialchars($activite['image3']) ?>" alt="<?= htmlspecialchars($activite['nom3']) ?>">
    <div class="card-content">
        <div class="card-title"><?= htmlspecialchars($activite['nom3']) ?></div>
        <div class="card-info">Guide : <?= htmlspecialchars($activite['guide3'] ?? 'Non précisé') ?></div>
        <div class="card-info">
            Durée : 
            <?php
            if (!empty($activite['durée3'])) {
                $parts = explode(':', $activite['durée3']);
                echo htmlspecialchars($parts[0] . 'h ' . $parts[1] . '');
            } else {
                echo 'Non précisée';
            }
            ?>
        </div>
        <a href="#" class="details-button">Réserver seulement pour <?= htmlspecialchars($activite['prix3']) ?>€ !</a>
        <div class="description-bubble"><?= htmlspecialchars($activite['descriptionA3']) ?></div>
    </div>
</div>

            <?php
                        // Ajouter l'ID de l'activité au tableau des activités affichées
                        $seen_activities[] = $activite['idActivité']; 
                    endif;
                endforeach;
            else: 
            ?>
            <p>Aucune activité disponible pour cette destination.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <p>&copy; Droomreis. Tous droits réservés.</p>
    </footer>
</body>
</html>

