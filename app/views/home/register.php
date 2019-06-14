<?php require_once APPROOT . '/views/includes/header.php' ?>
  
<section class="home-register">
    <div class="home-register-container">
      <h2 class="section-title">Register</h2>
        <form action="<?php echo URLROOT?>/home/register" method="POST" autocomplete="off">
      
          <div class="form_format">
            <input type="text" name="name" required value="<?php echo $data['name'] ?>">
            <label for="name" class="label-name">
              <span class="content-name">Name</span>
            </label>
            <div class="form_err"><?php echo $data['name_err'] ?></div>
          </div>
          
          <div class="gender">
            <label for="gender">Gender:</label>
            <select name="gender">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>

          <div class="form_format">
            <input type="text" name="email" required value="<?php echo $data['email'] ?>">
            <label for="email" class="label-name">
              <span class="content-name">Email</span>
            </label>
            <div class="form_err"><?php echo $data['email_err'] ?></div>
          </div>

          <div class="form_format">
            <input type="password" name="password" required value="<?php echo $data['password'] ?>">
            <label for="password" class="label-name">
              <span class="content-name">Password</span>
            </label>
            <div class="form_err"><?php echo $data['password_err'] ?></div>
          </div>

          <div class="form_format">
            <input type="password" name="confirm_password" required value="<?php echo $data['confirm_password'] ?>">
            <label for="confirm_password" class="label-name">
              <span class="content-name">Re-type password</span>
            </label>
            <div class="form_err"><?php echo $data['confirm_password_err'] ?></div>
          </div>

          <div class="register-submit">
            <input type="submit" class="btn" name="register" value="Register">
            <div>
              <span>Have an account?</span>
              <a class="btn" href="<?php echo URLROOT ?>/home/login"> Login </a>
            </div>
          </div>
        </form>
      </div>
  </section>
<?php require_once APPROOT . '/views/includes/footer.php' ?>