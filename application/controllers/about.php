<?php 

class About extends Controller {

     public function __construct() {
       parent::__construct();
    }

    function index() {
        $this->overview();
    }

    function overview() {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "history";
        $this->load->view("includes/template_sub", $this->data);
    }

    function history() {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "history";
        $this->load->view("includes/template_sub", $this->data);
    }

    function certification () {
        $this->data['left_menu'] = 'left_menu';
        $this->data['main_content'] = "certification";
        $this->load->view("includes/template_sub", $this->data);
    }

    function signup() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $message = $this->input->post('message');

        $this->load->helper('date');
        $format = 'DATE_RFC822';
        $time = time();

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;

        $this->load->library('email');

        $this->email->initialize($config);
        $this->email->from($email);

        $this->email->to('jinjin33s@gmail.com');
        //$this->email->cc('chrisk@mozzign.com');

        $this->email->subject('Got message from [Contact Infomation In D-Max] Page');
        $this->email->message('Message from [Contact Infomation]' . "\n" . 'Date - ' . standard_date($format, $time) . "\n" . 'Name - ' . $name . "\n" . 'E-Mail - ' . $email . "\n" . 'Phone Number - ' . $phone . "\n" . 'Message - ' . $message . "\n");
        $this->email->send();

        echo $this->email->print_debugger();

        

        $redirectURL = "http://dev.mozzign.com/dmax/contact";
        redirect($redirectURL);
    }

   }
?>
