<div class="featured">
    <h1>Featured</h1>
    <div class="featured_items">
    <?php
    for ($i = 0; $i <= 5; $i++) {
      echo '<div class="card">
      <div class="card-img"></div>
      <div class="card-info">
          <p class="text-title">Product title </p>
          <p class="text-body">Product description and details</p>
      </div>
      <div class="card-footer">
          <span class="text-title">$499.49</span>
          <div class="card-button">
          <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
        </svg></a>
          </div>
      </div>
  </div>';
    }
    ?>
    </div>
</div>