<?php
session_start();
include('../inc/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.jpg" />
    <link rel="stylesheet" href="../assets/css/category.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    if (isset($_GET["category"])) {
        $category = array("Indian", "Chinese", "Italian", "Spicy", "Healthy", "Fries", "Chaat", "Sweet and Salty", "Sweet and Sour", "Sweets");
        $num = count($category);
        for ($i = 0; $i <= $num - 1; $i++) {
            if (password_verify($category[$i], $_GET["category"])) {
                $data = $category[$i];
            }
        }
    } else {
        header("location: /Foodies_Eatery/");
    }
    echo "<title>Category | {$data}</title>";
    ?>
    
</head>

<body>
    <?php
    include('../inc/header.php');
    ?>
    <div class="items">
        <?php
        echo "<h1>{$data}</h1>";
        $hash_category = password_hash($data, PASSWORD_DEFAULT);
        ?>
        <div class="filter">
         <form action="category.php" method="get">
            <input type="hidden" name="category" value="<?php echo $hash_category; ?>">
            <input type="number" name="pin" placeholder="Enter Pin to Search" required>
            <input type="submit" name="pin_btn" value="Search">
        </form>
        <form action="category.php" method="get">
            <input type="hidden" name="category" value="<?php echo $hash_category; ?>">
            <input type="hidden" name="low_high" value="low_high">
            <input type="submit" name="pin_btn" value="Low to High Price">
        </form>
        <form action="category.php" method="get">
            <input type="hidden" name="category" value="<?php echo $hash_category; ?>">
            <input type="hidden" name="high_low" value="high_low">
            <input type="submit" name="pin_btn" value="High to Low Price">
        </form>    
        </div>
        
        <div class="card_contaner">
            <?php
            if (isset($_GET['category']) and !isset($_GET['pin']) and !isset($_GET['low_high']) and !isset($_GET['high_low'])) {
                $sql = "SELECT * FROM `food` WHERE Category='$data'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="card">
                            
                            <img class="card-img" src="../assets/img/food_img/<?php echo $row["Food_id"];?>.jpg">
                            
                            <div class="card-info">
                                <p class="text-title"><?php echo $row["Food_name"]; ?></p>
                                <p class="text-body"><?php echo $row["Description"]; ?></p>
                            </div>
                            <div class="card-footer">
                                <span class="text-title"><?php echo $row["Price"]; ?>/-</span>
                                <div class="card-button">
                                    <a href="./food.php?id=<?php echo $row['Food_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>


            <?php
            if (isset($_GET['category']) and isset($_GET['pin']) and !isset($_GET['low_high'])) {
                $pin = $_GET['pin'];
                $sql = "SELECT * FROM `food` WHERE Category='$data' AND Resturent_id IN (SELECT Resturent_id FROM resturent WHERE Pincode='$pin')";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="card">
                        <img class="card-img" src="../assets/img/food_img/<?php echo $row["Food_id"];?>.jpg">
                            <div class="card-info">
                                <p class="text-title"><?php echo $row["Food_name"]; ?></p>
                                <p class="text-body"><?php echo $row["Description"]; ?></p>
                            </div>
                            <div class="card-footer">
                                <span class="text-title"><?php echo $row["Price"]; ?>/-</span>
                                <div class="card-button">
                                    <a href="./food.php?id=<?php echo $row['Food_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>

            <?php
            if (isset($_GET['category']) and isset($_GET['low_high'])) {
                $sql = "SELECT * FROM `food` WHERE Category='$data' ORDER BY `food`.`Price` ASC";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="card">
                        <img class="card-img" src="../assets/img/food_img/<?php echo $row["Food_id"];?>.jpg">
                            <div class="card-info">
                                <p class="text-title"><?php echo $row["Food_name"]; ?></p>
                                <p class="text-body"><?php echo $row["Description"]; ?></p>
                            </div>
                            <div class="card-footer">
                                <span class="text-title"><?php echo $row["Price"]; ?>/-</span>
                                <div class="card-button">
                                    <a href="./food.php?id=<?php echo $row['Food_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>

<?php
            if (isset($_GET['category']) and isset($_GET['high_low'])) {
                $sql = "SELECT * FROM `food` WHERE Category='$data' ORDER BY `food`.`Price` DESC";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="card">
                        <img class="card-img" src="../assets/img/food_img/<?php echo $row["Food_id"];?>.jpg">
                            <div class="card-info">
                                <p class="text-title"><?php echo $row["Food_name"]; ?></p>
                                <p class="text-body"><?php echo $row["Description"]; ?></p>
                            </div>
                            <div class="card-footer">
                                <span class="text-title"><?php echo $row["Price"]; ?>/-</span>
                                <div class="card-button">
                                    <a href="./food.php?id=<?php echo $row['Food_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
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