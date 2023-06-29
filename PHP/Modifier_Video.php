<?php
session_start();
include('config.php');

if(isset($_GET['id']) && trim($_GET['id']) != '') {
    $getid = $_GET['id'];
    
    $req = $conn->prepare('SELECT * FROM video WHERE id = ?');
    $req->execute(array($getid));
    if($req->rowCount() == 1) {
        $donnees = $req->fetch();
        if(isset($_POST['valider'])) {
            $Titre_Video = htmlspecialchars($_POST['Titre_Video']);
            $contenu = htmlspecialchars($_POST['contenu']);
            if(!empty($Titre_Video) AND !empty ($contenu)) {
                $req = $conn->prepare('UPDATE video SET Titre_Video = ?, contenu = ?, WHERE id = ?');
                $req->execute(array($Titre_Video, $contenu, $getid));
                header('Location: Modifier_Video.php');
            } else {
                echo "Veuillez renseigner tous les champs";
            }
        }
    } else {
        echo "Cette video est inexistante";
    }
}

$req = $conn->query('SELECT * FROM video');
$podcasts = $req->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modifier la video</title>
</head>
<?php include('../include/header.php'); ?>
<div class="container mp-4">
<h2><?= htmlspecialchars($video['Titre_Video']); ?></h2>
<p><?= nl2br(htmlspecialchars($video['contenu'])); ?></p>
<a href="?id=<?= $video['id']; ?>" class="btn btn-primary">Modifier cette video</a>
</div>
<hr>

<?php if(isset($_GET['id']) and !empty($_GET['id'])): ?>
    <div class="container mp-4">
    <form method="POST" action="">
    <div class="form-group">
    <label for="title">$Titre_Video</label>
    <input type="text" class="form-control" id="Titre_Video" name="Titre" placeholder="Titre" value="<?php echo $donnees['Titre_Video']; ?>"><!-- title est une colonne de la bdd elle est initie par $Titre_Video qui vaut title $titre = htmlspecialchars($_POST['Titre_Video']); en faisant cela dans notre placeholder on aura les donnees de la vidéo sélectionné  -->
    </div>
    <div class="form-group">
    <label for="Upload">Upload</label>
    <input type="file" class="form-control" id="file" name="file" placeholder="file">
    </div>
    <div class="form-group">
    <label for="rubrique">Titre de la vidéo</label>
    <input type="text" class="form-control" id="Titre_Video" name="TitreVideo" placeholder="Titre" value="<?php echo $donnees['Titre_Video']; ?>">
    </div>
    <div class="form-group">
    <label for="contenu">contenu</label>
    <textarea type="text" class="form-control" id="Le_Contenu" name="contenu" placeholder="Contenu" value="<?php echo $donnees['contenu']; ?>">
    </div>
    <div class="form-group">
    <label for="id_categorie">ID Categorie</label>
    <input type="text" class="form-control" id="id_categorie" name="id_categorie" placeholder="ID Categorie" value="Categorie<?php echo $donnees['id_categorie']; ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="valider">Valider</button>
    </form>
    </div>
    <?php endif; ?>
    <?php include('../include/footer.php');?>