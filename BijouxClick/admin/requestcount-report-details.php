<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        
        <title>Bijoux Click - Rapport du nombre de commandes</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once('includes/header.php'); ?>
        <div id="layoutSidenav">
            <?php include_once('includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Rapport du nombre de commandes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                            <li class="breadcrumb-item active">Rapport du nombre de commandes</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Rapport du nombre de commandes
                            </div>
                            <div class="card-body">
                                <?php
                                $fdate = $_POST['fromdate'];
                                $tdate = $_POST['todate'];
                                ?>
                                <h5 align="center" style="color:blue">Rapport du nombre de commandes du <?php echo $fdate?> au <?php echo $tdate?></h5>
                                <hr />
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Total des commandes</th>
                                            <th>Total des commandes non confirmées</th>
                                            <th>Total des commandes confirmées</th>
                                            <th>Total des commandes annulées</th>
                                            <th>Total des commandes récupérées</th>
                                            <th>Total des commandes livrées</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $ret = mysqli_query($con, "select month(OrderTime) as lmonth,year(OrderTime) as lyear,count(ID) as totalcount,count(if(Status='' || Status is null,0,null)) as uncofirmedorder,count(if(Status='Order Confirmed',0,null)) as confirmedorder,count(if(Status='Pickup',0,null)) as mpickup,count(if(Status='Delivered',0,null)) as mdel,count(if(Status='Order Cancelled',0,null)) as mcancel from tblorderaddresses where date(OrderTime) between '$fdate' and '$tdate' group by lmonth,lyear");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['lmonth']."/".$row['lyear'];?></td>
                                            <td><?php echo $total = $row['totalcount'];?></td>
                                            <td><?php echo $npytotal = $row['uncofirmedorder'];?></td>
                                            <td><?php echo $ntotal = $row['confirmedorder'];?></td>
                                            <td><?php echo $tctotal = $row['mcancel'];?></td>
                                            <td><?php echo $intotal = $row['mpickup'];?></td>
                                            <td><?php echo $aritotal = $row['mdel'];?></td>
                                        </tr>
                                        <?php
                                        $ftotal += $total;
                                        $ttlny += $npytotal;
                                        $fntotal += $ntotal;
                                        $fctotal += $tctotal;
                                        $fintotal += $intotal;
                                        $faritotal += $aritotal;
                                    }
                                    ?>
                                    <tr>
                                        <td>Total </td>
                                        <td><?php echo $ftotal;?></td>
                                        <td><?php echo $ttlny;?></td>
                                        <td><?php echo $fntotal;?></td>
                                        <td><?php echo $fctotal;?></td>
                                        <td><?php echo $fintotal;?></td>
                                        <td><?php echo $faritotal;?></td>
                                    </tr>   
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include_once('includes/footer.php'); ?>
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
