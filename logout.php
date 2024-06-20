<?php
session_start();
session_destroy();
?>
<script language="javascript">
    alert("You have successfully logged out");
    document.location="login.php";
</script>