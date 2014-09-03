<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class S_category_list extends Controller {

    public function S_category_list() {
        parent::Controller();
        log_message('debug', 'dmax: Category_List my controller');
    }

    function index() {

        $this->listview();
    }

    public function listview() {

        $subCategoryModel = new S_category();

        $s_category_list = $subCategoryModel->categoryList();
        $data['s_category_list'] = $s_category_list;

        $data['view_name'] = "s_category_list_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add() {

        $category = Doctrine::getTable('category')->findAll();
        $data['categorylist'] = $category;
        $data['view_name'] = "s_category_add_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add_submit() {

        $category = new s_category();

        $category->name = $this->input->post('name');
        $category->description = $this->input->post('description');
        $category->category_id = $this->input->post('category');
        $category->image = $this->input->post('image');
        $category->save();

        $redirectURL = base_url() . "admin/s_category_list/add/";
        redirect($redirectURL);
    }

    public function edit($id) {

        $category_list = Doctrine::getTable('s_category')->find($id);
        $category = Doctrine::getTable('category')->findAll();//outside

        $data['categoryList'] = $category_list;
        $data['category'] = $category;//outside

        $data['view_name'] = "s_category_update_view";
        $this->load->view("admin/common/template", $data);

    }

    public function update_submit($id) {

        $category = new s_category();
        $category = Doctrine::getTable('s_category')->find($id);
        $category->name = $this->input->post('name');
        $category->description = $this->input->post('description');
        $category->category_id = $this->input->post('category');
        $category->image = $this->input->post('image');
        $category->save();

        $redirectURL = base_url() . "admin/s_category_list/";
        redirect($redirectURL);
    }

    public function delete() {

        if ($this->input->post('clist_id')) {
                foreach ($this->input->post('clist_id') as $clist_id) {
                        $this->deleteID($clist_id);
                }
         }
        $redirectURL = base_url() . "admin/s_category_list";
        redirect($redirectURL);

    }

    private function deleteID($clist_id) {

        $product = Doctrine::getTable('s_category')->find($clist_id);
        $product->delete();

    }
}