<?php
  class Administrators extends Controller {
    private $administratorModel;
    public function __construct(){
      $this->administratorModel = $this->model('Administrator');
    }

    public function index(){
      $this->view('administrators/index');
    }

    //view profile
    public function profile(){
      $administrator = $this->administratorModel->view($_SESSION['administrator_id']);
      $data =[
        'admin_name'=>$administrator->admin_name,
        'admin_email'=>$administrator->admin_email,
        'admin_contact_no'=>$administrator->admin_contact_no,
        'admin_nic'=>$administrator->admin_nic,
        'admin_address'=>$administrator->	admin_address,
      ];
      $this->view('administrators/profile',$data);
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'admin_name' => trim($_POST['admin_name']),
          'admin_email' => trim($_POST['admin_email']),
          'admin_contact_no' => trim($_POST['admin_contact_no']),
          'admin_nic' => trim($_POST['admin_nic']),
          'admin_address' => trim($_POST['admin_address']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'admin_name_err' => '',
          'admin_email_err' => '',
          'admin_contact_no_err' =>'',
          'admin_nic_err' =>'',
          'admin_address_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate Email
        if(empty($data['admin_email'])){
          $data['admin_email_err'] = 'Please enter email';
        } else {
          // Check email
          if($this->administratorModel->findAdministratorByEmail($data['admin_email'])){
            $data['admin_email_err'] = 'Email is already taken';
          }
        }

        // Validate Name
        if(empty($data['admin_name'])){
          $data['admin_name_err'] = 'Please enter name';
        }

        // Validate telephone number
        if(empty($data['admin_contact_no'])){
          $data['admin_contact_no_err'] = 'Please enter telephone number';
        }

        // Validate Address
        if(empty($data['admin_address'])){
          $data['admin_address_err'] = 'Please enter address';
        }

        // Validate Date
        if(empty($data['admin_nic'])){
          $data['admin_nic_err'] = 'Please enter NIC number';
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
        if(empty($data['admin_email_err']) && empty($data['admin_name_err']) && empty($data['admin_contact_no_err']) && empty($data['admin_nic_err']) && empty($data['admin_address_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->administratorModel->register($data)){
            // flash('register_success', 'You are registered and can log in');
            redirect('administrators/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('administrators/register', $data);
        }

      } else {
        // Init data
        $data =[
          'admin_name' => '',
          'admin_email' => '',
          'admin_contact_no' => '',
          'admin_nic' => '',
          'admin_address' => '',
          'password' => '',
          'confirm_password' => '',
          'admin_name_err' => '',
          'admin_email_err' => '',
          'admin_contact_no_err' =>'',
          'admin_nic_err' =>'',
          'admin_address_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('administrators/register', $data);
      }
    }

  //   public function editDetail($id){
  //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //      $administrator = $this->administratorModel->view($_SESSION['administrator_id']);
  //     $data =[
  //       'name'=>$administrator->name,
  //       'email'=>$administrator->email,
  //       'admin_contact_no'=>$administrator->TelephoneNumber,
  //       'date'=>$administrator->BirthDate,
  //       'address'=>$administrator->address,
  //     ];
  //     $this->view('administrators/edit',$data);
  //   }else {
  //   $this->view('administrators/edit',$data);
  //   }
  // }

  //   public function edit(){
  //      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
  //       // Sanitize POST data
  //       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  //       $data =[
  //         'name' => trim($_POST['name']),
  //         'email' => trim($_POST['email']),
  //         'admin_contact_no' => trim($_POST['admin_contact_no']),
  //         'date' => trim($_POST['date']),
  //         'address' => trim($_POST['address']),
  //         'name_err' => '',
  //         'email_err' => '',
  //         'admin_contact_no_err' =>'',
  //         'date_err' =>'',
  //         'address_err' => '',
  //       ];

  //       // Validate Email
  //       if(empty($data['email'])){
  //         $data['email_err'] = 'Pleae enter email';
  //       } else {
  //         // Check email
  //         $existingadministrator = $this->administratorModel->findadministratorByEmailEdit($data['email']);
  //         if ($existingadministrator && $existingadministrator->id !== $_SESSION['administrator_id']) {
  //         $data['email_err'] = 'Email is already taken';
  //       }
  //       }
         

  //       // Validate Name
  //       if(empty($data['name'])){
  //         $data['name_err'] = 'Pleae enter name';
  //       }

  //       // Validate telephone number
  //       if(empty($data['admin_contact_no'])){
  //         $data['admin_contact_no_err'] = 'Pleae enter telephone number';
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
  //       if(empty($data['email_err']) && empty($data['name_err']) && empty($data['admin_contact_no_err']) && empty($data['date_err']) && empty($data['address_err'])){
  //         // Validated

  //         // Update administrator
         
  //         if($this->administratorModel->update($data)){
  //           // flash('register_success', 'You are registered and can log in');
  //           redirect('administrators/profile');
  //         }
  //         else {
  //           die('Something went wrong');
  //         }
  //       }else{
  //           $this->view('administrators/edit', $data);
  //     }
      
  //   }else {
      
  //     redirect('administrators/profile');
  //   }
  //   }

  //   public function delete(){
  //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //       if($this->administratorModel->delete($_SESSION['administrator_id'])){
  //         unset($_SESSION['administrator_id']);
  //         unset($_SESSION['administrator_email']);
  //         unset($_SESSION['administrator_name']);
  //         session_destroy();
  //         redirect('pages/index');
  //       }
  //       else {
  //         die('Something went wrong');
  //       }
  //     }
  //     else {
  //       redirect('administrators/profile');
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
          'admin_email' => trim($_POST['admin_email']),
          'password' => trim($_POST['password']),
          'admin_email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['admin_email'])){
          $data['admin_email_err'] = 'Please enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for administrator/email
        if($this->administratorModel->findadministratorByEmail($data['admin_email'])){
          // administrator found
        } else {
          // administrator not found
          $data['admin_email_err'] = 'No administrator found';
        }

        // Make sure errors are empty
        if(empty($data['admin_email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in administrator
          $loggedInadministrator = $this->administratorModel->login($data['admin_email'], $data['password']);

          if($loggedInadministrator){
            // Create Session
            $this->createadministratorSession($loggedInadministrator);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('administrators/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('administrators/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'admin_email' => '',
          'password' => '',
          'admin_email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('administrators/login', $data);
      }
    }

    public function createadministratorSession($administrator){
      
      $_SESSION['administrator_id'] = $administrator->admin_id;
      $_SESSION['administrator_email'] = $administrator->admin_email;
      $_SESSION['administrator_name'] = $administrator->admin_name;
      redirect('administrators/index');
      
    }

    public function logout(){
      unset($_SESSION['administrator_id']);
      unset($_SESSION['administrator_email']);
      unset($_SESSION['administrator_name']);
      session_destroy();
      redirect('pages/index');
    }

    public function addmoderator(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process form
  
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          // Init data
          $data =[
              'moderator_name' => trim($_POST['moderator_name']),
              'moderator_email' => trim($_POST['moderator_email']),
              'moderator_contact_no' => trim($_POST['moderator_contact_no']),
              'moderator_address' => trim($_POST['moderator_address']),
              'moderator_nic' => trim($_POST['moderator_nic']),
              'password' => trim($_POST['password']),
              'confirm_password' => trim($_POST['confirm_password']),
              'type' => trim($_POST['type']),
              'moderator_name_err' => '',
              'password_err' => '',
              'confirm_password_err' => '',
              'moderator_address_err' => '',
              'moderator_contact_no_err' => '',
              'moderator_email_err' => '',
              'moderator_nic_err' => '',
              'type_name_err' => ''
          ];

          // Validate Email
          if(empty($data['moderator_email'])){
          $data['moderator_email_err'] = 'Please enter moderator email!';
          } else {
          // Check email
              if($this->administratorModel->findModeratorByEmail($data['moderator_email'])){
                  $data['moderator_email_err'] = 'Email is already taken!';
              }
          }

          // Validate moderator name
          if(empty($data['moderator_name'])){
          $data['moderator_name_err'] = 'Please enter moderator name!';
          }

          // Validate Password
          if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
          } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
          }

          // Validate Confirm Password
          if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
          } else {
          if($data['password'] != $data['confirm_password']){
              $data['confirm_password_err'] = 'Passwords do not match';
          }
          }

          // Validate moderator address
          if(empty($data['moderator_address'])){
          $data['moderator_address_err'] = 'Please enter moderator address!';
          }

          // Validate moderator contact number
          if(empty($data['moderator_contact_no'])){
          $data['amoderator_contact_no_err'] = 'Please enter moderator contact number!';
          }

          // Validate moderator NIC
          if(empty($data['moderator_nic'])){
            $data['amoderator_nic_err'] = 'Please enter moderator NIC Number!';
          }

          // Validate type
          if(empty($data['type'])){
              $data['type_err'] = 'Please select the type of the moderator!';
          }
          
          // Make sure errors are empty
          if(empty($data['moderator_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['moderator_address_err']) && empty($data['moderator_contact_no_err']) && empty($data['moderator_email_err']) && empty($data['moderator_nic_err']) &&  empty($data['type_err'])){
          // Validated
          // Hash Password
          
              //die('hi');
              $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

              // Register moderator
              if($this->administratorModel->addmoderator($data)){
                  // flash('register_success', 'You are registered and can log in');
                  redirect('administrators/index');
              } else {
                  die('Something went wrong');
              }
          } else {
          // Load view with errors
          $this->view('administrators/addmoderator', $data);
          }

      } else {
          // Init data
          $data =[
              'moderator_name' => '',
              'password' => '',
              'confirm_password' => '',
              'moderator_address' => '',
              'moderator_contact_no' => '',
              'moderator_email' => '',
              'moderator_nic' => '',
              'type' => '',
              'moderator_name_err' => '',
              'password_err' => '',
              'confirm_password_err' => '',
              'moderator_address_err' => '',
              'moderator_contact_no_err' => '',
              'moderator_email_err' => '',
              'moderator_nic_err' => '',
              'type_err' => '',
          ];

          // Load view
          $this->view('administrators/addmoderator', $data);
      }
      }
  }