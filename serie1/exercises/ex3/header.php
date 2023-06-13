<?php 
    if(isset($_GET["logout"]) && $_GET["logout"]==true){
        session_destroy();
        header('location:./auth.php');
    }
?>

<header>
    <div class="d-flex gap-3 align-items-center justify-content-center mt-5">
        <a href="./" class="btn btn-light">Accueil</a>
        <?php if(isset($_SESSION["user"])): ?>
            <a href="?logout=<?php echo true ?>" class="btn btn-light">Deconnection</a>
        <?php else: ?>
            <a href="./auth.php" class="btn btn-light">Connection</a>
        <?php endif ?>
        <a href="./user_info.php" class="btn btn-light">Information</a>
    </div>
</header>