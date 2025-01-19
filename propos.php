<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Droomreis</title>
  
  <link rel="stylesheet" href="General.css">
  <link rel="stylesheet" href="propos.css">

  <!--Logo dans l'onglet-->
  <link rel="icon" href="Flaticon1.png" type="image/png" sizes="48x48">

</head>

<body>
  <!-- En-tête avec navigation -->
  <header class="header">
    <div class="logo">
      <a href="accueil.php"><img src="Logo.png" alt="Logo Droomreis" class="logo-image"></a>
    </div>
    <nav class="nav">
      <a href="accueil.php" >Accueil</a>
      <a href="destination.php">Destinations</a>
      <a href="messagerie.php">Messagerie</a>
      <a href="contact.php">Contact</a>
      <a href="propos.php"class="active">À propos de nous</a>
    </nav>
    <div class="auth-buttons">
      <a href="Formulaire_inscription.html" class='auth-button'>S'inscrire</a>
      <a href="Formulaire_connexion.html" class='auth-button'>Se connecter</a>
    </div>
  </header>


  <!-- Section de recherche -->
  <section class="search-section">
    <form class="search-form" action="recherche.php" method="GET">
      <input type="text" placeholder="Destination" name="destination" aria-label="Recherche de destination">
      <input type="date" name="date" aria-label="Choisir une date">
      <select name="ville" aria-label="Choisir une destination">
        <?php include 'get_villes.php'; ?>
      </select>
      <button type="submit">Rechercher</button>
    </form>
  </section>


  <!-- A propos de nous -->
  <div class="Connexion">
        <h1>Droomreis</h1>
        <form method="post">
          <p>Droomreis est une plateforme innovante, conçue pour simplifier et enrichir l'expérience des voyageurs en leur permettant de réserver des activités uniques accompagnées de guides locaux. </p>
          <p>Droomreis qui signifie "Voyage de rêve" en néerlandais à pour but de vous faire révée à travers notre service </p>
          <p>Le concept, développé par la société 2CDHGroup, met en avant une approche personnalisée et pratique, combinant la découverte culturelle et l'accompagnement expert.</p>
        </form>
    </div>

  <!-- Pied de page -->
  <footer>
    <div class="footer-content">
      <div class="img_footer">
        <a href="accueil.html"><img src="Logo.png" alt="Logo Droomreis" class="logo-size"></a>
      </div>
      <table class="table_footer">
        <tr>
          <th>Assistance et FAQ</th>
          <th>Réseaux sociaux</th>
          <th>Politiques</th>
        </tr>
        <tr>
          <td><a href="faq.php">FAQ</a></td>
          <td><a href="#">Instagram</a></td>
          <td><a href="#">Mentions légales</a></td>
        </tr>
        <tr>
          <td><a href="contact.php">Nous Contacter</a></td>
          <td></td>
          <td><a href="#">Cookies</a></td>
        </tr>
      </table>
      <p class="copyright">Droomreis © 2025</p>
    </div>
  </footer>
</body>
</html>
