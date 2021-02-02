
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous afficher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>
<body>
    
    
<table class="table">
  <thead>
    <tr>
      <th><abbr title="Id">ID</abbr></th>
      <th><abbr title="titre">Titre</abbr></th>
      <th><abbr title="miniature"></abbr></th> 
      <th><abbr title="genre ">Genre</abbr></th>
      <th><abbr title="realisateur">Réalisateur</abbr></th>
     <th><abbr title="acteur">Acteur</abbr></th>
   
      <th><abbr title="synopsis">Synopsis</abbr></th>
      <th><abbr title="Action">Actions</abbr></th>
   
    </tr>
  </thead>
  <tbody>
  <?php
// Connexion à la base de données
$link = mysqli_connect("localhost", "gigan", "Simplon974@", "video");
$link -> set_charset('utf8');
 
// Vérification de la connexion
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM liste";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){



        while($row = mysqli_fetch_array($result)){
            echo "\n";
            echo "    <tr>\n";
            echo "      <th><abbr title=\"\">". $row['id'] ."</abbr></th>\n";
            echo "      <th>". $row['titre'] ."</th>\n";
            echo "      <th><abbr title=\"Played\">". $row['synopsis'] ."</abbr></th>\n";
            echo "      <th><abbr title=\"Won\">". $row['genre'] ."</abbr></th>\n";
            echo "      <th>". $row['realisateur'] ."</th>\n";
            echo "      <th><abbr title=\"Played\">". $row['acteur'] ."</abbr></th>\n";
            echo "      <th><abbr title=\"Won\">". $row['miniature'] ."</abbr></th>\n";
            echo "      <th><a class=\"button is-info\" href=\"select_by_id.php?id=". $row['id'] ."\"  >Modifier</a><a class=\"button is-danger\" href=\"supprimer.php?id=". $row['id'] ."\" >Supprimer</a></th>\n";
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