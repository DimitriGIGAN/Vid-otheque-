<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>
<body>
<?php 
// barre de navigation
?>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Accueil
      </a>
    
      </div>
    </div>

  </div>
</nav>
<head> 


</head>
<div class="columns">
  <div class="column">
  <form class="box" action="insert.php">

<div class="field">
  <label class="label">Miniature</label>
  <div class="control">
    <input class="input" type="text"  name="miniature" placeholder="">
  </div>
</div>

<div class="field">
  <label class="label">Titre</label>
  <div class="control">
    <input class="input" type="text" name="titre" placeholder="Entrer un titre">
  </div>
</div>



<div class="field">

  <label class="label">Genre</label>
  <div class="control">
    <input class="input" type="text"  name="genre" placeholder="Enter un genre">
  </div>
</div>

<div class="field">
  <label class="label">Réalisateur</label>
  <div class="control">
    <input class="input" type="text" name="realisateur" placeholder="Entrer le ou les réalisateur">
  </div>
</div>

<div class="field">
  <label class="label">Acteurs</label>
  <div class="control">
    <input class="input" type="text"  name="acteur" placeholder="Enter le ou les acteur">
  </div>
</div>

<div class="field">
  <label class="label">Synopsis</label>
  <div class="control">

  <textarea class="textarea"   name="synopsis"  placeholder="Synopsis"></textarea>
  </div>

</div>
<button class="button is-primary">Ajouter</button>
</form>
  </div>
  

  

  <div class="column is-four-fifths">
  <table class="table">
  <thead>
    <tr>
   
   
      <th><abbr title="miniature">Miniature</abbr></th> 
      <th><abbr title="titre">Titre</abbr></th>
      <th><abbr title="genre ">Genre</abbr></th>
      <th><abbr title="realisateur">Réalisateur</abbr></th>
     <th><abbr title="acteur">Acteur</abbr></th>
   
      <th><abbr title="synopsis">Synopsis</abbr></th>
      <th><abbr title="Action">Actions</abbr></th>

      <th><abbr title="Action"></abbr></th>
   
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
      
            echo "      <th> <figure onclick=\"myFunction(".$row['id'].")\" class=\"image is-64x64\">";
            echo "              <img src=\"".$row['miniature']."\"";
            echo "           </figure>";
            echo"      </th>";
            echo "      <th>". $row['titre'] ."</th>\n";
          
            echo "      <th><abbr title=\"Won\">". $row['genre'] ."</abbr></th>\n";
            echo "      <th>". $row['realisateur'] ."</th>\n";
            echo "      <th><abbr title=\"Played\">". $row['acteur'] ."</abbr></th>\n";
            echo "      <th><abbr title=\"Played\">". $row['synopsis'] ."</abbr></th>\n";
            echo "      <th><a class=\"button is-info is-small\" href=\"select_by_id.php?id=". $row['id'] ."\"  >Modifier</a><a class=\"button is-danger is-small\" href=\"supprimer.php?id=". $row['id'] ."\" >Supprimer</a></th>\n";
            echo "    </tr>";
        }
        // Résultat si erreur ou aucune donnée
        mysqli_free_result($result);
    } else{
        echo "Aucun à afficher.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Fermeture de la connexion
mysqli_close($link);
?>
</tbody>


</table>
  </div>
  
</div>



   
</body>
</html>