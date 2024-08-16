<?php
include("db.php");

if(isset($_POST["feedback"]))
{
    $name=htmlspecialchars($_POST["name"]);
    $email=htmlspecialchars($_POST["email"]);
    $phone=htmlspecialchars($_POST["phone"]);
    $message=htmlspecialchars($_POST["message"]);

    $sql="insert into travel_feedback (name,email,phone,message) values ('$name','$email','$phone','$message')";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('feedback submitted successfully');window.location.replace('contact.php');</script>";
    }
    else
    {
        echo "<script>alert('Error to submit a feedback form');window.location.replace('contact.php');</script>";
    }
}
?>