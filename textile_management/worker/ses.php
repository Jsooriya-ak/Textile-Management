<?php
session_start();
if(!isset($_SESSION["wid"]))
{
    echo "<script>window.location.replace('../worker.php');</script>";
}
?>