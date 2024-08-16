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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<h3 class="text-center text-primary">View attendance
</h3>
<form method="post" action="">
<div class="form-group">
    <label>Choose a month:</label>
    <input type="date" class="form-control" required name="month">
</div>
<div class="form-group">
    <label>Enter Worker name:</label>
    <input type="text" class="form-control" name="name" required>
</div>
<input type="submit" name="submit" class="btn btn-warning" value="Submit">

<button id="dwnldBtn" type="button" class="btn btn-success float-right">Download Excel Sheet</button>
</form>
<table class="table table-bordered mt-3" id="dataTable">
    <tr class="table-primary">
        <th>S.No</th>
        <th>Worker name</th>
        <th>Worker email</th>
        <th>Date</th>
        <th>In time</th>
        <th>Out time</th>
    </tr>
<?php
include("../db.php");
$sql="select * from workers inner join attendance on workers.id=attendance.worker_id";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        if(isset($_POST["submit"]))
        {
            $month=$_POST["month"];
            $name=$_POST["name"];
            $m=substr($month,5,2);
            $y=substr($month,0,4);

            $m2=substr($row["mdate"],5,2);
            $y2=substr($row["mdate"],0,4);
            if($m==$m2 && $y==$y2 && $row["name"]==$name)
            {
                
           
        ?>
        <tr class="bg-white">
            <td><?=$i?></td>
            <td><?=$row["name"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=$row["mdate"]?></td>
            <td><?=$row["in_time"]?></td>
            <td><?=$row["out_time"]?></td>
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
    <script>
        $(document).ready(function () {
            $('#dwnldBtn').on('click', function () {
                $("#dataTable").table2excel({
                    filename: "employeeData.xls"
                });
            });
        });
    </script>
</body>
</html>