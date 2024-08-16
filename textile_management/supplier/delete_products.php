<?php
$id=$_GET["id"];
include("../db.php");
$sql="delete from supplier_products where pid=$id";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Products deleted successfully');window.location.replace('view_products.php');</script>";
}
else
{
    echo "<script>alert('Error to delete a product');window.location.replace('view_products.php');</script>";
}
?>