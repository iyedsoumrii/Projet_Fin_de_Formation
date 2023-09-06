<?php
// Démarrer la session pour utiliser les variables de session
session_start();

// Désactiver les rapports d'erreur pour une utilisation en production
error_reporting(0);

// Inclure le fichier de configuration
include_once('includes/config.php');

// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de déconnexion
if (strlen($_SESSION['jsmsuid'] == 0)) {
    header('location:logout.php');
} else { 
    // Code pour supprimer un produit du panier
    if(isset($_GET['delid'])) {
        $rid = intval($_GET['delid']);
        $query = mysqli_query($con, "delete from orders where id='$rid'");
        echo "<script>alert('Données supprimées');</script>"; 
        echo "<script>window.location.href = 'cart.php'</script>";     
    }
}
?>

<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="fr"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Bijoux Click - Panier</title>
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
                <li>Panier</li>
            </ul>
        </div>
    </div>

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
                            <th class="delete"></th>
                        </tr>
                        <?php 
                        $userid = $_SESSION['jsmsuid'];
                        $query = mysqli_query($con,"select products.id,products.productName,products.shippingCharge,products.productDescription,products.productPrice,products.productImage1,orders.id,orders.UserId,orders.PId,orders.IsOrderPlaced from orders join products on products.id=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
                        $num = mysqli_num_rows($query);
                        if($num > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td class="items">
                                <div class="image">
                                    <img src="admin/productimages/<?php echo $row['productImage1'];?>" height="150" alt="">
                                </div>
                                <h3><a href="#"><?php  echo $row['productName'];?></a></h3>
                                <p><?php  echo $row['productDescription'];?>.</p>
                            </td>
                            <td class="price"><?php  echo $price = $row['productPrice'];?></td>
                            <?php 
                            $totprice += $price;
                            $cnt = $cnt + 1; 
                            ?>
                            <td class="price"><?php  echo $shipping = $row['shippingCharge'];?></td>
                            <?php 
                            $shippingtotal += $shipping;
                            $cnt = $cnt + 1; 
                            ?>
                            <td class="qnt">1</td>
                            <td class="total"><?php  echo $total = $price + $shipping;?></td>
                            <?php 
                            $grandtotal += $total;
                            $cnt = $cnt + 1; 
                            ?>
                            <td class="delete">
                                <a href="cart.php?delid=<?php echo $row['id'];?>" class="ico-del" onclick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
                            </td>
                        </tr>
                        <?php $cnt++; } } else { ?>
                            <tr>
                                <td colspan="7" style="text-align:center;color:red;font-size:20px;">Panier est vide</td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <?php if($num > 0): ?>
                    <div class="total-count">
                        <h4>Sous-total: <?php  echo $totprice;?> TND</h4>
                        <p>+Livraison: <?php  echo $shippingtotal;?> TND</p>
                        <h3>Total à payer: <?php echo $grandtotal;?> TND</h3>
                        <a href="checkout.php" class="btn-grey">Finaliser et payer</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include_once('includes/footer.php');?>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php ?>
