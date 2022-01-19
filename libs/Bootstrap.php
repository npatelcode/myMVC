<?php
class Bootstrap {
    private $_url = null;
    private $_controller = null;
    
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    
    private $_errorFile = 'error.php';    
    private $_defaultFile ='index.php';
    
    function init(){        
        $this->_getURL();
        if(empty($this->_url[0])){
            $this->_loadDefaultController();
        }
        $this->_loadExistingController();
        $this->_callControllerMethod();
        //$this->_loadModel();
        
    }
    private function _getURL(){
        $url=isset($_GET['url'])?$_GET['url']:null;
        $url=  rtrim($url,'/');
        $url=  filter_var($url, FILTER_SANITIZE_URL);
        $this->_url =  explode('/',$url);
    }
    private function _loadDefaultController(){
        require $this->_controllerPath.$this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
        exit;
    }
    private function _loadExistingController(){
        $file=$this->_controllerPath.$this->_url[0].'.php';
        if(file_exists($file)){
            require $file;
            $this->_controller= new $this->_url[0];  
            $this->_controller->loadModel($this->_url[0],$this->_modelPath);
        }else{
           $this->_getError();
        }
    }
    public function _callControllerMethod(){
        $length=  count($this->_url);
        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_getError();
            }
        }
            switch ($length){
                case 2:
                    $this->_controller->{$this->_url[1]}();
                    break;
                case 3:
                    $this->_controller->{$this->_url[1]}($this->_url[2]);
                    break;
                case 4:
                    $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
                    break;
                default :
                    $this->_controller->index();
                    break;
            }
    }
    private function _getError(){
        require $this->_controllerPath.$this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->index();
        exit;
    }
}
    
