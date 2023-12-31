<?php
session_start();
include('config.php');

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['pseudo'])) {
    header('Location: connexion.php');
    exit();
}

// Vérifier si l'utilisateur est un administrateur
if ($_SESSION['role'] !== 'admin') {
    header('Location: Accueil2.php'); // Rediriger vers une page d'accueil appropriée pour les utilisateurs normaux
    exit();
}

if (isset($_POST['submit'])) {
    $Nom = $_POST['Nom'];
    $contenu = $_POST['contenu'];
    $video_file = $_FILES['video_file'];
    
    // Vérifier s'il y a des erreurs lors du téléchargement du fichier
    if ($video_file['error'] === 0) {
        $video_file_name = $video_file['name'];
        $video_file_tmp = $video_file['tmp_name'];
        $video_file_size = $video_file['size'];
        $video_file_type = $video_file['type'];
        
        // Vérifier l'extension du fichier
        $allowed_extensions = array('mp4', 'mov', 'avi');
        $video_file_ext = pathinfo($video_file_name, PATHINFO_EXTENSION);
        
        if (in_array(strtolower($video_file_ext), $allowed_extensions)) {
            // Vérifier la taille du fichier
            if ($video_file_size < 300000000) {
                // Générer un nom de fichier unique
                $video_file_name_new = uniqid('', true) . "." . $video_file_ext;
                $video_file_destination = '../Video/' . $video_file_name_new;
                
                // Déplacer le fichier téléchargé vers le dossier de destination
                if (move_uploaded_file($video_file_tmp, $video_file_destination)) {
                    // Utiliser une requête préparée pour insérer les données dans la base de données
                    $req = $conn->prepare('INSERT INTO video (emplacement, contenu, Nom) VALUES (?, ?, ?)');
                    $req->execute([$video_file_destination, $contenu, $Nom]);
                    
                    header('Location: Afficher_video.php');
                    exit();
                } else {
                    echo "Une erreur s'est produite lors du téléchargement du fichier.";
                }
            } else {
                echo "Ce fichier est trop volumineux !";
            }
        } else {
            echo "Vous ne pouvez pas télécharger un fichier de ce type !";
        }
    } else {
        echo "Erreur lors du téléchargement du fichier : " . $video_file['error'];
    }
}
?>


?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Upload video</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- Incluez la bibliothèque Font Awesome dans l'en-tête de votre document -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="../styles/Upload_video.css">
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
</ul>
</div>
</div>
</nav>

<div class="container mt-5">
<form method="POST" action="upload_video.php" enctype="multipart/form-data">
<div class="mb-3">
<label for="video_file" class="form-label">Video fichier:</label>
<input type="file" name="video_file" id="video_file" class="form-control">
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
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>
