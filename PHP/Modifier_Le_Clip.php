<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
include('config.php');

if(isset($_GET['id']) && trim($_GET['id']) != '') {
    $getid = $_GET['id'];
    
    $req = $conn->prepare('SELECT * FROM clips WHERE id = ?');
    $clip= $req->fetch();
    $req->execute(array($getid));
    if($req->rowCount() == 1) {
        $donnees = $req->fetch();
        if(isset($_POST['valider'])) {
            $emplacement = htmlspecialchars($_POST['emplacement']);
            $Auteur = htmlspecialchars($_POST['Auteur']);
            $Nom = htmlspecialchars($_POST['Nom']);
            $id_categorie = htmlspecialchars($_POST['id_categorie']);
            
            if(!empty($emplacement) AND !empty($emplacement) AND !empty($Auteur) AND !empty($Nom) AND !empty($id_categorie)) {
                $req = $conn->prepare('UPDATE clips SET Auteur = ?, Nom = ?, WHERE id = ?');
                $req->execute(array(  $Auteur, $Nom, $getid));
                header('Location: Modifier_Le_Clip');
            } else {
                echo "Veuillez remplir tous les champs";
            }
        }
    } else {
        echo "Ce clip est introuvable!";
    }
}

$req = $conn->query('SELECT * FROM clips');
$clips = $req->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modifier le clips</title>
</head>
<?php include('../include/header.php'); ?>
<?php if(isset($_GET['id']) and !empty($_GET['id'])): ?>
    <div class="container mt-4">
    <h2><?= htmlspecialchars($donnees['Auteur']); ?></h2>
    <p><?= nl2br(htmlspecialchars($donnees['emplacement'])); ?></p>
    <p>Titre: <strong><?= nl2br(htmlspecialchars($donnees['Auteur'])); ?></p></strong>
    <p>Contenu: <strong><?= nl2br(htmlspecialchars($donnees['Nom'])); ?></p></strong>
    <p>Catégorie: <strong><?= nl2br(htmlspecialchars($donnees['id_categorie'])); ?></p></strong>
    <a href="?id=<?= $donnees['id']; ?>" class="btn btn-primary">Modifier le clip</a>
    </div>
    <hr>
    
    
    
    <div class="container mt-4">
    <form method="POST" action="">
    <div class="form-group">
    <label for="title">Titre</label>
    <input type="text" class="form-control" id="Titre" name="titre" placeholder="Titre" value="<?php echo $donnees['Titre']; ?>"><!-- title est une colonne de la bdd elle est initie par $titre qui vaut title $titre = htmlspecialchars($_POST['title']); on faisons cela dans notre placeholder on aura les donnees du clip sélectionne  -->
    </div>
    <div class="form-group">
    <label for="auteur">Auteur</label>
    <input type="text" class="form-control" id="Auteur" name="nom" placeholder="nom" value="<?php echo $donnees['Auteur']; ?>">
    </div>
    <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" id="Nom" name="nom" placeholder="nom" value="<?php echo $donnees['Nom']; ?>">
    </div>
    <div class="form-group">
    <label for="emplacement">emplacement</label>
    <input type="text" class="form-control" id="emplacement" name="emplacement" placeholder="emplacement" value="<?php echo $donnees['emplacement']; ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="valider">Valider</button>
    </form>
    </div>
    <?php endif; ?>
    <?php include('../include/footer.php');?>
    