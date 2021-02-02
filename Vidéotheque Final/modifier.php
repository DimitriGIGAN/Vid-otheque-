<?php
$id=$_GET['id'];
$champ=$_GET['champ'];



echo "ID : " . $id . "<br>Champs : " . $champ ." <br>";

// Tentative de connexion au serveur MySQL. En supposant que vous exécutez MySQLserveur avec paramètre par défaut (utilisateur 'root' sans mot de passe)
$link = mysqli_connect("localhost", "gigan", "Simplon974@", "video");
 
// Check connection
if($link === false){
    die("<br>ERROR: Could not connect. " . mysqli_connect_error());
}
$nouvelle_valeur = mysqli_real_escape_string($link, $_REQUEST['nouvelle_valeur']);

// Reste plus qu'a ajouter une variable 
$sql = "UPDATE liste SET $champ = '".$_POST['nouvelle_valeur']."' WHERE id=$id";



if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "<br>ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
header('Location: index.php');

?>