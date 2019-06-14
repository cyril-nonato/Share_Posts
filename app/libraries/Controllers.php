<?php

  /*
   * Base Controller
   * Loads the view and model
   */
  
  class Controllers {
    //Loads the model
    public function model($model) {

      //Require the model file
      require_once '../app/models/' . $model . '.php';

      //Instantiate the model
      return new $model();
    }
    //Loads the view
    public function view($view, $data = []) {

      // Check if the view exists
      if(file_exists('../app/views/' . $view . '.php')) {
        require_once '../app/views/' . $view . '.php';
      } else {
        die('View does not exists');
      }


    }
  }