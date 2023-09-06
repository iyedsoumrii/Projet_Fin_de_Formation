<?php
session_start();

include_once 'includes/config.php';
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bijoux Click - suivi de commande</title>
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>

<div style="margin-left:50px;">
<?php  

$orderid=intval($_GET['oid']);
$ret=mysqli_query($con,"select tbltracking.OrderCanclledByUser,tbltracking.remark,tbltracking.status as bstatus,tbltracking.StatusDate from tbltracking where tbltracking.OrderId ='$orderid'");
$cnt=1;


 ?>
<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="4" >Historique de suivi de la commande #<?php echo  $orderid;?></th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remarque</th>
<th>Statut</th>
<th>Heure</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  $cancelledby=$row['OrderCanclledByUser'];
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['remark'];?></td> 
  <td><?php  echo $row['bstatus']; 
if($cancelledby==1){
echo "("."Par le client".")";
} else {

echo "("."Par l'admin".")";
}

  ?></td> 
   <td><?php  echo $row['StatusDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
     
     <p >
      <input name="Submit2" type="submit" class="txtbox4" value="Close" onClick="return f2();" style="cursor: pointer;"  />   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  /></p>
</div>

</body>
</html>

     