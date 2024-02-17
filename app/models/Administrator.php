<?php
  class Administrator {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function register($data){
        $this->db->query('INSERT INTO administrators (admin_name, admin_email, admin_contact_no, admin_nic, admin_address, password, status) VALUES(:admin_name, :admin_email, :admin_contact_no, :admin_nic, :admin_address, :password, :status)');
        // Bind values
        try{
          $this->db->bind(':admin_name', $data['admin_name']);
          $this->db->bind(':admin_email', $data['admin_email']);
          $this->db->bind(':admin_contact_no', $data['admin_contact_no']);
          $this->db->bind(':admin_nic', $data['admin_nic']);
          $this->db->bind(':admin_address', $data['admin_address']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':status', 'Active');
  
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
      }
        catch (PDOException $e) {
          
          die($e->getMessage());
      }
      
      }

      public function getSales()
      {
          $this->db->query('SELECT start_date AS order_date,SUM(total) AS total_per_day from suborder where status = :status GROUP BY start_date ORDER BY start_date');
          // Bind values
          $this->db->bind(':status', 'Completed');
          $results = $this->db->resultSet();
          return $results;
      }

      public function addmoderator($data){
        $this->db->query('INSERT INTO moderators (moderator_name, moderator_email, moderator_contact_no, moderator_nic, moderator_address, password, type, status) VALUES(:moderator_name, :moderator_email, :moderator_contact_no, :moderator_nic, :moderator_address, :password, :type, :status)');
        // Bind values
        try{
          $this->db->bind(':moderator_name', $data['moderator_name']);
          $this->db->bind(':moderator_email', $data['moderator_email']);
          $this->db->bind(':moderator_contact_no', $data['moderator_contact_no']);
          $this->db->bind(':moderator_nic', $data['moderator_nic']);
          $this->db->bind(':moderator_address', $data['moderator_address']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':type', $data['type']);
          $this->db->bind(':status', 'Active');
  
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
      }
        catch (PDOException $e) {
          
          die($e->getMessage());
      }
      
      }

      public function getModerators(){
        $this->db->query('SELECT * FROM moderators WHERE status = "Active"');
        $results = $this->db->resultSet();
        return $results;
      }

      public function deleteModerator($moderator_id){
        $this->db->query('UPDATE moderators SET status = "Deactive" WHERE moderator_id = :moderator_id');
        // Bind values
        $this->db->bind(':moderator_id', $moderator_id);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function getUsers(){
        $this->db->query('SELECT * FROM users WHERE status = "Active"');
        $results = $this->db->resultSet();
        return $results;
      }
      
      
      public function deleteUser($id){
        $this->db->query('UPDATE user SET status = "Deactive" WHERE id = :id');
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
        $this->db->query('SELECT * FROM serviceproviders WHERE status = "Active"');
        $results = $this->db->resultSet();
        return $results;
      }

      public function deleteServiceProvider($serviceprovider_id){
        $this->db->query('UPDATE serviceproviders SET status = "Deactive" WHERE serviceprovider_id = :serviceprovider_id');
        // Bind values
        $this->db->bind(':serviceprovider_id', $serviceprovider_id);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }


    public function view($admin_id){
      $this->db->query('SELECT * FROM administrators WHERE admin_id = :admin_id'); 
      $this->db->bind(':admin_id', $admin_id);
      $results = $this->db->single();
      return $results;
    }

    // Login User
    public function login($admin_email, $password){
      $this->db->query('SELECT * FROM administrators WHERE admin_email = :admin_email AND status = "Active"');
      $this->db->bind(':admin_email', $admin_email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findAdministratorByEmail($admin_email){
      $this->db->query('SELECT * FROM administrators WHERE admin_email = :admin_email AND status = "Active"');
      // Bind value
      $this->db->bind(':admin_email', $admin_email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    public function findModeratorByEmail($moderator_email){
      $this->db->query('SELECT * FROM moderators WHERE moderator_email = :moderator_email AND status = "Active"');
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

    // Get User by ID
    public function getAdministratorById($admin_id){
      $this->db->query('SELECT * FROM administratorss WHERE admin_id = :admin_id AND status = "Active"');
      // Bind value
      $this->db->bind(':admin_id', $admin_id);

      $row = $this->db->single();

      return $row;
    }
  }