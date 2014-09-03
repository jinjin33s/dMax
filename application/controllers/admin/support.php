<?php

class Support extends Controller {

     public function __construct() {
       parent::__construct();
    }

    function index() {
        $this->overview();
    }

    function overview() {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "download";
        $this->data['product'] = '';
        $this->load->view("includes/template_sub", $this->data);
    }

    function box() {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "box";
        $boxModel = new Product();
        $this->data['boxList'] = $boxModel->getBoxList();
        $this->load->view("includes/template_sub", $this->data);
    }

   }
?>
