<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
include('config.php');

// Vérifier si l'utilisateur est un administrateur
if ($_SESSION['role'] !== 'admin') {
    header('Location: Accueil2.php'); // Rediriger vers une page d'accueil appropriée pour les utilisateurs normaux
}

if(isset($_GET['id']) && trim($_GET['id']) != '') {
    $getid = $_GET['id'];
    
    $req = $conn->prepare('SELECT * FROM video WHERE id = ?');
    $req->execute(array($getid));
    if($req->rowCount() == 1) {
        $donnees = $req->fetch();
        if(isset($_POST['valider'])) {
            $Nom = htmlspecialchars($_POST['Nom']);
            $contenu = htmlspecialchars($_POST['contenu']);
            
            if(!empty($Nom) && !empty($contenu)) {
                $req = $conn->prepare('UPDATE video SET Nom = ?, contenu = ? WHERE id = ?');
                $req->execute(array($Nom, $contenu, $getid));
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
$videos = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modifier la vidéo</title>
</head>
<?php include('../include/header.php'); ?>

<?php if(isset($_GET['id']) && !empty($_GET['id'])): ?>
    <div class="container mt-4">
    <p>Emplacement: <?= nl2br(htmlspecialchars($donnees['emplacement'])); ?></p>
    <p>Nom: <?= nl2br(htmlspecialchars($donnees['Nom'])); ?></p>
    <p>Contenu: <?= nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
    <p>Catégorie: <?= nl2br(htmlspecialchars($donnees['id_categorie'])); ?></p>
    <a href="?id=<?= $donnees['id']; ?>" class="btn btn-primary">Modifier la vidéo</a>
    </div>
    <hr>
    
    <div class="container mt-4">
    <form method="POST" action="">
    <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="Nom" placeholder="Nom" value="<?= $donnees['Nom']; ?>">
    </div>
    <div class="form-group">
    <label for="contenu">Contenu</label>
    <textarea class="form-control" id="contenu" name="contenu" placeholder="Contenu"><?= $donnees['contenu']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="valider">Valider</button>
    </form>
    </div>
    <?php endif; ?>
    
    <?php include('../include/footer.php'); ?>
    