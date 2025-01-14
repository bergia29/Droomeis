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
  <style>
    .grid-item {
      display: flex;
    }
  </style>
</head>
</html>


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
      <a href="accueil.html">Accueil</a>
      <a href="index.html">Destinations</a>
      <a href="#">Messagerie</a>
      <a href="#">Contact</a>
    </nav>
    <div class="auth-buttons-container">
    <div class="auth-buttons">
      <a href="Formulaire_inscription.html"><button>S'inscrire</button></a>
      <a href="Formulaire_connexion.html"><button>Se connecter</button></a>
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

                <a href="destination.php?id=' . $destination['id'] . '">
                <a href="#" class="mald">
                    <button class="price-bubble">À partir de ' . htmlspecialchars($destination['prix']) . '€ TTC*</button>
                    </a>
                </a>
                <button class="price-bubble1" id="openModalBtn">♡</button>
            </div>';
    }
    ?>
  </div>
  <!-- Grille d'images ou d'éléments placée en bas -->
 <div class="grid-container">
    <div class="grid-item" data-category="mer circuit-détente plongée">
      <img src="maldives.webp" alt="Maldives" class="grid-item-image">
      <div class="image-caption">
        <p><strong>Sun Siyam Iru Veli, Maldives</strong></p>
        <p class="caption">un havre de paix avec des villas sur pilotis, des eaux cristallines et des plages paradisiaques</p>
      </div>
      <a href="maldives.html" class="mald">
      <button class="price-bubble">À partir de 899€ TTC*</button>
  </a>
      <button class="price-bubble1" id="openModalBtn">♡</button>
    </div>
    <div class="grid-item"data-category="mer artisanat circuit-détente plongée randonnée">
      <img src="bali.jpg" alt="Bali" class="grid-item-image">
      <div class="image-caption">
        <p><strong>Bali, Indonésie</strong></p>
        <p class="caption">embarquez pour une aventure unique entre volcans fascinants, forêts luxuriantes et temples sacrés</p>
      </div>
      <a href="bali.html" class="mald">
      <button class="price-bubble">À partir de 999€ TTC*</button>
  </a>
      <button class="price-bubble1">♡</button>
    </div>
    <div class="grid-item"data-category="musée randonnée ville">
      <img src="NYC.jpg" alt="New York City" class="grid-item-image">
      <div class="image-caption">
        <p><strong>New York City, États-Unis</strong></p>
        <p class="caption">une ville où les gratte-ciels imposants, les rues animées et les monuments emblématiques vous attendent</p>
      </div>
      <a href="NYC.html" class="mald">
      <button class="price-bubble">À partir de 1299€ TTC*</button>
  </a>
      <button class="price-bubble1">♡</button>
    </div>
    <div class="grid-item"data-category="randonnée désert artisanat desert">
      <img src="turquie.jpg" alt="Turquie" class="grid-item-image">
      <div class="image-caption">
        <p><strong>Cappadoce, Turquie</strong></p>
        <p class="caption">un lieu magique avec des cheminées de fées, paysages féériques et montgolfières offrant un spectacle unique</p>

      </div>
      <a href="Turquie.html" class="mald">
      <button class="price-bubble">À partir de 799€ TTC*</button>
  </a>
      <button class="price-bubble1">♡</button>
    </div>
    <div class="grid-item"data-category="ville musée randonnée">
      <img src="chine.jpg" alt="Chine" class="grid-item-image">
      <div class="image-caption">
        <p><strong>Pékin, Chine</strong></p>
        <p class="caption">une ville où les trésors historiques, les temples majestueux et l'effervescence urbaine s'entrelacent</p>
      </div>
      <a href="Chine.html" class="mald">
      <button class="price-bubble">À partir de 1199€ TTC*</button>
  </a>
      <button class="price-bubble1">♡</button>
    </div>
    <div class="grid-item"data-category="ville mer circuit-détente">
      <img src="grece.webp" alt="Grèce" class="grid-item-image">
      <div class="image-caption">
        <p><strong>Santorin, Grèce</strong></p>
        <p class="caption"> une île où paysages volcaniques, villages pittoresques et mer turquoise forment un décor inoubliable</p>
      </div>
      <a href="Grèce.html" class="mald">
      <button class="price-bubble">À partir de 899€ TTC*</button>
  </a>
      <button class="price-bubble1">♡</button>
    </div>


<div class="grid-item hidden" data-category="ville musée randonnée"> 
    <img src="rome.jpg" alt="rome" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Rome, Italie</strong></p>
        <p class="caption">Une ville où les vestiges impériaux, les fontaines emblématiques et l'âme de la capitale vous accueillent</p>
    </div>
    <a href="rome.html" class="mald">
    <button class="price-bubble">À partir de X€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div> <!-- Fermeture de la div de Rome -->

<div class="grid-item hidden" data-category="ville musée randonnée desert">
    <img src="egypte.webp" alt="egypte" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Le Caire, Égypte</strong></p>
        <p class="caption">Une ville où les pyramides majestueuses, les trésors antiques et les souks offrent une expérience unique</p>
    </div>
    <a href="egypte.html" class="mald">
    <button class="price-bubble">À partir de X€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div> <!-- Fermeture de la div du Caire -->

<div class="grid-item hidden" data-category="escalade randonnée circuit-détente"> 
    <img src="chamomix.jpg" alt="chamomix" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Chamomix, France</strong></p>
        <p class="caption">un mélange parfait de panoramas époustouflants, d'aventures en montagne et d'une ambiance dynamique</p>
    </div>
    <a href="chamomix.html" class="mald">
    <button class="price-bubble">À partir de X€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div> <!-- Fermeture de la div de Chamomix -->

<div class="grid-item hidden" data-category="safari randonnée circuit-détente"> 
    <img src="serengeti.jpg" alt="serengeti" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Le Serengeti, Tanzanie</strong></p>
        <p class="caption">un endroit où la savane infinie, les animaux sauvages et le ciel ouvert forment un tableau spectaculaire</p>
    </div>
    <a href="seregenti.html" class="mald">
    <button class="price-bubble">À partir de X€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<div class="grid-item hidden" data-category="safari randonnée circuit-détente"> 
    <img src="elchalten.jpg" alt="elchalten" class="grid-item-image">
    <div class="image-caption">
        <p><strong>El Chaltén, Argentine</strong></p>
        <p class="caption">Un village au cœur des Andes, entouré de sommets majestueux et de sentiers vers des merveilles naturelles</p>
    </div>
    <a href="Argentine.html" class="mald">
    <button class="price-bubble">À partir de € TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<div class="grid-item hidden" data-category="escalade mer artisanat randonnée circuit-détente"> 
    <img src="kalymnos.jpg" alt="kalymnos" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Kalymnos, Grèce</strong></p>
        <p class="caption">Une île grecque authentique, célèbre pour ses falaises spectaculaires, ses eaux cristallines et sa paix</p>
    </div>
    <a href="kalymnos.html" class="mald">
    <button class="price-bubble">À partir de X€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 1 - Mer -->
<div class="grid-item hidden" data-category="mer plongée circuit-détente">
    <img src="amalfi.jpg" alt="Amalfi" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Amalfi, Italie</strong></p>
        <p class="caption">Profitez des eaux turquoise et des falaises majestueuses de la côte amalfitaine.</p>
    </div>
    <a href="amalfi.html" class="mald">
    <button class="price-bubble">À partir de 455€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 2 - Désert -->
<div class="grid-item hidden" data-category="désert randonnée circuit-détente">
    <img src="wadi_rum.jpg" alt="Wadi Rum" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Wadi Rum, Jordanie</strong></p>
        <p class="caption">Traversez des paysages lunaires et découvrez la magie du désert jordanien, un lieu hors du temps.</p>
    </div>
    <a href="jordanie.html" class="mald">
    <button class="price-bubble">À partir de 768€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 3 - Randonnée -->
<div class="grid-item hidden" data-category="randonnée escalade circuit-détente">
    <img src="mont_fuji.jpg" alt="Mont Fuji" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Mont Fuji, Japon</strong></p>
        <p class="caption">Grimpez le sommet emblématique du Japon et admirez ses vues spectaculaires au lever du soleil.</p>
    </div>
    <a href="fuji.html" class="mald">
    <button class="price-bubble">À partir de 1060€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 4 - Ville -->
<div class="grid-item hidden" data-category="ville musée artisanat">
    <img src="kyoto.jpg" alt="Kyoto" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Kyoto, Japon</strong></p>
        <p class="caption">Explorez les temples anciens, les jardins paisibles et l'artisanat traditionnel de cette ville historique.</p>
    </div>
    <a href="kyoto.html" class="mald">
    <button class="price-bubble">À partir de 1029€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 5 - Safari -->
<div class="grid-item hidden" data-category="safari circuit-détente">
    <img src="parc_kruger.webp" alt="Parc Kruger" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Parc Kruger, Afrique du Sud</strong></p>
        <p class="caption">Vivez l'aventure d'un safari exceptionnel et observez les Big Five dans leur habitat naturel.</p>
    </div>
    <a href="parc_kruger.html" class="mald">
    <button class="price-bubble">À partir de 994€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 6 - Musée -->
<div class="grid-item hidden" data-category="musée ville artisanat">
    <img src="paris.jpg" alt="Paris" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Paris, France</strong></p>
        <p class="caption">Admirez les trésors artistiques dans le plus célèbre musée du monde.</p>
    </div>
    <a href="Paris.html" class="mald">
    <button class="price-bubble">À partir de 40€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 7 - Escalade -->
<div class="grid-item hidden" data-category="escalade randonnée circuit-détente">
    <img src="yosemite.jpg" alt="Yosemite" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Yosemite, États-Unis</strong></p>
        <p class="caption">Grimpez les parois vertigineuses de ce parc légendaire et profitez de ses vues spectaculaires.</p>
    </div>
    <a href="yosemite.html" class="mald">
    <button class="price-bubble">À partir de X€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 8 - Artisanat -->
<div class="grid-item hidden" data-category="artisanat ville musée">
    <img src="marrakech.jpg" alt="Marrakech" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Marrakech, Maroc</strong></p>
        <p class="caption">Découvrez les souks animés et l'artisanat traditionnel dans cette ville vibrante.</p>
    </div>
    <a href="marrakech.html" class="mald">
    <button class="price-bubble">À partir de X€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 9 - Plongée -->
<div class="grid-item hidden" data-category="plongée mer randonnée circuit-détente">
    <img src="queensland.jpg" alt="queensland" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Queensland, Australie</strong></p>
        <p class="caption">Explorez le plus grand récif corallien du monde, un joyau naturel à couper le souffle.</p>
    </div>
    <a href="queensland.html" class="mald">
    <button class="price-bubble">À partir de € TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>

<!-- Exemple 10 - Circuit-détente -->
<div class="grid-item hidden" data-category="circuit-détente mer artisanat">
    <img src="thailande.jpg" alt="Koh Samui" class="grid-item-image">
    <div class="image-caption">
        <p><strong>Koh Samui, Thaïlande</strong></p>
        <p class="caption">Détendez-vous sur des plages paradisiaques et explorez les marchés locaux exotiques.</p>
    </div>
    <a href="thailande.html" class="mald">
    <button class="price-bubble">À partir de X€ TTC*</button>
</a>
    <button class="price-bubble1">♡</button>
</div>
  </div>
</div>
</div>
</body>
</html>
