<?php

class Products extends Controller {

     public function __construct() {
       parent::__construct();
    }

    function index() {
        $this->overview();
    }

    function overview() {
        $this->data['main_content'] = "cctv-camera";
        $this->load->view("includes/template_sub", $this->data);
    }

    function category() {
        $categoryId = $this->uri->segment(3);        
        $this->data['main_content'] = 'category';
        $selectedCategory = Doctrine::getTable("Category")->find($categoryId);
        $this->data['selectedCategory'] = $selectedCategory;
        $this->data['main_category_id'] = $selectedCategory->id;
        $this->load->view("includes/template_sub", $this->data);
    }

    function detail() {
        $mainCategroy_id = $this->uri->segment(3);
        $product_id = $this->uri->segment(4);
        $product = Doctrine::getTable('Product')->find($product_id);
        $category = Doctrine::getTable('S_category')->find($product_id);
        $this->data['product'] = $product;
        $this->data['main_category_id'] = $mainCategroy_id;
        $this->data['main_content'] = "product_detail";
        $this->load->view("includes/template_sub", $this->data);
    }

    function subCategory() {
        $mainCategroy_id = $this->uri->segment(3);
        $subCategory_id = $this->uri->segment(4);
        $offset = $this->uri->segment(5);

        if(empty($offset))
        {
            $offset = 0;
        }
        $perPage = 6;


        $ProductModel = new Product();
        $subCategory = $ProductModel->getList($offset,$perPage,$subCategory_id);
        $this->load->library('Pagination');

        $config['total_rows'] = $ProductModel->getCount($subCategory_id);
        $config['per_page'] = $perPage;
        $config['base_url'] = base_url() . 'products/subCategory/' . $mainCategroy_id."/".$subCategory_id .'/';
        $config['num_links'] = 3;
        //$config['first_tag_open'] = '<div>';
        $config['first_link'] = 'First';
        //$config['first_tag_close'] = '</div>';
        //$config['last_tag_open'] = '<div>';
        $config['last_link'] = 'Last';
        //$config['last_tag_close'] = '</div>';
        $config['uri_segment'] = 5;  //needs to point where the offiset uri element position is 

	   

        $this->pagination->initialize($config);
	 
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['subCategory'] = $subCategory;
        $this->data['main_content'] = "subCategory";
        $this->data['main_category_id'] = $mainCategroy_id;
        $this->load->view("includes/template_sub", $this->data);
    }

    function search() {
        $mainCategroy_id = "";
        $offset = $this->uri->segment(3);

        if(empty($offset))
        {
            $offset = 0;
        }
        $perPage = 3;
        
        $productModel = new Product();

        $srchStr ="";
        if ($_POST)
        {
            $srchStr = $this->input->post('searchStr');
            $this->session->set_userdata(array('searchStr' => $srchStr));
        }
        else{
            $srchStr =$this->session->userdata('searchStr');
        }

        $product_list = $productModel->getSearchList($srchStr,$offset,$perPage);
        $this->load->library('Pagination');
        $config['base_url'] = base_url() . 'products/search/';
        $config['total_rows'] = $productModel->getSearchCount($srchStr);
        $config['per_page'] = $perPage;
        $config['num_links'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['product_list'] = $product_list;
        $this->data['main_content'] = "search";
        $this->data['srchStr'] = $srchStr;
        $this->data['main_category_id'] = $mainCategroy_id;
        $this->load->view("includes/template_sub", $this->data);        
    }

   }

?>
