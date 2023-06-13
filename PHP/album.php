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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Afficher les albums</title>
</head>
<body>
<?php
$req = $conn->query('SELECT * FROM album');
while($donnees = $req->fetch()) {//fetch() fetches the next row from a result set
    ?>
    <div class="album"style="border: 1px solid black;">
    <h2><?= $donnees['titre']; ?></h2>
    <p><?= $donnees['contenu']; ?></p>
    <p><?= $donnees['Auteur']; ?></p>
    <a href="Supprime_Album.php?id=<?= $donnees['id']; ?>">
    <button style="color:red; text-decoration: none;">Supprimé l'album</button>
    </a>
    <a href="modifier_album.php?id=<?= $donnees['id']; ?>">
    <button style="color:red; text-decoration: none;">Modifié l'album</button>
    </a>
    </div>
    <br>
    <?php
}
?>
</body>
</html>