<?php

class serviceproviders extends Controller
{
    private $serviceProviderModel;

    public function __construct()
    {
        $this->serviceProviderModel = $this->model('serviceprovider');
    }

    public function index()
    {
        $this->view('serviceproviders/index');
    }

    //view profile
    public function profile()
    {
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
        $this->view('serviceproviders/profile', $data);
    }

    public function inventory()
    {
        $inventory = $this->serviceProviderModel->inventory($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $this->view('serviceproviders/inventory', $data);
    }

    public function inventoryDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $inventory = $this->serviceProviderModel->inventory($_SESSION['serviceprovider_id']);
            $data = [
                'inventory' => $inventory
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function fetchSingers()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $inventory = $this->serviceProviderModel->singer($_SESSION['serviceprovider_id']);
            $data = [
                'inventory' => $inventory
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function fetchStudio()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $inventory = $this->serviceProviderModel->studio($_SESSION['serviceprovider_id']);
            $data = [
                'inventory' => $inventory
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    //thumbnail category
    public function inventoryAll()
    {
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
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/profile');
                } else {
                    die('Something went wrong');
                }
            } else {

                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'D:/Xaamp/htdocs/symphony/public/img/mag_img/' . $new_img_name;
                $bool = move_uploaded_file($tmp_name, $img_upload_path);

                if ($this->serviceProviderModel->photoUpdate($new_img_name)) {
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/profile');
                } else {
                    die('Something went wrong');
                }
            }

        }
    }

    public function editDetail($serviceprovider_id)
    {
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
            $this->view('serviceproviders/edit', $data);
        } else {
            $this->view('serviceproviders/edit', $data);
        }
    }

    public function edititem($product_id)
    {
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
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
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
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
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

    public function addStudio()
    {
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
                    redirect('serviceproviders/studio');
                } else {
                    die('Something went wrong');
                }
            } else {
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
                $img_upload_path = 'http://localhost/symphony/img/serviceProvider/' . $new_img1_name;
                $bool = move_uploaded_file($tmp1_name, $img_upload_path);
            }

            if ($error2 === UPLOAD_ERR_NO_FILE) {
                $new_img2_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img2_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'http://localhost/symphony/img/serviceProvider/' . $new_img2_name;
                $bool = move_uploaded_file($tmp2_name, $img_upload_path);
            }

            if ($error3 === UPLOAD_ERR_NO_FILE) {
                $new_img3_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img3_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'http://localhost/symphony/img/serviceProvider/' . $new_img3_name;
                $bool = move_uploaded_file($tmp3_name, $img_upload_path);
            }

            if ($error4 === UPLOAD_ERR_NO_FILE) {
                $new_img4_name = 'IMG-656bdc23223334.62765635.png';
            } else {
                $img_ex = pathinfo($img4_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img4_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'http://localhost/symphony/img/serviceProvider/' . $new_img4_name;
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
                    redirect('serviceproviders/singer');
                } else {
                    die('Something went wrong');
                }
            } else {
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

    public function editStudio($product_id)
    {
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
                    redirect('serviceproviders/studio');
                } else {
                    die('Something went wrong');
                }
            } else {
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
        $data = file_get_contents("php://input");
        $requestData = json_decode($data, true);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $requestData && isset($requestData['instruments'])) {
            if (empty($requestData['instruments'])) {
                $_SESSION['instrumentList'] = "NULL";
            } else {
                $_SESSION['instrumentList'] = $requestData['instruments'];
            }
            $_SESSION['locationList'] = $requestData['location'];
            echo json_encode(['success' => 'request success', 'instruments' => $_SESSION['instrumentList']]);
        } else {
            echo json_encode(['error' => 'Invalid data format']);
        }
    }

    public function deleteitem($product_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->serviceProviderModel->deleteitem($product_id);
            redirect('serviceproviders/inventory');
        } else {
            redirect('serviceproviders/inventory');
        }
    }

    public function deleteStudio($product_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->serviceProviderModel->deleteStudio($product_id);
            redirect('serviceproviders/inventory');
        } else {
            redirect('serviceproviders/inventory');
        }
    }

    public function editconfirm()
    {
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
                    // flash('register_success', 'You are registered and can log in');
                    redirect('serviceproviders/profile');
                } else {
                    die('Something went wrong ');
                }
            } else {
                $this->view('serviceproviders/edit', $data);
            }

        } else {
            redirect('serviceproviders/profile');
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->serviceProviderModel->delete($_SESSION['serviceprovider_id'])) {
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
                    $this->view('serviceproviders/succesfull', $data);
                } else {
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
                    // flash('register_success', 'You are registered and can log in');
                    $this->view('serviceproviders/verification');
                } else {
                    die('Something went wrong');
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

    public function createserviceprovidersession($serviceprovider)
    {

        $_SESSION['serviceprovider_id'] = $serviceprovider->serviceprovider_id;
        $_SESSION['serviceprovider_email'] = $serviceprovider->business_email;
        $_SESSION['serviceprovider_name'] = $serviceprovider->business_name;
        redirect('serviceproviders/index');

    }

    public function logout()
    {
        unset($_SESSION['serviceprovider_id']);
        unset($_SESSION['serviceprovider_email']);
        unset($_SESSION['serviceprovider_name']);
        session_destroy();
        redirect('pages/index');
    }

    public function Instrument()
    {
        $inventory = $this->serviceProviderModel->inventory($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $this->view('serviceproviders/inventory', $data);
    }

    public function Studio()
    {
        $inventory = $this->serviceProviderModel->studio($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $this->view('serviceproviders/studio');
    }

    public function Singer()
    {
        $inventory = $this->serviceProviderModel->singer($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $this->view('serviceproviders/singer');
    }

    public function Band()
    {
        $inventory = $this->serviceProviderModel->band($_SESSION['serviceprovider_id']);
        $data = [
            'inventory' => $inventory
        ];
        $this->view('serviceproviders/band');
    }

    public function viewSinger($product_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $singerDetails = $this->serviceProviderModel->viewSinger($product_id);
            if ($singerDetails) {
//            die(print_r($singerDetails));
                $this->view('serviceproviders/viewSinger', $singerDetails);
            } else {
//                var_dump('singer fetch err..);
            }
        }
    }
}