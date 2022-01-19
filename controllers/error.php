<?php
class Error extends Controller {
    function __construct() {
        parent::__construct();
    }
    function index(){
        $this->view->title = 'Error';
        $this->view->msg ='Error Occurred';
        echo '<h1>Error:</h1><br/>';
        $this->view->render('error/index');
    }
}

