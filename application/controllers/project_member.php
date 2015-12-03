<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_member extends MY_Controller {
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
		$this->load->model('project_member_model');
		$this->load->model('account_model');
        }
	public function member_list(){
		$id = $this->input->get_post('id');
		$data['user'] = $this->user_info;
		$result = $this->project_member_model->get_by_pid($id);
		$list = array();
		if(!empty($result)){
			foreach($result as $tmp){
				$user = $this->account_model->get_user_by_uid($tmp['uid']);
				$tmp['name'] = $user['name'];
				$list[] = $tmp;
			}
		}
		$data['list'] = $list;
		$data['id'] = $id;
		$this->load->view('member_list',$data);
	}
	public function add_member(){
		$id = $this->input->get_post('id');
		$data['user'] = $this->user_info;
		$data['id'] = $id;
		$this->load->view('add_member',$data);
	}
	public function delete_member(){
		$id = $this->input->get_post('pid');
		$uid = $this->input->get_post('uid');
		$this->project_member_model->delete_by_id($id,$uid);
		$data['user'] = $this->user_info;
		$result = $this->project_member_model->get_by_pid($id);
                $list = array();
                if(!empty($result)){
                        foreach($result as $tmp){
                                $user = $this->account_model->get_user_by_uid($tmp['uid']);
                                $tmp['name'] = $user['name'];
                                $list[] = $tmp;
                        }
                }
                $data['list'] = $list;
		$data['id'] = $id;
                $this->load->view('member_list',$data);
	}
	public function update(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$province = $this->input->post('province');
		$description = $this->input->post('description');
		$create_time = $this->input->post('create_time');
		$param = array('name'=>$name,
				'description'=>$description,
				'province'=>$province,
				'create_time'=>$create_time);
		$this->project_model->update($id,$param);
		$data['user'] = $this->user_info;
                $data['list'] = $this->project_model->get_all();
                $this->load->view('project_list',$data);

	}
	public function auto_add(){
		$id = $this->input->get_post('id');
		$position = $this->input->get_post('position');
		$from = $this->input->get_post('from');
		$to = $this->input->get_post('to');
		for($i = $from; $i<=$to;$i++){
			$name = sprintf("%04d", $i);
			$user = $this->account_model->get_user_by_nickname($name);
                	if(!empty($user)){continue;}
			$param = array(
                                                                'create_date'=>date("Y-m-d H:i:s" ,time() ) ,
                                                                'name'=>$name,
                                                           'pass'=>sha1($name));
                                $uid = $this->account_model->insert($param);
                	if($uid >0){
                        $param = array('project_id'=>$id,
                                'uid'=>$uid,
                                'position'=>$position,
                                );
                        $this->project_member_model->insert($param);
                	}
		}
	}
	public function add(){
		$id = $this->input->get_post('id');
                $name = $this->input->get_post('name');
                $pass = $this->input->get_post('pass');
                $position = $this->input->get_post('position');
		$data['user'] = $this->user_info;
		if(!$name || !$pass){
			$data['message'] = '用户名和密码不能为空';
                        $this->load->view('error',$data);
                        return;
		}
		 $user = $this->account_model->get_user_by_nickname($name);
                if(!empty($user)){
                        $data['message'] = '注册失败,用户名已经存在';
			$this->load->view('error',$data);
                        return;
                }
                 $param = array(
                                                                'create_date'=>date("Y-m-d H:i:s" ,time() ) ,
                                                                'name'=>$name,
                                                           'pass'=>sha1($pass));
                                $uid = $this->account_model->insert($param);
		if($uid >0){
        	        $param = array('project_id'=>$id,
                                'uid'=>$uid,
                                'position'=>$position,
                                );
			$this->project_member_model->insert($param);
			$result = $this->project_member_model->get_by_pid($id);
                	$list = array();
                	if(!empty($result)){
                        foreach($result as $tmp){
                                $user = $this->account_model->get_user_by_uid($tmp['uid']);
                                $tmp['name'] = $user['name'];
                                $list[] = $tmp;
                        }
                	}
                	$data['list'] = $list;
			$data['id'] = $id;
                	$this->load->view('member_list',$data);
		}else{
			$data['message'] = '系统错误';
                        $this->load->view('error',$data);
		}

	}
	public function search(){
		$name = $this->input->get_post('name');
		$list= array();
		$user = $this->account_model->get_user_by_nickname($name);
		if(!empty ($user)){
			$member = $this->project_member_model->get_by_uid($user['id']);
			$member['name'] = $user['name'];
			$list[] = $member;
		}
		$data['user'] = $this->user_info;
		$data['list'] = $list;
		$this->load->view('member_list',$data);
          
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
