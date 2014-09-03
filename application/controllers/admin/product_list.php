<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Product_list extends Controller {

    public function Product_list() {
        parent::Controller();
        log_message('debug', 'dmax: Product_list my controller');
    }

    function index() {
        
        $this->listview();
    }

    function listview(){

        $offset = $this->uri->segment(4);

        if(empty($offset))
        {
            $offset = 0;
        }
        $perPage = 10;
        $ProductModel = new Product();
        $this->load->library('Pagination');
        $config['base_url'] = base_url() . 'admin/product_list/listview/';
        $config['total_rows'] = $ProductModel->getAdminCount();
        $config['per_page'] = $perPage;
        $config['num_links'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);        
        $subCategory = $ProductModel->getAdminList($offset,$perPage);        
        $this->data['product_list'] = $subCategory;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['view_name'] = "product_list_view";
        $this->load->view("admin/common/template", $this->data);
    }
    
    public function add() {

        $category = Doctrine::getTable('category')->findAll();
        $s_category = Doctrine::getTable('s_category')->findAll();

        $data['categoryList'] = $category;
        $data['subCategoryList'] = $s_category;
        $data['view_name'] = "product_add_view";
        $this->load->view("admin/common/template",$data);
    }

    public function add_submit() {

        $product = new Product();

        $product->name = $this->input->post('name');
        $product->title = $this->input->post('title');
        $product->tag = $this->input->post('tag');
        $product->features = $this->input->post('features');
        $product->specifications = $this->input->post('specifications');
        $product->dimensions = $this->input->post('dimensions');
        $product->image = $this->input->post('image');
        $product->subimage1 = $this->input->post('subimage1');
        $product->subimage2 = $this->input->post('subimage2');
        $product->subimage3 = $this->input->post('subimage3');
        $product->subimage4 = $this->input->post('subimage4');
        $product->subimage5 = $this->input->post('subimage5');
        $product->subimage6 = $this->input->post('subimage6');
        $product->manual = $this->input->post('manual');
        $product->catalog = $this->input->post('catalog');
        $product->cad = $this->input->post('cad');
        $product->software = $this->input->post('software');
        $product->rpName1 = $this->input->post('rpName1');
        $product->rpImg1 = $this->input->post('rpImg1');
        $product->rpDown11 = $this->input->post('rpDown11');
        $product->rpDown12 = $this->input->post('rpDown12');
        $product->rpName2 = $this->input->post('rpName2');
        $product->rpImg2 = $this->input->post('rpImg2');
        $product->rpDown21 = $this->input->post('rpDown21');
        $product->rpDown22 = $this->input->post('rpDown22');
        $product->rpName3 = $this->input->post('rpName3');
        $product->rpImg3 = $this->input->post('rpImg3');
        $product->rpDown31 = $this->input->post('rpDown31');
        $product->rpDown32 = $this->input->post('rpDown32');
        $product->rpName4 = $this->input->post('rpName4');
        $product->rpImg4 = $this->input->post('rpImg4');
        $product->rpDown41 = $this->input->post('rpDown41');
        $product->rpDown42 = $this->input->post('rpDown42');
        $product->sub_category_id = $this->input->post('sub_category_id');
        
        $product->save();

        $redirectURL = base_url() . "admin/product_list/add/";
        redirect($redirectURL);
    }

    public function edit($id) {

        $product = Doctrine::getTable('Product')->find($id);
        $subCategory_list = Doctrine::getTable('S_category')->findAll();
        $category_list = Doctrine::getTable('Category')->findAll();
        $data['product'] = $product;
        $data['subCategoryList'] = $subCategory_list;
        $data['categoryList'] = $category_list;

        $data['view_name'] = "product_update_view";
        $this->load->view("admin/common/template", $data);
    }

    public function update_submit($id) {

        $product = new Product();
        
        $product = Doctrine::getTable('Product')->find($id);
        $product->name = $this->input->post('name');
        $product->title = $this->input->post('title');
        $product->tag = $this->input->post('tag');
        $product->features = $this->input->post('features');
        $product->specifications = $this->input->post('specifications');
        $product->dimensions = $this->input->post('dimensions');
        $product->image = $this->input->post('image');
        $product->subimage1 = $this->input->post('subimage1');
        $product->subimage2 = $this->input->post('subimage2');
        $product->subimage3 = $this->input->post('subimage3');
        $product->subimage4 = $this->input->post('subimage4');
        $product->subimage5 = $this->input->post('subimage5');
        $product->subimage6 = $this->input->post('subimage6');
        $product->manual = $this->input->post('manual');
        $product->catalog = $this->input->post('catalog');
        $product->cad = $this->input->post('cad');
        $product->software = $this->input->post('software');
        $product->rpName1 = $this->input->post('rpName1');
        $product->rpImg1 = $this->input->post('rpImg1');
        $product->rpDown11 = $this->input->post('rpDown11');
        $product->rpDown12 = $this->input->post('rpDown12');
        $product->rpName2 = $this->input->post('rpName2');
        $product->rpImg2 = $this->input->post('rpImg2');
        $product->rpDown21 = $this->input->post('rpDown21');
        $product->rpDown22 = $this->input->post('rpDown22');
        $product->rpName3 = $this->input->post('rpName3');
        $product->rpImg3 = $this->input->post('rpImg3');
        $product->rpDown31 = $this->input->post('rpDown31');
        $product->rpDown32 = $this->input->post('rpDown32');
        $product->rpName4 = $this->input->post('rpName4');
        $product->rpImg4 = $this->input->post('rpImg4');
        $product->rpDown41 = $this->input->post('rpDown41');
        $product->rpDown42 = $this->input->post('rpDown42');
        $product->sub_category_id = $this->input->post('sub_category_id');
        
        $product->save();

        $redirectURL = base_url() . "admin/product_list/edit/" . $id;
        redirect($redirectURL);
    }

    public function delete() {

        if ($this->input->post('plist_id')) {
                foreach ($this->input->post('plist_id') as $plist_id) {
                        $this->deleteID($plist_id);
                }
         }
        $redirectURL = base_url() . "admin/product_list";
        redirect($redirectURL);

    }

    private function deleteID($plist_id) {

        $product = Doctrine::getTable('Product')->find($plist_id);
        $product->delete();

    }

    function search()
    {
        $offset = $this->uri->segment(3);
        if(empty($offset))
        {
            $offset = 0;
        }
        $perPage = 10;

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

        $product_list = $productModel->getSearchListAdmin($srchStr,$offset,$perPage);
        $this->load->library('Pagination');
        $config['base_url'] = base_url() . 'admin/product_list/search/';
        $config['total_rows'] = $productModel->getSearchCount($srchStr);
        $config['per_page'] = $perPage;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['product_list'] = $product_list;
        $this->data['view_name'] = "product_list_view";
        $this->data['srchStr'] = $srchStr;
        $this->load->view("admin/common/template", $this->data);  
    }

}