<?php
session_start();
include('config.php');
if(!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/Page_de_garde.css">
</head>
<body>
<footer>
<nav class="navbar navbar">
<div class="container">
<a class="navbar-brand" href="#">
<img src="../Image/titan-fm-logo copie 1.png" alt="Logo">
</a>
</div>
</nav>
</footer>
</body>

</html>
