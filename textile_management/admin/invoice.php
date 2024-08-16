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
<form action="create_invoice.php" method="post">
    <div class="container">
    <h3 class="text-center text-primary mt-3">Create Invoice
        <input type="submit" name="submit2" class="btn float-right btn-warning">
    </h3>
        <div class="row">
            <div class="col-md-12">
<table class="table table-primary">
    <tr>
        <th>S.No</th>
        <th>Product name</th>
        <th>Product price</th>
        <th>Quantity</th>
        <th>Product select</th>
    </tr>
<?php
include("../db.php");
$sql="select * from products";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        ?>
    <tr>
        <td><?=$i?></td>
        <td><?=$row['name']?></td>
        <td><?=$row["price"]?>&#8377;</td>
        <td><?=$row["quantity"]?></td>
        <td><input type="checkbox" name="choosed_options[]" value="<?=$row['pid']?>"></td>
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
    </div>
    </form>
</body>
</html>