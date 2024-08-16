<?php
session_start();
include("../db.php");
if(isset($_POST["add_attendance"]))
{
    $mdate=$_POST["mdate"];
    $category=$_POST["category"];
    $attendance_time=$_POST["attendance_time"];
    $worker_id=$_SESSION["wid"];
   include("../db.php");
   if($category=="In time")
   {
        $sql="insert into attendance values (NULL,$worker_id,'$mdate','$category','$attendance_time','')";
        if(mysqli_query($con,$sql))
        {
        echo "<script>alert('In time added successfully');window.location.replace('add_attendance.php');</script>";
        }
        else
        {
        echo "<script>alert('Error to add a In time');window.location.replace('add_attendance.php');</script>";
        }
   }
   if($category=="Out time")
   {
        $sql="update attendance set out_time='$attendance_time' where worker_id=$worker_id and mdate='$mdate'";
        if(mysqli_query($con,$sql))
        {
        echo "<script>alert('Out time added successfully');window.location.replace('add_attendance.php');</script>";
        }
        else
        {
        echo "<script>alert('Error to add a Out time');window.location.replace('add_attendance.php');</script>";
        }
   }
   
}
?>