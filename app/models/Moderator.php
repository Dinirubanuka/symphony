<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

  class Moderator {
    private $db;
    private $mail;

    public function __construct(){
      $this->db = new Database;
      $this->mail = new PHPMailer(true);
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

    public function getAllUsers(){
      $this->db->query('SELECT * FROM users');
      $results = $this->db->resultSet();
      return $results;
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