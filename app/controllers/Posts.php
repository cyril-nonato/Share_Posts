<?php

  class Posts extends Controllers {
    public function __construct() 
    {
      if(!isLoggedIn()) {
        redirect('home/index');
      }
      $this->postModel = $this->model('Post');
    }
    //Default method, show all the posts of all users
    public function index() {
      $results = $this->postModel->getPostsAll();
      $data = [
        'posts' => $results
      ];
      $this->view('posts/index', $data);
    }
    
    // Log out the current user
    public function logout() {
      unset($_SESSION['id']);
      unset($_SESSION['name']);
      unset($_SESSION['email']);
      unset($_SESSION['image']);
      session_destroy();
      redirect('home/login');
    }

    // Add a post 
    public function add() {
      // Checks for request method
      if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['add'])) {

          //Sanitize input
          $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          $data = [
            'users_id' => $_SESSION['id'],
            'title' => $_POST['title'],
            'body' => $_POST['body']
          ];
  


          switch(true) {
            case empty($data['body']):
            case empty($data['title']):
              redirect('posts/add');
              break;
            default:
              $this->postModel->addPost($data);
              redirect('posts');
          }
          $this->view('posts/add',$data);
        }
        
      } else {
        $data = [
          'title' => '',
          'body' => '',
        ];
  
        $this->view('posts/add',$data);
      }

    }
    // Show all posts of the current user
    public function show() {
      $user = [
        'users_id' => $_SESSION['id']
      ];
      $results = $this->postModel->getPostsUser($user);
      $data = [
        'results' => $results
      ];
      $this->view('posts/show', $data);
    }
    // Edit Post
    public function edit($id) {
      // Check for request method
      if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['submit'])) {
          $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          
          $data = [
            'id' => $id,
            'title' => $_POST['title'],
            'body' => $_POST['body'],
            'title_err' => '',
            'body_err' => ''
          ];
          // Validation
          if(empty($data['title'])) {
            $data['title_err'] = 'Please type the title of your post';
          }

          if(empty($data['body'])) {
            $data['body_err'] = 'Please type the content of your post';
          }

          if(empty($data['title_err'] && empty($data['body_err']))) {
            $this->postModel->editPostById($data);
            flashRegister('success','Post updated');
            redirect('posts/index');
          }
        }
        


      } else {
        // Get the specific post based on post id
        $post = $this->postModel->getPostById($id);

        // Check for post owner
        if($post->users_id != $_SESSION['id']) {
          redirect('posts/index');
        }

        $data = [
          'id' => $id,
          'title' => $post->title,
          'body' => $post->body,
          'title_err' => '',
          'body_err' => ''
        ];
      }

      $this->view('posts/edit' , $data);
    }

    public function delete($id) {

       // Get the specific post based on post id
       $post = $this->postModel->getPostById($id);

       // Check for post owner
       if($post->users_id != $_SESSION['id']) {
        redirect('posts/index');
       } else {
        $this->postModel->deletePostById($id);
        flashRegister('delete_post', 'Post successfulyl deleted', 'green');
        redirect('posts/index');
       }

    }
  }