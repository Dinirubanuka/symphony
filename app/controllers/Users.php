<?php

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');

        //inactive process / defined inactive time as 30 min
        if (isset($_SESSION['user_id'])) {
            if (isset($_SESSION['last_activity'])) {
                $inactive_time = time() - $_SESSION['last_activity'];
                if ($inactive_time > 1800) {
                    echo '<script>alert("Time out...")</script>';
                    $this->logout();
                }
            }
            $_SESSION['last_activity'] = time();
        }
    }

    public function index()
    {
        $this->view('users/index');
    }

    //view profile
    public function profile()
    {
        $user = $this->userModel->view($_SESSION['user_id']);
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'tel_Number' => $user->TelephoneNumber,
            'date' => $user->BirthDate,
            'address' => $user->address,
            'gender' => $user->gender,
            'photo' => $user->profile_photo
        ];
        $this->view('users/profile', $data);
    }

    //profile_photo update
    public function profilePhotoUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $img_name = $_FILES['photo']['name'];
            $img_size = $_FILES['photo']['size'];
            $tmp_name = $_FILES['photo']['tmp_name'];
            $error = $_FILES['photo']['error'];

            if ($error === UPLOAD_ERR_NO_FILE) {
                // The uploaded file is empty

                $new_img_name = 'IMG-653fd611dd2445.48951448.png';

                if ($this->userModel->photoUpdate($new_img_name)) {
                    // flash('register_success', 'You are registered and can log in');
                    redirect('users/profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '/Applications/XAMPP/xamppfiles/htdocs/symphony/public/img/mag_img/' . $new_img_name;
                $bool = move_uploaded_file($tmp_name, $img_upload_path);
                if ($this->userModel->photoUpdate($new_img_name)) {
                    // flash('register_success', 'You are registered and can log in');
                    redirect('users/profile');
                } else {
                    die('Something went wrong');
                }
            }
        }
    }

    public function editDetail($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->userModel->view($_SESSION['user_id']);
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'tel_Number' => $user->TelephoneNumber,
                'date' => $user->BirthDate,
                'address' => $user->address,
            ];
            $this->view('users/edit', $data);
        } else {
            $this->view('users/edit', $data);
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'tel_Number' => trim($_POST['tel_Number']),
                'date' => trim($_POST['date']),
                'address' => trim($_POST['address']),
                'name_err' => '',
                'email_err' => '',
                'tel_Number_err' => '',
                'date_err' => '',
                'address_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else {
                // Check email format using a regular expression
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = 'Invalid email format';
                } elseif ($this->userModel->findOtherUserByEmail($data['email'], $_SESSION['user_id'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }


            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter name';
            }

            // Validate telephone number
            if (empty($data['tel_Number'])) {
                $data['tel_Number_err'] = 'Pleae enter telephone number';
            } else if ($data['tel_Number'] <= 0) {
                $data['tel_Number_err'] = 'Telephone number cannot be a negative number';
            } else if (!preg_match('/^\d{10}$/', $data['tel_Number'])) {
                $data['tel_Number_err'] = 'Telephone number should have exactly 10 digits';
            }

            // Validate Address
            if (empty($data['address'])) {
                $data['address_err'] = 'Pleae enter address';
            }

            // Validate Date
            if (empty($data['date'])) {
                $data['date_err'] = 'Pleae enter date';
            }
            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['tel_Number_err']) && empty($data['date_err']) && empty($data['address_err'])) {
                // Validated

                // Update User
                if ($this->userModel->update($data)) {
                    // flash('register_success', 'You are registered and can log in');
                    redirect('users/profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/edit', $data);
            }

        } else {

            redirect('users/profile');
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = trim($_POST['password']);
            $result = $this->userModel->fectchEncrptedPassword($_SESSION['user_id'], $password);
            if ($result) {
                if ($this->userModel->delete($_SESSION['user_id'])) {
                    unset($_SESSION['user_id']);
                    unset($_SESSION['user_email']);
                    unset($_SESSION['user_name']);
                    session_destroy();
                    redirect('pages/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('users/profile');
            }
        }
    }

    public function verification()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'char1' => trim($_POST['char1']),
                'char2' => trim($_POST['char2']),
                'char3' => trim($_POST['char3']),
                'char4' => trim($_POST['char4']),
                'char5' => trim($_POST['char5']),
                'char6' => trim($_POST['char6']),
            ];
            if (empty($data['char1']) && empty($data['char2']) && empty($data['char3']) && empty($data['char4']) && empty($data['char5']) && empty($data['char6'])) {
                $data = ['validation_err' => 'Empty'];
                $this->view('users/verification', $data);
            } else {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $combinedNumber = $_POST['char1'] . $_POST['char2'] . $_POST['char3'] . $_POST['char4'] . $_POST['char5'] . $_POST['char6'];
                $result = $this->userModel->verificationNumber($combinedNumber);
                if ($result) {
                    $this->view('users/succesfull', $data);
                } else {
                    $data = ['validation_err' => 'Invalid OTP'];
                    $this->view('users/verification', $data);
                }
            }
        }
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $img_name = $_FILES['photo']['name'];
            $img_size = $_FILES['photo']['size'];
            $tmp_name = $_FILES['photo']['tmp_name'];
            $error = $_FILES['photo']['error'];

            if ($error === UPLOAD_ERR_NO_FILE) {
                $new_img_name = 'IMG-653fd611dd2445.48951448.png';
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/mag_img/' . $new_img_name;
                $bool = move_uploaded_file($tmp_name, $img_upload_path);
            }
            $data = [
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
                'tel_Number_err' => '',
                'date_err' => '',
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
                } elseif ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }


            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter name';
            }

            // Validate telephone number
            if (empty($data['tel_Number'])) {
                $data['tel_Number_err'] = 'Pleae enter telephone number';
            } else if ($data['tel_Number'] <= 0) {
                $data['tel_Number_err'] = 'Telephone number cannot be a negative number';
            } else if (!preg_match('/^\d{10}$/', $data['tel_Number'])) {
                $data['tel_Number_err'] = 'Telephone number should have exactly 10 digits';
            }

            // Validate Address
            if (empty($data['address'])) {
                $data['address_err'] = 'Pleae enter address';
            }

            // Validate Date
            if (empty($data['date'])) {
                $data['date_err'] = 'Pleae enter date';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Pleae enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Pleae confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['tel_Number_err']) && empty($data['date_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
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
            $data = [
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
                'tel_Number_err' => '',
                'date_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Pleae enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    //set a cookie
                    $cookie_name = $data['email'];
                    $cookie_password = $data['password'];
                    setcookie($cookie_name, $cookie_password, time() + 86400, "/");
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
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['last_activity'] = time();
        redirect('users/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('pages/index');
    }

    public function Instrument()
    {
        $this->view('users/instrument');
    }

    public function inventory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $inventory = $this->userModel->inventory();
            $data = [
                'inventory' => $inventory
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function cart(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $cart = $this->userModel->cart($_SESSION['user_id']);
            $data =[
                'cart' => $cart,
                'subtotal' => '0',
                'total' => '0',
            ];
        }
        $this->view('users/cart',$data);
    }

    public function removeFromCart($product_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->userModel->removeFromCart($product_id);
            $cart = $this->userModel->cart($_SESSION['user_id']);
            $data =[
                'cart' => $cart,
            ];
        }
        $this->view('users/cart',$data);
    }

    public function viewItem($product_id){
            $data = $this->userModel->viewItem($product_id);
            $reviews = $this->userModel->viewreviews($product_id);
            $user = $this->userModel->view($_SESSION['user_id']);
            if($reviews){
                $count = 0;
                $star1 = 0;
                $star2 = 0; 
                $star3 = 0;
                $star4 = 0;
                $star5 = 0;
                $rating = 0;
                foreach ($reviews as $review){
                    $count = $count + 1;
                    switch ($review->rating) {
                        case 1:
                            $star1 = $star1 + 1;
                            break;
                        case 2:
                            $star2 = $star2 + 1;
                            break;
                        case 3:
                            $star3 = $star3 + 1;
                            break;
                        case 4:
                            $star4 = $star4 + 1;
                            break;
                        case 5:
                            $star5 = $star5 + 1;
                            break;
                    }
                }
                if($count != 0){
                    $rating = ($star1 + $star2*2 + $star3*3 + $star4*4 + $star5*5)/$count;
                }
            } else {
                $rating = 0;
                $star1 = 0;
                $star2 = 0; 
                $star3 = 0;
                $star4 = 0;
                $star5 = 0;
                $count = 0;
            }

        if($data){
            $data =[
                'product_id'=>$data->product_id,
                'created_by'=>$data->created_by,
                'category'=>$data->category,
                'brand'=>$data->brand,
                'model'=>$data->model,
                'quantity'=>$data->quantity,
                'unit_price'=>$data->unit_price,
                'photo_1'=>$data->photo_1,
                'photo_2'=>$data->photo_2,
                'photo_3'=>$data->photo_3,
                'Title'=>$data->Title,
                'Description'=>$data->Description,
                'outOfStock'=>$data->outOfStock,
                'createdDate'=>$data->createdDate,
                'warranty'=>$data->warranty,
                'name'=>$user->name,
                'photo'=>$user->profile_photo,
                'reviews'=>$reviews,
                'rating'=>$rating,
                'count'=>$count,
                'star1'=>$star1,
                'star2'=>$star2,
                'star3'=>$star3,
                'star4'=>$star4,
                'star5'=>$star5
            ];
            $this->view('users/viewItem',$data);
        } else {
            die('Something went wrong');
        }
    }


    public function addToCart($product_id){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =[
                'product_id' => $product_id,
                'quantity' =>trim($_POST['quantity']),
                'start_date' =>trim($_POST['fromDateTime']),
                'end_date' =>trim($_POST['toDateTime']),
                'user_id' => $_SESSION['user_id'],
                'quantity_err' => '',
                'start_date_err' => '',
                'end_date_err' => ''
            ];

            if(empty($data['quantity'])){
                $data['quantity_err'] = 'Pleae enter the quantity';
            }else if($data['quantity'] <= 0){
                $data['quantity_err'] = 'Quantity cannot be a negative number';
            }else if($data['quantity'] > $data['quantity']) {
                $data['quantity_err'] = 'Not enough items in the stock';
            }

            if(empty($data['quantity_err']) && empty($data['start_date_err']) && empty($data['end_date_err'])){
                if($this->userModel->addToCart($data)){
                    redirect('users/viewItem/'.$product_id.'');
                } else {
                    die('Something went wrong');
                }
            }
        } else {
            $data =[
                'quantity_err' => '',
                'start_date_err' => '',
                'end_date_err' => ''
            ];
            // Load view
            $this->view('users/viewItem', $data);
        }
    }

    public function addReview($product_id){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =[
                'product_id' => $product_id,
                'rating' =>trim($_POST['rating']),
                'content' =>trim($_POST['reviewDescription']),
                'user_id' => $_SESSION['user_id'],
                'name' =>trim($_POST['name']),
                'photo' =>trim($_POST['photo']),
                'reviewDescription_err' => '',
                'rating_err' => ''
            ];

            if(empty($data['quantity_err']) && empty($data['start_date_err']) && empty($data['end_date_err'])){
                if($this->userModel->addReview($data)){
                    redirect('users/ViewItem/'.$product_id.'');
                } else {
                    die('Something went wrong');
                }
            }
        } else {
            $data =[
            ];
            // Load view
            $this->view('users/viewItem', $data);
        }
    }
}