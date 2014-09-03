<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Controller Class
 *
 * Extends CodeIgniter Controller
 * Basic Model loads and settings set.
 *
 */
class MY_Controller extends Controller
{
    var $data = array();
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->helper('form');
        //$this->view->set_design_folder($this->config->item('config_design_folder'));

        //$gList =   Doctrine::getTable("Genre")->findAll();
       
        //$this->data['genreList'] = $gList;

        
    }

}
// End MY_Controller


// ------------------------------------------------------------------------


/**
 * MY_Admin Class
 *
 * Extends MY_Controller
 *
 */
class MY_Admin extends Controller
{

    public function __construct()
    {
        parent::__construct();


		// Don't want to cache this content
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
		$this->output->set_header("Pragma: no-cache");
    }


	// ------------------------------------------------------------------------


	/**
	 * Sets an error message and call the response method
	 *
	 * @param	string		Message to the user
	 * @param	array		Additional data to put to the answer. Optional.
	 *
	 */
    public function error($message, $addon_data = null)
    {
    	$this->message_type = 'error';
    	$this->message = $message;

    	if ( !isset($this->redirect) )
    	{
    		$this->redirect = $_SERVER['HTTP_REFERER'];
    	}

    	$this->response($addon_data);

		exit();
    }


	// ------------------------------------------------------------------------


	/**
	 * Sets a success message and call the response method
	 *
	 * @param	string		Message to the user
	 * @param	array		Additional data to put to the answer. Optional.
	 *
	 */
    public function success($message, $addon_data = null)
    {
    	$this->message_type = 'success';
    	$this->message = $message;

    	$this->response($addon_data);
    }


	// ------------------------------------------------------------------------


	/**
	 * Sets a notice message and call the response method
	 *
	 * @param	string		Message to the user
	 * @param	array		Additional data to put to the answer. Optional.
	 *
	 */
    public function notice($message, $addon_data = null)
    {
    	$this->message_type = 'notice';
    	$this->message = $message;

    	$this->response($addon_data);
    }


	// ------------------------------------------------------------------------


    /**
     * Send an answer to the browser depending on the incoming request
     * If the request cames from XHR, sends a JSON object as response
     * else, check if redirect is defined and redirect
     *
     * @param	array	Additional data to put to the answer. Optional.
     *
     */
    public function response($addon_data = null)
    {
    	/* XHR request : JSON answer
    	 * Sends a JSON javascript object
    	 *
    	 */
    	if ($this->is_xhr() === true)
    	{
			// Basic JSON answser
    		$data = array (
				'message_type' => $this->message_type,
				'message' => $this->message,
				'update' => $this->update
			);

			// Puts additional data to answer
			if ( ! empty($addon_data))
			{
				$data = array_merge($data, $addon_data);
			}

			// Adds element ID if isset
			if (isset($this->id) )
			{
				$data['id'] = $this->id;
			}
			echo json_encode($data);
    	}
    }
}


/**
 * Base Admin Module Class
 *
 * All modules Admin class must extend this class
 *
 * @author	Martin Wernstahl
 *
 */



/* End of file MY_Controller.php */
/* Location: ./application/libraries/MY_Controller.php */
