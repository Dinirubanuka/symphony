<?php
    class serviceproviders extends Controller {
        private $serviceProviderModel;
        public function __construct(){
        $this->serviceProviderModel = $this->model('serviceprovider');
        }

        public function index(){
        $this->view('serviceproviders/index');
        }

        //view profile
        public function profile(){
        $serviceprovider = $this->serviceProviderModel->view($_SESSION['serviceprovider_id']);
        $data =[
            'business_name'=>$serviceprovider->business_name,
            'business_email'=>$serviceprovider->business_email,
            'business_contact_no'=>$serviceprovider->business_contact_no,
            'business_address'=>$serviceprovider->business_address,
            'owner_name'=>$serviceprovider->owner_name,
            'owner_email'=>$serviceprovider->owner_email,
            'owner_contact_no'=>$serviceprovider->owner_contact_no,
            'owner_address'=>$serviceprovider->owner_address,
            'about'=>$serviceprovider->about,
            'photo'=>$serviceprovider->profile_photo
        ];
        $this->view('serviceproviders/profile',$data);
        }

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
                
                if($this->serviceProviderModel->photoUpdate($new_img_name)){
                  // flash('register_success', 'You are registered and can log in');
                  redirect('serviceproviders/profile');
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
      
                if($this->serviceProviderModel->photoUpdate($new_img_name)){
                  // flash('register_success', 'You are registered and can log in');
                  redirect('serviceproviders/profile');
                }
                else {
                  die('Something went wrong');
                }
            }
      
          }
        }

        public function editDetail($serviceprovider_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $serviceprovider = $this->serviceProviderModel->view($_SESSION['serviceprovider_id']);
        $data =[
            'business_name'=>$serviceprovider->business_name,
            'business_address'=>$serviceprovider->business_address,
            'business_contact_no'=>$serviceprovider->business_contact_no,
            'business_email'=>$serviceprovider->business_email,
            'owner_name'=>$serviceprovider->owner_name,
            'owner_address'=>$serviceprovider->owner_address,
            'owner_contact_no'=>$serviceprovider->owner_contact_no,
            'owner_email'=>$serviceprovider->owner_email,
            'about'=>$serviceprovider->about,
            'business_name_err' => '',
            'business_address_err' => '',
            'business_contact_no_err' => '',
            'business_email_err' => '',
            'owner_name_err' => '',
            'owner_address_err' => '',
            'owner_contact_no_err' => '',
            'owner_email_err' => '',
            'about_err' => '',
        ];
        $this->view('serviceproviders/edit',$data);
        }else {
        $this->view('serviceproviders/edit',$data);
        }
    }

        public function edit(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =[
            'business_name' => trim($_POST['business_name']),
            'business_address' => trim($_POST['business_address']),
            'business_contact_no' => trim($_POST['business_contact_no']),
            'business_email' => trim($_POST['business_email']),
            'owner_name' => trim($_POST['owner_name']),
            'owner_address' => trim($_POST['owner_address']),
            'owner_contact_no' => trim($_POST['owner_contact_no']),
            'owner_email' => trim($_POST['owner_email']),
            'about' => trim($_POST['about']),
            'business_name_err' => '',
            'business_address_err' => '',
            'business_contact_no_err' => '',
            'business_email_err' => '',
            'owner_name_err' => '',
            'owner_address_err' => '',
            'owner_contact_no_err' => '',
            'owner_email_err' => '',
            'about_err' => '',
            ];

            // Validate Email
            if(empty($data['business_email'])){
            $data['business_email_err'] = 'Please enter business email!';
            } else {
            // Check email
            if (!filter_var($data['business_email'], FILTER_VALIDATE_EMAIL)) {
                $data['business_email_err'] = 'Invalid email format';
              }

            $existingserviceprovider = $this->serviceProviderModel->findserviceproviderByEmailEdit($data['business_email']);
            if ($existingserviceprovider && $existingserviceprovider->serviceprovider_id !== $_SESSION['serviceprovider_id']) {
                    $data['business_email_err'] = 'Email is already taken!';
                }
            }
            // Validate business name
            if(empty($data['business_name'])){
            $data['business_name_err'] = 'Please enter business name!';
            }

            // Validate business address
            if(empty($data['business_address'])){
            $data['business_address_err'] = 'Please enter business address!';
            }

            // Validate business contact number
            if(empty($data['business_contact_no'])){
            $data['business_contact_no_err'] = 'Please enter business contact number!';
            }

            // Validate owner name
            if(empty($data['owner_name'])){
                $data['owner_name_err'] = 'Please enter owner name!';
            }

            // Validate owner address
            if(empty($data['owner_address'])){
            $data['owner_address_err'] = 'Please enter owner address!';
            }

            // Validate owner contact number
            if(empty($data['owner_contact_no'])){
                $data['owner_contact_no_err'] = 'Please enter owner contact number!';
            }

            // Validate owner email
            if(empty($data['owner_email'])){
                $data['owner_email_err'] = 'Please enter owner email!';
            } else {
            // Check email
            if (!filter_var($data['owner_email'], FILTER_VALIDATE_EMAIL)) {
                $data['owner_email_err'] = 'Invalid email format';
              }
            
            $existingserviceprovider = $this->serviceProviderModel->findserviceproviderByEmailEdit($data['owner_email']);
            if ($existingserviceprovider && $existingserviceprovider->serviceprovider_id !== $_SESSION['serviceprovider_id']) {
                    $data['owner_email_err'] = 'Email is already taken!';
                }
            }
            // Validate about
            if(empty($data['about'])){
                $data['about_err'] = 'Please enter about business!';
            }

            // Make sure errors are empty
            if(empty($data['business_name_err']) && empty($data['business_address_err']) && empty($data['business_contact_no_err']) && empty($data['business_email_err']) && empty($data['owner_name_err']) && empty($data['owner_address_err']) && empty($data['owner_contact_no_err']) && empty($data['owner_email_err']) &&  empty($data['about_err'])){
            // Validated
            
            
            // Update serviceprovider
            if($this->serviceProviderModel->update($data)){
                // flash('register_success', 'You are registered and can log in');
                redirect('serviceproviders/profile');
            }
            else {
                die('Something went wrong ');
            }
            }else{
                $this->view('serviceproviders/edit', $data);
        }
        
        }else {
        redirect('serviceproviders/profile');
        }
        }

        public function delete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($this->serviceProviderModel->delete($_SESSION['serviceprovider_id'])){
            unset($_SESSION['serviceprovider_id']);
            unset($_SESSION['serviceprovider_email']);
            unset($_SESSION['serviceprovider_name']);
            session_destroy();
            redirect('pages/index');
            }
            else {
            die('Something went wrong');
            }
        }
        else {
            redirect('serviceproviders/profile');
        }
        }
    

        public function serviceproviderregister(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
    
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data =[
                'business_name' => trim($_POST['business_name']),
                'business_email' => trim($_POST['business_email']),
                'business_contact_no' => trim($_POST['business_contact_no']),
                'business_address' => trim($_POST['business_address']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'owner_name' => trim($_POST['owner_name']),
                'owner_email' => trim($_POST['owner_email']),
                'owner_contact_no' => trim($_POST['owner_contact_no']),
                'owner_address' => trim($_POST['owner_address']),
                'owner_nic' => trim($_POST['owner_nic']),
                'about' => trim($_POST['about']),
                'business_name_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'business_address_err' => '',
                'business_contact_no_err' => '',
                'business_email_err' => '',
                'owner_name_err' => '',
                'owner_address_err' => '',
                'owner_contact_no_err' => '',
                'owner_email_err' => '',
                'owner_nic_err' => '',
                'about_err' => '',
            ];

            // Validate Email
            if(empty($data['business_email'])){
            $data['business_email_err'] = 'Please enter business email!';
            } else {
            // Check email
            if (!filter_var($data['business_email'], FILTER_VALIDATE_EMAIL)) {
                $data['business_email_err'] = 'Invalid email format';
              }elseif($this->serviceProviderModel->findserviceproviderByEmail($data['business_email'])){
                    $data['business_email_err'] = 'Email is already taken!';
                }
            }

            // Validate business name
            if(empty($data['business_name'])){
            $data['business_name_err'] = 'Please enter business name!';
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

            // Validate business address
            if(empty($data['business_address'])){
            $data['business_address_err'] = 'Please enter business address!';
            }

            // Validate business contact number
            if(empty($data['business_contact_no'])){
            $data['abusiness_contact_no_err'] = 'Please enter business contact number!';
            }

            // Validate owner name
            if(empty($data['owner_name'])){
                $data['owner_name_err'] = 'Please enter owner name!';
                }

            // Validate owner address
            if(empty($data['owner_address'])){
            $data['owner_address_err'] = 'Please enter owner address!';
            }

            // Validate owner contact number
            if(empty($data['owner_contact_no'])){
                $data['owner_contact_no_err'] = 'Please enter owner contact number!';
            }

            // Validate owner email
            if(empty($data['owner_email'])){
                $data['owner_email_err'] = 'Please enter owner email!';
            }else {
                // Check email format using a regular expression
                if (!filter_var($data['owner_email'], FILTER_VALIDATE_EMAIL)) {
                  $data['owner_email_err'] = 'Invalid email format';
                }elseif ($this->serviceProviderModel->findServiceProviderByEmail($data['owner_email'])) {
                  $data['owner_email_err'] = 'Email is already taken';
                }
              }

            // Validate owner email
            if(empty($data['owner_nic'])){
                $data['owner_nic_err'] = 'Please enter owner NIC!';
            }

            // Validate about
            if(empty($data['about'])){
                $data['about_err'] = 'Please enter about business!';
            }
            
            // Make sure errors are empty
            if(empty($data['business_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['business_address_err']) && empty($data['business_contact_no_err']) && empty($data['business_email_err']) && empty($data['owner_name_err']) &&  empty($data['owner_address_err']) && empty($data['owner_contact_no_err']) && empty($data['owner_email_err']) && empty($data['owner_nic_err']) &&  empty($data['about_err'])){
            // Validated
            // Hash Password
            
                //die('hi');
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register serviceprovider
                if($this->serviceProviderModel->register($data)){
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/serviceproviderlogin');
                } else {
                    die('Something went wrong');
                }
            } else {
            // Load view with errors
            $this->view('serviceproviders/serviceproviderregister', $data);
            }

        } else {
            // Init data
            $data =[
                'business_name' => '',
                'password' => '',
                'confirm_password' => '',
                'business_address' => '',
                'business_contact_no' => '',
                'business_email' => '',
                'owner_name' => '',
                'owner_address' => '',
                'owner_contact_no' => '',
                'owner_email' => '',
                'owner_nic' => '',
                'about' => '',
                'business_name_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'business_address_err' => '',
                'business_contact_no_err' => '',
                'business_email_err' => '',
                'owner_name_err' => '',
                'owner_address_err' => '',
                'owner_contact_no_err' => '',
                'owner_email_err' => '',
                'owner_nic_err' => '',
                'about_err' => '',
            ];

            // Load view
            $this->view('serviceproviders/serviceproviderregister', $data);
        }
        }

        public function serviceproviderlogin(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Init data
            $data =[
            'business_email' => trim($_POST['business_email']),
            'password' => trim($_POST['password']),
            'business_email_err' => '',
            'password_err' => '',      
            ];

            // Validate Email
            if(empty($data['business_email'])){
            $data['business_email_err'] = 'Please enter email!';
            }

            // Validate Password
            if(empty($data['password'])){
            $data['password_err'] = 'Please enter password!';
            }

            // Check for serviceprovider/email
            if($this->serviceProviderModel->findserviceproviderByEmail($data['business_email'])){
            // serviceprovider found
            } else {
            // serviceprovider not found
            $data['business_email_err'] = 'No service provider found!';
            }

            // Make sure errors are empty
            if(empty($data['business_email_err']) && empty($data['password_err'])){
            // Validated
            // Check and set logged in serviceprovider
            $loggedInserviceprovider = $this->serviceProviderModel->serviceproviderlogin($data['business_email'], $data['password']);

            if($loggedInserviceprovider){
                // Create Session
                $this->createserviceprovidersession($loggedInserviceprovider);
            } else {
                $data['password_err'] = 'Password incorrect';

                $this->view('serviceproviders/serviceproviderlogin', $data);
            }
            } else {
            // Load view with errors
            $this->view('serviceproviders/serviceproviderlogin', $data);
            }


        } else {
            // Init data
            $data =[    
            'business_email' => '',
            'password' => '',
            'business_email_err' => '',
            'password_err' => '',        
            ];

            // Load view
            $this->view('serviceproviders/serviceproviderlogin', $data);
        }
        }

        public function createserviceprovidersession($serviceprovider){
        
        $_SESSION['serviceprovider_id'] = $serviceprovider->serviceprovider_id;
        $_SESSION['serviceprovider_email'] = $serviceprovider->business_email;
        $_SESSION['serviceprovider_name'] = $serviceprovider->business_name;
        redirect('serviceproviders/index');
        
        }

        public function logout(){
        unset($_SESSION['serviceprovider_id']);
        unset($_SESSION['serviceprovider_email']);
        unset($_SESSION['serviceprovider_name']);
        session_destroy();
        redirect('pages/index');
        }
    }