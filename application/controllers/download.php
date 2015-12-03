<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	* 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		$this->need_login = false;
        	parent::__construct();
		$this->load->model('app_version_model');
        }
	public function index()
	{
		$app_version = $this->app_version_model->get();
		$data['app'] = $app_version ;
		$this->load->view('download',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
