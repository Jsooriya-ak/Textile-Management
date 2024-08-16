<?php
include("ses.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Textile management system</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .home-main
    {
        background-image:url("../images/bg3.png");
        background-repeat:no-repeat;
        background-size:100% 100%;
        background-attachment:fixed;
        height:100vh;
        width:100%;
    }
    h1
    {
        
        text-align:center;
       
    }
</style>
</head>
<body class="home-main">
    <?php
    include("header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<h3 class="text-center text-white">All Products</h3>
<table class="table table-bordered">
    <tr class="table-primary">
        <th>S.No</th>
        <th>Product name</th>
        <th>Price</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Update Quantity</th>
    </tr>
<?php
include("../db.php");
$id=$_SESSION["uid"];
$sql="select * from supplier_products where supplier_id=$id order by pid desc";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        ?>
        <tr class="bg-white">
            <td><?=$i?></td>
            <td><?=$row["name"]?></td>
            <td><?=$row["price"]?>&#8377;</td>
            <td><?=$row["brand"]?></td>
            <td><?=$row["category"]?></td>
            <td><?=$row["quantity"]?></td>
        <td>
            <a href="edit_products.php?id=<?=$row['pid']?>" class="btn btn-success">Edit</a>
            <a href="delete_products.php?id=<?=$row['pid']?>" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        <?php
        $i++;
    }
}
?>
</table>
            </div>
        </div>
    </div>
</body>
</html>