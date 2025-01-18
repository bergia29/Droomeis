<?php
// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<main>
    <h2>Gestion des Utilisateurs</h2>
    <a href="add_user.php">Ajouter un utilisateur</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Rôle</th>
                <th>Date de Création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->prepare("SELECT * FROM utilisateur ORDER BY cree_a DESC");
            $stmt->execute();
            $users = $stmt->fetchAll();
            foreach ($users as $user):
            ?>
                <tr>
                    <td><?= $user['idUtilisateur'] ?></td>
                    <td><?= $user['emailU'] ?></td>
                    <td><?= $user['nomU'] ?></td>
                    <td><?= $user['prénomU'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['cree_a'] ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $user['idUtilisateur'] ?>">Modifier</a> | 
                        <a href="delete_user.php?id=<?= $user['idUtilisateur'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php

?>
