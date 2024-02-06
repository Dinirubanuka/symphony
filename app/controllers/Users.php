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
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/mag_img/' . $new_img_name;
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

    public function cancelOrder($order_id)
    {   
        $orders = $this->userModel->getOrders($_SESSION['user_id']);
        foreach ($orders as $order) {
            if ($order->sorder_id == $order_id) {
                $order_data = json_decode(json_encode($order), true);
            }
        }
        $resultString = implode(', ', json_decode(json_encode($order_data), true));
        $resultArray = explode(', ', $resultString);
        $finalArray = explode(',', $resultArray[10]);
        var_dump($finalArray);
        foreach ($finalArray as $entry_id) {
            $this->userModel->removeAvailability($entry_id);
        }
        $this->userModel->changeOrderStatus($order_id, 'Cancelled');
        redirect('users/orders');
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

    public function sortInquries($inquiryData)
    {
        if ($inquiryData['inquiryType'] == 'recoverAccount') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'inquiryType' => 'Recover Account',
                'field_1' => $inquiryData['accountName'],
                'field_2' => $inquiryData['phoneNumber'],
                'field_3' => $inquiryData['accountDescription'],
                'field_4' => '',
                'field_5' => '',
                'photo_1' => 'IMG-656bdc23223334.62765635.png',
                'photo_2' => '',
                'photo_3' => '',
                'status' => 'Pending',
                'moderator_id' => ''
            ];
        } else if ($inquiryData['inquiryType'] == 'technicalIssue') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'inquiryType' => 'Technical Issue',
                'field_1' => $inquiryData['issueType'],
                'field_2' => $inquiryData['technicalDescription'],
                'field_3' => '',
                'field_4' => '',
                'field_5' => '',
                'photo_1' => $inquiryData['photo_1'],
                'photo_2' => $inquiryData['photo_2'],
                'photo_3' => $inquiryData['photo_3'],
                'status' => 'Pending',
                'moderator_id' => ''
            ];
        } else if ($inquiryData['inquiryType'] == 'reportBug') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'inquiryType' => 'Report Bug',
                'field_1' => $inquiryData['bugIssue'],
                'field_2' => $inquiryData['bugDescription'],
                'field_3' => '',
                'field_4' => '',
                'field_5' => '',
                'photo_1' => $inquiryData['photo_1'],
                'photo_2' => $inquiryData['photo_2'],
                'photo_3' => $inquiryData['photo_3'],
                'status' => 'Pending',
                'moderator_id' => ''
            ];
        } else if ($inquiryData['inquiryType'] == 'billingIssue') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'inquiryType' => 'Billing Issue',
                'field_1' => $inquiryData['billingIssue'],
                'field_2' => $inquiryData['billingExplanation'],
                'field_3' => '',
                'field_4' => '',
                'field_5' => '',
                'photo_1' => 'IMG-656bdc23223334.62765635.png',
                'photo_2' => '',
                'photo_3' => '',
                'status' => 'Pending',
                'moderator_id' => ''
            ];
        } else if ($inquiryData['inquiryType'] == 'refundPurchase') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'inquiryType' => 'Refund Purchase',
                'field_1' => $inquiryData['orderID'],
                'field_2' => $inquiryData['refundReason'],
                'field_3' => '',
                'field_4' => '',
                'field_5' => '',
                'photo_1' => 'IMG-656bdc23223334.62765635.png',
                'photo_2' => '',
                'photo_3' => '',
                'status' => 'Pending',
                'moderator_id' => ''
            ];
        } else if ($inquiryData['inquiryType'] == 'reportUser') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'inquiryType' => 'Report User',
                'field_1' => $inquiryData['userProfile'],
                'field_2' => $inquiryData['reportReason'],
                'field_3' => '',
                'field_4' => '',
                'field_5' => '',
                'photo_1' => 'IMG-656bdc23223334.62765635.png',
                'photo_2' => '',
                'photo_3' => '',
                'status' => 'Pending',
                'moderator_id' => ''
            ];
        } else if ($inquiryData['inquiryType'] == 'question'){
            $data = [
                'user_id' => $_SESSION['user_id'],
                'inquiryType' => 'Question',
                'field_1' => $inquiryData['userQuestion'],
                'field_2' => $inquiryData['questionDescription'],
                'field_3' => '',
                'field_4' => '',
                'field_5' => '',
                'photo_1' => 'IMG-656bdc23223334.62765635.png',
                'photo_2' => '',
                'photo_3' => '',
                'status' => 'Pending',
                'moderator_id' => ''
            ];
        } else if ($inquiryData['inquiryType'] == 'other'){
            $data = [
                'user_id' => $_SESSION['user_id'],
                'inquiryType' => 'Other',
                'field_1' => $inquiryData['otherType'],
                'field_2' => $inquiryData['otherDescription'],
                'field_3' => '',
                'field_4' => '',
                'field_5' => '',
                'photo_1' => $inquiryData['photo_1'],
                'photo_2' => $inquiryData['photo_2'],
                'photo_3' => $inquiryData['photo_3'],
                'status' => 'Pending',
                'moderator_id' => ''
            ];
        }
        if($this->userModel->addInquiry($data)){
            redirect('users/inquiries');
        } else {
            die('Something went wrong');
        }
    }

    public function inquiries()
    {
        $inquiries = $this->userModel->getInquiries($_SESSION['user_id']);
        $data = [
            'inquiries' => $inquiries
        ];
        $this->view('users/inquiries', $data);
    }

    public function viewInquiry($inquiry_id)
    {
        $inquiry = $this->userModel->getInquiry($inquiry_id);
        if($inquiry->status == 'Pending'){
            $this->inquiries();
        } else {
            $chat = [];
            $chatIds = $this->userModel->getInqIds($inquiry_id);
            foreach ($chatIds as $chatId){
                $chatData = $this->userModel->getModChat($chatId->chat_id);
                array_push($chat, $chatData);
            }
            $mod_data = $this->userModel->getModerator($inquiry->moderator_id);
            $user_data = $this->userModel->view($inquiry->user_id);
            $data = [
                'inquiry' => $inquiry,
                'moderator' => $mod_data,
                'user' => $user_data,
                'chat' => $chat
            ];
            $this->view('users/viewinquiry', $data);
        }
    }

    public function sendMessageMod($message, $inquiry_id, $moderator_id, $date){
        $modifiedDate = str_replace('_', ' ', $date);
        $modifiedMessage = str_replace('_', ' ', $message);
        $data = [
            'inquiry_id' => $inquiry_id,
            'user_id' => $_SESSION['user_id'],
            'moderator_id' => $moderator_id,
            'chat_data' => $modifiedMessage,
            'chat_date' => $modifiedDate,
            'created_by' => 'user'
        ];
        $chat_id = $this->userModel->addChatUserToMod($data);
        if($this->userModel->addToInqChat($chat_id, $inquiry_id)){
            redirect('users/viewInquiry/'.$inquiry_id.'');
        } else {
            die('Something went wrong');
        }
    }

    public function contactsupport(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $inq_type = trim($_POST['inquiryType']);
            if($inq_type == 'technicalIssue' || $inq_type == 'reportBug' || $inq_type == 'other'){

                if($inq_type == 'technicalIssue'){
                    $img1_name = $_FILES['photo_1']['name'];
                    $img1_size = $_FILES['photo_1']['size'];
                    $tmp1_name = $_FILES['photo_1']['tmp_name'];
                    $error1 = $_FILES['photo_1']['error'];
        
                    $img2_name = $_FILES['photo_2']['name'];
                    $img2_size = $_FILES['photo_2']['size'];
                    $tmp2_name = $_FILES['photo_2']['tmp_name'];
                    $error2 = $_FILES['photo_2']['error'];
        
                    $img3_name = $_FILES['photo_3']['name'];
                    $img3_size = $_FILES['photo_3']['size'];
                    $tmp3_name = $_FILES['photo_3']['tmp_name'];
                    $error3 = $_FILES['photo_3']['error'];
                } else if ($inq_type == 'reportBug'){
                    $img1_name = $_FILES['photo_4']['name'];
                    $img1_size = $_FILES['photo_4']['size'];
                    $tmp1_name = $_FILES['photo_4']['tmp_name'];
                    $error1 = $_FILES['photo_4']['error'];
        
                    $img2_name = $_FILES['photo_5']['name'];
                    $img2_size = $_FILES['photo_5']['size'];
                    $tmp2_name = $_FILES['photo_5']['tmp_name'];
                    $error2 = $_FILES['photo_5']['error'];
        
                    $img3_name = $_FILES['photo_6']['name'];
                    $img3_size = $_FILES['photo_6']['size'];
                    $tmp3_name = $_FILES['photo_6']['tmp_name'];
                    $error3 = $_FILES['photo_6']['error'];
                } else if ($inq_type == 'other'){
                    $img1_name = $_FILES['photo_7']['name'];
                    $img1_size = $_FILES['photo_7']['size'];
                    $tmp1_name = $_FILES['photo_7']['tmp_name'];
                    $error1 = $_FILES['photo_7']['error'];
        
                    $img2_name = $_FILES['photo_8']['name'];
                    $img2_size = $_FILES['photo_8']['size'];
                    $tmp2_name = $_FILES['photo_8']['tmp_name'];
                    $error2 = $_FILES['photo_8']['error'];
        
                    $img3_name = $_FILES['photo_9']['name'];
                    $img3_size = $_FILES['photo_9']['size'];
                    $tmp3_name = $_FILES['photo_9']['tmp_name'];
                    $error3 = $_FILES['photo_9']['error'];
                }
    
                if ($error1 === UPLOAD_ERR_NO_FILE) {
                    $new_img1_name = 'IMG-656bdc23223334.62765635.png';
                } else {
                    $img_ex = pathinfo($img1_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $new_img1_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/inquiries/' . $new_img1_name;
                    $bool = move_uploaded_file($tmp1_name, $img_upload_path);
                }
    
                if ($error2 === UPLOAD_ERR_NO_FILE) {
                    $new_img2_name = 'IMG-656bdc23223334.62765635.png';
                } else {
                    $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/inquiries/' . $new_img2_name;
                    $bool = move_uploaded_file($tmp2_name, $img_upload_path);
                }
    
                if ($error3 === UPLOAD_ERR_NO_FILE) {
                    $new_img3_name = 'IMG-656bdc23223334.62765635.png';
                } else {
                    $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/inquiries/' . $new_img3_name;
                    $bool = move_uploaded_file($tmp3_name, $img_upload_path);
                }
                $data = [
                    'inquiryType' => trim($_POST['inquiryType']),
                    'accountName' => trim($_POST['accountName']),
                    'phoneNumber' => trim($_POST['phoneNumber']),
                    'accountDescription' => trim($_POST['accountDescription']),
                    'issueType' => trim($_POST['issueType']),
                    'technicalDescription' => trim($_POST['technicalDescription']),
                    'bugIssue' => trim($_POST['bugIssue']),
                    'bugDescription' => trim($_POST['bugDescription']),
                    'billingIssue' => trim($_POST['billingIssue']),
                    'billingExplanation' => trim($_POST['billingExplanation']),
                    'orderID' => trim($_POST['orderID']),
                    'refundReason' => trim($_POST['refundReason']),
                    'userProfile' => trim($_POST['userProfile']),
                    'reportReason' => trim($_POST['reportReason']),
                    'userQuestion' => trim($_POST['userQuestion']),
                    'questionDescription' => trim($_POST['questionDescription']),
                    'otherType' => trim($_POST['otherType']),
                    'otherDescription' => trim($_POST['otherDescription']),
                    'photo_1' => $new_img1_name,
                    'photo_2' => $new_img2_name,
                    'photo_3' => $new_img3_name
                ];
            } else {
                $data = [
                    'inquiryType' => trim($_POST['inquiryType']),
                    'accountName' => trim($_POST['accountName']),
                    'phoneNumber' => trim($_POST['phoneNumber']),
                    'accountDescription' => trim($_POST['accountDescription']),
                    'issueType' => trim($_POST['issueType']),
                    'technicalDescription' => trim($_POST['technicalDescription']),
                    'bugIssue' => trim($_POST['bugIssue']),
                    'bugDescription' => trim($_POST['bugDescription']),
                    'billingIssue' => trim($_POST['billingIssue']),
                    'billingExplanation' => trim($_POST['billingExplanation']),
                    'orderID' => trim($_POST['orderID']),
                    'refundReason' => trim($_POST['refundReason']),
                    'userProfile' => trim($_POST['userProfile']),
                    'reportReason' => trim($_POST['reportReason']),
                    'userQuestion' => trim($_POST['userQuestion']),
                    'questionDescription' => trim($_POST['questionDescription']),
                    'otherType' => trim($_POST['otherType']),
                    'otherDescription' => trim($_POST['otherDescription']),
                ];
            }
            $this->sortInquries($data);
            } else {
                $this->view('users/contactsupport');
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
            $cart_ini = $this->userModel->cart($_SESSION['user_id']);
            $subtotal = 0;
            foreach ($cart_ini as $cartItem){
                $startDateObj = new DateTime($cartItem->start_date);
                $endDateObj = new DateTime($cartItem->end_date);
                while ($startDateObj <= $endDateObj) {
                    $data_check = [
                        'product_id' => $cartItem->product_id,
                        'date' => $startDateObj->format('Y-m-d')
                    ];
                    $product_data = $this->userModel->viewItem($cartItem->product_id);
                    $availability = $this->userModel->checkAvailability($data_check);
                    $qty = $cartItem->quantity;
                    foreach ($availability as $avail){
                        $qty = $qty + $avail->qty;
                    }
                    if($qty > $product_data->quantity){
                        $this->userModel->setNotAvailableCart($cartItem->product_id, $_SESSION['user_id']);
                        break;
                    }
                    $startDateObj->add(new DateInterval('P1D'));
                }
            }
            $cart = $this->userModel->cart($_SESSION['user_id']);
            foreach ($cart as $cartItem){
                if($cartItem->availability === 'notAvailable'){
                    continue;
                }
                $subtotal = $subtotal + ($cartItem->total);
            }
            $total = $subtotal + $subtotal*0.05 + 200.00;
            
            $data =[
                'cart' => $cart,
                'subtotal' => $subtotal,
                'total' => $total
            ];
        }
        $this->view('users/cart',$data);
    }


    public function getSuborderDetails($suborders, $suborderID) {
        foreach ($suborders as $suborder) {
            if ($suborder['sorder_id'] == $suborderID) {
                return $suborder;
            }
        }
        return null;
    }

    public function orders(){
        $orders = $this->userModel->getOrders($_SESSION['user_id']);
        $completeOrders = $this->userModel->getCompleteOrders($_SESSION['user_id']);
        $order_objects = [];
        $today = strtotime(date("Y-m-d"));
    
        foreach ($orders as $order) {
            $startDateTimestamp = strtotime($order->start_date);
            $endDateTimestamp = strtotime($order->end_date);
            if ($today >= $startDateTimestamp && $today <= $endDateTimestamp) {
                $order->status = 'In-Progress';
                $this->userModel->changeOrderStatus($order->sorder_id, 'In-Progress');
            } elseif ($today > $endDateTimestamp) {
                $order->status = 'Completed';
                $this->userModel->changeOrderStatus($order->sorder_id, 'Completed');
            }
            $user_data = json_decode(json_encode($this->userModel->view($order->user_id)), true);
            $product_data = json_decode(json_encode($this->userModel->getProductData($order->product_id)), true);
            $serviceprovider_data = json_decode(json_encode($this->userModel->getServiceProviderData($order->serviceprovider_id)), true);
            $order_data = json_decode(json_encode($order), true);
            $order_data = array_merge($order_data, $user_data, $product_data, $serviceprovider_data); 
            $order_objects[] = $order_data;
        }
    
        $result = [];
    
        foreach ($completeOrders as $order) {
            $orderDetails = $order;
            $orderSuborderIDs = explode(',', $order->sorder_id);
    
            foreach ($orderSuborderIDs as $suborderID) {
                $suborderDetails = $this->getSuborderDetails($order_objects, $suborderID);
    
                $orderIndex = array_search($orderDetails, array_column($result, 'order'));
    
                if ($orderIndex !== false) {
                    // Order already exists, add the suborder to the existing order
                    $result[$orderIndex]['suborders'][] = $suborderDetails;
                } else {
                    // Order doesn't exist, create a new entry
                    $result[] = [
                        'order' => $orderDetails,
                        'suborders' => [$suborderDetails],
                    ];
                }
            }
        }
        $user_data = json_decode(json_encode($this->userModel->view($order->user_id)), true);
        $data = [
            'orders' => $result,
            'user_data' => $user_data
        ];
        
        $this->view('users/orders', $data);
    }
    
    

    public function placeOrder(){
        $cart = $this->userModel->cart($_SESSION['user_id']);
        $sorder_id = '';
        $avail_ids = '';
        $total = 0; 
        foreach ($cart as $cartItem){
            $product_data = $this->userModel->viewItem($cartItem->product_id);
            $startDateObj = new DateTime($cartItem->start_date);
            $endDateObj = new DateTime($cartItem->end_date);
            while ($startDateObj <= $endDateObj) {
                $avail_data = [
                    'product_id' => $cartItem->product_id,
                    'date' => $startDateObj->format('Y-m-d'),
                    'quantity' => $cartItem->quantity
                ];
                $entry_id = $this->userModel->setAvailability($avail_data);
                if($avail_ids == ''){
                    $avail_ids .= $entry_id;
                } else {
                    $avail_ids .= ','.$entry_id;
                }
                $startDateObj->add(new DateInterval('P1D'));
            }
            $data = [
                'user_id' => $_SESSION['user_id'],
                'serviceprovider_id' => $product_data->created_by,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'start_date' => $cartItem->start_date,
                'end_date' => $cartItem->end_date,
                'days' => $cartItem->days,
                'total' => $cartItem->total,
                'status' => 'Pending',
                'avail' => $avail_ids
            ];
            $total = $total + $cartItem->total;
            $this->userModel->placeOrder($data);
            $result = $this->userModel->getSubOrderId($data);
            $temp = $result->sorder_id;
            if($sorder_id == ''){
                $sorder_id .= $temp;
            } else {
                $sorder_id .= ','.$temp;
            }
        }
        $total = $total + $total*0.05 + 200.00;
        $data_order = [
            'user_id' => $_SESSION['user_id'],
            'sorder_id' => $sorder_id,
            'total' => $total
        ];
        if($this->userModel->placeOrderTotal($data_order)){
            $this->userModel->clearCart($_SESSION['user_id']);
            redirect('users/index');
        } else {
            die('Something went wrong');
        }
    }

    public function removeFromCart($product_id){
        $this->userModel->removeFromCart($product_id);
        $cart = $this->userModel->cart($_SESSION['user_id']);
        $subtotal = 0;
        foreach ($cart as $cartItem){
            if($cartItem->availability === 'notAvailable'){
                continue;
            }
            $subtotal = $subtotal + ($cartItem->total);
        }
        $total = $subtotal + $subtotal*0.05 + 200.00;
        
        $data =[
            'cart' => $cart,
            'subtotal' => $subtotal,
            'total' => $total
        ];
        $this->view('users/cart',$data);
    }

    public function checkAvailability($product_id){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =[
                'product_id' => $product_id,
                'quantity' =>trim($_POST['quantity']),
                'start_date' =>trim($_POST['fromDate']),
                'end_date' =>trim($_POST['toDate'])
            ];
            $avalability = true;
            $startDateObj = new DateTime($data['start_date']);
            $endDateObj = new DateTime($data['end_date']);
            while ($startDateObj <= $endDateObj) {
                $data_check = [
                    'product_id' => $data['product_id'],
                    'date' => $startDateObj->format('Y-m-d')
                ];
                $product_data = $this->userModel->viewItem($product_id);
                $availability = $this->userModel->checkAvailability($data_check);
                $qty = $data['quantity'];
                foreach ($availability as $avail){
                    $qty = $qty + $avail->qty;
                }
                if($qty > $product_data->quantity){
                    $avalability = false;
                    break;
                }
                $startDateObj->add(new DateInterval('P1D'));
            }
            if($avalability){
                $this->viewItemAC($product_id, 'available', $data);
            } else {
                $this->viewItemAC($product_id, 'notAvailable', $data);
            }
        } else {
            die('Something went wrong');
        }
    }

    public function viewItemAC($product_id, $availability, $data_selected){
        $data = $this->userModel->viewItem($product_id);
        $reviews = $this->userModel->viewreviews($product_id);
        $user = $this->userModel->view($_SESSION['user_id']);
        $purchased = false;
        $productPurchased = $this->userModel->checkProductPurchased($product_id, $_SESSION['user_id'], 'Completed');
        if($productPurchased){
            $purchased = true;
        }
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
            'star5'=>$star5,
            'availability' => $availability,
            'quantity_selected' => $data_selected['quantity'],
            'start_date' => $data_selected['start_date'],
            'end_date' => $data_selected['end_date'],
            'purchased' => $purchased
        ];
        $this->view('users/viewItem',$data);
    } else {
        die('Something went wrong');
    }
}

    public function viewItem($product_id){
            $data = $this->userModel->viewItem($product_id);
            $reviews = $this->userModel->viewreviews($product_id);
            $user = $this->userModel->view($_SESSION['user_id']);
            $purchased = false;
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

            $productPurchased = $this->userModel->checkProductPurchased($product_id, $_SESSION['user_id'], 'Completed');
            if($productPurchased){
                $purchased = true;
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
                'star5'=>$star5,
                'availability' => 'notChecked',
                'quantity_selected' => '',
                'start_date' => '',
                'end_date' => '',
                'purchased' => $purchased
            ];
            $this->view('users/viewItem',$data);
        } else {
            die('Something went wrong');
        }
    }


    public function addToCart($product_id){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $cart = $this->userModel->cart($_SESSION['user_id']);
            $cart_data_check =[
                'product_id' => $product_id,
                'quantity' =>trim($_POST['quantity']),
                'start_date' =>trim($_POST['fromDate']),
                'end_date' =>trim($_POST['toDate'])
            ];
            $item_exists = false;
            foreach ($cart as $cartItem){
                if($cartItem->product_id == $product_id){
                    $this->viewItemAC($product_id, 'alreadyInCart', $cart_data_check);
                    $item_exists = true;
                }
            }
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $startDateObj = new DateTime(trim($_POST['fromDate']));
            $endDateObj = new DateTime(trim($_POST['toDate']));
            $days = 0;
            while ($startDateObj <= $endDateObj) {
                $days = $days + 1;
                $startDateObj->add(new DateInterval('P1D'));
            }
            $product_data = $this->userModel->viewItem($product_id);
            $total = $days * $product_data->unit_price * trim($_POST['quantity']);
            $data =[
                'product_id' => $product_id,
                'quantity' =>trim($_POST['quantity']),
                'start_date' =>trim($_POST['fromDate']),
                'end_date' =>trim($_POST['toDate']),
                'user_id' => $_SESSION['user_id'],
                'days' => $days,
                'total' => $total,
                'availability' => 'available',
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

            if(empty($data['quantity_err']) && $item_exists == false){
                if($this->userModel->addToCart($data)){
                    redirect('users/viewItem/'.$product_id);
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

    public function cartItemCount(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $cart = $this->userModel->cart($_SESSION['user_id']);
            $data =[
                'Count'=>count($cart)
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
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