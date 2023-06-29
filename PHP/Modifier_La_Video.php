<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
include('config.php');

if(isset($_GET['id']) && trim($_GET['id']) != '') {
    $getid = $_GET['id'];
    
    $req = $conn->prepare('SELECT * FROM video WHERE id = ?');
    $req->execute(array($getid));
    if($req->rowCount() == 1) {
        $donnees = $req->fetch();
        if(isset($_POST['valider'])) {
            $Titre = htmlspecialchars($_POST['Titre']);
            $Chemin_fichier = htmlspecialchars($_POST['Chemin_fichier']);
            $Nom = htmlspecialchars($_POST['Nom']);
            $contenu = htmlspecialchars($_POST['contenu']);
            $id_categorie = htmlspecialchars($_POST['id_categorie']);
            
            if(!empty($Titre) AND !empty($Chemin_video) AND !empty($Titre) AND !empty($Nom) AND !empty($contenu) AND !empty($id_categorie)) {
                $req = $conn->prepare('UPDATE videos SET Titre = ?, Nom = ?, contenu = ? WHERE id = ?');
                $req->execute(array($video_file_destination,  $Nom, $contenu, $getid));
                header('Location: Modifier_La_Video.php');
            } else {
                echo "Veuillez remplir tous les champs";
            }
        }
    } else {
        echo "Cette vidéo est introuvable!";
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
<title>Modifier podcast</title>
</head>
<?php include('../include/header.php'); ?>
<?php foreach($video as $videos): ?>
    <div class="container mt-4">
    <h2><?= htmlspecialchars($video['title']); ?></h2>
    <p><?= nl2br(htmlspecialchars($video['Chemin_fichier'])); ?></p>
    <p>Titre: <strong><?= nl2br(htmlspecialchars($video['Titre'])); ?></p></strong>
    <p>Nom: <strong><?= nl2br(htmlspecialchars($video['contenu'])); ?></p></strong>
    <p>Contenu: <strong><?= nl2br(htmlspecialchars($video['contenu'])); ?></p></strong>
    <p>Catégorie: <strong><?= nl2br(htmlspecialchars($video['id_categorie'])); ?></p></strong>
    <a href="?id=<?= $video['id']; ?>" class="btn btn-primary">Modifier ce podcast</a>
    </div>
    <hr>
    <?php endforeach; ?>
    
    <?php if(isset($_GET['id']) and !empty($_GET['id'])): ?>
        <div class="container mt-4">
        <form method="POST" action="">
        <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Titre" value="<?php echo $donnees['title']; ?>"><!-- title est une colonne de la bdd elle est initie par $titre qui vaut title $titre = htmlspecialchars($_POST['title']); on faisons cela dans notre placeholder on aura les donnees du podcast sélectionne  -->
        </div>
        <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" value="<?php echo $donnees['Nom']; ?>">
        </div>
        <div class="form-group">
        <label for="Titre">Titre</label>
        <input type="text" class="form-control" id="Titre" name="titre" placeholder="titre" value="<?php echo $donnees['Titre']; ?>">
        </div>
        <div class="form-group">
        <label for="contenu">Contenu</label>
        <input type="text" class="form-control" id="contenu" name="contenu" placeholder="contenu" value="<?php echo $donnees['contenu']; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="valider">Valider</button>
        </form>
        </div>
        <?php endif; ?>
        <?php include('../include/footer.php');?>
        