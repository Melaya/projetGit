<?php 

    $pdo = new PDO('mysql:host=localhost;dbname=abonne', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
    if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['mail'])AND isset($_POST['password'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $pdo -> query("INSERT INTO identification (nom,prenom,mail,password) VALUES ('$nom','$prenom','$mail','$password')");
  
      
    }

   print_r($_POST);
/*
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

$pdo -> query("INSERT INTO identification (nom,prenom,mail,password) VALUES ('$nom','$prenom','$mail','$password')");

*/





?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>s'inscrire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body>
    <form action="inscription.php" method="post"> 
        <div id="identité">
            <input type="text"  name="nom" placeholder="nom">
            <input type="text"  name="prenom" placeholder="prenom">
        </div> 
        <div id="identifiant"> 
            <input type="text"  name="mail" placeholder="mail">
            <input type="text"  name="password" placeholder="password">
        </div>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>