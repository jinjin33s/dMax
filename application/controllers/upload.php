<?php
class Upload extends Controller
{
	function Upload()
	{
		parent::Controller();
		$this->load->helper('form');
		$this->load->helper('url');
	}
	
	
	/*
	*	Display upload form
	*/
	function index()
	{
		$this->load->view('upload/view');
	}
	
	
	/*
	*	Handles JSON returned from /js/uploadify/upload.php
	*/
	function uploadify()
	{
		
		//Decode JSON returned by /js/uploadify/upload.php
		$file = $this->input->post('filearray');
		$data['json'] = json_decode($file);
		
		$this->load->view('upload/uploadify',$data);
	}
	
}
/* End of File /application/controllers/upload.php */