<?php
include("sidebar.php");
include('../inc/connection.php');
?>
<section class="home-section">
  <nav>
    <div class="card active sidebar-button">
      <i class='bx bx-menu sidebarBtn'></i>
      <span class="dashboard">Dashboard</span>
    </div>
    <div class="profile-details">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
      </svg>
      <span class="admin_name"><?php echo $_SESSION['admin_name']; ?></span>

    </div>
  </nav>
  <div class="home-content">
    <div class="overview-boxes">
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Order</div>
          <?php
          $sql = "SELECT count(*) FROM `order`";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $total_order = $row["count(*)"];
          ?>
          <div class="number"><?php echo $total_order; ?></div>

        </div>
        <i class='bx bx-cart-alt cart'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Sales</div>
          <?php
          $sql = "SELECT SUM(Total_price) FROM `order`";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $total_sales = $row["SUM(Total_price)"];
          $total_profit = 0.2 * $total_sales;
          ?>
          <div class="number"><?php echo $total_sales; ?></div>
        </div>
        <i class='bx bxs-cart-add cart two'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Profit</div>
          <div class="number"><?php echo $total_profit; ?></div>

        </div>
        <i class='bx bx-cart cart three'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Restaurent</div>
          <?php
          $sql = "SELECT count(*) FROM `resturent`";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $total_res = $row["count(*)"];
          ?>
          <div class="number"><?php echo $total_res; ?></div>

        </div>
        <i class='bx bxs-cart-download cart four'></i>
      </div>
    </div>
    <div class="sales-boxes">
      <div class="recent-sales box">
        <div class="title">Recent Sales</div>
        <table id="customers" class="display" style="width:100%">
          <thead>
            <tr>
              <th>Date-Time</th>
              <th>Name</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql = "SELECT * FROM `order` ORDER BY Order_id DESC LIMIT 5";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?php echo $row["Date_time"]; ?></td>
                  <td><?php echo $row["Customer_name"]; ?></td>
                  <td><?php echo $row["Total_price"]; ?></td>
                </tr>
            <?php
              }
            }

            ?>
          </tbody>
        </table>
      </div>
      <div class="top-sales box">
        <div class="title">Top Seling Product</div>
        <table id="customers" class="display" style="width:100%">
          <thead>
            <tr>
              <th>Food Name</th>
              <th>Restaurent</th>
              <th>Total Order</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql = "SELECT COUNT(Order_id), Food_id , Resturent_id FROM `order` GROUP BY Food_id LIMIT 3";
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
                  <td><?php echo $row3["Food_name"]; ?></td>
                  <td><?php echo $row2["Resturents_name"]; ?></td>
                  <td><?php echo $row["COUNT(Order_id)"]; ?></td>
                </tr>
            <?php
              }
            }

            ?>
          </tbody>
        </table>
      </div>

    </div>
</section>



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