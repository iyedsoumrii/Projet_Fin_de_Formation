<?php
session_start();
$_SESSION['alogin']=="";
session_unset();
// session_destroy();
$_SESSION['errmsg']="Vous avez réussi à vous déconnecter";
?>
<script language="javascript">
document.location="index.php";
</script>
