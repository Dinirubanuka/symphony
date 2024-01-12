<?php
class Users extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function show()
    {
        // Get users
        $users = $this->userModel->getUsers();

        $data = [
            'users' => $users
        ];

        $this->view('users/show', $data);
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->userModel->deleteUser($id)) {
                flash('user_message', 'User Removed');
                redirect('users/show');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('users/show');
        }
    }
}
