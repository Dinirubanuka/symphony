<?php
class Serviceproviders extends Controller
{
    private $serviceproviderModel;
    public function __construct()
    {
        $this->serviceproviderModel = $this->model('Serviceprovider');
    }

    public function show()
    {
        // Get serviceproviders
        $serviceproviders = $this->serviceproviderModel->getServiceproviders();

        $data = [
            'serviceproviders' => $serviceproviders
        ];

        $this->view('serviceproviders/show', $data);
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->serviceproviderModel->deleteServiceprovider($id)) {
                flash('serviceprovider_message', 'Service Provider Removed');
                redirect('serviceproviders/show');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('serviceproviders/show');
        }
    }
}
