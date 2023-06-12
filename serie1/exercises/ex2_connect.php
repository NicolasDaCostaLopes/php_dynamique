<?php
require_once('../db/connect.php');
// ici nous allons voir comment on peux s'authentifier et faire la verification que nous avons bien un utilisateur avec un email et un mot de passe en base de données

if(!empty($_POST)){
    if(!empty($_POST["email"]&& !empty($_POST["password"]))){
        $email=$_POST["email"];
        $passwordStr=$_POST["password"];

        
        $sql="SELECT * FROM users WHERE email=?";
        $statement=$dbConnector->prepare($sql);
        $statement->execute([$email]);

        $result=$statement->fetch(PDO::FETCH_ASSOC);

        if(!empty($result)){
            $checkIfValidPassword=password_verify($passwordStr,$result["password"]);
            
        }
    }
}


?>