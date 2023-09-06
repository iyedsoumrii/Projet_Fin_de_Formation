<?php
session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_GET['id'])) {
        $catid = $_GET['id'];
        mysqli_query($con, "DELETE FROM category WHERE id = '$catid'");
        echo "<script>alert('Données supprimées');</script>";
        echo "<script>window.location.href='manage-categories.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bijoux Click - Gérer les catégories</title>
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
                    <h1 class="mt-4">Gérer les catégories</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                        <li class="breadcrumb-item active">Gérer les catégories</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Détails des catégories
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Catégorie</th>
                                        <th>Description</th>
                                        <th>Date de création</th>
                                        <th>Dernière mise à jour</th>
                                        <th>Créé par</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Catégorie</th>
                                        <th>Description</th>
                                        <th>Date de création</th>
                                        <th>Dernière mise à jour</th>
                                        <th>Créé par</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "SELECT category.id as catid,category.categoryName,category.categoryDescription,category.creationDate,category.updationDate,tbladmin.username FROM category JOIN tbladmin ON tbladmin.id=category.createdBy");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td><?php echo htmlentities($row['categoryName']); ?></td>
                                            <td><?php echo htmlentities($row['categoryDescription']); ?></td>
                                            <td> <?php echo htmlentities($row['creationDate']); ?></td>
                                            <td><?php echo htmlentities($row['updationDate']); ?></td>
                                            <td><?php echo htmlentities($row['username']); ?></td>
                                            <td>
                                                <a href="edit-category.php?id=<?php echo $row['catid'] ?>"><i class="fas fa-edit"></i></a> |
                                                <a href="manage-categories.php?id=<?php echo $row['catid'] ?>&del=delete" onClick="return confirm('Êtes-vous sûr de vouloir supprimer ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <?php $cnt = $cnt + 1;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
<?php ?>
