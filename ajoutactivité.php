<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="activité.css">
    <title>Ajouter une Activité</title>
</head>
<body>
    <h1>Ajouter une Activité</h1>
    <form action="ajouter_activite.php" method="POST" enctype="multipart/form-data">

        

        <!-- ID Destination -->
        <!-- Menu déroulant pour sélectionner la destination -->
<label for="idDestination">Destination :</label>
<select id="idDestination" name="idDestination" required>
    <option value="">Sélectionner une destination</option>
    <?php
    // Connexion et récupération des destinations existantes
    include('connexion.php');

    $sql = "SELECT idDestination, pays, ville FROM destinations";
    $result = $conn->query($sql);

    // Vérification des résultats
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . htmlspecialchars($row['idDestination']) . '">'
                . htmlspecialchars($row['pays']) . ' - ' . htmlspecialchars($row['ville'])
                . '</option>';
        }
    } else {
        echo '<option value="">Aucune destination disponible</option>';
    }
    ?>
</select><br><br>


<!-- Activité 1 -->
<div class="activity-block">
    <h3>Activité 1</h3>
    <!-- Nom de l'activité -->
    <label for="nom1">Nom de l'activité :</label>
    <input type="text" id="nom1" name="nom1" required><br><br>

    <!-- Durée de l'activité -->
    <label for="durée1">Durée (HH:MM) :</label>
    <input type="time" id="durée1" name="durée1" required><br><br>

    <!-- Prix de l'activité -->
    <label for="prix1">Prix de l'activité :</label>
    <input type="number" id="prix1" name="prix1" step="0.01" required><br><br>

    <!-- Guide de l'activité -->
    <label for="guide1">Guide :</label>
    <input type="text" id="guide1" name="guide1" required><br><br>

    <!-- Description de l'activité -->
    <label for="descriptionA1">Description :</label>
    <textarea id="descriptionA1" name="descriptionA1" required></textarea><br><br>

    <!-- Image de l'activité -->
    <label for="image1">Image :</label>
    <input type="file" id="image1" name="image1" accept="image/*"><br><br>
</div>

<hr> <!-- Séparateur entre les activités -->

<!-- Activité 2 -->
<div class="activity-block">
    <h3>Activité 2</h3>
    <label for="nom2">Nom de l'activité :</label>
    <input type="text" id="nom2" name="nom2" required><br><br>

    <label for="durée2">Durée (HH:MM) :</label>
    <input type="time" id="durée2" name="durée2" required><br><br>

    <label for="prix2">Prix de l'activité :</label>
    <input type="number" id="prix2" name="prix2" step="0.01" required><br><br>

    <label for="guide2">Guide :</label>
    <input type="text" id="guide2" name="guide2" required><br><br>

    <label for="descriptionA2">Description :</label>
    <textarea id="descriptionA2" name="descriptionA2" required></textarea><br><br>

    <label for="image2">Image :</label>
    <input type="file" id="image2" name="image2" accept="image/*"><br><br>
</div>

<hr>

<!-- Activité 3 -->
<div class="activity-block">
    <h3>Activité 3</h3>
    <label for="nom3">Nom de l'activité :</label>
    <input type="text" id="nom3" name="nom3" required><br><br>

    <label for="durée3">Durée (HH:MM) :</label>
    <input type="time" id="durée3" name="durée3" required><br><br>

    <label for="prix3">Prix de l'activité :</label>
    <input type="number" id="prix3" name="prix3" step="0.01" required><br><br>

    <label for="guide3">Guide :</label>
    <input type="text" id="guide3" name="guide3" required><br><br>

    <label for="descriptionA3">Description :</label>
    <textarea id="descriptionA3" name="descriptionA3" required></textarea><br><br>

    <label for="image3">Image :</label>
    <input type="file" id="image3" name="image3" accept="image/*"><br><br>
</div>

<hr>

<!-- Image de fond -->
<div class="back-image-block">
    <h3>Image de fond</h3>
    <label for="image0">Image de fond :</label>
    <input type="file" id="image0" name="image0" accept="image/*"><br><br>
</div>

        <button type="submit">Ajouter l'Activité</button>
    </form>
</body>
</html>
