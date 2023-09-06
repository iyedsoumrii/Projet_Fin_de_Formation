<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
  ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        
        <title>Bijoux Click - Tableau de bord</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tableau de bord</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tableau de bord</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php $query1=mysqli_query($con,"Select * from users");
$totuser=mysqli_num_rows($query1);
?>
                                    <div class="card-body">Utilisateurs totaux(<?php echo $totuser;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="reg-users.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php $query2=mysqli_query($con,"Select * from  tblorderaddresses where Status is null");
$notconfirmedorder=mysqli_num_rows($query2);
?>
                                    <div class="card-body">Nouveaux commandes(<?php echo $notconfirmedorder;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="new-order.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php $query3=mysqli_query($con,"Select * from  tblorderaddresses where Status ='Commande confirmée'");
$conforder=mysqli_num_rows($query3);
?>
                                    <div class="card-body">Commandes confirmées(<?php echo $conforder;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="confirm-order.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <?php $query4=mysqli_query($con,"Select * from  tblorderaddresses where Status ='Commande récupérer'");
$pickuporder=mysqli_num_rows($query4);
?>
                                    <div class="card-body">Commandes récupérées(<?php echo $pickuporder;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="pickup-order.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php $query5=mysqli_query($con,"Select * from  tblorderaddresses where Status ='en cours de livraison'");
$otworder=mysqli_num_rows($query5);
?>
                                    <div class="card-body">Commandes en cours(<?php echo $otworder;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="ontheway-order.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php $query6=mysqli_query($con,"Select * from  tblorderaddresses where Status ='Commande livrée'");
$delorder=mysqli_num_rows($query6);
?>
                                    <div class="card-body">Commandes livrées(<?php echo $delorder;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="delivered-order.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php $query7=mysqli_query($con,"Select * from  tblorderaddresses where Status ='Commande annulée'");
$canorder=mysqli_num_rows($query7);
?>
                                    <div class="card-body">Commandes annulées(<?php echo $canorder;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="cancelled-order.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <?php $query8=mysqli_query($con,"Select * from  tblreview where Status ='Review Accept'");
$accrev=mysqli_num_rows($query8);
?>
                                    <div class="card-body">Avis acceptés(<?php echo $accrev;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="approved-reviews.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php $query9=mysqli_query($con,"Select * from  tblreview where Status ='Review Reject'");
$rejrev=mysqli_num_rows($query9);
?>
                                    <div class="card-body">Avis rejetés(<?php echo $rejrev;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="unapproved-reviews.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php $query10=mysqli_query($con,"Select * from  tblreview where Status is null");
$newrev=mysqli_num_rows($query10);
?>
                                    <div class="card-body">Nouvel avis(<?php echo $newrev;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="new-reviews.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php $query11=mysqli_query($con,"Select * from  tblcontact where IsRead is null");
$unreadenq=mysqli_num_rows($query11);
?>
                                    <div class="card-body">Réclamation non lues(<?php echo $unreadenq;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="unreadenq.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <?php $query12=mysqli_query($con,"Select * from  tblcontact where IsRead='1'");
$readenq=mysqli_num_rows($query12);
?>
                                    <div class="card-body">Réclamations lues(<?php echo $readenq;?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="readenq.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
              <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>