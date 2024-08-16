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
        background-image:url("images/bg.jpg");
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

    include("../db.php");
    $sql2="select * from products where pid=".$_GET["id"];
    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-4" style="background-color:rgba(255,255,255,0.9);">
                    <div class="card-body">
                <h3 class="text-primary text-center my-1">Edit Products</h3>
                <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pwd" class="text-dark">Name:</label>
                    <input type="text" class="form-control" value="<?=$row2['name']?>" name="name" autocomplete="off" placeholder="Enter name" id="pwd" required>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Price:</label>
                    <input type="number" class="form-control" value="<?=$row2['price']?>" name="price" autocomplete="off" placeholder="Enter price" id="pwd" required>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Brand:</label>
                    <select name="brand" class="form-control" required>
                        <option value="H&M" <?php if($row2["brand"]=="H&M") { echo "selected"; } ?>>H&M</option>
                        <option value="Levis" <?php if($row2["brand"]=="Levis") { echo "selected"; } ?>>Levis</option>
                        <option value="Forever New" <?php if($row2["brand"]=="Forever New") { echo "selected"; } ?>>Forever New</option>
                        <option value="Westside" <?php if($row2["brand"]=="Westside") { echo "selected"; } ?>>Westside</option>
                        <option value="Nike" <?php if($row2["brand"]=="Nike") { echo "selected"; } ?>>Nike</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Category:</label>
                    <input type="text" class="form-control" value="<?=$row2['category']?>" name="category" placeholder="Enter category name" id="pwd" required>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Quantity:</label>
                    <input type="number" class="form-control" value="<?=$row2['quantity']?>" name="quantity" placeholder="Enter quantity" id="pwd" required>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Description:</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Enter description" id="pwd" required><?=$row2['description']?></textarea>
                </div>
                <div class="form-group">
                    <label for="pwd" class="text-dark">Choose Image:</label>
                    <input type="file" class="form-control" name="myimage" id="pwd" required>    
                </div>
                <button type="submit" name="edit_product" class="btn btn-primary btn-block">Update Product</button>
                </form>
                
                </div>
                </div>
            </div>
        </div>
    </div>
<?php
if(isset($_POST["edit_product"]))
{
    $id=$_GET["id"];
    $name=$_POST["name"];
    $price=$_POST["price"];
    $brand=$_POST["brand"];
    $category=$_POST["category"];
    $quantity=$_POST["quantity"];
    $description=$_POST["description"];
    $upload_dir="products/";
    $upload_file=$upload_dir.basename($_FILES["myimage"]["name"]);

    if(strstr($upload_file,".jpg") || strstr($upload_file,".jpeg") || strstr($upload_file,".png") || strstr($upload_file,".webp"))
    {
        if(move_uploaded_file($_FILES["myimage"]["tmp_name"],$upload_file))
        {
            include("../db.php");     
            $sql="update products set name='$name',price=$price,brand='$brand',category='$category',
            quantity=$quantity,description='$description',myimage='$upload_file' where pid=$id";
            if(mysqli_query($con,$sql))
            {
                echo "<script>alert('Products updated successfully');window.location.replace(window.location.href);</script>";
            }
            else
            {
                echo "<script>alert('Error to update a product');window.location.replace(window.location.href);</script>";
            }
        }
        else
        {
            echo "<script>alert('Error to upload image file');</script>";
        }
    }
    else
    {
        echo "<script>alert('Please upload image format only...');</script>";
    }

   include("../db.php");

}
?>
</body>
</html>