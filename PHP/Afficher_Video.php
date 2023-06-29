<?php
/*session_start();
include('config.php');
if (!$_SESSION['pseudo']) {
    header('Location: Connexion.php');
}
?>

<?php
// Récupération de l'ID de la vidéo depuis la requête
/*$videoId = $_GET['id'];

// Récupération des données binaires de la vidéo à partir de la base de données
$req = $conn->prepare("SELECT file FROM video WHERE id = ?");
$req->bindParam(1, $videoId);
$req->execute($videoId);
$videoData = $req->fetchColumn();

// Définition de l'en-tête de la réponse HTTP
header('Content-Type: video/mp4');
header('Content-Length: ' . strlen($videoData));

// Envoi des données binaires de la vidéo
echo $videoData;
?>

<?php
// Récupération des vidéos depuis la base de données
$req = $conn->prepare("SELECT * FROM video");
$req = $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
*/
