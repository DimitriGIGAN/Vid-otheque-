<?php
// Connexion à la base de données
$link = mysqli_connect("localhost", "gigan", "Simplon974@", "video");

// Vérification de la connexion
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$miniature = mysqli_real_escape_string($link, $_REQUEST['miniature']);
$titre = mysqli_real_escape_string($link, $_REQUEST['titre']);

$genre = mysqli_real_escape_string($link, $_REQUEST['genre']);
$realisateur= mysqli_real_escape_string($link, $_REQUEST['realisateur']);

$acteur= mysqli_real_escape_string($link, $_REQUEST['acteur']);
$synopsis = mysqli_real_escape_string($link, $_REQUEST['synopsis']);
// Attempt insert query execution
$sql = "INSERT INTO persons (miniature,titre , genre, realisateur,  acteur,synopsis) VALUES ('$miniature','$titre' , '$genre', '$realisateur',  '$acteur','$synopsis')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Fermeture de la connexion
mysqli_close($link);
?>