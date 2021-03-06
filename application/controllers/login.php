<?php
	
class Login extends MY_Controller{
		public function __construct(){
			parent::__construct();
            		$this->load->model('account_model');
			$this->load->library('session');
		}
		public function index(){
			
			$this->load->view('login');
		}
	public function do_login(){
		$data =array();
		$login_name = $this->input->get_post('name');
		$password = $this->input->get_post('password');
		if(!$login_name || !$password){
			$data['code'] = 4001;
			$data['message'] = 'error parameters';
			$this->load->view('login',$data);
			return;
		}
		//step1:check uid
		$user = $this->account_model->get_user_by_nickname($login_name);
		if(!empty($user)){
			if(sha1($password) == $user['pass']){
				$this->session->set_userdata('user_info',$user);
				redirect('/survey_result/home_page', 'refresh');
				return;
			}
		}
		$data['code'] = 4002;
		$data['message'] = 'login failed';
		$this->load->view('login',$data);
                        return;
	}
	 public function do_login_web(){
                $data =array();
                $login_name = $this->input->get_post('name');
                $password = $this->input->get_post('password');
                if(!$login_name || !$password){
                        $data['code'] = 4001;
                        $data['message'] = 'error parameters';
                        $this->load->view('login',$data);
                        return;
                }
                //step1:check uid
                $user = $this->account_model->get_user_by_nickname($login_name);
                if(!empty($user) &&  $user['is_web']){
                        if(sha1($password) == $user['pass']){
                                $this->session->set_userdata('user_info',$user);
                                redirect('/survey_result/home_page', 'refresh');
                                return;
                        }
                }
                $data['code'] = 4002;
                $data['message'] = 'login failed';
                $this->load->view('login',$data);
                        return;
        }
	public function update_password(){
		$data =array();
                $login_name = $this->input->get_post('name');
                $password = $this->input->get_post('password');
                if(!$login_name || !$password){
                        $data['code'] = 4001;
                        $data['message'] = 'error parameters';
                        $this->load->view('login',$data);
                        return;
                }
                //step1:check uid
                $user = $this->account_model->get_user_by_nickname($login_name);
                if(!empty($user)){
			$this->account_model->update($user['id'],array('pass'=>sha1($password)));
			$data['code'] = 0;
                	$data['message'] = 'ok';
                }
                $data['code'] = 4002;
                $data['message'] = 'login failed';
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
			$result = $this->account_model->get_user_by_udid($udid);
		}else if($os_type == 2){
			$result = $this->account_model->get_user_by_macaddress($mac_address);
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
			if ($this->account_model->update($result['user_id'], $param)) {
				$data['code'] = 1;
				$data['message'] = 'success';
			} else {
				$data['code'] = 4004;
				$data['message'] = 'system error';
			}
		}
		return $data;
	}
	public function register_user(){
		$data = array('code'=>0,'user_id'=>'','message'=>'');
                $login_name = $this->input->get_post('login_name');
                $password = $this->input->get_post('password');
		if(!$login_name || !$password){
                        $data['code'] = 4001;
                        $data['message'] = 'error parameters';
                        echo json_encode($data);
                        return;
                }	
		$user = $this->account_model->get_user_by_nickname($login_name);
		if(!empty($user)){
			$data['code'] = 4002;
                        $data['message'] = 'user name has already exist';
                        echo json_encode($data);
                        return;
		}
		 $param = array(
                                                                'create_date'=>date("Y-m-d H:i:s" ,time() ) ,
                                                                'name'=>$login_name,
                                                           'pass'=>sha1($password));
                                $uid = $this->account_model->insert($param);
		$data['code'] = 1;
		$data['user_id'] = $uid;
		$data['message'] = 'ok';
		echo json_encode($data);
	}
}
?>
