<?php
session_start();
include('config.php');
if (!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}
?>

<!Doctype html>
<html>
<heads>
<link rel="stylesheet" href="../styles/Contact.css">
</heads>
<body>
<form>
<h1>CONTACTEZ MOI</h1><br /><br /><br />
<input type="text" name="Le_Nom" placeholder="NOM*"><br />
<input type="text" name="Prenom" placeholder="PRÉNOM*"><br />
<input type="email" name="email" placeholder="EMAIL*"><br />
<input type="number" name="Number" placeholder="TÉLÉPHONE"><br />
<textarea placeholder="MESSAGE*" name="Le_message"></textarea>
<button type="submit">ENVOYER MON MESSAGE</button>
</form>
<footer>
<nav class="navbar navbar">
<div class="container"><br>
<p class="Para" id="Le_Para">POSITIVE HANDICAP</p>
<p class="Para2" id="Le_Para2">DÉPASSER LE HANDICAP : LA MUSIQUE COMME THÉRAPIE,COMME COMBAT,<br />
COMME EXPRESSION,COMME IMAGINATION, COMME LIEN SOCIAL !</p><br /> <br />
<p class="Mini_Para" id="Le_Mini_Para">TOUTES LES OEUVRES PRÉSENTÉS SUR LE SITE SONT LA PROPRIÉTÉ DE M.TRISTAN BEARD.<br />
TOUTE L'UTILISATION DEVRA FAIRE L'OBJET D4UNE DEMANDE D'AUTORISATION VIA LE FORMULAIRE DE CONTACT.<br />
TOUTE UTILISATION ILLICITE POURRAIT FAIRE L4OBJET DE POURSUITES.</p>
<img src="../Image/titan-fm-logo copie 1.png" id="Logo" alt="un-logo">
<a class="navbar-brand" href="#">
</a>

</div>
</nav>
</footer>
</body>
</html>