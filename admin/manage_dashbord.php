<?php
include('admin_login_check.php');
include('../inc/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["food_data"])) {
        $food_name = $_POST['food_name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $restaurent_name = $_POST['restaurent_name'];
        $rating = $_POST['rating'];

        $sql = "SELECT MAX(Food_id) FROM `food`";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row["MAX(Food_id)"];
        $id = $id + 1;
        $name_id = $id;
        $extension = pathinfo($_FILES["image_data"]["name"], PATHINFO_EXTENSION);
        $name = $name_id . "." . $extension;
        $temp_name  = $_FILES['image_data']['tmp_name'];
        if (isset($name) and !empty($name)) {
            $location = '../assets/img/food_img/';
            if (move_uploaded_file($temp_name, $location . $name)) {
                $path = "/assets/img/food_img/" . $name;

                $sql = "INSERT INTO `food`(`Food_id`,`Food_name`, `Description`, `Price`, `Category`, `Rating`, `Resturent_id`, `Image`) VALUES ('$name_id','$food_name','$desc','$price','$category','$rating','$restaurent_name','$path')";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['status'] = "Food Data added Successfully";
                    $_SESSION['status_title'] = "Done";
                    $_SESSION['status_icon'] = "success";
                    echo "<script>
                window.location.href='../admin/add_food.php';
                </script>";
                }
            }
        }
    }

    if (isset($_POST["remove_restuarent"])) {
        $id = $_POST['item'];
        $sql = "DELETE FROM resturent WHERE Resturent_id=$id;";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Data Deleted Successfully";
            $_SESSION['status_title'] = "Done";
            $_SESSION['status_icon'] = "success";
            echo "<script>
        window.location.href='../admin/resturent_list.php';
        </script>";
        }
    }

    if (isset($_POST["remove_food"])) {
        $id = $_POST['item'];
        $sql = "DELETE FROM food WHERE Food_id=$id;";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Data Deleted Successfully";
            $_SESSION['status_title'] = "Done";
            $_SESSION['status_icon'] = "success";
            echo "<script>
        window.location.href='../admin/food.php';
        </script>";
        }
    }

    if (isset($_POST["restaurant_data"])) {

        $restaurent_name = $_POST['resturentName'];
        $phone = $_POST['resturentPhn'];
        $address = $_POST['resturentAdd'];
        $pincode = $_POST['resturentPin'];

        $sql = "SELECT MAX(Resturent_id) FROM `resturent`";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row["MAX(Resturent_id)"];

        $id = $id + 1;
        $name_id = $id;
        $extension = pathinfo($_FILES["image_data"]["name"], PATHINFO_EXTENSION);
        $name = $name_id . "." . $extension;
        $temp_name  = $_FILES['image_data']['tmp_name'];
        if (isset($name) and !empty($name)) {
            $location = '../assets/img/restaurent_img/';
            if (move_uploaded_file($temp_name, $location . $name)) {
                $path = "/assets/img/restaurent_img/" . $name;

                $sql = "INSERT INTO `resturent`(`Resturent_id`, `Resturents_name`, `Location`, `Pincode`, `Phone_number`, `Image`) VALUES ('$name_id','$restaurent_name','$address','$pincode','$phone','$path')";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['status'] = "Restaurant Data added Successfully";
                    $_SESSION['status_title'] = "Done";
                    $_SESSION['status_icon'] = "success";
                    echo "<script>
                window.location.href='../admin/add_resturent.php';
                </script>";
                }
            }
        }
    }



    if (isset($_POST["login_form"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "select * from admin where Email='$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $db_admin_id = $row['Admin_id'];
        $db_admin_name = $row['Name'];
        $db_admin_password = $row['Password'];
        $db_admin_email = $row['Email'];

        if(isset($_SESSION['admin_id'])){
            header("location: /Foodies_Eatery/admin/index.php");
        }else{
            if(1==1){
                $_SESSION['admin_id']=$db_admin_id;
                $_SESSION['admin_name']=$db_admin_name;
                $_SESSION['admin_email']=$db_admin_email;
                header("location: /Foodies_Eatery/admin/index.php");
            }
            else{
                header("location: /Foodies_Eatery/admin/login.php");
            }
        }
    }
} else {
    echo "<script>
                window.location.href='add_food.php';
                </script>";
}
