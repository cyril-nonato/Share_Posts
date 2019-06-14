<?php
  // Default controller
  class Home extends Controllers {

    public function __construct()
    {
      if(isLoggedIn()) {
        redirect('posts/index');
      } 
      $this->userModel = $this->model('User');
    }
    // Default method
    public function index() 
    {
      $data = [
        'description' => "A simple MVC framework for sharing posts"
      ];
      $this->view('home/index', $data);
    }
    
    public function about() 
    {
      $data = [
        'title' => SITENAME,
        'description' => "App that shares posts between users"
      ];
      $this->view('home/about',$data);
    }

    public function register() {
      if($_SERVER['REQUEST_METHOD'] === "POST") {
        // Register Validation
        if(isset($_POST['register'])) {
          $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'confirm_password' => $_POST['confirm_password'],
            'gender' => $_POST['gender'],
            'image'=> $_POST['gender'],
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
            'gender_err' => '',
          ];

          // Name
          if(!preg_match('/^([a-zA-Z\s]){3,}([a-zA-Z\s])?$/',$data['name'])) {
            $data['name_err'] = "Please enter a valid name";
          }

          // Email
          if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $data["email_err"] = "Please enter a valid email address";
          } else{
            if ($this->userModel->checkEmailForAnyMatches($data)) {
              $data["email_err"] = "Email is already in use";
            }
          } 

          // Password
          if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{6,}$/',$data['password'])) {
            $data['password_err'] = "Must have at least a digit, lowercase and uppercase letter and 6 characters long";
          }

          if ($data['password'] !== $data['confirm_password']) {
            $data['confirm_password_err'] = "Password doesn't match";
          }
          // Check for any Errors
          switch(true) {
            case !empty($data['name_err']):
            case !empty($data['email_err']):
            case !empty($data['password_err']):
            case !empty($data['confirm_password_err']):
              break;
            default:
              $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
              $this->userModel->register($data);
              flashRegister('registered','You can now logged in','registered');
              redirect('home/login');

          }
        }
      } else {
        $data = [
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'gender' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'gender_err' => ''
        ];
      }
      $this->view('home/register', $data);
    }

    public function login() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['login'])) {
          $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'email_err' => '',
            'password_err' => ''
          ];

          if(empty($data['email'])) {
            $data['email'] = 'Please type your email address';
            $this->view('home/login',$data);
          } 
          
          if($this->userModel->checkEmailForAnyMatches($data)) {
            $loggedInUser = $this->userModel->login($data);
            if($loggedInUser) {
              //Password matches the email address
              $_SESSION['id'] = $loggedInUser->id;
              $_SESSION['name_user'] = $loggedInUser->name_user;
              $_SESSION['email_user'] = $loggedInUser->email_user;
              $_SESSION['image_user'] = $loggedInUser->image_user;
              redirect('posts/index');
            } else {
              // Incorrect Password
              $data['password_err'] = 'Incorrect password';
              $this->view('home/login',$data);
            }
          } else {
              // Email address not found
              $data['email_err'] = 'Email is not registered';
              $this->view('home/login',$data);
          }

        }
      } else {
        // REQUEST METHOD = GET
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err'=> ''
        ];
        $this->view('home/login',$data);
      }
    }





  }
  
      