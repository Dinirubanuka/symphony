<?php
  class Administrators extends Controller {
    private $administratorModel;
    public function __construct(){
      $this->administratorModel = $this->model('Administrator');
        $this->userModel = $this->model('User');
    }

    public function index(){
      $mod_data = $this->administratorModel->view($_SESSION['administrator_id']);
      $users = $this->administratorModel->getAllUsers();
      $user_total = count($users);
      $user_data = [
        'Active' => 0,
        'Deactivated' => 0,
        'Banned' => 0
      ];
      $sps = $this->administratorModel->getAllSP();
      $sp_total = count($sps);
      $sp_data = [
        'Pending' => 0,
        'Active' => 0,
        'Deactivated' => 0,
        'Rejected' => 0,
        'Banned' => 0,
      ];
          
      $reg_user = [
        '6_7_days' => 0,
        '5_6_days' => 0,
        '4_5_days' => 0,
        '3_4_days' => 0,
        '2_3_days' => 0,
        '1_2_days' => 0,
        '0_1_days' => 0,
      ];
      
      $reg_sp = [
          '6_7_days' => 0,
          '5_6_days' => 0,
          '4_5_days' => 0,
          '3_4_days' => 0,
          '2_3_days' => 0,
          '1_2_days' => 0,
          '0_1_days' => 0,
      ];
      
      foreach ($users as $user){
        if($user->status == 'Active'){
          $user_data['Active'] = $user_data['Active'] + 1;
        } else if($user->status == 'Deactivated'){
          $user_data['Deactivated'] = $user_data['Deactivated'] + 1;
        } else if($user->status == 'Banned'){
          $user_data['Banned'] = $user_data['Banned'] + 1;
        }
        $timestamp = strtotime($user->registration_date);
        if ($timestamp >= strtotime('-1 days')) {
            $reg_user['0_1_days']++;
        }
        if ($timestamp >= strtotime('-2 days') && $timestamp < strtotime('-1 days')) {
            $reg_user['1_2_days']++;
        }
        if ($timestamp >= strtotime('-3 days') && $timestamp < strtotime('-2 days')) {
            $reg_user['2_3_days']++;
        }
        if ($timestamp >= strtotime('-4 days') && $timestamp < strtotime('-3 days')) {
            $reg_user['3_4_days']++;
        }
        if ($timestamp >= strtotime('-5 days') && $timestamp < strtotime('-4 days')) {
            $reg_user['4_5_days']++;
        }
        if ($timestamp >= strtotime('-6 days') && $timestamp < strtotime('-5 days')) {
            $reg_user['5_6_days']++;
        }
        if ($timestamp >= strtotime('-7 days') && $timestamp < strtotime('-6 days')) {
            $reg_user['6_7_days']++;
        }
      }
      foreach ($sps as $sp){
        if($sp->status == 'Pending'){
          $sp_data['Pending'] = $sp_data['Pending'] + 1;
        } else if($sp->status == 'Active'){
          $sp_data['Active'] = $sp_data['Active'] + 1;
        } else if($sp->status == 'Deactivated'){
          $sp_data['Deactivated'] = $sp_data['Deactivated'] + 1;
        } else if($sp->status == 'Rejected'){
          $sp_data['Rejected'] = $sp_data['Rejected'] + 1;
        } else if($sp->status == 'Banned'){
          $sp_data['Banned'] = $sp_data['Banned'] + 1;
        }
        $timestamp = strtotime($sp->registration_date);
        if ($timestamp >= strtotime('-1 days')) {
            $reg_sp['0_1_days']++;
        }
        if ($timestamp >= strtotime('-2 days') && $timestamp < strtotime('-1 days')) {
            $reg_sp['1_2_days']++;
        }
        if ($timestamp >= strtotime('-3 days') && $timestamp < strtotime('-2 days')) {
            $reg_sp['2_3_days']++;
        }
        if ($timestamp >= strtotime('-4 days') && $timestamp < strtotime('-3 days')) {
            $reg_sp['3_4_days']++;
        }
        if ($timestamp >= strtotime('-5 days') && $timestamp < strtotime('-4 days')) {
            $reg_sp['4_5_days']++;
        }
        if ($timestamp >= strtotime('-6 days') && $timestamp < strtotime('-5 days')) {
            $reg_sp['5_6_days']++;
        }
        if ($timestamp >= strtotime('-7 days') && $timestamp < strtotime('-6 days')) {
            $reg_sp['6_7_days']++;
        }
      }
      $instrument_count = $this->administratorModel->getInstrumentCount();
      $studio_count = $this->administratorModel->getStudioCount();
      $band_count = $this->administratorModel->getBandCount();
      $singer_count = $this->administratorModel->getSingerCount();
      $musician_count = $this->administratorModel->getMusicianCount();
      $originalData = $this->administratorModel->getLogs();
      // Arrays for different time periods
      $count_24h = [
        '23_to_24_hours' => 0,
        '22_to_23_hours' => 0,
        '21_to_22_hours' => 0,
        '20_to_21_hours' => 0,
        '19_to_20_hours' => 0,
        '18_to_19_hours' => 0,
        '17_to_18_hours' => 0,
        '16_to_17_hours' => 0,
        '15_to_16_hours' => 0,
        '14_to_15_hours' => 0,
        '13_to_14_hours' => 0,
        '12_to_13_hours' => 0,
        '11_to_12_hours' => 0,
        '10_to_11_hours' => 0,
        '9_to_10_hours' => 0,
        '8_to_9_hours' => 0,
        '7_to_8_hours' => 0,
        '6_to_7_hours' => 0,
        '5_to_6_hours' => 0,
        '4_to_5_hours' => 0,
        '3_to_4_hours' => 0,
        '2_to_3_hours' => 0,
        '1_to_2_hours' => 0,
        '0_to_1_hours' => 0,
    ];
    
    $count_week = [
        '6_7_days' => 0,
        '5_6_days' => 0,
        '4_5_days' => 0,
        '3_4_days' => 0,
        '2_3_days' => 0,
        '1_2_days' => 0,
        '0_1_days' => 0,
    ];
    
    $count_8weeks = [
        '7_to_8_weeks' => 0,
        '6_to_7_weeks' => 0,
        '5_to_6_weeks' => 0,
        '4_to_5_weeks' => 0,
        '3_to_4_weeks' => 0,
        '2_to_3_weeks' => 0,
        '1_to_2_weeks' => 0,
        '0_to_1_week' => 0,
    ];
    
    $count_year = [
        '11_12_months' => 0,
        '10_11_months' => 0,
        '9_10_months' => 0,
        '8_9_months' => 0,
        '7_8_months' => 0,
        '6_7_months' => 0,
        '5_6_months' => 0,
        '4_5_months' => 0,
        '3_4_months' => 0,
        '2_3_months' => 0,
        '1_2_months' => 0,
        '0_1_month' => 0,
    ];
      // Calculate the counts for each time period
      foreach ($originalData as $log) {
          $timestamp = strtotime($log->date_and_time);
      
          if ($timestamp >= strtotime('-1 hours')) {
            $count_24h['0_to_1_hours']++;
          }

          if ($timestamp >= strtotime('-2 hours') && $timestamp < strtotime('-1 hours')) {
            $count_24h['1_to_2_hours']++;
          }

          if ($timestamp >= strtotime('-3 hours') && $timestamp < strtotime('-2 hours')) {
            $count_24h['2_to_3_hours']++;
          }

          if ($timestamp >= strtotime('-4 hours') && $timestamp < strtotime('-3 hours')) {
            $count_24h['3_to_4_hours']++;
          }

          if ($timestamp >= strtotime('-5 hours') && $timestamp < strtotime('-4 hours')) {
            $count_24h['4_to_5_hours']++;
          }

          if ($timestamp >= strtotime('-6 hours') && $timestamp < strtotime('-5 hours')) {
            $count_24h['5_to_6_hours']++;
          }

          if ($timestamp >= strtotime('-7 hours') && $timestamp < strtotime('-6 hours')) {
            $count_24h['6_to_7_hours']++;
          }

          if ($timestamp >= strtotime('-8 hours') && $timestamp < strtotime('-7 hours')) {
            $count_24h['7_to_8_hours']++;
          }

          if ($timestamp >= strtotime('-9 hours') && $timestamp < strtotime('-8 hours')) {
            $count_24h['8_to_9_hours']++;
          }

          if ($timestamp >= strtotime('-10 hours') && $timestamp < strtotime('-9 hours')) {
            $count_24h['9_to_10_hours']++;
          }

          if ($timestamp >= strtotime('-11 hours') && $timestamp < strtotime('-10 hours')) {
            $count_24h['10_to_11_hours']++;
          }

          if ($timestamp >= strtotime('-12 hours') && $timestamp < strtotime('-11 hours')) {
            $count_24h['11_to_12_hours']++;
          }

          if ($timestamp >= strtotime('-13 hours') && $timestamp < strtotime('-12 hours')) {
            $count_24h['12_to_13_hours']++;
          }

          if ($timestamp >= strtotime('-14 hours') && $timestamp < strtotime('-13 hours')) {
            $count_24h['13_to_14_hours']++;
          }

          if ($timestamp >= strtotime('-15 hours') && $timestamp < strtotime('-14 hours')) {
            $count_24h['14_to_15_hours']++;
          }

          if ($timestamp >= strtotime('-16 hours') && $timestamp < strtotime('-15 hours')) {
            $count_24h['15_to_16_hours']++;
          }

          if ($timestamp >= strtotime('-17 hours') && $timestamp < strtotime('-16 hours')) {
            $count_24h['16_to_17_hours']++;
          }

          if ($timestamp >= strtotime('-18 hours') && $timestamp < strtotime('-17 hours')) {
            $count_24h['17_to_18_hours']++;
          }

          if ($timestamp >= strtotime('-19 hours') && $timestamp < strtotime('-18 hours')) {
            $count_24h['18_to_19_hours']++;
          }

          if ($timestamp >= strtotime('-20 hours') && $timestamp < strtotime('-19 hours')) {
            $count_24h['19_to_20_hours']++;
          }

          if ($timestamp >= strtotime('-21 hours') && $timestamp < strtotime('-20 hours')) {
            $count_24h['20_to_21_hours']++;
          }

          if ($timestamp >= strtotime('-22 hours') && $timestamp < strtotime('-21 hours')) {
            $count_24h['21_to_22_hours']++;
          }

          if ($timestamp >= strtotime('-23 hours') && $timestamp < strtotime('-22 hours')) {
            $count_24h['22_to_23_hours']++;
          }

          if ($timestamp >= strtotime('-24 hours') && $timestamp < strtotime('-23 hours')) {
            $count_24h['23_to_24_hours']++;
          }

          if ($timestamp >= strtotime('-1 days')) {
              $count_week['0_1_days']++;
          }

          if ($timestamp >= strtotime('-2 days') && $timestamp < strtotime('-1 days')) {
            $count_week['1_2_days']++;
          }

          if ($timestamp >= strtotime('-3 days') && $timestamp < strtotime('-2 days')) {
            $count_week['2_3_days']++;
          }

          if ($timestamp >= strtotime('-4 days') && $timestamp < strtotime('-3 days')) {
            $count_week['3_4_days']++;
          }

          if ($timestamp >= strtotime('-5 days') && $timestamp < strtotime('-4 days')) {
            $count_week['4_5_days']++;
          }

          if ($timestamp >= strtotime('-6 days') && $timestamp < strtotime('-5 days')) {
            $count_week['5_6_days']++;
          }

          if ($timestamp >= strtotime('-7 days') && $timestamp < strtotime('-6 days')) {
            $count_week['6_7_days']++;
          }
        
          if ($timestamp >= strtotime('-1 week')) {
              $count_8weeks['0_to_1_week']++;
          }

          if ($timestamp >= strtotime('-2 weeks') && $timestamp < strtotime('-1 weeks')) {
            $count_8weeks['1_to_2_weeks']++;
          }

          if ($timestamp >= strtotime('-3 weeks') && $timestamp < strtotime('-2 weeks')) {
            $count_8weeks['2_to_3_weeks']++;
          }

          if ($timestamp >= strtotime('-4 weeks') && $timestamp < strtotime('-3 weeks')) {
            $count_8weeks['3_to_4_weeks']++;
          }

          if ($timestamp >= strtotime('-5 weeks') && $timestamp < strtotime('-4 weeks')) {
            $count_8weeks['4_to_5_weeks']++;
          }

          if ($timestamp >= strtotime('-6 weeks') && $timestamp < strtotime('-5 weeks')) {
            $count_8weeks['5_to_6_weeks']++;
          }

          if ($timestamp >= strtotime('-7 weeks') && $timestamp < strtotime('-6 weeks')) {
            $count_8weeks['6_to_7_weeks']++;
          }

          if ($timestamp >= strtotime('-8 weeks') && $timestamp < strtotime('-7 weeks')) {
            $count_8weeks['7_to_8_weeks']++;
          }
      
          if ($timestamp >= strtotime('-1 month')) {
              $count_year['0_1_month']++;
          }

          if ($timestamp >= strtotime('-2 months') && $timestamp < strtotime('-1 months')) {
            $count_year['1_2_months']++;
          }

          if ($timestamp >= strtotime('-3 months') && $timestamp < strtotime('-2 months')) {
            $count_year['2_3_months']++;
          }

          if ($timestamp >= strtotime('-4 months') && $timestamp < strtotime('-3 months')) {
            $count_year['3_4_months']++;
          }

          if ($timestamp >= strtotime('-5 months') && $timestamp < strtotime('-4 months')) {
            $count_year['4_5_months']++;
          }

          if ($timestamp >= strtotime('-6 months') && $timestamp < strtotime('-5 months')) {
            $count_year['5_6_months']++;
          }

          if ($timestamp >= strtotime('-7 months') && $timestamp < strtotime('-6 months')) {
            $count_year['6_7_months']++;
          }

          if ($timestamp >= strtotime('-8 months') && $timestamp < strtotime('-7 months')) {
            $count_year['7_8_months']++;
          }

          if ($timestamp >= strtotime('-9 months') && $timestamp < strtotime('-8 months')) {
            $count_year['8_9_months']++;
          }

          if ($timestamp >= strtotime('-10 months') && $timestamp < strtotime('-9 months')) {
            $count_year['9_10_months']++;
          }

          if ($timestamp >= strtotime('-11 months') && $timestamp < strtotime('-10 months')) {
            $count_year['10_11_months']++;
          }

          if ($timestamp >= strtotime('-12 months') && $timestamp < strtotime('-11 months')) {
            $count_year['11_12_months']++;
          }
      }
      
      // Now $count_24h, $count_week, $count_8weeks, and $count_year contain the counts
      $data_set = [
          'last_24h' => $count_24h,
          'last_week' => $count_week,
          'last_8_weeks' => $count_8weeks,
          'last_year' => $count_year,
      ];

      $reg_data = [
        'user' => $reg_user,
        'sp' => $reg_sp
      ];

      $data = [
        'mod_data' => $mod_data,
        'user_data' => $user_data,
        'sp_data' => $sp_data,
        'user_total' => $user_total,
        'sp_total' => $sp_total,
        'instrument_count' => $instrument_count->count,
        'studio_count' => $studio_count->count,
        'band_count' => $band_count->count,
        'singer_count' => $singer_count->count,
        'musician_count' => $musician_count->count,
        'traffic_data' => $data_set,
        'reg_data' => $reg_data
      ];
      $this->view('administrators/index', $data);
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
            $log_data = [
              'user_type' => 'Administrator',
              'user_id' => $loggedInadministrator->admin_id,
              'log_type' => 'Login',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => 'Administrator logged in'
            ];
            $this->administratorModel->addLogData($log_data);
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

    public function viewmoderator(){
      $moderators = $this->administratorModel->getModerators();
      $data = [
        'moderators' => $moderators
      ];
      $this->view('administrators/viewmoderator', $data);
    }

    public function pendingrecoverrequests(){
      $recover = $this->administratorModel->getRecoverRequests('Pending');
      $data = [
        'status' => 'Pending',
        'recover' => $recover
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Manage Recover Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed pending recover requests'
      ];
      $this->administratorModel->addLogData($log_data);
        $this->view('administrators/viewrecoverrequests', $data);
    }

    public function acceptedrecoverrequests(){
      $recover = $this->administratorModel->getRecoverRequests('Accepted');
      $data = [
        'status' => 'Accepted',
        'recover' => $recover
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Manage Recover Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed accepted recover requests'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewrecoverrequests', $data);
    }

    public function rejectedrecoverrequests(){
      $recover = $this->administratorModel->getRecoverRequests('Rejected');
      $data = [
        'status' => 'Rejected',
        'recover' => $recover
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Manage Recover Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed rejected recover requests'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewrecoverrequests', $data);
    }

    function calculateSimilarityPercentage($user_data , $recover_data){
      $similarityPercentage = 0;
      $divideBy = 7;
      $similarityName = 0;
      $similarityFirstPurchaseName = 0;
      $similarityLastPurchaseName = 0;
      $similarityFirstPurchaseDate = 0;
      $similarityLastPurchaseDate = 0;
      $similarityAccountCreatedDate = 0;
      $similarityContactNo = 0;
      $similarityBirthDate = 0;
      $similarityAddress = 0;
      $similaritySecurityQuestion = 0;
      $similarityAnswer = 0;
      //Check username similarity
      similar_text($user_data['user']['User Name'], $recover_data['recover']->user_name, $similarityName);
      $userPurchases = $user_data['user']['Purchases'];

      //Sort user purchases by date
      usort($userPurchases, function ($a, $b) {
          return strtotime($a['Order Placed On']) - strtotime($b['Order Placed On']);
      });
      $firstPurchase = reset($userPurchases);
      $lastPurchase = end($userPurchases);

      //Check first purchase name similarity
      if(isset($firstPurchase['Product Name'])){
        similar_text($firstPurchase['Product Name'], $recover_data['recover']->first_purchase_item, $similarityFirstPurchaseName);
        $divideBy = $divideBy + 1;
      } else {
        $similarityFirstPurchaseName = 0;
      }
      //Check last purchase name similarity
      if(isset($lastPurchase['Product Name'])){
        similar_text($lastPurchase['Product Name'], $recover_data['recover']->last_purchase_item, $similarityLastPurchaseName);
        $divideBy = $divideBy + 1;
      } else {
        $similarityLastPurchaseName = 0;
      }
      
      //Check first purchase date similarity
      if(isset($firstPurchase['Order Placed On'])){
        $dateTime1 = new DateTime($firstPurchase['Order Placed On']);
        $dateTime2 = new DateTime($recover_data['recover']->first_purchase_date);
        $monthSimilarity = ($dateTime1->format('m') == $dateTime2->format('m')) ? 0.3 : 0;
        $dayDifference = abs($dateTime1->format('d') - $dateTime2->format('d'));
        $daySimilarity = ($dayDifference <= 3) ? 0.4 : 0;
        $fullDateSimilarity = ($dateTime1->format('Y-m-d') == $dateTime2->format('Y-m-d')) ? 0.3 : 0;
        $similarityScore = $monthSimilarity + $daySimilarity + $fullDateSimilarity;
        $similarityFirstPurchaseDate = $similarityScore * 100;
        $divideBy = $divideBy + 1;
      } else {
        $similarityFirstPurchaseDate = 0;
      }

      //Check last purchase date similarity
      if(isset($lastPurchase['Order Placed On'])){
        $dateTime3 = new DateTime($lastPurchase['Order Placed On']);
        $dateTime4 = new DateTime($recover_data['recover']->last_purchase_date);
        $monthSimilarity2 = ($dateTime3->format('m') == $dateTime4->format('m')) ? 0.3 : 0;
        $dayDifference2 = abs($dateTime3->format('d') - $dateTime4->format('d'));
        $daySimilarity2 = ($dayDifference2 <= 3) ? 0.4 : 0;
        $fullDateSimilarity2 = ($dateTime3->format('Y-m-d') == $dateTime4->format('Y-m-d')) ? 0.3 : 0;
        $similarityScore2 = $monthSimilarity2 + $daySimilarity2 + $fullDateSimilarity2;
        $similarityLastPurchaseDate = $similarityScore2 * 100;
        $divideBy = $divideBy + 1;
      } else {
        $similarityLastPurchaseDate = 0;
      }

      //Check account created date similarity
      $dateTime5 = new DateTime($user_data['user']['Account Created On']);
      $dateTime6 = new DateTime($recover_data['recover']->account_created_on);
      $monthSimilarity3 = ($dateTime5->format('m') == $dateTime6->format('m')) ? 0.3 : 0;
      $dayDifference3 = abs($dateTime5->format('d') - $dateTime6->format('d'));
      $daySimilarity3 = ($dayDifference3 <= 3) ? 0.4 : 0;
      $fullDateSimilarity3 = ($dateTime5->format('Y-m-d') == $dateTime6->format('Y-m-d')) ? 0.3 : 0;
      $similarityScore3 = $monthSimilarity3 + $daySimilarity3 + $fullDateSimilarity3;
      $similarityAccountCreatedDate = $similarityScore3 * 100;

      //Check contact no similarity
      $similarityContactNo = ($user_data['user']['Contact No'] === $recover_data['recover']->mobile_number) ? 100 : 0;
      //Check birth date similarity
      $similarityBirthDate = ($user_data['user']['Birth Date'] === $recover_data['recover']->dob) ? 100 : 0;
      //Check address similarity
      similar_text($user_data['user']['Address'], $recover_data['recover']->address, $similarityAddress);
      //Check security question similarity
      $similaritySecurityQuestion = ($user_data['user']['Security Question'] === $recover_data['recover']->securityQuestion) ? 100 : 0;
      //Check answer similarity
      $answer = strtolower($user_data['user']['Answer']);
      $recoverAnswer = strtolower($recover_data['recover']->securityAnswer); 
      if ($answer === $recoverAnswer) {
          $similarityAnswer = 100;
      } else {
          $similarityAnswer = 0;
      }
      $similarityValue = $similarityName + $similarityFirstPurchaseName + $similarityLastPurchaseName + $similarityFirstPurchaseDate + $similarityLastPurchaseDate + $similarityAccountCreatedDate + $similarityContactNo + $similarityBirthDate + $similarityAddress + $similaritySecurityQuestion + $similarityAnswer;
      $similarityPercentage = $similarityValue / $divideBy;
      return round($similarityPercentage, 2);
    }

    public function viewRecoverRequest($id){
      $recover = $this->administratorModel->getRecoverRequest($id);
      $users = $this->administratorModel->getAllUsers();
      $transformedUsers = [];
      
      foreach ($users as $user) {
          // Convert stdClass object to an associative array
          $userArray = json_decode(json_encode($user), true);
          $userOrders = $this->administratorModel->viewUserSubOrders($userArray['id']);
          $purchases = [];
          foreach ($userOrders as $userOrder){
            $purchaseArray = json_decode(json_encode($userOrder), true);
            if($purchaseArray['type'] == 'Equipment'){
              $product = $this->administratorModel->getEquipmentData($purchaseArray['product_id']);
            } else if ($purchaseArray['type'] == 'Studio'){
              $product = $this->administratorModel->getStudioData($purchaseArray['product_id']);
            } else if ($purchaseArray['type'] == 'Band'){
              $product = $this->administratorModel->getBandData($purchaseArray['product_id']);
            } else if ($purchaseArray['type'] == 'Singer'){
              $product = $this->administratorModel->getSingerData($purchaseArray['product_id']);
            } else if ($purchaseArray['type'] == 'Musician'){
              $product = $this->administratorModel->getMusicianData($purchaseArray['product_id']);
            }
            $purchase = [
              'Product ID' => $purchaseArray['product_id'],
              'Product Name' => $product->Title,
              'Order Placed On' => $purchaseArray['order_placed_on'],
            ];
            $purchases[] = $purchase;
          }
          $sec_data = $this->administratorModel->getSecurityData($userArray['id']);
          $transformedUser = [
              'User ID' => $userArray['id'],
              'User Name' => $userArray['name'],
              'Purchases' => $purchases,
              'Account Created On' => $userArray['registration_date'],
              'Contact No' => $userArray['TelephoneNumber'],
              'E-mail' => $userArray['email'],
              'Birth Date' => $userArray['BirthDate'],
              'Address' => $userArray['address'],
              'Gender' => $userArray['gender'],
              'Security Question' => 'Not Available',
              'Answer' => 'Not Available',
              'Status' => $userArray['status'],
          ];
          
          // Check if $sec_data is an object and has 'question' and 'answer' properties
          if (is_object($sec_data) && isset($sec_data->question, $sec_data->answer)) {
              $transformedUser['Security Question'] = $sec_data->question .'?';
              $transformedUser['Answer'] = $sec_data->answer;
          }
          $compareSet_1 = [
            'user' => $transformedUser,
          ];
    
          $compareSet_2 = [
            'recover' => $recover,
          ];
    
          $similarityPercentage = $this->calculateSimilarityPercentage($compareSet_1, $compareSet_2); 

          $transformedUser['Similarity Percentage'] = $similarityPercentage;       
          $transformedUsers[] = $transformedUser;
      }

      $data = [
        'recover' => $recover,
        'user' => $transformedUsers
      ];

      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Manage Recover Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed recover request '.$id.' details'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewrecoverrequest', $data);
    }

    public function changeUserPassword($id, $email, $req_id){
        $length = 16;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $password .= $characters[$randomIndex];
        }
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $data_user = [
          'id' => $id,
          'password_hashed' => $password_hashed
        ];
        $user = $this->administratorModel->getUser($id);
        $data_email = [
          'name' => $user->name,
          'email' => $email,
          'user_email' => $user->email,
          'password' => $password
        ];
        if($this->administratorModel->changeUserPassword($data_user)){
          if($this->administratorModel->sendPasswordEmail($data_email)){
            $this->administratorModel->updateRecoverRequest($req_id, 'Accepted');
            $log_data = [
              'user_type' => 'Administrator',
              'user_id' => $_SESSION['administrator_id'],
              'log_type' => 'Manage Recover Requests',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => 'Administrator accepted recover request '.$req_id.' and changed password for user '.$id
            ];
            $this->administratorModel->addLogData($log_data);
            redirect('administrators/pendingrecoverrequests');
          } else {
            $log_data = [
              'user_type' => 'Administrator',
              'user_id' => $_SESSION['administrator_id'],
              'log_type' => 'Manage Recover Requests',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => 'Administrator accepted recover request '.$req_id.' but failed to send password email to user '.$id
            ];
            $this->administratorModel->addLogData($log_data);
            die('Something went wrong while sending email');
          }
        } else {
          $log_data = [
            'user_type' => 'Administrator',
            'user_id' => $_SESSION['administrator_id'],
            'log_type' => 'Manage Recover Requests',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Administrator accepted recover request '.$req_id.' but failed to change password for the user '.$id
          ];
          $this->administratorModel->addLogData($log_data);
          die('Something went wrong');
        }
    }

    public function rejectRecoverRequest($id, $encodedReason){
      $decodeddReason = str_replace('_', ' ', $encodedReason);
      $request_data = $this->administratorModel->getRecoverRequest($id);
      $email_data = [
        'name' => $request_data->user_name,
        'email' => $request_data->email,
        'reason' => $decodeddReason
      ];
      if($this->administratorModel->updateRecoverRequest($id, 'Rejected')){
        $this->administratorModel->sendRecoverRejectionEmail($email_data);
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Manage Recover Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator rejected recover request '.$id .' with reason '.$decodeddReason
        ];
        $this->administratorModel->addLogData($log_data);
        redirect('administrators/pendingrecoverrequests');
      } else {
        die('Something went wrong');
      }
    }

    public function viewProduct($type, $product_id){
      if($type == 'Equipment'){
        $data = $this->administratorModel->getEquipmentData($product_id);
      } else if ($type == 'Studio'){
        $data = $this->administratorModel->getStudioData($product_id);
      } else if ($type == 'Band'){
        $data = $this->administratorModel->getBandData($product_id);
      } else if ($type == 'Singer'){
        $data = $this->administratorModel->getSingerData($product_id);
      } else if ($type == 'Musician'){
        $data = $this->administratorModel->getMusicianData($product_id);
      }
      $sp_data = $this->administratorModel->getSP($data->created_by);
      $reviews = $this->administratorModel->getReviews($product_id, $type);
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
          $log_data = [
            'user_type' => 'Administrator',
            'user_id' => $_SESSION['administrator_id'],
            'log_type' => 'View Product',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Administrator tried to view a product that does not exist'
          ];
            die('Item Not Found!');
        }
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Product',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed product '.$product_id.' details of type '.$type
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewitem', $data);
    }

    public function viewActiveUser(){
      $users = $this->administratorModel->getUsers();
      $data = [
        'users' => $users,
        'status' => 'Active'
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Users',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed active users'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewuser', $data);
    }

    public function viewBannedUser(){
      $users = $this->administratorModel->getBannedUsers();
      $data = [
        'users' => $users,
        'status' => 'Banned'
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Users',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed banned users'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewuser', $data);
    }

    public function viewDeactivatedUser(){
      $users = $this->administratorModel->getDeactivatedUsers();
      $data = [
        'users' => $users,
        'status' => 'Deactivated'
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Users',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed deactivated users'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewuser', $data);
    }

    public function viewActiveSP(){
      $serviceproviders = $this->administratorModel->getServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Active'
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed active service providers'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewserviceprovider', $data);
    }

    public function viewRejectedSP(){
      $serviceproviders = $this->administratorModel->getRejectedServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Rejected'
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed rejected service providers'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewserviceprovider', $data);
    }

    public function viewDeactivatedSP(){
      $serviceproviders = $this->administratorModel->getDeactivatedServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Deactivated'
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed deactivated service providers'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewserviceprovider', $data);
    }

    public function viewBannedSP(){
      $serviceproviders = $this->administratorModel->getBannedServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Banned'
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed banned service providers'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewserviceprovider', $data);
    }

    public function deleteuser($id){
      if($this->administratorModel->deleteUser($id)){
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Delete User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator deleted user '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        redirect('administrators/viewuser');
      } else {
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Delete User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator failed to delete user '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function pendingrequest(){
      $pending = $this->administratorModel->getPendingRequests();
      $data = [
        'pending' => $pending
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Manage Service Provider Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed pending service provider requests'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/pendingrequest', $data);
    }

    public function viewPendingRequest($id){
      $request = $this->administratorModel->getSP($id);
      $data = [
        'request' => $request
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Manage Service Provider Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed pending service provider request '.$id.' details'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewpendingrequest', $data);
    }

    public function viewserviceprovider($id){
      $serviceprovider = $this->administratorModel->getSP($id);
      $data = [
        'request' => $serviceprovider
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Manage Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed service provider '.$id.' details'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewsp', $data);
    }

    public function viewuser($id){
      $user = $this->administratorModel->getUser($id);
      $data = [
        'request' => $user
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Manage Users',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed user '.$id.' details'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewuser_single', $data);
    }

    public function banuser($id, $encodedReason){
      $decodedReason = str_replace('_', ' ', $encodedReason);
      $user = $this->administratorModel->getUser($id);
      if($this->administratorModel->banUser($id)){
        $this->administratorModel->sendBanUserEmail($user->email, $user->name , $decodedReason);
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Ban User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator banned user '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        redirect('administrators/viewBannedUser/');
      } else {
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Ban User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator failed to ban user '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function banserviceprovider($id, $encodedReason){
      $decodeddReason = str_replace('_', ' ', $encodedReason);
      $sp = $this->administratorModel->getSP($id);
      if($this->administratorModel->banServiceProvider($id)){
        $this->administratorModel->sendBanSPEmail($sp->business_email, $sp->business_name, $decodeddReason);
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Ban Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator banned service provider '.$id .' with reason '.$decodeddReason
        ];
        $this->administratorModel->addLogData($log_data);
        redirect('administrators/viewBannedSP');
      } else {
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Ban Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator failed to ban service provider '.$id .' with reason '.$decodeddReason
        ];
        $this->administratorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function unbanserviceprovider($id){
      $sp = $this->administratorModel->getSP($id);
      $email_data = [
        'name' => $sp->business_name,
        'email' => $sp->business_email
      ];
      if($this->administratorModel->unbanServiceProvider($id)){
        $this->administratorModel->sendUnbanSPEmail($email_data);
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Unban Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator lifted the ban on service provider '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        redirect('administrators/viewActiveSP');
      } else {
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Unban Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator failed to lift the ban on service provider '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function unbanuser($id){
      $user = $this->administratorModel->getUser($id);
      $email_data = [
        'name' => $user->name,
        'email' => $user->email
      ];
      if($this->administratorModel->unbanUser($id)){
        $this->administratorModel->sendUnbanUserEmail($email_data);
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Unban User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator lifted the ban on user '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        redirect('administrators/viewActiveUser');
      } else {
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Unban User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator failed to lift the ban on user '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function deletemoderator($id){
      if($this->administratorModel->deleteModerator($id)){
        redirect('administrators/viewmoderator');
      } else {
        die('Something went wrong');
      }
    }

    public function deleteserviceprovider($id){
      if($this->administratorModel->deleteServiceProvider($id)){
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Delete Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator deleted service provider '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        redirect('administrators/viewserviceprovider');
      } else {
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Delete Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator failed to delete service provider '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        die('Something went wrong in deleting service provider');
      }
    }

    public function acceptServiceProvider($id){
      if($this->administratorModel->acceptSP($id)){
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Manage Service Provider Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator accepted service provider request '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        redirect('administrators/pendingrequest');
      } else {
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Manage Service Provider Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator failed to accept service provider request '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function rejectServiceProvider($id){
      if($this->administratorModel->rejectSP($id)){
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Manage Service Provider Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator rejected service provider request '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        redirect('administrators/pendingrequest');
      } else {
        $log_data = [
          'user_type' => 'Administrator',
          'user_id' => $_SESSION['administrator_id'],
          'log_type' => 'Manage Service Provider Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Administrator failed to reject service provider request '.$id
        ];
        $this->administratorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function viewUserOrders($id){
      $order = $this->administratorModel->viewUserOrders($id);
      $data = [
        'order' => $order,
        'user_id' => $id
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View User Orders',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed user '.$id.' orders'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewuserorders', $data);
    }

    public function viewSPOrders($id){
      $order = $this->administratorModel->viewSPOrders($id);
      $data = [
        'order' => $order,
        'sp_id' => $id
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Service Provider Orders',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed service provider '.$id.' orders'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/viewsporders', $data);
    }

    public function viewOrder($id){
      $order = $this->administratorModel->getOrderData($id);
      $user_data = $this->administratorModel->getUser($order->user_id);
      $order_data = json_decode(json_encode($order), true);
      $suborder_ids = explode(',', $order_data['sorder_id']);
      $sub_orders = [];
      foreach($suborder_ids as $suborder_id){
        $suborder_obj = [];
        $suborder = $this->administratorModel->getSubOrderData($suborder_id);
        if($suborder->type == 'Equipment'){
          $product_data = $this->administratorModel->getEquipmentData($suborder->product_id);
        } else if ($suborder->type == 'Studio'){
          $product_data = $this->administratorModel->getStudioData($suborder->product_id);
        } else if ($suborder->type == 'Band'){
          $product_data = $this->administratorModel->getBandData($suborder->product_id);
        } else if ($suborder->type == 'Singer'){
          $product_data = $this->administratorModel->getSingerData($suborder->product_id);
        } else if ($suborder->type == 'Musician'){
          $product_data = $this->administratorModel->getMusicianData($suborder->product_id);
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
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View User Order',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed order '.$id.' details'
      ];
      $this->view('administrators/viewuserorder', $data);
    }

    public function viewSubOrder($id){
      $suborder = $this->administratorModel->getSubOrderData($id);
      $user_data = $this->administratorModel->getUser($suborder->user_id);
      if($suborder->type == 'Equipment'){
        $product_data = $this->administratorModel->getEquipmentData($suborder->product_id);
      } else if ($suborder->type == 'Studio'){
        $product_data = $this->administratorModel->getStudioData($suborder->product_id);
      } else if ($suborder->type == 'Band'){
        $product_data = $this->administratorModel->getBandData($suborder->product_id);
      } else if ($suborder->type == 'Singer'){
        $product_data = $this->administratorModel->getSingerData($suborder->product_id);
      } else if ($suborder->type == 'Musician'){
        $product_data = $this->administratorModel->getMusicianData($suborder->product_id);
      }
      $data = [
        'order_data' => $suborder,
        'product_data' => $product_data,
        'user_data' => $user_data
      ];
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'View Servive Provider Order',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed suborder '.$id.' details'
      ];
      $this->view('administrators/viewsporder', $data);
    }

    public function generatereports(){
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Generate Reports',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator viewed reports'
      ];
      $this->administratorModel->addLogData($log_data);
      $this->view('administrators/reports');
    }

    public function getUserList(){
      $all_users = $this->administratorModel->getAllUsers();
      $all_sp = $this->administratorModel->getAllSP();
      $all_moderators = $this->administratorModel->getAllModerators();
      $data = [
        'all_users' => $all_users,
        'all_sp' => $all_sp,
        'all_moderators' => $all_moderators
      ];
      $this->view('administrators/userlist', $data);
    }

    public function generateUserLog($user_id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          if(isset($_POST['options'])){
            $option_in = trim($_POST['options']);
            if($option_in == 'login'){
              $option = 'Login';
            } else if ($option_in == 'logout') {
              $option = 'Logout';
            } else if ($option_in == 'purchases'){
              $option = 'Place Order';
            } else if ($option_in == 'inquiries'){
              $option = 'Add Inquiry';
            } else if ($option_in == 'update-profile'){
              $option = 'Manage Profile';
            } else if ($option_in == 'reviews'){
              $option = 'Add Review';
            }
          } else {
            $option = 'NA';
          }
        if ($option == 'NA') {
          $user = $this->administratorModel->getUser($user_id);
          $data_log = [
            'id' => $user_id,
            'type' => 'Customer',
            'from' => trim($_POST['from-date']),
            'to' => trim($_POST['to-date'])
          ];
          $log_data = $this->administratorModel->getLogIDNO($data_log);
          $data = [
            'user' => $user,
            'type' => 'User',
            'log_data' => $log_data,
            'from_date' => trim($_POST['from-date']),
            'to_date' => trim($_POST['to-date'])
          ];
          $this->view('administrators/generatelog', $data);
        } else {
          $user = $this->administratorModel->getUser($user_id);
          $data_log = [
            'id' => $user_id,
            'type' => 'Customer',
            'from' => trim($_POST['from-date']),
            'to' => trim($_POST['to-date']),
            'option' => $option
          ];
          $log_data = $this->administratorModel->getLogID($data_log);
          $data = [
            'user' => $user,
            'type' => 'User',
            'log_data' => $log_data,
            'from_date' => trim($_POST['from-date']),
            'to_date' => trim($_POST['to-date'])
          ];
          $this->view('administrators/generatelog', $data);
        }
      } else {
        $user = $this->administratorModel->getUser($user_id);
        $data = [
          'user' => $user,
          'type' => 'User',
          'log_data' => 'NA'
        ];
        $this->view('administrators/generatelog', $data);
      }
    }

    public function generateSPLog($sp_id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          if(isset($_POST['options'])){
            $option_in = trim($_POST['options']);
            if($option_in == 'login'){
              $option = 'Login';
            } else if ($option_in == 'logout') {
              $option = 'Logout';
            } else if ($option_in == 'accept_orders'){
              $option = 'Accept Order';
            } else if ($option_in == 'reject_orders'){
              $option = 'Reject Order';
            } else if ($option_in == 'inventory'){
              $option = 'Manage Inventory';
            } else if ($option_in == 'inquiries'){
              $option = 'Add Inquiry';
            } else if ($option_in == 'update-profile'){
              $option = 'Manage Profile';
            } else if ($option_in == 'reviews'){
              $option = 'Add Review';
            }
          } else {
            $option = 'NA';
          }
        if ($option == 'NA') {
          $sp = $this->administratorModel->getSP($sp_id);
          $data_log = [
            'id' => $sp_id,
            'type' => 'Service Provider',
            'from' => trim($_POST['from-date']),
            'to' => trim($_POST['to-date'])
          ];
          $log_data = $this->administratorModel->getLogIDNO($data_log);
          $data = [
            'user' => $sp,
            'type' => 'SP',
            'log_data' => $log_data,
            'from_date' => trim($_POST['from-date']),
            'to_date' => trim($_POST['to-date'])
          ];
          $this->view('administrators/generatelog', $data);
        } else {
          $sp = $this->administratorModel->getSP($sp_id);
          $data_log = [
            'id' => $sp_id,
            'type' => 'Service Provider',
            'from' => trim($_POST['from-date']),
            'to' => trim($_POST['to-date']),
            'option' => $option
          ];
          $log_data = $this->administratorModel->getLogID($data_log);
          $data = [
            'user' => $sp,
            'type' => 'SP',
            'log_data' => $log_data,
            'from_date' => trim($_POST['from-date']),
            'to_date' => trim($_POST['to-date'])
          ];
          $this->view('administrators/generatelog', $data);
        }
      } else {
        $sp = $this->administratorModel->getSP($sp_id);
        $data = [
          'user' => $sp,
          'type' => 'SP',
          'log_data' => 'NA'
        ];
        $this->view('administrators/generatelog', $data);
      }
    }

    public function generateModLog($modid){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          if(isset($_POST['options'])){
            $option_in = trim($_POST['options']);
            if($option_in == 'login'){
              $option = 'Login';
            } else if ($option_in == 'logout') {
              $option = 'Logout';
            } else if ($option_in == 'acc_new'){
              $option = 'Manage Service Provider Requests';
            } else if ($option_in == 'ban_user'){
              $option = 'Ban User';
            } else if ($option_in == 'unban_user'){
              $option = 'Unban User';
            } else if ($option_in == 'ban_sp'){
              $option = 'Ban Service Provider';
            } else if ($option_in == 'unban_sp'){
              $option = 'Unban Service Provider';
            } else if ($option_in == 'acc_inq'){
              $option = 'Approve Inquiry';
            } else if ($option_in == 'close_inq'){
              $option = 'Complete Inquiry';
            }
          } else {
            $option = 'NA';
          }
        if ($option == 'NA') {
          $mod = $this->administratorModel->getModerator($modid);
          $data_log = [
            'id' => $modid,
            'type' => 'Moderator',
            'from' => trim($_POST['from-date']),
            'to' => trim($_POST['to-date'])
          ];
          $log_data = $this->administratorModel->getLogIDNO($data_log);
          $data = [
            'user' => $mod,
            'type' => 'MOD',
            'log_data' => $log_data,
            'from_date' => trim($_POST['from-date']),
            'to_date' => trim($_POST['to-date'])
          ];
          $this->view('administrators/generatelog', $data);
        } else {
          $mod = $this->administratorModel->getModerator($modid);
          $data_log = [
            'id' => $modid,
            'type' => 'Moderator',
            'from' => trim($_POST['from-date']),
            'to' => trim($_POST['to-date']),
            'option' => $option
          ];
          $log_data = $this->administratorModel->getLogID($data_log);
          $data = [
            'user' => $mod,
            'type' => 'MOD',
            'log_data' => $log_data,
            'from_date' => trim($_POST['from-date']),
            'to_date' => trim($_POST['to-date'])
          ];
          $this->view('administrators/generatelog', $data);
        }
      } else {
        $mod = $this->administratorModel->getModerator($modid);
        $data = [
          'user' => $mod,
          'type' => 'MOD',
          'log_data' => 'NA'
        ];
        $this->view('administrators/generatelog', $data);
      }
    }

    public function generateRevenueReport(){
      $admin = $this->administratorModel->view($_SESSION['administrator_id']);
      $orders = $this->administratorModel->getSubOrders();
      $count_24h = [
        '23_to_24_hours' => 0,
        '22_to_23_hours' => 0,
        '21_to_22_hours' => 0,
        '20_to_21_hours' => 0,
        '19_to_20_hours' => 0,
        '18_to_19_hours' => 0,
        '17_to_18_hours' => 0,
        '16_to_17_hours' => 0,
        '15_to_16_hours' => 0,
        '14_to_15_hours' => 0,
        '13_to_14_hours' => 0,
        '12_to_13_hours' => 0,
        '11_to_12_hours' => 0,
        '10_to_11_hours' => 0,
        '9_to_10_hours' => 0,
        '8_to_9_hours' => 0,
        '7_to_8_hours' => 0,
        '6_to_7_hours' => 0,
        '5_to_6_hours' => 0,
        '4_to_5_hours' => 0,
        '3_to_4_hours' => 0,
        '2_to_3_hours' => 0,
        '1_to_2_hours' => 0,
        '0_to_1_hours' => 0,
      ];
      
      $count_week = [
          '6_7_days' => 0,
          '5_6_days' => 0,
          '4_5_days' => 0,
          '3_4_days' => 0,
          '2_3_days' => 0,
          '1_2_days' => 0,
          '0_1_days' => 0,
      ];
      
      $count_8weeks = [
          '7_to_8_weeks' => 0,
          '6_to_7_weeks' => 0,
          '5_to_6_weeks' => 0,
          '4_to_5_weeks' => 0,
          '3_to_4_weeks' => 0,
          '2_to_3_weeks' => 0,
          '1_to_2_weeks' => 0,
          '0_to_1_week' => 0,
      ];
      
      $count_year = [
          '11_12_months' => 0,
          '10_11_months' => 0,
          '9_10_months' => 0,
          '8_9_months' => 0,
          '7_8_months' => 0,
          '6_7_months' => 0,
          '5_6_months' => 0,
          '4_5_months' => 0,
          '3_4_months' => 0,
          '2_3_months' => 0,
          '1_2_months' => 0,
          '0_1_month' => 0,
      ];

      $count_24hR = [
        '23_to_24_hours' => 0,
        '22_to_23_hours' => 0,
        '21_to_22_hours' => 0,
        '20_to_21_hours' => 0,
        '19_to_20_hours' => 0,
        '18_to_19_hours' => 0,
        '17_to_18_hours' => 0,
        '16_to_17_hours' => 0,
        '15_to_16_hours' => 0,
        '14_to_15_hours' => 0,
        '13_to_14_hours' => 0,
        '12_to_13_hours' => 0,
        '11_to_12_hours' => 0,
        '10_to_11_hours' => 0,
        '9_to_10_hours' => 0,
        '8_to_9_hours' => 0,
        '7_to_8_hours' => 0,
        '6_to_7_hours' => 0,
        '5_to_6_hours' => 0,
        '4_to_5_hours' => 0,
        '3_to_4_hours' => 0,
        '2_to_3_hours' => 0,
        '1_to_2_hours' => 0,
        '0_to_1_hours' => 0,
    ];
    
    $count_weekR = [
        '6_7_days' => 0,
        '5_6_days' => 0,
        '4_5_days' => 0,
        '3_4_days' => 0,
        '2_3_days' => 0,
        '1_2_days' => 0,
        '0_1_days' => 0,
    ];
    
    $count_8weeksR = [
        '7_to_8_weeks' => 0,
        '6_to_7_weeks' => 0,
        '5_to_6_weeks' => 0,
        '4_to_5_weeks' => 0,
        '3_to_4_weeks' => 0,
        '2_to_3_weeks' => 0,
        '1_to_2_weeks' => 0,
        '0_to_1_week' => 0,
    ];
    
    $count_yearR = [
        '11_12_months' => 0,
        '10_11_months' => 0,
        '9_10_months' => 0,
        '8_9_months' => 0,
        '7_8_months' => 0,
        '6_7_months' => 0,
        '5_6_months' => 0,
        '4_5_months' => 0,
        '3_4_months' => 0,
        '2_3_months' => 0,
        '1_2_months' => 0,
        '0_1_month' => 0,
    ];
    foreach ($orders as $order){
      $timestamp = strtotime($order->order_placed_on);
      if ($timestamp >= strtotime('-1 hours')) {
        $count_24h['0_to_1_hours']++;
        $count_24hR['0_to_1_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-2 hours') && $timestamp < strtotime('-1 hours')) {
        $count_24h['1_to_2_hours']++;
        $count_24hR['1_to_2_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-3 hours') && $timestamp < strtotime('-2 hours')) {
        $count_24h['2_to_3_hours']++;
        $count_24hR['2_to_3_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-4 hours') && $timestamp < strtotime('-3 hours')) {
        $count_24h['3_to_4_hours']++;
        $count_24hR['3_to_4_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-5 hours') && $timestamp < strtotime('-4 hours')) {
        $count_24h['4_to_5_hours']++;
        $count_24hR['4_to_5_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-6 hours') && $timestamp < strtotime('-5 hours')) {
        $count_24h['5_to_6_hours']++;
        $count_24hR['5_to_6_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-7 hours') && $timestamp < strtotime('-6 hours')) {
        $count_24h['6_to_7_hours']++;
        $count_24hR['6_to_7_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-8 hours') && $timestamp < strtotime('-7 hours')) {
        $count_24h['7_to_8_hours']++;
        $count_24hR['7_to_8_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-9 hours') && $timestamp < strtotime('-8 hours')) {
        $count_24h['8_to_9_hours']++;
        $count_24hR['8_to_9_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-10 hours') && $timestamp < strtotime('-9 hours')) {
        $count_24h['9_to_10_hours']++;
        $count_24hR['9_to_10_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-11 hours') && $timestamp < strtotime('-10 hours')) {
        $count_24h['10_to_11_hours']++;
        $count_24hR['10_to_11_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-12 hours') && $timestamp < strtotime('-11 hours')) {
        $count_24h['11_to_12_hours']++;
        $count_24hR['11_to_12_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-13 hours') && $timestamp < strtotime('-12 hours')) {
        $count_24h['12_to_13_hours']++;
        $count_24hR['12_to_13_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-14 hours') && $timestamp < strtotime('-13 hours')) {
        $count_24h['13_to_14_hours']++;
        $count_24hR['13_to_14_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-15 hours') && $timestamp < strtotime('-14 hours')) {
        $count_24h['14_to_15_hours']++;
        $count_24hR['14_to_15_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-16 hours') && $timestamp < strtotime('-15 hours')) {
        $count_24h['15_to_16_hours']++;
        $count_24hR['15_to_16_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-17 hours') && $timestamp < strtotime('-16 hours')) {
        $count_24h['16_to_17_hours']++;
        $count_24hR['16_to_17_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-18 hours') && $timestamp < strtotime('-17 hours')) {
        $count_24h['17_to_18_hours']++;
        $count_24hR['17_to_18_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-19 hours') && $timestamp < strtotime('-18 hours')) {
        $count_24h['18_to_19_hours']++;
        $count_24hR['18_to_19_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-20 hours') && $timestamp < strtotime('-19 hours')) {
        $count_24h['19_to_20_hours']++;
        $count_24hR['19_to_20_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-21 hours') && $timestamp < strtotime('-20 hours')) {
        $count_24h['20_to_21_hours']++;
        $count_24hR['20_to_21_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-22 hours') && $timestamp < strtotime('-21 hours')) {
        $count_24h['21_to_22_hours']++;
        $count_24hR['21_to_22_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-23 hours') && $timestamp < strtotime('-22 hours')) {
        $count_24h['22_to_23_hours']++;
        $count_24hR['22_to_23_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-24 hours') && $timestamp < strtotime('-23 hours')) {
        $count_24h['23_to_24_hours']++;
        $count_24hR['23_to_24_hours'] += $order->total;
      }

      if ($timestamp >= strtotime('-1 days')) {
          $count_week['0_1_days']++;
          $count_weekR['0_1_days'] += $order->total;
      }

      if ($timestamp >= strtotime('-2 days') && $timestamp < strtotime('-1 days')) {
        $count_week['1_2_days']++;
        $count_weekR['1_2_days'] += $order->total;
      }

      if ($timestamp >= strtotime('-3 days') && $timestamp < strtotime('-2 days')) {
        $count_week['2_3_days']++;
        $count_weekR['2_3_days'] += $order->total;
      }

      if ($timestamp >= strtotime('-4 days') && $timestamp < strtotime('-3 days')) {
        $count_week['3_4_days']++;  
        $count_weekR['3_4_days'] += $order->total;
      }

      if ($timestamp >= strtotime('-5 days') && $timestamp < strtotime('-4 days')) {
        $count_week['4_5_days']++;
        $count_weekR['4_5_days'] += $order->total;
      }

      if ($timestamp >= strtotime('-6 days') && $timestamp < strtotime('-5 days')) {
        $count_week['5_6_days']++;
        $count_weekR['5_6_days'] += $order->total;
      }

      if ($timestamp >= strtotime('-7 days') && $timestamp < strtotime('-6 days')) {
        $count_week['6_7_days']++;
        $count_weekR['6_7_days'] += $order->total;
      }
    
      if ($timestamp >= strtotime('-1 week')) {
          $count_8weeks['0_to_1_week']++;
          $count_8weeksR['0_to_1_week'] += $order->total;
      }

      if ($timestamp >= strtotime('-2 weeks') && $timestamp < strtotime('-1 weeks')) {
        $count_8weeks['1_to_2_weeks']++;
        $count_8weeksR['1_to_2_weeks'] += $order->total;
      }

      if ($timestamp >= strtotime('-3 weeks') && $timestamp < strtotime('-2 weeks')) {
        $count_8weeks['2_to_3_weeks']++;
        $count_8weeksR['2_to_3_weeks'] += $order->total;
      }

      if ($timestamp >= strtotime('-4 weeks') && $timestamp < strtotime('-3 weeks')) {
        $count_8weeks['3_to_4_weeks']++;
        $count_8weeksR['3_to_4_weeks'] += $order->total;
      }

      if ($timestamp >= strtotime('-5 weeks') && $timestamp < strtotime('-4 weeks')) {
        $count_8weeks['4_to_5_weeks']++;
        $count_8weeksR['4_to_5_weeks'] += $order->total;
      }

      if ($timestamp >= strtotime('-6 weeks') && $timestamp < strtotime('-5 weeks')) {
        $count_8weeks['5_to_6_weeks']++;
        $count_8weeksR['5_to_6_weeks'] += $order->total;
      }

      if ($timestamp >= strtotime('-7 weeks') && $timestamp < strtotime('-6 weeks')) {
        $count_8weeks['6_to_7_weeks']++;
        $count_8weeksR['6_to_7_weeks'] += $order->total;
      }

      if ($timestamp >= strtotime('-8 weeks') && $timestamp < strtotime('-7 weeks')) {
        $count_8weeks['7_to_8_weeks']++;
        $count_8weeksR['7_to_8_weeks'] += $order->total;
      }
  
      if ($timestamp >= strtotime('-1 month')) {
          $count_year['0_1_month']++;
          $count_yearR['0_1_month'] += $order->total;
      }

      if ($timestamp >= strtotime('-2 months') && $timestamp < strtotime('-1 months')) {
        $count_year['1_2_months']++;
        $count_yearR['1_2_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-3 months') && $timestamp < strtotime('-2 months')) {
        $count_year['2_3_months']++;
        $count_yearR['2_3_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-4 months') && $timestamp < strtotime('-3 months')) {
        $count_year['3_4_months']++;
        $count_yearR['3_4_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-5 months') && $timestamp < strtotime('-4 months')) {
        $count_year['4_5_months']++;
        $count_yearR['4_5_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-6 months') && $timestamp < strtotime('-5 months')) {
        $count_year['5_6_months']++;
        $count_yearR['5_6_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-7 months') && $timestamp < strtotime('-6 months')) {
        $count_year['6_7_months']++;
        $count_yearR['6_7_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-8 months') && $timestamp < strtotime('-7 months')) {
        $count_year['7_8_months']++;
        $count_yearR['7_8_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-9 months') && $timestamp < strtotime('-8 months')) {
        $count_year['8_9_months']++;
        $count_yearR['8_9_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-10 months') && $timestamp < strtotime('-9 months')) {
        $count_year['9_10_months']++;
        $count_yearR['9_10_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-11 months') && $timestamp < strtotime('-10 months')) {
        $count_year['10_11_months']++;
        $count_yearR['10_11_months'] += $order->total;
      }

      if ($timestamp >= strtotime('-12 months') && $timestamp < strtotime('-11 months')) {
        $count_year['11_12_months']++;
        $count_yearR['11_12_months'] += $order->total;
      }
    }

    $data_set = [
      'last_24h' => $count_24h,
      'last_week' => $count_week,
      'last_8_weeks' => $count_8weeks,
      'last_year' => $count_year,
    ];  
    $data_setR = [
      'last_24h' => $count_24hR,
      'last_week' => $count_weekR,
      'last_8_weeks' => $count_8weeksR,
      'last_year' => $count_yearR,
    ];

    $data = [
      'admin_data' => $admin,
      'orders' => $data_set,
      'revenue' => $data_setR
    ];
    $this->view('administrators/generaterevenue', $data);
  }

    public function createadministratorSession($administrator){
      
      $_SESSION['administrator_id'] = $administrator->admin_id;
      $_SESSION['administrator_email'] = $administrator->admin_email;
      $_SESSION['administrator_name'] = $administrator->admin_name;
      redirect('administrators/index');
      
    }

    public function logout(){
      $log_data = [
        'user_type' => 'Administrator',
        'user_id' => $_SESSION['administrator_id'],
        'log_type' => 'Logout',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Administrator logged out'
      ];
      $this->administratorModel->addLogData($log_data);
      unset($_SESSION['administrator_id']);
      unset($_SESSION['administrator_email']);
      unset($_SESSION['administrator_name']);
      session_destroy();
      redirect('administrators/login');
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
                  $log_data = [
                      'user_type' => 'Administrator',
                      'user_id' => $_SESSION['administrator_id'],
                      'log_type' => 'Add Moderator',
                      'date_and_time' => date('Y-m-d H:i:s'),
                      'data' => 'Administrator added a new moderator'
                  ];
                  $this->administratorModel->addLogData($log_data);
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