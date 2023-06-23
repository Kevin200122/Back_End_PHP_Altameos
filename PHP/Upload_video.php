<?php
session_start();
include('config.php');
if (!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}

if(isset($_POST['but_upload'])){
    $Titre_Video = $_POST['Titre_Video'];
    $contenu = $_Post['contenu'];
    $Chemin_fichier = $_FILES['Chemin_fichier'];
    $maxsize = 5242880; // 5MB
    if(isset($_FILES['Chemin_fichier']['Titre_Video']) && $_FILES['Chemin_Video']['Titre_Video'] != ''){
        $Chemin_fichier = $_FILES['Chemin_Video']['Titre_Video'];
        $target_dir = "../Video";
        $target_file = $target_dir . $_FILES["Chemin_fichier"]["Titre_Video"];
        
        // Sélectionner le fichier type
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Les extensions acceptées
        $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
        
        // Vérification de l'extension
        if( in_array($extension,$extensions_arr) ){
            
            // Taille du fichier
            if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                $_SESSION['message'] = "Ce fichier est trop volumineux, il faut 5MB ou moins.";
            }else{
                // Upload le fichier
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    // Insert record
                    $req = $conn -> prepare ('INSERT INTO video(Chemin_fichier,Titre_Video, contenu) VALUES(?,?,?)');
                    $req->execute($Titre_Video,$Chemin_fichier,$contenu);
                    
                    mysqli_query($con,$query);
                    $_SESSION['message'] = "Upload réussi.";
                }
            }
            
        }else{
            $_SESSION['message'] = "extension du fichier invalide.";
        }
    }else{
        $_SESSION['message'] = "S'il vous plaît choisissez un fichier.";
    }
    header('location: index.php');
    exit;
} 
?>
<!doctype html> 
<html> 
<head>
<title>Téléchargement de vidéos</title>
<link rel="stylesheet" href="../styles/style.css">
</head>
<body>

<!-- Upload response -->
<?php 
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<img src= "../Image/titan-fm-logo.jpg" alt="TitanBoard.jpg"/>
<div class="container kev-3011">
<form method="POST" action="./Upload_video.php" enctype="multipart/form-data">
<div class="kl-11">
<label for="video_file" class="form-label">fichier vidéo</label>
<input type="file" name="fichier_video" id="Le_fichier_video"><br/><br/>
</div>
<div class="kl-11">
<label for="video_title" class="form-label">Titre de la vidéo:</label>
<input type="text" name="titre_video" id="Titre_Video" required="required"><br/><br/>
</div>
<div class="kl-11">
<label for="video_description" class="form-label">Contenu de la vidéo:</label>
<textarea name="contenu_video" id="Contenu_Video" required="required"></textarea><br/><br/>
</div>
</form>
</div>
<input type='submit' method="$_POST" href="../Video/upload" value='Upload' name='but_upload'>
</form>

</body>
</html>