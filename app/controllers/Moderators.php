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

    public function viewuser(){
      $users = $this->moderatorModel->getUsers();
      $data = [
        'users' => $users
      ];
      $this->view('moderators/viewuser', $data);
    }

    public function viewserviceprovider(){
      $serviceproviders = $this->moderatorModel->getServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders
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