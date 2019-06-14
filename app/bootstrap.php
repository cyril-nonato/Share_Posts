<?php
  // Load Helpers
  require_once 'helpers/session_helper.php';
  require_once 'helpers/url_helper.php';
  require_once 'helpers/time_ago_helper.php';
  // Load Config File
  require_once 'config/config.php';

  // Auto-load libraries
  spl_autoload_register(function($className) {
    require_once 'libraries/'. $className . '.php';
  });