<?php
// Je me connecte à ma base de donnée abonnes
$pdo = new PDO('mysql:host=localhost;dbname=abonne','root','',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));
// Je récupère la variable $_GET['id_identification'] transmis via l'url :
// http://localhost/PHP/article.php?id_identification=3    
$id_identification = $_GET['id_identification'];
// Je récupère le nom et le prénom de mon utilisateur ayant
// pour id_utilisateur : $_GET['id_identification'];
$result = $pdo -> query("SELECT nom, prenom FROM identification WHERE id_identification = '$id_identification'");
$tabResult = $result -> fetch();
$nom = $tabResult['nom'];
$prenom = $tabResult['prenom'];

// Je vérifie la validité de l'input name="titre" pour envoyé ce dernier 
// dans ma table article
if(isset($_POST["titre"])){
    $titre = $_POST["titre"];
    $art = $_POST["art"];
    $pdo -> query("INSERT INTO articles (id_identification, titre, date_parution, art) VALUES ('$id_identification', '$titre', CURDATE(), '$art')");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <form method="POST">
    <title>Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body>
<!-- j'affiche mes 2 variables $nom $prenom récupérées plus haut --> 
<h1><?php echo "Bonjour $nom $prenom"; ?></h1>
<h1><?php echo "Tu es un sorcier $prenom"; ?></h1>

<h2>Rédigez votre article :</h2>
    <form method="POST" action="article.php"><br>
        <input type=text name="titre" placeholder="titre"><br>
        <textarea name="art"></textarea><br>
        <input type="submit">
    </form>
</body>
</html>