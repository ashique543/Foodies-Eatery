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
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/restaurant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Foodie's Eatery | Restaurant's</title>
</head>

<body>
    <?php
    include('../inc/header.php');
    ?>

    <div class="items">
        <h1>Restaurant's in tuch with us</h1>
        <div class="card_contaner">
            <?php
            $sql = 'select * from resturent';
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card">
                    <div class="card-content">
                    <img class="card-img" src="../assets/img/restaurent_img/'.$row["Resturent_id"].'.jpg">
                    <div class="card-info">
                        <p class="text-title">' . $row['Resturents_name'] . '</p>
                        <p class="text-body">' . $row['Location'] . '</p>
                        <p class="text-body">' . $row['Pincode'] . '</p>
                        <p class="text-body">' . $row['Phone_number'] . '</p>
                    </div>
                    </div>';
            ?>
                    <div class="card-footer">
                        <a href="./menu.php?id=<?php echo $row['Resturent_id']; ?>"><button class="button-62" role="button">Explore More</button></a>
                    </div>
        </div>
<?php
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