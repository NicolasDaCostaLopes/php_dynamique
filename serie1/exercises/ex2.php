<?php
// Creer un dossier qui s'apelle ex2 contenu dans votre dossier exercises dans lequelle vous allez ecrire tous vos fichiers pour cette exercise


/*
1) 
    a) rentrez dans votre phpmyadmin
    b) acceder a votre base de données que vous aviez creé dans votre premiere exercise 
    c) rendez vous dans la section pour effectuer des requettes sql et tapez les lignes suivantes: TRUNCATE table users
    d) Cette ligne va vous supprimer tous vos utilisateurs avec un mot de passe en claire
    e) Creer de nouveau un fichier form.php et cette fois ci, nous allons inserer des utilisateurs en base de données avec des mot de passe qui seront crypté et non plus en clair. Gardez bien les champs de votre formulaire (firstname,lastname,email,password et description) dans votre fichier form.php

2) Faites en sorte de vous authentifier avec un utilisateur de votre base de données
    a) Tout d'abord afficher un message de bienvenue a l'ecran si notre utilisateur est bien authentifié. Si notre utilisateur n'est pas authentifié, afficher un message d'erreur a la place qui indiqeura que les identifiants saisis ne sont pas valide.
    b) Dans un deuxieme temps, lors que notre utilisateur s'est authentifié, faites en sorte de rediriger vers une autre page que vous aurez creer! 

*/
    

?>
<?php

require("../db/connect.php");
require_once("./ex1_2_header.php");

if(!empty($_POST)){
    
    if(!empty($_POST["email"])&& !empty($_POST["password"])){
        try{
            $email=$_POST["email"];
            $password=$_POST["password"];

        $sql="SELECT * FROM users WHERE email=?";


        $statement=$dbConnector->prepare($sql);
        $statement->execute([$email]);        
        $user=$statement->fetch(PDO::FETCH_ASSOC);
        }

        catch(PDOException $e){
            echo $e->getMessage();
        }
        if (!empty($user)) {
            $dbpassword = $user["password"];
            $ispasswordright = password_verify($password, $dbpassword);
        
            if ($ispasswordright) {
                header('Location:./ex1.php');
            }else {
                $displayError = "MDP ou MAIL faux :P";
            }
        }else {
            $displayError = "Jetski inside the jacuzzi";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php if(!empty($displayError) &&  isset($displayError)): ?>
<h1><?php echo $displayError ?> </h1>
<?php endif ?>

<form method="post">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>