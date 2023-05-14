<?php
include('../inc/login_ckeck.php');
include('../inc/connection.php');
?>
<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    header("location: /Foodies_Eatery/");
}

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
    <link rel="stylesheet" href="../assets/css/food.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Foodie's Eatery | About</title>
</head>

<body>
    <?php
    include('../inc/header.php');
    ?>

    <div class="container">
        <div class="images">
            <img src="../assets/img/Butter-Chicken1.jpg" />
        </div>
        <?php
        $sql = "SELECT Resturents_name FROM `resturent` WHERE Resturent_id=(SELECT Resturent_id FROM food WHERE Food_id='$id')";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $res_name = $row['Resturents_name'];
        ?>
        <?php
        $sql = "select * from food where Food_id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        ?>
        <div class="product">
            <p><?php echo $res_name; ?> Present's</p>
            <h1><?php echo $row['Food_name']; ?></h1>
            <h2><?php echo $row['Price']; ?> /-</h2>
            <p class="desc">Categoty - <?php echo $row['Category']; ?></p>
            <p class="desc">Rating - <?php echo $row['Rating']; ?></p>
            <p class="desc"><?php echo $row['Description']; ?></p>
            <form action="../inc/manage_cart.php" method="post">
                <select name="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input type="hidden" name="food_id" value="<?php echo $id; ?>">
                <button class="add" name="Add_to_Cart">Add to Cart</button>
            </form>
        </div>
    </div>

    <?php
    include('../inc/footer.php');
    ?>

    <script src="../assets/js/side_nav.js"></script>
    <script src="../assets/js/user_prof_toggle.js"></script>
    <script src="../assets/js/sweetalert.js"></script>

    <?php
    if (isset($_SESSION['status'])) {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status_title']; ?>",
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_icon']; ?>",
                button: "Ok",
            });
        </script>
    <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_icon']);
    }
    ?>

</body>

</html>