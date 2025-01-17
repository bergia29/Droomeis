<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Droomreis</title>
  
  <link rel="stylesheet" href="General.css">
  
  <link rel="stylesheet" href="messagerie.css">
  <script src="script_accueil.js" defer></script>
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
      <a href="messagerie.php"class="active">Messagerie</a>
      <a href="contact.php">Contact</a>
      <a href="propos.php">À propos de nous</a>
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



  <body>
    <div class="message">
       <h1 class="title">Messagerie</h1>
       <hr class="divider">
       <div class="button-container">
       <button class="button">Nouvelle conversation</button>
        <button class="button">Retour à l'accueil</button>
       </div>
       <hr class="divider">
       <div class="search-container">
           <span class="search-icon">🔍</span>
            <input type="text" class="search-input" placeholder="Nom,prénom" oninput="filterContacts()">
       </div>
    
       <h3 class="sub-title">Liste des conversations</h3>

       <div class="contact-list" id="contactList">
           <div class="contact-item">
               <img src="Mr_A.jpg" alt="Mr A" class="contact-photo">
               <div class="contact-info">
                   <h3 class="contact-name">Mr A</h3>
                   <p class="contact-preview">Bonjour, je suis là</p>
               </div> 
           </div>
           <div class="contact-item">
               <img src="Mr_B.jpg" alt="Mr B" class="contact-photo">
               <div class="contact-info">
                   <h3 class="contact-name">Mr B</h3>
                   <p class="contact-previw">hello, i'm here</p>
               </div> 
           </div>
           <div class="contact-item">
               <img src="Mr_C.jpg" alt="Mr C" class="contact-photo">
               <div class="contact-info">
                   <h3 class="contact-name">Mr C</h3>
                   <p class="contact-previw">hello, i'm here too</p>
               </div> 
           </div>
   
        </div>
    </div>

      <!-- Zone de Chat-->
  <div class="container chat-zone">
    <!--  -->
    <div class="chat-header">
      <h2>Zone de Chat</h2>
    </div>

    <div class="chat-status">
      <div class="recipient">
        <span><strong>Nom:</strong> Mr A</span>
      </div>
      <div class="status">
        <span><strong>Statut:</strong> en ligne</span>
      </div>
    </div>

    <!-- Partie 3-->
    <div class="chat-box">
      <!-- Gauche -->
      <div class="chat-message left">
        <p class="message-text">Bonjour Madame, j’aimerai avoir des informations concernant les activités du voyage s’il vous plaît, il s’agit de Bali, pour deux semaines.</p>
        <span class="message-meta">10:00 - Reçu</span>
      </div>
      <!-- Droite -->
      <div class="chat-message right">
        <p class="message-text">Bonjour Monsieur, en effet les activités de ce voyage sont prévues à partir de la semaine prochaine, pour durée de minimum 3 jours.</p>
        <span class="message-meta">10:05 - Lu</span>
      </div>
      <!-- Gauche -->
      <div class="chat-message left">
        <p class="message-text">Je vous remercie pour votre retour.</p>
        <span class="message-meta">10:10 - Reçu</span>
      </div>
    </div>

    <!--  -->
    <div class="chat-input">
      <input type="text" placeholder="Écrire un message..." />
      <button class="send-button">Envoyer</button>
    </div>
  </div>

  <footer class="footer">
    <a href="accueil.php"><img src="Logo.png" alt="Logo Droomreis" class="logo-image-footer"></a>
    <a href="#">Mentions légales</a>
    <a href="#">Twitter</a>
    <a href="#">TikTok</a>
    <a href="#">Instagram</a>
    <p class="copyright">Droomreis © 2024</p>
  </footer>
    

  <script scr="messagerie.js"></script>

  <!-- Pied de page -->
  <footer class="footer">
    <a href="accueil.php">
      <img src="Logo.png" alt="Logo Droomreis" class="logo-image-footer">
    </a>
    <a href="#">Mentions légales</a>
    <a href="#">Twitter</a>
    <a href="#">TikTok</a>
    <a href="#">Instagram</a>
    <p class="copyright">Droomreis © 2024</p>
  </footer>
</body>
</html>

