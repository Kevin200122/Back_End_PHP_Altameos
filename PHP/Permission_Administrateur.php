<?php
session_start();
include('config.php');
if(!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}
?>
<?php
// Vérifiez d'abord si l'utilisateur est connecté
if (!isset($_SESSION['pseudo']) || empty($_SESSION['pseudo'])) {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header('Location: connexion.php');
    exit;
}

// Ensuite, vérifiez si l'utilisateur est un administrateur
if ($_SESSION['role'] !== 'admin') {
    // Si l'utilisateur n'est pas un administrateur, redirigez-le vers une autre page
    echo "Vous n'avez pas le droit d'accéder à cette page";
    header('Location: Access_refuse.php'); // Rediriger vers une page qui affiche le message d'erreur.
    exit;
}
?>
<?php 
// Assurez-vous que vous avez la valeur du rôle de l'utilisateur après la connexion.
// Par exemple, si le rôle est stocké dans la colonne 'role' de la table 'membres'.
$role = $_SESSION['role']; // Assurez-vous que vous avez le nom correct du champ de rôle dans votre base de données.

// Ajoutez cette condition avant de rediriger vers la page "Upload_Clips.php".
if ($role !== 'admin') {
    header('Location: Access_refuse.php'); // Rediriger vers une page qui affiche le message d'erreur.
    exit(); // Assurez-vous d'ajouter exit() pour arrêter l'exécution du script après la redirection.
}

?>