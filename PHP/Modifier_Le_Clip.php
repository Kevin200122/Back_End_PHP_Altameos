<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
include('config.php');

// Vérifier si l'utilisateur est un administrateur
if ($_SESSION['role'] !== 'admin') {
    header('Location: Accueil2.php'); // Rediriger vers une page d'accueil appropriée pour les utilisateurs normaux
}

if (isset($_GET['id']) && trim($_GET['id']) != '') {
    $getid = $_GET['id'];
    
    $req = $conn->prepare('SELECT * FROM clips WHERE id = ?');
    $req->execute(array($getid));
    
    if ($req->rowCount() == 1) {
        $donnees = $req->fetch();
        
        if (isset($_POST['valider'])) {
            $emplacement = htmlspecialchars($_POST['emplacement']);
            $Auteur = htmlspecialchars($_POST['Auteur']);
            $Nom = htmlspecialchars($_POST['Nom']);
            $id_categorie = htmlspecialchars($_POST['id_categorie']);
            
            if (!empty($emplacement) && !empty($Auteur) && !empty($Nom) && !is_numeric($id_categorie)) {
                $req = $conn->prepare('UPDATE clips SET Auteur = ?, Nom = ?, emplacement = ?, id_categorie = ? WHERE id = ?');
                $req->execute(array($Auteur, $Nom, $emplacement, $id_categorie, $getid));
                header('Location: Modifier_Le_Clip.php'); // Corrigé : Ajout de l'extension du fichier
            } else {
                echo "Veuillez remplir tous les champs correctement.";
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
<title>Modifier le clip</title>
</head>

<?php include('../include/header.php'); ?>

<?php if (isset($_GET['id']) && !empty($_GET['id'])): ?>
    <div class="container mt-4">
    <h2><?= htmlspecialchars($donnees['Auteur']); ?></h2>
    <p><?= nl2br(htmlspecialchars($donnees['emplacement'])); ?></p>
    <p>Auteur: <strong><?= nl2br(htmlspecialchars($donnees['Auteur'])); ?></strong></p>
    <p>Contenu: <strong><?= nl2br(htmlspecialchars($donnees['Nom'])); ?></strong></p>
    <p>Catégorie: <strong><?= nl2br(htmlspecialchars($donnees['id_categorie'])); ?></strong></p>
    <a href="?id=<?= $donnees['id']; ?>" class="btn btn-primary">Modifier le clip</a>
    </div>
    <hr>
    
    <div class="container mt-4">
    <form method="POST" action="">
    <div class="form-group">
    <label for="Auteur">Auteur</label>
    <input type="text" class="form-control" id="Auteur" name="Auteur" placeholder="Auteur" value="<?= $donnees['Auteur']; ?>">
    </div>
    <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom" value="<?= $donnees['Nom']; ?>">
    </div>
    <div class="form-group">
    <label for="emplacement">Emplacement</label>
    <input type="text" class="form-control" id="emplacement" name="emplacement" placeholder="Emplacement" value="<?= $donnees['emplacement']; ?>">
    </div>
    <div class="form-group">
    <label for="id_categorie">Catégorie</label>
    <input type="text" class="form-control" id="id_categorie" name="id_categorie" placeholder="ID de catégorie" value="<?= $donnees['id_categorie']; ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="valider">Valider</button>
    </form>
    </div>
    <?php endif; ?>
    
    <?php include('../include/footer.php'); ?>
    
    