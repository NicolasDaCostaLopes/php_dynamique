<?php
    require_once("header.php");
    require_once('../database/queries.php');
    

    if(!empty($_POST)){
        if(!empty($_POST["email"])&& !empty($_POST["password"])){
            $email=$_POST["email"];
            $password=$_POST["password"];
            $getUserVerified=userLoginQuery($email,$password);
            var_dump($getUserVerified);
            if(!$getUserVerified){
                return "user not found";
            }
            if($getUserVerified){
               
                $_SESSION["user"]=$getUserVerified;
                header('location:home_page.php?welcome=Bienvenue'." ".$_SESSION["user"]["firstname"]);
               
            }

          
        }
    }
   
?>

<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"/>
    </head>

    <body style="background:#fafdfe;">
    <h4 class="text-infro text-center"> Connectez Vous ! </h4>
     <?php if(isset($errorMsg)):?>
        <div class="text-danger text-center"> <?php echo $errorMsg ?> </div>
     <?php endif ?>
        <div class="d-flex flex-column">
           
            <form method="post">
                <div class="form-group col-4 offset-4">
                    <label for="email"> Email </label>
                    <input type="email" class="form-control" name="email"/>
                </div>

                <div class="form-group col-4 offset-4">
                    <label for="password"> Mot de passe</label> 
                    <input type="password" class="form-control" name="password"/>
                </div>

                <div class="forl-group col-4 offset-4 mt-2">
                    <button type="submit" class="btn btn-primary col-6"> Valider </button>
                </div>
            </form>
        </div>
    </body>
</html>

<script>
    // ce code est neccesaire pour empecher notre formulaire d'etre soumis a chaque fois que la page a etait rafraichi
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>