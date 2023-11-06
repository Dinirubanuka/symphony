<?php
  class ServiceProvider {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO serviceproviders ( business_name, business_address, business_contact_no, business_email, password,  owner_name, owner_address, owner_contact_no, owner_nic, owner_email, about) VALUES(:business_name, :business_address, :business_contact_no, :business_email, :password,  :owner_name, :owner_address, :owner_contact_no, :owner_nic, :owner_email, :about)');
      // Bind values
      try{
        $this->db->bind(':business_name', $data['business_name']);
        $this->db->bind(':business_address', $data['business_address']);
        $this->db->bind(':business_contact_no', $data['business_contact_no']);
        $this->db->bind(':business_email', $data['business_email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':owner_name', $data['owner_name']);
        $this->db->bind(':owner_address', $data['owner_address']);
        $this->db->bind(':owner_contact_no', $data['owner_contact_no']);
        $this->db->bind(':owner_nic', $data['owner_nic']);
        $this->db->bind(':owner_email', $data['owner_email']);
        $this->db->bind(':about', $data['about']);

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

    public function view($serviceprovider_id){
      $this->db->query('SELECT * FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id'); 
      $this->db->bind(':serviceprovider_id', $serviceprovider_id);
      $results = $this->db->single();
      return $results;
    }

    public function update($data){
        try {
            $this->db->query('UPDATE serviceproviders SET business_name  = :business_name , business_address = :business_address , business_contact_no = :business_contact_no , business_email = :business_email , owner_name = :owner_name, owner_address = :owner_address , owner_contact_no = :owner_contact_no , owner_email = :owner_email , about = :about WHERE serviceprovider_id = :serviceprovider_id');
            // Bind values
            $this->db->bind(':business_name', $data['business_name']);
            $this->db->bind(':business_address', $data['business_address']);
            $this->db->bind(':business_contact_no', $data['business_contact_no']);
            $this->db->bind(':business_email', $data['business_email']);
            $this->db->bind(':owner_name', $data['owner_name']);
            $this->db->bind(':owner_address', $data['owner_address']);
            $this->db->bind(':owner_contact_no', $data['owner_contact_no']);
            $this->db->bind(':owner_email', $data['owner_email']);
            $this->db->bind(':about', $data['about']);
            $this->db->bind(':serviceprovider_id', $_SESSION['serviceprovider_id']);
            // Execute
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Print the exception message
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
    public function photoUpdate($photo){
      try{
        $this->db->query('UPDATE serviceproviders SET profile_photo  = :photo WHERE serviceprovider_id = :id');
        $this->db->bind(':photo', $photo);
        $this->db->bind(':id', $_SESSION['serviceprovider_id']);
        if($this->db->execute()){
              return true;
          } else {
              return false;
          }
      } catch (PDOException $e) {
          // Print the exception message
          echo "Database error: " . $e->getMessage();
          return false;
      }
    }
    public function delete($serviceprovider_id){
      $this->db->query('DELETE FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id');
      $this->db->bind(':serviceprovider_id', $serviceprovider_id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login User
    public function serviceproviderlogin($business_email, $password){
      $this->db->query('SELECT * FROM serviceproviders WHERE business_email = :business_email');
      $this->db->bind(':business_email', $business_email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findserviceproviderByEmail($business_email){
      $this->db->query('SELECT * FROM serviceproviders WHERE business_email = :business_email');
      // Bind value
      $this->db->bind(':business_email', $business_email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

     public function findserviceproviderByEmailEdit($business_email){
      $this->db->query('SELECT * FROM serviceproviders WHERE business_email = :business_email');
      // Bind value
      $this->db->bind(':business_email', $business_email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }

    // Get User by ID
    public function getUserById($id){
      $this->db->query('SELECT * FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id');
      // Bind value
      $this->db->bind(':serviceprovider_id', $serviceprovider_id);

      $row = $this->db->single();

      return $row;
    }
  }