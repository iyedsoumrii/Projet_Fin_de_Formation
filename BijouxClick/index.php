<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit'])) {
    $pid = $_POST['pid'];
    $userid = $_SESSION['jsmsuid'];
    $query = mysqli_query($con, "INSERT INTO orders(UserId,PId) VALUES ('$userid','$pid')");
    
    if($query) {
        echo "<script>alert('Le bijou ont été ajouté au panier');</script>";
        echo "<script type='text/javascript'> document.location ='cart.php'; </script>";   
    } else {
        echo "<script>alert('Quelque chose s\'est mal passé.');</script>";      
    }
}

if(isset($_POST['wsubmit'])) {
    $wpid = $_POST['wpid'];
    $userid = $_SESSION['jsmsuid'];
    $query = mysqli_query($con, "INSERT INTO wishlist(UserId,ProductId) VALUES ('$userid','$wpid')");
    
    if($query) {
        echo "<script>alert('Le bijou a été ajouté à liste de souhaits.');</script>";
        echo "<script type='text/javascript'> document.location ='wishlist.php'; </script>";   
    } else {
        echo "<script>alert('Quelque chose s\'est mal passé.');</script>";      
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bijoux Click - Page d'accueil</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" media="all" href="css/style.css">
</head>
<body>
    <?php include_once('includes/header.php');?>

    <div id="slider">
        <ul>
            <li style="background-image: url(images/background0.jpg)">
                <h3>NOS DIAMANTS</h3>
                <h2>SONT GARANTIS A VIE</h2>
            </li>
            <li class="red" style="background-image: url(images/background1.jpg)">
                <h3>Veux-tu devenir ma femme ?</h3>
                <h2>bagues de fiançailles</h2>
            </li>
            <li class="yellow" style="background-image: url(images/background2.jpg)">
                <h3>Tu mérites d'être belle</h3>
                <h2>Pendentifs en or</h2>
            </li>
        </ul>
    </div>

    <div id="body">
        <div class="container">
            <div class="last-products">
                <h2>Derniers produits ajoutés</h2>
                <section class="products">
                    <?php
                    $ret = mysqli_query($con, "SELECT * FROM products ORDER BY id DESC LIMIT 10");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <article>
                        <a href="single-product.php?pid=<?php echo $row['id']; ?>">
                            <img src="admin/productimages/<?php echo $row['productImage1']; ?>" width="250" height="60%" alt="">
                        </a>
                        <h6><?php echo $row['productName']; ?></h6>
                        <h4><?php echo $row['productPrice']; ?> TND</h4>
                        <?php if($_SESSION['jsmsuid'] == "") { ?>
                            <a href="login.php" class="btn-add">J'achète</a>
                        <?php } else { ?>
                            <form method="post"> 
                                <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">   
                                <button type="submit" name="submit" class="btn-grey">J'achète</button>
                            </form> 
                        <?php } ?>
                    </article>
                    <?php } ?>
                </section>
            </div>

            <section class="quick-links">
                <div class="last-products">
                    <h2>Catégories de bijoux</h2>
                    <?php				
                    $ret = mysqli_query($con, "SELECT * FROM category");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <article style="background-image: url(images/2.jpg); width: 360px !important; margin-top:1%;">
                        <a href="subcategory.php?scid=<?php echo $row['id']; ?>&amp;catname=<?php echo $row['categoryName']; ?>" class="table">
                            <div class="cell">
                                <div class="text">
                                    <h4><?php echo $row['categoryName']; ?></h4>
                                    <hr>
                                    <h3><?php echo $row['categoryDescription']; ?></h3>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>

    <?php include_once('includes/footer.php');?>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
