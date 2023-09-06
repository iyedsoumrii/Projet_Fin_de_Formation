<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['jsmsuid']==0)) {
  header('location:logout.php');
  } else{ 

    ?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="fr"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Bijoux Click - Détails de commande</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
		<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>

	<?php include_once('includes/header.php');?>

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="Index.php">Accueil</a></li>
				<li>Détails de commande</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="cart-table">
					<h3>
#<?php echo $oid=$_GET['orderid'];?> Détails de commande
    </h3>

    <?php
//Getting Url
$link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 

// Getting order Details
$userid= $_SESSION['jsmsuid'];
$ret=mysqli_query($con,"select OrderTime,Status from tblorderaddresses where UserId='$userid' and Ordernumber='$oid'");
while($result=mysqli_fetch_array($ret)) {
?>

<p style="color:#000"><b>Numéro de commande #</b><?php echo $oid?></p>
<p style="color:#000"><b>Date de  commande : </b><?php echo $od=$result['OrderTime'];?></p>
<p style="color:#000"><b>Statut de commande :</b> <?php if($result['Status']==""){
    echo "Non acceptée encore";
} else {
echo $result['Status'];
}?> &nbsp;&nbsp;&nbsp;

<a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo $oid;?>');" title="Track order" style="color:white" class="btn-grey">  Suivi de commande
</a></p>

<?php } ?>
<!-- Invoice -->
<p>
 <a href="javascript:void(0);" onClick="popUpWindow('invoice.php?oid=<?php echo $oid;?>&&odate=<?php echo $od;?>');" title="Order Invoice" style="color:white" class="btn-grey">Facture</a></p>
 <br>
					<table>
						<tr>
							<th>ID de commande</th>
							<th class="items">Articles</th>
							<th class="price">Prix</th>
							<th class="total">Livraison</th>
							<th class="qnt">Quantité</th>
							<th class="total">Total</th>
							<th>Méthode de paiement</th>
						</tr>
						<?php 
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"select products.id,products.productName,products.shippingCharge,products.productDescription,products.productPrice,products.productImage1,orders.id,orders.UserId,orders.PId,orders.IsOrderPlaced,orders.OrderNumber,orders.PaymentMethod from orders join products on products.id=orders.PId where orders.UserId='$userid' and orders.OrderNumber=$oid");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
 

?>
						<tr>
							<td><?php echo $row['OrderNumber'];?></td>
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
							<td class="price"><?php  echo $row['PaymentMethod'];?></td>
			
						</tr><?php $cnt++; } }?>
					</table>
				</div>

				<div class="total-count">
					<h4>Sous-total:<?php  echo $totprice;?> TND</h4>
					<p>+Livraison<?php  echo $shippingtotal;?> TND</p>
					<h3>Total à payer:<strong><?php echo $grandtotal;?> TND</strong></h3>
					<a href="javascript:void(0);" onClick="popUpWindow('cancelorder.php?oid=<?php echo $oid;?>');" title="Cancel this order" style="color:white" class="btn-grey">Annuler cette commande </a>
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
