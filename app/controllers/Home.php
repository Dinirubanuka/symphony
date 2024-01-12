<?php
class Home extends Controller
{
    private $homeModel;
    public function __construct()
    {
        $this->homeModel = $this->model('Moderator');
    }

    public function show()
    {

        $data = [
            'home' => "Home"
        ];

        $this->view('home/show', $data);
    }
}
