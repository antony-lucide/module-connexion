<?php
   $db = new PDO('mysql:host=localhost; dbname=moduleconnexion;charset=utf8','root','');
    //Fonction de vérification du mot de passe
   function verify($password) {
        if(strlen($password) > 8){
            return TRUE;
        }
        else {
            echo "Mot de passe impossible";
            return FALSE;
        }
    }

    //Si formulaire remplis, alors j'envoie une requête a ma base SQL
   if (!empty($_POST)){ 
        $login = $_POST["login"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $password = $_POST["password"];

        if (verify($password)){
            $requete = $db->prepare('INSERT INTO user (login,firstname,lastname,password) VALUES (?,?,?,?)');
            $requete->execute([$login,$prenom,$nom,$password]);
            $requete->errorInfo();
            header('Location: connexion.php');
        }
   }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
<form action="" method= "post">
    <label for="prenom">Prénom </label>
    <input type="text" name="prenom">
    <input type="text" name="nom" placeholder="nom">
    <input type="text" name="password" placerholder="password1">
    <input type="text" name="login" placeholder="login"> 
    <button type="submit" name="envoyer" > Envoyer le message </button>
</form>
</body>
</html>