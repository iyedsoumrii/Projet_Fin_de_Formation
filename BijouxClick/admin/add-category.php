<?php session_start();
include_once('includes/config.php');
//For Adding categories
if(isset($_POST['submit']))
{
$category=$_POST['category'];
$description=$_POST['description'];
$createdby=$_SESSION['aid'];
$sql=mysqli_query($con,"insert into category(categoryName,categoryDescription,createdBy) values('$category','$description','$createdby')");
echo "<script>alert('Catégorie ajoutée avec succès');</script>";
echo "<script>window.location.href='manage-categories.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Bijoux Click - Ajouter une catégorie</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ajouter une catégorie</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                            <li class="breadcrumb-item active">Ajouter une catégorie</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post">                                
<div class="row">
<div class="col-2">Nom de la catégorie</div>
<div class="col-4"><input type="text" placeholder="Entrez le nom de la catégorie"  name="category" class="form-control" required></div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Description de la catégorie</div>
<div class="col-4"><textarea placeholder="Enter category Name"  name="description" class="form-control" required></textarea></div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Enregistrer</button></div>
</div>

</form>
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
