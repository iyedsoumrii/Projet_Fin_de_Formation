<?php
session_start();
//error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['jsmsuid']==0)) {
  header('location:logout.php');
  } else{ 
if(isset($_POST['submit']))
  {
    $uid=$_SESSION['jsmsuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
	$contno=$_POST['mobilenumber'];
	$email=$_POST['email'];
    $query=mysqli_query($con, "update users set FirstName='$fname', LastName='$lname', mobilenumber='$contno', email='$email' where id='$uid'");
    if ($query) {
 echo '<script>alert("Profil mis à jour avec succès.")</script>';
echo '<script>window.location.href=profile.php</script>';
  }
  else
    {
      echo '<script>alert("Quelque chose s\'est mal passé. Veuillez réessayer.")</script>';
    }
}
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	
	<title>Bijoux Click - Gérer Profil</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" media="all" href="css/style.css">
	
</head>
<body>

	<?php include_once('includes/header.php');?>

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li>Profil</li>
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
					 	<?php
$uid=$_SESSION['jsmsuid'];
$ret=mysqli_query($con,"select * from users where id='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?> 
                                   	      <label>Prénom</label>
                                          <input type="text" name="firstname" required="true" class="form-control" value="<?php  echo $row['FirstName'];?>">
                                            <br>
                                          	<label>Nom</label>
                                          <input type="text" name="lastname" required="true" class="form-control" value="<?php  echo $row['LastName'];?>">
                                           <br>
                                          	<label>Numéro de téléphone</label>
                                          <input type="text" name="mobilenumber" maxlength="8" class="form-control" value="<?php  echo $row['MobileNumber'];?>">
                                          <br>
                                          	<label>Adresse Email</label>
                                          <input type="email" name="email" required="true" class="form-control" value="<?php  echo $row['Email'];?>">
                                          <br>
                                          	<label>Date d'enregistrement</label>
                                         <input type="text" name="regdate" value="<?php  echo $row['regDate'];?>"  readonly="true" class="form-control">
                                          <br>
                                          <button class="btn btn-primary" type="submit" name="submit">Sauvegarder les modifications</button>
                                   </form>
                                   <?php }?>
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
