<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Photo_List extends Controller {

    public function photo_List() {
        parent::Controller();
        log_message('debug', 'dmax: photo_List my controller');

        $this->load->library('DX_Auth');

        if ( ! $this->dx_auth->is_logged_in()){
            $this->dx_auth->deny_access('login');
        }

    }

    function index() {

        $this->listview();
    }

    //display list of contacts
    public function listview() {

        $photo_list = Doctrine::getTable('Photo')->findAll();
        $data['photo_list'] = $photo_list;

        $data['view_name'] = "photo_list_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add() {

        $data['view_name'] = "photo_add_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add_submit() {

        $photo = new Photo();

        $photo->title = $this->input->post('title');
        $photo->description = $this->input->post('description');
        $photo->image = $this->input->post('image');
        $photo->photodate = $this->input->post('photodate');

        $photo->save();

        $redirectURL = base_url() . "admin/photo_list/add/" ;
        redirect($redirectURL);
    }

    public function edit($id) {

        $photo_list = Doctrine::getTable('Photo')->find($id);
        $data['photo_list'] = $photo_list;

        $data['view_name'] = "photo_update_view";
        $this->load->view("admin/common/template", $data);
    }

    public function update_submit($id) {

        $photo = new Photo();
        $photo = Doctrine::getTable('Photo')->find($id);

        $photo->title = $this->input->post('title');
        $photo->description = $this->input->post('description');
        $photo->image = $this->input->post('image');
        $photo->photodate = $this->input->post('photodate');
        $photo->save();

        $redirectURL = base_url() . "admin/photo_list/edit/" . $id;
        redirect($redirectURL);
    }

        public function delete() {

            if ($this->input->post('nlist_id')) {
                    foreach ($this->input->post('nlist_id') as $nlist_id) {
                            $this->deleteID($nlist_id);
                    }
             }
            $redirectURL = base_url() . "admin/photo_list";
            redirect($redirectURL);

        }

        private function deleteID($nlist_id) {

            $product = Doctrine::getTable('photo')->find($nlist_id);
            $product->delete();

        }

}