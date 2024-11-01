<?php

session_start();

if (isset($_SESSION['admin_id'])) {
    header("location: /Foodies_Eatery/admin/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Foodies_Eatery | Login</title>

</head>
<body>
   <div class="box">
    <div class="container">

        <div class="top">
            <span>Have an account?</span>
            <header>Login</header>
        </div>
        <form action="manage_dashbord.php" method="post">

            <div class="input-field">
            <input type="email" class="input" name="email" placeholder="Email Address" required>
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="password" class="input" name="password" placeholder="password" required>
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-field">
            <input type="submit" class="submit" name="login_form">
        </div>

        <div class="two-col">
            <div class="two">
                <label>Only for Admin</label>
            </div>
        </div>
            
        </form>
    </div>
</div>  
</body>
</html>