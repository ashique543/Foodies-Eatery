<?php
include('./login_ckeck.php');
include('./connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $type = $_POST["form_type"];
    if ($type == 'address_form') {
        $address = $_POST["address"];
        $pin = $_POST["pincode"];
        $id = $_POST["id"];
    }
    if ($type == 'phone_form') {
        $phone = $_POST["phone"];
        $id = $_POST["id"];
    }
} else {
    header('Location: /Foodies_Eatery/templates/profile.php');
}


if ($type == 'address_form') {

    $sql = "select * from login where User_id='$id'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($count == 1) {
        $sql = "UPDATE login SET Address='$address',Pincode='$pin' WHERE User_id='$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['user_address'] = $address;
            $_SESSION['user_pincode'] = $pin;
            header('Location: /Foodies_Eatery/templates/profile.php');
        }
    }
}

if ($type == 'phone_form') {
    $sql = "select * from login where User_id='$id'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($count == 1) {
        $sql = "UPDATE login SET Phone_number='$phone' WHERE User_id='$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['user_phone'] = $phone;
            header('Location: /Foodies_Eatery/templates/profile.php');
        }
    }
}
