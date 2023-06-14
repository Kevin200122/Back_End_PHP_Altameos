<?php
session_start();
include('config.php');

if(!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}

if(isset($_POST['valider'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = nl2br(htmlspecialchars($_POST['contenu'])) ;
    $Auteur = htmlspecialchars($_POST['Auteur']);
    if(!empty($titre) AND !empty($contenu)) {
        $req = $conn->prepare('INSERT INTO albums(titre, contenu, Auteur) VALUES(?, ?)');
        $req->execute(array($titre, $contenu));
        echo "Votre album a bien été mis en ligne";
    } else {
        echo "Veuillez renseigné toutes les champ s'il vous plaît ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Publier votre album</title>
</head>
<body>
<form method="POST" action="" align="center">
<input type="text" name="titre" placeholder="Titre">
<br>
<textarea name="contenu" placeholder="Contenu"></textarea>
<br>
<input type="submit" name="valider">
</body>
</html>