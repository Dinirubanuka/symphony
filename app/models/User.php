<?php
class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
        $this->db->query('INSERT INTO users (name, email, TelephoneNumber, BirthDate, address, password,profile_photo ,gender) VALUES(:name, :email, :TelephoneNumber, :BirthDate, :address, :password, :photo,:gender)');
        // Bind values
        try{
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':TelephoneNumber', $data['tel_Number']);
            $this->db->bind(':BirthDate', $data['date']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':photo', $data['photo']);
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

    public function view($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

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
            // die($id);
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