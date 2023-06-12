<?php
// Creer un dossier exercises ou vous allez mettre toutes vos exercises.
// Creer un dossier ex1 dans ce dossier exercises et ecrivez tous les fichier que vous avez besoin pour vos exercises dans ce dossier

/*
EXO 1
 1) creer un fichier form.php et ecrivez un formulaire html dedans. Dans votre formulaire html rajoutez un champ pour saisir un nom,prenom,email et mot de passe ainsi que une description. Faites en sorte de pouvoir recuperer les valeurs que vous aurez saisi avec dans le formulaire. Une fois avec get et une fois avec post
EXO 2
 1)Creer une base de donnée que vous allez nommé serie1_exos
 2) Creer une table nommé  users avec comme champs un id qui sera la clé primaire,un prenom (varchar avec 255 characteres),un nom(varchar avec 255 characteres),un email(varchar avec 255 characteres qui sera unique), un mot de passe (varchar avec 255 characteres) et enfin une description qui sera du texte
 3) Creer un fichier connect.php et connectez vous a votre base de donnée avec PDO 
 4) A partir de votre fichier form.php faites en sorte de pouvoir inserer les valeurs que vous avez saisi dans la base de données. Il faut utiliser une requette preparé!
 5) Creer un autre fichier nommé members.php ou vous allez afficher dans un tableau html le nom,prenom,email et desciprion de chacun de nos utilisateurs
 6) Enfin, creer un fichier header.php dans lequelle vous allez mettre le lien vers la page memebers.php et form.php et faites en sorte de rendre ce fichier header.php accesible depuis vos deux pages php.

*/
if (!empty($_GET)){
    var_dump($_GET);
}
if ($_POST){
    var_dump($_POST);
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

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checked">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>