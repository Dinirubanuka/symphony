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
        $log_data = [
            'user_type' => 'Customer',
            'user_id' => $_SESSION['user_id'],
            'log_type' => 'Manage Profile',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'User viewed their profile'
        ];
        $this->userModel->addLogData($log_data);
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
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $_SESSION['user_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User failed to upload a new profile photo'
                    ];
                    $this->userModel->addLogData($log_data);
                    redirect('users/profile');
                } else {
                    die('Something went wrong with photo update');
                }
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/mag_img/' . $new_img_name;
                $bool = move_uploaded_file($tmp_name, $img_upload_path);
                if ($this->userModel->photoUpdate($new_img_name)) {
                    // flash('register_success', 'You are registered and can log in');
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $_SESSION['user_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User uploaded a new profile photo photo'
                    ];
                    $this->userModel->addLogData($log_data);
                    redirect('users/profile');
                } else {
                    die('Something went wrong with photo update');
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
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'Manage Profile',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User viewed the profile update page'
            ];
            $this->userModel->addLogData($log_data);
            $this->view('users/edit', $data);
        } else {
            $this->view('users/edit', $data);
        }
    }

    public function cancelOrder($order_id, $sorder_id)
    {   
        $orders = $this->userModel->getOrders($_SESSION['user_id']);
        foreach ($orders as $order) {
            if ($order->sorder_id == $sorder_id) {
                $total = $order->total;
                $order_data = json_decode(json_encode($order), true);
            }
        }
        $resultString = implode(', ', json_decode(json_encode($order_data), true));
        $resultArray = explode(', ', $resultString);
        $finalArray = explode(',', $resultArray[10]);
        foreach ($finalArray as $entry_id) {
            $this->userModel->removeAvailability($entry_id);
        }
        $this->userModel->changeOrderStatus($sorder_id, 'Cancelled');
        $this->userModel->updateFinalOrder($total, $order_id);
        $log_data = [
            'user_type' => 'Customer',
            'user_id' => $_SESSION['user_id'],
            'log_type' => 'Order Cancel',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'User cancelled an order with order id: ' . $order_id . ' and sub order id: ' . $sorder_id
        ];
        $this->userModel->addLogData($log_data);
        redirect('users/orders');
    }

    public function completeOrder($order_id, $sorder_id)
    {
        $order_data = $this->userModel->getOrderData($sorder_id);
        $today = date('Y-m-d');
        $end_data = $order_data->end_date;
        $today_timestamp = strtotime($today);
        $end_date_timestamp = strtotime($end_date);
        $day_difference = ($today_timestamp - $end_date_timestamp) / (60 * 60 * 24);
        if ($day_difference > 0) {
            $fine = $day_difference * ($order_data->extra / 3);
            $this->userModel->addFine($fine, $sorder_id);
        }
        $this->userModel->changeOrderStatus($sorder_id, 'Completed');
        $log_data = [
            'user_type' => 'Customer',
            'user_id' => $_SESSION['user_id'],
            'log_type' => 'Order Complete',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'User completed an order with order id: ' . $order_id . ' and sub order id: ' . $sorder_id
        ];
        $this->userModel->addLogData($log_data);
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
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $_SESSION['user_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User updated their profile information'
                    ];
                    $this->userModel->addLogData($log_data);
                    redirect('users/profile');
                } else {
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $_SESSION['user_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User failed to update their profile information'
                    ];
                    $this->userModel->addLogData($log_data);
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
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
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $_SESSION['user_id'],
                        'log_type' => 'Account Delete',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User deleted their account'
                    ];
                    $this->userModel->addLogData($log_data);
                    unset($_SESSION['user_id']);
                    unset($_SESSION['user_email']);
                    unset($_SESSION['user_name']);
                    session_destroy();
                    redirect('pages/index');
                } else {
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $_SESSION['user_id'],
                        'log_type' => 'Account Delete',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User failed to delete their account'
                    ];
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
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'Add Inquiry',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User made an inquiry with inquiry type: ' . $inquiryData['inquiryType']
            ];
            $this->userModel->addLogData($log_data);
            redirect('users/inquiries');
        } else {
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'Add Inquiry',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User failed to make an inquiry with inquiry type: ' . $inquiryData['inquiryType']
            ];
            $this->userModel->addLogData($log_data);
            die('Something went wrong');
        }
    }

    public function inquiries()
    {
        $inquiries = $this->userModel->getInquiries($_SESSION['user_id']);
        $data = [
            'inquiries' => $inquiries
        ];
        $log_data = [
            'user_type' => 'Customer',
            'user_id' => $_SESSION['user_id'],
            'log_type' => 'View Inquiries',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'User viewed their inquiries'
        ];
        $this->userModel->addLogData($log_data);
        $this->view('users/inquiries', $data);
    }

    public function viewInquiry($inquiry_id)
    {
        $inquiry = $this->userModel->getInquiry($inquiry_id);
        if($inquiry->status == 'Pending'){
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'View Inquiry',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User tried to view an inquiry with inquiry id: ' . $inquiry_id . ' and inquiry type: ' . $inquiry->inquiryType . ' but it is still pending'
            ];
            $this->userModel->addLogData($log_data);
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
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'View Inquiry',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User viewed an inquiry with inquiry id: ' . $inquiry_id . ' and inquiry type: ' . $inquiry->inquiryType
            ];
            $this->userModel->addLogData($log_data);
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
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'Send Message',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User sent a message to a moderator with inquiry id: ' . $inquiry_id . ' and moderator id: ' . $moderator_id
            ];
            $this->userModel->addLogData($log_data);
            redirect('users/viewInquiry/'.$inquiry_id.'');
        } else {
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'Send Message',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User failed to send a message to a moderator with inquiry id: ' . $inquiry_id . ' and moderator id: ' . $moderator_id
            ];
            $this->userModel->addLogData($log_data);
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

    public function changePassword(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'current_password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => '',
                'user_id' => $_SESSION['user_id']
            ];
            $result = $this->userModel->fectchEncrptedPassword($_SESSION['user_id'], $data['current_password']);
            $user_data = $this->userModel->view($_SESSION['user_id']);
            if($result){
                if(empty($data['new_password'])){
                    $data['new_password_err'] = 'Please enter new password';
                } elseif(strlen($data['new_password']) < 6){
                    $data['new_password_err'] = 'Password must be at least 6 characters';
                } elseif(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['new_password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }
                if(empty($data['current_password_err']) && empty($data['new_password_err']) && empty($data['confirm_password_err'])){
                    $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                    if($this->userModel->changePassword($data)){
                        $this->userModel->addPreviousPassword($user_data->id, $user_data->password);
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Password Change',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User changed their password while logged in'
                        ];
                        $this->userModel->addLogData($log_data);
                        $this->logout();
                    } else {
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Password Change',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User failed to change their password while logged in'
                        ];
                        $this->userModel->addLogData($log_data);
                        die('Something went wrong');
                    }
                } else {
                    $this->view('users/changepassword', $data);
                }
            } else {
                $data['current_password_err'] = 'Current password entered is invalid!';
                $this->view('users/changepassword', $data);
            }
        } else {
            $data = [
                'current_password' => '',
                'new_password' => '',
                'confirm_password' => '',
                'current_password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'Password Change',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User viewed the change password page while logged in'
            ];
            $this->userModel->addLogData($log_data);
            $this->view('users/changepassword', $data);
        }
    }

    public function changePassword_lo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $user_id = trim($_POST['user_id']);
            $data = [
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'new_password_err' => '',
                'confirm_password_err' => '',
                'user_id' => $user_id
            ];
            $user_data = $this->userModel->view($user_id);
            if(empty($data['new_password'])){
                $data['new_password_err'] = 'Please enter new password';
            } elseif(strlen($data['new_password']) < 6){
                $data['new_password_err'] = 'Password must be at least 6 characters';
            } elseif(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['new_password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            if(empty($data['current_password_err']) && empty($data['new_password_err']) && empty($data['confirm_password_err'])){
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                if($this->userModel->changePassword($data)){
                    $this->userModel->addPreviousPassword($user_data->id, $user_data->password);
                    $message = 'Password changed successfully! Please login with your new password';
                    $data = [
                        'message' => $message
                    ];
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $user_id,
                        'log_type' => 'Password Change',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User changed their password using forgot password'
                    ];
                    $this->userModel->addLogData($log_data);
                    $this->view('users/forgotpassword', $data); 
                } else {
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $user_id,
                        'log_type' => 'Password Change',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User failed to change their password using forgot password'
                    ];
                    $this->userModel->addLogData($log_data);
                    die('Something went wrong');
                }
            } else {
                $log_data = [
                    'user_type' => 'Customer',
                    'user_id' => $user_id,
                    'log_type' => 'Password Change',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'User failed to input the correct details to change their password using forgot password'
                ];
                $this->view('users/changepassword_lo', $data);
            }
        } else {
            $data = [
                'new_password' => '',
                'confirm_password' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('users/changepassword_lo', $data);
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
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $_SESSION['user_id'],
                        'log_type' => 'Verification',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User verified their account successfully '
                    ];
                    $this->userModel->addLogData($log_data);
                    $this->view('users/succesfull', $data);
                } else {
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $_SESSION['user_id'],
                        'log_type' => 'Verification',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User failed to verify their account'
                    ];
                    $this->userModel->addLogData($log_data);
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
                'registration_date' => date('Y-m-d'),
                'question' => trim($_POST['securityQuestion']),
                'answer' => trim($_POST['securityAnswer']),
                'name_err' => '',
                'email_err' => '',
                'tel_Number_err' => '',
                'date_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'security_question_err' => '',
                'security_answer_err' => ''
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

            if (empty($data['question'])) {
                $data['security_question_err'] = 'Please select a security question';
            }

            // Validate Date
            if (empty($data['answer'])) {
                $data['security_answer_err'] = 'Please enter an answer to the security question';
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
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['tel_Number_err']) && empty($data['date_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['security_question_err']) && empty($data['security_answer_err'])){
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    $user_id = $this->userModel->getUserIdByEmail($data['email']);
                    $sec_data = [
                        'user_id' => $user_id->id,
                        'question' => $data['question'],
                        'answer' => $data['answer']
                    ];
                    $this->userModel->addSecurityQuestion($sec_data);
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $user_id->id,
                        'log_type' => 'Registration',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User registered - Waiting for verification'
                    ];
                    $this->userModel->addLogData($log_data);
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
                'confirm_password_err' => '',
                'security_question_err' => '',
                'security_answer_err' => ''
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    public function forgotpassword(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type = trim($_POST['recoveryType']);
            if($type == 'emailMethod'){
                $email = trim($_POST['email']);
                $user_name = trim($_POST['email_accountName']);
                $user_data = $this->userModel->getUserByEmail($email);
                if($user_data->name == $user_name){
                    $length = 16;
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $password = '';

                    for ($i = 0; $i < $length; $i++) {
                        $randomIndex = rand(0, strlen($characters) - 1);
                        $password .= $characters[$randomIndex];
                    }

                    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
                    
                    $data_info = [
                        'email' => $email,
                        'password' => $password,
                        'name' => $user_name,
                        'password_hashed' => $password_hashed
                    ];
                    
                    $this->userModel->sendRecoveryEmail($data_info);
                }

                $message = "If the provided e-mail and User name matches an account in our databse an email will be sent to your email address. Please check your email to recover your account.";
                $data = [
                    'message' => $message
                ];
                $log_data = [
                    'user_type' => 'Customer',
                    'user_id' => $user_data->id,
                    'log_type' => 'Password Change',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'User requested to recover their account using email method'
                ];
                $this->userModel->addLogData($log_data);
                $this->view('users/forgotpassword', $data);
            } else if ($type == 'passwordMethod'){
                $user_name = trim($_POST['pw_accountName']);
                $password = trim($_POST['password']);
                $user_data = $this->userModel->getUserByName($user_name);
                $pass_true = false;
                $password_hashed = password_hash($password, PASSWORD_DEFAULT);
                $previous_password = $this->userModel->getPreviousPasswords($user_data->id);
                foreach ($previous_password as $prev_pass){
                    if(password_verify($password, $prev_pass->password)){
                        $pass_true = true;
                    }
                }
                if($pass_true){
                    $data = [
                        'new_password_err' => '',
                        'confirm_password_err' => '',
                        'user_id' => $user_data->id
                    ];
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $user_data->id,
                        'log_type' => 'Password Change',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User requested to recover their account using password method'
                    ];
                    $this->userModel->addLogData($log_data);
                    $this->view('users/changepassword_lo', $data);
                } else {
                    $log_data = [
                        'user_type' => 'Customer',
                        'user_id' => $user_data->id,
                        'log_type' => 'Password Change',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'User failed to enter a previous password to recover their account using password method'
                    ];
                    $this->userModel->addLogData($log_data);
                    $message = "The password you entered is not a previous password. Please enter a previous password to recover your account.";
                    $data = [
                        'message' => $message
                    ];
                    $this->view('users/forgotpassword', $data);
                }
            } else if ($type == 'dontRemember'){
                $data = [
                    'user_name' => trim($_POST['other_accountName']),
                    'first_purchase_date' => trim($_POST['firstPurchaseDate']),
                    'first_purchase_item' => trim($_POST['firstPurchase']),
                    'last_purchase_date' => trim($_POST['lastPurchaseDate']),
                    'last_purchase_item' => trim($_POST['lastPurchase']),
                    'account_created_on' => trim($_POST['accountCreatedDate']),
                    'mobile_number' => trim($_POST['mobileNumber']),
                    'address' => trim($_POST['address']),
                    'dob' => trim($_POST['dob']),
                    'gender' => trim($_POST['gender']),
                    'other' => trim($_POST['otherInfo']),
                    'contactEmail' => trim($_POST['contactEmail']),
                    'securityQuestion' => trim($_POST['securityQuestion']),
                    'securityAnswer' => trim($_POST['securityAnswer']),
                    'status' => 'Pending'
                ];
                if($this->userModel->addRecoveryRequest($data)){
                    $message = "Your request has been submitted. If the information provided matches an account in our database an email will be sent to your email address. Please check your email to recover your account.";
                    $data = [
                        'message' => $message
                    ];
                    $this->view('users/forgotpassword', $data);
                } else {
                    die('Something went wrong');
                }
            }
                
        } else {
            $data = [
                'message' => ''
            ];
            $this->view('users/forgotpassword', $data);
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
            } else if($this->userModel->findBannedUserByEmail($data['email'])){
                $data['email_err'] = 'Sorry, Your account has been banned!';
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                $log_data = [
                    'user_type' => 'Customer',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'user_id' => $loggedInUser->id,
                    'log_type' => 'Login',
                    'data' => 'User logged in'
                ];
                if ($loggedInUser) {
                    $this->userModel->addLogData($log_data);
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
        $log_data = [
            'user_type' => 'Customer',
            'date_and_time' => date('Y-m-d H:i:s'),
            'user_id' => $_SESSION['user_id'],
            'log_type' => 'Logout',
            'data' => 'User logged out'
        ];
        $this->userModel->addLogData($log_data);
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
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'View Instruments',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User viewed the instruments available'
            ];
            $this->userModel->addLogData($log_data);
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function Studio()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inventory = $this->userModel->studio();
            $data = [
                'inventory' => $inventory
            ];
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'View Studios',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User viewed the studios available'
            ];
            $this->userModel->addLogData($log_data);
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        } else{
            $this->view('users/studio');
        }
    }

    public function Singer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inventory = $this->userModel->singer();
            $data = [
                'inventory' => $inventory
            ];
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'View Singers',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User viewed the singers available'
            ];
            $this->userModel->addLogData($log_data);
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        } else {
            $this->view('users/singer');
        }
    }

    public function Band()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inventory = $this->userModel->band();
            $data = [
                'inventory' => $inventory
            ];
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'View Bands',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User viewed the bands available'
            ];
            $this->userModel->addLogData($log_data);
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        } else {
            $this->view('users/band');
        }
    }

    public function Musicians()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inventory = $this->userModel->musicians();
            $data = [
                'inventory' => $inventory
            ];
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'View Musicians',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User viewed the musicians available'
            ];
            $this->userModel->addLogData($log_data);
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        } else {
            $this->view('users/musicians');
        }
    }

    public function cart(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $cart_ini = $this->userModel->cart($_SESSION['user_id']);
            $subtotal = 0;
            $extra_charge = 0;
            foreach ($cart_ini as $cartItem){
                $startDateObj = new DateTime($cartItem->start_date);
                $endDateObj = new DateTime($cartItem->end_date);
                while ($startDateObj <= $endDateObj) {
                    $data_check = [
                        'product_id' => $cartItem->product_id,
                        'type' => $cartItem->type,
                        'date' => $startDateObj->format('Y-m-d')
                    ];
                    if($cartItem->type == 'Equipment'){
                        $product_data = $this->userModel->viewItem($cartItem->product_id);
                    } else if($cartItem->type == 'Studio'){
                        $product_data = $this->userModel->viewStudio($cartItem->product_id);
                    } else if($cartItem->type == 'Singer'){
                        $product_data = $this->userModel->viewSinger($cartItem->product_id);
                    } else if($cartItem->type == 'Band'){
                        $product_data = $this->userModel->viewBand($cartItem->product_id);
                    } else if($cartItem->type == 'Musician'){
                        $product_data = $this->userModel->viewMusician($cartItem->product_id);
                    }
                    $availability = $this->userModel->checkAvailability($data_check);
                    $qty = $cartItem->quantity;
                    foreach ($availability as $avail){
                        $qty = $qty + $avail->qty;
                    }
                    if($qty > $product_data->quantity){
                        $this->userModel->setNotAvailableCart($cartItem->product_id, $_SESSION['user_id'], $cartItem->type);
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
                $extra_charge = $extra_charge + $cartItem->extra;
                $subtotal = $subtotal + ($cartItem->total);
                if ($cartItem->type == 'Equipment'){
                    $product_data = $this->userModel->viewItem($cartItem->product_id);
                    $product_data->type = 'Equipment';
                } else if ($cartItem->type == 'Studio'){
                    $product_data = $this->userModel->viewStudio($cartItem->product_id);
                    $product_data->type = 'Studio';
                } else if ($cartItem->type == 'Singer'){
                    $product_data = $this->userModel->viewSinger($cartItem->product_id);
                    $product_data->type = 'Singer';
                } else if ($cartItem->type == 'Band'){
                    $product_data = $this->userModel->viewBand($cartItem->product_id);
                    $product_data->type = 'Band';
                } else if ($cartItem->type == 'Musician'){
                    $product_data = $this->userModel->viewMusician($cartItem->product_id);
                    $product_data->type = 'Musician';
                }
                $cartItem->product_data = $product_data;
            }
            $total = $subtotal + $subtotal*0.05 + 200.00 + $extra_charge;
            
            $data =[
                'cart' => $cart,
                'subtotal' => $subtotal,
                'total' => $total,
                'extra_charge' => $extra_charge,
            ];
        }
        $log_data = [
            'user_type' => 'Customer',
            'user_id' => $_SESSION['user_id'],
            'log_type' => 'Manage Cart',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'User viewed their cart'
        ];
        $this->userModel->addLogData($log_data);
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
            if ($today >= $startDateTimestamp && $today <= $endDateTimestamp && $order->status == 'Upcoming') {
                $order->status = 'In-Progress';
                $this->userModel->changeOrderStatus($order->sorder_id, 'In-Progress');
            }
            $user_data = json_decode(json_encode($this->userModel->view($order->user_id)), true);
            if ($order->type == 'Equipment'){
                $product_data = json_decode(json_encode($this->userModel->getItemData($order->product_id)), true);
            } else if ($order->type == 'Studio'){
                $product_data = json_decode(json_encode($this->userModel->getStudioData($order->product_id)), true);
            } else if ($order->type == 'Singer'){
                $product_data = json_decode(json_encode($this->userModel->getSingerData($order->product_id)), true);
            } else if ($order->type == 'Band'){
                $product_data = json_decode(json_encode($this->userModel->getBandData($order->product_id)), true);
            } else if ($order->type == 'Musician'){
                $product_data = json_decode(json_encode($this->userModel->getMusicianData($order->product_id)), true);
            }
            if (isset($user_data['status'])) {
                unset($user_data['status']);
            }
            if (isset($product_data['status'])) {
                unset($product_data['status']);
            }
            $order_data = json_decode(json_encode($order), true);
            $order_data = array_merge($order_data, $user_data, $product_data); 
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
        $log_data = [
            'user_type' => 'Customer',
            'user_id' => $_SESSION['user_id'],
            'log_type' => 'View Orders',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'User viewed their orders'
        ];
        $this->userModel->addLogData($log_data);
        $this->view('users/orders', $data);
    }
    
    

    public function placeOrder(){
        $cart = $this->userModel->cart($_SESSION['user_id']);
        $sorder_id = '';
        $avail_ids = '';
        $total = 0; 
        $order_deposit = 0;
        $today = date("Y-m-d");
        foreach ($cart as $cartItem){
            if ($cartItem->type == 'Equipment'){
                $product_data = $this->userModel->viewItem($cartItem->product_id);
                $product_data->type = 'Equipment';
            } else if ($cartItem->type == 'Studio'){
                $product_data = $this->userModel->viewStudio($cartItem->product_id);
                $product_data->type = 'Studio';
            } else if ($cartItem->type == 'Singer'){
                $product_data = $this->userModel->viewSinger($cartItem->product_id);
                $product_data->type = 'Singer';
            } else if ($cartItem->type == 'Band'){
                $product_data = $this->userModel->viewBand($cartItem->product_id);
                $product_data->type = 'Band';
            } else if ($cartItem->type == 'Musician'){
                $product_data = $this->userModel->viewMusician($cartItem->product_id);
                $product_data->type = 'Musician';
            }
            $startDateObj = new DateTime($cartItem->start_date);
            $endDateObj = new DateTime($cartItem->end_date);
            while ($startDateObj <= $endDateObj) {
                $avail_data = [
                    'type' => $cartItem->type,
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
                'avail' => $avail_ids,
                'type' => $cartItem->type,
                'order_placed_on' => $today,
                'extra' => $cartItem->extra
            ];
            $total = $total + $cartItem->total + $cartItem->extra;
            $order_deposit = $order_deposit + $cartItem->extra;
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
            'total' => $total,
            'order_placed_on' => $today,
            'deposit' => $order_deposit,
        ];
        if($this->userModel->placeOrderTotal($data_order)){
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'Place Order',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'User placed an order'
            ];
            $this->userModel->addLogData($log_data);
            $this->userModel->clearCart($_SESSION['user_id']);
            redirect('users/index');
        } else {
            die('Something went wrong');
        }
    }

    public function removeFromCart($product_id, $type){
        $this->userModel->removeFromCart($product_id);
        $cart = $this->userModel->cart($_SESSION['user_id']);
        $subtotal = 0;
        foreach ($cart as $cartItem){
            if($cartItem->availability === 'notAvailable'){
                continue;
            }
            $subtotal = $subtotal + ($cartItem->total);
            if ($cartItem->type == 'Equipment'){
                $product_data = $this->userModel->viewItem($cartItem->product_id);
                $product_data->type = 'Equipment';
            } else if ($cartItem->type == 'Studio'){
                $product_data = $this->userModel->viewStudio($cartItem->product_id);
                $product_data->type = 'Studio';
            } else if ($cartItem->type == 'Singer'){
                $product_data = $this->userModel->viewSinger($cartItem->product_id);
                $product_data->type = 'Singer';
            } else if ($cartItem->type == 'Band'){
                $product_data = $this->userModel->viewBand($cartItem->product_id);
                $product_data->type = 'Band';
            } else if ($cartItem->type == 'Musician'){
                $product_data = $this->userModel->viewMusician($cartItem->product_id);
                $product_data->type = 'Musician';
            }
            $cartItem->product_data = $product_data;
        }
        $total = $subtotal + $subtotal*0.05 + 200.00;
        
        $data =[
            'cart' => $cart,
            'subtotal' => $subtotal,
            'total' => $total
        ];
        $log_data = [
            'user_type' => 'Customer',
            'user_id' => $_SESSION['user_id'],
            'log_type' => 'Manage Cart',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'User removed an '.$type.' with product id '.$product_id.' from their cart'
        ];
        $this->userModel->addLogData($log_data);
        $this->view('users/cart',$data);
    }

    public function checkAvailability($type, $product_id){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =[
                'product_id' => $product_id,
                'type' => $type,    
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
                    'type' => $data['type'],
                    'date' => $startDateObj->format('Y-m-d')
                ];
                if($type == 'Equipment'){
                    $product_data = $this->userModel->viewItem($product_id);
                } else if($type == 'Studio'){
                    $product_data = $this->userModel->viewStudio($product_id);
                } else if($type == 'Singer'){
                    $product_data = $this->userModel->viewSinger($product_id);
                } else if($type == 'Band'){
                    $product_data = $this->userModel->viewBand($product_id);
                } else if($type == 'Musician'){
                    $product_data = $this->userModel->viewMusician($product_id);
                }
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
            $log_data = [
                'user_type' => 'Customer',
                'user_id' => $_SESSION['user_id'],
                'log_type' => 'Check Availability',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => "User checked the availability of an $type  with product id $product_id"
            ];
            $this->userModel->addLogData($log_data);
            if($avalability){
                $this->viewAllAC($type, 'available', $data);
            } else {
                $this->viewAllAC($type, 'notAvailable', $data);
            }
        } else {
            die('Something went wrong in checkAvailability');
        }
    }

    public function viewAllAC($type, $availability, $data_selected){
        $product_id = $data_selected['product_id'];
        if($type == 'Equipment'){
            $data = $this->userModel->viewItem($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        } else if($type == 'Studio'){
            $data = $this->userModel->viewStudio($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        } else if($type == 'Singer'){
            $data = $this->userModel->viewSinger($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        } else if($type == 'Band'){
            $data = $this->userModel->viewBand($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        } else if($type == 'Musician'){
            $data = $this->userModel->viewMusician($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        }
        $user = $this->userModel->view($_SESSION['user_id']);
        $purchased = true;
        // $productPurchased = $this->userModel->checkProductPurchased($product_id, $_SESSION['user_id'], 'Completed');
        // if($productPurchased){
        //     $purchased = true;
        // }
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
        if ($type == 'Equipment'){
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
                'purchased' => $purchased,
                'type' => $type
            ];
            $this->view('users/viewItem',$data);
        } else if ($type == 'Studio'){
            $data = [
                'product_id' => $data->product_id,
                'created_by' => $data->created_by,
                'category' => $data->category,
                'brand' => $data->brand,
                'model' => $data->model,
                'quantity' => $data->quantity,
                'unit_price' => $data->unit_price,
                'photo_1' => $data->photo_1,
                'photo_2' => $data->photo_2,
                'photo_3' => $data->photo_3,
                'Title' => $data->Title,
                'Description' => $data->Description,
                'outOfStock' => $data->outOfStock,
                'createdDate' => $data->createdDate,
                'warranty' => $data->warranty,
                'location' => $data->location,
                'instrument' => $data->instrument,
                'descriptionSounds' => $data->descriptionSounds,
                'descriptionStudio' => $data->descriptionStudio,
                'telephoneNumber' => $data->telephoneNumber,
                'videoLink' => $data->videoLink,
                'airCondition' => $data->airCondition,
                'status' => $data->status,
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
                'purchased' => $purchased,
                'type' => $type
            ];
            $this->view('users/viewItem',$data);
        } else if ($type == 'Singer'){
            $data = [
                'product_id' => $data->product_id,
                'created_by' => $data->created_by,
                'category' => $data->category,
                'brand' => $data->brand,
                'model' => $data->model,
                'quantity' => $data->quantity,
                'unit_price' => $data->unit_price,
                'photo_1' => $data->photo_1,
                'photo_2' => $data->photo_2,
                'photo_3' => $data->photo_3,
                'Title' => $data->Title,
                'Description' => $data->Description,
                'outOfStock' => $data->outOfStock,
                'createdDate' => $data->createdDate,
                'warranty' => $data->warranty,
                'singer_name' => $data->name,
                'nickName' => $data->nickName,
                'telephoneNumber' => $data->telephoneNumber,
                'videoLink' => $data->videoLink,
                'location' => $data->location,
                'instrument' => $data->instrument,
                'singerPhoto' => $data->singerPhoto,
                'email' => $data->email,
                'status' => $data->status,
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
                'purchased' => $purchased,
                'type' => $type
            ];
            $this->view('users/viewItem',$data);
        } else if ($type == 'Musician'){
            $data = [
                'product_id' => $data->product_id,
                'created_by' => $data->created_by,
                'category' => $data->category,
                'brand' => $data->brand,
                'model' => $data->model,
                'quantity' => $data->quantity,
                'unit_price' => $data->unit_price,
                'photo_1' => $data->photo_1,
                'photo_2' => $data->photo_2,
                'photo_3' => $data->photo_3,
                'Title' => $data->Title,
                'Description' => $data->Description,
                'outOfStock' => $data->outOfStock,
                'createdDate' => $data->createdDate,
                'warranty' => $data->warranty,
                'musician_name' => $data->name,
                'nickName' => $data->nickName,
                'telephoneNumber' => $data->telephoneNumber,
                'videoLink' => $data->videoLink,
                'location' => $data->location,
                'instrument' => $data->instrument,
                'singerPhoto' => $data->singerPhoto,
                'email' => $data->email,
                'status' => $data->status,
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
                'purchased' => $purchased,
                'type' => $type
            ];
            $this->view('users/viewItem',$data);
        } else if ($type == 'Band'){
            $data = [
                'product_id' => $data->product_id,
                'created_by' => $data->created_by,
                'category' => $data->category,
                'brand' => $data->brand,
                'model' => $data->model,
                'unit_price' => $data->unit_price,
                'quantity' => $data->quantity,
                'photo_1' => $data->photo_1,
                'photo_2' => $data->photo_2,
                'photo_3' => $data->photo_3,
                'Title' => $data->Title,
                'Description' => $data->Description,
                'outOfStock' => $data->outOfStock,
                'createdDate' => $data->createdDate,
                'warranty' => $data->warranty,
                'videoLink' => $data->videoLink,
                'instrument' => $data->instrument,
                'email' => $data->email,
                'telephoneNumber' => $data->telephoneNumber,
                'memberCount' => $data->memberCount,
                'leaderPhoto' => $data->leaderPhoto,
                'bandPhoto' => $data->bandPhoto,
                'location' => $data->location,
                'leaderName' => $data->leaderName,
                'status' => $data->status,
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
                'purchased' => $purchased,
                'type' => $type
            ];
            $this->view('users/viewItem',$data);
        } 
    } else {
        die('Something went wrong');
    }
}
    public function viewItem($product_id){
        $type = 'Equipment';
        $this->viewAll($product_id, $type);
    }

    public function viewStudio($product_id){
        $type = 'Studio';
        $this->viewAll($product_id, $type);
    }

    public function viewSinger($product_id){
        $type = 'Singer';
        $this->viewAll($product_id, $type);
    }

    public function viewBand($product_id){
        $type = 'Band';
        $this->viewAll($product_id, $type);
    }

    public function viewMusician($product_id){
        $type = 'Musician';
        $this->viewAll($product_id, $type);
    }

    public function viewAll($product_id, $type){
        if($type == 'Equipment'){
            $data = $this->userModel->viewItem($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        }
        if($type == 'Studio'){
            $data = $this->userModel->viewStudio($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        }

        if($type == 'Singer'){
            $data = $this->userModel->viewSinger($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        }

        if($type == 'Band'){
            $data = $this->userModel->viewBand($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        }

        if($type == 'Musician'){
            $data = $this->userModel->viewMusician($product_id);
            $reviews = $this->userModel->viewreviews($product_id, $type);
        }
        $user = $this->userModel->view($_SESSION['user_id']);
        $purchased = true;
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

        // $productPurchased = $this->userModel->checkProductPurchased($product_id, $_SESSION['user_id'], 'Completed');
        // if($productPurchased){
        //     $purchased = true;
        // }
        if($data){
            if ($type == 'Equipment'){
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
                    'purchased' => $purchased,
                    'type' => $type
                ];
                $log_data = [
                    'user_type' => 'Customer',
                    'user_id' => $_SESSION['user_id'],
                    'log_type' => 'View Instrument',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'User viewed an instrument with product id '.$product_id
                ];
                $this->userModel->addLogData($log_data);
                $this->view('users/viewItem',$data);
            } else if ($type == 'Studio'){
                $data = [
                    'product_id' => $data->product_id,
                    'created_by' => $data->created_by,
                    'category' => $data->category,
                    'brand' => $data->brand,
                    'model' => $data->model,
                    'quantity' => $data->quantity,
                    'unit_price' => $data->unit_price,
                    'photo_1' => $data->photo_1,
                    'photo_2' => $data->photo_2,
                    'photo_3' => $data->photo_3,
                    'Title' => $data->Title,
                    'Description' => $data->Description,
                    'outOfStock' => $data->outOfStock,
                    'createdDate' => $data->createdDate,
                    'warranty' => $data->warranty,
                    'location' => $data->location,
                    'instrument' => $data->instrument,
                    'descriptionSounds' => $data->descriptionSounds,
                    'descriptionStudio' => $data->descriptionStudio,
                    'telephoneNumber' => $data->telephoneNumber,
                    'videoLink' => $data->videoLink,
                    'airCondition' => $data->airCondition,
                    'status' => $data->status,
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
                    'quantity_selected' => '1',
                    'start_date' => '',
                    'end_date' => '',
                    'purchased' => $purchased,
                    'type' => $type
                ];
                $log_data = [
                    'user_type' => 'Customer',
                    'user_id' => $_SESSION['user_id'],
                    'log_type' => 'View Studio',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'User viewed an studio with product id '.$product_id
                ];
                $this->userModel->addLogData($log_data);
                $this->view('users/viewItem',$data);
            } else if ($type == 'Singer'){
                $data = [
                    'product_id' => $data->product_id,
                    'created_by' => $data->created_by,
                    'category' => $data->category,
                    'brand' => $data->brand,
                    'model' => $data->model,
                    'quantity' => $data->quantity,
                    'unit_price' => $data->unit_price,
                    'photo_1' => $data->photo_1,
                    'photo_2' => $data->photo_2,
                    'photo_3' => $data->photo_3,
                    'Title' => $data->Title,
                    'Description' => $data->Description,
                    'outOfStock' => $data->outOfStock,
                    'createdDate' => $data->createdDate,
                    'warranty' => $data->warranty,
                    'singer_name' => $data->name,
                    'nickName' => $data->nickName,
                    'telephoneNumber' => $data->telephoneNumber,
                    'videoLink' => $data->videoLink,
                    'location' => $data->location,
                    'instrument' => $data->instrument,
                    'singerPhoto' => $data->singerPhoto,
                    'email' => $data->email,
                    'status' => $data->status,
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
                    'quantity_selected' => '1',
                    'start_date' => '',
                    'end_date' => '',
                    'purchased' => $purchased,
                    'type' => $type
                ];
                $log_data = [
                    'user_type' => 'Customer',
                    'user_id' => $_SESSION['user_id'],
                    'log_type' => 'View Singer',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'User viewed a singer with product id '.$product_id
                ];
                $this->userModel->addLogData($log_data);
                $this->view('users/viewItem',$data);
            } else if ($type == 'Musician'){
                $data = [
                    'product_id' => $data->product_id,
                    'created_by' => $data->created_by,
                    'category' => $data->category,
                    'brand' => $data->brand,
                    'model' => $data->model,
                    'quantity' => $data->quantity,
                    'unit_price' => $data->unit_price,
                    'photo_1' => $data->photo_1,
                    'photo_2' => $data->photo_2,
                    'photo_3' => $data->photo_3,
                    'Title' => $data->Title,
                    'Description' => $data->Description,
                    'outOfStock' => $data->outOfStock,
                    'createdDate' => $data->createdDate,
                    'warranty' => $data->warranty,
                    'musician_name' => $data->name,
                    'nickName' => $data->nickName,
                    'telephoneNumber' => $data->telephoneNumber,
                    'videoLink' => $data->videoLink,
                    'location' => $data->location,
                    'instrument' => $data->instrument,
                    'singerPhoto' => $data->singerPhoto,
                    'email' => $data->email,
                    'status' => $data->status,
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
                    'quantity_selected' => '1',
                    'start_date' => '',
                    'end_date' => '',
                    'purchased' => $purchased,
                    'type' => $type
                ];
                $log_data = [
                    'user_type' => 'Customer',
                    'user_id' => $_SESSION['user_id'],
                    'log_type' => 'View Musician',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'User viewed a musician with product id '.$product_id
                ];
                $this->userModel->addLogData($log_data);
                $this->view('users/viewItem',$data);
            } else if ($type == 'Band'){
                $data = [
                    'product_id' => $data->product_id,
                    'created_by' => $data->created_by,
                    'category' => $data->category,
                    'brand' => $data->brand,
                    'model' => $data->model,
                    'unit_price' => $data->unit_price,
                    'quantity' => $data->quantity,
                    'photo_1' => $data->photo_1,
                    'photo_2' => $data->photo_2,
                    'photo_3' => $data->photo_3,
                    'Title' => $data->Title,
                    'Description' => $data->Description,
                    'outOfStock' => $data->outOfStock,
                    'createdDate' => $data->createdDate,
                    'warranty' => $data->warranty,
                    'videoLink' => $data->videoLink,
                    'instrument' => $data->instrument,
                    'email' => $data->email,
                    'telephoneNumber' => $data->telephoneNumber,
                    'memberCount' => $data->memberCount,
                    'leaderPhoto' => $data->leaderPhoto,
                    'bandPhoto' => $data->bandPhoto,
                    'location' => $data->location,
                    'leaderName' => $data->leaderName,
                    'status' => $data->status,
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
                    'quantity_selected' => '1',
                    'start_date' => '',
                    'end_date' => '',
                    'purchased' => $purchased,
                    'type' => $type
                ];
                $log_data = [
                    'user_type' => 'Customer',
                    'user_id' => $_SESSION['user_id'],
                    'log_type' => 'View Band',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'User viewed a band with product id '.$product_id
                ];
                $this->userModel->addLogData($log_data);
                $this->view('users/viewItem',$data);
            } 
        } else {
            die('Something went wrong while viewing the product');
        }
    }


    public function addToCart($product_id){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $cart = $this->userModel->cart($_SESSION['user_id']);
            $extra = 0;
            $cart_data_check =[
                'product_id' => $product_id,
                'type' => trim($_POST['type']),
                'quantity' =>trim($_POST['quantity']),
                'start_date' =>trim($_POST['fromDate']),
                'end_date' =>trim($_POST['toDate'])
            ];
            $item_exists = false;
            foreach ($cart as $cartItem){
                if($cartItem->product_id == $product_id && $cartItem->type == trim($_POST['type'])){
                    $this->viewAllAC($cart_data_check['type'], 'alreadyInCart', $cart_data_check);
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
            if ($cart_data_check['type'] == 'Equipment'){
                $product_data = $this->userModel->viewItem($product_id);
                $extra = $product_data->unit_price * 3;
            } else if ($cart_data_check['type'] == 'Studio'){
                $product_data = $this->userModel->viewStudio($product_id);
            } else if ($cart_data_check['type'] == 'Singer'){
                $product_data = $this->userModel->viewSinger($product_id);
            } else if ($cart_data_check['type'] == 'Band'){
                $product_data = $this->userModel->viewBand($product_id);
            } else if ($cart_data_check['type'] == 'Musician'){
                $product_data = $this->userModel->viewMusician($product_id);
            }
            $total = $days * $product_data->unit_price * trim($_POST['quantity']);
            $data =[
                'product_id' => $product_id,
                'type' => trim($_POST['type']),
                'quantity' =>trim($_POST['quantity']),
                'start_date' =>trim($_POST['fromDate']),
                'end_date' =>trim($_POST['toDate']),
                'user_id' => $_SESSION['user_id'],
                'extra' => $extra,
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
                    if ($data['type'] == 'Equipment'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Manage Cart',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added an Instrument to the cart with the id of '.$product_id
                        ]; 
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewItem/'.$product_id);
                    } else if ($data['type'] == 'Studio'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Manage Cart',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added a Studio to the cart with the id of '.$product_id
                        ];
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewStudio/'.$product_id);
                    } else if ($data['type'] == 'Singer'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Manage Cart',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added a Singer to the cart with the id of '.$product_id
                        ];
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewSinger/'.$product_id);
                    } else if ($data['type'] == 'Band'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Manage Cart',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added a Band to the cart with the id of '.$product_id
                        ];
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewBand/'.$product_id);
                    } else if ($data['type'] == 'Musician'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Manage Cart',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added a Musician to the cart with the id of '.$product_id
                        ];
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewMusician/'.$product_id);
                    }
                } else {
                    die('Something went wrong while adding to the cart');
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
            $cat_ini = trim($_POST['category']);
            if ($cat_ini == 'band'){
                $cat = 'Band';
            } else if ($cat_ini == 'studio'){
                $cat = 'Studio';
            } else if ($cat_ini == 'singer'){
                $cat = 'Singer';
            } else if ($cat_ini == 'musician'){
                $cat = 'Musician';
            } else {
                $cat = 'Equipment';
            }
            $data =[
                'product_id' => $product_id,
                'rating' =>trim($_POST['rating']),
                'content' =>trim($_POST['reviewDescription']),
                'user_id' => $_SESSION['user_id'],
                'name' =>trim($_POST['name']),
                'photo' =>trim($_POST['photo']),
                'category' => $cat,
                'reviewDescription_err' => '',
                'rating_err' => ''
            ];
            if(empty($data['quantity_err']) && empty($data['start_date_err']) && empty($data['end_date_err'])){
                if($this->userModel->addReview($data)){
                    if ($cat == 'Equipment'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Add Review',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added a review to an Instrument with the id of '.$product_id
                        ];
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewItem/'.$product_id);
                    } else if ($cat == 'Studio'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Add Review',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added a review to a Studio with the id of '.$product_id
                        ];
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewStudio/'.$product_id);
                    } else if ($cat == 'Singer'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Add Review',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added a review to a Singer with the id of '.$product_id
                        ];
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewSinger/'.$product_id);
                    } else if ($cat == 'Band'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Add Review',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added a review to a Band with the id of '.$product_id
                        ];
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewBand/'.$product_id);
                    } else if ($cat == 'Musician'){
                        $log_data = [
                            'user_type' => 'Customer',
                            'user_id' => $_SESSION['user_id'],
                            'log_type' => 'Add Review',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'User added a review to a Musician with the id of '.$product_id
                        ];
                        $this->userModel->addLogData($log_data);
                        redirect('users/viewMusician/'.$product_id);
                    }
                } else {
                    die('Something went wrong while adding the review');
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