<?php
include('config.php');

if (isset($_GET['id_categorie']) && !empty($_GET['id_categorie'])) {
    $getid = intval($_GET['id_categorie']);
    
    // Mettre à jour les vidéos associées en définissant id_categorie à NULL
    $updateVideos = $conn->prepare('UPDATE videos SET id_categorie = NULL WHERE id_categorie = ?');
    $updateVideos->execute(array($getid));
    
    // Ensuite, supprimer la catégorie
    $deleteCategorie = $conn->prepare('DELETE FROM categorie WHERE id_categorie = ?');
    $deleteCategorie->execute(array($getid));
    
    header('Location: ./Accueil2.php'); // Rediriger vers la page d'accueil après la suppression de la catégorie
    exit;
} else {
    echo "L'id n'est pas récupéré";
}
?>