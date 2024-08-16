<?php
if(isset($_POST["submit2"]))
{
   $pid=$_POST["pid"];
   $quantity=$_POST["quantity"];
   $r=rand(100000,999999);
   include("../db.php");
   $total=count($pid);
   for($i=0;$i<$total;$i++)
   {
    $product_id=$pid[$i];
    $quantity2=$quantity[$i];
    
    $sql2="select * from products where pid=$product_id";
    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $less1=$row2["quantity"]-$quantity2;

    $sql3="update products set quantity=$less1 where pid=$product_id";
    if(mysqli_query($con,$sql3))
    {

    }

        $sql="insert into invoice (product_id,quantity,invoice_id) values ($product_id,$quantity2,'$r')";
        if(mysqli_query($con,$sql))
        {

        }
        else
        {
            
        }
   }
   echo "<script>alert('bill generated successfully');window.location.replace('download_bill.php?id=$r');</script>";
    
}
?>