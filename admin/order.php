<?php
include("sidebar.php");
include('../inc/connection.php');
?>
<section class="home-section">

  <nav>
    <div class="card active sidebar-button">
      <i class='bx bx-menu sidebarBtn'></i>
      <span class="dashboard">Total Orders</span>
    </div>

    <div class="profile-details">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
      </svg>
      <span class="admin_name"><?php echo $_SESSION['admin_name']; ?></span>

    </div>
  </nav><br><br><br><br>

  <table id="customers" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>User-ID</th>
        <th>Restaurent</th>
        <th>Food</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Date-Time</th>
      </tr>
    </thead>
    <tbody>
      <?php


      $sql = "SELECT * FROM `order`";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $res_id = $row["Resturent_id"];
          $sql2 = "SELECT Resturents_name FROM `resturent` WHERE Resturent_id=$res_id";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);

          $food_id = $row["Food_id"];
          $sql3 = "SELECT Food_name FROM `food` WHERE Food_id=$food_id";
          $result3 = mysqli_query($conn, $sql3);
          $row3 = mysqli_fetch_assoc($result3)
      ?>
          <tr>
            <td><?php echo $row["Order_id"]; ?></td>
            <td><?php echo $row["Customer_name"]; ?></td>
            <td><?php echo $row["User_id"]; ?></td>
            <td><?php echo $row2["Resturents_name"]; ?></td>
            <td><?php echo $row3["Food_name"]; ?></td>
            <td><?php echo $row["Quantity"]; ?></td>
            <td><?php echo $row["Total_price"]; ?> /-</td>
            <td><?php echo $row["Date_time"]; ?></td>

          </tr>
      <?php
        }
      }

      ?>
    </tbody>
  </table>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#customers').DataTable({
      "lengthChange": false,
      "lengthMenu": [
        [9],
        [9]
      ]
    });

  });
</script>
<script>
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
</body>

</html>