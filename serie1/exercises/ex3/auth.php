<?php
session_start();
require("./header.php");
require_once("./connect.php");

if (!empty($_POST)) {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql="SELECT * FROM users WHERE email=?";
        $statement=$dbConnector->prepare($sql);
        $statement->execute([$email]);
        $user=$statement->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)) {
            $verifiedPassword = password_verify($password, $user["password"]);
            if ($verifiedPassword) {
                $_SESSION["user"]=$user;
                header('Location:./user_info.php');
            }else {
                $errorMessage = "Mauvais mot de passe";
            }
        }else {
            $errorMessage = "Email non trouvé";
        }
    }else {
        $errorMessage = "Veuillez remplir tout les champs";
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
    <?php if(isset($errorMessage) && !empty($errorMessage)): ?>
        <H1> <?php echo($errorMessage) ?> </H1>
    <?php endif ?>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>