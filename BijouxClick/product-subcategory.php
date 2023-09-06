<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
$pid=$_POST['pid'];
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"insert into orders(UserId,PId) values('$userid','$pid') ");
if($query)
{
 echo "<script>alert(''Le bijou a été ajouté au panier');</script>";
 echo "<script type='text/javascript'> document.location ='cart.php'; </script>";   
} else {
 echo "<script>alert('Quelque chose s\'est mal passé.');</script>";      
}
}

if(isset($_POST['wsubmit']))
{
$wpid=$_POST['wpid'];
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"insert into wishlist(UserId,ProductId) values('$userid','$wpid') ");
if($query)
{
 echo "<script>alert('Le bijou a été ajouté à la liste de souhaits');</script>";
 echo "<script type='text/javascript'> document.location ='wishlist.php'; </script>";   
} else {
 echo "<script>alert('Quelque chose s\'est mal passé.');</script>";      
}
}
  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Bijoux Click - Produits de bijoux</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

	<?php include_once('includes/header.php');?>

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li>Résultats du produit</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div class="pagination">
				
			</div>
			<div class="products-wrap">
				
				<div id="content">
								<h1 align="center"><?php echo $_GET['subcatname'];?> Produits</h1>
								<hr />
					<section class="products">
						
<?php
$pscid=intval($_GET['pscid']);                 
$ret=mysqli_query($con,"select * from products where subCategory='$pscid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?><article>
							<a href="single-product.php?pid=<?php  echo $row['id'];?>"><img src="admin/productimages/<?php echo $row['productImage1'];?>" height="150" alt=""></a>
							<h3><a href="single-product.php?pid=<?php  echo $row['id'];?>"><?php echo $row['productName'];?></a></h3>
							<h4><a href="single-product.php?pid=<?php  echo $row['id'];?>"><?php echo $row['productPrice'];?> TND</a></h4>
											<?php if($_SESSION['jsmsuid']==""){?>
							<a href="login.php" class="btn-grey">Ajouter au Panier</a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="pid" value="<?php echo $row['id'];?>">   
<button type="submit" name="submit" class="btn-grey">Ajouter au Panier</button>
  </form> 
<?php } ?>
<div style="margin-top:4%;">
<?php if($_SESSION['jsmsuid']==""){?>
							<a href="login.php" class="btn-grey">+ liste d'envies</a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="wpid" value="<?php echo $row['id'];?>">   
<button type="submit" name="wsubmit" class="btn-grey">+ liste d'envies</button>
  </form> 
</div>
<?php } ?>
						

						</article>
						<?php } ?>
						
						
						
						
						
					</section>
				</div>
				<!-- / content -->
			</div>
	
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
