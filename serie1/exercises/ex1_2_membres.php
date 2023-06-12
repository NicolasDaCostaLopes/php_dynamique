<?php 
require("../db/connect.php");
require_once("./ex1_2_header.php");

 $sql="SELECT * FROM users";

 $statement=$dbConnector->query($sql);
 $users=$statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table">
    
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user):?>
            <tr>
            <th scope="row"><?php echo $user["id"] ?></th>
            <td><?php echo $user["firstname"] ?></td>
            <td><?php echo $user["lastname"] ?></td>
            <td><?php echo $user["email"] ?></td>
            <td><?php echo $user["password"] ?></td>
            <td><?php echo $user["description"] ?></td>
            </tr>
        <?php endforeach?>
        </tbody>
    
</table>
</body>
</html>