<?php
session_start();
include('config.php');

if(isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $req = $conn->prepare('SELECT * FROM album WHERE id = ?');
    $req->execute(array($getid));//on vérifie si l'id existe dans la base de données
    if($req->rowCount() > 0) {
        $delete = $conn->prepare('DELETE FROM album WHERE id = ?');// Requête préparé pour supprimer l'article en question .
        $delete->execute(array($getid));
        header('Location: album.php');
    } else {
        echo "Cet album est introuvable";
    }
}else {
    echo "L'id ne peut pas être récupéré";
}  
?>