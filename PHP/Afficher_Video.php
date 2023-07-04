<?php
session_start();
include('config.php');
if (!$_SESSION['pseudo']) {
    header('Location: Connexion.php');
}
?>

<?php

$path = 'file.mp4';


$fm=@fopen($path,'rb');
if(!$fm) {
    // You can also redirect here
    header ("HTTP/1.0 404 Not Found");
    die();
}



