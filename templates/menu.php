<?php
include('../inc/connection.php');
?>
<?php
    
    if (isset($_GET["id"])){
        $id=$_GET["id"];
    }
    else{
        header("location: /Foodies_Eatery/templates/restaurant.php");
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
    <link rel="stylesheet" href="../assets/css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>Foodie's Eatery | Menu</title>
</head>

<body>
    <?php
    include('../inc/header.php');
    ?>
    <?php
    $sql="select * from resturent where Resturent_id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="menu_card_back">
        <div class="menu_card">
            <div class="menu_card_header">
                <h3><?php echo $row['Resturents_name']; ?></h3>
            </div>
            <p><?php echo $row['Location']; ?></p>
            <div class="phone_pin">
                <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg><?php echo $row['Phone_number']; ?></p>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                    </svg><?php echo $row['Pincode']; ?></p>
            </div>

            <section id="table_section">
                
                <table id="menu_table" cellpadding="0" cellspacing="0" border="0">
                    <thead class="tbl-header">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody class="tbl-content">
                       
                    <?php
                    
                    $sql="select * from food where Resturent_id='$id'";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $row["Food_name"];?></td>
                                <td><?php echo $row["Price"]." /-";?></td>
                                <td><a href='./food.php?id=<?php echo $row['Food_id']; ?>'>Explore More<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bag' viewBox='0 0 16 16'>
                            <path d='M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z'/>
                          </svg></a></td>
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

    <?php
    include('../inc/footer.php');
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../assets/js/side_nav.js"></script>
    <script src="../assets/js/user_prof_toggle.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#menu_table').DataTable({
                "pagingType": "full_numbers",
                "lengthChange": false,
                "info": false,
                "lengthMenu": [
                    [5],
                    [5]
                ],
                responsive: true,
                "searching": false
            });

        });
    </script>
</body>

</html>