<?php

class Dashboard extends Controller {

    public function Dashboard() {
        parent::Controller();
        log_message('debug', 'dmax: News_List my controller');

        $this->load->library('DX_Auth');

        if ( ! $this->dx_auth->is_logged_in()){
            $this->dx_auth->deny_access('login');
        }

    }

    function index() {

        $data['view_name'] = "dashboard";
        $this->load->view("admin/common/template", $data);
    }

}
