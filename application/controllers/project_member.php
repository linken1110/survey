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
		$this->load->view('member_list',$data);
	}
	public function add_project(){
		$data['user'] = $this->user_info;
		$this->load->view('add_project',$data);
	}
	public function edit_project(){
		$id = $this->input->get('id');
		$data['info'] = $this->project_model->get_by_id($id);
                $data['user'] = $this->user_info;
                $this->load->view('edit_project',$data);
        }
	public function delete_project(){
		$id = $this->input->get('id');
		$data['user'] = $this->user_info;
                $data['list'] = $this->project_model->get_all();
                $this->load->view('project_list',$data);
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
	public function add(){
		$id = $this->input->post('id');
                $name = $this->input->post('name');
                $province = $this->input->post('province');
                $description = $this->input->post('description');
                $create_time = $this->input->post('create_time');
                $param = array('name'=>$name,
                                'description'=>$description,
                                'province'=>$province,
                                'create_time'=>$create_time);
		$this->project_model->insert($param);
                $data['user'] = $this->user_info;
                $data['list'] = $this->project_model->get_all();
                $this->load->view('project_list',$data);

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
