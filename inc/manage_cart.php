<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Add_to_Cart"])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'food_id');
            if (in_array($_POST['food_id'], $myitems)) {
                $_SESSION['status'] = "Item Alredy Present, Go Check your Cart";
                $_SESSION['status_title'] = "Warning";
                $_SESSION['status_icon'] = "info";
                echo "<script>
                window.location.href='../templates/food.php?id=" . $_POST['food_id'] . "';
                </script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('food_id' => $_POST["food_id"], 'quantity' => $_POST["quantity"]);
                $_SESSION['status'] = "Item Added Successfully";
                $_SESSION['status_title'] = "Check your Cart";
                $_SESSION['status_icon'] = "success";
                echo "<script>
                window.location.href='../templates/food.php?id=" . $_POST['food_id'] . "';
                </script>";
            }
        } else {
            $_SESSION['cart'][0] = array('food_id' => $_POST["food_id"], 'quantity' => $_POST["quantity"]);
            $_SESSION['status'] = "Item Added Successfully";
            $_SESSION['status_title'] = "Check your Cart";
            $_SESSION['status_icon'] = "success";
            echo "<script>
                window.location.href='../templates/food.php?id=" . $_POST['food_id'] . "';
                </script>";
        }
    }
    if(isset($_POST["remove_item"])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['food_id']==$_POST['item']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                $_SESSION['status'] = "Item Removed Successfully";
                $_SESSION['status_title'] = "Done";
                $_SESSION['status_icon'] = "success";
                echo "<script>
                window.location.href='../templates/cart.php';
                </script>";
            }
        }
    }
}else{
    echo "<script>
                window.location.href='../templates/food.php?id=" . $_POST['food_id'] . "';
                </script>";
}
