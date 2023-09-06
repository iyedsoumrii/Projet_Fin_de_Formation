<?php
session_start();
include_once('includes/config.php');
error_reporting(0);

// Pour ajouter des catégories
if (isset($_POST['submit'])) {
  $oid = $_GET['orderid'];
  $ressta = $_POST['status'];
  $remark = $_POST['restremark'];

  $query = mysqli_query($con, "INSERT INTO tbltracking(OrderId, remark, status) VALUES ('$oid','$remark','$ressta')"); 
  $query = mysqli_query($con, "UPDATE tblorderaddresses SET Status='$ressta', Remark='$remark' WHERE Ordernumber='$oid'");

  if ($query) {
    echo '<script>alert("La commande a été mise à jour.")</script>';
    echo "<script type='text/javascript'> document.location ='all-order.php'; </script>";
  } else {
    echo '<script>alert("Une erreur s\'est produite. Veuillez réessayer.")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Bijoux Click - Voir les commandes</title>
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
  <link href="css/styles.css" rel="stylesheet" />
  <script src="js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include_once('includes/header.php'); ?>
  <div id="layoutSidenav">
    <?php include_once('includes/sidebar.php'); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Voir les commandes</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
            <li class="breadcrumb-item active">Voir les commandes</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              <?php
              $oid = $_GET['orderid'];
              $ret = mysqli_query($con, "SELECT * FROM tblorderaddresses JOIN users ON users.id=tblorderaddresses.UserId WHERE tblorderaddresses.Ordernumber='$oid'");
              $cnt = 1;
              while ($row = mysqli_fetch_array($ret)) {
              ?>
                <table class="table table-bordered data-table">
                  <tr align="center">
                    <td colspan="4" style="font-size:20px;color:blue">Détails de l'utilisateur</td>
                  </tr>
                  <tr>
                    <th>Numéro de commande</th>
                    <td><?php echo $row['Ordernumber']; ?></td>
                    <th>Prénom</th>
                    <td><?php echo $row['FirstName']; ?></td>
                  </tr>
                  <tr>
                    <th>Nom de famille</th>
                    <td><?php echo $row['LastName']; ?></td>
                    <th>Email</th>
                    <td><?php echo $row['Email']; ?></td>
                  </tr>
                  <tr>
                    <th>Numéro de téléphone</th>
                    <td><?php echo $row['MobileNumber']; ?></td>
                    <th>Numéro d'appartement / bâtiment</th>
                    <td><?php echo $row['Flatnobuldngno']; ?></td>
                  </tr>
                  <tr>
                    <th>Nom de la rue</th>
                    <td><?php echo $row['StreetName']; ?></td>
                    <th>Zone</th>
                    <td><?php echo $row['Area']; ?></td>
                  </tr>
                  <tr>
                    <th>Point de repère</th>
                    <td><?php echo $row['Landmark']; ?></td>
                    <th>Ville</th>
                    <td><?php echo $row['City']; ?></td>
                  </tr>
                  <tr>
                    <th>Statut final de la commande</th>
                    <td>
                      <?php  
                      $orserstatus = $row['Status'];
                      if ($row['Status'] == "Commande confirmée") {
                        echo "Commande confirmée";
                      }
                      if ($row['Status'] == "Récupération") {
                        echo "Les bijoux ont été récupérés";
                      }
                      if ($row['Status'] == "En cours") {
                        echo "Les bijoux sont en cours de livraison";
                      }
                      if ($row['Status'] == "Livrée") {
                        echo "Les bijoux ont été livrés";
                      }
                      if ($row['Status'] == "") {
                        echo "Attendez l'approbation du magasin";
                      }
                      if ($row['Status'] == "Commande annulée") {
                        echo "Commande annulée";
                      }
                      ?>
                    </td>
                    <th>Date de commande</th>
                    <td><?php echo $row['OrderTime']; ?></td>
                  </tr>
                </table>

                <table class="table table-bordered data-table">
                  <tr align="center">
                    <td colspan="4" style="font-size:20px;color:blue">Détails de la commande</td>
                  </tr> 
                  <tr>
                    <th>#</th>
                    <th>Image du produit</th>
                    <th>Nom du produit</th>
                    <th>Méthode de paiement</th>
                    <th>Prix</th>
                    <th>Livraison</th>
                    <th>Total</th>
                  </tr>
                  <?php  
                  $oid = $_GET['orderid'];
                  $query = mysqli_query($con, "SELECT products.id, products.productName, products.shippingCharge, products.productDescription, products.productPrice, products.productImage1, orders.id, orders.UserId, orders.PId, orders.IsOrderPlaced, orders.OrderNumber, orders.PaymentMethod FROM orders JOIN products ON products.id=orders.PId WHERE orders.IsOrderPlaced='1' AND orders.OrderNumber=$oid");
                  $num = mysqli_num_rows($query);
                  $cnt = 1;
                  while ($row1 = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td><?php echo $cnt; ?></td>
                      <td><img src="productimages/<?php echo $row1['productImage1']; ?>" width="60" height="40" alt="<?php echo $row1['productName'] ?>"></td>
                      <td><?php echo $row1['productName']; ?></td>
                      <td><?php echo $row1['PaymentMethod']; ?></td>
                      <td><?php echo $price = $row1['productPrice']; ?></td>
                      <?php
                      $totprice += $price;
                      $cnt = $cnt + 1;
                      ?>
                      <td><?php echo $shipping = $row1['shippingCharge']; ?></td>
                      <?php
                      $shippingtotal += $shipping;
                      $cnt = $cnt + 1;
                      ?>
                      <td class="total"><?php echo $total = $totprice + $shippingtotal; ?></td>
                      <?php
                      $grandtotal += $total;
                      $cnt = $cnt + 1;
                      ?>
                    </tr>
                  <?php
                  }
                  ?>
                  <tr>
                    <td colspan="6" align="right"><b>Tarif d'expédition:</b></td>
                    <td><?php echo $shippingtotal; ?></td>
                  </tr>
                  <tr>
                    <td colspan="6" align="right"><b>Total:</b></td>
                    <td><?php echo $grandtotal; ?></td>
                  </tr>
                </table>

              <?php } ?>
              <form name="submit" method="post">
                <table class="table table-bordered data-table">
                  <tr align="center">
                    <td colspan="2" style="font-size:20px;color:blue">Mettre à jour le statut de la commande</td>
                  </tr>
                  <tr>
                    <th>Statut de la commande</th>
                    <td>
                      <select name="status" class="form-control wd-450" required="true">
                        <option value="">Sélectionner le statut de la commande</option>
                        <option value="Commande récupérer">Commande à récupérer</option>
                        <option value="en cours de livraison">Commande en cours de livraison</option>
                        <option value="Commande livrée">Commande livrée</option>
                        <option value="Commande annulée">Commande annulée</option>
                        <option value="Commande confirmée">Commande confirmée</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th>Remarque</th>
                    <td><textarea name="restremark" class="form-control wd-450" required="true"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                      <button type="submit" name="submit" class="btn btn-primary" style="cursor:pointer">Mettre à jour</button>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
      </main>
      <?php include_once('includes/footer.php'); ?>
    </div>
  </div>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
</body>
</html>
