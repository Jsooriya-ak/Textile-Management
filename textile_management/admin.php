<?php
session_start();
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
                    <h4 class="text-primary text-center">Admin Login</h4>
                    <form action="" method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd" required>
                        </div>
                        <button type="submit" name="alogin" class="btn btn-primary btn-block">Login</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
if(isset($_POST["alogin"]))
{
    $email=htmlspecialchars($_POST["email"]);
    $password=md5(htmlspecialchars($_POST["password"]));
    include("db.php");
    $sql="select * from admin where email='$email' and password='$password'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
       $row=mysqli_fetch_assoc($result);
       $_SESSION["aid"]=$row["id"];
       echo "<script>window.location.replace('admin/index.php');</script>";
    }
    else
    {
        echo "<script>alert('Email or password incorrect');</script>";
    }
}
?>

</body>
</html>