<?php

include('../inc/connection.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST["email"];
	$password=$_POST["password"];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
}

$sql="select * from login where E_mail='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$db_user_id=$row['User_id'];
$db_user_name=$row['User_name'];
$db_user_password=$row['Password'];
$db_user_address=$row['Address'];
$db_user_pincode=$row['Pincode'];
$db_user_phone=$row['Phone_number'];
$db_user_email=$row['E_mail'];
$db_user_img=$row['Image'];

session_start();

if(isset($_SESSION['uname'])){
    header("location: home.php");
}
else{
    if(password_verify($password,$db_user_password)){
        $_SESSION['user_id']=$db_user_id;
        $_SESSION['user_name']=$db_user_name;
        $_SESSION['user_address']=$db_user_address;
        $_SESSION['user_pincode']=$db_user_pincode;
        $_SESSION['user_phone']=$db_user_phone;
        $_SESSION['user_email']=$db_user_email;
        $_SESSION['user_image']=$db_user_img;
        header("location: home.php");
    }
    else{
        header("location: /Foodies_Eatery/");
    }
}

?>