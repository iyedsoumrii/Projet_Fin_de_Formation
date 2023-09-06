<header id="header">
    <div class="container">
        <a href="index.php" class="logo">
            <img src="images/bijouxclicklogo.png">
            <strong style="font-size: 20px;text-align: center;text-shadow: 2px 2px #D9D9D9, 3px 3px #AFAFAF;font-family: Impact, Charcoal, sans-serif;color: #222222;"> Bijoux Click </strong>
        </a>
        <div class="right-links">
            <ul>
                <?php if (strlen($_SESSION['jsmsuid']>0)) {?>
                <li>
                    <?php
                    $userid = $_SESSION['jsmsuid'];
                    $ret2 = mysqli_query($con,"select sum(products.shippingCharge+products.productPrice) as total,COUNT(orders.PId) as totalp from orders join products on products.id=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
                    $resultss = mysqli_fetch_array($ret2);
                    ?>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
                    <a href="cart.php"><i class="fa-solid fa-wallet fa-xl"></i> <?php echo $resultss['total'];?> TND</a>
                </li>
                <li><a href="wishlist.php"><i class="fa-solid fa-heart fa-xl"></i> Liste d'envies</a></li>
                <li><a href="profile.php"><i class="fa-solid fa-user fa-xl"></i> Mon profil</a></li>
                <li><a href="my-orders.php"><i class="fa-solid fa-basket-shopping fa-xl"></i> Mes commandes</a></li>
                <li><a href="change-password.php"><i class="fa-solid fa-gear fa-xl"></i> Paramètres</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-xl"></i> Déconnexion</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</header>

<nav id="menu">
    <div class="container">
        <div class="trigger"></div>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="about.php">À propos</a></li>
            <li><a href="products.php">Produits</a></li>
            <li><a href="category.php">Catégories</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if (strlen($_SESSION['jsmsuid']==0)) {?>
            <li><a href="signup.php">S'inscrire</a></li>
            <li><a href="login.php">Se connecter</a></li>
            <?php }?>
        </ul>
    </div>
</nav>