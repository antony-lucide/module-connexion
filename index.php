<?php
    $db = new PDO('mysql:host=localhost; dbname=Modulconnexion;charset=utf8','root','');
    $requete = $bdd->prepare('SELECT nom FROM utilisateurs');
    $requete->execute();
    $user = $requete->fetchall();

    function Post() {
        if (!isset($_POST) == NULL) {
            $user = $_POST['information'];
            array_push($_POST['information'], $user);
        }
        else {
            echo $user;
        }
    }
?>


<form action="" method= "post">
    <label for="prenom">Prénom </label>
    <input type="text" name="prenom">
    <label for="nom" name="information">
    <button type="submit" name="envoyer" > Envoyer le message </button>
</form>