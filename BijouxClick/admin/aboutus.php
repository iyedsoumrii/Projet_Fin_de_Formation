<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    
     $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
     
    $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");
    if ($query) {
   
    echo '<script>alert("À propos de nous a été mis à jour.")</script>';
  }
  else
    {
     echo '<script>alert("Quelque chose s\'est mal passé. Veuillez réessayer")</script>';
    }

  
}
  ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
       
        <title>Bijoux Click - À propos</title>
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
                        <h1 class="mt-4">À propos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                            <li class="breadcrumb-item active">À propos</li>
                        </ol>
                        <div class="card mb-4">
                                 
<form  method="post">
<?php
 
$ret=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                                
<div class="row" style="margin-top:1%; padding-left: 10px;">
<div class="col-2">Titre de la page</div>
<div class="col-8"><input type="text" name="pagetitle"  id="pagetitle"  value="<?php  echo $row['PageTitle'];?>" required="true" class="form-control"></div>
</div>

<div class="row" style="margin-top:1%; padding-left: 10px;">
<div class="col-2">Description de la page</div>
<div class="col-8"><textarea name="pagedes"  id="pagedes" class="form-control" required><?php echo  ($row['PageDescription']);?></textarea></div>
</div>
<?php } ?>
<div class="row" style="margin-top:1%; padding-left: 10px;">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Mettre à jour</button></div>
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