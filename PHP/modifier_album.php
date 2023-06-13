<?php
session_start();
include('config.php');
if(isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    
    $req = $conn->prepare('SELECT * FROM album WHERE id = ?');
    $req->execute(array($getid));//on vérifie si l'id existe dans la base de données
    if($req->rowCount() == 1) {
        $donnees = $req->fetch();
        if(isset($_POST['validation'])) {//on vérifie si le formulaire est bien envoyer
            $titre = htmlspecialchars($_POST['titre']);
            $contenu = nl2br(htmlspecialchars($_POST['contenu'])) ;
            if(!empty($titre) AND !empty($contenu)) {
                $req = $conn->prepare('UPDATE album SET titre = ?, contenu = ? WHERE id = ?');
                $req->execute(array($titre, $contenu, $getid));
                header('Location: album.php');
            } else {
                echo "Veuillez remplir tout les champs s'il vous plaît";
            }
        }
    } else {
        echo "Cet album n'existe pas";
    }
} else {
    echo "L'id n'est pas récupéré";
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modifier l'album</title>
</head>
<body>
<form method="POST" action="" align="center">
<input type="text" name="titre" value="<?= $donnees['titre']; ?>">
<br>
<textarea name="auteur"><?= $donnees['auteur']; ?></textarea>
<br>
<input type="submit" name="valider">
</body>
</html>