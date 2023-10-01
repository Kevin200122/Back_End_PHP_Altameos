<?php
session_start();
include('config.php');
if (!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}
// Vérifier si l'utilisateur est un administrateur
if ($_SESSION['role'] !== 'admin') {
    header('Location: Accueil2.php'); // Rediriger vers une page d'accueil appropriée pour les utilisateurs normaux
}

if (isset($_POST['submit'])) {
    $Auteur = $_POST ['Auteur'];
    $id_categorie = $_POST['id_categorie'];
    $clips_file = $_FILES['contenu']['name']; //name — Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icône.jpg).
    $clips_file_tmp = $_FILES['contenu']['tmp_name']; //tmp_name — Le nom du fichier sur le serveur où le fichier téléchargé a été stocké.
    $clips_file_size = $_FILES['clips_file']['size']; //size — La taille en octets du fichier Uploader.
    $clips_file_error = $_FILES['clips_file']['error']; //error — Le code d'erreur, qui permet de savoir si le fichier a bien été Uploader.
    $clips_file_type = $_FILES['clips_file']['type']; //type — Le type du fichier. Par exemple, cela peut être « image/jpg ».
    
    $clips_file_ext = explode('.', $clips_file); //explode — Coupe une chaîne en segments
    $clips_file_actual_ext = strtolower(end($clips_file_ext)); //strtolower — Renvoie une chaîne en minuscules
    
    $allowed = array('mp4', 'mov', 'avi'); //array — Crée un tableau, avec les valeurs passées en paramètres, comme éléments qui représente les extensions autorisées
    
    if (in_array($clips_file_actual_ext, $allowed)) {
        if ($clips_file_error === 0) { //0 = pas d'erreur
            if ($clips_file_size < 2000) { //200MB
                $clips_file_name_new = uniqid('', true) . "." . $clips_file_actual_ext; //uniqid — Génère un identifiant unique basé sur l'heure courante en microsecondes et sur un paramètre binaire optionnel, qui permet de le rendre encore plus unique parce que est important que le nom du fichier soit unique
                $clips_file_destination = '../clips' . $clips_file_name_new; //chemin de destination, true = si le dossier n'existe pas, il sera créé
                if (move_uploaded_file($clips_file_tmp, $clips_file_destination)){ //move_uploaded_file — Déplace un fichier téléchargé
                    $req = $conn->prepare('INSERT INTO clips (id_categorie,Auteur, emplacement) VALUES (?, ?, ?)');
                    $req->execute([ $id_categorie,$Auteur, $clips_file_destination]); //execute — Exécute une requête préparée
                    header('Content-Type: video/mp4');
                    
                    header('Location: index.php');
                } else {
                    echo "Erreur lors de l'upload du clip.";
                }
            } else {
                echo "Ce fichier est trop volumineux!";
            }
        } else {
            echo "Error: " . $clips_file_error;
        }
    } else {
        echo "<h4 style='color: yellow'>Vous ne pouvez pas upload un fichier de ce type!<br />Choisissez format mp4!'</h4>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Upload clips</title>
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
<a class="nav-link" href="Modifier_La_Video.php">
<i class="fas fa-video"></i>
Modifier Vidéo
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
<form method="POST" action="Upload_Clips.php" enctype="multipart/form-data" id="download">

<label for="categorie" class="form-label">Catégorie:</label>
<select name="id_categorie" id="id_categorie" class="form-control">
<?php
// Récupérez les catégories depuis la base de données et générez des options pour le menu déroulant
$req_categories = $conn->query('SELECT * FROM Categorie');
while ($categorie = $req_categories->fetch()) {
    echo '<option value="' . $categorie['id_categorie'] . '">' . $categorie['Nom_de_la_categorie'] . '</option>';
}
?>
</select>
</div>
<div class="ka-3">
<label for="clips_file" class="form-label">Clip fichier:</label>
<input type="file" name="contenu" id="clips_file" class="form-control">
</div>
<div class="ka-3">
<label for="clips_file" class="form-label">Clips fichier:</label>
<input type="file" name="clips_file" id="clips_file" class="form-control">
</div>
<div class="ka-3">
<label for="Auteur" class="form-label">Auteur:</label>
<input type="text" name="Auteur" id="Auteur" class="form-control">
</div>
<div class="ka-3">
<label for="nom" class="form-label">Nom:</label>
<input type="text" name="Nom" id="Nom_Clips" class="form-control">
</div>
<input type="submit" name="submit" value="Upload" class="btn btn-primary" id="Choisir_Fichier">

<?php
$req = $conn->query('SELECT clips.*, categorie.Nom_categorie FROM clips
INNER JOIN categorie ON clips.id_categorie = categorie.id_categorie');
while ($donnees = $req->fetch()) {
    echo '<div class="card mb-4">';
    echo '<div class="card-body">';
    echo '<p class="card-text">Auteur: ' . $donnees['Auteur'] . '</p>';
    echo '<p class="card-text">:Nom de la catégorie: ' . $donnees['Nom_categorie'] . '</p>';
    echo '<video controls>';
    echo '<source src="' .$donnees['emplacement'] . '" type="video/mp4">';
    echo '</video>';
    echo '</div>';
    echo '</div>';
    
}
?>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>




<!--$_FILES pour accéder au fichier téléchargé et le déplacer à l'endroit désiré sur le serveur
Ce script tente de déplacer le fichier télécharger vers le répertoire "uploads" sur le serveur. Si le fichier est déplacé avec succès, il insère une nouvelle ligne dans la table "podcasts" de la base de données avec le titre du podcast et le chemin du fichier.


Modifier le fichier php.ini et augmenter la valeur de upload_max_filesize et post_max_size. Par exemple, pour augmenter la limite à 100M :
    
    upload_max_filesize = 100M
    post_max_size = 100M
    Ensuite, vous devrez redémarrer votre serveur web pour que les modifications prennent effet.
    -->