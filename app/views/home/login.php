<?php require_once APPROOT . '/views/includes/header.php' ?>
  <div class="home-login">
    <div>
    <?php flashRegister('registered') ?>
    <form action="<?php echo URLROOT?>/home/login" method="POST">
      <div class="home-login-email">
        <label for="email">Email: </label>
        <input type="text" name="email" value='<?php echo $data['email'] ?>'>
        <p><?php echo $data['email_err']; ?></p>
      </div>
      <div class="home-login-password">
        <label for="password">Password: </label>
        <input type="password" name="password">
        <p><?php echo $data['password_err']; ?></p>
      </div>
      <span>Don't have an account? <a href="<?php echo URLROOT ?>/home/register">Register Here</a></span>
      <input type="submit" name="login" value="Login">
    </form> 
    </div>
    
  </div>

<?php require_once APPROOT . '/views/includes/footer.php' ?>