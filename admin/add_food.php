<?php
include("sidebar.php");
include('../inc/connection.php');
session_start();
?>
<section class="home-section">

    <nav>
        <div class="card active sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Add Food</span>
        </div>

        <div class="profile-details">
            <img src="me.jpeg" alt="">
            <span class="admin_name">Swapnendu Paul</span>

        </div>
    </nav>

    <div class="container">
        <form action="manage_dashbord.php" method="post" enctype="multipart/form-data">
            <div class="rest-content">
                <div class="input-box">
                    <label for="food_name">Food Name</label>
                    <input type="text" name="food_name" placeholder="Food Name" required>
                </div>
                <div class="input-box">
                    <label for="desc">Description</label>
                    <input type="text" name="desc" placeholder="Discription" required>
                </div>
                <div class="input-box">
                    <label for="price">Price</label>
                    <input type="number" name="price" placeholder="Price" required>
                </div>
                <div class="input-box">
                    <label for="category">Category</label>
                    <select name="category" id="#" required>
                        <?php
                        $category = array("Indian", "Chinese", "Italian", "Spicy", "Healthy", "Fries", "Chaat", "Sweet and Salty", "Sweet and Sour", "Sweets");
                        $num = count($category);
                        for ($i = 0; $i <= $num - 1; $i++) {
                            ?>
                            <option value="<?php echo $category[$i]; ?>"><?php echo $category[$i]; ?></option>
                                <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="input-box">
                    <label for="category">Restaurent Name</label>
                    <select name="restaurent_name" id="#" required>
                        <?php

                        $sql = "select * from resturent";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row["Resturent_id"]; ?>"><?php echo $row["Resturents_name"]; ?></option>
                        <?php
                            }
                        }

                        ?>
                    </select>
                </div>
                <div class="input-box">
                    <label for="rating">Rating</label>
                    <select name="rating" id="#" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>


                <!-- Upload Image -->
                <div class="input-img">
                    <h3 class="upload-area-title">Upload File</h3>
                    <input type="file" name="image_data" id="image" accept=".jpg,.png" hidden required>
                    <label for="image" class="uploadlabel">
                        <span><i class="fa fa-cloud-upload"></i></span>
                        <p>Click to Upload</p>
                    </label>
                </div>
                <div id="filewrapper">
                    <h4 class="uploaded">Uploaded documents</h4>
                </div>


                <!-- Submit button -->
                <div class="submit-but">
                    <input name="food_data" type="submit" value="Register">
                </div>

            </div>
        </form>
    </div>

</section>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: sans-serif;

    }

    .container {
        width: 100%;

        max-width: 80%;
        position: absolute;
        border-radius: 10px;
        border: 2px solid rgb(0, 153, 255);
        box-shadow: -3px -3px 7px #98dcfc,
            3px 3px 7px #4975ec;
        padding: 28px;
        margin-left: 130px;
        margin-top: 120px;
    }

    .rest-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px 20px;
    }

    .input-box {
        display: flex;
        flex-wrap: wrap;
        width: 50%;
        padding-bottom: 15px;
    }

    .input-box label {
        width: 95%;
        color: black;
        font-size: 20px;
        font-weight: 400;
        margin: 5px 0;
    }

    .input-box input {
        height: 40px;
        width: 95%;
        border-radius: 7px;
        outline: none;
        border: 1px solid grey;
        padding: 0 10px;
    }

    .input-box select {
        height: 40px;
        width: 95%;
        border-radius: 7px;
        outline: none;
        border: 1px solid grey;
        padding: 0 10px;
    }

    /* upload img */
    .input-img input {
        display: none;
        margin-left: 400px;

    }

    .upload-area-title {
        margin-bottom: 7px;
        margin-left: 0;
        display: flex;
        flex-direction: column-reverse;
        align-items: flex-start;
        font-size: 20px;
        font-weight: 400;
    }

    .uploadlabel {
        width: 300%;
        min-height: 150px;
        background: #18a7ff0d;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 3px dashed #18a7ff82;
        cursor: pointer;
        margin-bottom: 20px;
    }

    .uploadlabel span {
        font-size: 70px;
        color: #18a7ff;
    }

    .uploadlabel p {
        color: #18a7ff;
        font-size: 20px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .uploaded {
        margin: 30px 0;
        margin-bottom: 10px;
        margin-right: 300px;
        font-size: 16px;
        font-weight: 700;
        color: #a5a5a5;
    }

    .showfile {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 10px 0;
        padding: 5px 10px;
        box-shadow: #0000000d 0px 0px 0px 1px,
            #d1d5db3d 0px 0px 0px 1px inset;
    }

    .showfile .left {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .filetype {
        background: #18a7ff;
        color: #fff;
        padding: 5px 15px;
        font-size: 15px;
        text-transform: capitalize;
        font-weight: 500;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        -o-border-radius: 3px;
    }

    .left h4 {
        font-weight: 500;
        font-size: 18px;
        color: #292f42;
        margin: 0;
    }

    .right span {
        background: #18a7ff;
        color: #fff;
        width: 25px;
        height: 25px;
        font-size: 25px;
        line-height: 25px;
        display: inline-block;
        text-align: center;
        font-weight: 600;
        cursor: pointer;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;

    }

    /* submit button */

    .submit-but {
        display: flex;


        width: 80%;
        margin-left: 100px;
    }

    .submit-but input {
        display: block;
        width: 200%;
        margin-top: 10px;
        font-size: 20px;
        justify-content: center;
        padding: 10px;

        border: none;
        border-radius: 3px;
        color: white;
        background: rgb(0, 153, 255);
    }

    .submit-but input:hover {
        background: blue;
        color: white;
    }


    @media screen and (max-width: 1540px) {
        .container {
            margin-left: 100px;
        }

        .upload-area-title {
            font-size: 20px;
            margin-left: 10px;
        }

        .uploadlabel {
            width: 300px;
            margin-left: 10px;
        }

        .uploaded {
            margin-left: 0px;
            margin-right: 100px;
        }
    }

    @media screen and (max-width: 700px) {
        .container {
            margin-left: 50px;
            display: flex;
            position: absolute;
            padding: 0px;
            min-width: 200px;
        }

        .rest-content {

            overflow: auto;

        }

        .input-box {
            margin-bottom: 12px;
            width: 100%;
            display: block;
        }





        .upload-area-title {
            font-size: 20px;
            margin-left: 10px;
        }

        .uploadlabel {
            width: 280px;
            margin-left: 10px;
        }

        .uploaded {
            margin-left: 10px;
            margin-right: 100px;
        }

        .showfile {
            padding: 0 5px;
        }

        .submit-but {
            width: 70%;
            margin-left: 50px;
            margin-bottom: 30px;
        }

    }
</style>
<script>
    /*  upload img  */
    window.addEventListener("load", () => {
        const input = document.getElementById("image");
        const filewrapper = document.getElementById("filewrapper");

        input.addEventListener("change", (e) => {
            let fileName = e.target.files[0].name;
            let filetype = e.target.value.split(".").pop();
            fileshow(fileName, filetype);
        })
        const fileshow = (fileName, filetype) => {
            const showfileElem = document.createElement("div");
            showfileElem.classList.add("showfile");
            const leftElem = document.createElement("div");
            leftElem.classList.add("left");
            const fileTypeElem = document.createElement("span");
            fileTypeElem.classList.add("filetype");
            fileTypeElem.innerHTML = filetype;
            leftElem.append(fileTypeElem);
            const filetitleElem = document.createElement("h4");
            filetitleElem.innerHTML = fileName;
            leftElem.append(filetitleElem);
            showfileElem.append(leftElem);
            const rightElem = document.createElement("div");
            rightElem.classList.add("right");
            showfileElem.append(rightElem);
            const crossElem = document.createElement("span");
            crossElem.innerHTML = "&#215;";
            rightElem.append(crossElem);
            filewrapper.append(showfileElem);
        }
    })

    /* menu opt */
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
</script>
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