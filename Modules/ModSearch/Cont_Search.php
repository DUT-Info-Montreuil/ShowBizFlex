<?php

require_once('Model_Search.php');
require_once('View_Search.php');

class ContSearch 
{
    private $view;
    private $model;
    private $action;

    public function __construct() 
    {
        $this->view = new ViewSearch();
        $this->model = new ModelSearch();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "search";
    }

    public function getAction() {
        return $this->action;
    }

    // Search page
    public function search() {
        $this->view->show_searchResults();
    }

    public function exec() {
        $this->view->view();
    }
}