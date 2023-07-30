<?php
include('../inc/connection.php');
?>
<div class="featured">
  <h1>Featured</h1>
  <div class="featured_items">
    <?php

    $sql = "SELECT Food_id FROM `order` GROUP BY Food_id LIMIT 5";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {

        $food_id = $row["Food_id"];
        $sql3 = "SELECT * FROM `food` WHERE Food_id=$food_id";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3)
    ?>
        <div class="card">
        <img class="card-img" src="../assets/img/food_img/<?php echo $row["Food_id"];?>.jpg">
          <div class="card-info">
            <p class="text-title"><?php echo $row3["Food_name"]; ?></p>
            <p class="text-body"><?php echo $row3["Description"]; ?></p>
          </div>
          <div class="card-footer">
            <span class="text-title"><?php echo $row3["Price"]; ?>/-</span>
            <div class="card-button">
            <a href="./food.php?id=<?php echo $row3['Food_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                        </svg></a>
            </div>
          </div>
        </div>
    <?php
      }
    }

    ?>
  </div>
</div>