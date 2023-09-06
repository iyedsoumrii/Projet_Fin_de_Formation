<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
{
$adminid=$_SESSION['aid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");

echo '<script>alert("Votre mot de passe a été modifié avec succès.")</script>';
} else {

echo '<script>alert("Votre mot de passe actuel est incorrect.")</script>';
}

}
  ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
       
        <title>Bijoux Click - Modifier mot de passe</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('Le nouveau mot de passe et le champ Confirmer le mot de passe ne correspondent pas');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Changer le mot de passe</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                            <li class="breadcrumb-item active">Changer le mot de passe</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post" name="changepassword" onsubmit="return checkpass();">  
                             
<div class="row">
<div class="col-2">Mot de passe actuel</div>
<div class="col-4">
<input type="password" class="form-control" name="currentpassword" id="currentpassword" value="" required='true' />
</div>
</div>
<br>
<div class="row">
<div class="col-2">Nouveau mot de passe</div>
<div class="col-4">

<input type="password" class="form-control" name="newpassword" id="newpassword" value="" required='true' />
</div>
</div><br>
<div class="row">
<div class="col-2">Confirmer le mot de passe</div>
<div class="col-4">
<input type="password"  class="form-control" name="confirmpassword" id="confirmpassword" value="" equired='true'/>
</div>
</div>


<br>
<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Modifier</button></div>
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