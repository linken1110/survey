<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
		$this->need_login = true;
        	parent::__construct();
        }
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function main(){

		$this->load->view('index');
	}
	public function admin(){
		$this->load->view('admin-index');
	}
	public function test(){
		$this->load->view('test');	
	}
	public function map(){
                $this->load->view('map');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
