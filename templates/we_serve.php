<?php
include('../inc/login_ckeck.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.jpg" />
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/we_serve.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Foodie's Eatery | We Serve</title>
</head>

<body>
    <?php
    include('../inc/header.php');
    ?>
        <div class="category" id="category">
            <div class="category_items">
                <?php

                $category = array("Indian", "Chinese", "Italian", "Spicy", "Healthy", "Fries", "Chaat", "Sweet and Salty", "Sweet and Sour", "Sweets");
                $num = count($category);
                for ($i = 0; $i <= $num - 1; $i++) {
                    $hash_category=password_hash($category[$i], PASSWORD_DEFAULT);
                    echo '<div class="category_items_box"><a href="../templates/category.php?category=' . $hash_category . '">
                   <div class="circle"><img
                            src="https://imgs.search.brave.com/TarP4eNfmGObBD_yuGnBR4NeeMtkutrzWaQ1NYlAHbQ/rs:fit:711:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5H/UXdyakVkOG50Qlp5/ejdGNVE3dk5nSGFF/OCZwaWQ9QXBp"
                            alt=""></div>
                    <p>' . $category[$i] . '</p>
                </a></div>';
                }
                ?>
            </div>
        </div>

    <?php
    include('../inc/footer.php');
    ?>
    
<script src="../assets/js/side_nav.js"></script>
<script src="../assets/js/user_prof_toggle.js"></script>
</body>

</html>