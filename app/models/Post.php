<?php

  class Post {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }
    // Shows all posts of all the users
    public function getPostsAll() {
      $this->db->query('SELECT *,
                        posts.id as postsId,
                        users.id as usersId,
                        posts.created_at as postsCreated,
                        users.created_at as usersCreated
                        FROM posts 
                        INNER JOIN users 
                        ON posts.users_id = users.id
                        ORDER BY posts.created_at DESC');

      $results =  $this->db->fetchAll();
      return $results;
    }
    // Add a single post
    public function addPost($data) {
      $this->db->query('INSERT INTO posts (users_id,title,body) VALUES
                      (:users_id,:title,:body)');

      $this->db->bind(':users_id', $data['users_id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      $this->db->execute();
    }
    // Getting all the posts of the current user
    public function getPostsUser($data) {
      $this->db->query('SELECT * FROM posts WHERE users_id = :users_id');
    
      $this->db->bind(':users_id', $data['users_id']);
      $results = $this->db->fetchAll();
      return $results;
    }
    // Get posts based on post id
    public function getPostById($id) {
      $this->db->query('SELECT * FROM posts WHERE id = :id');
      $this->db->bind(':id', $id);
      $result = $this->db->fetch();
      return $result;
    }

    // Edit a single post based on database table posts, id
    public function editPostById($data) {
      $this->db->query('UPDATE posts SET title = :title, body = :body, updated_at = :updated_at WHERE id = :id');
      
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':updated_at', date('Y-m-d H:i:s'));
      $this->db->execute();
    }

    public function deletePostById($id) {
      $this->db->query('DELETE FROM posts WHERE id = :id');

      $this->db->bind(':id', $id);
      $this->db->execute();
    }
  }