<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soda extends MY_Controller {

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
        }
	public function index()
	{
		$this->load->view('soda.html');
	}
	public function test(){
	//	for($i = 1005;$i<2000;$i++){
			$this->http(1005,1005);
	//	}
	}
	public function http($name,$pass){
		$ch  = curl_init();
                $url = "http://120.26.221.121/project_member/add?id=1&name=".$name."&pass=".$pass."&position=2";
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $result_str = curl_exec($ch);
		$result = json_decode($result_str, true);
		print_r($result);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
