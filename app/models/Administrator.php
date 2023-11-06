<?php
  class Administrator {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function register($data){
        $this->db->query('INSERT INTO administrators (admin_name, admin_email, admin_contact_no, admin_nic, admin_address, password) VALUES(:admin_name, :admin_email, :admin_contact_no, :admin_nic, :admin_address, :password)');
        // Bind values
        try{
          $this->db->bind(':admin_name', $data['admin_name']);
          $this->db->bind(':admin_email', $data['admin_email']);
          $this->db->bind(':admin_contact_no', $data['admin_contact_no']);
          $this->db->bind(':admin_nic', $data['admin_nic']);
          $this->db->bind(':admin_address', $data['admin_address']);
          $this->db->bind(':password', $data['password']);
  
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

      public function addmoderator($data){
        $this->db->query('INSERT INTO moderators (moderator_name, moderator_email, moderator_contact_no, moderator_nic, moderator_address, password, type) VALUES(:moderator_name, :moderator_email, :moderator_contact_no, :moderator_nic, :moderator_address, :password, :type)');
        // Bind values
        try{
          $this->db->bind(':moderator_name', $data['moderator_name']);
          $this->db->bind(':moderator_email', $data['moderator_email']);
          $this->db->bind(':moderator_contact_no', $data['moderator_contact_no']);
          $this->db->bind(':moderator_nic', $data['moderator_nic']);
          $this->db->bind(':moderator_address', $data['moderator_address']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':type', $data['type']);
  
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


    public function view($admin_id){
      $this->db->query('SELECT * FROM administrators WHERE admin_id = :admin_id'); 
      $this->db->bind(':admin_id', $admin_id);
      $results = $this->db->single();
      return $results;
    }

//  public function update($data){
//     try {
//         $this->db->query('UPDATE users SET name  = :name , email = :email , TelephoneNumber = :TelephoneNumber , BirthDate = :BirthDate , address = :address WHERE id = :id');
//         // Bind values
//         $this->db->bind(':name', $data['name']);
//         $this->db->bind(':email', $data['email']);
//         $this->db->bind(':TelephoneNumber', $data['tel_Number']);
//         $this->db->bind(':BirthDate', $data['date']);
//         $this->db->bind(':address', $data['address']);
//         $this->db->bind(':id', $_SESSION['user_id']);
//         // Execute
//         if($this->db->execute()){
//             return true;
//         } else {
//             return false;
//         }
//     } catch (PDOException $e) {
//         // Print the exception message
//         echo "Database error: " . $e->getMessage();
//         return false;
//     }
//   }

    // public function delete($id){
    //   $this->db->query('DELETE FROM users WHERE id = :id');
    //   $this->db->bind(':id', $id);

    //   // Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }


    // Login User
    public function login($admin_email, $password){
      $this->db->query('SELECT * FROM administrators WHERE admin_email = :admin_email');
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
      $this->db->query('SELECT * FROM administrators WHERE admin_email = :admin_email');
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

    //  public function findUserByEmailEdit($email){
    //   $this->db->query('SELECT * FROM users WHERE email = :email');
    //   // Bind value
    //   $this->db->bind(':email', $email);

    //   $row = $this->db->single();

    //   // Check row
    //   if($this->db->rowCount() > 0){
    //     return $row;
    //   } else {
    //     return false;
    //   }
    // }

    // Get User by ID
    public function getAdministratorById($admin_id){
      $this->db->query('SELECT * FROM administratorss WHERE admin_id = :admin_id');
      // Bind value
      $this->db->bind(':admin_id', $admin_id);

      $row = $this->db->single();

      return $row;
    }
  }