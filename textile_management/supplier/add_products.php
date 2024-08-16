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
            <div class="col-md-6 offset-md-3">
                <div class="card my-4" style="background-color:rgba(255,255,255,0.9);">
                    <div class="card-body">
                <h3 class="text-primary text-center my-1">Add Products</h3>
                <form method="post" action="">
                <div class="form-group">
                    <label for="pwd" class="text-dark">Name:</label>
                    <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Enter name" id="pwd" required>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Price:</label>
                    <input type="number" class="form-control" name="price" autocomplete="off" placeholder="Enter price" id="pwd" required>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Brand:</label>
                    <select name="brand" class="form-control" required>
                        <option value="H&M">H&M</option>
                        <option value="Levis">Levis</option>
                        <option value="Forever New">Forever New</option>
                        <option value="Westside">Westside</option>
                        <option value="Nike">Nike</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Category:</label>
                    <input type="text" class="form-control" name="category" placeholder="Enter category name" id="pwd" required>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Quantity:</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" id="pwd" required>
                </div>
                <button type="submit" name="add_product" class="btn btn-primary btn-block">Add Product</button>
                </form>
                
                </div>
                </div>
            </div>
        </div>
    </div>
<?php
if(isset($_POST["add_product"]))
{
    $name=$_POST["name"];
    $price=$_POST["price"];
    $brand=$_POST["brand"];
    $category=$_POST["category"];
    $quantity=$_POST["quantity"];
    $supplier_id=$_SESSION["uid"];
   include("../db.php");
   $sql="insert into supplier_products (name,price,brand,category,quantity,supplier_id) values ('$name',$price,'$brand','$category',
   $quantity,$supplier_id)";
   if(mysqli_query($con,$sql))
   {
    echo "<script>alert('Products added successfully');</script>";
   }
   else
   {
    echo "<script>alert('Error to add a product');</script>";
   }
}
?>
</body>
</html>