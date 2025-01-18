<?php
session_start();

// Connexion à la base de données avec PDO
try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Vérifier si l'ID de l'utilisateur est passé dans l'URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Supprimer l'utilisateur de la base de données
    $stmt = $conn->prepare("DELETE FROM utilisateur WHERE idUtilisateur = :id");
    $stmt->execute([':id' => $userId]);

   // JavaScript pour afficher un pop-up avec la confirmation
   echo "<script type='text/javascript'>
   alert('L\'utilisateur a bien été supprimé.');
   window.location.href = 'dashboard.php'; // Redirection vers la page des utilisateurs après la suppression
</script>";
}

// Récupérer tous les utilisateurs
$stmt = $conn->prepare("SELECT * FROM utilisateur");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Liste des Utilisateurs</h2>

<?php if (count($users) > 0): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Email</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Rôle</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['emailU']) ?></td>
                    <td><?= htmlspecialchars($user['nomU']) ?></td>
                    <td><?= htmlspecialchars($user['prénomU']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                    <td>
                        <!-- Lien de suppression avec l'ID de l'utilisateur et confirmation via popup -->
                        <a href="delete_user.php?id=<?= $user['idUtilisateur'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun utilisateur trouvé.</p>
    
<?php endif; ?>
