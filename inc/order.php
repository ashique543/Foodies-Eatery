<?php

session_start();
include('./connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['order_btn'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $id = $value['food_id'];
            $sql = "select * from food where Food_id='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            $customer_name=$_SESSION['user_name'];
            $user_id=$_SESSION['user_id'];
            $resturent_id=$row['Resturent_id'];
            $food_id=$row['Food_id'];
            $price=$row['Price'];

            $sql="INSERT INTO `order`(`Customer_name`, `User_id`, `Resturent_id`, `Food_id`, `Total_price`) VALUES ('$customer_name','$user_id','$resturent_id','$food_id','$price')";
            if(mysqli_query($conn, $sql)){
                unset($_SESSION['cart']);
                echo "<script>alert('Your Order has being placed');
                window.location.href='../templates/cart.php';
                </script>";
            }else{
                echo "<script>alert('Something went wrong tryagain');
                window.location.href='../templates/cart.php';
                </script>";
            }
        }
    }
} else {
    header("location: ../templates/cart.php");
}
