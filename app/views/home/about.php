<?php require_once APPROOT . '/views/includes/header.php' ?>
  <div class="home-about">
    <div class="home-about-container">
      <h3>Title: <?php echo $data['title']; ?></h3>
      <p><?php echo $data['description']; ?></p>
      <p>App Version: <strong><?php echo APPVERSION ?></strong></p>
    </div>
  </div>
  
<?php require_once APPROOT . '/views/includes/footer.php' ?>