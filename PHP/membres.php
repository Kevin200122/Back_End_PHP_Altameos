<?php
session_start();
include('config.php');
if(!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Espace admin</title>
</head>
<body>
    <h1>Bienvenue <?= $_SESSION['pseudo']; ?></h1>
    <p><a href="logout.php" style="color:red; text-decoration: none;">Se déconnecter</a></p>
    <!-- Afficher un lien pour créer un nouveau membre -->
    <p><a href="creation_membre.php" style="color:green; text-decoration: none;">Créer un nouveau membre</a></p>

    <!-- Afficher tous les membres -->
    <?php
    $req = $conn->query('SELECT * FROM membres');
    while($donnees = $req->fetch()) {
        ?>
        <p><?= $donnees['pseudo']; ?> (<?= $donnees['role']; ?>) <a href="delete.php?id=<?= $donnees['id']; ?>" style="color:red; text-decoration: none;">Supprimer le membre</a></p>

        <?php
    }
    ?>
</body>
</html>