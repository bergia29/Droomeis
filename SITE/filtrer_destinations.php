<?php
// Connexion à la base de données
include 'connexion.php';

// Récupérer les destinations depuis la base de données
$sql = "SELECT * FROM destinations"; // Requête pour récupérer toutes les destinations
$result = $conn->query($sql);

// Afficher les destinations
echo '<div class="grid-container">';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="grid-item" data-category="' . $row["categorie"] . '">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["nom"] . '" class="grid-item-image">';
        echo '<div class="image-caption">';
        echo '<p><strong>' . $row["nom"] . '</strong></p>';
        echo '<p class="caption">' . $row["description"] . '</p>';
        echo '</div>';
        echo '<button class="price-bubble">À partir de ' . $row["prix"] . '€ TTC*</button>';
        echo '</div>';
    }
} else {
    echo "Aucune destination trouvée.";
}
echo '</div>';

$conn->close();
?>
