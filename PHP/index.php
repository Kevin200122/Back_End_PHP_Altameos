<?php
session_start();
if(!$_SESSION['pseudo']) {
    header('Location: Connexion.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="../styles/style.css">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="#">Navbar</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
<li class="barre-item">
<a class="barre-link" href="membres.php">Afficher les membres</a>
</li>
<li class="barre-item">
<a class="barre-link" href="Les_Membres.php">Afficher tous les membres</a>
</li>
<li class="barre-item">
<a class="barre-link" href="publier_article.php">Publier un article</a>
</li>
<li class="barre-item">
<a class="barre-link" href="articles.php">Afficher tous les articles</a>
</li>
<li class="barre-item">
<a class="barre-link" href="Telecharger_podcast.php">Podcast</a>
</li>
<li class="barre-item">
<a class="barre-link" href="modifier_categorie.php">Catégorie</a>
</li>
<li class="barre-item">
<a class="barre-link" href="../Back-end/index.php">dashboard</a>
</li>
<li class="barre-item">
<a class="barre-link" href="Telecharger_album.php">Telecharger_album</a>
<li class="barre-item">
<li class="barre-item">
<a class="barre-link" href="Uploader_Des_Videos.php">Uploader des Vidéos</a>
<li class="barre-item">
<a class="barre-link" href="Upload_La_Video.php">Uploader la Vidéo</a>
<li class="barre-item">
<a class="barre-link" href="Afficher_Video.php">Afficher les Vidéos</a>
<li class="barre-item">
<a class="barre-link" href="Modifier_La_Video.php">Modifier les videos</a>
<li class="barre-item">
<a class="barre-link" href="Modifier_Video.php">Modifier video</a>
<li class="barre-item">
<a class="barre-link" href="Supprimer_La_Video.php">Supprimer les videos</a>
<li class="barre-item">
<a class="barre-link" href="Upload_Clips.php">Upload clips</a>
<li class="barre-item">
<a class="barre-link" href="Afficher_Clips.php">Afficher les clips</a>
<li class="barre-item">
<a class="barre-link" href="Accueil.php">Accueil</a>
<li class="barre-item">
<a class="barre-link" href="Page_de_garde.php">Page de garde</a>
<li class="barre-item">
<a class="barre-link" href="A_PROPOS_DE_MOI.php">À PROPOS DE MOI</a>
<li class="barre-item">
<a class="barre-link" href="logout.php">Se déconnecter</a>
</li>
</ul>
</div>
</div>
</nav>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>