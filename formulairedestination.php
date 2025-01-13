<form method="post" action="ajouter_destinations.php" enctype="multipart/form-data">
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>
    
    <label for="ville">Ville:</label>
    <input type="text" id="ville" name="ville" required><br><br>
    
    <label for="pays">Pays:</label>
    <input type="text" id="pays" name="pays" required><br><br>
    
    <label for="image">Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required><br><br>
    
    <label for="prix">Prix:</label>
    <input type="number" id="prix" name="prix" step="0.01" required><br><br>

    <label for="categorie">Catégorie(s):</label>
    <select name="categorie" id="categorie">
        <option value="plage">mer</option>
        <option value="montagne">desert</option>
        <option value="ville">Ville</option>
        <option value="campagne">Safari</option>
        <option value="campagne">Musée</option>
        <option value="campagne">Escalade</option>
        <option value="campagne">Artisanat</option>
        <option value="aventure">Plongée</option>
        <option value="detente">Circuit-détente</option>
        <option value="campagne">Randonnée</option>
    </select><br><br>
    
    <input type="submit" value="Ajouter la destination">
</form>
