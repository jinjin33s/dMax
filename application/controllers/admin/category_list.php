<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class category_list extends Controller {

    public function category_list() {
        parent::Controller();
        log_message('debug', 'dmax: Category_List my controller');
    }

    function index() {

        $this->listview();
    }

    public function listview() {

        $category_list = Doctrine::getTable('category')->findAll();
        $data['category_list'] = $category_list;

        $data['view_name'] = "category_list_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add() {

        $data['view_name'] = "category_add_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add_submit() {

        $category = new Category();

        $category->name = $this->input->post('name');
        $category->description = $this->input->post('description');
        $category->image = $this->input->post('image');
        $category->banner = $this->input->post('banner');
        $category->save();

        $redirectURL = base_url() . "admin/category_list/add/";
        redirect($redirectURL);
    }

    public function edit($id) {

        $category_list = Doctrine::getTable('category')->find($id);
        $data['categoryList'] = $category_list;

        $data['view_name'] = "category_update_view";
        $this->load->view("admin/common/template", $data);

    }

    public function update_submit($id) {

        $category = new Category();
        $category = Doctrine::getTable('category')->find($id);
        $category->name = $this->input->post('name');
        $category->description = $this->input->post('description');
        $category->image = $this->input->post('image');
        $category->banner = $this->input->post('banner');
        $category->save();

        $redirectURL = base_url() . "admin/category_list/";
        redirect($redirectURL);
    }

    public function delete() {

        if ($this->input->post('clist_id')) {
                foreach ($this->input->post('clist_id') as $clist_id) {
                        $this->deleteID($clist_id);
                }
         }
        $redirectURL = base_url() . "admin/category_list";
        redirect($redirectURL);

    }

    private function deleteID($clist_id) {

            $product = Doctrine::getTable('category')->find($clist_id);
            $product->delete();

        }
       
}