<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['jsmsuid']==0)) {
  header('location:logout.php');
  } else{ 
if(isset($_POST['change']))
{
$userid=$_SESSION['jsmsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query1=mysqli_query($con,"select id from users where id='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query1);
if($row>0){
$ret=mysqli_query($con,"update users set Password='$newpassword' where id='$userid'");

echo '<script>alert("Votre mot de passe a été modifié avec succès.")</script>';
} else {
echo '<script>alert("Votre mot de passe actuel est incorrect.")</script>';

}

}  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	
	<title>Bijoux Click - Profil</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" media="all" href="css/style.css">
	<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('Le champ Nouveau mot de passe et Confirmer le mot de passe ne correspondent pas');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body>

	<?php include_once('includes/header.php');?>

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li>Changer mot de passe</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="cart-table">
					 <form action="#" method="post">
					 	
                                   	      <label> Mot de passe actuel :</label>
                                          <input type="text" name="currentpassword" required="true" class="form-control" placeholder="Mot de passe actuel">
                                            <br>
                                          	<label> Nouveau mot de passe :</label>
                                          <input type="text" name="newpassword" required="true" class="form-control" placeholder="Nouveau mot de passe">
                                           <br>
                                          	<label> Confirmez le mot de passe :</label>
                                          <input type="text" name="confirmpassword" required="true" class="form-control" placeholder="Confirmez le mot de passe">
                                          <br>
                                          <button class="btn btn-primary" type="submit" name="change">Enregistrer les modifications</button>
                                   </form>
                                
                                   </div>
			</div>
			<!-- / content -->
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<?php include_once('includes/footer.php');?>


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html><?php } ?>
