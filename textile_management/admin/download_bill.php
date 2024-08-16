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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
    <div class="container" id="content">
        <h3 class="text-center text-dark my-4">Cash Receipt</h3>
        <hr>
        <p>Shop : Hema's Textiles</p>
        <p>Address : seeman straight road,mohan street,chennai.</p>
        <p>Date : <?=date('d-m-Y')?></p>
        <p>Invoice no : <?=$_GET['id']?></p>
        <hr>
        <table class="table">
        <?php
       include("../db.php");
       $sql="select * from products inner join invoice on products.pid=invoice.product_id where invoice.invoice_id=".$_GET["id"]." order by in_id desc ";
       $result=mysqli_query($con,$sql);
       $total=0;
       if(mysqli_num_rows($result)>0)
       {
        while($row=mysqli_fetch_assoc($result))
        {
            $total+=$row["quantity"]*$row["price"];
            ?>
            <tr>
                <td><?=$row['name']?></td>
                <td><?=$row["price"]?></td>
                <td>X</td>
                <td><?=$row["quantity"]?></td>
                <td><?=$row["quantity"]*$row["price"]?>&#8377;</td>
            </tr>
            <?php
        }
       }
        ?>
        </table>
        <p class="text-right" style="margin-right:100px;">
           <b>Total : <?=$total?>&#8377;</b>
        </p>
        <div>
        <button onclick="fun(this)" id="one2" class="btn btn-success">Print</button>
        <a href="bill_download.php" id="two2" class="btn btn-primary">Go to Home</a>
        </div>
    </div>

<script>
  function fun(a)
  {
    a.style.display="none";
    document.getElementById("two2").style.display="none";
    window.print();
    window.location.replace(window.location.href);
  }
</script>
</body>
</html>