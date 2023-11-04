<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$gender = $_POST['gender'];
$position = $_POST['position'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$cv= $_POST['cv'];
$image = $_POST['image'];
$password = $_POST['password'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$gender = stripslashes($gender);
$gender = addslashes($gender);
$position = stripslashes($position);
$position= addslashes($position);
$email = stripslashes($email);
$email = addslashes($email);
$college = stripslashes($college);
$college = addslashes($college);
$mob = stripslashes($mob);
$mob = addslashes($mob);


$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);


$cv = addslashes(file_get_contents($_FILES['cv']['tmp_name']));
                                $cv_name = addslashes($_FILES['cv']['name']);
                                $cv_size = getimagesize($_FILES['cv']['tmp_name']);

                                move_uploaded_file($_FILES["cv"]["tmp_name"], "upload/" . $_FILES["cv"]["name"]);
                                $locate= "upload/" . $_FILES["cv"]["name"];


//image
                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];


$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$gender' , '$position' , '$college','$email' ,'$mob','$locate','$cv_name','$location', '$password')");
if($q3)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

header("location:account.php?q=1");
}
else
{
header("location:index.php?q7=Email Already Registered!!!");
}
ob_end_flush();
?>