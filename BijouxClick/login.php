<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['login'])) {
    $emailcon = $_POST['emailcont'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT ID FROM users WHERE (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password'");
    $ret = mysqli_fetch_array($query);
    
    if($ret > 0) {
        $_SESSION['jsmsuid'] = $ret['ID'];
        header('location:index.php');
    } else {
        echo "<script>alert('Détails invalides.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Bijoux Click - Connexion</title>
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
                <li>Connexion</li>
            </ul>
        </div>
    </div>

    <div id="body">
        <div class="container">
            <div id="content" class="full">
                <div class="cart-table">
                    <h3>S'identifier</h3>
                    <form action="#" method="post">
                        <label>Votre Email ou numéro de Téléphone:</label>
                        <input type="text" name="emailcont" required="true" placeholder="Email ou numéro de téléphone" required="true" class="form-control">
                        <br>
                        <label>Mot de passe:</label>
                        <input type="password" name="password" placeholder="Mot de passe" required="true" class="form-control">
                        <div class="d-flex justify-content-between flex-wrap m-tb-20">
                            <a class="link--gray" style="color: blue;" href="Réinitialiser.php">Mot de passe oublié ?</a>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit" name="login">CONNEXION</button>
                        <br>
                        <br> Première visite sur Bijoux Click ?
                        <a href="signup.php" class="btn btn-primary">INSCRIPTION</a>
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
