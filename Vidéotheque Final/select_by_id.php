

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>
<body>
<table class="table">
  <thead>
    <tr>
    <th><abbr title="miniature">Miniature</abbr></th> 
      <th><abbr title="titre">Titre</abbr></th>
      <th><abbr title="genre ">Genre</abbr></th>
      <th><abbr title="realisateur">Réalisateur</abbr></th>
     <th><abbr title="acteur">Acteur</abbr></th>
   
      <th><abbr title="synopsis">Synopsis</abbr></th>
     
    </tr>
  </thead>
  <tfoot>
  </tfoot>
  <tbody>
  <?php
$id=$_GET['id'];
// Connexion à la base de données
$link = mysqli_connect("localhost", "gigan", "Simplon974@", "video");
$link -> set_charset('utf8');
 
// Vérification de la connexion
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM liste WHERE id='$id'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){



        while($row = mysqli_fetch_array($result)){
            echo "\n";
            echo "    <tr>\n";
            echo "      <th><abbr title=\"Won\">".$row['miniature']."<a href=\"form.php?id=".$row['id']."&" . "champ=miniature\">🖊</a></abbr></th>\n";
           
            echo "      <th>".$row['titre']."<a href=\"form.php?id=".$row['id']."&" . "champ=titre\">🖊</a></th>\n";
         
            echo "      <th><abbr title=\"Won\">".$row['genre']."<a href=\"form.php?id=".$row['id']."&" . "champ=genre\">🖊</a></abbr></th>\n";
            echo "      <th>".$row['realisateur']."<a href=\"form.php?id=".$row['id']."&" . "champ=realisateur\">🖊</a></th>\n";
            echo "      <th><abbr title=\"Played\">".$row['acteur']."<a href=\"form.php?id=".$row['id']."&" . "champ=acteur\">🖊</a></abbr></th>\n";
            echo "      <th><abbr title=\"Played\">".$row['synopsis']."<a href=\"form.php?id=".$row['id']."&" . "champ=synopsis\">🖊</a></abbr></th>\n";
           
            echo "    </tr>";
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Fermeture de la connexion
mysqli_close($link);
?>
</tbody>

</table>
</body>
</html>