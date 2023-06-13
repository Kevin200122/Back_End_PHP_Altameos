<?php
session_start();
if(isset($_POST['valider'])) {
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
        $pseudo_defaut = "SuperAdmin";
        $password_defaut = "admin";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $password_saisi = htmlspecialchars($_POST['password']);

if($pseudo_saisi == $pseudo_defaut and $password_saisi == $password_defaut) {
    $_SESSION['pseudo'] = $pseudo_saisi;
    header('Location: index.php');

    } else {
                echo "Mauvais pseudo ou mot de passe";
            }
    }else {
        echo "Veuillez remplir tous les champs";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo" placeholder="pseudo">
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <br>
        <input type="submit" name="valider">
    </form>
</body>
</html>