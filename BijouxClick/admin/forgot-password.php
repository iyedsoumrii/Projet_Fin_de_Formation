<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "SELECT ID FROM tbladmin WHERE Email='$email' AND MobileNumber='$contactno'");
    $ret = mysqli_fetch_array($query);
    if($ret > 0) {
        $_SESSION['contactno'] = $contactno;
        $_SESSION['email'] = $email;

        echo "<script type='text/javascript'> document.location ='resetpassword.php'; </script>";
    }
    else{
        echo "<script>alert('Détails invalides. Veuillez réessayer.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bijoux Click - Mot de passe oublié</title>
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
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Mot de passe oublié</h3></div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                            <label for="username">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" placeholder="Numéro de téléphone" required="" name="contactno">
                                            <label for="inputPassword">Numéro de téléphone</label>
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
            <?php include_once('includes/footer.php');?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
