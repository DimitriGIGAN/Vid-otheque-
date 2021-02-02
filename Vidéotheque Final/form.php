<?php 
 // Récuperation de l'id et du champ correspondant //

 $id=$_GET['id'];
$champ=$_GET['champ'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifier le <?php echo $champ; ?></h1>



    <form action="modifier.php?id=<?php echo $id.'&champ='.$champ; ?>" method="post">
        <input type="text" name="nouvelle_valeur" value="" placeholder="Entrer un nouveau <?php echo $champ; ?>">
        <input type="submit" value="Modifier">
    </form>

</body>
</html>


