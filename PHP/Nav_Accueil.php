<?php
session_start();
include('config.php');
if(!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar Jaune</title>
<link rel="stylesheet" href="../styles/Nav_Accueil.css">
</head>
<body>
<div class="navbar">

<ul class="menu">
<img class="logo" src="../Image/titan-fm-logo copie 1 (1).png" alt="Logo">
<li><a href="#">ACCUEIL</a></li>
<li class="submenu">
<a href="../PHP/A_PROPOS_DE_MOI.php">TITAN BEARD</a>
<ul class="submenu-content">
<li><a href="">À PROPOS DE L'ARTISTE</a></li>
<li><a href="#">ALBUMS</a></li>
<li><a href="../PHP/Clip_Et_Videos.php">CLIPS & VIDÉOS</a></li>
<li><a href="#">ACTUALITÉS</a></li>
<li><a href="#">ILS PARLENT DE MOI</a></li>
<li><a href="../PHP/Contact.php">CONTACT</a></li>
</ul>
</li>

<li class="submenu">
<a href="#">ASSOCIATION</a>
<ul class="submenu-content">
<li><a href="#">ASSOCIATION TITAN-BEARD</a></li>
<li><a href="#">PODCAST & TÉLÉTHON</a></li>
<li><a href="../PHP/Contact.php">CONTACT</a></li>
</ul>
</li>
<li class="submenu">
<a href="#">RADIO TITAN</a>
<ul class="submenu-content">
<li><a href="#">RADIO TITAN</a></li>
<li><a href="#">PODCAST & TÉLÉTHON</a></li>
<li><a href="../PHP/Contact.php">CONTACT</a></li>
</ul>
</li>
</ul>
</div>
</body>
</html>