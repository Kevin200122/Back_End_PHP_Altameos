<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Afficher vidéos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
crossorigin="anonymous">
<!-- Incluez la bibliothèque Font Awesome dans l'en-tête de votre document -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="../styles/Afficher_Video.css">
</head>

<body>
<div class="pre_container">
<container class="container" id="Container_noir">
<h1>CLIPS & VIDÉOS</h1>
<hr>
</container>
</div>

<div class="container mt-5" id="Container_video">
<div class="card mb-4">
<div class="card-body">
<p class="card-text">Emplacement:</p>
<p class="card-text">Nom:</p>
<p class="card-text">Contenu</p>
<video id="videoPlayer" controls>
<!-- Placeholder video source, will be updated dynamically -->
</video>
</div>
</div>
<table>
<tr>
<td>TITAN BEARD-SPOT BY TITAN BEARD</td>
</tr>
<tr>
<td>Description of INTERVIEW TRISTAN BEARD-JANVIER 2023 BY TITAN BEARD</td>
</tr>
<tr>
<td>INTERVIEW TRISTAN BEARD-JANVIER 2023 BY TITAN BEARD</td>
</tr>
</table>
<div class="navigation-buttons">
<button onclick="showPreviousVideo()">Précédent</button>
<button onclick="showNextVideo()">Suivant</button>
</div>
</div>

<script>
const videos = [
    {
        emplacement: "../Video/Derniere Danse.mp4",
        Nom: "Dernière danse",
        contenu: "Je remue le ciel le jour la nuit, je danse avec le vent, la pluie."
    },
    {
        emplacement: "../Video/I was born for loving you.mp4",
        Nom: "I was born for loving you",
        contenu: ""
    },
    {
        emplacement: "../Video/Demis-roussos.mp4",
        Nom: "Quand je t'aime",
        contenu: "Quand je t-aimes j'ai l'impression d'être un roi."
    },
    {
        emplacement: "../Video/Voyage_Voyage_Desireless.mp4",
        Nom: "Voyage voyage",
        contenu: "Au dessus du vieux volcan, glissé sous le tapis du vent."
    },
    {
        emplacement: "../Video/Pierre_Bachelet_Vingt_ans.mp4",
        Nom: "Dans ce temps là j'avais vingt ans .",
        contenu: "Dans ce temps là, j'avais vingt ans sur la télé en noir et blanc, on découvrais le rock n roll."
    }
];

let currentVideoIndex = 0;
const videoPlayer = document.getElementById('videoPlayer');

function showVideo(index) {
    if (index >= 0 && index < videos.length) {
        currentVideoIndex = index;
        const video = videos[currentVideoIndex];
        videoPlayer.src = video.emplacement;
        videoPlayer.setAttribute('type', 'video/mp4');
        document.querySelector('.card-text:nth-child(1)').innerText = 'Emplacement: ' + video.emplacement;
        document.querySelector('.card-text:nth-child(2)').innerText = 'Nom: ' + video.Nom;
        document.querySelector('.card-text:nth-child(3)').innerText = 'Contenu: ' + video.contenu;
    }
}

function showNextVideo() {
    const nextIndex = (currentVideoIndex + 1) % videos.length;
    showVideo(nextIndex);
}

function showPreviousVideo() {
    const prevIndex = (currentVideoIndex - 1 + videos.length) % videos.length;
    showVideo(prevIndex);
}

// Show the initial video
showVideo(currentVideoIndex);
</script>
</body>

</html>
