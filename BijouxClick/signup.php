<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from users where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo '<script>alert("Cet e-mail ou ce numéro de contact est déjà associé à un autre compte")</script>';
    }
    else{
    $query=mysqli_query($con, "insert into users(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    
    echo '<script>alert("Vous vous êtes inscrit(e) avec succès")</script>';
  }
  else
    {
      echo '<script>alert("Une erreur s\'est produite. Veuillez réessayer")</script>';
    }
}
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="fr"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Bijoux Click - Inscription</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Le champ Mot de passe et le champ de confirmation ne correspondent pas');
document.signup.repeatpassword.focus();
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
				<li>Inscription</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="cart-table">
					<div class="cart-table">
                                   <h3>Créer un compte :</h3>
                                   <form action="#" method="post" name="signup" onsubmit="return checkpass();">
                                   	<label>Prénom :</label>
                                          <input type="text" name="firstname" placeholder="Votre prénom" required="true" class="form-control">
                                            <br>
                                          	<label>Nom :</label>
                                          <input type="text" name="lastname" placeholder="Votre nom" required="true" class="form-control">

<br>
                                          	<label>Numéro de téléphone :</label>
                                          <input type="number" name="mobilenumber" maxlength="8" placeholder="Votre numéro" required="true" class="form-control">
                                          <br>
                                          	<label>Adresse E-mail :</label>
                                          <input type="email" name="email" placeholder="E-mail" required="true" class="form-control">
                                          <br>
                                          	<label>Mot de passe :</label>
                                          <input type="password" name="password" placeholder="Mot de passe" required="true" class="form-control">
                                          <br>
                                          <label>Confirmer mot de passe :</label>
                                          	<input type="password" name="repeatpassword" placeholder="Confirmer mot de passe" required="true" class="form-control">
                                          <br>
                                          <button class="btn btn-primary" type="submit" name="submit">S'inscrire</button>
                                   </form>
                            </div>
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
</html>
