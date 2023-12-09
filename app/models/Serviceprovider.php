<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
  class ServiceProvider {
    private $db;
    private $mail;

    public function __construct(){
      $this->db = new Database;
      $this->mail = new PHPMailer(true);
    }

    public function additem($data){
      
      $this->db->query('INSERT INTO products (created_by, category, brand, model, quantity, unit_price, photo_1, photo_2, photo_3, Title, Description, outOfStock, brass, warranty) VALUES(:created_by, :category, :brand, :model, :quantity, :unit_price, :photo_1, :photo_2, :photo_3, :title, :description, :outOfStock, :brass, :sounds, :warranty)');

        if($data['category'] !== 'Brass' ){
            $data['bandOrchestraCategories'] = null;
        }
        if ($data['category'] !=='sounds'){
            $data['homeAudioCategory'] = null;
        }
      try{
        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':model', $data['model']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':unit_price', $data['unit_price']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':photo_1', $data['photo_1']);
        $this->db->bind(':photo_2', $data['photo_2']);
        $this->db->bind(':photo_3', $data['photo_3']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':outOfStock', $data['outOfStock']);
        $this->db->bind(':brass', $data['bandOrchestraCategories']);
        $this->db->bind(':sounds', $data['homeAudioCategory']);
        $this->db->bind(':outOfStock', $data['outOfStock']);
        $this->db->bind(':warranty', $data['warranty']);

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

    public function editPhoto($product_id,$data,$photo_num){
        if ($photo_num == 'photo_1'){
            try{
                $this->db->query('UPDATE products SET photo_1 = :photo_1 WHERE product_id = :product_id');
                $this->db->bind(':photo_1',$data['photo_1']);
                $this->db->bind(':product_id',$product_id);
                $this->db->execute();
            } catch (PDOException $e){
                echo "Database error: " . $e->getMessage();
                return false;
            }
        }else if ($photo_num == 'photo_2'){
            try{
                $this->db->query('UPDATE products SET photo_2 = :photo_2 WHERE product_id = :product_id');
                $this->db->bind(':photo_2',$data['photo_2']);
                $this->db->bind(':product_id',$product_id);
                $this->db->execute();
            } catch (PDOException $e){
                echo "Database error: " . $e->getMessage();
                return false;
            }

        }else if($photo_num == 'photo_3'){
            try{
                $this->db->query('UPDATE products SET photo_3 = :photo_3 WHERE product_id = :product_id');
                $this->db->bind(':photo_3',$data['photo_3']);
                $this->db->bind(':product_id',$product_id);
                $this->db->execute();
            } catch (PDOException $e){
                echo "Database error: " . $e->getMessage();
                return false;
            }
        }
    }

    public function editItem($product_id,$data){
        try{
            if($data['category'] !== 'Brass' || $data['category'] !=='sounds' ){
                $data['bandAndOrchestraCategory'] = null;
                $data['homeAudioCategory'] = null;
            }
            $this->db->query('UPDATE products SET category  = :category , brand = :brand , model = :model , quantity = :quantity , unit_price = :unit_price , Description = :description , outOfStock = :outOfStock , brass = :bandOrchestraCategories , sounds = :homeAudioCategory  WHERE product_id = :product_id');
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':brand', $data['brand']);
            $this->db->bind(':model', $data['model']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':unit_price', $data['unit_price']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':outOfStock', $data['outOfStock']);
            $this->db->bind(':bandOrchestraCategories', $data['bandOrchestraCategories']);
            $this->db->bind(':homeAudioCategory', $data['homeAudioCategory']);
            $this->db->bind(':product_id',$product_id );

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
    // Regsiter user
    public function register($data){
      $name=$data['business_name'];
      $email=$data['business_email'];
      $this->db->query('INSERT INTO serviceproviders ( business_name, business_address, business_contact_no, business_email, password,  owner_name, owner_address, owner_contact_no, owner_nic, owner_email, about, profile_photo, verification) VALUES(:business_name, :business_address, :business_contact_no, :business_email, :password,  :owner_name, :owner_address, :owner_contact_no, :owner_nic, :owner_email, :about, :photo, :verification)');
      $this->mail->isSMTP();                                            //Send using SMTP
      $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $this->mail->Username = 'symphonyuscs@gmail.com';                     //SMTP username
      $this->mail->Password = 'wmoe qbsp fxcl bwqp';                               //SMTP password
      $this->mail->Port = 587;
      
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
        $this->db->bind(':photo', $data['photo']);
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

    public function view($serviceprovider_id){
      $this->db->query('SELECT * FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id'); 
      $this->db->bind(':serviceprovider_id', $serviceprovider_id);
      $results = $this->db->single();
      return $results;
    }

    public function viewitem($product_id){
      $this->db->query('SELECT * FROM products WHERE product_id = :product_id'); 
      $this->db->bind(':product_id', $product_id);
      $results = $this->db->single();
      return $results;
    }

    public function updateitem($data){
      try {
          $this->db->query('UPDATE products SET quantity  = :quantity , unit_price = :unit_price WHERE product_id = :product_id');
          // Bind values
          $this->db->bind(':quantity', $data['quantity']);
          $this->db->bind(':unit_price', $data['unit_price']);
          $this->db->bind(':product_id', $data['product_id']);
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

  public function deleteitem($product_id){
    $this->db->query('DELETE FROM products WHERE product_id = :product_id');
    $this->db->bind(':product_id', $product_id);

    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
    public function inventory($created_by){
      $this->db->query('SELECT * FROM products WHERE created_by = :created_by'); 
      $this->db->bind(':created_by', $created_by);
      $results = $this->db->resultSet();
      return $results; 
    }

    public function electricGuitars($serviceprovider_id){
        $this->db->query('SELECT * FROM products WHERE created_by = :serviceprovider_id AND category = :category');
        $this->db->bind(':serviceprovider_id', $serviceprovider_id);
        $this->db->bind(':category', 'Electric_Guitars');
        $results = $this->db->resultSet();
        return $results;
    }
      public function keyboard($serviceprovider_id){
          $this->db->query('SELECT * FROM products WHERE created_by = :serviceprovider_id AND category = :category');
          $this->db->bind(':serviceprovider_id', $serviceprovider_id);
          $this->db->bind(':category', 'Keyboard');
          $results = $this->db->resultSet();
          return $results;
      }
      public function acousticGuitars($serviceprovider_id){
          $this->db->query('SELECT * FROM products WHERE created_by = :serviceprovider_id AND category = :category');
          $this->db->bind(':serviceprovider_id', $serviceprovider_id);
          $this->db->bind(':category', 'Acoustic_Guitars');
          $results = $this->db->resultSet();
          return $results;
      }
      public function bandAndOrchestra($serviceprovider_id){
          $this->db->query('SELECT * FROM products WHERE created_by = :serviceprovider_id AND category = :category');
          $this->db->bind(':serviceprovider_id', $serviceprovider_id);
          $this->db->bind(':category', 'Brass');
          $results = $this->db->resultSet();
          return $results;
      }
      public function homeAudio($serviceprovider_id){
          $this->db->query('SELECT * FROM products WHERE created_by = :serviceprovider_id AND category = :category');
          $this->db->bind(':serviceprovider_id', $serviceprovider_id);
          $this->db->bind(':category', 'sounds');
          $results = $this->db->resultSet();
          return $results;
      }

    public function verificationNumber($finalNumber){
      try{
          $this->db->query('SELECT * FROM serviceproviders WHERE  verification= :verification');
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

    public function fectchEncrptedPassword($serviceprovider_id,$password){
      try{
          $this->db->query('SELECT password FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id');
          $this->db->bind(':serviceprovider_id', $serviceprovider_id);
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

    public function findOtherServiceProviderByEmail($business_email,$serviceprovider_id){
        $this->db->query('SELECT * FROM serviceproviders WHERE business_email = :business_email AND serviceprovider_id != :currentSPId');
        // Bind value
        $this->db->bind(':business_email', $business_email);
        $this->db->bind(':currentSPId', $serviceprovider_id);

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
    public function getServiceProviderById($id){
      $this->db->query('SELECT * FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id');
      // Bind value
      $this->db->bind(':serviceprovider_id', $serviceprovider_id);

      $row = $this->db->single();

      return $row;
    }
  }