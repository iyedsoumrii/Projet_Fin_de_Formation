<?php
// Démarrer la session pour utiliser les variables de session
session_start();

// Désactiver les rapports d'erreur pour une utilisation en production
error_reporting(0);

// Inclure le fichier de configuration
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Bijoux Click - À propos</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" media="all" href="css/style.css">
</head>
<body>
    <?php include_once('includes/header.php');?>

    <div id="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li>À propos</li>
            </ul>
        </div>
    </div>

    <div id="body">
        <div class="container">
            <div class="product">
                <?php
                // Récupérer les données de la page "À propos" depuis la base de données
                $ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
                ?>
                    <div class="image">
                        <img src="images/about.jpg" alt="">
                    </div>
                    <div class="details">
                        <h1><?php echo $row['PageTitle'];?></h1>

                        <div class="entry">
                            <?php echo $row['PageDescription'];?>
                        </div>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php include_once('includes/footer.php');?>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
