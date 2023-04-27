<?php

session_start();

if(isset($_SESSION['user_id'])){

    unset($_SESSION['user_id']);
    unset($_SESSION['cart']);
    header("location: /Foodies_Eatery/");
}
else{
    header("location: /Foodies_Eatery/");
}

?>