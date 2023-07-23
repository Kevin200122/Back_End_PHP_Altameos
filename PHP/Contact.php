<?php
session_start();
include('config.php');
if (!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../styles/Contact.css">
</head>
<body>
<form id="contactForm">
<h1>CONTACTEZ MOI</h1><br /><br /><br />
<input type="text" name="Le_Nom" placeholder="NOM*" required="required"><br />
<input type="text" name="Prenom" placeholder="PRÉNOM*" required="required"><br />
<input type="email" name="email" placeholder="EMAIL*" required="required"><br />
<input type="number" name="Number" placeholder="TÉLÉPHONE"><br />
<textarea placeholder="MESSAGE*" name="Le_message"></textarea>
<button type="submit" id="submitBtn">ENVOYER MON MESSAGE</button>
</form>
<footer>
<nav class="navbar navbar">
<div class="container"><br>
<p class="Para" id="Le_Para">POSITIVE HANDICAP</p>
<p class="Para2" id="Le_Para2">DÉPASSER LE HANDICAP : LA MUSIQUE COMME THÉRAPIE,COMME COMBAT,<br />
COMME EXPRESSION,COMME IMAGINATION, COMME LIEN SOCIAL !</p><br /> <br />
<p class="Mini_Para" id="Le_Mini_Para">TOUTES LES ŒUVRES PRÉSENTÉES SUR LE SITE SONT LA PROPRIÉTÉ DE M.TRISTAN BEARD.<br />
TOUTE L'UTILISATION DEVRA FAIRE L'OBJET D'UNE DEMANDE D'AUTORISATION VIA LE FORMULAIRE DE CONTACT.<br />
TOUTE UTILISATION ILLICITE POURRAIT FAIRE L'OBJET DE POURSUITES.</p>
<img src="../Image/titan-fm-logo copie 1.png" id="Logo" alt="un-logo">
<a class="navbar-brand" href="#">
</a>
</div>
</nav>
</footer>

<script>
// Get the form element and the submit button
const form = document.getElementById('contactForm');
const submitBtn = document.getElementById('submitBtn');

// Function to check if all required fields are filled
function isFormValid() {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
        }
    });
    
    return isValid;
}

// Function to create and trigger the mailto link
function sendMail() {
    const formData = new FormData(form);
    let mailtoUrl = 'mailto:contact@titan-beard.com';
    
    formData.forEach((value, key) => {
        mailtoUrl += `&${encodeURIComponent(key)}=${encodeURIComponent(value)}`;
    });
    
    window.location.href = mailtoUrl;
}

// Add a click event listener to the submit button
submitBtn.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior
    
    if (isFormValid()) {
        sendMail(); // Call the function to send the mailto link after form validation
    } else {
        alert("S'il vous plaît veuillez remplir tout les champs du formulaire.");
    }
});
</script>
</body>
</html>


