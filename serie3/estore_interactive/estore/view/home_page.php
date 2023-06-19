<?php
 require_once('./header.php');
 require_once('../controller/homePageController.php');
 require_once("../database/queries.php");
 
$password="password";
echo password_hash($password, PASSWORD_BCRYPT);
?>

<!DOCTYPE html>

<html>
    <head>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"/>
     <link rel="stylesheet" href="style/style.css"/>
    </head>

    <body style="background:#fafdfe;">
        <div class="container"> 
            <?php if(isset($_GET["welcome"])):?>
                <h4 class="text-center text-success"> <?php echo $_GET["welcome"] ?> </h4>
            <?php endif ?>
            <div class="d-flex">
                <?php foreach (getAllArticle() as $value): ?>

                    <div class="card" style="width: 18rem;">

                        <img src="<?php echo $value["photo"] ?>" class="card-img-top" alt="jetski">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value["title"] ?></h5>
                            <p class="card-text"><?php echo $value["description"] ?></p>
                            <?php if($value["is_flagged"]):?>
                                <p class="btn btn-danger" >Product Flagged</p> 

                            <?php else:?>
                                <?php if($value["quantity"] > 0): ?>
                                    <a href="product_details.php?id=<?php echo $value["id"]; ?>" class="btn btn-primary">Voir détails</a>
                                <?php else:?>
                                    <p class="btn btn-danger" >No dispo</p>                           
                                <?php endif?>
                            <?php endif ?>
                            
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

           <!--
            PARTIE 1
                 Dans un premier temps, trouvez un moyen d'afficher tous nos produits (il  va falloir recuperer nos produits dans la base de données et les afficher ici). Pour ce faire, ecrivez votre requete dans le fichier queires.php avec une fonction, et ensuite faites appel a cette fonction que vous avez ecrit dans queries.php dans votre home_page.php qui aura pour but d'afficher tous nos produits.  Affichez le titre, la description  et la photo du produit. Utilisez la classe card de bootstrap pour vous faciliter le travail. 
            PARTIE 2

                 Aprés avoir pu recuperer les produits et les affichez:
                    a) Si l'utilisateur est connecté (cette a dire que il s'est authentifié). Nous allons aussi affichez les produits mais nous allons rajouter qq fonctionnalités. Faites en sorte d'afficher l'une des deux choses suivantes. Si il reste des produits en stocke, affichez un lien pour voir les details du produit. Ce lien va pointez vers la page product_details.php Si il nous reste plus de produit en stocke, affichez un message disant que le produit est hors stocke et nous n'allons pas avoir de lien pour consulter le produit. 

                    b) Si notre utilisateur est connecté et que il a le role admin, pour chacun de nos produits, rajoutez un lien pour pouvoir signaler le produit dans la liste comme etant offensif si nous le souhaitons. 

                    BONUS: En cliquant sur le lien pour signaler un produit comme etant offensif, nous allons faire une requette sql et mettre a jour ce produit pour le signaler comme etant offensif dans la base de données. En ooutre, si un produit est signalé comme offensif,il n'y aura plus de lien pour consuler les details du produit. 
            -->
        </div>
    </body>
</html>