<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire de Réservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6bbfcb;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
        }

        .header .logo img {
            width: 50px;
            height: 50px;
        }

        .nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #000;
        }

        .auth-buttons .auth-button {
            margin-left: 10px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .search-section {
            padding: 20px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ccc;
        }

        .search-form {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .search-form input,
        .search-form select,
        .search-form button {
            padding: 8px;
            font-size: 16px;
        }

        .search-form button {
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        main {
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .confirmation-box {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            background-color: #fff;
            display: none;
        }

        .confirmation-box button {
            margin: 5px;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .confirmation-box button.cancel {
            background-color: #f44336;
            color: white;
        }

        .confirmation-box button.confirm {
            background-color: #4caf50;
            color: white;
        }

        .recap-container {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="page%20de%20reservation2.php">
                <img src="Logo.png" alt="Logo Droomreis" class="logo-image" />
            </a>
        </div>
        <nav class="nav">
            <a href="accueil.html" class="active">Accueil</a>
            <a href="destination.html">Destinations</a>
            <a href="messagerie.html">Messagerie</a>
            <a href="contact.html">Contact</a>
            <a href="propos.html">A propos de nous</a>
        </nav>
        <div class="auth-buttons">
            <a href="Formulaire_inscription.html" class="auth-button">S'inscrire</a>
            <a href="Formulaire_connexion.html" class="auth-button">Se connecter</a>
        </div>
    </header>

    <main>
        <h1>FORMULAIRE DE RÉSERVATION</h1>
        <div class="form-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Connexion à la base de données
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "mydb";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Vérifier la connexion
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Récupérer les données du formulaire
                $departure_date = $_POST['departureDate'];
                $return_date = $_POST['returnDate'];
                $guide = $_POST['guideSelect'];
                $voyageurs = $_POST['voyageursInput'];
                $name = $_POST['nameInput'];
                $email = $_POST['emailInput'];
                $payment_info = $_POST['paymentInfo'];

                // Préparer et exécuter la requête d'insertion
                $sql = "INSERT INTO reservations (departure_date, return_date, guide, voyageurs, name, email, payment_info)
                VALUES ('$departure_date', '$return_date', '$guide', '$voyageurs', '$name', '$email', '$payment_info')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>Réservation enregistrée avec succès</p>";
                } else {
                    echo "<p>Erreur: " . $sql . "<br>" . $conn->error . "</p>";
                }

                // Fermer la connexion
                $conn->close();
            }
            ?>

            <form action="page%20de%20reservation2.php" method="POST">
                <div class="form-group">
                    <label>Date de départ :</label>
                    <input type="date" id="departureDate" name="departureDate" />
                </div>
                <div class="form-group">
                    <label>Date de retour :</label>
                    <input type="date" id="returnDate" name="returnDate" />
                </div>
                <div class="form-group">
                    <label>Guide :</label>
                    <select id="guideSelect" name="guideSelect">
                        <option>Monica</option>
                        <option>Marie</option>
                        <option>Antoine</></option>
                        <option>Martin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre de voyageurs :</label>
                    <input type="number" id="voyageursInput" name="voyageursInput" value="2" min="1" />
                </div>
                <div class="form-group">
                    <label>Nom :</label>
                    <input type="text" id="nameInput" name="nameInput" pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" title="Le nom doit contenir uniquement des lettres." required />
                </div>
                <div class="form-group">
                    <label>Email :</label>
                    <input type="email" id="emailInput" name="emailInput" />
                </div>
                <div class="form-group">
                    <label>Informations de paiement :</label>
                    <input type="text" id="paymentInfo" name="paymentInfo" />
                </div>

                <div class="confirmation-box" id="confirmationBox">
                    <p>Êtes-vous sûr de vouloir réserver ?</p>
                    <button type="button" class="cancel" onclick="hideConfirmationBox()">Annuler</button>
                    <button type="submit" class="confirm">Confirmer</button>
                </div>

                <button type="button" onclick="showConfirmationBox()">Réserver</button>
            </form>
        </div>

        <div class="recap-container">
            <h2>RÉCAPITULATIF DE LA COMMANDE</h2>
            <p><strong>Dates :</strong> <span id="recapDates"></span></p>
            <p><strong>Guide :</strong> <span id="recapGuide"></span></p>
            <p><strong>Voyageurs :</strong> <span id="recapVoyageurs"></span></p>
            <p><strong>Prix total :</strong> <span id="recapPrix"></span></p>
        </div>
    </main>

    <script>
        // Sélection des éléments du formulaire
        const departureDateInput = document.getElementById("departureDate");
        const returnDateInput = document.getElementById("returnDate");
        const guideSelect = document.getElementById("guideSelect");
        const voyageursInput = document.getElementById("voyageursInput");

        // Sélection des éléments du récapitulatif
        const recapDates = document.getElementById("recapDates");
        const recapGuide = document.getElementById("recapGuide");
        const recapVoyageurs = document.getElementById("recapVoyageurs");
        const recapPrix = document.getElementById("recapPrix");

        // Fonction pour mettre à jour le récapitulatif
        function updateRecap() {
            const departureDate = departureDateInput.value || "N/A";
            const returnDate = returnDateInput.value || "N/A";
            const selectedGuide = guideSelect.options[guideSelect.selectedIndex].text;
            const numberOfVoyageurs = voyageursInput.value || 0;
            const prixTotal = numberOfVoyageurs * 250; // Exemple : 250€ par voyageur

            recapDates.innerHTML = `${departureDate} au ${returnDate}`;
            recapGuide.innerHTML = selectedGuide;
            recapVoyageurs.innerHTML = numberOfVoyageurs;
            recapPrix.innerHTML = `${prixTotal}€`;
        }

        // Ajouter des écouteurs d'événements
        departureDateInput.addEventListener("input", updateRecap);
        returnDateInput.addEventListener("input", updateRecap);
        guideSelect.addEventListener("change", updateRecap);
        voyageursInput.addEventListener("input", updateRecap);

        // Initialiser le récapitulatif
        updateRecap();

        // Confirmation de la réservation
        function showConfirmationBox() {
            document.getElementById("confirmationBox").style.display = "block";
        }

        function hideConfirmationBox() {
            document.getElementById("confirmationBox").style.display = "none";
        }
    </script>
</body>
</html>