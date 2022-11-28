<?php

require_once('Model_Profile.php');
require_once('View_Profile.php');

class ContProfile 
{
    private $view;
    private $model;
    private $action;

    public function __construct() 
    {
        $this->view = new ViewProfile();
        $this->view->menuProfile();
        $this->model = new ModelProfile();
        $this->action = isset($_GET['action']) ? $_GET['action'] : " ";
    }

    public function getAction() {
        return $this->action;
    }

    public function profil() {
        $this->view->show_profile($this->model->getUserDetails());
    }

    public function otherProfile(){
        $this->view->show_other_profile($this->model->getOtherUser());
    }

    public function exec() {
        $this->view->view();
    }
}