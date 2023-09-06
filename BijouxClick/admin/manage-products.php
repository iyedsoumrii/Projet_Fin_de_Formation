<?php
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from subcategory where id = '" . $_GET['id'] . "'");
        echo "<script>alert('Données supprimées');</script>";
        echo "<script>window.location.href='manage-products.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bijoux Click - Gérer les produits</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <?php include_once('includes/header.php'); ?>
    <div id="layoutSidenav">
        <?php include_once('includes/sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Gérer les produits</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                        <li class="breadcrumb-item active">Gérer les produits</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Détails des produits
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom du produit</th>
                                        <th>Catégorie</th>
                                        <th>Sous-catégorie</th>
                                        <th>Date de création</th>
                                        <th>Dernière mise à jour</th>
                                        <th>Créé par</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom du produit</th>
                                        <th>Sous-catégorie</th>
                                        <th>Catégorie</th>
                                        <th>Date de création</th>
                                        <th>Dernière mise à jour</th>
                                        <th>Créé par</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "select products.id as pid,products.productImage1,products.productName,category.categoryName,subcategory.subcategoryName as subcatname,products.postingDate,products.updationDate,subcategory.id as subid,tbladmin.username from products join subcategory on products.subCategory=subCategory.id join category on products.category=category.id join tbladmin on tbladmin.ID=products.addedBy order by pid desc");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td>
                                                <img src="productimages/<?php echo htmlentities($row['productImage1']); ?>" width="120">
                                                <?php echo htmlentities($row['productName']); ?>
                                            </td>
                                            <td><?php echo htmlentities($row['categoryName']); ?></td>
                                            <td><?php echo htmlentities($row['subcatname']); ?></td>
                                            <td><?php echo htmlentities($row['postingDate']); ?></td>
                                            <td><?php echo htmlentities($row['updationDate']); ?></td>
                                            <td><?php echo htmlentities($row['username']); ?></td>
                                            <td>
                                                <a href="edit-product.php?id=<?php echo $row['pid'] ?>"><i class="fas fa-edit"></i></a> |
                                                <a href="manage-products.php?id=<?php echo $row['subid'] ?>&del=delete" onClick="return confirm('Êtes-vous sûr de vouloir supprimer ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once('includes/footer.php'); ?>
            </footer>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
