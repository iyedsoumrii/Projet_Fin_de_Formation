<?php
// Démarrer la session pour utiliser les variables de session
session_start();

// Désactiver les rapports d'erreur pour une utilisation en production
error_reporting(0);

// Inclure le fichier de configuration
include("includes/config.php");

// Vérifier si le formulaire de connexion a été soumis
if(isset($_POST['submit'])) {
    // Récupérer le nom d'utilisateur et le mot de passe du formulaire soumis
    $username = $_POST['username'];
    $password = md5($_POST['inputPassword']); // Hacher le mot de passe en utilisant MD5

    // Requête pour vérifier si le nom d'utilisateur et le mot de passe correspondent à un enregistrement d'administrateur
    $ret = mysqli_query($con,"SELECT ID FROM tbladmin WHERE UserName='$username' and Password='$password'");
    $num = mysqli_fetch_array($ret);

    // Si une correspondance est trouvée
    if($num > 0) {
        // Définir les variables de session pour l'utilisateur connecté
        $_SESSION['alogin'] = $_POST['username'];
        $_SESSION['aid'] = $num['ID'];
        
        // Rediriger vers le tableau de bord
        header("location:dashboard.php");
    } else {
        // Afficher un message d'erreur si aucune correspondance n'est trouvée
        echo "<script>alert('Nom d'utilisateur ou mot de passe invalide');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <title>Bijoux Click - Admin</title>
    <style>
        /* Styles pour l'image de fond */
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
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Connexion</h3></div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" name="username" type="text" placeholder="Nom d'utilisateur" required />
                                            <label for="username">Nom d'utilisateur</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Mot de passe" required />
                                            <label for="inputPassword">Mot de passe</label>
                                        </div>
                                        
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="forgot-password.php">Mot de passe oublié?</a>
                                            <button type="submit" name="submit" class="btn btn-primary">Se Connecter</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="../index.php">Retour</a></div>
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
