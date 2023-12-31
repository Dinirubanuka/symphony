<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
class User {
    private $db;
    private $mail;

    public function __construct(){
        $this->db = new Database;
        $this->mail = new PHPMailer(true);
    }

    // Regsiter user
    public function register($data){
        $name=$data['name'];
        $email=$data['email'];
        $this->db->query('INSERT INTO users (name, email, TelephoneNumber, BirthDate, address, password,profile_photo ,gender,verification ) VALUES(:name, :email, :TelephoneNumber, :BirthDate, :address, :password, :photo,:gender,:verification )');
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
        $this->mail->Subject = 'Here is the subject';
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $this->mail->Body = '<div id="overview" style="border: 1px solid #343131;margin: auto;width: 50%;text-align: center">
          <h1 style="">Hello '.$name.'</h1>
          <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">Thank you for choosing Symphony. We are excited to have you on board!</p>
          <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
          <p style="font-size: 20px; color: #2e043a;">To complete your account creation, please use the following verification code:</p>
          <p style="font-size: 24px; color: #333;  cursor: pointer; margin: 15px 10px;">' . $verification_code . '</p>
        </div>';
        $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $this->mail->send();
           try{
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':TelephoneNumber', $data['tel_Number']);
            $this->db->bind(':BirthDate', $data['date']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':photo', $data['photo']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':verification',$verification_code);

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

    public function search(){
        $this->db->query('SELECT * FROM products'); 
        $results = $this->db->resultSet();
        return $results; 
      }

    public function cart($user_id){
        $this->db->query('SELECT * FROM products INNER JOIN cart WHERE products.product_id = cart.product_id AND cart.user_id = :user_id'); 
        $this->db->bind(':user_id', $user_id);
        $results = $this->db->resultSet();
        return $results; 
    }

    //view user
    public function view($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function viewitem($product_id){
        $this->db->query('SELECT * FROM products WHERE product_id = :product_id'); 
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->single();
        return $results;
    }

    public function viewreviews($product_id){
        $this->db->query('SELECT * FROM reviews INNER JOIN users WHERE product_id = :product_id'); 
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addtocart($data){
      
        $this->db->query('INSERT INTO cart (user_id, product_id, quantity, start_date, end_date) VALUES(:user_id, :product_id, :quantity, :start_date, :end_date)');

        try{
          $this->db->bind(':user_id', $data['user_id']);
          $this->db->bind(':product_id', $data['product_id']);
          $this->db->bind(':quantity', $data['quantity']);
          $this->db->bind(':start_date', $data['start_date']);
          $this->db->bind(':end_date', $data['end_date']);
  
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

      public function addreview($data){
      
        $this->db->query('INSERT INTO reviews (product_id, user_id, rating, content, name, photo) VALUES(:product_id, :user_id, :rating, :content, :name, :photo)');

        try{
          $this->db->bind(':product_id', $data['product_id']);
          $this->db->bind(':user_id', $data['user_id']);
          $this->db->bind(':rating', $data['rating']);
          $this->db->bind(':content', $data['content']);
          $this->db->bind(':name', $data['name']);
          $this->db->bind(':photo', $data['photo']);
  
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

    public function verificationNumber($finalNumber){
        try{
//            die($finalNumber);
            $this->db->query('SELECT * FROM users WHERE  verification= :verification');
            $this->db->bind(':verification', $finalNumber);
            $results = $this->db->single();
            $verification = $results->verification;
            if($verification == $finalNumber){
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e){
            echo "Database error: " . $e->getMessage();
            return false;
        }
}

//    update user
    public function update($data){
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
            $this->db->query('UPDATE users SET profile_photo  = :photo WHERE id = :id');
            $this->db->bind(':photo', $photo);
            $this->db->bind(':id', $_SESSION['user_id']);
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

    // ---delete acccount----
    public function fectchEncrptedPassword($id,$password){
        try{
            $this->db->query('SELECT password FROM users WHERE id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->single();
            $hashed_password = $results->password;
            if(password_verify($password, $hashed_password)){
                // $this->delete($id);
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e){
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    public function delete($id){

        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()){

            return true;
        } else {
            return false;
        }
    }

    public function removefromcart($product_id){

        $this->db->query('DELETE FROM cart WHERE product_id = :product_id');
        $this->db->bind(':product_id', $product_id);
        // Execute
        if($this->db->execute()){

            return true;
        } else {
            return false;
        }
    }


    // Login User
    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function findOtherUserByEmail($email,$id){
        $this->db->query('SELECT * FROM users WHERE email = :email AND id != :currentUserId');
        // Bind value
        $this->db->bind(':email', $email);
        $this->db->bind(':currentUserId', $id);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmailEdit($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

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
        $this->db->query('SELECT * FROM users WHERE id = :id');
        // Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}