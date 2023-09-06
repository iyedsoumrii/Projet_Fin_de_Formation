<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (empty($_SESSION['aid'])) {
    header('location:logout.php');
    exit();
} else {
    if (isset($_POST['submit'])) {
        $pagetitle = mysqli_real_escape_string($con, $_POST['pagetitle']);
        $pagedes = mysqli_real_escape_string($con, $_POST['pagedes']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobnumber = mysqli_real_escape_string($con, $_POST['mobnumber']);
        $timing = mysqli_real_escape_string($con, $_POST['timing']);

        $query = mysqli_query($con, "UPDATE tblpage SET PageTitle='$pagetitle', Email='$email', MobileNumber='$mobnumber', Timing='$timing', PageDescription='$pagedes' WHERE PageType='contactus'");
        
        if ($query) {
            echo '<script>alert("Contactez-nous a été mis à jour.")</script>';
        } else {
            echo '<script>alert("Quelque chose s\'est mal passé. Veuillez réessayer.")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bijoux Click - Contactez-nous</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/all.min.js" crossorigin="anonymous"></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>
    <?php include_once('includes/header.php');?>
    <div id="layoutSidenav">
        <?php include_once('includes/sidebar.php');?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Contactez-nous</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                        <li class="breadcrumb-item active">Contactez-nous</li>
                    </ol>
                    <div class="card mb-4">
                        <form method="post">
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM tblpage WHERE PageType='contactus'");
                            $row = mysqli_fetch_array($ret);
                            ?>
                            <div class="row" style="margin-top:1%; padding-left: 10px;">
                                <div class="col-2">Titre de la page</div>
                                <div class="col-8"><input type="text" name="pagetitle" id="pagetitle" value="<?php echo $row['PageTitle'];?>" required="true" class="form-control"></div>
                            </div>
                            <div class="row" style="margin-top:1%; padding-left: 10px;">
                                <div class="col-2">Description de la page</div>
                                <div class="col-8"><textarea name="pagedes" id="pagedes" class="form-control" required><?php echo $row['PageDescription'];?></textarea></div>
                            </div>
                            <div class="row" style="margin-top:1%; padding-left: 10px;">
                                <div class="col-2">Email</div>
                                <div class="col-8"><input type="text" name="email" id="email" value="<?php echo $row['Email'];?>" required="true" class="form-control"></div>
                            </div>
                            <div class="row" style="margin-top:1%; padding-left: 10px;">
                                <div class="col-2">Numéro de téléphone</div>
                                <div class="col-8"><input type="text" name="mobnumber" id="mobnumber" value="<?php echo $row['MobileNumber'];?>" required="true" class="form-control"></div>
                            </div>
                            <div class="row" style="margin-top:1%; padding-left: 10px;">
                                <div class="col-2">Horaires</div>
                                <div class="col-8"><input type="text" name="timing" id="timing" value="<?php echo $row['Timing'];?>" required="true" class="form-control"></div>
                            </div>
                            <div class="row" style="margin-top:1%; padding-left: 10px;">
                                <div class="col-4"><button type="submit" name="submit" class="btn btn-primary">Modifier</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <?php include_once('includes/footer.php');?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
