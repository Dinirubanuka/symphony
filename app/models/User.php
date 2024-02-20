<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class User
{
    private $db;
    private $mail;

    public function __construct()
    {
        $this->db = new Database;
        $this->mail = new PHPMailer(true);
    }

    // Regsiter user
    public function register($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $this->db->query('INSERT INTO users (name, email, TelephoneNumber, BirthDate, address, password,profile_photo ,gender,verification, status, registration_date ) VALUES(:name, :email, :TelephoneNumber, :BirthDate, :address, :password, :photo,:gender,:verification, :status, :registration_date)');
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
        $this->mail->Subject = 'Registeration - Symphony';
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $this->mail->Body = '<div id="overview" style="border: 1px solid #343131;margin: auto;width: 50%;text-align: center">
          <h1 style="">Hello ' . $name . '</h1>
          <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">Thank you for choosing Symphony. We are excited to have you on board!</p>
          <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
          <p style="font-size: 20px; color: #2e043a;">To complete your account creation, please use the following verification code:</p>
          <p style="font-size: 24px; color: #333;  cursor: pointer; margin: 15px 10px;">' . $verification_code . '</p>
        </div>';
        $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $this->mail->send();
        try {
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':TelephoneNumber', $data['tel_Number']);
            $this->db->bind(':BirthDate', $data['date']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':photo', $data['photo']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':verification', $verification_code);
            $this->db->bind(':status', 'Active');
            $this->db->bing(':registration_date', $registration_date);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function sendRecoveryEmail($data){
        $email = $data['email'];
        $password = $data['password'];
        $name = $data['name'];
        $this->mail->isSMTP(); 
        $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $this->mail->Username = 'symphonyuscs@gmail.com';                     //SMTP username
        $this->mail->Password = 'wmoe qbsp fxcl bwqp';                               //SMTP password
        $this->mail->Port = 587;        
        $this->mail->setFrom('symphonyucsc@gmail.com', 'Symphony');
        $this->mail->addAddress($email, $name);
        $this->mail->isHTML(true);                                  //Set email format to HTML
        $this->mail->Subject = 'Recover Account - Symphony';
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $this->mail->Body = '<div id="overview" style="border: 1px solid #343131;margin: auto;width: 50%;text-align: center">
          <h1 style="">Hello ' . $name . '</h1>
          <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">Recover Account</p>
          <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
          <p style="font-size: 20px; color: #2e043a;">Please use the following temporary password to login to your Account!</p>
          <p style="font-size: 24px; color: #333;  cursor: pointer; margin: 15px 10px;">' . $password . '</p>
        </div>';
        $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $this->mail->send(); 
        try {
            $this->db->query('UPDATE users SET password = :password WHERE email = :email');
            $this->db->bind(':password', $data['password_hashed']);
            $this->db->bind(':email', $email);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addRecoveryRequest($data){
        $this->db->query('INSERT INTO recover_account_user (user_name, first_purchase_date, first_purchase_item, last_purchase_date, last_purchase_item, account_created_on, mobile_number, address, dob, gender, other, status, contactEmail, placed_on) VALUES(:user_name, :first_purchase_date, :first_purchase_item, :last_purchase_date, :last_purchase_item, :account_created_on, :mobile_number, :address, :dob, :gender, :other, :status, :contactEmail, :placed_on)');
        try {
            $this->db->bind(':user_name', $data['user_name']);
            $this->db->bind(':first_purchase_date', $data['first_purchase_date']);
            $this->db->bind(':first_purchase_item', $data['first_purchase_item']);
            $this->db->bind(':last_purchase_date', $data['last_purchase_date']);
            $this->db->bind(':last_purchase_item', $data['last_purchase_item']);
            $this->db->bind(':account_created_on', $data['account_created_on']);
            $this->db->bind(':mobile_number', $data['mobile_number']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':other', $data['other']);
            $this->db->bind(':status', $data['status']);
            $this->db->bind(':contactEmail', $data['contactEmail']);
            $this->db->bind(':placed_on', date('Y-m-d'));

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //view user
    public function view($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id AND status = "Active"');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function verificationNumber($finalNumber)
    {
        try {
//            die($finalNumber);
            $this->db->query('SELECT * FROM users WHERE  verification= :verification');
            $this->db->bind(':verification', $finalNumber);
            $results = $this->db->single();
            $verification = $results->verification;
            if ($verification == $finalNumber) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

//    update user
    public function update($data)
    {
        try {
            $this->db->query('UPDATE users SET name  = :name , email = :email , TelephoneNumber = :TelephoneNumber , BirthDate = :BirthDate , address = :address WHERE id = :id');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':TelephoneNumber', $data['tel_Number']);
            $this->db->bind(':BirthDate', $data['date']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':id', $_SESSION['user_id']);
            // Execute
            if ($this->db->execute()) {
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

    public function photoUpdate($photo)
    {
        try {
            $this->db->query('UPDATE users SET profile_photo  = :photo WHERE id = :id');
            $this->db->bind(':photo', $photo);
            $this->db->bind(':id', $_SESSION['user_id']);
            if ($this->db->execute()) {
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

    // ---delete acccount----
    public function fectchEncrptedPassword($id, $password)
    {
        try {
            $this->db->query('SELECT password FROM users WHERE id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->single();
            $hashed_password = $results->password;
            if (password_verify($password, $hashed_password)) {
                // $this->delete($id);
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    public function addPreviousPassword($user_id, $password)
    {
        try {
            $this->db->query('INSERT INTO user_passwords (user_id, password) VALUES(:user_id, :password)');
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':password', $password);
            if ($this->db->execute()) {
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

    public function getPreviousPasswords($user_id)
    {
        $this->db->query('SELECT * FROM user_passwords WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getUserByName($name)
    {
        $this->db->query('SELECT * FROM users WHERE name = :name AND status = "Active"');
        $this->db->bind(':name', $name);
        $results = $this->db->single();
        return $results;
    }

    public function addInquiry($data)
    {
        $this->db->query('INSERT INTO inquiries (user_id, inquiryType, field_1, field_2, field_3, field_4, field_5, photo_1, photo_2, photo_3, status, moderator_id, placed_on) VALUES(:user_id, :inquiryType, :field_1, :field_2, :field_3, :field_4, :field_5, :photo_1, :photo_2, :photo_3, :status, :moderator_id, :placed_on)');
        try {
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':inquiryType', $data['inquiryType']);
            $this->db->bind(':field_1', $data['field_1']);
            $this->db->bind(':field_2', $data['field_2']);
            $this->db->bind(':field_3', $data['field_3']);
            $this->db->bind(':field_4', $data['field_4']);
            $this->db->bind(':field_5', $data['field_5']);
            $this->db->bind(':photo_1', $data['photo_1']);
            $this->db->bind(':photo_2', $data['photo_2']);
            $this->db->bind(':photo_3', $data['photo_3']);
            $this->db->bind(':status', $data['status']);
            $this->db->bind(':moderator_id', $data['moderator_id']);
            $this->db->bind(':placed_on', date('Y-m-d'));
            
            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }

    public function getModerator($moderator_id){
        $this->db->query('SELECT * FROM moderators WHERE moderator_id = :moderator_id AND status = "Active"');
        $this->db->bind(':moderator_id', $moderator_id);
        $results = $this->db->single();
        return $results;
    }
    
    public function getInquiries($user_id)
    {
        $this->db->query('SELECT * FROM inquiries WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getInquiry($inquiry_id){
        $this->db->query('SELECT * FROM inquiries WHERE inquiry_id = :inquiry_id');
        $this->db->bind(':inquiry_id', $inquiry_id);
        $results = $this->db->single();
        return $results;
    }

    public function delete($id)
    {

        $this->db->query('UPDATE users SET status = "Deactive" WHERE id = :id');
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function addChatUserToMod($data){
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

    public function getInqIds($inquiry_id){
        $this->db->query('SELECT * FROM inq_chat WHERE inquiry_id = :inquiry_id');
        $this->db->bind(':inquiry_id', $inquiry_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getModChat($chat_id){
        $this->db->query('SELECT * FROM chat_mod_user WHERE chat_id = :chat_id');
        $this->db->bind(':chat_id', $chat_id);
        $results = $this->db->single();
        return $results;
    }

    // Login User
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email AND status = "Active"');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function findBannedUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email AND status = "Banned"');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addLoginHistory($data)
    {
        $this->db->query('INSERT INTO login_logout_logs (type, date_time, id) VALUES(:type, :date_time, :id)');
        try {
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':date_time', $data['date_time']);
            $this->db->bind(':id', $data['id']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email AND status = "Active"');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email AND status = "Active"');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        return $row;
    }

    public function findOtherUserByEmail($email, $id)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email AND id != :currentUserId AND status = "Active"');
        // Bind value
        $this->db->bind(':email', $email);
        $this->db->bind(':currentUserId', $id);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmailEdit($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email AND status = "Active"');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
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

    // Get User by ID
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id AND status = "Active"');
        // Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function inventory(){
        $this->db->query('SELECT * FROM products WHERE status = "Active"');
        $results = $this->db->resultSet();
        return $results;
    }

    public function studio(){
        $this->db->query('SELECT * FROM studio WHERE status = "Active"');
        $results = $this->db->resultSet();
        return $results;
    }

    public function singer(){
        $this->db->query('SELECT * FROM singer WHERE status = "Active"');
        $results = $this->db->resultSet();
        return $results;
    }

    public function band(){
        $this->db->query('SELECT * FROM band WHERE status = "Active"');
        $results = $this->db->resultSet();
        return $results;
    }

    public function musicians(){
        $this->db->query('SELECT * FROM musician');
        $results = $this->db->resultSet();
        return $results;
    }

    public function cart($user_id)
    {
        $this->db->query('SELECT * FROM  cart WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function viewItem($product_id)
    {
        $this->db->query('SELECT * FROM products WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->single();
        return $results;
    }

    public function viewStudio($studio_id)
    {
        $this->db->query('SELECT * FROM studio WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $studio_id);
        $results = $this->db->single();
        return $results;
    }

    public function viewSinger($singer_id)
    {
        $this->db->query('SELECT * FROM singer WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $singer_id);
        $results = $this->db->single();
        return $results;
    }

    public function viewBand($band_id)
    {
        $this->db->query('SELECT * FROM band WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $band_id);
        $results = $this->db->single();
        return $results;
    }

    public function viewMusician($musician_id)
    {
        $this->db->query('SELECT * FROM musician WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $musician_id);
        $results = $this->db->single();
        return $results;
    }

    public function checkProductPurchased($product_id, $user_id, $status)
    {
        $this->db->query('SELECT * FROM suborder WHERE product_id = :product_id AND user_id = :user_id AND status = :status');
        $this->db->bind(':product_id', $product_id);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':status', $status);
        $results = $this->db->resultSet();
        return $results;
    }

    public function checkAvailability($data_check)
    {
        $this->db->query('SELECT * FROM availability WHERE product_id = :product_id AND date = :date AND type = :type');
        $this->db->bind(':product_id', $data_check['product_id']);
        $this->db->bind(':date', $data_check['date']);
        $this->db->bind(':type', $data_check['type']);
        $results = $this->db->resultSet();
        return $results;
    }

    public function changePassword($data)
    {
        try {
            $this->db->query('UPDATE users SET password = :password WHERE id = :id');
            $this->db->bind(':password', $data['new_password']);
            $this->db->bind(':id', $data['user_id']);
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    public function setNotAvailableCart($product_id, $user_id, $type){
        try {
            $this->db->query('UPDATE cart SET availability  = :availability  WHERE product_id = :product_id AND user_id = :user_id AND type = :type');
            // Bind values
            $this->db->bind(':product_id', $product_id);
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':availability', 'notAvailable');
            $this->db->bind(':type', 'type');
            // Execute
            if ($this->db->execute()) {
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

    public function viewReviews($product_id, $type)
    {
        $this->db->query('SELECT * FROM reviews WHERE product_id = :product_id AND type = :type');
        $this->db->bind(':product_id', $product_id);
        $this->db->bind(':type', $type);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addToCart($data)
    {
        $this->db->query('INSERT INTO cart (user_id, product_id, quantity, start_date, end_date, days, total, availability, type) VALUES(:user_id, :product_id, :quantity, :start_date, :end_date, :days, :total, :availability, :type)');

        try {
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':start_date', $data['start_date']);
            $this->db->bind(':end_date', $data['end_date']);
            $this->db->bind(':days', $data['days']);
            $this->db->bind(':total', $data['total']);
            $this->db->bind(':availability', $data['availability']);
            $this->db->bind(':type', $data['type']);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            die($e->getMessage());
        }

    }

    public function getOrderData($sorder_id){
        $this->db->query('SELECT * FROM suborder WHERE sorder_id  = :sorder_id');
        $this->db->bind(':sorder_id ', $sorder_id );
        $results = $this->db->single();
        return $results;
    }

    public function removeAvailability($entry_id)
    {
        $this->db->query('DELETE FROM availability WHERE entry_id = :entry_id');
        $this->db->bind(':entry_id', $entry_id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCompleteOrders($user_id){
        $this->db->query('SELECT * FROM orders WHERE user_id= :user_id');
        $this->db->bind(':user_id', $user_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getOrders($user_id){
        $this->db->query('SELECT * FROM suborder WHERE user_id= :user_id');
        $this->db->bind(':user_id', $user_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function changeOrderStatus($sorder_id, $status)
    {
        try {
            $this->db->query('UPDATE suborder SET status = :status WHERE sorder_id = :sorder_id');
            $this->db->bind(':status', $status);
            $this->db->bind(':sorder_id', $sorder_id);
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    public function updateFinalOrder($amount, $order_id){
        try {
            $this->db->query('UPDATE orders SET total = total - :amount WHERE order_id = :order_id');
            $this->db->bind(':amount', $amount);
            $this->db->bind(':order_id', $order_id);
            $this->db->execute();
    
            return true;
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
    

    public function getItemData($product_id)
    {
        $this->db->query('SELECT * FROM products WHERE product_id = :product_id');
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->single();
        return $results;
    }

    public function getStudioData($studio_id)
    {
        $this->db->query('SELECT * FROM studio WHERE product_id = :product_id');
        $this->db->bind(':product_id', $studio_id);
        $results = $this->db->single();
        return $results;
    }

    public function getSingerData($singer_id)
    {
        $this->db->query('SELECT * FROM singer WHERE product_id = :product_id');
        $this->db->bind(':product_id', $singer_id);
        $results = $this->db->single();
        return $results;
    }

    public function getBandData($band_id)
    {
        $this->db->query('SELECT * FROM band WHERE product_id = :product_id');
        $this->db->bind(':product_id', $band_id);
        $results = $this->db->single();
        return $results;
    }

    public function getMusicianData($musician_id)
    {
        $this->db->query('SELECT * FROM musician WHERE product_id = :product_id');
        $this->db->bind(':product_id', $musician_id);
        $results = $this->db->single();
        return $results;
    }

    public function getServiceProviderData($serviceprovider_id){
        $this->db->query('SELECT * FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id AND status = "Active"');
        $this->db->bind(':serviceprovider_id', $serviceprovider_id);
        $results = $this->db->single();
        return $results;
    }

    public function getSubOrderId($data){
        $this->db->query('SELECT sorder_id FROM suborder WHERE user_id = :user_id AND serviceprovider_id = :serviceprovider_id AND product_id = :product_id AND qty = :qty AND start_date = :start_date AND end_date = :end_date AND days = :days AND total = :total AND status = :status AND type = :type AND order_placed_on = :order_placed_on');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':serviceprovider_id', $data['serviceprovider_id']);
        $this->db->bind(':product_id', $data['product_id']);
        $this->db->bind(':qty', $data['quantity']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':days', $data['days']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':order_placed_on', $data['order_placed_on']);
        $results = $this->db->single();
        return $results;
    }

    public function placeOrder($data)
    {
            $this->db->query('INSERT INTO suborder (user_id, serviceprovider_id, product_id, qty, start_date, end_date, days, total, status, avail, type, order_placed_on) VALUES(:user_id, :serviceprovider_id, :product_id, :qty, :start_date, :end_date, :days, :total, :status, :avail , :type, :order_placed_on)');
    
            try {
                $this->db->bind(':user_id', $data['user_id']);
                $this->db->bind(':serviceprovider_id', $data['serviceprovider_id']);
                $this->db->bind(':product_id', $data['product_id']);
                $this->db->bind(':qty', $data['quantity']);
                $this->db->bind(':start_date', $data['start_date']);
                $this->db->bind(':end_date', $data['end_date']);
                $this->db->bind(':days', $data['days']);
                $this->db->bind(':total', $data['total']);
                $this->db->bind(':status', $data['status']);
                $this->db->bind(':avail', $data['avail']);
                $this->db->bind(':type', $data['type']);
                $this->db->bind(':order_placed_on', $data['order_placed_on']);

                // Execute
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
    
                die($e->getMessage());
            }
    }

    public function clearCart($user_id)
    {
        $this->db->query('DELETE FROM cart WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);

        // Execute
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function placeOrderTotal($data_order){
        $this->db->query('INSERT INTO orders (user_id, sorder_id, total, order_placed_on) VALUES(:user_id, :sorder_id, :total, :order_placed_on)');
    
        try {
            $this->db->bind(':user_id', $data_order['user_id']);
            $this->db->bind(':sorder_id', $data_order['sorder_id']);
            $this->db->bind(':total', $data_order['total']);
            $this->db->bind(':order_placed_on', $data_order['order_placed_on']);
            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }

    public function setAvailability($data){
        $this->db->query('INSERT INTO availability (product_id, date, qty, type) VALUES(:product_id, :date, :qty , :type)');
    
        try {
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':qty', $data['quantity']);
            $this->db->bind(':type', $data['type']);
            
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
    

    public function removeFromCart($product_id)
    {
        $this->db->query('DELETE FROM cart WHERE product_id = :product_id');
        $this->db->bind(':product_id', $product_id);

        // Execute
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function addReview($data)
    {

        $this->db->query('INSERT INTO reviews (product_id, user_id, rating, content, name, photo, placed_on, type) VALUES(:product_id, :user_id, :rating, :content, :name, :photo, :placed_on , :type)');

        try {
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':rating', $data['rating']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':photo', $data['photo']);
            $this->db->bind(':placed_on', date('Y-m-d'));
            $this->db->bind(':type', $data['category']);


            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            die($e->getMessage());
        }

    }
}