<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact - Droomreis</title>
  
  <link rel="stylesheet" href="General.css"> 
  <link rel="stylesheet" href="contact.css"> 

  
  <link rel="stylesheet" href="Style_accueil.css">
  <!--Logo dans l'onglet-->
  <link rel="icon" href="Flaticon1.png" type="image/png" sizes="48x48">


</head>

<body>
  <!-- En-tête avec navigation -->
  <header class="header">
    <div class="logo">
      <a href="accueil.php"><img src="Logo.png" alt="Logo Droomreis" class="logo-image"></a>
    </div>
    <nav class="nav"> <!-- Menu -->
      <a href="accueil.php" >Accueil</a>
      <a href="destination.php">Destinations</a>
      <a href="messagerie.php">Messagerie</a>
      <a href="contact.php"class="active">Contact</a>
      <a href="propos.php">À propos de nous</a>
    </nav>
    <div class="auth-buttons">
      <a href="Formulaire_inscription.html" class='auth-button'>S'inscrire</a>
      <a href="Formulaire_connexion.html" class='auth-button'>Se connecter</a>
    </div>
  </header>

  <section class="search-section">
      <form class="search-form" action="recherche.php" method="GET">
        <input type="text" placeholder="Pays" name="destination" aria-label="Recherche de destination">
        <input type="date" name="date" aria-label="Choisir une date">
        <select name="ville" aria-label="Choisir une destination">
          <?php include 'get_villes.php'; ?>
        </select>
        <button type="submit">Rechercher</button>
      </form>
  </section>



  <div class="Contact">
    <h1>Nous contacter</h1>
    <form method="post">
      <p class='Contact_admin'>Contactez notre équipe pour en savoir plus sur Droomreis </p>
    </form>
    <form action="traitement-contact.php" method="post">
      <div>
        <label for="cNom">Nom</label>
        <input type="text" id="nom" name="nomC" placeholder="DURAND" required>
      </div>
      <div>
        <label for="cPrenom">Prénom</label>
        <input type="text" id="prénom" name="prénomC" placeholder="Sarah" required autofocus>
      </div>
      <div>
        <label for="cEmail">E-mail</label>
        <input type="email" id="email" name="emailC" placeholder="monadresse@gmail.com" required>
      </div>
      <div>
        <label for="cObjet">Objet</label>
        <select id="objet" name="objetC" required aria-label="Sélectionnez votre motif">
          <option value="" disabled selected>Choisissez un motif</option>
          <option value="Info_general">Demande d'information</option>
          <option value="Probleme_resa">Problème avec une réservation</option>
          <option value="feedback">Feedback</option>
          <option value="autre">Autre</option>
        </select>
      </div>
      <div>
        <label for="cContenu">Contenu</label>
        <textarea id="contenuC" name="contenuC" placeholder="Écrivez votre message ici" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn-submit">Valider</button>
      </div>
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
