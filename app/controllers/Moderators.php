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

  //   public function editDetail($id){
  //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //      $moderator = $this->moderatorModel->view($_SESSION['moderator_id']);
  //     $data =[
  //       'name'=>$moderator->name,
  //       'email'=>$moderator->email,
  //       'moderator_contact_no'=>$moderator->TelephoneNumber,
  //       'date'=>$moderator->BirthDate,
  //       'address'=>$moderator->address,
  //     ];
  //     $this->view('moderators/edit',$data);
  //   }else {
  //   $this->view('moderators/edit',$data);
  //   }
  // }

  //   public function edit(){
  //      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
  //       // Sanitize POST data
  //       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  //       $data =[
  //         'name' => trim($_POST['name']),
  //         'email' => trim($_POST['email']),
  //         'moderator_contact_no' => trim($_POST['moderator_contact_no']),
  //         'date' => trim($_POST['date']),
  //         'address' => trim($_POST['address']),
  //         'name_err' => '',
  //         'email_err' => '',
  //         'moderator_contact_no_err' =>'',
  //         'date_err' =>'',
  //         'address_err' => '',
  //       ];

  //       // Validate Email
  //       if(empty($data['email'])){
  //         $data['email_err'] = 'Pleae enter email';
  //       } else {
  //         // Check email
  //         $existingmoderator = $this->moderatorModel->findmoderatorByEmailEdit($data['email']);
  //         if ($existingmoderator && $existingmoderator->id !== $_SESSION['moderator_id']) {
  //         $data['email_err'] = 'Email is already taken';
  //       }
  //       }
         

  //       // Validate Name
  //       if(empty($data['name'])){
  //         $data['name_err'] = 'Pleae enter name';
  //       }

  //       // Validate telephone number
  //       if(empty($data['moderator_contact_no'])){
  //         $data['moderator_contact_no_err'] = 'Pleae enter telephone number';
  //       }

  //       // Validate Address
  //       if(empty($data['address'])){
  //         $data['address_err'] = 'Pleae enter address';
  //       }

  //       // Validate Date
  //       if(empty($data['date'])){
  //         $data['date_err'] = 'Pleae enter date';
  //       }
  //       // Make sure errors are empty
  //       if(empty($data['email_err']) && empty($data['name_err']) && empty($data['moderator_contact_no_err']) && empty($data['date_err']) && empty($data['address_err'])){
  //         // Validated

  //         // Update moderator
         
  //         if($this->moderatorModel->update($data)){
  //           // flash('register_success', 'You are registered and can log in');
  //           redirect('moderators/profile');
  //         }
  //         else {
  //           die('Something went wrong');
  //         }
  //       }else{
  //           $this->view('moderators/edit', $data);
  //     }
      
  //   }else {
      
  //     redirect('moderators/profile');
  //   }
  //   }

  //   public function delete(){
  //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //       if($this->moderatorModel->delete($_SESSION['moderator_id'])){
  //         unset($_SESSION['moderator_id']);
  //         unset($_SESSION['moderator_email']);
  //         unset($_SESSION['moderator_name']);
  //         session_destroy();
  //         redirect('pages/index');
  //       }
  //       else {
  //         die('Something went wrong');
  //       }
  //     }
  //     else {
  //       redirect('moderators/profile');
  //     }
  //   }
  

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
      redirect('pages/index');
    }
}