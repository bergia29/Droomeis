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

    <label>Catégorie(s):</label><br>
    <input type="checkbox" id="mer" name="categorie[]" value="mer">
    <label for="mer">Mer</label><br>
    <input type="checkbox" id="plongée" name="categorie[]" value="plongée">
    <label for="plongée">Plongée</label><br>
    <input type="checkbox" id="circuit" name="categorie[]" value="circuit-détente">
    <label for="circuit">Circuit Détente</label><br>
    <input type="checkbox" id="desert" name="categorie[]" value="desert">
    <label for="desert">Désert</label><br>
    <input type="checkbox" id="randonnée" name="categorie[]" value="randonnée">
    <label for="randonnée">Randonnée</label><br>
    <input type="checkbox" id="safari" name="categorie[]" value="safari">
    <label for="safari">Safari</label><br>
    <input type="checkbox" id="musée" name="categorie[]" value="musée">
    <label for="musée">Musée</label><br>
    <input type="checkbox" id="escalade" name="categorie[]" value="escalade">
    <label for="escalade">Escalade</label><br>
    <input type="checkbox" id="artisanat" name="categorie[]" value="artisanat">
    <label for="artisanat">Artisanat</label><br>
    <input type="checkbox" id="ville" name="categorie[]" value="ville">
    <label for="ville">Ville</label><br>


    
    <input type="submit" value="Ajouter la destination">
</form>
