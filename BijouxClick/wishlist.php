<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['jsmsuid']==0)) {
  header('location:logout.php');
  } else{ 

  	if(isset($_POST['submit']))
{
$pid=$_POST['pid'];
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"insert into orders(UserId,PId) values('$userid','$pid') ");
if($query)
{
	$query=mysqli_query($con,"delete from wishlist where UserId='$userid' && ProductId='$pid'");
 echo "<script>alert('Le bijou a été ajouté au panier');</script>";
 echo "<script type='text/javascript'> document.location ='cart.php'; </script>";   
} else {
 echo "<script>alert('Quelque chose s\'est mal passé.');</script>";      
}
}
// Code for deleting product from wishlist
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from wishlist where id='$rid'");
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'wishlist.php'</script>";     
}
    ?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="fr"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Bijoux Click - Wishlist</title>
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
				<li><a href="dashboard.php">Accueil</a></li>
				<li>Liste d'envies</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="cart-table">
					<table>
						<tr>
						<th class="items">Articles</th>
						<th class="price">Prix</th>
						<th class="total">Livraison</th>
						<th class="qnt">Quantité</th>
						<th class="total">Total</th>
						<th class="delete">Supprimer</th>
						<th class="Panier">Panier</th>
						</tr>
						<?php 
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"select products.id as pid,products.productName,products.shippingCharge,products.productDescription,products.productPrice,products.productImage1,wishlist.id,wishlist.UserId,wishlist.ProductId,wishlist.postingDate  from wishlist join products on products.id=wishlist.ProductId where wishlist.UserId='$userid'");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
 

?>
						<tr>
							<td class="items">
								<div class="image">
									<img src="admin/productimages/<?php echo $row['productImage1'];?>" height="150" alt="">
								</div>
								<h3><a href="#"><?php  echo $row['productName'];?></a></h3>
								<p><?php  echo $row['productDescription'];?>.</p>
							</td>
							<td class="price"><?php  echo $price=$row['productPrice'];?></td>
							<?php 
$totprice+=$price;
$cnt=$cnt+1; 
                           
 ?>
							<td class="price"><?php  echo $shipping=$row['shippingCharge'];?></td>
							<?php 
$shippingtotal+=$shipping;
$cnt=$cnt+1; 
                           
 ?>
							<td class="qnt">1</td>
							<td class="total"><?php  echo $total=$price+$shipping;?></td>
							
							<?php 
$grandtotal+=$total;
$cnt=$cnt+1; 
                           
 ?>
							<td class="delete"><a href="wishlist.php?delid=<?php echo $row['id'];?>" class="ico-del" onclick="return confirm('Voulez-vous vraiment supprimer ?');"></a></td>

							<td><?php if($_SESSION['jsmsuid']==""){?>
							<a href="login.php" class="btn-grey">Ajouter</a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="pid" value="<?php echo $row['pid'];?>">   
<button type="submit" name="submit" class="btn-grey">Ajouter</button>
  </form> 
<?php } ?></td>
						</tr><?php $cnt++; } } else {?>
							<tr>
								<td colspan="7" style="text-align:center;color:red;font-size:20px;">Liste d'envies est vide</td>
							</tr>
						<?php } ?>
					</table>
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
