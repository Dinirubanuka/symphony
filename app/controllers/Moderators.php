<?php
  class Moderators extends Controller {
    private $moderatorModel;
    public function __construct(){
      $this->moderatorModel = $this->model('Moderator');
    }

    public function index(){
      $this->view('moderators/index');
    }

    //view profile
    public function profile(){
      $moderator = $this->moderatorModel->view($_SESSION['moderator_id']);
      $data =[
        'moderator_name'=>$moderator->moderator_name,
        'moderator_email'=>$moderator->moderator_email,
        'moderator_contact_no'=>$moderator->moderator_contact_no,
        'moderator_nic'=>$moderator->moderator_nic,
        'moderator_address'=>$moderator->moderator_address,
        'type'=>$moderator->type,
      ];
      $this->view('moderators/profile',$data);
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'moderator_email' => trim($_POST['moderator_email']),
          'password' => trim($_POST['password']),
          'moderator_email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['moderator_email'])){
          $data['moderator_email_err'] = 'Please enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for moderator/email
        if($this->moderatorModel->findmoderatorByEmail($data['moderator_email'])){
          // moderator found
        } else {
          // moderator not found
          $data['moderator_email_err'] = 'No moderator found';
        }

        // Make sure errors are empty
        if(empty($data['moderator_email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in moderator
          $loggedInmoderator = $this->moderatorModel->login($data['moderator_email'], $data['password']);

          if($loggedInmoderator){
            // Create Session
            $this->createmoderatorSession($loggedInmoderator);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('moderators/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('moderators/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'moderator_email' => '',
          'password' => '',
          'moderator_email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('moderators/login', $data);
      }
    }

    public function viewActiveUser(){
      $users = $this->moderatorModel->getUsers();
      $data = [
        'users' => $users,
        'status' => 'Active'
      ];
      $this->view('moderators/viewuser', $data);
    }

    public function viewBannedUser(){
      $users = $this->moderatorModel->getBannedUsers();
      $data = [
        'users' => $users,
        'status' => 'Banned'
      ];
      $this->view('moderators/viewuser', $data);
    }

    public function viewDeactivatedUser(){
      $users = $this->moderatorModel->getDeactivatedUsers();
      $data = [
        'users' => $users,
        'status' => 'Deactivated'
      ];
      $this->view('moderators/viewuser', $data);
    }

    public function viewActiveSP(){
      $serviceproviders = $this->moderatorModel->getServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Active'
      ];
      $this->view('moderators/viewserviceprovider', $data);
    }

    public function viewRejectedSP(){
      $serviceproviders = $this->moderatorModel->getRejectedServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Rejected'
      ];
      $this->view('moderators/viewserviceprovider', $data);
    }

    public function viewDeactivatedSP(){
      $serviceproviders = $this->moderatorModel->getDeactivatedServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Deactivated'
      ];
      $this->view('moderators/viewserviceprovider', $data);
    }

    public function viewBannedSP(){
      $serviceproviders = $this->moderatorModel->getBannedServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Banned'
      ];
      $this->view('moderators/viewserviceprovider', $data);
    }

    public function deleteuser($id){
      if($this->moderatorModel->deleteUser($id)){
        redirect('moderators/viewuser');
      } else {
        die('Something went wrong');
      }
    }

    public function pendingrequest(){
      $pending = $this->moderatorModel->getPendingRequests();
      $data = [
        'pending' => $pending
      ];
      $this->view('moderators/pendingrequest', $data);
    }

    public function viewPendingRequest($id){
      $request = $this->moderatorModel->getRequest($id);
      $data = [
        'request' => $request
      ];
      $this->view('moderators/viewpendingrequest', $data);
    }

    public function viewserviceprovider($id){
      $serviceprovider = $this->moderatorModel->getRequest($id);
      $data = [
        'request' => $serviceprovider
      ];
      $this->view('moderators/viewsp', $data);
    }

    public function viewuser($id){
      $user = $this->moderatorModel->getUser($id);
      $data = [
        'request' => $user
      ];
      $this->view('moderators/viewuser_single', $data);
    }

    public function banuser($id){
      if($this->moderatorModel->banUser($id)){
        redirect('moderators/index/');
      } else {
        die('Something went wrong');
      }
    }

    public function banserviceprovider($id){
      if($this->moderatorModel->banServiceProvider($id)){
        redirect('moderators/index');
      } else {
        die('Something went wrong');
      }
    }

    public function acceptServiceProvider($id){
      if($this->moderatorModel->acceptSP($id)){
        redirect('moderators/pendingrequest');
      } else {
        die('Something went wrong');
      }
    }

    public function rejectServiceProvider($id){
      if($this->moderatorModel->rejectSP($id)){
        redirect('moderators/pendingrequest');
      } else {
        die('Something went wrong');
      }
    }

    public function viewUserOrders($id){
      $order = $this->moderatorModel->viewUserOrders($id);
      $data = [
        'order' => $order,
        'user_id' => $id
      ];
      $this->view('moderators/viewuserorders', $data);
    }

    public function viewOrder($id){
      $order = $this->moderatorModel->getOrderData($id);
      $user_data = $this->moderatorModel->getUser($order->user_id);
      $order_data = json_decode(json_encode($order), true);
      $suborder_ids = explode(',', $order_data['sorder_id']);
      $sub_orders = [];
      foreach($suborder_ids as $suborder_id){
        $suborder_obj = [];
        $suborder = $this->moderatorModel->getSubOrderData($suborder_id);
        $suborder_obj = [
          'order_data' => $suborder,
          'product_data' => $this->moderatorModel->getProductData($suborder->product_id)
        ];
        array_push($sub_orders, $suborder_obj);
      }
      $data = [
        'order' => $order,
        'user_data' => $user_data,
        'suborders' => $sub_orders
      ];
      $this->view('moderators/viewuserorder', $data);
    }

    public function pendinginquiries()
    {
        $inquiries_pending = $this->moderatorModel->getPendingInquiries();
        $data = [
            'pending' => $inquiries_pending,
        ];
        $this->view('moderators/pendinginquiries', $data);
    }

    public function activeinquiries()
    {
        $inquiries_active = $this->moderatorModel->getActiveInquiries($_SESSION['moderator_id']);
        $data = [
            'active' => $inquiries_active,
        ];
        $this->view('moderators/activeinquiries', $data);
    }

    public function completedinquiries()
    {
        $inquiries_completed = $this->moderatorModel->getCompletedInquiries($_SESSION['moderator_id']);
        $data = [
            'completed' => $inquiries_completed,
        ];
        $this->view('moderators/completedinquiries', $data);
    }

    public function viewInquiry($inquiry_id)
    {
        $inquiry = $this->moderatorModel->getInquiry($inquiry_id);
        $user_data = $this->moderatorModel->getUserData($inquiry->user_id);
        if($inquiry->status == 'Pending'){
          $data = [
              'inquiry' => $inquiry,
              'user' => $user_data
          ];
        $this->view('moderators/viewinquiry', $data);
        } else {
            $chat = [];
            $chatIds = $this->moderatorModel->getInqIds($inquiry_id);
            foreach ($chatIds as $chatId){
                $chatData = $this->moderatorModel->getUserChat($chatId->chat_id);
                array_push($chat, $chatData);
            }
            $mod_data = $this->moderatorModel->view($inquiry->moderator_id);
            $data = [
                'inquiry' => $inquiry,
                'moderator' => $mod_data,
                'user' => $user_data,
                'chat' => $chat
            ];
            $this->view('moderators/viewinquiry', $data);
        }
    }

    public function sendMessageUser($message, $inquiry_id, $id, $date){
      $modifiedDate = str_replace('_', ' ', $date);
      $modifiedMessage = str_replace('_', ' ', $message);
      $data = [
          'inquiry_id' => $inquiry_id,
          'user_id' => $id,
          'moderator_id' => $_SESSION['moderator_id'],
          'chat_data' => $modifiedMessage,
          'chat_date' => $modifiedDate,
          'created_by' => 'moderator'
      ];
      $chat_id = $this->moderatorModel->addChatModToUser($data);
      if($this->moderatorModel->addToInqChat($chat_id, $inquiry_id)){
          redirect('moderators/viewInquiry/'.$inquiry_id.'');
      } else {
          die('Something went wrong');
      }
  }

    public function approveInquiry($inquiry_id){
        if($this->moderatorModel->approveInquiry($inquiry_id, $_SESSION['moderator_id'])){
            redirect('moderators/pendinginquiries');
        } else {
            die('Something went wrong');
        }
    }

    public function completeInquiry($inquiry_id){
        if($this->moderatorModel->completeInquiry($inquiry_id)){
            redirect('moderators/activeinquiries');
        } else {
            die('Something went wrong');
        }
    }

    public function deleteserviceprovider($id){
      if($this->moderatorModel->deleteServiceProvider($id)){
        redirect('moderators/viewserviceprovider');
      } else {
        die('Something went wrong');
      }
    }

    public function createmoderatorSession($moderator){
      
      $_SESSION['moderator_id'] = $moderator->moderator_id;
      $_SESSION['moderator_email'] = $moderator->moderator_email;
      $_SESSION['moderator_name'] = $moderator->moderator_name;
      redirect('moderators/index');
      
    }

    public function logout(){
      unset($_SESSION['moderator_id']);
      unset($_SESSION['moderator_email']);
      unset($_SESSION['moderator_name']);
      session_destroy();
      redirect('moderators/login');
    }
}