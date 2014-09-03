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

    function download() {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "download";
        $downloadModel = new Product();
        $this->data['categoryList'] = Doctrine::getTable('category')->findAll();
        $this->data['subCategoryList'] = Doctrine::getTable('s_category')->findAll();
        $this->data['downloadList'] = $downloadModel->getDownloadList();
        $this->load->view("includes/template_sub", $this->data);
    }

    function select($select) {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "download";
        $downloadModel = new Product();
        $this->data['downloadList'] = $downloadModel->getSelectList();
        $this->load->view("includes/template_sub", $this->data);
    }

    function tech() {

        $offset = $this->uri->segment(3);
        if(empty($offset))
        {
            $offset = 0;
        }
        $perPage = 10;

        $techModel = new Supports();

        $tech_list = $techModel->getTechList($offset,$perPage);
        $this->load->library('Pagination');
        $config['base_url'] = base_url() . 'support/tech/';
        $config['total_rows'] = $techModel->getCount();
        $config['per_page'] = $perPage;        
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['techList'] = $tech_list;
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "tech";
        $this->load->view("includes/template_sub", $this->data);
    }

    function detail() {
        $tech_id = $this->uri->segment(3);
        $tech = Doctrine::getTable('Supports')->find($tech_id);
        $this->data['techList'] = $tech;
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "tech-support";
        $this->load->view("includes/template_sub", $this->data);
    }

    function faq() {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "faq";
        $this->load->view("includes/template_sub", $this->data);
    }

   }
?>
