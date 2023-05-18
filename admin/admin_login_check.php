<?php

session_start();

if(!isset($_SESSION['admin_id'])){
    header("location: /Foodies_Eatery/admin/login.php");
}

?>