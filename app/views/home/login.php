<?php require_once APPROOT . '/views/includes/header.php' ?>
  <section class="home-login">
    <div class="home-login-container">

      <?php echo flashMessage('registered') ?>

      <h2 class="section-title">Login</h2> 
      <form action="<?php echo URLROOT?>/home/login" method="POST">
        <div class="form_format">
          <input type="text" name="email" required value="<?php echo $data['email'] ?>">
          <label for="email" class="label-name">
            <span class="content-name">Email:</span>
          </label>
          <div class="form_err"><?php echo $data['email_err'] ?></div>
        </div>

        <div class="form_format">
          <input type="password" name="password" required value="<?php echo $data['password'] ?>">
          <label for="password" class="label-name">
            <span class="content-name">Password:</span>
          </label>
          <div class="form_err"><?php echo $data['password_err'] ?></div>
        </div>
        <div class="login-submit">
            <input class="btn" type="submit" name="login" value="Login">
          <div>
            <span>Don't have an account?</span>
            <a class="btn" href="<?php echo URLROOT ?>/home/login"> Register </a>
          </div>
        </div>
          
      </form>

    </div>
  </section>

<?php require_once APPROOT . '/views/includes/footer.php' ?>