<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header("location: /Foodies_Eatery/");
}

?>