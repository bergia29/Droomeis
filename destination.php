<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: destination_connecté.php");
    exit;
}

?>

<?php


// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer toutes les destinations
$sql = "SELECT * FROM destinations";
$result = $conn->query($sql);

// Créer un tableau pour stocker les destinations
$destinations = [];

if ($result->num_rows > 0) {
    // Récupérer chaque ligne du résultat
    while($row = $result->fetch_assoc()) {
        $destinations[] = $row;
    }
}

// Fermer la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Droomreis - Page d'accueil</title>
  <link rel="stylesheet" href="style.css">
  <script src="java.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style >
.grid-item {
display: flex;
}
</style>
</head>
<body>

<header class="header">
    <div class="logo">
        <img src="Logo.png" alt="Logo Droomreis" class="logo-image">
    </div>
    <nav class="nav">
        <a href="accueil.php">Accueil</a>
        <a href="index.php">Destinations</a>
        <a href="#">Messagerie</a>
        <a href="#">Contact</a>
        <a href="#">A propos de nous</a>
    </nav>
    <div class="auth-buttons-container">
        <div class="auth-buttons">
                <!-- Si l'utilisateur n'est pas connecté -->
                <a href="Formulaire_inscription.html"><button>S'inscrire</button></a>
                <a href="Formulaire_connexion.html"><button>Se connecter</button></a>

        </div>
    </div>
</header>


  <div id="loginModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeModalBtn">&times;</span>
    <!-- Remplacer le contenu par l'iframe contenant la page que vous avez créée -->
    <iframe src="popup.html" width="100%" height="400px" style="border: none;"></iframe>
  </div>
</div>

  <div class="filter-bubbles">
  <button class="bubble" data-filter="mer"><img src="c.png" alt="mer" class="logo-filtres">Mer</button>
  <button class="bubble" data-filter="desert"><img src="desert.png" alt="desert" class="logo-filtres">Désert</button>
  <button class="bubble" data-filter="randonnée"><img src="montagne.png" alt="randonnée" class="logo-filtres">Randonnée</button>
  <button class="bubble" data-filter="ville"><img src="ville.png" alt="ville" class="logo-filtres">Ville</button>
  <button class="bubble" data-filter="safari"><img src="safari.png" alt="safari" class="logo-filtres">Safari</button>
  <button class="bubble" data-filter="musée"><img src="musée.jpg" alt="musée" class="logo-filtres">Musée</button>
  <button class="bubble" data-filter="escalade"><img src="escalade.png" alt="escalade" class="logo-filtres">Escalade</button>
  <button class="bubble" data-filter="artisanat"><img src="artisanat.png" alt="artisanat" class="logo-filtres">Artisanat</button>
  <button class="bubble" data-filter="plongée"><img src="plongée.png" alt="plongée" class="logo-filtres">Plongée</button>
  <button class="bubble" data-filter="circuit-détente"><img src="circuit-détente.png" alt="circuit-détente" class="logo-filtres">Ciruit-détente</button>
</div>
  <div class="grid-wrapper">
  <div class="button-container">
  <button class="bubble" data-filter="tout" data-parametre="tout"><img src="voirtout.png" alt="voir-tout" class="logo-filtres">Voir-tout</button>
  </div>

  <!-- Ajout de l'affichage des destinations récupérées -->
<div class="grid-container">
    <?php
    foreach ($destinations as $destination) {
        echo '
            <div class="grid-item" data-category="' . htmlspecialchars($destination['categorie']) . '">
                <img src="' . htmlspecialchars($destination['image']) . '" alt="' . htmlspecialchars($destination['ville']) . ', ' . htmlspecialchars($destination['pays']) . '" class="grid-item-image">
                <div class="image-caption">
                    <p><strong>' . htmlspecialchars($destination['ville']) . ', ' . htmlspecialchars($destination['pays']) . '</strong></p>
                    <p class="caption">' . htmlspecialchars($destination['description']) . '</p>
                </div>

                <a href="destination.php?id=' . $destination['idDestination'] . '">
                <a href="#" class="mald">
                    <button class="price-bubble">À partir de ' . htmlspecialchars($destination['prix']) . '€ TTC*</button>
                    </a>
                </a>
                <button class="price-bubble1" id="openModalBtn">♡</button>
            </div>';
    }
    ?>

</div>
</body>
</html>
