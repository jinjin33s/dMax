<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Banner_List extends Controller {

    public function Banner_List() {
        parent::Controller();      
        log_message('debug', 'dmax: Banner_List my controller');

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

        $news_list = Doctrine::getTable('Banner')->findAll();
        $data['banner_list'] = $news_list;

        $data['view_name'] = "banner_list_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add() {
        
        $data['view_name'] = "banner_add_view";
        $this->load->view("admin/common/template", $data);
    }

    public function add_submit() {

        $banner = new Banner();

        $banner->npTitle = $this->input->post('npTitle');
        $banner->npImg = $this->input->post('npImg');
        $banner->npLink = $this->input->post('npLink');
        $banner->fpTitle = $this->input->post('fpTitle');
        $banner->fpImg = $this->input->post('fpImg');
        $banner->fpLink = $this->input->post('fpLink');

        $banner->save();

        $redirectURL = base_url() . "admin/banner_list/add/" ;
        redirect($redirectURL);
    }

    public function edit() {
        
        $banner_list = Doctrine::getTable('Banner')->find('1');
        $data['bannerlist'] = $banner_list;
       
        $data['view_name'] = "banner_update_view";
        $this->load->view("admin/common/template", $data);
    }

    public function update_submit() {

        $banner = new Banner();
        $banner = Doctrine::getTable('Banner')->find("1");

        $banner->npTitle = $this->input->post('npTitle');
        $banner->npImg = $this->input->post('npImg');
        $banner->npLink = $this->input->post('npLink');
        $banner->fpTitle = $this->input->post('fpTitle');
        $banner->fpImg = $this->input->post('fpImg');
        $banner->fpLink = $this->input->post('fpLink');

        $banner->save();

        $redirectURL = base_url() . "admin/banner_list/edit/1";
        redirect($redirectURL);
    }       
        
    
}