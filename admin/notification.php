<?php
include("sidebar.php");
?>
<section class="home-section">

  <nav>
    <div class="card active sidebar-button">
      <i class='bx bx-menu sidebarBtn'></i>
      <span class="dashboard">Notification</span>
    </div>

    <div class="profile-details">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
      </svg>
      <span class="admin_name"><?php echo $_SESSION['admin_name']; ?></span>

    </div>

    </div>
  </nav>

</section>


</body>

</html>