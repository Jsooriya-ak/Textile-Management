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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
<form action="verify2.php" method="post">
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
        <th>Price</th>
    </tr>
<?php
if(isset($_POST["submit2"]))
{
include("../db.php");
$b=$_POST["choosed_options"];
$i=1;
$amount=0;
foreach($b as $a)
{
$sql="select * from products where pid=$a";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    $row=mysqli_fetch_assoc($result);
    $amount+=$row["price"];
        ?>
    <tr>
        <td><?=$i?></td>
        <td><?=$row['name']?><input type="hidden" name="pid[]" value="<?=$row['pid']?>"></td>
        <td><span  class="one<?=$i?>"><?=$row["price"]?></span>&#8377;</td>
        <td><input type="number" name="quantity[]" class="a<?=$i?>" onkeyup="fun2(this.value,<?=$i?>)"></td>
        <td><span class="two<?=$i?>"><?=$row['price']?></span>&#8377;</td>
    </tr>
        <?php
    $i++;
}
else
{

}
}
?>
   
</table>
<span class='myprice2 d-none'><?=$amount?></span>
<!--<h6 class="text-right">Total : <span class='myprice'><?=$amount?></span>&#8377;</h6>-->
</div>
</div>
            
        </div>
    </div>
    </form>
<?php

   
}
?>
<script>
       function fun2(a,b)
       {
        var sapps=".two"+b.toString();
        var f=$(sapps).text();
        if(a!="")
        {
        var price=".one"+b.toString();
        var pr=parseInt($(price).text());
        var total=pr*a;
        
        $(sapps).text(total);
        }
        else
        {
            var price=".one"+b.toString();
            var pr=parseInt($(price).text());
            $(sapps).text(pr); 
        }
       }
</script>
</body>
</html>