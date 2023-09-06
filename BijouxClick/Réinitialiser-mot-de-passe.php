<?php
session_start();
error_reporting(0);
include('includes/config.php');
error_reporting(0);

if (isset($_POST['submit'])) {
    $contactno = $_SESSION['contactno'];
    $email = $_SESSION['email'];
    $password = md5($_POST['newpassword']);

    $query = mysqli_query($con, "update users set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
    if ($query) {
        echo "<script>alert('Mot de passe modifié avec succès');</script>";
        session_destroy();
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
    <script type="text/javascript">
            function checkpass() {
                if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert('Le nouveau mot de passe et la confirmation du mot de passe ne correspondent pas');
                    document.changepassword.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
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
                    <h3>Réinitialiser le mot de passe</h3>
                    <form method="post" name="changepassword" onsubmit="return checkpass();">
                        <label>Nouveau mot de passe:</label>
                        <input type="password" class="form-control" placeholder="Votre nouveau mot de pass" name="newpassword" required="">
                        <br>
                        <label>Confirmer le mot de passe</label>
                        <input type="password" class="form-control" placeholder="Confirmer votre mot de passe" required="" name="confirmpassword">
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
