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
        height:90vh;
        width:100%;
    }
    h3
    {
        font-family:verdana;       
    }
    body
    {
        background-color:lightgray;
    }
</style>
</head>
<body>
    <?php
    include("header.php");
    ?>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-4">
                    <div class="card-body">
                    <h4 class="text-primary text-center">Supplier Signup Form</h4>
                    <form action="" method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="email">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" id="email" required>
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
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Signup</button>
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
    $pass2=md5(htmlspecialchars($_POST["password"]));
    include("db.php");
    $sql="select * from user where email='$email'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        echo "<script>alert('Email already exists');</script>";
    }
    else
    {
        $sql="insert into user (name,email,phone,password) values ('$name','$email','$phone','$pass2')";
        if(mysqli_query($con,$sql))
        {
            echo "<script>alert('User Registered successfully');</script>";
        }
        else
        {
            echo "<script>alert('Error to register');</script>";
        }
    }
}
?>

</body>
</html>