<?php
include("ses.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Quality Assurance Cell Activity Maintainance</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    body
    {
        background-image:url("images/bg.jpg");
        background-repeat:no-repeat;
        background-size:100% 100%;
        height:100vh;
        width:100%;
    }
    h1
    {
        
        text-align:center;
       
    }
</style>
</head>
<body>
    <?php
    include("header.php");

    include("../db.php");
    $sql="select count(*) as total from products";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    
    $sql="select count(*) as total from user";
    $result=mysqli_query($con,$sql);
    $row2=mysqli_fetch_assoc($result);
    
    $sql="select count(*) as total from workers";
    $result=mysqli_query($con,$sql);
    $row3=mysqli_fetch_assoc($result);
    
    $sql="select count(*) from invoice group by invoice_id";
    $result=mysqli_query($con,$sql);
    $a=0;
    while($row4=mysqli_fetch_assoc($result))
    {
        //print_r($row4);
        $a++;
    }


    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-4">
                <div class="card text-white" style="background-color:rgb(255,193,7);">
                    <div class="card-body text-center">
                        <h3>Products <br><?=$row["total"]?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card text-white" style="background-color:rgb(175,243,90);">
                    <div class="card-body text-center">
                        <h3>User <br><?=$row2["total"]?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card text-white" style="background-color:rgb(253,36,0)">
                    <div class="card-body text-center">
                        <h3>Workers <br><?=$row3["total"]?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card text-white" style="background-color:rgb(114,52,252);">
                    <div class="card-body text-center">
                        <h3>Bills <br><?=$a?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>