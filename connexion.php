<?php
    $db = new PDO('mysql:host=localhost; dbname=moduleconnexion;charset=utf8','root','');
    session_start();

//si remplis alors requête au serveur et récup de l'id dans une variable
    if(!empty($_POST)) {
        $login = $_POST["login"];
        $password = $_POST["password"];
        
        $requete2 = $db->prepare('SELECT * FROM user WHERE login=? and  password=?');
        $requete2->execute([$login,$password]);
        $res = $requete2->fetch();
        var_dump($res["id"]);
    }
    if (!empty($res)) {
        $_SESSION["id"] = $res["id"];
        header('Location: acceuil.php');
    }
    //si la variable n'est pas vide, alors on affecte une id a notre session
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>connexion</title>
</head>
<body>
<form action="" method= "post">
    <label for="prenom">Login</label>
    <input type="text" name="login" placeholder="login">
    <input type="text" name="password" placerholder="password1">
    <button type="submit" name="envoyer">connexion</button>
</form>
</body>
</html>