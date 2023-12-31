<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Upload album</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="./styles/style.css">
</head>

<?php
session_start();
include('config.php');

if(!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}

if(isset($_POST['valider'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = nl2br(htmlspecialchars($_POST['contenu'])) ;
    if(!empty($titre) AND !empty($contenu)) {
        $req = $conn->prepare('INSERT INTO articles(titre, contenu) VALUES(?, ?)');
        $req->execute(array($titre, $contenu));
        echo "Votre article a bien été mis en ligne";
    } else {
        echo "Veuillez renseigné toutes les champ du formulaire ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Publier un Article</title>
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