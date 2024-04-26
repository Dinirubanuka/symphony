<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class ServiceProvider
{
    private $db;
    private $mail;

    public function __construct()
    {
        $this->db = new Database;
        $this->mail = new PHPMailer(true);
    }

    public function additem($data)
    {

        $this->db->query('INSERT INTO products (created_by, category, brand, model, quantity, unit_price, photo_1, photo_2, photo_3, Title, Description, outOfStock, warranty, status) VALUES(:created_by, :category, :brand, :model, :quantity, :unit_price, :photo_1, :photo_2, :photo_3, :title, :description, :outOfStock, :warranty, :status)');

        if ($data['category'] !== 'Brass') {
            $data['bandOrchestraCategories'] = null;
        }
        if ($data['category'] !== 'sounds') {
            $data['homeAudioCategory'] = null;
        }
        try {
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
            $this->db->bind(':outOfStock', $data['outOfStock']);
            $this->db->bind(':warranty', $data['warranty']);
            $this->db->bind(':status', 'Active');

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

    public function addStudio($data)
    {
        try {
            $this->db->query('INSERT INTO studio (created_by, Title, instrument, descriptionSounds, descriptionStudio, location, telephoneNumber, videoLink, photo_1, photo_2, photo_3, airCondition, unit_price, status) VALUES (:created_by, :name, :instrument,:descriptionSounds, :descriptionStudio, :location, :telephoneNumber, :videoLink, :photo_1, :photo_2, :photo_3, :airCondition, :unit_price, :status)');
            $this->db->bind(':created_by', $_SESSION['serviceprovider_id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':unit_price', $data['rate']);
            $this->db->bind(':airCondition', $data['airCondition']);
            $this->db->bind(':instrument', $data['instrument']);
            $this->db->bind(':descriptionSounds', $data['descriptionSounds']);
            $this->db->bind(':descriptionStudio', $data['descriptionStudio']);
            $this->db->bind(':telephoneNumber', $data['telephoneNumber']);
            $this->db->bind(':videoLink', $data['videoLink']);
            $this->db->bind(':photo_1', $data['photo_1']);
            $this->db->bind(':photo_2', $data['photo_2']);
            $this->db->bind(':photo_3', $data['photo_3']);
            $this->db->bind(':status', 'Active');

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

    public function addSinger($data)
    {
        try {
            $this->db->query('INSERT INTO singer (created_by, name, NickName, email, description, instrument, location, telephoneNumber, videoLink, photo_1, photo_2, photo_3, singerPhoto, unit_price, status) VALUES (:created_by, :name, :NickName, :email, :description, :instrument, :location, :telephoneNumber, :videoLink, :photo_1, :photo_2, :photo_3, :singer_photo, :unit_price, :status)');
            $this->db->bind(':created_by', $_SESSION['serviceprovider_id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':NickName', $data['NickName']);
            $this->db->bind(':telephoneNumber', $data['telephoneNumber']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':unit_price', $data['rate']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':instrument', $data['instrument']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':videoLink', $data['videoLink']);
            $this->db->bind(':photo_1', $data['photo_1']);
            $this->db->bind(':photo_2', $data['photo_2']);
            $this->db->bind(':photo_3', $data['photo_3']);
            $this->db->bind(':singer_photo', $data['singer_photo']);
            $this->db->bind(':status', 'Active');

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

    public function editPhoto($product_id, $data, $photo_num)
    {
        if ($photo_num == 'photo_1') {
            try {
                $this->db->query('UPDATE products SET photo_1 = :photo_1 WHERE product_id = :product_id');
                $this->db->bind(':photo_1', $data['photo_1']);
                $this->db->bind(':product_id', $product_id);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
                return false;
            }
        } else if ($photo_num == 'photo_2') {
            try {
                $this->db->query('UPDATE products SET photo_2 = :photo_2 WHERE product_id = :product_id');
                $this->db->bind(':photo_2', $data['photo_2']);
                $this->db->bind(':product_id', $product_id);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
                return false;
            }

        } else if ($photo_num == 'photo_3') {
            try {
                $this->db->query('UPDATE products SET photo_3 = :photo_3 WHERE product_id = :product_id');
                $this->db->bind(':photo_3', $data['photo_3']);
                $this->db->bind(':product_id', $product_id);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
                return false;
            }
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
    
    public function editStudioPhoto($product_id, $data, $photo_num)
    {
        if ($photo_num == 'photo_1') {
            try {
                $this->db->query('UPDATE studio SET photo_1 = :photo_1 WHERE product_id = :product_id');
                $this->db->bind(':photo_1', $data['photo_1']);
                $this->db->bind(':product_id', $product_id);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
                return false;
            }
        } else if ($photo_num == 'photo_2') {
            try {
                $this->db->query('UPDATE studio SET photo_2 = :photo_2 WHERE product_id = :product_id');
                $this->db->bind(':photo_2', $data['photo_2']);
                $this->db->bind(':product_id', $product_id);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
                return false;
            }

        } else if ($photo_num == 'photo_3') {
            try {
                $this->db->query('UPDATE studio SET photo_3 = :photo_3 WHERE product_id = :product_id');
                $this->db->bind(':photo_3', $data['photo_3']);
                $this->db->bind(':product_id', $product_id);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
                return false;
            }
        }
    }

    public function editItem($product_id, $data)
    {
        try {
            if ($data['category'] !== 'Brass' || $data['category'] !== 'sounds') {
                $data['bandAndOrchestraCategory'] = null;
                $data['homeAudioCategory'] = null;
            }
            $this->db->query('UPDATE products SET Title = :Title , category  = :category , brand = :brand , model = :model , quantity = :quantity , unit_price = :unit_price , Description = :description , outOfStock = :outOfStock , warranty = :warranty WHERE product_id = :product_id');
            $this->db->bind(':Title', $data['title']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':brand', $data['brand']);
            $this->db->bind(':model', $data['model']);
            $this->db->bind(':warranty', $data['warranty']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':unit_price', $data['unit_price']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':outOfStock', $data['outOfStock']);
            $this->db->bind(':product_id', $product_id);

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

    public function getUserData($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id AND status = "Active"');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function getItemData($product_id)
    {
        $this->db->query('SELECT * FROM products WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->single();
        return $results;
    }

    public function getStudioData($product_id)
    {
        $this->db->query('SELECT * FROM studio WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->single();
        return $results;
    }

    public function getBandData($product_id)
    {
        $this->db->query('SELECT * FROM band WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->single();
        return $results;
    }

    public function getSingerData($product_id)
    {
        $this->db->query('SELECT * FROM singer WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->single();
        return $results;
    }

    public function getMusicianData($product_id)
    {
        $this->db->query('SELECT * FROM musician WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->single();
        return $results;
    }

    public function getOrders($serviceprovider_id)
    {
        $this->db->query('SELECT * FROM suborder WHERE serviceprovider_id = :serviceprovider_id');
        $this->db->bind(':serviceprovider_id', $serviceprovider_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getFullOrderData(){
        $this->db->query('SELECT * FROM orders');
        $results = $this->db->resultSet();
        return $results;
    }

    public function updateFullOrderPrice($order_id, $reduce_price){
        try {
            $this->db->query('UPDATE orders SET total = total - :reduce_price WHERE order_id = :order_id');
            $this->db->bind(':reduce_price', $reduce_price);
            $this->db->bind(':order_id', $order_id);
            $this->db->execute();
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
    
    public function editStudio($product_id, $data)
    {
        try {
            $this->db->query('UPDATE studio SET Title =:name , instrument = :instrument, descriptionSounds = :descriptionSounds, descriptionStudio =:descriptionStudio, videoLink =:videoLink, airCondition =:airCondition, unit_price =:unit_price WHERE product_id = :product_id');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':unit_price', $data['rate']);
            $this->db->bind(':airCondition', $data['airCondition']);
            $this->db->bind(':instrument', $data['instrument']);
            $this->db->bind(':descriptionSounds', $data['descriptionSounds']);
            $this->db->bind(':descriptionStudio', $data['descriptionStudio']);
            $this->db->bind(':videoLink', $data['videoLink']);
            $this->db->bind(':product_id', $product_id);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
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

    public function getOrderData($sorder_id)
    {
        $this->db->query('SELECT * FROM suborder WHERE sorder_id = :sorder_id');
        $this->db->bind(':sorder_id', $sorder_id);
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

    // Regsiter user
    public function register($data)
    {
        $name = $data['business_name'];
        $email = $data['business_email'];
        $this->db->query('INSERT INTO serviceproviders ( business_name, business_address, business_contact_no, business_email, password,  owner_name, owner_address, owner_contact_no, owner_nic, owner_email, about, profile_photo, verification, status, photo_R1, photo_R2, photo_R3, photo_R4, photo_R5, registration_date) VALUES(:business_name, :business_address, :business_contact_no, :business_email, :password,  :owner_name, :owner_address, :owner_contact_no, :owner_nic, :owner_email, :about, :photo, :verification, :status, :photo_1, :photo_2, :photo_3, :photo_4, :photo_5, :registration_date)');
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
        <h1 style="">Hello ' . $name . '</h1>
        <p style="font-size: 18px;text-align: justify;width: 90%;margin: auto">Thank you for choosing Symphony. We are excited to have you on board!</p>
        <hr style="width:90%;color: #3d3b3b;opacity: 0.3;">
        <p style="font-size: 20px; color: #2e043a;">To complete your account creation, please use the following verification code:</p>
        <p style="font-size: 24px; color: #333;  cursor: pointer; margin: 15px 10px;">' . $verification_code . '</p>
      </div>';
        $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $this->mail->send();
        // Bind values
        try {
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
            $this->db->bind(':photo_1', $data['photo_1']);
            $this->db->bind(':photo_2', $data['photo_2']);
            $this->db->bind(':photo_3', $data['photo_3']);
            $this->db->bind(':photo_4', $data['photo_4']);
            $this->db->bind(':photo_5', $data['photo_5']);
            $this->db->bind(':verification', $verification_code);
            $this->db->bind(':status', 'Pending');
            $this->db->bind(':registration_date', $data['registration_date']);

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

    public function view($serviceprovider_id)
    {
        $this->db->query('SELECT * FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id AND status = "Active"');
        $this->db->bind(':serviceprovider_id', $serviceprovider_id);
        $results = $this->db->single();
        return $results;
    }

    public function viewItem($product_id)
    {
        $this->db->query('SELECT * FROM products WHERE product_id = :product_id AND status = "Active"');
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->single();
        return $results;
    }

    public function updateitem($data)
    {
        try {
            $this->db->query('UPDATE products SET quantity  = :quantity , unit_price = :unit_price WHERE product_id = :product_id');
            // Bind values
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':unit_price', $data['unit_price']);
            $this->db->bind(':product_id', $data['product_id']);
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

    public function deleteitem($product_id)
    {
        $this->db->query('UPDATE products SET status = "Deactive" WHERE product_id = :product_id');
        $this->db->bind(':product_id', $product_id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteSinger($product_id)
    {
        $this->db->query('UPDATE singer SET status = "Deactive" WHERE product_id = :product_id');
        $this->db->bind(':product_id', $product_id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteStudio($product_id)
    {
        $this->db->query('UPDATE studio SET status = "Deactive" WHERE product_id = :product_id');
        $this->db->bind(':product_id', $product_id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function inventory($created_by)
    {
        $this->db->query('SELECT * FROM products WHERE created_by = :created_by AND status = "Active"');
        $this->db->bind(':created_by', $created_by);
        $results = $this->db->resultSet();
        return $results;
    }

    public function studio($created_by)
    {
        $this->db->query('SELECT * FROM studio WHERE created_by = :created_by AND status = "Active"');
        $this->db->bind(':created_by', $created_by);
        $results = $this->db->resultSet();
        return $results;
    }

    public function singer($created_by)
    {
        $this->db->query('SELECT * FROM singer WHERE created_by = :created_by AND status = "Active"');
        $this->db->bind(':created_by', $created_by);
        $results = $this->db->resultSet();
        return $results;
    }

    public function band($created_by)
    {
        $this->db->query('SELECT * FROM band WHERE created_by = :created_by AND status = "Active"');
        $this->db->bind(':created_by', $created_by);
        $results = $this->db->resultSet();
        return $results;
    }

    public function viewSinger($created_by)
    {
        $this->db->query('SELECT * FROM singer WHERE product_id = :created_by AND status = "Active"');
        $this->db->bind(':created_by', $created_by);
        $results = $this->db->single();
        return $results;
    }

    public function editSingerPhoto($id, $data){
        try {
            $this->db->query('UPDATE singer SET singerPhoto = :singerPhoto WHERE product_id = :product_id');
            $this->db->bind(':singerPhoto', $data['singerPhoto']);
            $this->db->bind(':product_id', $id);
            $this->db->execute();
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    public function updateSinger($data){
        try{
            $this->db->query('UPDATE singer SET name = :name , nickName = :NickName , telephoneNumber = :telephoneNumber , email = :email , unit_price = :rate , instrument = :instrument , location = :location , videoLink = :videoLink , description = :description WHERE product_id = :product_id' );
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':NickName', $data['NickName']);
            $this->db->bind(':telephoneNumber', $data['telephoneNumber']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':rate', $data['rate']);
            $this->db->bind(':instrument', $data['instrument']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':videoLink', $data['videoLink']);
            $this->db->bind(':description', $data['description']);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function verificationNumber($finalNumber)
    {
        try {
            $this->db->query('SELECT * FROM serviceproviders WHERE  verification= :verification');
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

    public function update($data)
    {
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
            $this->db->query('UPDATE serviceproviders SET profile_photo  = :photo WHERE serviceprovider_id = :id');
            $this->db->bind(':photo', $photo);
            $this->db->bind(':id', $_SESSION['serviceprovider_id']);
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

    public function fectchEncrptedPassword($serviceprovider_id, $password)
    {
        try {
            $this->db->query('SELECT password FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id');
            $this->db->bind(':serviceprovider_id', $serviceprovider_id);
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

    public function delete($serviceprovider_id)
    {
        $this->db->query('UPDATE serviceproviders SET status = "Deactive" WHERE serviceprovider_id = :serviceprovider_id');
        $this->db->bind(':serviceprovider_id', $serviceprovider_id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login User
    public function serviceproviderlogin($business_email, $password)
    {
        $this->db->query('SELECT * FROM serviceproviders WHERE business_email = :business_email AND status = "Active"');
        $this->db->bind(':business_email', $business_email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
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
    public function findserviceproviderByEmail($business_email)
    {
        $this->db->query('SELECT * FROM serviceproviders WHERE business_email = :business_email AND status = "Active"');
        // Bind value
        $this->db->bind(':business_email', $business_email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findBannedServiceProviderByEmail($business_email)
    {
        $this->db->query('SELECT * FROM serviceproviders WHERE business_email = :business_email AND status = "Banned"');
        // Bind value
        $this->db->bind(':business_email', $business_email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findOtherServiceProviderByEmail($business_email, $serviceprovider_id)
    {
        $this->db->query('SELECT * FROM serviceproviders WHERE business_email = :business_email AND serviceprovider_id != :currentSPId AND status = "Active"');
        // Bind value
        $this->db->bind(':business_email', $business_email);
        $this->db->bind(':currentSPId', $serviceprovider_id);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findserviceproviderByEmailEdit($business_email)
    {
        $this->db->query('SELECT * FROM serviceproviders WHERE business_email = :business_email AND status = "Active"');
        // Bind value
        $this->db->bind(':business_email', $business_email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    // Get User by ID
    public function getServiceProviderById($id)
    {
        $this->db->query('SELECT * FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id AND status = "Active"');
        // Bind value
        $this->db->bind(':serviceprovider_id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function fetchSingerPhoto($id)
    {
        try{
            $this->db->query('SELECT singerPhoto from singer WHERE product_id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->single();
            return $results;
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function addBand($data)
    {
        try {
            $this->db->query('INSERT INTO band (created_by, Title, leaderName, telephoneNumber, email, memberCount, unit_price, instrument, location, videoLink, description, photo_1, photo_2, photo_3, leaderPhoto, bandPhoto ) VALUES (:created_by, :title, :leaderName, :telephoneNumber, :email, :memberCount, :unit_price, :instrument, :location, :videoLink, :description, :photo_1, :photo_2, :photo_3, :leaderPhoto, :bandPhoto)');
            $this->db->bind(':created_by', $_SESSION['serviceprovider_id']);
            $this->db->bind(':title', $data['name']);
            $this->db->bind(':leaderName', $data['leader']);
            $this->db->bind(':telephoneNumber', $data['telephoneNumber']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':memberCount', $data['memberCount']);
            $this->db->bind(':unit_price', $data['rate']);
            $this->db->bind(':instrument', $data['instrument']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':videoLink', $data['videoLink']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':photo_1', $data['photo_1']);
            $this->db->bind(':photo_2', $data['photo_2']);
            $this->db->bind(':photo_3', $data['photo_3']);
            $this->db->bind(':bandPhoto', $data['band_photo']);
            $this->db->bind(':leaderPhoto', $data['leader_photo']);

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


    public function deleteBand($product_id)
    {
        $this->db->query('DELETE FROM band WHERE product_id = :product_id');
        $this->db->bind(':product_id', $product_id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function viewBand($created_by)
    {
        $this->db->query('SELECT * FROM band WHERE product_id = :created_by');
        $this->db->bind(':created_by', $created_by);
        $results = $this->db->single();
        return $results;
    }

    public function editBandPhoto($id, $data){
        try {
            $this->db->query('UPDATE band SET bandPhoto = :bandPhoto WHERE product_id = :product_id');
            $this->db->bind(':bandPhoto', $data['bandPhoto']);
            $this->db->bind(':product_id', $id);
            $this->db->execute();
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    public function updateBand($data){
        try{
            $this->db->query('UPDATE band SET Title = :name , telephoneNumber = :telephoneNumber , memberCount = :memberCount ,email = :email , unit_price = :rate , instrument = :instrument , location = :location , videoLink = :videoLink , Description = :description , leaderName = :leaderName WHERE product_id = :product_id' );
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':memberCount', $data['memCount']);
            $this->db->bind(':telephoneNumber', $data['telephoneNumber']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':rate', $data['rate']);
            $this->db->bind(':instrument', $data['instrument']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':videoLink', $data['videoLink']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':leaderName', $data['leaderName']);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function musician($created_by)
    {
        $this->db->query('SELECT * FROM musician WHERE created_by = :created_by');
        $this->db->bind(':created_by', $created_by);
        $results = $this->db->resultSet();
        return $results;
    }

    public function viewMusicians($created_by)
    {
        $this->db->query('SELECT * FROM musician WHERE product_id = :created_by');
        $this->db->bind(':created_by', $created_by);
        $results = $this->db->single();
        return $results;
    }

    public function addMusician($data)
    {
        try {
            $this->db->query('INSERT INTO musician (created_by, name, NickName, email, description, instrument, location, telephoneNumber, videoLink, photo_1, photo_2, photo_3, singerPhoto, unit_price) VALUES (:created_by, :name, :NickName, :email, :description, :instrument, :location, :telephoneNumber, :videoLink, :photo_1, :photo_2, :photo_3, :singer_photo, :unit_price)');
            $this->db->bind(':created_by', $_SESSION['serviceprovider_id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':NickName', $data['NickName']);
            $this->db->bind(':telephoneNumber', $data['telephoneNumber']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':unit_price', $data['rate']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':instrument', $data['instrument']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':videoLink', $data['videoLink']);
            $this->db->bind(':photo_1', $data['photo_1']);
            $this->db->bind(':photo_2', $data['photo_2']);
            $this->db->bind(':photo_3', $data['photo_3']);
            $this->db->bind(':singer_photo', $data['singer_photo']);

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

    public function updateMusicians($data){
        try{
            $this->db->query('UPDATE musician SET name = :name , nickName = :NickName , telephoneNumber = :telephoneNumber , email = :email , unit_price = :rate , instrument = :instrument , location = :location , videoLink = :videoLink , description = :description WHERE product_id = :product_id' );
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':NickName', $data['NickName']);
            $this->db->bind(':telephoneNumber', $data['telephoneNumber']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':rate', $data['rate']);
            $this->db->bind(':instrument', $data['instrument']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':videoLink', $data['videoLink']);
            $this->db->bind(':description', $data['description']);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function addNotification($data)
    {
        $this->db->query('INSERT INTO notifications (user_type, user_id, date_time, status, data) VALUES(:user_type, :user_id, :date_time, :status, :data)');
        try {
            $this->db->bind(':user_type', $data['user_type']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':date_time', $data['date_time']);
            $this->db->bind(':status', $data['status']);
            $this->db->bind(':data', $data['data']);

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

    public function getNotifications($user_id, $date_time)
    {
        $this->db->query('SELECT * FROM notifications WHERE user_id = :user_id AND user_type = :user_type AND date_time <= :date_time AND status = :status ORDER BY date_time DESC');
        $this->db->bind(':user_type', 'Serviceprovider');
        $this->db->bind(':status', 'Unread');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':date_time', $date_time);
        $results = $this->db->single();
        return $results;
    }

    public function getActivity($sp_id)
    {
        $this->db->query('SELECT * FROM logs WHERE user_id = :user_id AND user_type = :user_type');
        $this->db->bind(':user_id', $sp_id);
        $this->db->bind(':user_type', 'Service Provider');
        $results = $this->db->resultSet();
        return $results;
    }
}