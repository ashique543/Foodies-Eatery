<?php
include('../inc/login_ckeck.php');
include('../inc/connection.php');
?>

<!DOCTYPE html>
<html land="en" dir="ltr">

<head>
    <meta charset="=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foodie's Eatery | Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.jpg" />
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="container">
        <!--navigation bar code-->
        <aside>
            <div class="navbar">
                <div class="user-logo">
                    <?php
                    if ($_SESSION['user_image'] != "") {
                    ?>
                        <img src="..<?php echo $_SESSION['user_image'] ?>" width=150 height=150 alt="">
                    <?php
                    } else { ?>
                        <img src="../assets/img/pro.jpg" width=150 height=150 alt="">
                    <?php } ?>
                </div>
                <!--nav elements-->
                <nav id="profile_nav">
                    <ul>
                        <li class="selectedLink" name="edit">Edit Profile</li>
                        <li name="orders">Your Orders</li>
                        <a href="./home.php">
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                </svg> Home</li>
                        </a>
                        <a href="./logout.php">
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg> Logout</li>
                        </a>
                    </ul>
                </nav>
            </div>
        </aside>
        <!--content page code-->
        <main id="main">

            <div class="card active edit">
                <div class="title"><b>Edit Profile</b></div>
                <div class="content">
                    <center>
                        <!-- code for editing page -->
                        <div class="upload">
                            <?php
                            if ($_SESSION['user_image'] != "") {
                            ?>
                                <img src="..<?php echo $_SESSION['user_image'] ?>" width=150 height=150 alt="">
                            <?php
                            } else { ?>
                                <img src="../assets/img/pro.jpg" width=150 height=150 alt="">
                            <?php } ?>
                            <form action="../inc/profile_update.php" method="post" enctype="multipart/form-data">
                                <div class="round">
                                    <input type="file" name="image_data">
                                    <i class="fa fa-camera" style="color: #fff;"></i>
                                </div>
                                <input type="hidden" name="form_type" value="img_form">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
                                <button name="img_submit" style="float: left; margin: 10px 18.2%;"><b>Upload</b></button>
                            </form>
                        </div>

                        <br>
                        <p><?php echo $_SESSION['user_name'] ?></p>
                        <p style="font-size: 14px;"><?php echo $_SESSION['user_email'] ?><br>
                            You can update bellow Data</p>
                        <form id="update_data" action="../inc/profile_update.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
                            <input type="hidden" name="form_type" value="address_form">
                            <input type="text" name="address" placeholder="<?php echo $_SESSION['user_address'] ?>" required>
                            <input type="text" name="pincode" placeholder="<?php echo $_SESSION['user_pincode'] ?>" required>
                            <button style="float: left; margin: 10px 18.2%;"><b>Update</b></button>
                        </form>

                        <form id="update_data" action="../inc/profile_update.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
                            <input type="hidden" name="form_type" value="phone_form">
                            <input type="text" name="phone" placeholder="<?php echo $_SESSION['user_phone'] ?>" required>
                            <button style="float: left; margin: 10px 18.2%;"><b>Update</b></button>
                        </form>

                    </center>
                </div>
            </div>
            <!-- rest pages-->
            <div class="card orders">
                <div class="title"><b>Order History</b></div>
                <div class="content">
                <section id="table_section">
                
                <table id="menu_table" cellpadding="0" cellspacing="0" border="0">
                    <thead class="tbl-header">
                        <tr>
                            <th>Order Id</th>
                            <th>Restaurent Name</th>
                            <th>Food</th>
                            <th>Price</th>
                            <th>Date-Time</th>
                        </tr>
                    </thead>
                    <tbody class="tbl-content">
                    <?php
                    $id=$_SESSION['user_id'];

                    $sql="SELECT * FROM `order` WHERE User_id=$id";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                            $res_id=$row["Resturent_id"];
                            $sql2="SELECT Resturents_name FROM `resturent` WHERE Resturent_id=$res_id";
                            $result2=mysqli_query($conn,$sql2);
                            $row2= mysqli_fetch_assoc($result2);

                            $food_id=$row["Food_id"];
                            $sql3="SELECT Food_name FROM `food` WHERE Food_id=$food_id";
                            $result3=mysqli_query($conn,$sql3);
                            $row3= mysqli_fetch_assoc($result3)
                            ?>
                            <tr>
                                <td><?php echo $row["Order_id"];?></td>
                                <td><?php echo $row2["Resturents_name"];?></td>
                                <td><?php echo $row3["Food_name"];?></td>
                                <td><?php echo $row["Total_price"];?> /-</td>
                                <td><?php echo $row["Date_time"];?></td>
                                
                            </tr>
                            <?php
                        }
                    }

                    ?>  
                    </tbody>
                </table>
            </section>
                </div>
            </div>
            <div class="card settings">
                <div class="title"><b>Your Cart</b></div>
                <div class="content">Content goes here</div>
            </div>
            <div class="card notifications">
                <div class="title"><b>Favorite Orders</b></div>
                <div class="content">Content goes here</div>
            </div>
        </main>
    </div>


    <script>
        const links = document.querySelectorAll(".navbar > nav > ul > li");
        const cards = document.querySelectorAll(".card");

        [...links].map((link, index) => {
            link.addEventListener("click", () => onLinkClick(link, index), false);
        });

        const onLinkClick = (link, currentIndex) => {
            const selectedItem = link.getAttribute("name");
            cards.forEach(card => {
                card.classList.remove("active");
            });
            const currentCard = [...cards].find((card) => card.classList.contains(selectedItem));
            currentCard.classList.add("active");
            highLightSelectedLink(currentIndex);
        };
        const highLightSelectedLink = (currentIndex) => {
            links.forEach((link) => {
                link.classList.remove("selectedLink");
            });
            links[currentIndex].classList.add("selectedLink");
        };
    </script>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function() {
            $('#menu_table').DataTable({
                "pagingType": "full_numbers",
                "lengthChange": false,
                "info": false,
                "lengthMenu": [
                    [8],
                    [8]
                ],
                responsive: true,
                "searching": false
            });

        });
    </script>
</body>

</html>