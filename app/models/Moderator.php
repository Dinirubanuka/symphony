<?php
  class Moderator {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function view($moderator_id){
      $this->db->query('SELECT * FROM moderators WHERE moderator_id = :moderator_id'); 
      $this->db->bind(':moderator_id', $moderator_id);
      $results = $this->db->single();
      return $results;
    }

    // Login User
    public function login($moderator_email, $password){
      $this->db->query('SELECT * FROM moderators WHERE moderator_email = :moderator_email');
      $this->db->bind(':moderator_email', $moderator_email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findmoderatorByEmail($moderator_email){
      $this->db->query('SELECT * FROM moderators WHERE moderator_email = :moderator_email');
      // Bind value
      $this->db->bind(':moderator_email', $moderator_email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }


    public function getUsers(){
      $this->db->query('SELECT * FROM users');
      $results = $this->db->resultSet();
      return $results;
    }
    
    
    public function deleteUser($id){
      $this->db->query('DELETE FROM users WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getServiceProviders(){
      $this->db->query('SELECT * FROM serviceproviders');
      $results = $this->db->resultSet();
      return $results;
    }

    public function deleteServiceProvider($serviceprovider_id){
      $this->db->query('DELETE FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id');
      // Bind values
      $this->db->bind(':serviceprovider_id', $serviceprovider_id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Get User by ID
    public function getmoderatorById($moderator_id){
      $this->db->query('SELECT * FROM moderators WHERE moderator_id = :moderator_id');
      // Bind value
      $this->db->bind(':moderator_id', $moderator_id);

      $row = $this->db->single();

      return $row;
    }
  }