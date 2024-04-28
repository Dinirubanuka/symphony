<?php

class serviceproviders extends Controller
{
    private $serviceProviderModel;

    public function __construct()
    {
        $this->serviceProviderModel = $this->model('serviceprovider');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        isset($_SESSION['serviceprovider_id']) ? $this->view('serviceproviders/index') : $this->view('serviceproviders/error');
        
    }

    public function error()
    {
        $this->view('serviceproviders/error');
    }
    //view profile
    public function profile()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $serviceprovider = $this->serviceProviderModel->view($_SESSION['serviceprovider_id']);
        $data = [
            'business_name' => $serviceprovider->business_name,
            'business_email' => $serviceprovider->business_email,
            'business_contact_no' => $serviceprovider->business_contact_no,
            'business_address' => $serviceprovider->business_address,
            'owner_name' => $serviceprovider->owner_name,
            'owner_email' => $serviceprovider->owner_email,
            'owner_contact_no' => $serviceprovider->owner_contact_no,
            'owner_address' => $serviceprovider->owner_address,
            'about' => $serviceprovider->about,
            'photo' => $serviceprovider->profile_photo
        ];
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Profile',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their profile'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        $this->view('serviceproviders/profile', $data);
    }

    public function inventory()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->inventory($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Equipment Inventory'
        ];
        $this->view('serviceproviders/inventory', $data);
    }

    public function inventoryDelete()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $inventory = $this->serviceProviderModel->inventory($_SESSION['serviceprovider_id']);
            $notifications = $this->serviceProviderModel->getNotifications($_SESSION['serviceprovider_id'], date('Y-m-d H:i:s'));
            $count = count($notifications);
            $data = [
                'inventory' => $inventory,
                'notifications' => $notifications,
                'count' => $count
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function fetchSingers()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $inventory = $this->serviceProviderModel->singer($_SESSION['serviceprovider_id']);
            $notifications = $this->serviceProviderModel->getNotifications($_SESSION['serviceprovider_id'], date('Y-m-d H:i:s'));
            $count = count($notifications);
            $data = [
                'inventory' => $inventory,
                'notifications' => $notifications,
                'count' => $count
            ];
        }
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Singer Inventory'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function fetchStudio()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $inventory = $this->serviceProviderModel->studio($_SESSION['serviceprovider_id']);
            $notifications = $this->serviceProviderModel->getNotifications($_SESSION['serviceprovider_id'], date('Y-m-d H:i:s'));
            $count = count($notifications);
            $data = [
                'inventory' => $inventory,
                'notifications' => $notifications,
                'count' => $count
            ];
        }
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Studio Inventory'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function fetchBand()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $inventory = $this->serviceProviderModel->band($_SESSION['serviceprovider_id']);
            $notifications = $this->serviceProviderModel->getNotifications($_SESSION['serviceprovider_id'], date('Y-m-d H:i:s'));
            $count = count($notifications);
            $data = [
                'inventory' => $inventory,
                'notifications' => $notifications,
                'count' => $count
            ];
        }
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Band Inventory'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();

    }

    public function fetchmusicians()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $inventory = $this->serviceProviderModel->musician($_SESSION['serviceprovider_id']);
            $notifications = $this->serviceProviderModel->getNotifications($_SESSION['serviceprovider_id'], date('Y-m-d H:i:s'));
            $count = count($notifications);
            $data = [
                'inventory' => $inventory,
                'notifications' => $notifications,
                'count' => $count
            ];
        }
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Musician Inventory'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();

    }

    public function addMusicians()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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

            $img4_name = $_FILES['singer_photo']['name'];
            $img4_size = $_FILES['singer_photo']['size'];
            $tmp4_name = $_FILES['singer_photo']['tmp_name'];
            $error4 = $_FILES['singer_photo']['error'];

            if ($error1 === UPLOAD_ERR_NO_FILE) {
                $new_img1_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img1_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img1_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img1_name;
                $bool = move_uploaded_file($tmp1_name, $img_upload_path);
            }

            if ($error2 === UPLOAD_ERR_NO_FILE) {
                $new_img2_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img2_name;
                $bool = move_uploaded_file($tmp2_name, $img_upload_path);
            }

            if ($error3 === UPLOAD_ERR_NO_FILE) {
                $new_img3_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img3_name;
                $bool = move_uploaded_file($tmp3_name, $img_upload_path);
            }

            if ($error4 === UPLOAD_ERR_NO_FILE) {
                $new_img4_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img4_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img4_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img4_name;
                $bool = move_uploaded_file($tmp4_name, $img_upload_path);
            }

            // Init data
            $data = [
                'name' => trim($_POST['singerName']),
                'NickName' => trim($_POST['singerNickName']),
                'telephoneNumber' => trim($_POST['number']),
                'email' => trim($_POST['email']),
                'rate' => trim($_POST['rate']),
                'instrument' => $_SESSION['instrumentList'],
                'location' => $_SESSION['locationList'],
                'videoLink' => trim($_POST['video']),
                'description' => trim($_POST['description']),
                'photo_1' => $new_img1_name,
                'photo_2' => $new_img2_name,
                'photo_3' => $new_img3_name,
                'singer_photo' => $new_img4_name,
                'name_err' => '',
                'rate_err' => '',
                'description_err' => '',
                'telephoneNumber_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Name cannot be empty!';
            }

            if (empty($data['rate'])) {
                $data['rate_err'] = 'Please enter your rate!';
            }

            if (empty($data['telephoneNumber'])) {
                $data['telephoneNumber_err'] = 'Please enter the contact number!';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter the description.';
            }
            if (empty($data['name_err']) && empty($data['rate_err']) && empty($data['description_err']) && empty($data['telephoneNumber_err'])) {
                if ($this->serviceProviderModel->addMusician($data)) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Add Musician',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has added a new Musician to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    $notification_data = [
                        'user_type' => 'ServiceProvider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'data' => 'You have successfully added a new Musician to your inventory',
                        'date_time' => date('Y-m-d H:i:s'),
                        'status' => 'Unread'    
                    ];
                    $this->serviceProviderModel->addNotification($notification_data);
                    redirect('serviceproviders/musicians');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to add a new Musician to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong');
                }
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to provide the required information to add a new Musician to their inventory'
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/addMusicians', $data);
            }

        } else {
            $data = [
                'name' => '',
                'NickName' => '',
                'telephoneNumber' => '',
                'email' => '',
                'rate' => '',
                'instrument' => '',
                'location' => '',
                'videoLink' => '',
                'description' => '',
                'photo_1' => '',
                'photo_2' => '',
                'photo_3' => '',
                'singer_photo' => '',
                'name_err' => '',
                'rate_err' => '',
                'description_err' => '',
                'telephoneNumber_err' => ''
            ];

            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Manage Inventory',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has viewed the page to add a new Musician to their inventory'
            ];
            $this->serviceProviderModel->addLogData($log_data);
            // Load view
            $this->view('serviceproviders/addMusician', $data);
        }
    }

    public function musicians()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->musician($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Musician Inventory'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        $this->view('serviceproviders/musician');
    }


    public function viewMusicians($product_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $singerDetails = $this->serviceProviderModel->viewMusicians($product_id);
            if ($singerDetails) {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'View Musician',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has viewed the details of a Musician with th ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/viewMusicians', $singerDetails);
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'View Musician',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to view the details of a Musician with th ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                die('failed to fetch singer details either the singer does not exist or the id is wrong');
            }
        }
    }

    public function updateMusicians($id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
//        $singerPhoto = $this->serviceProviderModel->fetchSingerPhoto($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_FILES['photo_4']['name'])) {
                $img4_name = $_FILES['photo_4']['name'];
                $img4_size = $_FILES['photo_4']['size'];
                $tmp4_name = $_FILES['photo_4']['tmp_name'];
                $error4 = $_FILES['photo_4']['error'];

                if ($error4 === UPLOAD_ERR_NO_FILE) {
                    $new_img4_name = 'IMG-656bdc23223334.62765635.png';
                } else {
                    $img_ex = pathinfo($img4_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $new_img4_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img4_name;
                    $bool = move_uploaded_file($tmp4_name, $img_upload_path);
                }

                $data = [
                    'singerPhoto' => $new_img4_name
                ];

                $this->serviceProviderModel->editSingerPhoto($id, $data);

                $data = [
                    'product_id' => $id,
                    'name' => trim($_POST['singerName']),
                    'NickName' => trim($_POST['singerNickName']),
                    'telephoneNumber' => trim($_POST['number']),
                    'email' => trim($_POST['email']),
                    'rate' => trim($_POST['rate']),
                    'instrument' => $_SESSION['instrumentList'],
                    'location' => $_SESSION['locationList'],
                    'videoLink' => trim($_POST['videoLink']),
                    'description' => trim($_POST['description']),
                ];

                if (!empty($data['name']) && !empty($data['NickName']) && !empty($data['telephoneNumber']) && !empty($data['email']) && !empty($data['rate']) && !empty($data['videoLink']) && !empty($data['description'])) {
                    if ($this->serviceProviderModel->updateSinger($data)) {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has updated the details of a Musician with th ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                    } else {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has failed to update the details of a Musician with th ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        die('Something went wrong while updating the singer details');
                    }
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to provide the required information to update the details of a Musician with th ID ' . $id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    redirect('serviceproviders/viewMusicians/' . $id);
                }
            } else {
                $data = [
                    'product_id' => $id,
                    'name' => trim($_POST['singerName']),
                    'NickName' => trim($_POST['singerNickName']),
                    'telephoneNumber' => trim($_POST['number']),
                    'email' => trim($_POST['email']),
                    'rate' => trim($_POST['rate']),
                    'instrument' => $_SESSION['instrumentList'],
                    'location' => $_SESSION['locationList'],
                    'videoLink' => trim($_POST['videoLink']),
                    'description' => trim($_POST['description']),
                ];

                if (!empty($data['name']) && !empty($data['NickName']) && !empty($data['telephoneNumber']) && !empty($data['email']) && !empty($data['rate']) && !empty($data['videoLink']) && !empty($data['description'])) {
                    if ($this->serviceProviderModel->updateMusicians($data)) {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has updated the details of a Musician with th ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        $notification_data = [
                            'user_type' => 'ServiceProvider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'data' => 'You have successfully updated the details of a Musician in your inventory',
                            'date_time' => date('Y-m-d H:i:s'),
                            'status' => 'Unread'    
                        ];
                        $this->serviceProviderModel->addNotification($notification_data);
                        redirect('serviceproviders/viewMusicians/' . $id);
                    } else {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has failed to update the details of a Musician with th ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        die('Something went wrong while updating the singer details');
                    }
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to provide the required information to update the details of a Musician with th ID ' . $id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    redirect('serviceproviders/viewMusicians/' . $id);
                }
            }
        } else {
            redirect('serviceproviders/musicians');
        }
    }
    
    public function deleteBand($product_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $hasitemorders = $this->serviceProviderModel->hasitemorders($product_id, 'Band');
        if ($hasitemorders) {
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Manage Inventory',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has failed to delete a Band with the ID ' . $product_id . ' because it has been ordered by a customer'
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $notification_data = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You cannot delete a Band that has been ordered by a customer',
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data);
            redirect('serviceproviders/band');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->serviceProviderModel->deleteBand($product_id);
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has deleted a Band with the ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $notification_data = [
                    'user_type' => 'ServiceProvider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'data' => 'You have successfully deleted a Band from your inventory',
                    'date_time' => date('Y-m-d H:i:s'),
                    'status' => 'Unread'    
                ];
                $this->serviceProviderModel->addNotification($notification_data);
                redirect('serviceproviders/band');
            } else {
                redirect('serviceproviders/band');
            }
        }
    }

    public function viewBand($product_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $singerDetails = $this->serviceProviderModel->viewBand($product_id);
            if ($singerDetails) {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has viewed the details of a Band with the ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/viewBand', $singerDetails);
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to view the details of a Band with the ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                die('failed to fetch band details either the band does not exist or the id is wrong');
            }
        }
    }

    public function updateBand($id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
//        $singerPhoto = $this->serviceProviderModel->fetchSingerPhoto($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_FILES['photo_4']['name'])) {
                $img4_name = $_FILES['photo_4']['name'];
                $img4_size = $_FILES['photo_4']['size'];
                $tmp4_name = $_FILES['photo_4']['tmp_name'];
                $error4 = $_FILES['photo_4']['error'];

                if ($error4 === UPLOAD_ERR_NO_FILE) {
                    $new_img4_name = 'IMG-656bdc23223334.62765635.png';
                } else {
                    $img_ex = pathinfo($img4_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $new_img4_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img4_name;
                    $bool = move_uploaded_file($tmp4_name, $img_upload_path);
                }

                $data = [
                    'bandPhoto' => $new_img4_name
                ];

                $this->serviceProviderModel->editBandPhoto($id, $data);

                $data = [
                    'name' => trim($_POST['bandName']),
                    'leaderName' => trim($_POST['leaderName']),
                    'memCount' => trim($_POST['memCount']),
                    'telephoneNumber' => trim($_POST['number']),
                    'email' => trim($_POST['email']),
                    'rate' => trim($_POST['rate']),
                    'instrument' => $_SESSION['instrumentList'],
                    'location' => $_SESSION['locationList'],
                    'videoLink' => trim($_POST['videoLink']),
                    'description' => trim($_POST['description']),
                ];


                if (!empty($data['name']) && !empty($data['leaderName']) && !empty($data['telephoneNumber']) && !empty($data['email']) && !empty($data['rate']) && !empty($data['videoLink']) && !empty($data['description'])) {
                    if ($this->serviceProviderModel->updateBand($data)) {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has updated the details of a Band with th ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        $notification_data = [
                            'user_type' => 'ServiceProvider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'data' => 'You have successfully updated the details of a Band in your inventory',
                            'date_time' => date('Y-m-d H:i:s'),
                            'status' => 'Unread'    
                        ];
                        $this->serviceProviderModel->addNotification($notification_data);
                        redirect('serviceproviders/viewBand/' . $id);
                    } else {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has failed to update the details of a Band with th ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        die('Something went wrong while updating the band details');
                    }
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to provide the required information to update the details of a Band with th ID ' . $id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    redirect('serviceproviders/viewBand/' . $id);
                }
            } else {

                $data = [
                    'product_id' => $id,
                    'name' => trim($_POST['bandName']),
                    'leaderName' => trim($_POST['leaderName']),
                    'memCount' => trim($_POST['memCount']),
                    'telephoneNumber' => trim($_POST['number']),
                    'email' => trim($_POST['email']),
                    'rate' => trim($_POST['rate']),
                    'instrument' => $_SESSION['instrumentList'],
                    'location' => $_SESSION['locationList'],
                    'videoLink' => trim($_POST['videoLink']),
                    'description' => trim($_POST['description']),
                ];


                if (!empty($data['name']) && !empty($data['leaderName']) && !empty($data['telephoneNumber']) && !empty($data['email']) && !empty($data['rate']) && !empty($data['videoLink']) && !empty($data['description'])) {
                    if ($this->serviceProviderModel->updateBand($data)) {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has updated the details of a Band with th ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        redirect('serviceproviders/viewBand/' . $id);
                    } else {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has failed to update the details of a Band with th ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        die('Something went wrong while updating the band details');
                    }
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to provide the required information to update the details of a Band with th ID ' . $id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    redirect('serviceproviders/viewBand/' . $id);
                }
            }
        } else {
            redirect('serviceproviders/viewBand');
        }
    }

    //thumbnail category
    public function inventoryAll()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->inventory($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function electricGuitars()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->electricGuitars($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
//                $this->view('serviceproviders/inventory',$data);
    }

    public function keyboard()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->keyboard($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
//                $this->view('serviceproviders/inventory',$data);
    }

    public function acousticGuitars()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->acousticGuitars($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
//                $this->view('serviceproviders/inventory',$data);
    }

    public function amps()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->amps($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
//                $this->view('serviceproviders/inventory',$data);
    }

    public function bassGuitars()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->bassGuitars($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
//                $this->view('serviceproviders/inventory',$data);
    }

    public function bandAndOrchestra()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->bandAndOrchestra($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
//                $this->view('serviceproviders/inventory',$data);
    }

    public function homeAudio()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->homeAudio($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
//                $this->view('serviceproviders/inventory',$data);
    }

    public function profilePhotoUpdate()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
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

                if ($this->serviceProviderModel->photoUpdate($new_img_name)) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has updated their profile photo to the default photo'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    redirect('serviceproviders/profile');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to update their profile photo to the default photo'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong while updating the profile photo to the default photo');
                }
            } else {

                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/mag_img/' . $new_img_name;
                $bool = move_uploaded_file($tmp_name, $img_upload_path);

                if ($this->serviceProviderModel->photoUpdate($new_img_name)) {
                    // flash('register_success', 'You are registered and can log in');
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has updated their profile photo'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    redirect('serviceproviders/profile');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to update their profile photo'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong while updating the profile photo');
                }
            }

        }
    }

    public function editDetail($serviceprovider_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $serviceprovider = $this->serviceProviderModel->view($_SESSION['serviceprovider_id']);
            $data = [
                'business_name' => $serviceprovider->business_name,
                'business_address' => $serviceprovider->business_address,
                'business_contact_no' => $serviceprovider->business_contact_no,
                'business_email' => $serviceprovider->business_email,
                'owner_name' => $serviceprovider->owner_name,
                'owner_address' => $serviceprovider->owner_address,
                'owner_contact_no' => $serviceprovider->owner_contact_no,
                'owner_email' => $serviceprovider->owner_email,
                'about' => $serviceprovider->about,
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
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Manage Profile',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has viewed the page to edit their details'
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $this->view('serviceproviders/edit', $data);
        } else {
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Manage Profile',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has viewed the page to edit their details'
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $this->view('serviceproviders/edit', $data);
        }
    }

    public function edititem($product_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $img1_name = $_FILES['photo_1-' . $product_id]['name'];
            $img1_size = $_FILES['photo_1-' . $product_id]['size'];
            $tmp1_name = $_FILES['photo_1-' . $product_id]['tmp_name'];
            $error1 = $_FILES['photo_1-' . $product_id]['error'];

            $img2_name = $_FILES['photo_2-' . $product_id]['name'];
            $img2_size = $_FILES['photo_2-' . $product_id]['size'];
            $tmp2_name = $_FILES['photo_2-' . $product_id]['tmp_name'];
            $error2 = $_FILES['photo_2-' . $product_id]['error'];

            $img3_name = $_FILES['photo_3-' . $product_id]['name'];
            $img3_size = $_FILES['photo_3-' . $product_id]['size'];
            $tmp3_name = $_FILES['photo_3-' . $product_id]['tmp_name'];
            $error3 = $_FILES['photo_3-' . $product_id]['error'];

            if ($error1 === UPLOAD_ERR_NO_FILE) {
                $new_img1_name = 'IMG-653fd611dd2445.48951448.png';
            } else {
                $img_ex = pathinfo($img1_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img1_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img1_name;
                $bool = move_uploaded_file($tmp1_name, $img_upload_path);

                $data = [
                    'photo_1' => $new_img1_name
                ];

                $this->serviceProviderModel->editPhoto($product_id, $data, 'photo_1');
            }

            if ($error2 === UPLOAD_ERR_NO_FILE) {
                $new_img2_name = 'IMG-6560baec22ff65.10062636.png';
            } else {
                $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img2_name;
                $bool = move_uploaded_file($tmp2_name, $img_upload_path);

                $data = [
                    'photo_2' => $new_img2_name
                ];
                $this->serviceProviderModel->editPhoto($product_id, $data, 'photo_2');
            }

            if ($error3 === UPLOAD_ERR_NO_FILE) {
                $new_img3_name = 'IMG-6560baec22ff65.10062636.png';
            } else {
                $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img3_name;
                $bool = move_uploaded_file($tmp3_name, $img_upload_path);

                $data = [
                    'photo_3' => $new_img3_name
                ];
                $this->serviceProviderModel->editPhoto($product_id, $data, 'photo_3');
            }

            // Init data
            $data = [
                'title' => trim($_POST['title']),
                'created_by' => $_SESSION['serviceprovider_id'],
                'category' => trim($_POST['category']),
                'brand' => trim($_POST['brand']),
                'model' => trim($_POST['model']),
                'quantity' => trim($_POST['quantity']),
                'unit_price' => trim($_POST['unit_price']),
                'description' => trim($_POST['description']),
                'outOfStock' => trim($_POST['availabilty']),
                'warranty' => trim($_POST['warranty']),
                'created_by_err' => '',
                'category_err' => '',
                'brand_err' => '',
                'model_err' => '',
                'quantity_err' => '',
                'unit_price_err' => '',
                'description_err' => ''
            ];
            var_dump(print_r($data));
//                select category
            $category = trim($_POST['category']);
            if ($category === 'Keyboard') {
                $keyboardCategory = trim($_POST['keyboard']);
                $data['category'] = $category . ' ' . $keyboardCategory;

            } else if ($category === 'Band_And_Orchestra') {
                $bandOrchestraCategories = trim($_POST['bandOrchestra']);
                if ($bandOrchestraCategories === 'Woodwind') {
                    $WoodwindCategories = trim($_POST['Woodwind']);
                    $data['category'] = $category . ' ' . $bandOrchestraCategories . ' ' . $WoodwindCategories;
                } else if ($bandOrchestraCategories === 'Brass') {
                    $brassCategories = trim($_POST['Brass']);
                    $data['category'] = $category . ' ' . $bandOrchestraCategories . ' ' . $brassCategories;
                } else if ($bandOrchestraCategories === 'String') {
                    $stringCategories = trim($_POST['string']);
                    $data['category'] = $category . ' ' . $bandOrchestraCategories . ' ' . $stringCategories;
                }

            } else if ($category === 'Audio') {
                $homeAudioCategory = trim($_POST['sounds']);
                $data['category'] = $category . ' ' . $homeAudioCategory;
            } else if ($category === 'Percussion') {
                $percussionCategory = trim($_POST['Percussion']);
                $data['category'] = $category . ' ' . $percussionCategory;
            }

            if (empty($data['title'])) {
                $data['title_err'] = 'Title cannot be empty!';
            }

            if (empty($data['category'])) {
                $data['category_err'] = 'Please select a category!';
            }

            if (empty($data['brand'])) {
                $data['brand_err'] = 'Please select a brand!';
            }

            if (empty($data['model'])) {
                $data['model_err'] = 'Please enter the item model!';
            }

            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter the quantity!';
            } else if ($data['quantity'] <= 0) {
                $data['quantity_err'] = 'Please enter a valid quantity!';
            }

            if (empty($data['unit_price'])) {
                $data['unit_price_err'] = 'Please enter the unit price!';
            } else if ($data['unit_price'] <= 0) {
                $data['unit_price_err'] = 'Please enter a valid unit price!';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter the item description!';
            }

            if (empty($data['category_err']) && empty($data['title_err']) && empty($data['brand_err']) && empty($data['model_err']) && empty($data['quantity_err']) && empty($data['unit_price_err']) && empty($data['description_err'])) {

                // Register serviceprovider
                if ($this->serviceProviderModel->editItem($product_id, $data)) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has updated the details of an item with the ID ' . $product_id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    $notification_data = [
                        'user_type' => 'ServiceProvider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'data' => 'You have successfully updated the details of an item in your inventory',
                        'date_time' => date('Y-m-d H:i:s'),
                        'status' => 'Unread'    
                    ];
                    $this->serviceProviderModel->addNotification($notification_data);
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/inventory');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to update the details of an item with the ID ' . $product_id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong while updating the item details');
                }
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to provide the required information to update the details of an item with the ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/additem', $data);
            }

        } else {
            // Init data
            $data = [
                'title' => '',
                'created_by' => '',
                'category' => '',
                'brand' => '',
                'model' => '',
                'quantiry' => '',
                'unit_price' => '',
                'description' => '',
                'created_by_err' => '',
                'category_err' => '',
                'brand_err' => '',
                'model_err' => '',
                'quantity_err' => '',
                'unit_price_err' => '',
                'description_err' => ''
            ];

            // Load view
            $this->view('serviceproviders/additem', $data);
        }
    }

    public function additem()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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

            if ($error1 === UPLOAD_ERR_NO_FILE) {
                $new_img1_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img1_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img1_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img1_name;
                $bool = move_uploaded_file($tmp1_name, $img_upload_path);
            }

            if ($error2 === UPLOAD_ERR_NO_FILE) {
                $new_img2_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img2_name;
                $bool = move_uploaded_file($tmp2_name, $img_upload_path);
            }

            if ($error3 === UPLOAD_ERR_NO_FILE) {
                $new_img3_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img3_name;
                $bool = move_uploaded_file($tmp3_name, $img_upload_path);
            }
            // Init data
            $data = [
                'title' => trim($_POST['title']),
                'created_by' => $_SESSION['serviceprovider_id'],
                'category' => trim($_POST['category']),
                'brand' => trim($_POST['brand']),
                'model' => trim($_POST['model']),
                'quantity' => trim($_POST['quantity']),
                'unit_price' => trim($_POST['unit_price']),
                'description' => trim($_POST['description']),
                'photo_1' => $new_img1_name,
                'photo_2' => $new_img2_name,
                'photo_3' => $new_img3_name,
                'outOfStock' => trim($_POST['availabilty']),
                'warranty' => trim($_POST['warranty']),
                'title_err' => '',
                'created_by_err' => '',
                'category_err' => '',
                'brand_err' => '',
                'model_err' => '',
                'quantity_err' => '',
                'unit_price_err' => '',
                'description_err' => ''
            ];

//            select category
            $category = trim($_POST['category']);
            if ($category === 'Electric_Guitars') {
                $data['category'] = 'Electric Guitars';
            } elseif ($category === 'Acoustic_Guitars') {
                $data['category'] = 'Acoustic Guitars';
            } else if ($category === 'Keyboard') {
                $keyboardCategory = trim($_POST['keyboard']);
                $data['category'] = $category . ' ' . $keyboardCategory;

            } else if ($category === 'Band_And_Orchestra') {
                $bandOrchestraCategories = trim($_POST['bandOrchestra']);
                if ($bandOrchestraCategories === 'Woodwind') {
                    $WoodwindCategories = trim($_POST['Woodwind']);
                    $data['category'] = $category . ' ' . $bandOrchestraCategories . ' ' . $WoodwindCategories;
                } else if ($bandOrchestraCategories === 'Brass') {
                    $brassCategories = trim($_POST['Brass']);
                    $data['category'] = $category . ' ' . $bandOrchestraCategories . ' ' . $brassCategories;
                } else if ($bandOrchestraCategories === 'String') {
                    $stringCategories = trim($_POST['string']);
                    $data['category'] = $category . ' ' . $bandOrchestraCategories . ' ' . $stringCategories;
                }

            } else if ($category === 'Audio') {
                $homeAudioCategory = trim($_POST['sounds']);
                $data['category'] = $category . ' ' . $homeAudioCategory;
            } else if ($category === 'Percussion') {
                $percussionCategory = trim($_POST['Percussion']);
                $data['category'] = $category . ' ' . $percussionCategory;
            }

            if (empty($data['title'])) {
                $data['title_err'] = 'Title cannot be empty!';
            }

            if (empty($data['category'])) {
                $data['category_err'] = 'Please select a category!';
            }

            if (empty($data['brand'])) {
                $data['brand_err'] = 'Please select a brand!';
            }

            if (empty($data['model'])) {
                $data['model_err'] = 'Please enter the item model!';
            }

            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter the quantity!';
            } else if ($data['quantity'] <= 0) {
                $data['quantity_err'] = 'Please enter a valid quantity!';
            }

            if (empty($data['unit_price'])) {
                $data['unit_price_err'] = 'Please enter the unit price!';
            } else if ($data['unit_price'] <= 0) {
                $data['unit_price_err'] = 'Please enter a valid unit price!';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter the item description!';
            }

            if (empty($data['category_err']) && empty($data['title_err']) && empty($data['brand_err']) && empty($data['model_err']) && empty($data['quantity_err']) && empty($data['unit_price_err']) && empty($data['description_err'])) {

                // Register serviceprovider
                if ($this->serviceProviderModel->additem($data)) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Add Instrument',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has added a new item to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    $notification_data = [
                        'user_type' => 'ServiceProvider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'data' => 'You have successfully added a new item to your inventory',
                        'date_time' => date('Y-m-d H:i:s'),
                        'status' => 'Unread'    
                    ];
                    $this->serviceProviderModel->addNotification($notification_data);
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/inventory');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to add a new item to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong while adding the item to the inventory');
                }
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to provide the required information to add a new item to their inventory'
                ];
                $this->serviceProviderModel->addLogData($log_data);
                // Load view with errors
                $this->view('serviceproviders/additem', $data);
            }

        } else {
            // Init data
            $data = [
                'title' => '',
                'created_by' => '',
                'category' => '',
                'brand' => '',
                'model' => '',
                'quantity' => '',
                'unit_price' => '',
                'description' => '',
                'photo_1' => '',
                'photo_2' => '',
                'photo_3' => '',
                'outOfStock' => '',
                'bandOrchestraCategories' => '',
                'homeAudioCategory' => '',
                'created_by_err' => '',
                'category_err' => '',
                'brand_err' => '',
                'model_err' => '',
                'quantity_err' => '',
                'unit_price_err' => '',
                'description_err' => ''
            ];

            // Load view
            $this->view('serviceproviders/additem', $data);
        }
    }

    public function deleteitem($product_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $hasitemorders = $this->serviceProviderModel->hasitemorders($product_id, 'Equipment');
        if ($hasitemorders) {
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Manage Inventory',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has failed to delete an item from their inventory with the ID ' . $product_id . ' because it has been ordered by a customer'
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $notification_data = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You cannot delete an item that has been ordered by a customer',
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data);
            redirect('serviceproviders/inventory');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->serviceProviderModel->deleteitem($product_id);
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has deleted an item from their inventory with the ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $notification_data = [
                    'user_type' => 'ServiceProvider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'data' => 'You have successfully deleted an item from your inventory',
                    'date_time' => date('Y-m-d H:i:s'),
                    'status' => 'Unread'    
                ];
                $this->serviceProviderModel->addNotification($notification_data);
                redirect('serviceproviders/inventory');
            } else {
                redirect('serviceproviders/inventory');
            }
        }
    }

    public function addStudio()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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

            if ($error1 === UPLOAD_ERR_NO_FILE) {
                $new_img1_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img1_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img1_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img1_name;
                $bool = move_uploaded_file($tmp1_name, $img_upload_path);
            }

            if ($error2 === UPLOAD_ERR_NO_FILE) {
                $new_img2_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img2_name;
                $bool = move_uploaded_file($tmp2_name, $img_upload_path);
            }

            if ($error3 === UPLOAD_ERR_NO_FILE) {
                $new_img3_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img3_name;
                $bool = move_uploaded_file($tmp3_name, $img_upload_path);
            }

            // Init data
            $data = [
                'name' => trim($_POST['StudioName']),
                'rate' => trim($_POST['rate']),
                'airCondition' => trim($_POST['airCondition']),
                'instrument' => $_SESSION['instrumentList'],
                'location' => $_SESSION['locationList'],
                'descriptionSounds' => trim($_POST['descriptionSounds']),
                'descriptionStudio' => trim($_POST['descriptionStudio']),
                'telephoneNumber' => trim($_POST['number']),
                'videoLink' => trim($_POST['video']),
                'photo_1' => $new_img1_name,
                'photo_2' => $new_img2_name,
                'photo_3' => $new_img3_name,
                'name_err' => '',
                'rate_err' => '',
                'descriptionSounds_err' => '',
                'descriptionStudio_err' => '',
                'telephoneNumber_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Name cannot be empty!';
            }

            if (empty($data['rate'])) {
                $data['rate_err'] = 'Please enter your rate!';
            }

            if (empty($data['descriptionSounds'])) {
                $data['descriptionSounds_err'] = 'Please enter the item description!';
            }

            if (empty($data['descriptionStudio'])) {
                $data['descriptionStudio_err'] = 'Please enter the studio description!';
            }

            if (empty($data['telephoneNumber'])) {
                $data['telephoneNumber_err'] = 'Please enter the contact number!';
            }

            if (empty($data['name_err']) && empty($data['rate_err']) && empty($data['descriptionSounds_err']) && empty($data['descriptionStudio_err']) && empty($data['telephoneNumber_err'])) {

                if ($this->serviceProviderModel->addStudio($data)) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Add Studio',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has added a new studio to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data); 
                    $notification_data = [
                        'user_type' => 'ServiceProvider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'data' => 'You have successfully added a new studio to your inventory',
                        'date_time' => date('Y-m-d H:i:s'),
                        'status' => 'Unread'    
                    ];
                    $this->serviceProviderModel->addNotification($notification_data);
                    redirect('serviceproviders/studio');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to add a new studio to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong while adding the studio to the inventory');
                }
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to provide the required information to add a new studio to their inventory'
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/addStudio', $data);
            }

        } else {
            $data = [
                'name' => '',
                'rate' => '',
                'airCondition' => '',
                'instrument' => '',
                'descriptionSounds' => '',
                'descriptionStudio' => '',
                'telephoneNumber' => '',
                'videoLink' => '',
                'photo_1' => '',
                'photo_2' => '',
                'photo_3' => ''
            ];

            // Load view
            $this->view('serviceproviders/addStudio', $data);
        }
    }

    public function addSinger()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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

            $img4_name = $_FILES['singer_photo']['name'];
            $img4_size = $_FILES['singer_photo']['size'];
            $tmp4_name = $_FILES['singer_photo']['tmp_name'];
            $error4 = $_FILES['singer_photo']['error'];

            if ($error1 === UPLOAD_ERR_NO_FILE) {
                $new_img1_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img1_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img1_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/xamppfiles/htdocs/symphony/public/img/serviceProvider/' . $new_img1_name;
                $bool = move_uploaded_file($tmp1_name, $img_upload_path);
            }

            if ($error2 === UPLOAD_ERR_NO_FILE) {
                $new_img2_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/xamppfiles/htdocs/symphony/public/img/serviceProvider/' . $new_img2_name;
                $bool = move_uploaded_file($tmp2_name, $img_upload_path);
            }

            if ($error3 === UPLOAD_ERR_NO_FILE) {
                $new_img3_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/xamppfiles/htdocs/symphony/public/img/serviceProvider/' . $new_img3_name;
                $bool = move_uploaded_file($tmp3_name, $img_upload_path);
            }

            if ($error4 === UPLOAD_ERR_NO_FILE) {
                $new_img4_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img4_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img4_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/xamppfiles/htdocs/symphony/public/img/serviceProvider/' . $new_img4_name;
                $bool = move_uploaded_file($tmp4_name, $img_upload_path);
            }

            // Init data
            $data = [
                'name' => trim($_POST['singerName']),
                'NickName' => trim($_POST['singerNickName']),
                'telephoneNumber' => trim($_POST['number']),
                'email' => trim($_POST['email']),
                'rate' => trim($_POST['rate']),
                'instrument' => $_SESSION['instrumentList'],
                'location' => $_SESSION['locationList'],
                'videoLink' => trim($_POST['video']),
                'description' => trim($_POST['description']),
                'photo_1' => $new_img1_name,
                'photo_2' => $new_img2_name,
                'photo_3' => $new_img3_name,
                'singer_photo' => $new_img4_name,
                'name_err' => '',
                'rate_err' => '',
                'description_err' => '',
                'telephoneNumber_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Name cannot be empty!';
            }

            if (empty($data['rate'])) {
                $data['rate_err'] = 'Please enter your rate!';
            }

            if (empty($data['telephoneNumber'])) {
                $data['telephoneNumber_err'] = 'Please enter the contact number!';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter the description.';
            }
            if (empty($data['name_err']) && empty($data['rate_err']) && empty($data['description_err']) && empty($data['telephoneNumber_err'])) {
                if ($this->serviceProviderModel->addSinger($data)) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Add Singer',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has added a new singer to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    $notification_data = [
                        'user_type' => 'ServiceProvider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'data' => 'You have successfully added a new singer to your inventory',
                        'date_time' => date('Y-m-d H:i:s'),
                        'status' => 'Unread'    
                    ];
                    $this->serviceProviderModel->addNotification($notification_data);
                    redirect('serviceproviders/singer');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to add a new singer to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong while adding the singer to the inventory');
                }
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to provide the required information to add a new singer to their inventory'
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/addSinger', $data);
            }

        } else {
            $data = [
                'name' => '',
                'NickName' => '',
                'telephoneNumber' => '',
                'email' => '',
                'rate' => '',
                'instrument' => '',
                'location' => '',
                'videoLink' => '',
                'description' => '',
                'photo_1' => '',
                'photo_2' => '',
                'photo_3' => '',
                'singer_photo' => '',
                'name_err' => '',
                'rate_err' => '',
                'description_err' => '',
                'telephoneNumber_err' => ''
            ];

            // Load view
            $this->view('serviceproviders/addSinger', $data);
        }
    }

    public function addband()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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

            $img4_name = $_FILES['leaderPhoto']['name'];
            $img4_size = $_FILES['leaderPhoto']['size'];
            $tmp4_name = $_FILES['leaderPhoto']['tmp_name'];
            $error4 = $_FILES['leaderPhoto']['error'];

            $img5_name = $_FILES['bandPhoto']['name'];
            $img5_size = $_FILES['bandPhoto']['size'];
            $tmp5_name = $_FILES['bandPhoto']['tmp_name'];
            $error5 = $_FILES['bandPhoto']['error'];

            if ($error1 === UPLOAD_ERR_NO_FILE) {
                $new_img1_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img1_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img1_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img1_name;
                $bool = move_uploaded_file($tmp1_name, $img_upload_path);
            }

            if ($error2 === UPLOAD_ERR_NO_FILE) {
                $new_img2_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img2_name;
                $bool = move_uploaded_file($tmp2_name, $img_upload_path);
            }

            if ($error3 === UPLOAD_ERR_NO_FILE) {
                $new_img3_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img3_name;
                $bool = move_uploaded_file($tmp3_name, $img_upload_path);
            }

            if ($error4 === UPLOAD_ERR_NO_FILE) {
                $new_img4_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img4_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img4_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img4_name;
                $bool = move_uploaded_file($tmp4_name, $img_upload_path);
            }

            if ($error5 === UPLOAD_ERR_NO_FILE) {
                $new_img5_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img5_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img5_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img5_name;
                $bool = move_uploaded_file($tmp5_name, $img_upload_path);
            }


            // Init data
            $data = [
                'name' => trim($_POST['bandName']),
                'leader'=> trim($_POST['leaderName']),
                'telephoneNumber' => trim($_POST['number']),
                'email' => trim($_POST['email']),
                'memberCount' => trim($_POST['memberCount']),
                'rate' => trim($_POST['rate']),
                'instrument' => $_SESSION['instrumentList'],
                'location' => $_SESSION['locationList'],
                'videoLink' => trim($_POST['video']),
                'description' => trim($_POST['description']),
                'photo_1' => $new_img1_name,
                'photo_2' => $new_img2_name,
                'photo_3' => $new_img3_name,
                'leader_photo' => $new_img4_name,
                'band_photo' => $new_img5_name,
                'name_err' => '',
                'telephoneNumber_err' => '',
                'rate_err'=> '',
                'description_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Name cannot be empty!';
            }

            if (empty($data['rate'])) {
                $data['rate_err'] = 'Please enter your rate!';
            }

            if (empty($data['telephoneNumber'])) {
                $data['telephoneNumber_err'] = 'Please enter the contact number!';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter the description.';
            }
            if (empty($data['name_err']) && empty($data['rate_err']) && empty($data['description_err']) && empty($data['telephoneNumber_err'])) {
                if ($this->serviceProviderModel->addBand($data)) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Add Band',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has added a new band to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    $notification_data = [
                        'user_type' => 'ServiceProvider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'data' => 'You have successfully added a new band to your inventory',
                        'date_time' => date('Y-m-d H:i:s'),
                        'status' => 'Unread'    
                    ];
                    $this->serviceProviderModel->addNotification($notification_data);
                    redirect('serviceproviders/band');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to add a new band to their inventory'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong while adding the band to the inventory');
                }
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to provide the required information to add a new band to their inventory'
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/addBand', $data);
            }

        } else {
            $data = [
                'name' => '',
                'leader'=> '',
                'telephoneNumber' => '',
                'email' => '',
                'memberCount' => '',
                'rate' => '',
                'instrument' => '',
                'location' => '',
                'videoLink' =>'',
                'description' => '',
                'photo_1' => '',
                'photo_2' => '',
                'photo_3' => '',
                'leader_photo' => '',
                'band_photo' => ''
            ];

            // Load view
            $this->view('serviceproviders/addBand', $data);
        }
    }

    public function editStudio($product_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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

            if ($error1 === UPLOAD_ERR_NO_FILE) {
                $new_img1_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img1_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img1_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img1_name;
                $bool = move_uploaded_file($tmp1_name, $img_upload_path);

                $data = [
                    'photo_1' => $new_img1_name
                ];

                $this->serviceProviderModel->editStudioPhoto($product_id, $data, 'photo_1');
            }

            if ($error2 === UPLOAD_ERR_NO_FILE) {
                $new_img2_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img2_name;
                $bool = move_uploaded_file($tmp2_name, $img_upload_path);

                $data = [
                    'photo_2' => $new_img2_name
                ];

                $this->serviceProviderModel->editStudioPhoto($product_id, $data, 'photo_2');
            }

            if ($error3 === UPLOAD_ERR_NO_FILE) {
                $new_img3_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img3_name;
                $bool = move_uploaded_file($tmp3_name, $img_upload_path);

                $data = [
                    'photo_3' => $new_img3_name
                ];

                $this->serviceProviderModel->editStudioPhoto($product_id, $data, 'photo_3');
            }

            // Init data
            $data = [
                'name' => trim($_POST['StudioName']),
                'rate' => trim($_POST['rate']),
                'airCondition' => trim($_POST['airCondition']),
                'instrument' => $_SESSION['instrumentList'],
                'descriptionSounds' => trim($_POST['descriptionSounds']),
                'descriptionStudio' => trim($_POST['descriptionStudio']),
                'telephoneNumber' => trim($_POST['number']),
                'videoLink' => trim($_POST['video']),
                'name_err' => '',
                'rate_err' => '',
                'descriptionSounds_err' => '',
                'descriptionStudio_err' => '',
                'telephoneNumber_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Name cannot be empty!';
            }

            if (empty($data['rate'])) {
                $data['rate_err'] = 'Please enter your rate!';
            }

            if (empty($data['descriptionSounds'])) {
                $data['descriptionSounds_err'] = 'Please enter the item description!';
            }

            if (empty($data['descriptionStudio'])) {
                $data['descriptionStudio_err'] = 'Please enter the studio description!';
            }

            if (empty($data['telephoneNumber'])) {
                $data['telephoneNumber_err'] = 'Please enter the contact number!';
            }

            if (empty($data['name_err']) && empty($data['rate_err']) && empty($data['descriptionSounds_err']) && empty($data['descriptionStudio_err']) && empty($data['telephoneNumber_err'])) {

                if ($this->serviceProviderModel->editStudio($product_id, $data)) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has edited a studio in their inventory with the ID ' . $product_id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    $notification_data = [
                        'user_type' => 'ServiceProvider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'data' => 'You have successfully edited a studio in your inventory',
                        'date_time' => date('Y-m-d H:i:s'),
                        'status' => 'Unread'    
                    ];
                    $this->serviceProviderModel->addNotification($notification_data);
                    redirect('serviceproviders/studio');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to edit a studio in their inventory with the ID ' . $product_id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong');
                }
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to provide the required information to edit a studio in their inventory with the ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/addStudio', $data);
            }

        } else {
            $data = [
                'name' => '',
                'rate' => '',
                'airCondition' => '',
                'instrument' => '',
                'descriptionSounds' => '',
                'descriptionStudio' => '',
                'telephoneNumber' => '',
                'videoLink' => '',
                'photo_1' => '',
                'photo_2' => '',
                'photo_3' => ''
            ];

            // Load view
            $this->view('serviceproviders/addStudio', $data);
        }
    }

    //studio instrument list update
    public function studioInstrument()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $data = file_get_contents("php://input");
        $requestData = json_decode($data, true);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $requestData && isset($requestData['instruments'])) {
            if (empty($requestData['instruments'])) {
                $_SESSION['instrumentList'] = "NULL";
            } else {
                $_SESSION['instrumentList'] = $requestData['instruments'];
            }
            if (empty($requestData['location'])) {
                $_SESSION['locationList'] = "NULL";
            } else {
                $_SESSION['locationList'] = $requestData['location'];
            }
            echo json_encode(['success' => 'request success', 'instruments' => $_SESSION['instrumentList'], 'locations' => $_SESSION['locationList']]);
        } else {
            echo json_encode(['error' => 'Invalid data format']);
        }
    }

    public function deleteSinger($product_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $hasitemorders = $this->serviceProviderModel->hasitemorders($product_id, 'Singer');
        if ($hasitemorders) {
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Manage Inventory',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has failed to delete a singer from their inventory with the ID ' . $product_id . ' because it has orders'
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $notification_data = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You have failed to delete a singer from your inventory because it has orders',
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data);
            redirect('serviceproviders/singer');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->serviceProviderModel->deleteSinger($product_id);
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has deleted a singer from their inventory with the ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $notification_data = [
                    'user_type' => 'ServiceProvider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'data' => 'You have successfully deleted a singer from your inventory',
                    'date_time' => date('Y-m-d H:i:s'),
                    'status' => 'Unread'    
                ];
                $this->serviceProviderModel->addNotification($notification_data);
                redirect('serviceproviders/singer');
            } else {
                redirect('serviceproviders/singer');
            }
        }
    }


    public function deleteStudio($product_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $hasitemorders = $this->serviceProviderModel->hasitemorders($product_id, 'Studio');
        if ($hasitemorders) {
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Manage Inventory',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has failed to delete a studio from their inventory with the ID ' . $product_id . ' because it has orders'
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $notification_data = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You have failed to delete a studio from your inventory because it has orders',
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data);
            redirect('serviceproviders/studio');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->serviceProviderModel->deleteStudio($product_id);
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has deleted a studio from their inventory with the ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $notification_data = [
                    'user_type' => 'ServiceProvider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'data' => 'You have successfully deleted a studio from your inventory',
                    'date_time' => date('Y-m-d H:i:s'),
                    'status' => 'Unread'    
                ];
                $this->serviceProviderModel->addNotification($notification_data);
                redirect('serviceproviders/studio');
            } else {
                redirect('serviceproviders/studio');
            }
        }
    }

    public function deleteMusician($product_id){
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $hasitemorders = $this->serviceProviderModel->hasitemorders($product_id, 'Musician');
        if ($hasitemorders) {
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Manage Inventory',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has failed to delete a musician from their inventory with the ID ' . $product_id . ' because it has orders'
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $notification_data = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You have failed to delete a musician from your inventory because it has orders',
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data);
            redirect('serviceproviders/musician');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->serviceProviderModel->deleteMusician($product_id);
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has deleted a musician from their inventory with the ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $notification_data = [
                    'user_type' => 'ServiceProvider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'data' => 'You have successfully deleted a musician from your inventory',
                    'date_time' => date('Y-m-d H:i:s'),
                    'status' => 'Unread'    
                ];
                $this->serviceProviderModel->addNotification($notification_data);
                redirect('serviceproviders/musician');
            } else {
                redirect('serviceproviders/musician');
            }
        }
    }

    public function editconfirm()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'quantity' => trim($_POST['quantity']),
                'unit_price' => trim($_POST['unit_price']),
                'product_id' => trim($_POST['product_id']),
                'quantity_err' => '',
                'unit_price_err' => '',
            ];
            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter the quantity!';
            } else if ($data['quantity'] <= 0) {
                $data['quantity_err'] = 'Please enter a valid quantity!';
            }

            // Validate owner address
            if (empty($data['unit_price'])) {
                $data['unit_price_err'] = 'Please enter the unit price!';
            } else if ($data['unit_price'] <= 0) {
                $data['unit_price_err'] = 'Please enter a valid unit price!';
            }
            // Make sure errors are empty
            if (empty($data['quantity_err']) && empty($data['unit_price_err'])) {

                // Register serviceprovider
                if ($this->serviceProviderModel->updateitem($data)) {
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('serviceproviders/edititem', $data);
            }

        } else {
            // Init data
            $data = [
                'created_by' => '',
                'category' => '',
                'brand' => '',
                'model' => '',
                'quantiry' => '',
                'unit_price' => '',
                'description' => '',
                'created_by_err' => '',
                'category_err' => '',
                'brand_err' => '',
                'model_err' => '',
                'quantity_err' => '',
                'unit_price_err' => '',
                'description_err' => ''
            ];

            // Load view
            $this->view('serviceproviders/additem', $data);
        }
    }

    public function edit()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
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
            if (empty($data['business_email'])) {
                $data['business_email_err'] = 'Please enter business email!';
            } else {
                // Check email
                if (!filter_var($data['business_email'], FILTER_VALIDATE_EMAIL)) {
                    $data['business_email_err'] = 'Invalid email format';
                } elseif ($this->serviceProviderModel->findOtherServiceProviderByEmail($data['business_email'], $_SESSION['serviceprovider_id'])) {
                    $data['business_email_err'] = 'Email is already taken';
                }
            }
            // Validate business name
            if (empty($data['business_name'])) {
                $data['business_name_err'] = 'Please enter business name!';
            }

            // Validate business address
            if (empty($data['business_address'])) {
                $data['business_address_err'] = 'Please enter business address!';
            }

            // Validate business contact number
            if (empty($data['business_contact_no'])) {
                $data['business_contact_no_err'] = 'Please enter business contact number!';
            }

            // Validate owner name
            if (empty($data['owner_name'])) {
                $data['owner_name_err'] = 'Please enter owner name!';
            }

            // Validate owner address
            if (empty($data['owner_address'])) {
                $data['owner_address_err'] = 'Please enter owner address!';
            }

            // Validate owner contact number
            if (empty($data['owner_contact_no'])) {
                $data['owner_contact_no_err'] = 'Please enter owner contact number!';
            }

            // Validate owner email
            if (empty($data['owner_email'])) {
                $data['owner_email_err'] = 'Please enter owner email!';
            } else {
                // Check email
                if (!filter_var($data['owner_email'], FILTER_VALIDATE_EMAIL)) {
                    $data['owner_email_err'] = 'Invalid email format';
                }
            }
            // Validate about
            if (empty($data['about'])) {
                $data['about_err'] = 'Please enter about business!';
            }

            // Make sure errors are empty
            if (empty($data['business_name_err']) && empty($data['business_address_err']) && empty($data['business_contact_no_err']) && empty($data['business_email_err']) && empty($data['owner_name_err']) && empty($data['owner_address_err']) && empty($data['owner_contact_no_err']) && empty($data['owner_email_err']) && empty($data['about_err'])) {
                // Validated


                // Update serviceprovider
                if ($this->serviceProviderModel->update($data)) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has edited their profile'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    $notification_data = [
                        'user_type' => 'ServiceProvider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'data' => 'You have successfully edited your profile',
                        'date_time' => date('Y-m-d H:i:s'),
                        'status' => 'Unread'    
                    ];
                    $this->serviceProviderModel->addNotification($notification_data);
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/profile');
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Profile',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to edit their profile'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    die('Something went wrong ');
                }
            } else {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Profile',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has failed to provide the required information to edit their profile'
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/edit', $data);
            }

        } else {
            redirect('serviceproviders/profile');
        }
    }

    public function delete()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $hasorders = $this->serviceProviderModel->hasorders($_SESSION['serviceprovider_id']);
        if ($hasorders) {
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Account Delete',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has failed to delete their profile as they have pending orders'
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $notification_data = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You have pending orders. Please complete them before deleting your account',
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data);
            $this->view('serviceproviders/index');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->serviceProviderModel->delete($_SESSION['serviceprovider_id'])) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Account Delete',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has deleted their profile'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    unset($_SESSION['serviceprovider_id']);
                    unset($_SESSION['serviceprovider_email']);
                    unset($_SESSION['serviceprovider_name']);
                    session_destroy();
                    redirect('pages/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('serviceproviders/profile');
            }
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
                $this->view('serviceproviders/verification', $data);
            } else {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $combinedNumber = $_POST['char1'] . $_POST['char2'] . $_POST['char3'] . $_POST['char4'] . $_POST['char5'] . $_POST['char6'];
                $result = $this->serviceProviderModel->verificationNumber($combinedNumber);
                if ($result) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Verification',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has verified their account'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    $this->view('serviceproviders/succesfull', $data);
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Verification',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to verify their account Invalid OTP'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    $data = ['validation_err' => 'Invalid OTP'];
                    $this->view('serviceproviders/verification', $data);
                }
            }
        }
    }

    public function serviceproviderregister()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
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

            $img4_name = $_FILES['photo_4']['name'];
            $img4_size = $_FILES['photo_4']['size'];
            $tmp4_name = $_FILES['photo_4']['tmp_name'];
            $error4 = $_FILES['photo_4']['error'];

            $img5_name = $_FILES['photo_5']['name'];
            $img5_size = $_FILES['photo_5']['size'];
            $tmp5_name = $_FILES['photo_5']['tmp_name'];
            $error5 = $_FILES['photo_5']['error'];


            if ($error1 === UPLOAD_ERR_NO_FILE) {
                $new_img1_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img1_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img1_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/sp_validations/' . $new_img1_name;
                $bool = move_uploaded_file($tmp1_name, $img_upload_path);
            }

            if ($error2 === UPLOAD_ERR_NO_FILE) {
                $new_img2_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/sp_validations/' . $new_img2_name;
                $bool = move_uploaded_file($tmp2_name, $img_upload_path);
            }

            if ($error3 === UPLOAD_ERR_NO_FILE) {
                $new_img3_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/sp_validations/' . $new_img3_name;
                $bool = move_uploaded_file($tmp3_name, $img_upload_path);
            }

            if ($error4 === UPLOAD_ERR_NO_FILE) {
                $new_img4_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img4_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img4_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/sp_validations/' . $new_img3_name;
                $bool = move_uploaded_file($tmp4_name, $img_upload_path);
            }

            if ($error5 === UPLOAD_ERR_NO_FILE) {
                $new_img5_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img5_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img5_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/sp_validations/' . $new_img3_name;
                $bool = move_uploaded_file($tmp5_name, $img_upload_path);
            }
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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
            // Init data
            $data = [
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
                'photo' => $new_img_name,
                'photo_1' => $new_img1_name,
                'photo_2' => $new_img2_name,
                'photo_3' => $new_img3_name,
                'photo_4' => $new_img4_name,
                'photo_5' => $new_img5_name,
                'registration_date' => date('Y-m-d'),
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
            if (empty($data['business_email'])) {
                $data['business_email_err'] = 'Please enter business email!';
            } else {
                // Check email
                if (!filter_var($data['business_email'], FILTER_VALIDATE_EMAIL)) {
                    $data['business_email_err'] = 'Invalid email format';
                } elseif ($this->serviceProviderModel->findserviceproviderByEmail($data['business_email'])) {
                    $data['business_email_err'] = 'Email is already taken!';
                }
            }

            // Validate business name
            if (empty($data['business_name'])) {
                $data['business_name_err'] = 'Please enter business name!';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Validate business address
            if (empty($data['business_address'])) {
                $data['business_address_err'] = 'Please enter business address!';
            }

            // Validate business contact number
            if (empty($data['business_contact_no'])) {
                $data['abusiness_contact_no_err'] = 'Please enter business contact number!';
            }

            // Validate owner name
            if (empty($data['owner_name'])) {
                $data['owner_name_err'] = 'Please enter owner name!';
            }

            // Validate owner address
            if (empty($data['owner_address'])) {
                $data['owner_address_err'] = 'Please enter owner address!';
            }

            // Validate owner contact number
            if (empty($data['owner_contact_no'])) {
                $data['owner_contact_no_err'] = 'Please enter owner contact number!';
            }

            // Validate owner email
            if (empty($data['owner_email'])) {
                $data['owner_email_err'] = 'Please enter owner email!';
            } else {
                // Check email format using a regular expression
                if (!filter_var($data['owner_email'], FILTER_VALIDATE_EMAIL)) {
                    $data['owner_email_err'] = 'Invalid email format';
                } elseif ($this->serviceProviderModel->findServiceProviderByEmail($data['owner_email'])) {
                    $data['owner_email_err'] = 'Email is already taken';
                }
            }

            // Validate owner email
            if (empty($data['owner_nic'])) {
                $data['owner_nic_err'] = 'Please enter owner NIC!';
            }

            // Validate about
            if (empty($data['about'])) {
                $data['about_err'] = 'Please enter about business!';
            }

            // Make sure errors are empty
            if (empty($data['business_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['business_address_err']) && empty($data['business_contact_no_err']) && empty($data['business_email_err']) && empty($data['owner_name_err']) && empty($data['owner_address_err']) && empty($data['owner_contact_no_err']) && empty($data['owner_email_err']) && empty($data['owner_nic_err']) && empty($data['about_err'])) {
                // Validated
                // Hash Password

                //die('hi');
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register serviceprovider
                if ($this->serviceProviderModel->register($data)) {
                    $sp_id = $this->serviceProviderModel->findserviceproviderByEmail($data['business_email'])->serviceprovider_id;
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $sp_id,
                        'log_type' => 'Registration',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has created an account'
                    ];
                    // flash('register_success', 'You are registered and can log in');
                    $this->view('serviceproviders/verification');
                } else {
                    die('Something went wrong while registering');
                }
            } else {
                // Load view with errors
                $this->view('serviceproviders/serviceproviderregister', $data);
            }

        } else {
            // Init data
            $data = [
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

    public function serviceproviderlogin()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'business_email' => trim($_POST['business_email']),
                'password' => trim($_POST['password']),
                'business_email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['business_email'])) {
                $data['business_email_err'] = 'Please enter email!';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password!';
            }

            // Check for serviceprovider/email
            if ($this->serviceProviderModel->findserviceproviderByEmail($data['business_email'])) {
                // serviceprovider found
            } else if ($this->serviceProviderModel->findBannedServiceProviderByEmail($data['business_email'])) {
                // Banned Account
                $data['business_email_err'] = 'Sorry, Your account has been banned!';
            } else {
                // serviceprovider not found
                $data['business_email_err'] = 'No service provider found!';
            }

            // Make sure errors are empty
            if (empty($data['business_email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in serviceprovider
                $loggedInserviceprovider = $this->serviceProviderModel->serviceproviderlogin($data['business_email'], $data['password']);

                if ($loggedInserviceprovider) {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $loggedInserviceprovider->serviceprovider_id,
                        'log_type' => 'Login',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has logged in'
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
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
            $data = [
                'business_email' => '',
                'password' => '',
                'business_email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('serviceproviders/serviceproviderlogin', $data);
        }
    }

    public function changeOrderStatus($order_id, $status)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $this->serviceProviderModel->changeOrderStatus($order_id, $status);
        if($status === 'Rejected'){
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Reject Order',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has rejected an order with the ID ' . $order_id
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $suborder_data = $this->serviceProviderModel->getOrderData($order_id);
            $notification_data = [
                'user_type' => 'Customer',
                'user_id' => $suborder_data->user_id,
                'data' => 'Your order containing the sub order with the ID ' . $order_id . ' has been rejected by the service provider',
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data);
            $notification_data_2 = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You have successfully rejected the order with the ID ' . $order_id,
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_2);
        } else if($status === 'Upcoming'){
            $log_data = [
                'user_type' => 'Service Provider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'log_type' => 'Accept Order',
                'date_and_time' => date('Y-m-d H:i:s'),
                'data' => 'Service Provider has accepted the order with the ID ' . $order_id
            ];
            $this->serviceProviderModel->addLogData($log_data);
            $suborder_data = $this->serviceProviderModel->getOrderData($order_id);
            $notification_data = [
                'user_type' => 'Customer',
                'user_id' => $suborder_data->user_id,
                'data' => 'Your order containing the sub order with the ID ' . $order_id . ' has been accepted by the service provider',
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data);
            $notification_data_2 = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You have successfully accepted an order with the ID ' . $order_id,
                'date_time' => date('Y-m-d H:i:s'),
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_2);
            $order_date_minus_2hours = date('Y-m-d H:i:s', strtotime($suborder_data->start_date . ' -2 hours'));
            $order_date = date('Y-m-d H:i:s', strtotime($suborder_data->start_date));
            $order_date_end_minus_2hours = date('Y-m-d H:i:s', strtotime($suborder_data->end_date . ' +22 hours'));
            $order_date_end = date('Y-m-d H:i:s', strtotime($suborder_data->end_date . ' +24 hours'));
            $notification_data_3 = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You have an upcoming order with the sub order ID ' . $order_id . ' starting at ' . $suborder_data->start_date . ' and ending at ' . $suborder_data->end_date,
                'date_time' => $order_date_minus_2hours,
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_3);
            $notification_data_4 = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'You have an upcoming order with the sub order ID ' . $order_id . ' starting at ' . $suborder_data->start_date . ' and ending at ' . $suborder_data->end_date,
                'date_time' => $order_date,
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_4);
            $notification_data_5 = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'Your order with the sub order ID ' . $order_id . ' is about to end in 2 hours',
                'date_time' => $order_date_end_minus_2hours,
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_5);
            $notification_data_6 = [
                'user_type' => 'ServiceProvider',
                'user_id' => $_SESSION['serviceprovider_id'],
                'data' => 'Your order with the sub order ID ' . $order_id . ' has ended',
                'date_time' => $order_date_end,
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_6);
            $notification_data_7 = [
                'user_type' => 'Customer',
                'user_id' => $suborder_data->user_id,
                'data' => 'You have an upcoming order with the sub order ID ' . $order_id . ' starting at ' . $suborder_data->start_date . ' and ending at ' . $suborder_data->end_date,
                'date_time' => $order_date_minus_2hours,
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_7);
            $notification_data_8 = [
                'user_type' => 'Customer',
                'user_id' => $suborder_data->user_id,
                'data' => 'You have an upcoming order with the sub order ID ' . $order_id . ' starting at ' . $suborder_data->start_date . ' and ending at ' . $suborder_data->end_date,
                'date_time' => $order_date,
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_8);
            $notification_data_9 = [
                'user_type' => 'Customer',
                'user_id' => $suborder_data->user_id,
                'data' => 'Your order with the sub order ID ' . $order_id . ' is about to end in 2 hours. Please make sure to end the order on time to avoid any penalties.',
                'date_time' => $order_date_end_minus_2hours,
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_9);
            $notification_data_10 = [
                'user_type' => 'Customer',
                'user_id' => $suborder_data->user_id,
                'data' => 'Your order with the sub order ID ' . $order_id . ' has ended. Please make sure to end the order on time to avoid any penalties.',
                'date_time' => $order_date_end,
                'status' => 'Unread'    
            ];
            $this->serviceProviderModel->addNotification($notification_data_10);
        }
        if($status === 'Rejected'){
            $full_order_data = $this->serviceProviderModel->getFullOrderData();
            $full_order_id = 0;
            foreach ($full_order_data as $order) {
                $full_order_id = $order->order_id;
                $suborder_ids = explode(',', $order->sorder_id);
                foreach ($suborder_ids as $suborder_id) {
                    if($suborder_id == $order_id){
                        break 2;
                    }
                }
            }
            $order_data = $this->serviceProviderModel->getOrderData($order_id);
            $this->serviceProviderModel->updateFullOrderPrice($full_order_id, $order_data->total);
            $resultString = implode(', ', json_decode(json_encode($order_data), true));
            $resultArray = explode(', ', $resultString);
            $finalArray = explode(',', $resultArray[10]);
            foreach ($finalArray as $entry_id) {
                $this->serviceProviderModel->removeAvailability($entry_id);
            }
        }
        redirect('serviceproviders/orders');
    }

    function compareOrderByStatus($a, $b) {
        $statusOrder = [
            'Pending' => 1,
            'In-Progress' => 2,
            'Upcoming' => 3,
            'Completed' => 4,
            'Rejected' => 5,
            'Cancelled' => 6,
        ];
    
        // Get the numeric value for each status
        $statusA = $statusOrder[$a->status] ?? 0;
        $statusB = $statusOrder[$b->status] ?? 0;
    
        // Compare based on the numeric order
        return $statusA - $statusB;
    }

    public function orders()
    {   
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $orders = $this->serviceProviderModel->getOrders($_SESSION['serviceprovider_id']);
        $order_objects = [];
        $today = strtotime(date("Y-m-d"));
        foreach ($orders as $order) {
            $startDateTimestamp = strtotime($order->start_date);
            $endDateTimestamp = strtotime($order->end_date);
            if ($today >= $startDateTimestamp && $today <= $endDateTimestamp && $order->status == 'Upcoming') {
                $order->status = 'In-Progress';
                $this->serviceProviderModel->changeOrderStatus($order->sorder_id, 'In-Progress');
            }
            $user_data = json_decode(json_encode($this->serviceProviderModel->getUserData($order->user_id)), true);
            if ($order->type == 'Equipment'){
                $product_data = json_decode(json_encode($this->serviceProviderModel->getItemData($order->product_id)), true);
            } else if ($order->type == 'Studio'){
                $product_data = json_decode(json_encode($this->serviceProviderModel->getStudioData($order->product_id)), true);
            } else if ($order->type == 'Singer'){
                $product_data = json_decode(json_encode($this->serviceProviderModel->getSingerData($order->product_id)), true);
            } else if ($order->type == 'Band'){
                $product_data = json_decode(json_encode($this->serviceProviderModel->getBandData($order->product_id)), true);
            } else if ($order->type == 'Musician'){
                $product_data = json_decode(json_encode($this->serviceProviderModel->getMusicianData($order->product_id)), true);
            }
            if (isset($user_data['status'])) {
                unset($user_data['status']);
            }
            if (isset($product_data['status'])) {
                unset($product_data['status']);
            }
            $order_data = json_decode(json_encode($order), true);
            $order_data = array_merge($order_data, $user_data, $product_data); 
            $order_object = json_decode(json_encode($order_data));
            $order_objects[] = $order_object;
            usort($order_objects,[$this,  'compareOrderByStatus']);
        }
        
        $data = [
            'orders' => $order_objects
        ];
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'View Orders',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their orders'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        $this->view('serviceproviders/orders', $data);
    }

    public function createserviceprovidersession($serviceprovider)
    {

        $_SESSION['serviceprovider_id'] = $serviceprovider->serviceprovider_id;
        $_SESSION['serviceprovider_email'] = $serviceprovider->business_email;
        $_SESSION['serviceprovider_name'] = $serviceprovider->business_name;
        redirect('serviceproviders/index');

    }

    public function logout()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Logout',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has logged out'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        unset($_SESSION['serviceprovider_id']);
        unset($_SESSION['serviceprovider_email']);
        unset($_SESSION['serviceprovider_name']);
        session_destroy();
        redirect('pages/index');
    }

    public function Instrument()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->inventory($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory,
        ];
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Instrument inventory'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        $this->view('serviceproviders/inventory', $data);
    }

    public function Studio()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->studio($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Studio inventory'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        $this->view('serviceproviders/studio');
    }

    public function Singer()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->singer($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Singer inventory'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        $this->view('serviceproviders/singer');
    }

    public function Band()
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $inventory = $this->serviceProviderModel->band($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $log_data = [
            'user_type' => 'Service Provider',
            'user_id' => $_SESSION['serviceprovider_id'],
            'log_type' => 'Manage Inventory',
            'date_and_time' => date('Y-m-d H:i:s'),
            'data' => 'Service Provider has viewed their Band inventory'
        ];
        $this->serviceProviderModel->addLogData($log_data);
        $this->view('serviceproviders/band');
    }

    public function viewSinger($product_id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $singerDetails = $this->serviceProviderModel->viewSinger($product_id);
            if ($singerDetails) {
                $log_data = [
                    'user_type' => 'Service Provider',
                    'user_id' => $_SESSION['serviceprovider_id'],
                    'log_type' => 'Manage Inventory',
                    'date_and_time' => date('Y-m-d H:i:s'),
                    'data' => 'Service Provider has viewed a Singer with ID ' . $product_id
                ];
                $this->serviceProviderModel->addLogData($log_data);
                $this->view('serviceproviders/viewSinger', $singerDetails);
            } else {
//                var_dump('singer fetch err..);
            }
        }
    }

    public function updateSinger($id)
    {
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
//        $singerPhoto = $this->serviceProviderModel->fetchSingerPhoto($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_FILES['photo_4']['name'])) {
                $img4_name = $_FILES['photo_4']['name'];
                $img4_size = $_FILES['photo_4']['size'];
                $tmp4_name = $_FILES['photo_4']['tmp_name'];
                $error4 = $_FILES['photo_4']['error'];

                if ($error4 === UPLOAD_ERR_NO_FILE) {
                    $new_img4_name = 'IMG-656bdc23223334.62765635.png';
                } else {
                    $img_ex = pathinfo($img4_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $new_img4_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/serviceProvider/' . $new_img4_name;
                    $bool = move_uploaded_file($tmp4_name, $img_upload_path);
                }

                $data = [
                    'singerPhoto' => $new_img4_name
                ];

                $this->serviceProviderModel->editSingerPhoto($id, $data);

                $data = [
                    'product_id' => $id,
                    'name' => trim($_POST['singerName']),
                    'NickName' => trim($_POST['singerNickName']),
                    'telephoneNumber' => trim($_POST['number']),
                    'email' => trim($_POST['email']),
                    'rate' => trim($_POST['rate']),
                    'instrument' => $_SESSION['instrumentList'],
                    'location' => $_SESSION['locationList'],
                    'videoLink' => trim($_POST['videoLink']),
                    'description' => trim($_POST['description']),
                ];

                if (!empty($data['name']) && !empty($data['NickName']) && !empty($data['telephoneNumber']) && !empty($data['email']) && !empty($data['rate']) && !empty($data['videoLink']) && !empty($data['description'])) {
                    if ($this->serviceProviderModel->updateSinger($data)) {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has updated a Singer with ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        $notification_data = [
                            'user_type' => 'ServiceProvider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'data' => 'You have successfully updated a Singer in your inventory',
                            'date_time' => date('Y-m-d H:i:s'),
                            'status' => 'Unread'    
                        ];
                        $this->serviceProviderModel->addNotification($notification_data);
                        redirect('serviceproviders/viewSinger/' . $id);
                    } else {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has failed to update a Singer with ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        die('Something went wrong while updating the singer');
                    }
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to provide the required information to update a Singer with ID ' . $id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    redirect('serviceproviders/viewSinger/' . $id);
                }
            } else {
                $data = [
                    'product_id' => $id,
                    'name' => trim($_POST['singerName']),
                    'NickName' => trim($_POST['singerNickName']),
                    'telephoneNumber' => trim($_POST['number']),
                    'email' => trim($_POST['email']),
                    'rate' => trim($_POST['rate']),
                    'instrument' => $_SESSION['instrumentList'],
                    'location' => $_SESSION['locationList'],
                    'videoLink' => trim($_POST['videoLink']),
                    'description' => trim($_POST['description']),
                ];

                if (!empty($data['name']) && !empty($data['NickName']) && !empty($data['telephoneNumber']) && !empty($data['email']) && !empty($data['rate']) && !empty($data['videoLink']) && !empty($data['description'])) {
                    if ($this->serviceProviderModel->updateSinger($data)) {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has updated a Singer with ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        redirect('serviceproviders/viewSinger/' . $id);
                    } else {
                        $log_data = [
                            'user_type' => 'Service Provider',
                            'user_id' => $_SESSION['serviceprovider_id'],
                            'log_type' => 'Manage Inventory',
                            'date_and_time' => date('Y-m-d H:i:s'),
                            'data' => 'Service Provider has failed to update a Singer with ID ' . $id
                        ];
                        $this->serviceProviderModel->addLogData($log_data);
                        die('Something went wrong while updating the singer');
                    }
                } else {
                    $log_data = [
                        'user_type' => 'Service Provider',
                        'user_id' => $_SESSION['serviceprovider_id'],
                        'log_type' => 'Manage Inventory',
                        'date_and_time' => date('Y-m-d H:i:s'),
                        'data' => 'Service Provider has failed to provide the required information to update a Singer with ID ' . $id
                    ];
                    $this->serviceProviderModel->addLogData($log_data);
                    redirect('serviceproviders/viewSinger/' . $id);
                }
            }
        } else {
            redirect('serviceproviders/singer');
        }
    }

    public function reviewItem($product_id){
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $type = 'Equipment';
        $this->viewAll($product_id, $type);
    }

    public function reviewStudio($product_id){
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $type = 'Studio';
        $this->viewAll($product_id, $type);
    }

    public function reviewSinger($product_id){
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $type = 'Singer';
        $this->viewAll($product_id, $type);
    }

    public function reviewBand($product_id){
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $type = 'Band';
        $this->viewAll($product_id, $type);
    }

    public function reviewMusician($product_id){
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $type = 'Musician';
        $this->viewAll($product_id, $type);
    }

    public function viewAll($product_id, $type){
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
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
        $productPurchased = $this->userModel->checkProductPurchased($product_id, $_SESSION['user_id'], 'Completed', $type);
        if($productPurchased){
            $purchased = true;
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
                    'availability' => 'notChecked',
                    'quantity_selected' => '',
                    'start_date' => '',
                    'end_date' => '',
                    'purchased' => $purchased,
                    'type' => $type
                ];
                $this->view('serviceproviders/viewReviews',$data);

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
                $this->view('serviceproviders/viewStudioReviews',$data);

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
                $this->view('serviceproviders/viewSingerReviews',$data);

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
                $this->view('serviceproviders/viewMusicianReviews',$data);
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
                $this->view('serviceproviders/viewBandReviews',$data);
            }
        } else {
            die('Something went wrong while viewing the product');
        }
    }

    public function generateReports(){
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $sp = $this->serviceProviderModel->view($_SESSION['serviceprovider_id']);
        $orders = $this->serviceProviderModel->getOrders($_SESSION['serviceprovider_id']);
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

        $lifetimeEarnings = 0;
        $lifetimeOrders = 0;
        foreach ($orders as $order){
            $date = new DateTime($order->order_placed_on);
            $timestamp = $date->getTimestamp();
            if ($timestamp >= strtotime('-1 days')) {
                $count_week['0_1_days'] += $order->total;
            }
            if ($timestamp >= strtotime('-2 days') && $timestamp < strtotime('-1 days')) {
                $count_week['1_2_days'] += $order->total;
            }
            if ($timestamp >= strtotime('-3 days') && $timestamp < strtotime('-2 days')) {
                $count_week['2_3_days'] += $order->total;
            }
            if ($timestamp >= strtotime('-4 days') && $timestamp < strtotime('-3 days')) {
                $count_week['3_4_days'] += $order->total;
            } 
            if ($timestamp >= strtotime('-5 days') && $timestamp < strtotime('-4 days')) {
                $count_week['4_5_days'] += $order->total;
            }
            if ($timestamp >= strtotime('-6 days') && $timestamp < strtotime('-5 days')) {
                $count_week['5_6_days'] += $order->total;
            }
            if ($timestamp >= strtotime('-7 days') && $timestamp < strtotime('-6 days')) {
                $count_week['6_7_days'] += $order->total;
            }
            if ($timestamp >= strtotime('-1 week')) {
                $count_8weeks['0_to_1_week'] += $order->total;
            }
            if ($timestamp >= strtotime('-2 weeks') && $timestamp < strtotime('-1 week')) {
                $count_8weeks['1_to_2_weeks'] += $order->total;
            }
            if ($timestamp >= strtotime('-3 weeks') && $timestamp < strtotime('-2 weeks')) {
                $count_8weeks['2_to_3_weeks'] += $order->total;
            }
            if ($timestamp >= strtotime('-4 weeks') && $timestamp < strtotime('-3 weeks')) {
                $count_8weeks['3_to_4_weeks'] += $order->total;
            }
            if ($timestamp >= strtotime('-5 weeks') && $timestamp < strtotime('-4 weeks')) {
                $count_8weeks['4_to_5_weeks'] += $order->total;
            }
            if ($timestamp >= strtotime('-6 weeks') && $timestamp < strtotime('-5 weeks')) {
                $count_8weeks['5_to_6_weeks'] += $order->total;
            }
            if ($timestamp >= strtotime('-7 weeks') && $timestamp < strtotime('-6 weeks')) {
                $count_8weeks['6_to_7_weeks'] += $order->total;
            }
            if ($timestamp >= strtotime('-8 weeks') && $timestamp < strtotime('-7 weeks')) {
                $count_8weeks['7_to_8_weeks'] += $order->total;
            }
            if ($timestamp >= strtotime('-1 month')) {
                $count_year['0_1_month'] += $order->total;
            }
            if ($timestamp >= strtotime('-2 months') && $timestamp < strtotime('-1 month')) {
                $count_year['1_2_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-3 months') && $timestamp < strtotime('-2 months')) {
                $count_year['2_3_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-4 months') && $timestamp < strtotime('-3 months')) {
                $count_year['3_4_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-5 months') && $timestamp < strtotime('-4 months')) {
                $count_year['4_5_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-6 months') && $timestamp < strtotime('-5 months')) {
                $count_year['5_6_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-7 months') && $timestamp < strtotime('-6 months')) {
                $count_year['6_7_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-8 months') && $timestamp < strtotime('-7 months')) {
                $count_year['7_8_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-9 months') && $timestamp < strtotime('-8 months')) {
                $count_year['8_9_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-10 months') && $timestamp < strtotime('-9 months')) {
                $count_year['9_10_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-11 months') && $timestamp < strtotime('-10 months')) {
                $count_year['10_11_months'] += $order->total;
            }
            if ($timestamp >= strtotime('-12 months') && $timestamp < strtotime('-11 months')) {
                $count_year['11_12_months'] += $order->total;
            }
            $lifetimeEarnings += $order->total;
            $lifetimeOrders += 1;
        }
        $spending = [
            'count_week' => $count_week,
            'count_8weeks' => $count_8weeks,
            'count_year' => $count_year
        ];
        $activity_24h = [
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
        
        $activity_week = [
            '6_7_days' => 0,
            '5_6_days' => 0,
            '4_5_days' => 0,
            '3_4_days' => 0,
            '2_3_days' => 0,
            '1_2_days' => 0,
            '0_1_days' => 0,
        ];
        
        $activity_8weeks = [
            '7_to_8_weeks' => 0,
            '6_to_7_weeks' => 0,
            '5_to_6_weeks' => 0,
            '4_to_5_weeks' => 0,
            '3_to_4_weeks' => 0,
            '2_to_3_weeks' => 0,
            '1_to_2_weeks' => 0,
            '0_to_1_week' => 0,
        ];
        
        $activity_year = [
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
        $activityData = $this->serviceProviderModel->getActivity($_SESSION['serviceprovider_id']);
        foreach ($activityData as $activity){
            $date = new DateTime($activity->date_and_time);
            $timestamp = $date->getTimestamp();
            if ($timestamp >= strtotime('-1 hours')) {
                $activity_24h['0_to_1_hours'] += 1;
            }
            if ($timestamp >= strtotime('-2 hours') && $timestamp < strtotime('-1 hours')) {
                $activity_24h['1_to_2_hours'] += 1;
            }
            if ($timestamp >= strtotime('-3 hours') && $timestamp < strtotime('-2 hours')) {
                $activity_24h['2_to_3_hours'] += 1;
            }
            if ($timestamp >= strtotime('-4 hours') && $timestamp < strtotime('-3 hours')) {
                $activity_24h['3_to_4_hours'] += 1;
            }
            if ($timestamp >= strtotime('-5 hours') && $timestamp < strtotime('-4 hours')) {
                $activity_24h['4_to_5_hours'] += 1;
            }
            if ($timestamp >= strtotime('-6 hours') && $timestamp < strtotime('-5 hours')) {
                $activity_24h['5_to_6_hours'] += 1;
            }
            if ($timestamp >= strtotime('-7 hours') && $timestamp < strtotime('-6 hours')) {
                $activity_24h['6_to_7_hours'] += 1;
            }
            if ($timestamp >= strtotime('-8 hours') && $timestamp < strtotime('-7 hours')) {
                $activity_24h['7_to_8_hours'] += 1;
            }
            if ($timestamp >= strtotime('-9 hours') && $timestamp < strtotime('-8 hours')) {
                $activity_24h['8_to_9_hours'] += 1;
            }
            if ($timestamp >= strtotime('-10 hours') && $timestamp < strtotime('-9 hours')) {
                $activity_24h['9_to_10_hours'] += 1;
            }
            if ($timestamp >= strtotime('-11 hours') && $timestamp < strtotime('-10 hours')) {
                $activity_24h['10_to_11_hours'] += 1;
            }
            if ($timestamp >= strtotime('-12 hours') && $timestamp < strtotime('-11 hours')) {
                $activity_24h['11_to_12_hours'] += 1;
            }
            if ($timestamp >= strtotime('-13 hours') && $timestamp < strtotime('-12 hours')) {
                $activity_24h['12_to_13_hours'] += 1;
            }
            if ($timestamp >= strtotime('-14 hours') && $timestamp < strtotime('-13 hours')) {
                $activity_24h['13_to_14_hours'] += 1;
            }
            if ($timestamp >= strtotime('-15 hours') && $timestamp < strtotime('-14 hours')) {
                $activity_24h['14_to_15_hours'] += 1;
            }
            if ($timestamp >= strtotime('-16 hours') && $timestamp < strtotime('-15 hours')) {
                $activity_24h['15_to_16_hours'] += 1;
            }
            if ($timestamp >= strtotime('-17 hours') && $timestamp < strtotime('-16 hours')) {
                $activity_24h['16_to_17_hours'] += 1;
            }
            if ($timestamp >= strtotime('-18 hours') && $timestamp < strtotime('-17 hours')) {
                $activity_24h['17_to_18_hours'] += 1;
            }
            if ($timestamp >= strtotime('-19 hours') && $timestamp < strtotime('-18 hours')) {
                $activity_24h['18_to_19_hours'] += 1;
            }
            if ($timestamp >= strtotime('-20 hours') && $timestamp < strtotime('-19 hours')) {
                $activity_24h['19_to_20_hours'] += 1;
            }
            if ($timestamp >= strtotime('-21 hours') && $timestamp < strtotime('-20 hours')) {
                $activity_24h['20_to_21_hours'] += 1;
            }
            if ($timestamp >= strtotime('-22 hours') && $timestamp < strtotime('-21 hours')) {
                $activity_24h['21_to_22_hours'] += 1;
            }
            if ($timestamp >= strtotime('-23 hours') && $timestamp < strtotime('-22 hours')) {
                $activity_24h['22_to_23_hours'] += 1;
            }
            if ($timestamp >= strtotime('-24 hours') && $timestamp < strtotime('-23 hours')) {
                $activity_24h['23_to_24_hours'] += 1;
            }
            if ($timestamp >= strtotime('-1 days')) {
                $activity_week['0_1_days'] += 1;
            }
            if ($timestamp >= strtotime('-2 days') && $timestamp < strtotime('-1 days')) {
                $activity_week['1_2_days'] += 1;
            }
            if ($timestamp >= strtotime('-3 days') && $timestamp < strtotime('-2 days')) {
                $activity_week['2_3_days'] += 1;
            }
            if ($timestamp >= strtotime('-4 days') && $timestamp < strtotime('-3 days')) {
                $activity_week['3_4_days'] += 1;
            }
            if ($timestamp >= strtotime('-5 days') && $timestamp < strtotime('-4 days')) {
                $activity_week['4_5_days'] += 1;
            }
            if ($timestamp >= strtotime('-6 days') && $timestamp < strtotime('-5 days')) {
                $activity_week['5_6_days'] += 1;
            }
            if ($timestamp >= strtotime('-7 days') && $timestamp < strtotime('-6 days')) {
                $activity_week['6_7_days'] += 1;
            }
            if ($timestamp >= strtotime('-1 week')) {
                $activity_8weeks['0_to_1_week'] += 1;
            }
            if ($timestamp >= strtotime('-2 weeks') && $timestamp < strtotime('-1 week')) {
                $activity_8weeks['1_to_2_weeks'] += 1;
            }
            if ($timestamp >= strtotime('-3 weeks') && $timestamp < strtotime('-2 weeks')) {
                $activity_8weeks['2_to_3_weeks'] += 1;
            }
            if ($timestamp >= strtotime('-4 weeks') && $timestamp < strtotime('-3 weeks')) {
                $activity_8weeks['3_to_4_weeks'] += 1;
            }
            if ($timestamp >= strtotime('-5 weeks') && $timestamp < strtotime('-4 weeks')) {
                $activity_8weeks['4_to_5_weeks'] += 1;
            }
            if ($timestamp >= strtotime('-6 weeks') && $timestamp < strtotime('-5 weeks')) {
                $activity_8weeks['5_to_6_weeks'] += 1;
            }
            if ($timestamp >= strtotime('-7 weeks') && $timestamp < strtotime('-6 weeks')) {
                $activity_8weeks['6_to_7_weeks'] += 1;
            }
            if ($timestamp >= strtotime('-8 weeks') && $timestamp < strtotime('-7 weeks')) {
                $activity_8weeks['7_to_8_weeks'] += 1;
            }
            if ($timestamp >= strtotime('-1 month')) {
                $activity_year['0_1_month'] += 1;
            }
            if ($timestamp >= strtotime('-2 months') && $timestamp < strtotime('-1 month')) {
                $activity_year['1_2_months'] += 1;
            }
            if ($timestamp >= strtotime('-3 months') && $timestamp < strtotime('-2 months')) {
                $activity_year['2_3_months'] += 1;
            }
            if ($timestamp >= strtotime('-4 months') && $timestamp < strtotime('-3 months')) {
                $activity_year['3_4_months'] += 1;
            }
            if ($timestamp >= strtotime('-5 months') && $timestamp < strtotime('-4 months')) {
                $activity_year['4_5_months'] += 1;
            }
            if ($timestamp >= strtotime('-6 months') && $timestamp < strtotime('-5 months')) {
                $activity_year['5_6_months'] += 1;
            }
            if ($timestamp >= strtotime('-7 months') && $timestamp < strtotime('-6 months')) {
                $activity_year['6_7_months'] += 1;
            }
            if ($timestamp >= strtotime('-8 months') && $timestamp < strtotime('-7 months')) {
                $activity_year['7_8_months'] += 1;
            }
            if ($timestamp >= strtotime('-9 months') && $timestamp < strtotime('-8 months')) {
                $activity_year['8_9_months'] += 1;
            }
            if ($timestamp >= strtotime('-10 months') && $timestamp < strtotime('-9 months')) {
                $activity_year['9_10_months'] += 1;
            }
            if ($timestamp >= strtotime('-11 months') && $timestamp < strtotime('-10 months')) {
                $activity_year['10_11_months'] += 1;
            }
            if ($timestamp >= strtotime('-12 months') && $timestamp < strtotime('-11 months')) {
                $activity_year['11_12_months'] += 1;
            }
        }
        
        $activityUser = [
            'activity_24h' => $activity_24h,
            'activity_week' => $activity_week,
            'activity_8weeks' => $activity_8weeks,
            'activity_year' => $activity_year
        ];
        $instrumentCount = count($this->serviceProviderModel->inventory($_SESSION['serviceprovider_id']));
        $studioCount = count($this->serviceProviderModel->studio($_SESSION['serviceprovider_id']));
        $singerCount = count($this->serviceProviderModel->singer($_SESSION['serviceprovider_id']));
        $bandCount = count($this->serviceProviderModel->band($_SESSION['serviceprovider_id']));
        $musicianCount = count($this->serviceProviderModel->musician($_SESSION['serviceprovider_id']));
        $data = [
            'sp' => $sp,
            'lifetimeEarnings' => $lifetimeEarnings,
            'lifetimeOrders' => $lifetimeOrders,
            'spending' => $spending,
            'instrumentCount' => $instrumentCount,
            'studioCount' => $studioCount,
            'singerCount' => $singerCount,
            'bandCount' => $bandCount,
            'musicianCount' => $musicianCount,
            'activityUser' => $activityUser
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $suborders = $this->serviceProviderModel->getOrdersCompleted($_SESSION['serviceprovider_id']);
            $selection = $_POST['selection'];
            $select_text = '';
            $datalist = [];
            if($selection == 'byOrder'){
              $select_text = 'Order';
              foreach ($suborders as $suborder){
                if($suborder->order_placed_on >= $_POST['fromDate'] && $suborder->order_placed_on <= $_POST['toDate']){
                  $datalist[] = $suborder;
                }
              } 
            } else if ($selection == 'byDay'){
                $select_text = 'Day';
                $startDate = new DateTime($_POST['fromDate']);
                $endDate = new DateTime($_POST['toDate']);
                while ($startDate <= $endDate) {
                    $totalForDay = 0;
                    foreach ($suborders as $suborder) {
                        $orderDate = new DateTime($suborder->order_placed_on);
                        if ($startDate->format('Y-m-d') == $orderDate->format('Y-m-d')) {
                            $totalForDay += $suborder->total;
                        }
                    }
                    $dayKey = $startDate->format('Y-m-d');
                    $datalist[$dayKey] = $totalForDay;
                    $startDate->modify('+1 day');
                }
            } else if ($selection == 'byWeek'){
                $select_text = 'Week';
                $startDate = new DateTime($_POST['fromDate']);
                $endDate = new DateTime($_POST['toDate']);
                while ($startDate <= $endDate) {
                  $totalForWeek = 0;
                  foreach ($suborders as $suborder) {
                      $orderDate = new DateTime($suborder->order_placed_on);
                      if ($startDate->format('W') == $orderDate->format('W')) {
                          $totalForWeek += $suborder->total;
                      }
                  }
                  $datalist[$startDate->format('Y-W')] = $totalForWeek;
                  $startDate->modify('+1 week');
                }
              } else if ($selection == 'byMonth'){
                $select_text = 'Month';
                $startDate = new DateTime($_POST['fromDate']);
                $endDate = new DateTime($_POST['toDate']);
                while ($startDate <= $endDate) {
                    $totalForMonth = 0;
                    foreach ($suborders as $suborder) {
                        $orderDate = new DateTime($suborder->order_placed_on);
                        if ($startDate->format('Y-m') == $orderDate->format('Y-m')) {
                            $totalForMonth += $suborder->total;
                        }
                    }
                    $monthYearKey = $startDate->format('F Y');
                    $datalist[$monthYearKey] = $totalForMonth;
                    $startDate->modify('+1 month');
                }
            } else if ($selection == 'byYear'){
                $select_text = 'Year';
                $startDate = new DateTime($_POST['fromDate']);
                $endDate = new DateTime($_POST['toDate']);
                while ($startDate <= $endDate) {
                  $totalForYear = 0;
                  foreach ($suborders as $suborder) {
                      $orderDate = new DateTime($suborder->order_placed_on);
                      if ($startDate->format('Y') == $orderDate->format('Y')) {
                          $totalForYear += $suborder->total;
                      }
                  }
                  $datalist[$startDate->format('Y')] = $totalForYear;
                  $startDate->modify('+1 year');
                }
              }
            $data2 = [
              'datalist' => $datalist,
              'from_date' => $_POST['fromDate'],
              'to_date' => $_POST['toDate'],
              'type' => $select_text,
              'data' => 'AV'
            ];
            $data = array_merge($data, $data2);
            $this->view('serviceproviders/reports', $data);
          } else {
            $data2 = [
              'orders' => 'NA',
              'from_date' => '',
              'to_date' => '',
              'type' => '',
              'data' => 'NA'
            ];
            $data = array_merge($data, $data2);
            $this->view('serviceproviders/reports', $data);
          }
    }

    public function markNotifications(){
        isset($_SESSION['serviceprovider_id']) ? '' : $this->view('serviceproviders/error');
        $this->serviceProviderModel->markNotifications($_SESSION['serviceprovider_id'], date('Y-m-d H:i:s'));
        redirect('serviceproviders/index');
    }
}