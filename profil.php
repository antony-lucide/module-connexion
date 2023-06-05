<?php 
   $db = new PDO('mysql:host=localhost; dbname=moduleconnexion;charset=utf8','root','');
    session_start();
    echo $_SESSION['id'];

    function verify($password) {
        if(strlen($password) > 8){
            return TRUE;
        }
        else {
            echo "Mot de passe impossible";
            return FALSE;
        }
    }


    if(!empty($_POST)) {
        
        $login = $_POST["login"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $password = $_POST["password"]; 
        if(strlen($password) > 8) {
            $sql = "UPDATE `user` SET `login` = :logi, `firstname` = :firstname, `lastname` = :lastname, `password` = :passwrd WHERE `user`.`id` = :id";
            $requete2 = $db->prepare($sql);
            $requete2->execute([
                "logi"=>$login,
                "firstname"=>$prenom,
                "lastname" =>$nom,
                "passwrd" =>$password,
                "id" => $_SESSION["id"]
            ]);

        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil</title>
</head>
<body>

    <form action="" method= "post">
    <label for="prenom">Prénom </label> 
    <input type="text" name="prenom"> <br>

    <label for="prenom">nom </label> 
    <input type="text" name="nom" placeholder="nom"> <br>

    <label for="prenom">password </label> 
    <input type="password" name="password" placerholder="password1"><br>
    
    <label for="prenom">login </label>
    <input type="text" name="login" placeholder="login"> <br>

    <button type="submit" name="envoyer" > Envoyer les Modifications </button>
    </form>
</body>
</html>