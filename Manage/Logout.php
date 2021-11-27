<?php
    require_once "../databased.php";
    session_destroy();
    header("Location: ../index.php");
?>