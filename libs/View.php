<?php
class View {
    function __construct() {
    }
    public function render($viewName){
        $viewFile = 'views/'. $viewName .'.php';
        if(file_exists($viewFile)){
            require 'views/header.php';
            require $viewFile;
            require 'views/footer.php';
        }
    }

}
