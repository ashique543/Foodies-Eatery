<?php
include("sidebar.php");
include('../inc/connection.php');
?>
<section class="home-section">

  <nav>
    <div class="card active sidebar-button">
      <i class='bx bx-menu sidebarBtn'></i>
      <span class="dashboard">Food List</span>
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
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
        <th>Rating</th>
        <th>Resturent Name</th>
        <th> </th>
      </tr>
    </thead>
    <tbody>
      <?php

      $sql = "select * from food";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $res_id = $row["Resturent_id"];
          $sql2 = "SELECT Resturents_name FROM `resturent` WHERE Resturent_id=$res_id";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
      ?>
          <tr>
            <td><?php echo $row["Food_id"]; ?></td>
            <td><?php echo $row["Food_name"]; ?></td>
            <td><?php echo $row["Description"]; ?></td>
            <td><?php echo $row["Price"]; ?></td>
            <td><?php echo $row["Category"]; ?></td>
            <td><?php echo $row["Rating"]; ?></td>
            <td><?php echo $row2["Resturents_name"]; ?></td>
            <td>
              <form action="manage_dashbord.php" method="post">
                <input type="hidden" name="item" value="<?php echo $row["Food_id"]; ?>">
                <button name="remove_food" class="button-5" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                  </svg></button>
              </form>
            </td>

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
        [7],
        [7]
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