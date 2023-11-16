<?php
class Users extends Controller {
    private $userModel;
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function index(){
        $this->view('users/index');
    }

    //view profile
    public function profile(){
        $user = $this->userModel->view($_SESSION['user_id']);
        $data =[
            'name'=>$user->name,
            'email'=>$user->email,
            'tel_Number'=>$user->TelephoneNumber,
            'date'=>$user->BirthDate,
            'address'=>$user->address,
            'gender'=>$user->gender,
            'photo'=>$user->profile_photo
        ];
        $this->view('users/profile',$data);
    }

    //profile_photo update
    public function profilePhotoUpdate(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $img_name = $_FILES['photo']['name'];
            $img_size = $_FILES['photo']['size'];
            $tmp_name = $_FILES['photo']['tmp_name'];
            $error = $_FILES['photo']['error'];

            if ($error === UPLOAD_ERR_NO_FILE) {
                // The uploaded file is empty

                $new_img_name = 'IMG-653fd611dd2445.48951448.png';

                if($this->userModel->photoUpdate($new_img_name)){
                    // flash('register_success', 'You are registered and can log in');
                    redirect('users/profile');
                }
                else {
                    die('Something went wrong');
                }
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/mag_img/'.$new_img_name;
                $bool =move_uploaded_file($tmp_name, $img_upload_path);
                if($this->userModel->photoUpdate($new_img_name)){
                    // flash('register_success', 'You are registered and can log in');
                    redirect('users/profile');
                }
                else {
                    die('Something went wrong');
                }
            }
        }
    }

    public function editDetail($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = $this->userModel->view($_SESSION['user_id']);
            $data =[
                'name'=>$user->name,
                'email'=>$user->email,
                'tel_Number'=>$user->TelephoneNumber,
                'date'=>$user->BirthDate,
                'address'=>$user->address,
            ];
            $this->view('users/edit',$data);
        }else {
            $this->view('users/edit',$data);
        }
    }

    public function edit(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =[
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'tel_Number' => trim($_POST['tel_Number']),
                'date' => trim($_POST['date']),
                'address' => trim($_POST['address']),
                'name_err' => '',
                'email_err' => '',
                'tel_Number_err' =>'',
                'date_err' =>'',
                'address_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else {
                // Check email format using a regular expression
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = 'Invalid email format';
                }elseif ($this->userModel->findOtherUserByEmail($data['email'],$_SESSION['user_id'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }


            // Validate Name
            if(empty($data['name'])){
                $data['name_err'] = 'Pleae enter name';
            }

            // Validate telephone number
            if(empty($data['tel_Number'])){
                $data['tel_Number_err'] = 'Pleae enter telephone number';
            }else if($data['tel_Number'] <= 0){
                $data['tel_Number_err'] = 'Telephone number cannot be a negative number';
            }else if(!preg_match('/^\d{10}$/', $data['tel_Number'])){
                $data['tel_Number_err'] = 'Telephone number should have exactly 10 digits';
            }

            // Validate Address
            if(empty($data['address'])){
                $data['address_err'] = 'Pleae enter address';
            }

            // Validate Date
            if(empty($data['date'])){
                $data['date_err'] = 'Pleae enter date';
            }
            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['tel_Number_err']) && empty($data['date_err']) && empty($data['address_err'])){
                // Validated

                // Update User
                if($this->userModel->update($data)){
                    // flash('register_success', 'You are registered and can log in');
                    redirect('users/profile');
                }
                else {
                    die('Something went wrong');
                }
            }else{
                $this->view('users/edit', $data);
            }

        }else {

            redirect('users/profile');
        }
    }

    // public function delete(){
    //   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     if($this->userModel->delete($_SESSION['user_id'])){
    //       unset($_SESSION['user_id']);
    //       unset($_SESSION['user_email']);
    //       unset($_SESSION['user_name']);
    //       session_destroy();
    //       redirect('pages/index');
    //     }
    //     else {
    //       die('Something went wrong');
    //     }
    //   }
    //   else {
    //     redirect('users/profile');
    //   }
    // }
    public function delete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $password = trim($_POST['password']);
            $result = $this->userModel->fectchEncrptedPassword($_SESSION['user_id'],$password);
            if($result){
                if($this->userModel->delete($_SESSION['user_id'])){
                    unset($_SESSION['user_id']);
                    unset($_SESSION['user_email']);
                    unset($_SESSION['user_name']);
                    session_destroy();
                    redirect('pages/index');
                }
                else {
                    die('Something went wrong');
                }
            }else {
                redirect('users/profile');
            }
        }
    }

    public function verification(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'char1' => trim($_POST['char1']),
                'char2' => trim($_POST['char2']),
                'char3' => trim($_POST['char3']),
                'char4' => trim($_POST['char4']),
                'char5' => trim($_POST['char5']),
                'char6' => trim($_POST['char6']),
            ];
            if (empty($data['char1']) && empty($data['char2']) && empty($data['char3']) && empty($data['char4']) && empty($data['char5']) && empty($data['char6'])){
                $data = ['validation_err'=> 'Empty'];
                $this->view('users/verification',$data);
            }
            else{
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $combinedNumber = $_POST['char1'].$_POST['char2'].$_POST['char3'].$_POST['char4'].$_POST['char5'].$_POST['char6'];
//                $finalNumber = (int)$combinedNumber;
                $result = $this->userModel->verificationNumber($combinedNumber);
                if ($result){
                    $this->view('users/succesfull',$data);
                }else{
                    $data = ['validation_err'=> 'Invalid OTP'];
                    $this->view('users/verification',$data);
                }
            }
        }
    }


    public function register(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $img_name = $_FILES['photo']['name'];
            $img_size = $_FILES['photo']['size'];
            $tmp_name = $_FILES['photo']['tmp_name'];
            $error = $_FILES['photo']['error'];

            if ($error === UPLOAD_ERR_NO_FILE){
                $new_img_name = 'IMG-653fd611dd2445.48951448.png';
            }else{
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/mag_img/'.$new_img_name;
                $bool =move_uploaded_file($tmp_name, $img_upload_path);
            }
            $data =[
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'tel_Number' => trim($_POST['tel_Number']),
                'date' => trim($_POST['date']),
                'gender' => trim($_POST['gender']),
                'address' => trim($_POST['address']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'photo' => $new_img_name,
                'name_err' => '',
                'email_err' => '',
                'tel_Number_err' =>'',
                'date_err' =>'',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else {
                // Check email format using a regular expression
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = 'Invalid email format';
                }elseif ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }


            // Validate Name
            if(empty($data['name'])){
                $data['name_err'] = 'Pleae enter name';
            }

            // Validate telephone number
            if(empty($data['tel_Number'])){
                $data['tel_Number_err'] = 'Pleae enter telephone number';
            }else if($data['tel_Number'] <= 0){
                $data['tel_Number_err'] = 'Telephone number cannot be a negative number';
            }else if(!preg_match('/^\d{10}$/', $data['tel_Number'])){
                $data['tel_Number_err'] = 'Telephone number should have exactly 10 digits';
            }

            // Validate Address
            if(empty($data['address'])){
                $data['address_err'] = 'Pleae enter address';
            }

            // Validate Date
            if(empty($data['date'])){
                $data['date_err'] = 'Pleae enter date';
            }

            // Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Pleae enter password';
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Pleae confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['tel_Number_err']) && empty($data['date_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if($this->userModel->register($data)){
                    // flash('register_success', 'You are registered and can log in');
                    $this->view('users/verification');
                } else {
                    die('Something went wrong');
                }

            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }

        } else {
            // Init data
            $data =[
                'name' => '',
                'email' => '',
                'tel_Number' => '',
                'date' => '',
                'gender' => '',
                'address' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'tel_Number_err' =>'',
                'date_err' =>'',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    public function login(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data =[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Pleae enter email';
            }

            // Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if($this->userModel->findUserByEmail($data['email'])){
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }


        } else {
            // Init data
            $data =[
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user){

        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('users/index');

    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('pages/index');
    }
}