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
    $sql2="select * from workers order by id desc limit 1";
    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $total=$row2["worker_id"]+1;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5 mb-5" style="background-color:rgba(255,255,255,0.9);">
                    <div class="card-body">
                <h3 class="text-primary text-center my-1">Add workers</h3>
                <form method="post" action="" autocomplete="off">
                <div class="form-group">
                            <label for="email">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" id="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Worker id:</label>
                            <input type="text" value="<?=$total?>" readonly class="form-control" name="worker_id" placeholder="Enter worker id" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Phone:</label>
                            <input type="number" class="form-control" name="phone" placeholder="Enter phone" id="pwd" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Add Workers</button>
                </form>
                
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php
if(isset($_POST["submit"]))
{
    $name=htmlspecialchars($_POST["name"]);
    $email=htmlspecialchars($_POST["email"]);
    $phone=htmlspecialchars($_POST["phone"]);
    $worker_id=htmlspecialchars($_POST["worker_id"]);
    $pass2=md5(htmlspecialchars($_POST["password"]));
    include("../db.php");
    $sql="select * from workers where email='$email'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        echo "<script>alert('Email already exists');</script>";
    }
    else
    {
        $sql="insert into workers (name,email,phone,password,worker_id) values ('$name','$email','$phone','$pass2',
        '$worker_id')";
        if(mysqli_query($con,$sql))
        {
            echo "<script>alert('Workers Added successfully');window.location.replace(window.location.href);</script>";
        }
        else
        {
            echo "<script>alert('Error to add workers');window.location.replace(window.location.href);</script>";
        }
    }
}
?>
</body>
</html>