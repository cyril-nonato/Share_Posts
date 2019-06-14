<?php 
  /*
   * Flash message helper
   * EXAMPLE - flash ('register_success', 'You can now logged in!)
   * DISPLAY in VIEW - flash('register_success)
   */ 
  session_start();

  function flashMessage($name = "", $message = "", $class = "success") {
     if(!empty($name)) {
        if(!empty($message) && empty($_SESSION[$name])) {
          $_SESSION[$name] = $message;
          $_SESSION[$name . '_class'] = $class;
        } elseif(empty($message) && !empty($_SESSION[$name])) {
          echo '<div class=' .$class. '><div>' . $_SESSION[$name] . '</div></div>';
          unset($_SESSION[$name]);
          unset($_SESSION[$name  .'_class']);
        }
     }
  }
  
  function isLoggedIn() {
    if(isset($_SESSION['id'])) {
      return true;
    } else {
      return false;
    }
  }
