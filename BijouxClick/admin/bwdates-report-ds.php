<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    
  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Bijoux Click - Rapports</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Rapports entre dates</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                            <li class="breadcrumb-item active">Rapports entre dates</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post" action="bwdates-reports-details.php">                                
<div class="row">
<div class="col-2">Date de début:</div>
<div class="col-6">
    <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true' />
</div>
</div>
<br>
<div class="row">
<div class="col-2">Date de fin:</div>
<div class="col-6"><input type="date" class="form-control" name="todate" id="todate" value="" required='true' /></div>
</div>
<br>
<div class="row">
<div class="col-2">Type de demande:</div>
<div class="col-6"><input type="radio" name="requesttype" value="all" checked="true">Tous
                <input type="radio" name="requesttype" value="">Commande non confirmée
                <input type="radio" name="requesttype"  value="Order Confirmed">Commande confirmée
                  <input type="radio" name="requesttype" value="Pickup">Pickup
                  <input type="radio" name="requesttype" value="On The Way">En cours
                    <input type="radio" name="requesttype" value="Delivered">Livré
                      <input type="radio" name="requesttype" value="Order Cancelled">Commande annulée</div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Afficher</button></div>
</div>

</form>
                            </div>
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
<?php } ?>