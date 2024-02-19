<?php
  class Moderator {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function view($moderator_id){
      $this->db->query('SELECT * FROM moderators WHERE moderator_id = :moderator_id AND status = "Active"'); 
      $this->db->bind(':moderator_id', $moderator_id);
      $results = $this->db->single();
      return $results;
    }

    // Login User
    public function login($moderator_email, $password){
      $this->db->query('SELECT * FROM moderators WHERE moderator_email = :moderator_email AND status = "Active"');
      $this->db->bind(':moderator_email', $moderator_email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    public function getReviews($product_id, $type){
      $this->db->query('SELECT * FROM reviews WHERE product_id = :product_id AND type = :type');
      $this->db->bind(':product_id', $product_id);
      $this->db->bind(':type', $type);
      $results = $this->db->resultSet();
      return $results;
    }

    public function viewUserOrders($id){
      $this->db->query('SELECT * FROM orders WHERE user_id = :id');
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
    }

    public function viewSPOrders($id){
      $this->db->query('SELECT * FROM suborder WHERE serviceprovider_id = :id');
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
    }

    public function getOrderData($order_id){
      $this->db->query('SELECT * FROM orders WHERE order_id = :order_id');
      $this->db->bind(':order_id', $order_id);
      $results = $this->db->single();
      return $results;
    }

    public function getSubOrderData($order_id){
      $this->db->query('SELECT * FROM suborder WHERE sorder_id = :sorder_id');
      $this->db->bind(':sorder_id', $order_id);
      $results = $this->db->single();
      return $results;
    }

    public function getEquipmentData($product_id){
      $this->db->query('SELECT * FROM products WHERE product_id = :product_id');
      $this->db->bind(':product_id', $product_id);
      $results = $this->db->single();
      return $results;
    }

    public function getStudioData($product_id){
      $this->db->query('SELECT * FROM studio WHERE product_id = :product_id');
      $this->db->bind(':product_id', $product_id);
      $results = $this->db->single();
      return $results;
    }

    public function getBandData($product_id){
      $this->db->query('SELECT * FROM band WHERE product_id = :product_id');
      $this->db->bind(':product_id', $product_id);
      $results = $this->db->single();
      return $results;
    }

    public function getSingerData($product_id){
      $this->db->query('SELECT * FROM singer WHERE product_id = :product_id');
      $this->db->bind(':product_id', $product_id);
      $results = $this->db->single();
      return $results;
    }

    public function getMusicianData($product_id){
      $this->db->query('SELECT * FROM musician WHERE product_id = :product_id');
      $this->db->bind(':product_id', $product_id);
      $results = $this->db->single();
      return $results;
    }

    public function getUserChat($chat_id){
      $this->db->query('SELECT * FROM chat_mod_user WHERE chat_id = :chat_id');
      $this->db->bind(':chat_id', $chat_id);
      $results = $this->db->single();
      return $results;
  }

  public function getUser($id){
    $this->db->query('SELECT * FROM users WHERE id = :id');
    $this->db->bind(':id', $id);
    $results = $this->db->single();
    return $results;
  }

  public function banServiceProvider($serviceprovider_id){
    $this->db->query('UPDATE serviceproviders SET status = "Banned" WHERE serviceprovider_id = :serviceprovider_id');
    $this->db->bind(':serviceprovider_id', $serviceprovider_id);
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function unbanServiceProvider($serviceprovider_id){
    $this->db->query('UPDATE serviceproviders SET status = "Active" WHERE serviceprovider_id = :serviceprovider_id');
    $this->db->bind(':serviceprovider_id', $serviceprovider_id);
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function banUser($id){
    $this->db->query('UPDATE users SET status = "Banned" WHERE id = :id');
    $this->db->bind(':id', $id);
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function unbanUser($id){
    $this->db->query('UPDATE users SET status = "Active" WHERE id = :id');
    $this->db->bind(':id', $id);
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function addChatModtoUser($data){
    $this->db->query('INSERT INTO chat_mod_user (user_id, moderator_id, created_by, chat_data, chat_date) VALUES(:user_id, :moderator_id, :created_by, :chat_data, :chat_date)');
    try {
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':moderator_id', $data['moderator_id']);
        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':chat_data', $data['chat_data']);
        $this->db->bind(':chat_date', $data['chat_date']);

        if ($this->db->execute()) {
            $this->db->query('SELECT LAST_INSERT_ID() AS entry_id');
            $result = $this->db->single();
            return $result->entry_id;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

public function addToInqChat($chat_id, $inquiry_id){
  $this->db->query('INSERT INTO inq_chat (chat_id, inquiry_id) VALUES(:chat_id, :inquiry_id)');
  try {
      $this->db->bind(':chat_id', $chat_id);
      $this->db->bind(':inquiry_id', $inquiry_id);
      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
  } catch (PDOException $e) {
      die($e->getMessage());
  }
}

public function getPendingRequests(){
  $this->db->query('SELECT * FROM serviceproviders WHERE status = "Pending"');
  $results = $this->db->resultSet();
  return $results;
}

public function getSP($serviceprovider_id){
  $this->db->query('SELECT * FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id');
  $this->db->bind(':serviceprovider_id', $serviceprovider_id);
  $results = $this->db->single();
  return $results;
}

public function acceptSP($serviceprovider_id){
  $this->db->query('UPDATE serviceproviders SET status = "Active" WHERE serviceprovider_id = :serviceprovider_id');
  $this->db->bind(':serviceprovider_id', $serviceprovider_id);
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

public function rejectSP($serviceprovider_id){
  $this->db->query('UPDATE serviceproviders SET status = "Rejected" WHERE serviceprovider_id = :serviceprovider_id');
  $this->db->bind(':serviceprovider_id', $serviceprovider_id);
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

    public function getInqIds($inquiry_id){
      $this->db->query('SELECT * FROM inq_chat WHERE inquiry_id = :inquiry_id');
      $this->db->bind(':inquiry_id', $inquiry_id);
      $results = $this->db->resultSet();
      return $results;
  }

    public function getUserData($id){
      $this->db->query('SELECT * FROM users WHERE id = :id AND status = "Active"');
      $this->db->bind(':id', $id);
      $results = $this->db->single();
      return $results;
    }

    public function getInquiry($inquiry_id){
      $this->db->query('SELECT * FROM inquiries WHERE inquiry_id = :inquiry_id');
      $this->db->bind(':inquiry_id', $inquiry_id);
      $results = $this->db->single();
      return $results;
  }

    public function getPendingInquiries(){
      $this->db->query('SELECT * FROM inquiries WHERE status = "Pending"');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getActiveInquiries($moderator_id){
      $this->db->query('SELECT * FROM inquiries WHERE status = "In-Progress" AND moderator_id = :moderator_id');
      $this->db->bind(':moderator_id', $moderator_id);
      $results = $this->db->resultSet();
      return $results;
    }

    public function getCompletedInquiries($moderator_id){
      $this->db->query('SELECT * FROM inquiries WHERE status = "Completed" AND moderator_id = :moderator_id');
      $this->db->bind(':moderator_id', $moderator_id);
      $results = $this->db->resultSet();
      return $results;
    }

    public function approveInquiry($inquiry_id, $moderator_id){
      $this->db->query('UPDATE inquiries SET status = "In-Progress", moderator_id = :moderator_id WHERE inquiry_id = :inquiry_id');
      $this->db->bind(':inquiry_id', $inquiry_id);
      $this->db->bind(':moderator_id', $moderator_id);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function completeInquiry($inquiry_id){
      $this->db->query('UPDATE inquiries SET status = "Completed" WHERE inquiry_id = :inquiry_id');
      $this->db->bind(':inquiry_id', $inquiry_id);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    // Find user by email
    public function findmoderatorByEmail($moderator_email){
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


    public function getUsers(){
      $this->db->query('SELECT * FROM users WHERE status = "Active"');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getBannedUsers(){
      $this->db->query('SELECT * FROM users WHERE status = "Banned"');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getDeactivatedUsers(){
      $this->db->query('SELECT * FROM users WHERE status = "Deactivated"');
      $results = $this->db->resultSet();
      return $results;
    }
    
    public function deleteUser($id){
      $this->db->query('UPDATE users SET status = "Deactive" WHERE id = :id');
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

    public function getRejectedServiceProviders(){
      $this->db->query('SELECT * FROM serviceproviders WHERE status = "Rejected"');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getDeactivatedServiceProviders(){
      $this->db->query('SELECT * FROM serviceproviders WHERE status = "Deactivated"');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getBannedServiceProviders(){
      $this->db->query('SELECT * FROM serviceproviders WHERE status = "Banned"');
      $results = $this->db->resultSet();
      return $results;
    }

    public function deleteServiceProvider($serviceprovider_id){
      $this->db->query('UPDATE serviceproviders SET status = "Deactive" WHERE serviceprovider_id = :serviceprovider_id AND status = "Active"');
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
      $this->db->query('SELECT * FROM moderators WHERE moderator_id = :moderator_id AND status = "Active"');
      // Bind value
      $this->db->bind(':moderator_id', $moderator_id);

      $row = $this->db->single();

      return $row;
    }
  }