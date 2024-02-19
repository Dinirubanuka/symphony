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

    public function viewProduct($type, $product_id){
      if($type == 'Equipment'){
        $data = $this->moderatorModel->getEquipmentData($product_id);
      } else if ($type == 'Studio'){
        $data = $this->moderatorModel->getStudioData($product_id);
      } else if ($type == 'Band'){
        $data = $this->moderatorModel->getBandData($product_id);
      } else if ($type == 'Singer'){
        $data = $this->moderatorModel->getSingerData($product_id);
      } else if ($type == 'Musician'){
        $data = $this->moderatorModel->getMusicianData($product_id);
      }
      $sp_data = $this->moderatorModel->getSP($data->created_by);
      $reviews = $this->moderatorModel->getReviews($product_id, $type);
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
                'reviews'=>$reviews,
                'rating'=>$rating,
                'count'=>$count,
                'star1'=>$star1,
                'star2'=>$star2,
                'star3'=>$star3,
                'star4'=>$star4,
                'star5'=>$star5,
                'type' => $type,
                'sp_data' => $sp_data
            ];
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
                'reviews'=>$reviews,
                'rating'=>$rating,
                'count'=>$count,
                'star1'=>$star1,
                'star2'=>$star2,
                'star3'=>$star3,
                'star4'=>$star4,
                'star5'=>$star5,
                'type' => $type,
                'sp_data' => $sp_data
            ];
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
                'reviews'=>$reviews,
                'rating'=>$rating,
                'count'=>$count,
                'star1'=>$star1,
                'star2'=>$star2,
                'star3'=>$star3,
                'star4'=>$star4,
                'star5'=>$star5,
                'type' => $type,
                'sp_data' => $sp_data
            ];
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
                'reviews'=>$reviews,
                'rating'=>$rating,
                'count'=>$count,
                'star1'=>$star1,
                'star2'=>$star2,
                'star3'=>$star3,
                'star4'=>$star4,
                'star5'=>$star5,
                'type' => $type,
                'sp_data' => $sp_data
            ];
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
                'reviews'=>$reviews,
                'rating'=>$rating,
                'count'=>$count,
                'star1'=>$star1,
                'star2'=>$star2,
                'star3'=>$star3,
                'star4'=>$star4,
                'star5'=>$star5,
                'type' => $type,
                'sp_data' => $sp_data
            ];
          } 
        } else {
            die('Item Not Found!');
        }
      $this->view('moderators/viewitem', $data);
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
      $request = $this->moderatorModel->getSP($id);
      $data = [
        'request' => $request
      ];
      $this->view('moderators/viewpendingrequest', $data);
    }

    public function viewserviceprovider($id){
      $serviceprovider = $this->moderatorModel->getSP($id);
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
        redirect('moderators/viewBannedUser/');
      } else {
        die('Something went wrong');
      }
    }

    public function banserviceprovider($id){
      if($this->moderatorModel->banServiceProvider($id)){
        redirect('moderators/viewBannedSP');
      } else {
        die('Something went wrong');
      }
    }

    public function unbanserviceprovider($id){
      if($this->moderatorModel->unbanServiceProvider($id)){
        redirect('moderators/viewActiveSP');
      } else {
        die('Something went wrong');
      }
    }

    public function unbanuser($id){
      if($this->moderatorModel->unbanUser($id)){
        redirect('moderators/viewActiveUser');
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

    public function viewSPOrders($id){
      $order = $this->moderatorModel->viewSPOrders($id);
      $data = [
        'order' => $order,
        'sp_id' => $id
      ];
      $this->view('moderators/viewsporders', $data);
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
        if($suborder->type == 'Equipment'){
          $product_data = $this->moderatorModel->getEquipmentData($suborder->product_id);
        } else if ($suborder->type == 'Studio'){
          $product_data = $this->moderatorModel->getStudioData($suborder->product_id);
        } else if ($suborder->type == 'Band'){
          $product_data = $this->moderatorModel->getBandData($suborder->product_id);
        } else if ($suborder->type == 'Singer'){
          $product_data = $this->moderatorModel->getSingerData($suborder->product_id);
        } else if ($suborder->type == 'Musician'){
          $product_data = $this->moderatorModel->getMusicianData($suborder->product_id);
        }
        $suborder_obj = [
          'order_data' => $suborder,
          'product_data' => $product_data
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

    public function viewSubOrder($id){
      $suborder = $this->moderatorModel->getSubOrderData($id);
      $user_data = $this->moderatorModel->getUser($suborder->user_id);
      if($suborder->type == 'Equipment'){
        $product_data = $this->moderatorModel->getEquipmentData($suborder->product_id);
      } else if ($suborder->type == 'Studio'){
        $product_data = $this->moderatorModel->getStudioData($suborder->product_id);
      } else if ($suborder->type == 'Band'){
        $product_data = $this->moderatorModel->getBandData($suborder->product_id);
      } else if ($suborder->type == 'Singer'){
        $product_data = $this->moderatorModel->getSingerData($suborder->product_id);
      } else if ($suborder->type == 'Musician'){
        $product_data = $this->moderatorModel->getMusicianData($suborder->product_id);
      }
      $data = [
        'order_data' => $suborder,
        'product_data' => $product_data,
        'user_data' => $user_data
      ];
      $this->view('moderators/viewsporder', $data);
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