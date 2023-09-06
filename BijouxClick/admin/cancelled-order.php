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
       
        <title>Bijoux Click - Commande annulée</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
 <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
       <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Commande annulée</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                            <li class="breadcrumb-item active">Commande annulée</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Détails de la commande
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Numéro de commande</th>
                                        <th>Nom</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Email</th>
                                        <th>Date de commande</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                        <th>Numéro de commande</th>
                                        <th>Nom</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Email</th>
                                        <th>Date de commande</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php
$ret=mysqli_query($con,"select * from tblorderaddresses join users on users.id=tblorderaddresses.UserId where Status='Commande annulée'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>  

                                <tr>
                                            <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['Ordernumber'];?></td>
                  <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  <td><?php  echo $row['Email'];?></td>
                  <td><?php  echo $row['OrderTime'];?></td>
                  <?php if($row['Status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['Status'];?></td><?php } ?> 
                                    <td><a href="view-order.php?orderid=<?php echo $row['Ordernumber'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>