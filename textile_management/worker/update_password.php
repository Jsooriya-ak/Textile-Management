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
        background-image:url("../images/bg3.png");
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
            <div class="col-md-6 offset-md-3">
                <div class="card my-4" style="background-color:rgba(255,255,255,0.9);">
                    <div class="card-body">
                <h3 class="text-primary text-center my-1">Update password</h3>
                <form method="post" action="">
                <div class="form-group">
                            <label for="pwd" class="text-dark">New Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd" required>
                        </div>
                        <button type="submit" name="update_password" class="btn btn-primary">Update Password</button>
                </form>
                
                </div>
                </div>
            </div>
        </div>
    </div>
<?php
if(isset($_POST["update_password"]))
{
    $password=md5(htmlspecialchars($_POST["password"]));
    include("../db.php");
    $sql="update workers set password='$password' where id=".$_SESSION["wid"];
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('Password changed successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error to change a password');</script>";
    }
}
?>
</body>
</html>