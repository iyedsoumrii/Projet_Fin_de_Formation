<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "SELECT ID FROM users WHERE Email='$email' AND MobileNumber='$contactno'");
    $ret = mysqli_fetch_array($query);
    if($ret > 0) {
        $_SESSION['contactno'] = $contactno;
        $_SESSION['email'] = $email;

        echo "<script type='text/javascript'> document.location ='Réinitialiser-mot-de-passe.php'; </script>";
    }
    else{
        echo "<script>alert('Détails invalides. Veuillez réessayer.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Bijoux Click - Mot de passe oublié</title>
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
                <li>Mot de passe oublié</li>
            </ul>
        </div>
    </div>

    <div id="body">
        <div class="container">
            <div id="content" class="full">
                <div class="cart-table">
                    <h3>Mot de passe oublié</h3>
                    <form action="#" method="post">
                        <label>Email:</label>
                        <input type="email" class="form-control" placeholder="Votre E-mail" name="email" required="">
                        <br>
                        <label>Numéro de téléphone:</label>
                        <input type="text" class="form-control" placeholder="Votre Numéro" required="" name="contactno">
                        <div class="d-flex justify-content-between flex-wrap m-tb-20">
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit" name="submit">Réinitialiser</button>
                        <br>
                        <br> Vous avez déja un compte ?
                        <a href="login.php" class="btn btn-primary">Connexion</a>
                    </form>
                </div>
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
