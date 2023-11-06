<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $this->view('pages/index');
    }

    public function about(){
      $this->view('pages/about');
    }

    public function loginchoice(){
      $this->view('pages/loginchoice');
    }

    public function registerchoice(){
      $this->view('pages/registerchoice');
    }

    public function serviceProviderRegister(){
      $this->view('serviceproviders/serviceproviderregister');      
    }

    public function eventpackage(){
      $this->view('moderators/eventpackage');      
    }

  }