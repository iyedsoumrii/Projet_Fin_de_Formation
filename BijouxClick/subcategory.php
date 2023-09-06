<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="fr"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Bijoux Click - Sous-catégorie</title>
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
				<li>Sous-Catégories de Bijoux</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<div id="body">
		<div class="container">
			<h1 align="center">Catégorie <?php echo $_GET['catname'];?></h1>
		<hr />
			<section class="quick-links">
				<?php
				$scid=$_GET['scid'];

                    
$ret=mysqli_query($con,"select subcategory.id as subcid, subcategory.categoryid,subcategory.subcategoryName,category.categoryName,category.categoryDescription from subcategory join category on category.id=subcategory.categoryid where subcategory.categoryid='$scid'");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
				<article style="background-image: url(images/2.jpg)">
					<a href="product-subcategory.php?pscid=<?php  echo $row['subcid'];?>&&subcatname=<?php  echo $row['subcategoryName'];?>" class="table">
						<div class="cell">
							<div class="text">
								<h4><?php  echo $row['categoryName'];?></h4>
								<hr>
								<h3><?php  echo $row['subcategoryName'];?></h3>
							</div>
						</div>
					</a>
				</article><?php }} else{ ?>
<p style="color:red; font-size:22px; text-align:center;">Aucun enregistrement trouvé</p>
<?php } ?>
				
			</section>


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
