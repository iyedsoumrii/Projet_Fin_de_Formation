<?php
session_start();
error_reporting(0);
include_once('includes/config.php');

if (isset($_POST['submit'])) {
    $orderid = $_GET['oid'];
    $ressta = "Commande annulée";
    $remark = mysqli_real_escape_string($con, $_POST['restremark']);
    $canclbyuser = 1;

    // Insert cancellation data using prepared statement
    $stmt = mysqli_prepare($con, "INSERT INTO tbltracking(OrderId, remark, status, OrderCanclledByUser) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "issi", $orderid, $remark, $ressta, $canclbyuser);

    if (mysqli_stmt_execute($stmt)) {
        // Update order status
        $updateQuery = mysqli_query($con, "UPDATE tblorderaddresses SET OrderFinalStatus='$ressta' WHERE Ordernumber='$orderid'");
        
        if ($updateQuery) {
            echo '<script>alert("Votre commande a été annulée avec succès.")</script>';
            echo "<script>window.location.href='my-orders.php'</script>";
        } else {
            echo '<script>alert("Quelque chose s\'est mal passé lors de la mise à jour de la commande. Veuillez réessayer.")</script>';
        }
    } else {
        echo '<script>alert("Quelque chose s\'est mal passé lors de l\'annulation de la commande. Veuillez réessayer.")</script>';
    }
}

// Check for GET parameter existence
if (isset($_GET['oid'])) {
    $orderid = $_GET['oid'];
    $query = mysqli_query($con, "SELECT Ordernumber, Status FROM tblorderaddresses WHERE Ordernumber='$orderid'");
    $num = mysqli_num_rows($query);
    $cnt = 1;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Annulation de commande</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
<div style="margin-left:50px;">
    <?php
    if (isset($orderid)) {
        $query = mysqli_query($con, "SELECT Ordernumber, Status FROM tblorderaddresses WHERE Ordernumber='$orderid'");
        $num = mysqli_num_rows($query);
        $cnt = 1;
        ?>

        <table border="1" cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
            <tr align="center">
                <th colspan="4">Annuler la commande <?php echo $orderid; ?></th>
            </tr>
            <tr>
                <th>Numéro de commande</th>
                <th>Statut actuel</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($orderid); ?></td>
                    <td><?php
                        $status = $row['Status'];
                        if (empty($status)) {
                            echo "En attente de confirmation";
                        } else {
                            echo htmlspecialchars($status);
                        }
                        ?></td>
                </tr>
                <?php
            } ?>
        </table>

        <?php if (empty($status) || $status == "Commande confirmée") { ?>
            <form method="post">
                <table>
                    <tr>
                        <th>Motif de l'annulation</th>
                        <td><textarea name="restremark" placeholder="" rows="12" cols="50" class="form-control wd-450"
                                      required="true"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><button type="submit" name="submit"
                                                              class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">Mettre
                                à jour la commande
                            </button></td>
                    </tr>
                </table>
            </form>
        <?php } else { ?>
            <?php if ($status == 'Order Cancelled') { ?>
                <p style="color:red; font-size:20px;">Commande annulée</p>
            <?php } else { ?>
                <p style="color:red; font-size:20px;">Vous ne pouvez pas annuler ceci. La commande est en cours de livraison
                    ou déjà livrée</p>
            <?php } ?>
        <?php } ?>
    <?php } else {
        echo "Identifiant de commande manquant.";
    } ?>
</div>
</body>
</html>
