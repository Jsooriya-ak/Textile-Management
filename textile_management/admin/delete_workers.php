<?php
$id=$_GET["id"];
include("../db.php");
$sql="delete from workers where id=$id";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Worker deleted successfully');window.location.replace('view_workers.php');</script>";
}
else
{
    echo "<script>alert('Error to delete a worker');window.location.replace('view_workers.php');</script>";
}
?>