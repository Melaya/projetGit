<?php

$pdo = new PDO('mysql:host=localhost;dbname=abonne', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

if(isset($_POST["mail"]) && isset($_POST['password'])){
	
    $login = $_POST["mail"];
    $pwd = $_POST["password"];
    $result = $pdo -> query("SELECT id_identification FROM identification WHERE mail = '$login' AND password = '$pwd'");
    $utilisateur = $result->fetch();
    $v = $result ->  rowCount();
    if($v == 1){
        $id_utilisateur = $utilisateur['id_identification'];
        header('Location: article.php?id_identification='.$id_utilisateur);
        exit;
    }
    
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Se connecter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <form action="index.php" method="post">
    <label for="mail">Identifiant : </label>
    <input type="text" name="mail" placeholder="Votre mail"> 
    <label for="password"></label>Mot de passe : 
    <input type="text" name="password" placeholder="Votre Mot de passe">
    <button type="submit">Connexion</button>
    </form>
    
</body>
</html>