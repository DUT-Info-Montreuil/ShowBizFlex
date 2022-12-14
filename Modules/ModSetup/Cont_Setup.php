<?php

require_once('Model_Setup.php');
require_once('View_Setup.php');

class ContSetup 
{
    private $view;
    private $model;
    private $action;

    public function __construct() 
    {
        $this->view = new ViewSetup();
        $this->model = new ModelSetup();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "genres";
    }

    public function getAction() {
        return $this->action;
    }

    // Setup page
    public function genres() {
        $this->view->show_selectGenres();
    }

    public function settingUp() {
        $this->view->show_settingUp();
    }

    public function exec() {
        $this->view->view();
    }
}

/*
ShowBizFlex - 2022/12/05
GNU GPL CopyLeft 2022-2032
Initiated by Rachid ABDOULALIME - Steven CHING - Yanis HAMANI
WebSite : <https://dev.showbizflex.com/>
*/