<?php

session_start();
include('config.php');
if (!$_SESSION['pseudo']) {
    header('Location: Connexion.php');
}

if (isset($_POST['submit'])) {
    $contenu = $_POST['contenu'];
    $Titre_Video = $_POST['Titre_Video']; ///$_POST — HTTP POST variables
    $video_file = $_FILES['video_file']['name']; //name — Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
    $video_file_tmp = $_FILES['video_file']['tmp_name']; //tmp_name — Le nom du fichier sur le serveur où le fichier téléchargé a été stocké.
    $video_file_size = $_FILES['video_file']['size']; //size — La taille en octets du fichier uploadé.
    $video_file_error = $_FILES['video_file']['error']; //error — Le code d'erreur, qui permet de savoir si le fichier a bien été upload.
    $video_file_type = $_FILES['video_file']['type']; //type — Le type du fichier. Par exemple, cela peut être « image/png ».
    
    $video_file_ext = explode('.', $video_file); //explode — Coupe une chaîne en segments
    $video_file_actual_ext = strtolower(end($video_file_ext)); //strtolower — Renvoie une chaîne en minuscules
    
    $allowed = array('MP4', 'mov', 'avi'); //array — Crée un tableau, avec les valeurs passées en paramètres, comme éléments qui représente les extensions autorisées
    
    if (in_array($video_file_actual_ext, $allowed)) {
        if ($video_file_error === 0) { //0 = pas d'erreur
            if ($video_file_size < 300000000) { //300MB
                $video_file_name_new = uniqid('', true) . "." . $video_file_actual_ext; //uniqid — Génère un identifiant unique basé sur l'heure courante en microsecondes et sur un paramètre binaire optionnel, qui permet de le rendre encore plus unique parce qu'il est important que le nom du fichier soit unique
                $video_file_destination = '/video' . $video_file_name_new; //chemin de destination, true = si le dossier n'existe pas, il sera créé
                move_uploaded_file($video_file_tmp, $video_file_destination); //move_uploaded_file — Déplace un fichier Upload
                $req = $conn->prepare('INSERT INTO video (Titre_Video, contenu) VALUES (?, ?)');
                $req->execute([$Titre_Video, $contenu]); //execute — Exécute une requête préparée pour la vidéo
                
                header('Location: index.php');
            } else {
                echo "Le fichier est trop volumineux!";
            }
        } else {
            echo "Error: " . $video_file_error;
        }
    } else {
        echo "Vous ne pouvez pas upload un fichier de ce type!";
    }
}
//include — Inclut et exécute le fichier spécifié en argument
include('../include/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload video</title>
<link rel="stylesheet" href="../styles/Upload_video.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- Incluez la bibliothèque Font Awesome dans l'en-tête de votre document -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container mt-5">
<form method="POST" action="Upload_video.php" enctype="multipart/form-data">
<div class="kl-90">
<label for="video_file" class="form-label">video fichier:</label>
<input type="file" name="video_file" id="video_file" class="form-control">
</div>
<div class="kl-90">
<label for="Titre_Video" class="form-label">Titre_Video:</label>
<input type="text" name="Titre_Video" id="Titre_Video" class="form-control">
</div>
<div class="kl-90">
<label for="contenu" class="form-label">contenu:</label>
<input type="text" name="contenu" id="contenu" class="form-control">
</div><br />
<div class="kl-90"></div>
<input type="submit" name="submit" value="Upload" class="btn btn-primary">
</div>
<?php
$categorie = $conn->query("SELECT * FROM categorie");
while ($categorie = $categorie->fetch()) {
    echo "<option value='" . $categorie['id_categorie'] . "'>" . $categorie['Nom_categorie'] . "</option>";
}
?>

<br>


<?php
$req = $conn->query('SELECT * FROM video');
while ($donnees = $req->fetch()) {
    echo '<div class="card jk-3" id="La_card">';
    echo '<div class="card-body">';
    echo '<p class="card-text">contenu: ' . $donnees['contenu'] . '</p>';
    echo '<p class="card-text">Titre Video: ' . $donnees['Titre_Video'] . '</p>';
    echo '<video controls>';
    echo '<source src="' . $donnees['Chemin_fichier'] . '" type="video/MP4">';
    echo '</video>';
    echo '</div>';
    echo '</div>';
}
?>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<?php include('../include/header.php'); ?>
</body>
</html>


<!--$_FILES pour accéder au fichier téléchargé et le déplacer à l'endroit désiré sur le serveur
Ce script tente de déplacer le fichier uploadé vers le répertoire "uploads" sur le serveur. Si le fichier est déplacé avec succès, il insère une nouvelle ligne dans la table "podcasts" de la base de données avec le titre du podcast et le chemin du fichier.


Modifier le fichier php.ini et augmenter la valeur de upload_max_filesize et post_max_size. Par exemple, pour augmenter la limite à 100M :
    
    upload_max_filesize = 100M
    post_max_size = 100M
    Ensuite, vous devrez redémarrer votre serveur web pour que les modifications prennent effet.
    -->