<?php
session_start();
session_destroy();
unset($_SESSION['admin']);
echo "<script>window.location.href='../register.php'</script>";
?>