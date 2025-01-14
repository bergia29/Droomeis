<?php
// Connexion à la base de données
include 'connexion.php';

// Récupérer les destinations depuis la base de données
$sql = "SELECT * FROM destinations"; // Requête pour récupérer toutes les destinations
$result = $conn->query($sql);

// Afficher les destinations
if ($result->num_rows > 0) {
    // Début de la grille
    echo '<div class="grid-container">';
    
    while ($row = $result->fetch_assoc()) {
        // On crée chaque destination selon le modèle défini
        echo '<div class="grid-item" data-category="' . $row["categorie"] . '">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["nom"] . '" class="grid-item-image">';
        echo '<div class="image-caption">';
        echo '<p><strong>' . $row["nom"] . '</strong></p>';
        echo '<p class="caption">' . $row["description"] . '</p>';
        echo '</div>';
        echo '<a href="' . $row["page_link"] . '" class="mald">'; // Lien de la page de destination
        echo '<button class="price-bubble">À partir de ' . $row["prix"] . '€ TTC*</button>';
        echo '</a>';
        echo '<button class="price-bubble1" id="openModalBtn">♡</button>';
        echo '</div>'; // Fermeture de l'élément grid-item
    }
    
    echo '</div>'; // Fermeture de la grille
} else {
    echo "Aucune destination trouvée.";
}

// Fermer la connexion
$conn->close();
?>
