<?php

  class User {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }
    //Check email for any match
    public function checkEmailForAnyMatches($data) {
      $this->db->query('SELECT * FROM users WHERE email_user = :email_user');
      $this->db->bind(':email_user',$data['email']);
      $this->db->fetch();
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
    // Verify email and password
    public function login($data) {
      $this->db->query('SELECT * FROM users WHERE email_user = :email_user');
      $this->db->bind(':email_user',$data['email']);
      $result = $this->db->fetch();
      $hashed_password = $result->password_user;
      if(password_verify($data['password'],$hashed_password)) {
        // login
        return $result;
      } else {
        return false;
      }
    }
      
    // Register User
    public function register($data) {
      $this->db->query('INSERT INTO users(name_user,gender_user,email_user,password_user,image_user)
        VALUES(:name_user,:gender_user,:email_user,:password_user,:image_user);');
      $this->db->bind(':name_user',$data['name']);
      $this->db->bind(':gender_user',$data['gender']);
      $this->db->bind(':email_user',$data['email']);
      $this->db->bind(':password_user',$data['password']);
      $this->db->bind(':image_user',($data['image'] . '.png'));
      $this->db->execute();
    }
    
    
  }