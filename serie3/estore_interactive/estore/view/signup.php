<?php
require_once('./header.php');
require_once("../database/queries.php");

$isUserInserted = false;

if(!empty($_POST)){
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $password=$_POST["password"];

    if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)){
        $hashedPassword=password_hash($password,PASSWORD_BCRYPT);

        $isUserInserted = addUserQuery($firstname, $lastname, $email, $hashedPassword);
    }else{
        $errorMsg= "Erreur de saisie";
    }
}

if($isUserInserted){
    header('Location: ./home_page.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"/>
    </head>

    <body>
        <h1 class="text-center my-3">Inscription</h1>
        <?php if(isset($errorMsg) && !empty($errorMsg)): ?>
            <h4 class="text-danger text-center mt-3"><?php echo $errorMsg ?></h4>
        <?php endif ?>
        <form method="post" class="d-flex flex-column p-3 justify-content-center align-items-center">
            <div class="mb-3 col-3">
                <label for="InputFirstName" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="firstname" required>
            </div>
            <div class="mb-3 col-3">
                <label for="InputLastName" class="form-label">Nom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="lastname">
            </div>
            <div class="mb-3 col-3">
                <label for="InputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
            </div>
            <div class="mb-3 col-3">
                <label for="InputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary col-3 mt-2">Submit</button>
        </form>
        <!--
            Ici, faites en sorte de pouvoir s'inscrire comme un utilisateur. Vous devriez avoir un formulaire avec les champs nom,prenom,email,et mot de passe. Lors que vous allez saisir ses informations et que toutes les informations seront bien rensiegnés, nous allons rediriger vers la page d'accuiel. Verifiez que notre utilisateur a bient etait inseré en base de données et que son mot de passe est bien crypté.

            //BONUS: faites en sorte d'afficher un message de bienvenue a l'utilisateur apres que il est validé son inscription. 
        -->
    </body>
</html>

<script>
    // ce code est neccesaire pour empecher notre formulaire d'etre soumis a chaque fois que la page a etait rafraichi
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>