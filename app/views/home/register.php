<?php require_once APPROOT . '/views/includes/header.php' ?>
  
<section class="register-container">
      <form action="<?php echo URLROOT?>/home/register" method="POST" autocomplete="off">
        <h2>Register</h2>
        <div class="register-form">
          <input type="text" name="name" required value="<?php echo $data['name'] ?>">
          <label for="name" class="label-name">
            <span class="content-name">Name</span>
          </label>
          <div class="register_err"><?php echo $data['name_err'] ?></div>
        </div>
        <div class="gender">
          <label for="gender">Gender:</label>
          <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="register-form">
          <input type="text" name="email" required value="<?php echo $data['email'] ?>">
          <label for="email" class="label-name">
            <span class="content-name">Email</span>
          </label>
          <div class="register_err"><?php echo $data['email_err'] ?></div>
        </div>

        <div class="register-form">
          <input type="password" name="password" required value="<?php echo $data['password'] ?>">
          <label for="password" class="label-name">
            <span class="content-name">Password</span>
          </label>
          <div class="register_err"><?php echo $data['password_err'] ?></div>
        </div>

        <div class="register-form">
          <input type="password" name="confirm_password" required value="<?php echo $data['confirm_password'] ?>">
          <label for="confirm_password" class="label-name">
            <span class="content-name">Re-type password</span>
          </label>
          <div class="register_err"><?php echo $data['confirm_password_err'] ?></div>
        </div>

        <div class="register-submit">
          <input type="submit" name="register" value="Register">
          <span class="have-an-account">Have an account? <a href="<?php echo URLROOT ?>/home/login"> Login</span>
        </div>
      </form>
  </section>
<?php require_once APPROOT . '/views/includes/footer.php' ?>