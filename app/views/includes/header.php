<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo SITENAME ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>
<body>
  <nav>
    <div class="navbar">
      <div class="brand-title">
        <a href="<?php echo URLROOT ?>"><?php echo SITENAME ?></a>
      </div>
      <div class="navbar-links">
        <?php if(isset($_SESSION['id'])) :?>
          <a href="<?php echo URLROOT?>/posts/add">Add a Post</a>
          <a href="<?php echo URLROOT?>/posts/show">Show your Posts</a>
          <a href="<?php echo URLROOT?>/posts/logout">Logout</a>
        <?php else: ?>
          <a href="<?php echo URLROOT?>/home/register">Register</a>
          <a href="<?php echo URLROOT?>/home/login">Login</a>
          <a href="<?php echo URLROOT?>/home/about">About Us</a>
        <?php endif; ?>
        
      </div> 
    </div>
  </nav>
