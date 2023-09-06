<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'bijouxclick');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno())
{
 echo "Échec de la connexion à MySQL :" . mysqli_connect_error();
}
?>