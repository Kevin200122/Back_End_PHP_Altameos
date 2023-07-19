<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Afficher vidéos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- Incluez la bibliothèque Font Awesome dans l'en-tête de votre document -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="../styles/Upload_Clips.css">
</head>

<body>
<nav class="navbar navbar-expand-lg">
<div class="container-fluid">
<a class="navbar-brand" href="#"><img src="../medias/radiotitanback-end.png" alt="logo" style="width: 105px; border-radius: 50%"></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
<ul class="navbar-nav">
<li>
<a class="nav-link" href="membres.php">
<i class="fas fa-users"></i>
Membres
</a>
</li>
<li>
<a class="nav-link" href="publier_article.php">
<i class="fas fa-edit"></i>
Publier un article
</a>
</li>
<li>
<a class="nav-link" href="afficher_articles.php">
<i class="fas fa-book"></i>
Afficher les articles
</a>
</li>
<li>
<a class="nav-link" href="Telecharger_podcast.php">
<i class="fas fa-microphone"></i>
Upload Podcast
</a>
</li>
<li>
<a class="nav-link" href="Upload_video.php">
<i class="fas fa-video"></i>
Upload vidéo
</a>
</li>
<li>
<a class="nav-link" href="Upload_Clips.php">
<i class="fas fa-video"></i>
Upload clips
</a>
</li>
</ul>
</div>
</div>
</nav>

<div class="container mt-5">
<?php
$req = $conn->query('SELECT * FROM clips');
while ($donnees = $req->fetch()) {
    echo '<div class="card mb-4">';
    echo '<div class="card-body">';
    echo '<p class="card-text">emplacement: ' . $donnees['emplacement'] . '</p>';
    echo '<p class="card-text">Nom: ' . $donnees['Nom'] . '</p>';
    echo '<p class="card-text">contenu: ' . $donnees['Auteur'] . '</p>';
    echo '<video controls>';
    echo '<source src="' . $donnees['emplacement'] . '" type="video/mp4">';
    echo '</video>';
    echo '</div>';
    echo '</div>';
}
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>