<?php

class Page extends Controller {

	public function __construct() {
            parent::__construct();
            
         }
	
	function index()
	{
            $this->data['left_menu'] = 'left_menu';

            $this->data['main_content'] = 'home';

            $newsModel = new News();
            $this->data['news'] = $newsModel->getLastNews();

            $bannerModel = new Banner();
            $this->data['banner'] = $bannerModel->getLastBanner();

            $this->data['meta'] ='';
            /*
            $categoryModel = new P_category();
            $this->data['category'] = $categoryModel->getListCategory();
            */
            $this->load->view('includes/template_home',$this->data);

	}

        /*
        function viewHome($pageName)
        {
            $this->data['left_menu'] = 'left_menu';
            
            $this->data['main_content'] = $pageName;
            $this->load->view('includes/template_home',$this->data);
        }
        */

        function viewSub($pageName)
        {
            $this->data['left_menu'] = 'left_menu';
            $this->data['main_content'] = $pageName;

            $this->load->view('includes/template_sub',$this->data);
        }

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
