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
        background-attachment: fixed;
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
    $sql2="select * from workers where id=".$_GET["id"];
    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5 mb-5" style="background-color:rgba(255,255,255,0.9);">
                    <div class="card-body">
                <h3 class="text-primary text-center my-1">Edit worker details</h3>
                <form method="post" action="" autocomplete="off">
                <div class="form-group">
                            <label for="email">Name:</label>
                            <input type="text" class="form-control" name="name" value="<?=$row2['name']?>" placeholder="Enter name" id="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Worker id:</label>
                            <input type="text" value="<?=$row2['worker_id']?>" readonly class="form-control" name="worker_id" placeholder="Enter worker id" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" value="<?=$row2['email']?>" name="email" placeholder="Enter email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Phone:</label>
                            <input type="number" class="form-control" value="<?=$row2['phone']?>" name="phone" placeholder="Enter phone" id="pwd" required>
                        </div>
                        
                        <button type="submit" name="update_worker" class="btn btn-primary btn-block">Update Worker details</button>
                </form>
                
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php
if(isset($_POST["update_worker"]))
{
    $name=htmlspecialchars($_POST["name"]);
    $email=htmlspecialchars($_POST["email"]);
    $phone=htmlspecialchars($_POST["phone"]);
    include("../db.php");
    $sql="update workers set name='$name',email='$email',phone='$phone' where id=".$_GET["id"];
    
        if(mysqli_query($con,$sql))
        {
            echo "<script>alert('Worker details updated successfully');window.location.replace(window.location.href);</script>";
        }
        else
        {
            echo "<script>alert('Error to update worker details');window.location.replace(window.location.href);</script>";
        }
    
}
?>
</body>
</html>