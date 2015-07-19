<?php
	
class User extends CI_Controller{
	private $password = "test123456";	
		public function __construct(){
			parent::__construct();
            $this->load->model('user_info_model');
		}
	
		public function quick_login(){
		$data = array('code'=>0,'user_id'=>'','message'=>'');
		$mac_address = $this->input->get_post('mac_address');
		$udid = urldecode($this->input->get_post('udid'));
		$os_type = $this->input->get_post('os_type');
		$os_version = $this->input->get_post('os_version');

		if(is_null ($os_type) || ($os_type == 1 && !$udid) || ($os_type == 2 && !$mac_address)){

			$data['code'] = 4001;
			$data['message'] = 'error parameters';
            echo json_encode($data);
            return;
		}
		if($os_type == 1){//ios			
			$result = $this->user_info_model->get_user_by_udid($udid);
			if(empty ($result)){
				$param = array('udid'=>$udid,
							   'create_time'=>date("Y-m-d H:i:s" ,strtotime( time() )) ,
								'nickname'=>'unkonwuser',
							   'os_type'=>$os_type,
							   'password'=>sha1($this->password));
				$uid = $this->user_info_model->insert($param);
				$data['user_id'] = $uid;
				$data['code'] = 1;
				$data['message'] = 'success';
			}
			else{
				$data['user_id'] = $result['user_id'];
				$data['code'] = 1;
				$data['message'] = 'success';
			}
		}else if($os_type == 2){
			$result = $this->user_info_model->get_user_by_macaddress($mac_address);
			if(empty ($result)){
				$param = array('udid'=>$udid,
								'create_time'=>date("Y-m-d H:i:s" ,strtotime( time() )) ,
								'nickname'=>'unkonwuser',
							   'os_type'=>$os_type,
							   'password'=>sha1($this->password));
				$uid = $this->user_info_model->insert($param);
				$data['user_id'] = $uid;
				$data['code'] = 1;
				$data['message'] = 'success';
			}
			else{
				$data['user_id'] = $result['user_id'];
				$data['code'] = 1;
				$data['message'] = 'success';
			}
			
		}
            echo json_encode($data);
	}
	public function login(){
		$data = array('code'=>0,'user_id'=>'','message'=>'');
		$login_name = $this->input->get_post('login_name');
		$password = $this->input->get_post('password');
		if(!$login_name || !$password){
			$data['code'] = 4001;
			$data['message'] = 'error parameters';
			echo json_encode($data);
			return;
		}
		//step1:check uid
		$user = $this->user_info_model->get_user_by_uid($login_name);
		if(!empty($user)){
			if(sha1($password) == $user['password']){
				$data['user_id'] = $user['user_id'];
				$data['code'] = 1;
				$data['message'] = 'success';
				echo json_encode($data);
				return;
			}
		}
		$user = $this->user_info_model->get_user_by_phone($login_name);
		if(!empty($user)){
			if(sha1($password) == $user['password']){
				$data['user_id'] = $user['user_id'];
				$data['code'] = 1;
				$data['message'] = 'success';
				echo json_encode($data);
				return;
			}
		}
		$user = $this->user_info_model->get_user_by_email($login_name);
		if(!empty($user)){
			if(sha1($password) == $user['password']){
				$data['user_id'] = $user['user_id'];
				$data['code'] = 1;
				$data['message'] = 'success';
				echo json_encode($data);
				return;
			}
		}
		$data['code'] = 4002;
		$data['message'] = 'login failed';
		echo json_encode($data);
	}
	public function update_nickname(){
		$data = array('code'=>0,'message'=>'');
		$os_type = $this->input->get_post('os_type');
		$nickname = urldecode($this->input->get_post('nickname'));
		$mac_address = $this->input->get_post('mac_address');
		$udid = urldecode($this->input->get_post('udid'));
		if(empty ($os_type) || ($os_type == 1 && !($udid)) || ($os_type == 2 && !($mac_address))){
			$data['code'] = 4001;
			$data['message'] = 'error parameters';
			echo json_encode($data);
			return;
		}
		if(!$nickname){
			$data['code'] = 4005;
			$data['message'] = 'error nickname';
			echo json_encode($data);
			return;
		}
		if($os_type == 1){//ios
			$result = $this->user_info_model->get_user_by_udid($udid);
		}else if($os_type == 2){
			$result = $this->user_info_model->get_user_by_macaddress($mac_address);
		}
		$data = $this->_update_nickname($result,$nickname);
		echo json_encode($data);
		return;
	}
	private function _update_nickname($result,$nickname){
		$data = array('code'=>0,'message'=>'');
		if(empty ($result)){
			$data['code'] = 4003;
			$data['message'] = 'user error';
		}
		else {
			$param = array('nickname' => $nickname,
				'update_time' => date("Y-m-d H:i:s", strtotime(time()))
			);
			if ($this->user_info_model->update($result['user_id'], $param)) {
				$data['code'] = 1;
				$data['message'] = 'success';
			} else {
				$data['code'] = 4004;
				$data['message'] = 'system error';
			}
		}
		return $data;
	}
	private function reqister_user(){

	}
}
?>
