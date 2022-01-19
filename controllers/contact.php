<?php
class Contact extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('contact/js/default.js');
    }
    function index(){
        $this->view->title = 'Contact Us';
        $this->view->render('contact/index');
    }
    function getContactInfo(){
        $this->model->getContactInfo();
    }

}