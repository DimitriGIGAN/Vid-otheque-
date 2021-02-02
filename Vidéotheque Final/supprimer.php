<?php
$id=$_GET['id'];
// Connexion à la base de données
$link = mysqli_connect("localhost", "gigan", "Simplon974@", "video");
 $link -> set_charset('utf8');
// Vérification de la connexion
if($link === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
 
// Attempt delete query execution
$sql = "DELETE FROM liste WHERE id=".$id."";
if(mysqli_query($link, $sql)){
    echo "Les enregistrements ont été supprimés avec succès.";
} else{
    echo "ERREUR : Impossible d’exécuter $sql. " . mysqli_error($link);
}

// Fermeture de la connexion
mysqli_close($link);
header('Location: index.php');

?>