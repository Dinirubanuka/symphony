<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

  class Administrator {
    private $db;
    private $mail;

    public function __construct(){
      $this->db = new Database;
      $this->mail = new PHPMailer(true);
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

      public function getModerator($moderator_id){
        $this->db->query('SELECT * FROM moderators WHERE moderator_id = :moderator_id');
        $this->db->bind(':moderator_id', $moderator_id);
        $results = $this->db->single();
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
      
      public function getAllUsers(){
        $this->db->query('SELECT * FROM users');
        $results = $this->db->resultSet();
        return $results;
      }

      public function getAllSP(){
        $this->db->query('SELECT * FROM serviceproviders');
        $results = $this->db->resultSet();
        return $results;
      }

      public function getAllModerators(){
        $this->db->query('SELECT * FROM moderators');
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

    public function getSecurityData($user_id){
      $this->db->query('SELECT * FROM sec_queation WHERE user_id = :user_id AND user_type = :user_type');
      $this->db->bind(':user_id', $user_id);
      $this->db->bind(':user_type', 'Customer');
      $results = $this->db->single();
      return $results;
    }

    public function addLogData($data){
      $this->db->query('INSERT INTO logs (user_type, user_id, date_and_time, log_type, data) VALUES(:user_type, :user_id, :date_and_time, :log_type, :data)');
      try {
          $this->db->bind(':user_type', $data['user_type']);
          $this->db->bind(':user_id', $data['user_id']);
          $this->db->bind(':date_and_time', $data['date_and_time']);
          $this->db->bind(':log_type', $data['log_type']);
          $this->db->bind(':data', $data['data']);
          if ($this->db->execute()) {
              return true;
          } else {
              return false;
          }
      } catch (PDOException $e) {
          die($e->getMessage());
      }
  }

    public function getRecoverRequests($status){
      $this->db->query('SELECT * FROM recover_account_user WHERE status = :status');
      $this->db->bind(':status', $status);
      $results = $this->db->resultSet();
      return $results;
    }

    public function getRecoverRequest($recover_id){
      $this->db->query('SELECT * FROM recover_account_user WHERE recover_id = :recover_id');
      $this->db->bind(':recover_id', $recover_id);
      $results = $this->db->single();
      return $results;
    }

    public function updateRecoverRequest($request_id, $status){
      $this->db->query('UPDATE recover_account_user SET status = :status WHERE recover_id = :recover_id');
      $this->db->bind(':recover_id', $request_id);
      $this->db->bind(':status', $status);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function changeUserPassword($data){
      $this->db->query('UPDATE users SET password = :password WHERE id = :id');
      try {
          $this->db->bind(':id', $data['id']);
          $this->db->bind(':password', $data['password_hashed']);
          if ($this->db->execute()) {
              return true;
          } else {
              return false;
          }
      } catch (PDOException $e) {
          die($e->getMessage());
      }
    }

    public function sendPasswordEmail($data){
      $name = $data['name'];
      $email = $data['email'];
      $user_email = $data['user_email'];
      $pw = $data['password'];
      $this->mail->isSMTP();                                            //Send using SMTP
      $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $this->mail->Username = 'symphonyuscs@gmail.com';                     //SMTP username
      $this->mail->Password = 'wmoe qbsp fxcl bwqp';                               //SMTP password
      $this->mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $this->mail->setFrom('symphonyucsc@gmail.com', 'Symphony');
      $this->mail->addAddress($email, $name);     //Add a recipient

      //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $this->mail->isHTML(true);                                  //Set email format to HTML
      $this->mail->Subject = 'Recover Account - Symphony';
      $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      $this->mail->Body = '<div id="overview" style="border: 1px solid #343131;margin: auto;width: 50%;text-align: center">
        <h1 style="">Hello ' . $name . '</h1>
        <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">You have requested to recover you account.</p>
        <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
        <p style="font-size: 20px; color: #2e043a;">Please login to symphony using the following credentials, make sure to change your password once you log in. Thank you!</p>
        <p style="font-size: 24px; color: #333;  cursor: pointer; margin: 15px 10px;">Email: ' . $user_email . '</p>
        <p style="font-size: 24px; color: #333;  cursor: pointer; margin: 15px 10px;">Password: ' . $pw . '</p>
      </div>';
      $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if($this->mail->send()){
        return true;
      } else {
        return false;
      }
    }

    public function sendBanUserEmail($email, $name, $reason){
      $this->mail->isSMTP();                                            //Send using SMTP
      $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $this->mail->Username = 'symphonyuscs@gmail.com';                     //SMTP username
      $this->mail->Password = 'wmoe qbsp fxcl bwqp';                               //SMTP password
      $this->mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $this->mail->setFrom('symphonyucsc@gmail.com', 'Symphony');
      $this->mail->addAddress($email, $name);     //Add a recipient

      //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $this->mail->isHTML(true);                                  //Set email format to HTML
      $this->mail->Subject = 'Ban Account - Symphony';
      $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      $this->mail->Body = '<div id="overview" style="border: 1px solid #343131;margin: auto;width: 50%;text-align: center">
        <h1 style="">Hello ' . $name . '</h1>
        <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">We are sorry to inform you that your user account has been banned from Symphony due to the following reason. If you think we have made a mistake you can connect us through Symphony Login->Forgot Password->Other. Please make sure to specify your reason in detail. Thank you!</p>
        <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
        <p style="font-size: 20px; color: #2e043a;"> ' . $reason . ' </p>
      </div>';
      $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if($this->mail->send()){
        return true;
      } else {
        return false;
      }
    }

    public function sendUnbanUserEmail($data){
      $name = $data['name'];
      $email = $data['email'];
      $this->mail->isSMTP();                                            //Send using SMTP
      $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $this->mail->Username = 'symphonyuscs@gmail.com';                     //SMTP username
      $this->mail->Password = 'wmoe qbsp fxcl bwqp';                               //SMTP password
      $this->mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $this->mail->setFrom('symphonyucsc@gmail.com', 'Symphony');
      $this->mail->addAddress($email, $name);     //Add a recipient

      //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $this->mail->isHTML(true);                                  //Set email format to HTML
      $this->mail->Subject = 'Unban Account - Symphony';
      $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      $this->mail->Body = '<div id="overview" style="border: 1px solid #343131;margin: auto;width: 50%;text-align: center">
        <h1 style="">Hello ' . $name . '</h1>
        <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">We are pleased to inform you that your User account has been unbanned from Symphony! You can use your email and password to log into your account. Thank you!</p>
        <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
      </div>';
      $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if($this->mail->send()){
        return true;
      } else {
        return false;
      }
    }


    public function sendBanSPEmail($email, $name, $reason){
      $this->mail->isSMTP();                                            //Send using SMTP
      $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $this->mail->Username = 'symphonyuscs@gmail.com';                     //SMTP username
      $this->mail->Password = 'wmoe qbsp fxcl bwqp';                               //SMTP password
      $this->mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $this->mail->setFrom('symphonyucsc@gmail.com', 'Symphony');
      $this->mail->addAddress($email, $name);     //Add a recipient

      //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $this->mail->isHTML(true);                                  //Set email format to HTML
      $this->mail->Subject = 'Ban Account - Symphony';
      $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      $this->mail->Body = '<div id="overview" style="border: 1px solid #343131;margin: auto;width: 50%;text-align: center">
        <h1 style="">Hello ' . $name . '</h1>
        <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">We are sorry to inform you that your service provider account has been banned from Symphony due to the following reason. If you think we have made a mistake you can connect us through Symphony Login->Forgot Password->Other. Please make sure to specify your reason in detail. Thank you!</p>
        <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
        <p style="font-size: 20px; color: #2e043a;"> ' . $reason . ' </p>
      </div>';
      $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if($this->mail->send()){
        return true;
      } else {
        return false;
      }
    }

    public function sendUnbanSPEmail($data){
      $name = $data['name'];
      $email = $data['email'];
      $this->mail->isSMTP();                                            //Send using SMTP
      $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $this->mail->Username = 'symphonyuscs@gmail.com';                     //SMTP username
      $this->mail->Password = 'wmoe qbsp fxcl bwqp';                               //SMTP password
      $this->mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $this->mail->setFrom('symphonyucsc@gmail.com', 'Symphony');
      $this->mail->addAddress($email, $name);     //Add a recipient

      //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $this->mail->isHTML(true);                                  //Set email format to HTML
      $this->mail->Subject = 'Unban Account - Symphony';
      $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      $this->mail->Body = '<div id="overview" style="border: 1px solid #343131;margin: auto;width: 50%;text-align: center">
        <h1 style="">Hello ' . $name . '</h1>
        <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">We are pleased to inform you that your Service Provider account has been unbanned from Symphony! You can use your email and password to log into your account. Thank you!</p>
        <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
      </div>';
      $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if($this->mail->send()){
        return true;
      } else {
        return false;
      }
    }

    public function sendRecoverRejectionEmail($data){
      $name = $data['name'];
      $email = $data['email'];
      $reason = $data['reason'];
      $this->mail->isSMTP();                                            //Send using SMTP
      $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $this->mail->Username = 'symphonyuscs@gmail.com';                     //SMTP username
      $this->mail->Password = 'wmoe qbsp fxcl bwqp';                               //SMTP password
      $this->mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
      //Recipients
      $this->mail->setFrom('symphonyucsc@gmail.com', 'Symphony');
      $this->mail->addAddress($email, $name);     //Add a recipient
    
      //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
      //Content
      $this->mail->isHTML(true);                                  //Set email format to HTML
      $this->mail->Subject = 'Reject Account Recovery - Symphony';
      $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      $this->mail->Body = '<div id="overview" style="border: 1px solid #343131;margin: auto;width: 50%;text-align: center">
        <h1 style="">Hello ' . $name . '</h1>
        <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">We are sorry to inform you that your request to recover a user account with the user name ' . $name . ' has been rejected due to the following reason. Thank you!</p>
        <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
        <p style="font-size: 20px; color: #2e043a;"> ' . $reason . ' </p>
      </div>';
      $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
      if($this->mail->send()){
        return true;
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

    public function viewUserSubOrders($id){
      $this->db->query('SELECT * FROM suborder WHERE user_id = :id');
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

    public function getSubOrders(){
      $this->db->query('SELECT * FROM suborder');
      $results = $this->db->resultSet();
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

    public function getInstrumentCount(){
      $this->db->query('SELECT COUNT(*) as count FROM products');
      $results = $this->db->single();
      return $results;
    }

    public function getStudioCount(){
      $this->db->query('SELECT COUNT(*) as count FROM studio');
      $results = $this->db->single();
      return $results;
    }

    public function getBandCount(){
      $this->db->query('SELECT COUNT(*) as count FROM band');
      $results = $this->db->single();
      return $results;
    }

    public function getSingerCount(){
      $this->db->query('SELECT COUNT(*) as count FROM singer');
      $results = $this->db->single();
      return $results;
    }

    public function getMusicianCount(){
      $this->db->query('SELECT COUNT(*) as count FROM musician');
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

  public function getLogs(){
    $this->db->query('SELECT * FROM logs');
    $results = $this->db->resultSet();
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

  public function getUserData($id){
    $this->db->query('SELECT * FROM users WHERE id = :id AND status = "Active"');
    $this->db->bind(':id', $id);
    $results = $this->db->single();
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

  // Get User by ID
  public function getmoderatorById($moderator_id){
    $this->db->query('SELECT * FROM moderators WHERE moderator_id = :moderator_id AND status = "Active"');
    // Bind value
    $this->db->bind(':moderator_id', $moderator_id);

    $row = $this->db->single();

    return $row;
  }

  public function getLogIDNO($data){
    $this->db->query('SELECT * FROM logs WHERE user_id = :user_id AND user_type = :user_type AND date_and_time >= :from AND date_and_time <= :to');
    $this->db->bind(':user_id', $data['id']);
    $this->db->bind(':user_type', $data['type']);
    $this->db->bind(':from', $data['from']);
    $this->db->bind(':to', $data['to']);
    $results = $this->db->resultSet();
    return $results;
  }

  public function getLogID($data){
    $this->db->query('SELECT * FROM logs WHERE user_id = :user_id AND user_type = :user_type AND date_and_time >= :from AND date_and_time <= :to AND log_type = :option');
    $this->db->bind(':user_id', $data['id']);
    $this->db->bind(':user_type', $data['type']);
    $this->db->bind(':from', $data['from']);
    $this->db->bind(':to', $data['to']);
    $this->db->bind(':option', $data['option']);
    $results = $this->db->resultSet();
    return $results;
  }

  public function viewSPInvetory($id)
  {
      $this->db->query('SELECT * FROM products WHERE created_by = :id');
      $this->db->bind(':id', $id);
      $instruments = $this->db->resultSet();

      $this->db->query('SELECT * FROM musician WHERE created_by = :id');
      $this->db->bind(':id', $id);
      $musician = $this->db->resultSet();

      $this->db->query('SELECT * FROM band WHERE created_by = :id');
      $this->db->bind(':id', $id);
      $band = $this->db->resultSet();

      $this->db->query('SELECT * FROM studio WHERE created_by = :id');
      $this->db->bind(':id', $id);
      $studio = $this->db->resultSet();

      $this->db->query('SELECT * FROM singer WHERE created_by = :id');
      $this->db->bind(':id', $id);
      $singer = $this->db->resultSet();

      $data = [
          'instruments' => $instruments,
          'musician' => $musician,
          'band' => $band,
          'studio' => $studio,
          'singer' => $singer
      ];

      return $data;
  }

}