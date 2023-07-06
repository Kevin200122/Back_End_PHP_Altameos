<?php
session_start();
include('config.php');
if(!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Titre du document</title>
<link rel="stylesheet" href="../styles/Accueil.css">
</head>
<body>

<nav>
<ul class="menu">
<li>
Accueil
<ul class="sub-menu">
<li>Rome</li>
<li>Milan</li>
<li>Venice</li>
<li>Lacio</li>
<li>Florence</li>
</ul>
</li>
<li>
Titan Beard
<ul class="sub-menu">
<li>Paris</li>
<li>Bordeau</li>
<li>Marseille</li>
<li>Toulouse</li>
</ul>
</li>
<li>
Association
<ul class="sub-menu">
<li>Madrid</li>
<li>Valencia</li>
<li>Barcelona</li>
<li>Seville</li>
<li>Bilbao</li>
</ul>
</li>
<li id="Radio-Titan">
Radio Titan
<ul class="sub-menu">
<li>Moscou</li>
<li>Saint Petersburg</li>
<li>Tula</li>
<li>Chekhov</li>
</ul>
</li>
<ul class="logo"> <img src="../Image/titan-fm-logo copie 1.png" alt="Titan Board"></ul>
</li>
</body>
</html>