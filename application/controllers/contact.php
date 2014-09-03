<?php

class Contact extends Controller {

     public function __construct() {
       parent::__construct();
    }

    function index() {
        $this->overview();
    }

    function overview() {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "contact";
        $this->load->view("includes/template_sub", $this->data);
    }

    function contact() {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "contact";
        $this->load->view("includes/template_sub", $this->data);
    }
    
   }
?>
