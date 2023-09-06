<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['aid'];
        $aname = $_POST['adminname'];
        $mobno = $_POST['contactnumber'];

        $query = mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
        if ($query) {
            echo '<script>alert("Le profil de l\'administrateur a été mis à jour.")</script>';
        } else {
            echo '<script>alert("Quelque chose s\'est mal passé. Veuillez réessayer.")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bijoux Click - Profil de l'administrateur</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once('includes/header.php'); ?>
    <div id="layoutSidenav">
        <?php include_once('includes/sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Profil de l'administrateur</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                        <li class="breadcrumb-item active">Profil de l'administrateur</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post">
                                <?php
                                $adminid = $_SESSION['aid'];
                                $ret = mysqli_query($con, "select * from tbladmin where ID='$adminid'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                    <div class="row">
                                        <div class="col-2">Nom de l'administrateur</div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="adminname" id="adminname" value="<?php echo $row['AdminName']; ?>" required='true' />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-2">Nom d'utilisateur</div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['UserName']; ?>" readonly="true" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-2">Numéro de contact</div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="contactnumber" name="contactnumber" value="<?php echo $row['MobileNumber']; ?>" required='true' maxlength='10' pattern='[0-9]+' />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-2">Adresse e-mail</div>
                                        <div class="col-4">
                                            <input type="email" class="form-control" id="email" name="email" class="form-control" value="<?php echo $row['Email']; ?>" readonly='true' />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-2">Date d'inscription</div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" value="<?php echo $row['AdminRegdate']; ?>" readonly="true" />
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <br>
                                <div class="row">
                                    <div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Enregistrer</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
<?php ?>
