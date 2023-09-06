<?php
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    // Pour mettre à jour les sous-catégories
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $subcat = $_POST['subcategory'];
        $id = intval($_GET['id']);
        $sql = mysqli_query($con, "update subcategory set categoryid='$category',subcategoryName='$subcat' wheid='re $id'");
        echo "<script>alert('Sous-catégorie mise à jour avec succès');</script>";
        echo "<script>window.location.href='manage-subcategories.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Bijoux Click - Modifier une sous-catégorie</title>
    <link href="css/styles.css" rel="stylesheet"/>
    <script src="js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once('includes/header.php'); ?>
    <div id="layoutSidenav">
        <?php include_once('includes/sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Modifier une sous-catégorie</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Modifier une sous-catégorie</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php
                            $id = intval($_GET['id']);
                            $query = mysqli_query($con, "select category.id,category.categoryName,subcategory.subcategoryName from subcategory join category on category.id=subcategory.categoryid where subcategory.id='$id'");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <form method="post">
                                    <div class="row">
                                        <div class="col-2">Nom de la catégorie</div>
                                        <div class="col-4">
                                            <select name="category" class="form-control" required>
                                                <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($catname = $row['categoryName']); ?></option>
                                                <?php
                                                $ret = mysqli_query($con, "select * from category");
                                                while ($result = mysqli_fetch_array($ret)) {
                                                    $cat = $result['categoryName'];
                                                    if ($catname == $cat) {
                                                        continue;
                                                    } else {
                                                        ?>
                                                        <option value="<?php echo $result['id']; ?>"><?php echo $result['categoryName']; ?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">Nom de la sous-catégorie</div>
                                        <div class="col-4">
                                            <input type="text" value="<?php echo  htmlentities($row['subcategoryName']);?>"  name="subcategory" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2">
                                            <button type="submit" name="submit" class="btn btn-primary">Mettre à jour</button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
