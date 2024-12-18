<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.jpg" />
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Foodie's Eatery</title>
</head>

<body>
    <?php
    include('../inc/header.php');
    ?>

    <div class="category_back">
        <div class="category" id="category">
            <div class="category_items">
                <?php

                $category = array("Indian", "Chinese", "Italian", "Spicy", "Healthy", "Fries", "Chaat", "Sweet and Salty", "Sweet and Sour", "Sweets");
                $num = count($category);
                for ($i = 0; $i <= $num - 1; $i++) {
                    $hash_category = password_hash($category[$i], PASSWORD_DEFAULT);
                ?>
                    <div class="category_items_box"><a href="../templates/category.php?category=<?php echo $hash_category; ?>">
                            <div class="circle"><img src="../assets/img/category_img/<?php echo $category[$i]; ?>.jpg" alt=""></div>
                            <p><?php echo $category[$i]; ?></p>
                        </a></div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="facts">
        <?php
        include('../inc/card_carousal.php');
        ?>
    </div>
    <?php
    include('../inc/featured.php');
    ?>

    <div class="about_body">
        <h1 id="about_heading">Hi! We are Foodies Eatery</h1>
        <div class="about_line"></div>
        <p id="about_desc">
            Launched in 2023, Our technology platform connects customers, restaurant partners and delivery partners, serving their multiple needs. Customers use our platform to search and discover restaurants, read and write customer generated reviews and view and upload photos, order food delivery, book a table and make payments while dining-out at restaurants. On the other hand, we provide restaurant partners with industry-specific marketing tools which enable them to engage and acquire customers to grow their business while also providing a reliable and efficient last mile delivery service. . We also provide our delivery partners with transparent and flexible earning opportunities.<br><br>

            <b>Blog</b>: <br><br>

            Work with us:<br>
            The right people got us here, and we are on the lookout for those who will bring us closer to our vision, and make a difference.<br><br>
        </p>
    </div>

    <?php
    include('../inc/footer.php');
    ?>


    <script src="../assets/js/side_nav.js"></script>
    <script src="../assets/js/user_prof_toggle.js"></script>
    <script src="../assets/js/slide_show.js"></script>
</body>

</html>