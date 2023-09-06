<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
//For Adding Products
if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    $subcat=$_POST['subcategory'];
    $productname=$_POST['productName'];
    $productweight=$_POST['productweight'];
    $productprice=$_POST['productprice'];
    $productdescription=$_POST['productDescription'];
    $productscharge=$_POST['productShippingcharge'];
    $productavailability=$_POST['productAvailability'];
    $gender=$_POST['gender'];
    $productimage1=$_FILES["productimage1"]["name"];
$extension1 = substr($productimage1,strlen($productimage1)-4,strlen($productimage1));
//Renaming the  image file
$imgnewfile1=md5($productimage1.time()).$extension1;
$addedby=$_SESSION['aid'];


    move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/".$imgnewfile1);
$sql=mysqli_query($con,"insert into products(category,subCategory,productName,productweight,productPrice,productDescription,shippingCharge,productAvailability,productImage1,gender,addedBy) values('$category','$subcat','$productname','$productweight','$productprice','$productdescription','$productscharge','$productavailability','$imgnewfile1','$gender','$addedby')");
echo "<script>alert('Product Added added successfully');</script>";
echo "<script>window.location.href='manage-products.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        
        <title>Bijoux Click - Ajouter un produit</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
   <script>
function getSubcat(val) {
    $.ajax({
    type: "POST",
    url: "get_subcat.php",
    data:'cat_id='+val,
    success: function(data){
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
                        <h1 class="mt-4">Ajouter un produit</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                            <li class="breadcrumb-item active">Ajouter un produit</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post" enctype="multipart/form-data">                                
<div class="row">
<div class="col-2">Nom de la catégorie</div>
<div class="col-4">
<select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
<option value="">Sélectionnez une catégorie</option> 
<?php $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
<?php } ?>
</select>    
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Nom de sous-catégorie</div>
<div class="col-4"><select   name="subcategory"  id="subcategory" class="form-control" required>
</select>
</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-2">Nom du produit</div>
<div class="col-4"><input type="text" name="productName"  placeholder="Entrez le nom" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Poids du produit</div>
<div class="col-4"><input type="text" name="productweight"  placeholder="Entrez le poids" class="form-control" required>

</div>
</div>



<div class="row" style="margin-top:1%;">
<div class="col-2">Prix du produit</div>
<div class="col-4"><input type="text"    name="productprice"  placeholder="Enter le prix" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Description du produit</div>
<div class="col-4"><textarea  name="productDescription"  placeholder="Enter la Description" rows="6" class="form-control"></textarea>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Frais de livraison</div>
<div class="col-4"><input type="text"    name="productShippingcharge"  placeholder="Entrez les frais" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Disponibilité du produit</div>
<div class="col-4"><select   name="productAvailability"  id="productAvailability" class="form-control" required>
<option value="">Sélectionner</option>
<option value="In Stock">En Stock</option>
<option value="Out of Stock">Hors Stock</option>
</select>
</select>
</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-2">Genre</div>
<div class="col-4"><select   name="gender"  id="gender" class="form-control" required>
<option value="">Choisir le genre</option>
<option value="Homme">Homme</option>
<option value="Femme">Femme</option>
<option value="Enfant">Enfant</option>
<option value="Unisexe">Unisexe</option>
</select>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-2">Image du produit</div>
<div class="col-4"><input type="file" name="productimage1" id="productimage1"  class="form-control" accept="image/*" title="Accepter uniquement les images" required>
</div>
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
<?php } ?>
