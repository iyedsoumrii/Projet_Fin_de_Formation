<?php
session_start();
session_unset();
session_destroy();

?>
<script language="javascript">
    alert("<?php echo "Vous avez été déconnecté avec succès"; ?>");
document.location="index.php";
</script>
