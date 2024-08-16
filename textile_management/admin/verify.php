<?php
include("../db.php");

//add packages start
if(isset($_POST["add_packages"]))
{
    $pname=htmlspecialchars($_POST["name"]);
    $days=htmlspecialchars($_POST["days"]);
    $price=htmlspecialchars($_POST["price"]);
    $description=addslashes(htmlspecialchars($_POST["description"]));
    $transport=htmlspecialchars($_POST["transport"]);
    $food=htmlspecialchars($_POST["food"]);
    
    $upload_dir="packages/";
    $upload_file=$upload_dir.basename($_FILES["myimage"]["name"]);
    if(strstr($upload_file,".webp") || strstr($upload_file,".jpg") || strstr($upload_file,".jpeg") || strstr($upload_file,".png"))
    {
        if(move_uploaded_file($_FILES["myimage"]["tmp_name"],$upload_file))
        {
            $sql="insert into travel_package (pname,days,price,description,transport,food,myimage) values ('$pname','$days',
            '$price','$description','$transport','$food','$upload_file')";
            if(mysqli_query($con,$sql))
            {
                echo "<script>alert('packages add successfully');window.location.replace('packages.php');</script>";
            }
            else
            {
                echo "<script>alert('Error to add packages');window.location.replace('packages.php');</script>";
                echo mysqli_error($con);
            }
        }
        else
        {
            echo "<script>alert('Error to upload image files');window.location.replace('packages.php');</script>";
        }
    }
    else
    {
        echo "<script>alert('Please upload image files only');window.location.replace('packages.php');</script>";
    }

}
//add packages stop


//add hotels start
if(isset($_POST["add_hotels"]))
{
    $hotel_name=htmlspecialchars($_POST["hotel_name"]);
    $district=htmlspecialchars($_POST["district"]);
    $per_day=htmlspecialchars($_POST["per_day"]);
    $description=addslashes(htmlspecialchars($_POST["description"]));
   
    $upload_dir="hotels/";
    $upload_file=$upload_dir.basename($_FILES["myimage"]["name"]);
    if(strstr($upload_file,".webp") || strstr($upload_file,".jpg") || strstr($upload_file,".jpeg") || strstr($upload_file,".png"))
    {
        if(move_uploaded_file($_FILES["myimage"]["tmp_name"],$upload_file))
        {
            $sql="insert into travel_hotels (hotel_name,district,per_day,description,myimage) values ('$hotel_name','$district',
            $per_day,'$description','$upload_file')";
            if(mysqli_query($con,$sql))
            {
                echo "<script>alert('Hotels add successfully');window.location.replace('view_hotels.php');</script>";
            }
            else
            {
                echo "<script>alert('Error to add Hotels');window.location.replace('view_hotels.php');</script>";
                echo mysqli_error($con);
            }
        }
        else
        {
            echo "<script>alert('Error to upload image files');window.location.replace('packages.php');</script>";
        }
    }
    else
    {
        echo "<script>alert('Please upload image files only');window.location.replace('packages.php');</script>";
    }

}
//add hotels stop


//add trains start
if(isset($_POST["add_trains"]))
{
    $from_place=htmlspecialchars($_POST["from_place"]);
    $to_place=htmlspecialchars($_POST["to_place"]);
    $start_time=htmlspecialchars($_POST["start_time"]);
    $reached_time=htmlspecialchars($_POST["reached_time"]);
    $coach_type=htmlspecialchars($_POST["coach_type"]);
    $price=htmlspecialchars($_POST["price"]);
    $train_name=htmlspecialchars($_POST["train_name"]);
    $train_date=htmlspecialchars($_POST["train_date"]);
   
            $sql="insert into travel_trains (from_place,to_place,start_time,reached_time,coach_type,price,train_name,
            train_date) values ('$from_place','$to_place','$start_time','$reached_time','$coach_type',$price,'$train_name','$train_date')";
            if(mysqli_query($con,$sql))
            {
                echo "<script>alert('Trains add successfully');window.location.replace('view_trains.php');</script>";
            }
            else
            {
                echo "<script>alert('Error to add Trains');window.location.replace('view_trains.php');</script>";
                echo mysqli_error($con);
            }
      

}
//add trains stop
?>