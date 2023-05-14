<!DOCTYPE html>
<html land="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/restaurent.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>    
<body>
  <div class="sidebar">
    <div class="logo-details">
    <img src="./img/lo.png">
    </div>
      <ul class="nav-links"> 
        <li>
        <a href="dashboard.php" onclick="toggleMenu(); " >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="resturent_list.php" onclick="toggleMenu(); ">
            <i class='bx bx-box' ></i>
            <span class="links_name">Resturents List</span>
          </a>
        </li>
        <li>
          <a href="food.php" onclick="toggleMenu(); ">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Food List</span>
          </a>
        </li>
        <li>
          <a href="order.php" onclick="toggleMenu(); ">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Total Orders</span>
          </a>
        </li>
        <li>
          <a href="add_resturent.php" onclick="toggleMenu(); ">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Add Restaurent</span>
          </a>
        </li>
        <li>
          <a href="add_food.php" onclick="toggleMenu(); ">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Add Food</span>
          </a>
        </li>
        <li>
          <a href="notification.php" onclick="toggleMenu(); ">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Notifications</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>	