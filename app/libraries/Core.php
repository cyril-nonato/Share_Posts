<?php
  /*
   * App Core Class
   * Creates URL Format and loads Core Controllers
   * URL FORMAT = /controller/method/parameters
   */  
  class Core {
    // Default values
    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $parameters = [];

    public function __construct()
    {
      $url = $this->getUrl();

      // Check if the controller in the URL exists
      if(file_exists('../app/controllers/'. ucwords($url[0]) . '.php')) {
        // Set as current controller if it exists
        $this->currentController = ucwords($url[0]);
        // Unsets $url index 0
        unset($url[0]);
      }

      //Require the current controller
      require_once '../app/controllers/'. $this->currentController . '.php';
      
      // Instantiate the controller
      $this->currentController = new $this->currentController;

      // Checks URL index 1
      if(isset($url[1])) {
        // Check if method exists in the current controller
        if(method_exists($this->currentController,$url[1])) {
          
          //Set as current method if it exists
          $this->currentMethod = $url[1];

          // unset $url index 1 
          unset($url[1]);
        }
      }
      // Set the remaining url as paramters
      $this->parameters = $url ? array_values($url) : [];

      // Call current controller along its method and parameters
      call_user_func_array([$this->currentController,$this->currentMethod], $this->parameters);
    }
    
    //Make and gets URL based on URL Format
    public function getUrl() {
      if(isset($_GET['url'])) {
        $url = rtrim($_GET['url'],'/');
        $url = filter_var($url,FILTER_SANITIZE_URL);
        $url = explode('/',$url);
        return $url;
      }
    }
  }