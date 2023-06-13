<?php 
session_start();
require("./header.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to lasagna</h1>
    <?php if(isset($_SESSION["user"])) :?>
        <ul>
            <li>Nom : <?php echo $_SESSION["user"]["lastname"]?></li>
            <li>Prénom : <?php echo $_SESSION["user"]["firstname"]?></li>
            <li>Email : <?php echo $_SESSION["user"]["email"]?></li>
            <li>Password : <?php echo $_SESSION["user"]["password"]?></li>
        </ul>
    <?php else : ?>
        <h1>Il n'y a pas d'utilisateur connecté</h1>
    <?php endif ?>
</body>
</html>