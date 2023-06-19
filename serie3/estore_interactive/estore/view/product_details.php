<?php
 require_once('./header.php');
 require_once("../database/queries.php");


 if (isset($_GET["sentFlag"])) {
    switchArticleFlag($_GET["sentFlag"],$_GET["id"]);
 }
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"/>
    </head>

    <body style="background:#fafdfe;">
        <div class="container mt-3">
              <!--
                Cette page va afficher les details d'un produit que nous aurons selectionné. Pensez a utilisez les query params. Ici, affichez le titre,la description,la quantité,le prix ef les informations sur la personne qui a posté le produit (prenom et email,pensez a une maniere d'ecrire votre requette sql pour pouvoir recuperer les informations de l'utilisateur qui a posté le produit!) Aussi, trouvez un moyen de recuperer le bon id du produit dans votre requette sql Affocainsi que la quantité en stocke  et le prix. A gauche, affichez une photo du produit qui a etait selectionné
            -->
            <?php 
            $article = getArticleById($_GET["id"]);
            $articleAuthor = getUserById($article["user_id"]);
            ?>
            <div class="card" style="width: 18rem;">

                <img src="<?php echo $article["photo"] ?>" class="card-img-top" alt="jetski">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $article["title"] ?></h5>
                    <p class="card-text"><?php echo $article["description"] ?></p>
                    <p class="card-text"><?php echo $article["quantity"] ?></p>
                    <p class="card-text"><?php echo $article["price"] ?></p>
                    <p class="card-text"><?php echo $articleAuthor["firstname"] ?></p>
                    <p class="card-text"><?php echo $articleAuthor["email"] ?></p>
                    <?php if ($_SESSION["user"]["role"] === "admin" && $article["is_flagged"]):?> 
                        <a class="btn btn-primary" href="?sentFlag=0&id=<?php echo $article["id"];?>">Set flag to 0</a>
                    <?php elseif($_SESSION["user"]["role"] === "admin"):?>
                        <a class="btn btn-danger" href="?sentFlag=1&id=<?php echo $article["id"];?>">Set flag to 1</a>  
                    <?php endif ?>





                </div>
            </div>
           
           
            
        </div>
    </body>
</html>