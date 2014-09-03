<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Support_list extends Controller {

    public function Support_list() {
        parent::Controller();
        log_message('debug', 'dmax: Support_list my controller');

        $this->load->library('DX_Auth');

        if ( ! $this->dx_auth->is_logged_in()){
            $this->dx_auth->deny_access('login');
        }

    }

    function index() {

        $this->listview();
    }

    public function listview() {
        $support_list = Doctrine::getTable('Supports')->findAll();
        $data['support_list'] = $support_list;
        $data['view_name'] = "support_list_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add() {

        $data['view_name'] = "support_add_view";
        $this->load->view("admin/common/template",$data);
    }

    public function add_submit() {

        $support = new Supports();

        $support->name = $this->input->post('name');
        $support->description = $this->input->post('description');
        $support->image1 = $this->input->post('image1');
        $support->image2 = $this->input->post('image2');
        $support->file1 = $this->input->post('file1');
        $support->file2 = $this->input->post('file2');
        $support->file3 = $this->input->post('file3');
        $support->file4 = $this->input->post('file4');
        
        $support->save();

        $redirectURL = base_url() . "admin/support_list/add/";
        redirect($redirectURL);
    }

    public function edit($id) {
        $support_list = Doctrine::getTable('Supports')->find($id);
        $data['supportList'] = $support_list;

        $data['view_name'] = "support_update_view";
        $this->load->view("admin/common/template", $data);
    }

    public function update_submit($id) {

        $support = new Supports();

        $support = Doctrine::getTable('Supports')->find($id);
        $support->name = $this->input->post('name');
        $support->description = $this->input->post('description');
        $support->image1 = $this->input->post('image1');
        $support->image2 = $this->input->post('image2');
        $support->file1 = $this->input->post('file1');
        $support->file2 = $this->input->post('file2');
        $support->file3 = $this->input->post('file3');
        $support->file4 = $this->input->post('file4');

        $support->save();

        $redirectURL = base_url() . "admin/support_list/edit/" . $id;
        redirect($redirectURL);
    }

        public function delete() {

            if ($this->input->post('slist_id')) {
                    foreach ($this->input->post('slist_id') as $slist_id) {
                            $this->deleteID($slist_id);
                    }
             }
            $redirectURL = base_url() . "admin/support_list";
            redirect($redirectURL);

    }

        private function deleteID($slist_id) {

            $support = Doctrine::getTable('Supports')->find($slist_id);
            $support->delete();

        }        

}