<?php

class NewsEvent extends Controller {

     public function __construct() {
       parent::__construct();

    }

    function index() {
        $this->overview();
    }

    function overview() {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "news";
        $newsModel = new News();
        $this->data['newsList'] = $newsModel->getNewsList();
        $this->load->view("includes/template_sub", $this->data);
    }

    function news() {
        
        $offset = $this->uri->segment(3);
        if(empty($offset))
        {
            $offset = 0;
        }
        $perPage = 10;

        $newsModel = new News();

        $news_list = $newsModel->getSearchList($offset,$perPage);
        $this->load->library('Pagination');
        $config['base_url'] = base_url() . 'newsEvent/news/';
        $config['total_rows'] = $newsModel->getSearchCount();
        $config['per_page'] = $perPage;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['newsList'] = $news_list;
        $this->data['main_content'] = "news";
        $this->load->view("includes/template_sub", $this->data);
    }

    function detail() {
        $news_id = $this->uri->segment(3);
        $news = Doctrine::getTable('News')->find($news_id);
        $this->data['news'] = $news;
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "newsDetail";
        $this->load->view("includes/template_sub", $this->data);
    }    

    function photo() {
        
        $offset = $this->uri->segment(3);
        if(empty($offset))
        {
            $offset = 0;
        }
        $perPage = 5;

        $photoModel = new Photo();

        $photo_list = $photoModel->getSearchList($offset,$perPage);
        $this->load->library('Pagination');
        $config['base_url'] = base_url() . 'newsEvent/photo/';
        $config['total_rows'] = $photoModel->getSearchCount();
        $config['per_page'] = $perPage;
        //$config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['photoList'] = $photo_list;
        $this->data['main_content'] = "photo";
        $this->load->view("includes/template_sub", $this->data);

    }

    function photodetail() {

        $photo_id = $this->uri->segment(3);
        $photo = Doctrine::getTable('Photo')->find($photo_id);
        $this->data['photo'] = $photo;
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "photoDetail";
        $this->load->view("includes/template_sub", $this->data);
    }

    function search() {
        $offset = $this->uri->segment(3);
        if(empty($offset))
        {
            $offset = 0;
        }
        $perPage = 3;

        $productModel = new Product();

        $product_list = $productModel->getSearchList($offset,$perPage);
        $this->load->library('Pagination');
        $config['base_url'] = base_url() . 'products/search/';
        $config['total_rows'] = $productModel->getSearchCount();
        $config['per_page'] = $perPage;
        //$config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['product_list'] = $product_list;
        $this->data['main_content'] = "search";
        $this->load->view("includes/template_sub", $this->data);
    }
    
	
}
?>
