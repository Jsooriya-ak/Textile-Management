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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
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
<form action="" method="post">
    <div class="container">
    <h3 class="text-center text-primary mt-3">View Bills</h3>
    <form method="post" action="">
<div class="form-group">
    <label>Choose a month:</label>
    <input type="date" class="form-control" required name="month">
</div>
<input type="submit" name="submit" class="btn btn-warning" value="Submit">

<button id="dwnldBtn" type="button" class="btn btn-success float-right">Download Excel Sheet</button>
</form>
        <div class="row">
            <div class="col-md-12">
   <table class="my-3 table table-bordered" id="dataTable">
    <tr class="table-primary">
        <th>S.No</th>
        <th>Product name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Brand</th>
        <th>Invoice id</th>
        <th>Total Amount</th>
        <th id="two2">View Bills</th>
    </tr>
<?php
include("../db.php");
$sql="select * from products inner join invoice on products.pid=invoice.product_id order by in_id desc";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        if(isset($_POST["submit"]))
        {
            $month=$_POST["month"];
            $m=substr($month,5,2);
            $y=substr($month,0,4);

            $m2=substr($row["created_at"],5,2);
            $y2=substr($row["created_at"],0,4);
            if($m==$m2 && $y==$y2)
            {
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['price']?>&#8377;</td>
            <td><?=$row['category']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['brand']?></td>
            <td><?=$row["invoice_id"]?></td>
            <td><?=$row['price']*$row['quantity']?>&#8377;</td>
            <td class="two3"><a href="download_bill.php?id=<?=$row['invoice_id']?>">View bills</a></td>
        </tr>
        <?php
        $i++;
            }
        }
    }
}
?>
   </table>

</div>
</div>
            
        </div>
    </div>
    </form>
    <script>
        $(document).ready(function () {
            $('#dwnldBtn').on('click', function () {
                $("#two2,.two3").remove();
                $("#dataTable").table2excel({
                    filename: "employeeData.xls"
                });
                window.location.replace(window.location.href);
            });
        });
    </script>
</body>
</html>