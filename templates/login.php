<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header("location: ./templates/home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.jpg" />
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Foodie's Eatery</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="./register.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <h1>Create Account</h1>
                <input class="signupInput" type="text" name="name" placeholder="Name" required/>
                <input class="signupInput" type="email" name="email" placeholder="Email" required/>
                <input class="signupInput" type="text" name="address" placeholder="Address" required/>
                <input class="signupInput" type="text" name="pin" placeholder="Pincode" required/>
                <input class="signupInput" type="text" name="phone" placeholder="Phone" required/>
                <input class="signupInput" type="password" name="password" placeholder="Password" required/>
                <input class="signupInput" type="password" name="confirm_password" placeholder="Confirm Password" required/>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="./login_manage.php" method="POST">
                <h1>Sign in</h1>
                <input class="loginInput" type="text" name="email" placeholder="Email" />
                <input class="loginInput" type="password" name="password" placeholder="Password" />
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="./assets/img/logo.jpg" alt="">
                    <h1>Welcome Back!</h1>
                    <p>
                        To keep connected with us please login with your personal info
                    </p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="./assets/img/logo.jpg" alt="">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <p><?php if(isset($_SESSION['flag']) and $_SESSION['flag']==1){echo ($_SESSION['message']);}$_SESSION['flag']=0;?></p>
                    <button class="ghost" id="signUp">Sign Up</button><br><br>
                    <div class="extralink">
                     <a href="../admin/login.php">Admin Log-in</a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>

</html>