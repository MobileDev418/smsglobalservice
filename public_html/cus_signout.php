<?php
session_start();
/* File destroys custoomer session */
session_destroy();
header("Location:index.php");
?>
