<?php
class MY_Controller extends CI_Controller {
	public    $need_login = false;
	public $user_info = array('uid'=>'','type'=>0,'project'=>'','position'=>'');
	function __construct() {
                parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->check_login();

	}	
	private function check_login(){
		$this->load->model('project_member_model');
		if($this->need_login){
       			$session_data = $this->session->userdata('user_info');
       			if(!$session_data){
				redirect('/login/', 'refresh');
       			}else{
				$this->user_info['uid'] = $session_data['id'];
                        	$this->user_info['type'] = $session_data['type'];
                        	if($this->user_info['type'] != 1){
                                	$user = $this->project_member_model->get_by_uid($this->user_info['uid']);
                                	if(!empty($user)){
                                	        $this->user_info['project'] = $user['project_id'];
                                       	 	$this->user_info['position'] = $user['position'];
                                	}	
                        	}
				else {
					$this->user_info['position'] = 0;
				}
			}
		}
      	}
}

