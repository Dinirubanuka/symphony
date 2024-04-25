<?php
  class Moderators extends Controller {
    private $moderatorModel;
    public function __construct(){
      $this->moderatorModel = $this->model('Moderator');
    }

    public function index(){
      $mod_data = $this->moderatorModel->view($_SESSION['moderator_id']);
      $users = $this->moderatorModel->getAllUsers();
      $user_total = count($users);
      $user_data = [
        'Active' => 0,
        'Deactivated' => 0,
        'Banned' => 0
      ];
      $sps = $this->moderatorModel->getAllSP();
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
      $instrument_count = $this->moderatorModel->getInstrumentCount();
      $studio_count = $this->moderatorModel->getStudioCount();
      $band_count = $this->moderatorModel->getBandCount();
      $singer_count = $this->moderatorModel->getSingerCount();
      $musician_count = $this->moderatorModel->getMusicianCount();
      $originalData = $this->moderatorModel->getLogs();
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
      $this->view('moderators/index', $data);
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
            $log_data = [
              'user_type' => 'Moderator',
              'user_id' => $loggedInmoderator->moderator_id,
              'log_type' => 'Login',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => 'Moderator logged in'
            ];
            $this->moderatorModel->addLogData($log_data);
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

    public function pendingrecoverrequests(){
      $recover = $this->moderatorModel->getRecoverRequests('Pending');
      $data = [
        'status' => 'Pending',
        'recover' => $recover
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'Manage Recover Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed pending recover requests'
      ];
      $this->moderatorModel->addLogData($log_data);
        $this->view('moderators/viewrecoverrequests', $data);
    }

    public function acceptedrecoverrequests(){
      $recover = $this->moderatorModel->getRecoverRequests('Accepted');
      $data = [
        'status' => 'Accepted',
        'recover' => $recover
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'Manage Recover Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed accepted recover requests'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewrecoverrequests', $data);
    }

    public function rejectedrecoverrequests(){
      $recover = $this->moderatorModel->getRecoverRequests('Rejected');
      $data = [
        'status' => 'Rejected',
        'recover' => $recover
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'Manage Recover Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed rejected recover requests'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewrecoverrequests', $data);
    }

    function calculateSimilarityPercentage($user_data , $recover_data){
      $similarityPercentage = 0;
      $divideBy = 10;
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
          $similarityAnswer = 400;
      } else {
          $similarityAnswer = 0;
      }
      $similarityValue = $similarityName + $similarityFirstPurchaseName + $similarityLastPurchaseName + $similarityFirstPurchaseDate + $similarityLastPurchaseDate + $similarityAccountCreatedDate + $similarityContactNo + $similarityBirthDate + $similarityAddress + $similaritySecurityQuestion + $similarityAnswer;
      $similarityPercentage = $similarityValue / $divideBy;
      return round($similarityPercentage, 2);
    }

    public function viewRecoverRequest($id){
      $recover = $this->moderatorModel->getRecoverRequest($id);
      $users = $this->moderatorModel->getAllUsers();
      $transformedUsers = [];
      
      foreach ($users as $user) {
          // Convert stdClass object to an associative array
          $userArray = json_decode(json_encode($user), true);
          $userOrders = $this->moderatorModel->viewUserSubOrders($userArray['id']);
          $purchases = [];
          foreach ($userOrders as $userOrder){
            $purchaseArray = json_decode(json_encode($userOrder), true);
            if($purchaseArray['type'] == 'Equipment'){
              $product = $this->moderatorModel->getEquipmentData($purchaseArray['product_id']);
            } else if ($purchaseArray['type'] == 'Studio'){
              $product = $this->moderatorModel->getStudioData($purchaseArray['product_id']);
            } else if ($purchaseArray['type'] == 'Band'){
              $product = $this->moderatorModel->getBandData($purchaseArray['product_id']);
            } else if ($purchaseArray['type'] == 'Singer'){
              $product = $this->moderatorModel->getSingerData($purchaseArray['product_id']);
            } else if ($purchaseArray['type'] == 'Musician'){
              $product = $this->moderatorModel->getMusicianData($purchaseArray['product_id']);
            }
            $purchase = [
              'Product ID' => $purchaseArray['product_id'],
              'Product Name' => $product->Title,
              'Order Placed On' => $purchaseArray['order_placed_on'],
            ];
            $purchases[] = $purchase;
          }
          $sec_data = $this->moderatorModel->getSecurityData($userArray['id']);
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
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'Manage Recover Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed recover request '.$id.' details'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewrecoverrequest', $data);
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
        $user = $this->moderatorModel->getUser($id);
        $data_email = [
          'name' => $user->name,
          'email' => $email,
          'user_email' => $user->email,
          'password' => $password
        ];
        if($this->moderatorModel->changeUserPassword($data_user)){
          if($this->moderatorModel->sendPasswordEmail($data_email)){
            $this->moderatorModel->updateRecoverRequest($req_id, 'Accepted');
            $log_data = [
              'user_type' => 'Moderator',
              'user_id' => $_SESSION['moderator_id'],
              'log_type' => 'Manage Recover Requests',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => 'Moderator accepted recover request '.$req_id.' and changed password for user '.$id
            ];
            $this->moderatorModel->addLogData($log_data);
            redirect('moderators/pendingrecoverrequests');
          } else {
            $log_data = [
              'user_type' => 'Moderator',
              'user_id' => $_SESSION['moderator_id'],
              'log_type' => 'Manage Recover Requests',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => 'Moderator accepted recover request '.$req_id.' but failed to send password email to user '.$id
            ];
            $this->moderatorModel->addLogData($log_data);
            die('Something went wrong while sending email');
          }
        } else {
          $log_data = [
            'user_type' => 'Moderator',
            'user_id' => $_SESSION['moderator_id'],
            'log_type' => 'Manage Recover Requests',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Moderator accepted recover request '.$req_id.' but failed to change password for the user '.$id
          ];
          $this->moderatorModel->addLogData($log_data);
          die('Something went wrong');
        }
    }

    public function rejectRecoverRequest($id, $encodedReason){
      $decodeddReason = str_replace('_', ' ', $encodedReason);
      $request_data = $this->moderatorModel->getRecoverRequest($id);
      $email_data = [
        'name' => $request_data->user_name,
        'email' => $request_data->email,
        'reason' => $decodeddReason
      ];
      if($this->moderatorModel->updateRecoverRequest($id, 'Rejected')){
        $this->moderatorModel->sendRecoverRejectionEmail($email_data);
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Manage Recover Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator rejected recover request '.$id .' with reason '.$decodeddReason
        ];
        $this->moderatorModel->addLogData($log_data);
        redirect('moderators/pendingrecoverrequests');
      } else {
        die('Something went wrong');
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
          $log_data = [
            'user_type' => 'Moderator',
            'user_id' => $_SESSION['moderator_id'],
            'log_type' => 'View Product',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Moderator tried to view a product that does not exist'
          ];
            die('Item Not Found!');
        }
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Product',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed product '.$product_id.' details of type '.$type
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewitem', $data);
    }

    public function viewActiveUser(){
      $users = $this->moderatorModel->getUsers();
      $data = [
        'users' => $users,
        'status' => 'Active'
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Users',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed active users'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewuser', $data);
    }

    public function viewBannedUser(){
      $users = $this->moderatorModel->getBannedUsers();
      $data = [
        'users' => $users,
        'status' => 'Banned'
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Users',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed banned users'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewuser', $data);
    }

    public function viewDeactivatedUser(){
      $users = $this->moderatorModel->getDeactivatedUsers();
      $data = [
        'users' => $users,
        'status' => 'Deactivated'
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Users',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed deactivated users'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewuser', $data);
    }

    public function viewActiveSP(){
      $serviceproviders = $this->moderatorModel->getServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Active'
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed active service providers'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewserviceprovider', $data);
    }

    public function viewRejectedSP(){
      $serviceproviders = $this->moderatorModel->getRejectedServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Rejected'
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed rejected service providers'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewserviceprovider', $data);
    }

    public function viewDeactivatedSP(){
      $serviceproviders = $this->moderatorModel->getDeactivatedServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Deactivated'
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed deactivated service providers'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewserviceprovider', $data);
    }

    public function viewBannedSP(){
      $serviceproviders = $this->moderatorModel->getBannedServiceProviders();
      $data = [
        'serviceproviders' => $serviceproviders,
        'status' => 'Banned'
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed banned service providers'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewserviceprovider', $data);
    }

    public function deleteuser($id){
      if($this->moderatorModel->deleteUser($id)){
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Delete User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator deleted user '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        redirect('moderators/viewuser');
      } else {
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Delete User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator failed to delete user '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function pendingrequest(){
      $pending = $this->moderatorModel->getPendingRequests();
      $data = [
        'pending' => $pending
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'Manage Service Provider Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed pending service provider requests'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/pendingrequest', $data);
    }

    public function viewPendingRequest($id){
      $request = $this->moderatorModel->getSP($id);
      $data = [
        'request' => $request
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'Manage Service Provider Requests',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed pending service provider request '.$id.' details'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewpendingrequest', $data);
    }

    public function viewserviceprovider($id){
      $serviceprovider = $this->moderatorModel->getSP($id);
      $data = [
        'request' => $serviceprovider
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'Manage Service Providers',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed service provider '.$id.' details'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewsp', $data);
    }

    public function viewuser($id){
      $user = $this->moderatorModel->getUser($id);
      $data = [
        'request' => $user
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'Manage Users',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed user '.$id.' details'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewuser_single', $data);
    }

    public function banuser($id, $encodedReason){
      $decodedReason = str_replace('_', ' ', $encodedReason);
      $user = $this->moderatorModel->getUser($id);
      if($this->moderatorModel->banUser($id)){
        $this->moderatorModel->sendBanUserEmail($user->email, $user->name , $decodedReason);
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Ban User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator banned user '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        redirect('moderators/viewBannedUser/');
      } else {
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Ban User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator failed to ban user '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function banserviceprovider($id, $encodedReason){
      $decodeddReason = str_replace('_', ' ', $encodedReason);
      $sp = $this->moderatorModel->getSP($id);
      if($this->moderatorModel->banServiceProvider($id)){
        $this->moderatorModel->sendBanSPEmail($sp->business_email, $sp->business_name, $decodeddReason);
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Ban Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator banned service provider '.$id .' with reason '.$decodeddReason
        ];
        $this->moderatorModel->addLogData($log_data);
        redirect('moderators/viewBannedSP');
      } else {
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Ban Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator failed to ban service provider '.$id .' with reason '.$decodeddReason
        ];
        $this->moderatorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function unbanserviceprovider($id){
      $sp = $this->moderatorModel->getSP($id);
      $email_data = [
        'name' => $sp->business_name,
        'email' => $sp->business_email
      ];
      if($this->moderatorModel->unbanServiceProvider($id)){
        $this->moderatorModel->sendUnbanSPEmail($email_data);
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Unban Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator lifted the ban on service provider '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        redirect('moderators/viewActiveSP');
      } else {
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Unban Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator failed to lift the ban on service provider '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function unbanuser($id){
      $user = $this->moderatorModel->getUser($id);
      $email_data = [
        'name' => $user->name,
        'email' => $user->email
      ];
      if($this->moderatorModel->unbanUser($id)){
        $this->moderatorModel->sendUnbanUserEmail($email_data);
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Unban User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator lifted the ban on user '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        redirect('moderators/viewActiveUser');
      } else {
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Unban User',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator failed to lift the ban on user '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function acceptServiceProvider($id){
      if($this->moderatorModel->acceptSP($id)){
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Manage Service Provider Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator accepted service provider request '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        $notification_data = [
          'user_type' => 'ServiceProvider',
          'user_id' => $id,
          'date_time' => date('Y-m-d H:i:s'),
          'data' => 'Your account has been approved by the moderator with ID '.$_SESSION['moderator_id'],
          'status' => 'Unread'
        ];
        $this->moderatorModel->addNotification($notification_data);
        redirect('moderators/pendingrequest');
      } else {
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Manage Service Provider Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator failed to accept service provider request '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function rejectServiceProvider($id){
      if($this->moderatorModel->rejectSP($id)){
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Manage Service Provider Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator rejected service provider request '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        redirect('moderators/pendingrequest');
      } else {
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Manage Service Provider Requests',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator failed to reject service provider request '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        die('Something went wrong');
      }
    }

    public function viewUserOrders($id){
      $order = $this->moderatorModel->viewUserOrders($id);
      $data = [
        'order' => $order,
        'user_id' => $id
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View User Orders',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed user '.$id.' orders'
      ];
      $this->moderatorModel->addLogData($log_data);
      $this->view('moderators/viewuserorders', $data);
    }

    public function viewSPOrders($id){
      $order = $this->moderatorModel->viewSPOrders($id);
      $data = [
        'order' => $order,
        'sp_id' => $id
      ];
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Service Provider Orders',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed service provider '.$id.' orders'
      ];
      $this->moderatorModel->addLogData($log_data);
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
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View User Order',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed order '.$id.' details'
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
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'View Servive Provider Order',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator viewed suborder '.$id.' details'
      ];
      $this->view('moderators/viewsporder', $data);
    }

    public function pendinginquiries()
    {
        $inquiries_pending = $this->moderatorModel->getPendingInquiries();
        $data = [
            'pending' => $inquiries_pending,
        ];
        $log_data = [
            'user_type' => 'Moderator',
            'user_id' => $_SESSION['moderator_id'],
            'log_type' => 'View Inquiries',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Moderator viewed pending inquiries'
        ];
        $this->moderatorModel->addLogData($log_data);
        $this->view('moderators/pendinginquiries', $data);
    }

    public function activeinquiries()
    {
        $inquiries_active = $this->moderatorModel->getActiveInquiries($_SESSION['moderator_id']);
        $data = [
            'active' => $inquiries_active,
        ];
        $log_data = [
            'user_type' => 'Moderator',
            'user_id' => $_SESSION['moderator_id'],
            'log_type' => 'View Inquiries',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Moderator viewed active inquiries'
        ];
        $this->moderatorModel->addLogData($log_data);
        $this->view('moderators/activeinquiries', $data);
    }

    public function completedinquiries()
    {
        $inquiries_completed = $this->moderatorModel->getCompletedInquiries($_SESSION['moderator_id']);
        $data = [
            'completed' => $inquiries_completed,
        ];
        $log_data = [
            'user_type' => 'Moderator',
            'user_id' => $_SESSION['moderator_id'],
            'log_type' => 'View Inquiries',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Moderator viewed completed inquiries'
        ];
        $this->moderatorModel->addLogData($log_data);
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
          $log_data = [
              'user_type' => 'Moderator',
              'user_id' => $_SESSION['moderator_id'],
              'log_type' => 'View Inquiry',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => 'Moderator viewed pending inquiry '.$inquiry_id.' details'
          ];
          $this->moderatorModel->addLogData($log_data);
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
            $log_data = [
                'user_type' => 'Moderator',
                'user_id' => $_SESSION['moderator_id'],
                'log_type' => 'View Inquiry',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Moderator viewed inquiry '.$inquiry_id.' details'
            ];
            $this->moderatorModel->addLogData($log_data);
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
        $log_data = [
            'user_type' => 'Moderator',
            'user_id' => $_SESSION['moderator_id'],
            'log_type' => 'Send Message',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Moderator sent a message to user '.$id.' regarding inquiry '.$inquiry_id
        ];
        $this->moderatorModel->addLogData($log_data);
        $notification_data = [
          'user_type' => 'User',
          'user_id' => $id,
          'date_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator sent a message to you regarding inquiry '.$inquiry_id,
          'status' => 'Unread'
        ];
        $this->moderatorModel->addNotification($notification_data);
          redirect('moderators/viewInquiry/'.$inquiry_id.'');
      } else {
        $log_data = [
            'user_type' => 'Moderator',
            'user_id' => $_SESSION['moderator_id'],
            'log_type' => 'Send Message',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Moderator failed to send a message to user '.$id.' regarding inquiry '.$inquiry_id
        ];
        $this->moderatorModel->addLogData($log_data);
          die('Something went wrong in sending message');
      }
  }

    public function approveInquiry($inquiry_id){
        if($this->moderatorModel->approveInquiry($inquiry_id, $_SESSION['moderator_id'])){
          $log_data = [
              'user_type' => 'Moderator',
              'user_id' => $_SESSION['moderator_id'],
              'log_type' => 'Approve Inquiry',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => "Moderator approved inquiry $inquiry_id and assign to self"
          ];
          $this->moderatorModel->addLogData($log_data);
          $notification_data = [
            'user_type' => 'User',
            'user_id' => $this->moderatorModel->getInquiry($inquiry_id)->user_id,
            'date_time' => date('Y-m-d H:i:s'),
            'data' => 'Moderator with ID '.$_SESSION['moderator_id'].' has accepted your inquiry and will be assisting you',
            'status' => 'Unread'
          ];
          $this->moderatorModel->addNotification($notification_data);
            redirect('moderators/pendinginquiries');
        } else {
          $log_data = [
              'user_type' => 'Moderator',
              'user_id' => $_SESSION['moderator_id'],
              'log_type' => 'Approve Inquiry',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => "Moderator failed to approve inquiry $inquiry_id and assign to self"
          ];
          $this->moderatorModel->addLogData($log_data);
            die('Something went wrong');
        }
    }

    public function completeInquiry($inquiry_id){
        if($this->moderatorModel->completeInquiry($inquiry_id)){
          $log_data = [
              'user_type' => 'Moderator',
              'user_id' => $_SESSION['moderator_id'],
              'log_type' => 'Complete Inquiry',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => 'Moderator completed inquiry '.$inquiry_id
          ];
          $this->moderatorModel->addLogData($log_data);
          $notification_data = [
            'user_type' => 'User',
            'user_id' => $this->moderatorModel->getInquiry($inquiry_id)->user_id,
            'date_time' => date('Y-m-d H:i:s'),
            'data' => 'Moderator with ID '.$_SESSION['moderator_id'].' has marked your inquiry as completed',
            'status' => 'Unread'
          ];
          $this->moderatorModel->addNotification($notification_data);
            redirect('moderators/activeinquiries');
        } else {
          $log_data = [
              'user_type' => 'Moderator',
              'user_id' => $_SESSION['moderator_id'],
              'log_type' => 'Complete Inquiry',
              'date_and_time' => date('Y-m-d H:i:s'),
              'data' => "Moderator failed to mark the inquiry $inquiry_id as completed"
          ];
          $this->moderatorModel->addLogData($log_data);
            die('Something went wrong in completing inquiry');
        }
    }

    public function deleteserviceprovider($id){
      if($this->moderatorModel->deleteServiceProvider($id)){
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Delete Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator deleted service provider '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        redirect('moderators/viewserviceprovider');
      } else {
        $log_data = [
          'user_type' => 'Moderator',
          'user_id' => $_SESSION['moderator_id'],
          'log_type' => 'Delete Service Provider',
          'date_and_time' => date('Y-m-d H:i:s'),
          'data' => 'Moderator failed to delete service provider '.$id
        ];
        $this->moderatorModel->addLogData($log_data);
        die('Something went wrong in deleting service provider');
      }
    }

    public function viewInventory($sp_id){
      $mod = $this->moderatorModel->view($_SESSION['moderator_id']);
      $sp = $this->moderatorModel->getSP($sp_id);
      $equipment = $this->moderatorModel->getEquipmentSP($sp_id);
      $studio = $this->moderatorModel->getStudioSP($sp_id);
      $band = $this->moderatorModel->getBandSP($sp_id);
      $singer = $this->moderatorModel->getSingerSP($sp_id);
      $musician = $this->moderatorModel->getMusicianSP($sp_id);
      $data = [
        'admin_data' => $mod,
        'sp' => $sp,
        'equipment' => $equipment,
        'studio' => $studio,
        'band' => $band,
        'singer' => $singer,
        'musician' => $musician
      ];
      $this->view('moderators/viewinventory', $data);
    }

    public function createmoderatorSession($moderator){
      
      $_SESSION['moderator_id'] = $moderator->moderator_id;
      $_SESSION['moderator_email'] = $moderator->moderator_email;
      $_SESSION['moderator_name'] = $moderator->moderator_name;
      redirect('moderators/index');
      
    }

    public function logout(){
      $log_data = [
        'user_type' => 'Moderator',
        'user_id' => $_SESSION['moderator_id'],
        'log_type' => 'Logout',
        'date_and_time' => date('Y-m-d H:i:s'),
        'data' => 'Moderator logged out'
      ];
      $this->moderatorModel->addLogData($log_data);
      unset($_SESSION['moderator_id']);
      unset($_SESSION['moderator_email']);
      unset($_SESSION['moderator_name']);
      session_destroy();
      redirect('moderators/login');
    }
}