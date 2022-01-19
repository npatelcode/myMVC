<?php

class Contact_Model extends Model {
    private $_tbl_company = 'company_settings';
    function __construct() {
        parent::__construct();
    }
    function getContactInfo(){
       $stmt=$this->db->prepare('SELECT * FROM '.$this->_tbl_company);
       $stmt->setFetchMode(PDO::FETCH_OBJ);
       if($stmt->execute()){
        $data=$stmt->fetch();
        $str='<h3>'.$data->comp_name . '</h3>' .
                    'Address : <br/>'. $data->address1 .', '.
                    $data->address2 . ', <br />' .
                    $data->city . ', ' . $data->province . ', ' . $data->zipcode . '<br/>'.
                    $data->country .'<br/>' .
                    'Phone : ' .$data->phone . '<br/>'.
                    'Fax : ' . $data->fax . '<br/>'.
                    'Email : ' . $data->email . '<br/>';
        echo $str;
        exit;       
       }else{
           echo 'Error occured while getting contact information';
           exit;
       }
    }

}

