<?php
session_start();
error_reporting(0);
include('includes/config.php');
error_reporting(0);

if (isset($_POST['submit'])) {
    $contactno = $_SESSION['contactno'];
    $email = $_SESSION['email'];
    $password = md5($_POST['newpassword']);

    $query = mysqli_query($con, "update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
    if ($query) {
        echo "<script>alert('Mot de passe modifié avec succès');</script>";
        session_destroy();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
       
        <title>Bijoux Click - Réinitialiser le mot de passe</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <style>
            body {
                background-image: url("../images/admin_background.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Réinitialiser le mot de passe</h3></div>
                                    <div class="card-body">
                                        <form method="post" name="changepassword" onsubmit="return checkpass();">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="password" required="" name="newpassword" placeholder="Nouveau mot de passe">
                                                <label for="username">Nouveau mot de passe</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="password" name="confirmpassword" required="" placeholder="Confirmez votre mot de passe">
                                                <label for="inputPassword">Confirmer le mot de passe</label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                             
                                                <button type="submit" name="submit" class="btn btn-primary">Réinitialiser</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Se connecter</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
