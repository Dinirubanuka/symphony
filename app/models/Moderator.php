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
    public function getmoderatorById($moderator_id){
      $this->db->query('SELECT * FROM moderators WHERE moderator_id = :moderator_id');
      // Bind value
      $this->db->bind(':moderator_id', $moderator_id);

      $row = $this->db->single();

      return $row;
    }
  }