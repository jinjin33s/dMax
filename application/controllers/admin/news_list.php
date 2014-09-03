<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class News_List extends Controller {

    public function News_List() {
        parent::Controller();
        log_message('debug', 'dmax: News_List my controller');

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

        $news_list = Doctrine::getTable('News')->findAll();
        $data['news_list'] = $news_list;

        $data['view_name'] = "news_list_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add() {
        
        $data['view_name'] = "news_add_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add_submit() {

        $news = new News();

        $news->title = $this->input->post('title');
        $news->description = $this->input->post('description');
        $news->image = $this->input->post('image');
        $news->summary = $this->input->post('summary');
        $news->newsdate = $this->input->post('newsdate');

        $news->save();

        $redirectURL = base_url() . "admin/news_list/add/" ;
        redirect($redirectURL);
    }

    public function edit($id) {

        $news_list = Doctrine::getTable('News')->find($id);
        $data['newlist'] = $news_list;
       
        $data['view_name'] = "news_update_view";
        $this->load->view("admin/common/template", $data);
    }

    public function update_submit($id) {

        $news = new News();
        $news = Doctrine::getTable('News')->find($id);

        $news->title = $this->input->post('title');
        $news->description = $this->input->post('description');
        $news->image = $this->input->post('image');
        $news->summary = $this->input->post('summary');
        $news->newsdate = $this->input->post('newsdate');
        $news->save();

        $redirectURL = base_url() . "admin/news_list/edit/" . $id;
        redirect($redirectURL);
    }
        
        public function delete() {

            if ($this->input->post('nlist_id')) {
                    foreach ($this->input->post('nlist_id') as $nlist_id) {
                            $this->deleteID($nlist_id);
                    }
             }
            $redirectURL = base_url() . "admin/news_list";
            redirect($redirectURL);

        }

        private function deleteID($nlist_id) {

            $product = Doctrine::getTable('News')->find($nlist_id);
            $product->delete();

        }
    
}