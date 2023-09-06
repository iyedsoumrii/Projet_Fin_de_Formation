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
	<title>Bijuox Click - Mes commandes</title>
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
				<li><a href="index.php">Accueil</a></li>
				<li>Mes commandes</li>
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
                                    <th>#</th>
                                <th>ID de commande</th>
                                <th>Date et heure de commande</th>
                                <th>Statut de la commande</th>
                                <th>Suivi de la commande</th>
                                <th>Voir les détails</th>
                                </tr>
					<tr>
                                    <?php
                                   $userid= $_SESSION['jsmsuid'];
 $query=mysqli_query($con,"select * from  tblorderaddresses  where UserId='$userid'");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>
               <tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row['Ordernumber'];?></td>
<td><p><b>Date de la commande :</b> <?php echo $row['OrderTime']?></p></td>  
<td><?php $status=$row['Status'];
if($status==''){
 echo "En attente de confirmation";   
} else{
echo $status;
}

                                                    ?>  </td>   
<td><li class="list-inline-item"><i class="fa fa-motorcycle"></i> 
<?php    

$link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
?>
 <a  href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['Ordernumber']);?>');" title="Suivre la commande">Suivre la commande</a></li></td>
<td><a href="order-detail.php?orderid=<?php echo $row['Ordernumber'];?>" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">Voir les détails</a></td>       
</tr><?php $cnt++; } ?>
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
