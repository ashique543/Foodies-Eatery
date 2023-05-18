<?php
include('../inc/login_ckeck.php');
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
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Foodie's Eatery | Cart</title>
</head>

<body>
    <?php
    include('../inc/header.php');
    ?>

    <h1 id="heading">Your Cart</h1>
    <?php
    if (isset($_SESSION['cart']) and count($_SESSION['cart']) != 0) {
    ?>
        <div class="contaner">
            <table id="customers">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th> </th>
                </tr>
                <?php
                if (isset($_SESSION['cart'])) {
                    $overall_total = 0;
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $id = $value['food_id'];
                        $sql = "select * from food where Food_id='$id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);

                ?>
                        <tr>
                            <td><?php echo $row['Food_name']; ?></td>
                            <td><?php echo $row['Price']; ?>/-</td>
                            <td><?php echo $value['quantity'] ?></td>
                            <td>
                                <?php
                                $quantity = $value['quantity'];
                                $price = $row['Price'];
                                $total = $quantity * $price;
                                $overall_total = $overall_total + $total;
                                echo $total;
                                ?>/-
                            </td>
                            <td>
                                <form action="../inc/manage_cart.php" method="post">
                                    <button name="remove_item" class="button-5" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg></button>
                                    <input type="hidden" name="item" value="<?php echo $value['food_id'] ?>">
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>

            </table>
            <div class="order">
                <div class="check_out">
                    <h2 style="font-weight: 100;">Total Price </h2>
                    <h3 style="font-weight: 100;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                            <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                        </svg><?php echo $overall_total; ?> /-</h3><br>
                    <p>18% GST will be included</p><br>
                    <h3 style="font-weight: 100;">Price after GST </h3>
                    <h3 style="font-weight: 100;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                            <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                        </svg>
                        <?php
                        $gst_inc = (0.18 * $overall_total) + $overall_total;
                        echo $gst_inc;
                        ?>
                        /-</h3><br>
                    <form action="../inc/order.php" method="post">
                        <button name="order_btn" class="order_button" role="button">Check Out</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="contaner2">
            <h1>Your Cart is Empty</h1><br>
            <p>Explore Different Food items and add them in cart to Purchase</p>
        </div>

    <?php
    }
    ?>
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
                title: "Done",
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