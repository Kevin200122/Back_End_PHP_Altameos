<?php
session_start();
include('config.php');
if(!$_SESSION['pseudo']) {
    header('Location: connexion.php');
    
}

// Vérifier si l'utilisateur est un administrateur
if($_SESSION['role'] !== 'admin') {
    header('Location: accueil.php'); // Rediriger vers une page d'accueil appropriée pour les utilisateurs normaux
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

<!-- Afficher les vidéos -->
<?php
$req = $conn->query('SELECT * FROM membres');
while($donnees = $req->fetch()) {
    ?>
    <p><?= $donnees['pseudo']; ?> (<?= $donnees['role']; ?>) <a href="delete.php?id=<?= $donnees['id']; ?>" style="color:red; text-decoration: none;">Supprimer le membre</a></p>
    <?php
}
?>

<!-- Afficher le formulaire d'upload de vidéos uniquement pour les administrateurs -->
<?php if($_SESSION['role'] === 'admin') : ?>
    <h2>Uploader une vidéo</h2>
    <div class="container mt-5">
    <form method="POST" action="Upload_video.php" enctype="multipart/form-data">
    <div class="mb-3">
    <label for="video_file" class="form-label">Video fichier:</label>
    <input type="file" name="video_file" id="video_file" class="form-control">
    </div>
    <div class="mb-3">
    <label for="video_title" class="form-label">video Titre:</label>
    <input type="text" name="video_title" id="video_title" class="form-control">
    </div>
    <div class="mb-3">
    <label for="nom" class="form-label">Nom:</label>
    <input type="text" name="Nom" id="LeNom" class="form-control">
    </div>
    <div class="mb-3">
    <label for="contenu" class="form-label">Contenu:</label>
    <textarea name="contenu" id="contenu" class="form-control"></textarea>
    </div>
    <input type="submit" name="submit" value="Upload" class="btn btn-primary">
    <?php endif; ?>
    </body>
    </html>