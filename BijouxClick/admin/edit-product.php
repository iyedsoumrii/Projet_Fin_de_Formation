<?php
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    // Pour l'ajout de produits
    if (isset($_POST['submit'])) {
        $pid = intval($_GET['id']);
        $category = $_POST['category'];
        $subcat = $_POST['subcategory'];
        $productname = $_POST['productName'];
        $productweight = $_POST['productweight'];
        $productprice = $_POST['productprice'];
        $productdescription = $_POST['productDescription'];
        $productscharge = $_POST['productShippingcharge'];
        $productavailability = $_POST['productAvailability'];
        $updatedby = $_SESSION['aid'];

        // Préparer la requête SQL en utilisant des instructions préparées
        $stmt = mysqli_prepare($con, "UPDATE products SET category=?, subCategory=?, productName=?, productweight=?, productPrice=?, productDescription=?, shippingCharge=?, productAvailability=?, lastUpdatedBy=? WHERE id=?");

        // Lier les paramètres à l'instruction préparée
        mysqli_stmt_bind_param($stmt, "sssssssssi", $category, $subcat, $productname, $productweight, $productprice, $productdescription, $productscharge, $productavailability, $updatedby, $pid);

        // Exécuter l'instruction préparée
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>alert('Détails du produit mis à jour avec succès');</script>";
            echo "<script>window.location.href='manage-products.php'</script>";
        } else {
            echo "Erreur : " . mysqli_error($con); // Afficher le message d'erreur à des fins de débogage
        }

        // Fermer l'instruction préparée
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Bijoux Click - Mettre à jour les produits</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script>
            function getSubcat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_subcat.php",
                    data: 'cat_id=' + val,
                    success: function(data) {
                        $("#subcategory").html(data);
                    }
                });
            }
        </script>   
    </head>
    <body>
        <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
            <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Mettre à jour les produits</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                            <li class="breadcrumb-item active">Mettre à jour les produits</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php 
                                $pid = intval($_GET['id']);
                                $query = mysqli_query($con, "select products.id as pid,products.productImage1,products.productName,category.categoryName,subcategory.subcategoryName as subcatname,products.postingDate,products.updationDate,subcategory.id as subid,tbladmin.UserName,category.id as catid,products.productweight,products.productPrice,products.productAvailability,products.productDescription,products.shippingCharge,gender from products join subcategory on products.subCategory=subCategory.id join category on products.category=category.id join tbladmin on tbladmin.ID=products.addedBy where  products.id='$pid' order by pid desc");
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>                                 
                                <form method="post" enctype="multipart/form-data">                                
                                    <div class="row">
                                        <div class="col-2">Nom de catégorie</div>
                                        <div class="col-6">
                                            <select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
                                                <option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['categoryName']);?></option> 
                                                <?php 
                                                $ret=mysqli_query($con,"select * from category");
                                                while($result=mysqli_fetch_array($ret))
                                                {
                                                ?>
                                                <option value="<?php echo $result['id'];?>"><?php echo $result['categoryName'];?></option>
                                                <?php 
                                                } 
                                                ?>
                                            </select>    
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Nom de sous-catégorie</div>
                                        <div class="col-6">
                                            <select name="subcategory" id="subcategory" class="form-control" required>
                                                <option value="<?php echo htmlentities($row['subid']);?>"><?php echo htmlentities($row['subcatname']);?></option>
                                            </select>
                                        </div>
                                    </div>
                    
                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Nom du produit</div>
                                        <div class="col-6">
                                            <input type="text" name="productName" value="<?php echo htmlentities($row['productName']);?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Poids du produit</div>
                                        <div class="col-4">
                                            <input type="text" name="productweight" placeholder="Entrer le poids du produit" class="form-control" required value="<?php echo htmlentities($row['productweight']);?>">
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Prix du produit après remise (Prix de vente)</div>
                                        <div class="col-6">
                                            <input type="text" name="productprice" value="<?php echo htmlentities($row['productPrice']);?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Description du produit</div>
                                        <div class="col-6">
                                            <textarea name="productDescription" placeholder="Entrer la description du produit" rows="6" class="form-control"><?php echo $row['productDescription'];?></textarea>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Frais de livraison du produit</div>
                                        <div class="col-6">
                                            <input type="text" name="productShippingcharge" value="<?php echo htmlentities($row['shippingCharge']);?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Disponibilité du produit</div>
                                        <div class="col-6">
                                            <select name="productAvailability" id="productAvailability" class="form-control" required>
                                                <?php 
                                                $pa=$row['productAvailability'];
                                                if($pa=='En stock'):
                                                ?>
                                                <option value="En stock">En stock</option>
                                                <option value="En rupture de stock">En rupture de stock</option>
                                                <?php else: ?>
                                                <option value="En rupture de stock">En rupture de stock</option>    
                                                <option value="En stock">En stock</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Sexe</div>
                                        <div class="col-4">
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option value="<?php echo htmlentities($row['gender']);?>"><?php echo htmlentities($row['gender']);?></option>
                                                <option value="Homme">Homme</option>
                                                <option value="Femme">Femme</option>
                                                <option value="Enfants">Enfants</option>
                                                <option value="Unisexe">Unisexe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Image vedette du produit</div>
                                        <div class="col-6">
                                            <img src="productimages/<?php echo htmlentities($row['productImage1']);?>" width="250"><br />
                                            <a href="change-image1.php?id=<?php echo $row['pid'];?>">Changer l'image</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2">
                                            <button type="submit" name="submit" class="btn btn-primary">Mettre à jour</button>
                                        </div>
                                    </div>

                                </form>

                                <?php 
                                } 
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
