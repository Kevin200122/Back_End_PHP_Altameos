<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Afficher vidéos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
<?php
$req = $conn->query('SELECT * FROM video');
$videos = $req->fetchAll();
if (count($videos) > 0) {
    $currentVideoIndex = 0;
    $totalVideos = count($videos);
    
    echo '<div class="card mb-4">';
    echo '<div class="card-body">';
    echo '<p class="card-text">emplacement: ' . $videos[$currentVideoIndex]['emplacement'] . '</p>';
    echo '<p class="card-text">Nom: ' . $videos[$currentVideoIndex]['Nom'] . '</p>';
    echo '<p class="card-text">contenu: ' . $videos[$currentVideoIndex]['contenu'] . '</p>';
    echo '<video id="videoPlayer" controls>';
    echo '<source src="' . $videos[$currentVideoIndex]['emplacement'] . '" type="video/mp4">';
    echo '</video>';
    echo '</div>';
    echo '</div>';
}
?>
<table>
<tr>
<td>TITAN BEARD-SPOT BY TITAN BEARD</td>
</tr>
<tr>
<td>INTERVIEW TRISTAN BEARD-JANVIER 2023 BY TITAN BEARD</td>
</tr>
<tr>
<td>INTERVIEW TRISTAN BEARD-MARS 2023 BY TITAN BEARD</td>
</tr>

<?php
if (count($videos) > 1) {
    echo '<button onclick="showPreviousVideo()">Précédent</button>';
    echo '<button onclick="showNextVideo()">Suivant</button>';
}
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
crossorigin="anonymous"></script>
<script>
const videos = <?php echo json_encode($videos); ?>;
let currentVideoIndex = <?php echo $currentVideoIndex; ?>;
const videoPlayer = document.getElementById('videoPlayer');

function showVideo(index) {
    if (index >= 0 && index < videos.length) {
        currentVideoIndex = index;
        const video = videos[currentVideoIndex];
        videoPlayer.src = video.emplacement;
        videoPlayer.setAttribute('type', 'video/mp4');
        document.querySelector('.card-text:nth-child(1)').innerText = 'emplacement: ' + video.emplacement;
        document.querySelector('.card-text:nth-child(2)').innerText = 'Nom: ' + video.Nom;
        document.querySelector('.card-text:nth-child(3)').innerText = 'contenu: ' + video.contenu;
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
</script>
</table>
<div class="navigation-buttons">
</div>
</div>

</body>

</html>
