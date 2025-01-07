<?php
// Connexion à la base de données
include 'connexion.php';

// Récupérer le filtre de catégorie depuis l'URL
$categorie = isset($_GET['categorie']) ? $_GET['categorie'] : '';

// Construire la requête SQL
$sql = "SELECT * FROM destinations WHERE 1"; // 1 signifie qu'on inclut tout par défaut
if ($categorie && $categorie !== 'tout') {
    $sql .= " AND categorie = '$categorie'"; // Filtrer en fonction de la catégorie
}

// Exécuter la requête
$result = $conn->query($sql);

// Afficher les résultats filtrés
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nom: " . $row["nom"] . "<br>";
        echo "Description: " . $row["description"] . "<br>";
        echo "Prix: " . $row["prix"] . "<br>";
        echo "Image: <img src='" . $row["image"] . "' width='100'><br>";
        echo "<hr>";
    }
} else {
    echo "Aucune destination trouvée pour la catégorie sélectionnée.";
}

$conn->close();
?>
