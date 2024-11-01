<?php

session_start();
include('../inc/connection.php');
$_SESSION['message'] = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] == $_POST['confirm_password']) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $pin = $_POST['pin'];
        $phone = $_POST['phone'];
        $password=$_POST['password']; 
        $password = password_hash($password, PASSWORD_DEFAULT);

        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        $address = mysqli_real_escape_string($conn, $address);
        $pin = mysqli_real_escape_string($conn, $pin);
        $phone = mysqli_real_escape_string($conn, $phone);

        $sql = "INSERT INTO `login`(`User_name`, `Password`, `Address`, `Pincode`, `Phone_number`, `E_mail`) VALUES ('$username','$password','$address','$pin','$phone','$email')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['message'] = "Successfully Regestered";
            $_SESSION['flag'] = 1;
            header("location: /Foodies_Eatery/templates/login.php");
        } else {
            $_SESSION['message'] = "Registration Failed Try again";
            $_SESSION['flag'] = 1;
            header("location: /Foodies_Eatery/templates/login.php");
        }
    } else {
        $_SESSION['message'] = "Password did not  match";
        $_SESSION['flag'] = 1;
        header("location: /Foodies_Eatery/templates/login.php");
    }
}else{
    header("location: /Foodies_Eatery/");
}
