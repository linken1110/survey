<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends MY_Controller {
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
		$this->load->model('project_category_model');
		$this->load->model('category_model');
		$this->load->model('survey_question_model');
		$this->load->model('question_model');
        }
	public function quest_list(){
		$id = $this->input->get_post('id');
		$category_id = $this->input->get_post('category_id');
		$list  = $this->survey_question_model->get_by_condition(array('survey_id'=>$id,'category_id'=>$category_id));
		$result = array();
		if(!empty($list)){
			foreach($list as $tmp){
				$question = $this->question_model->get_by_id($tmp['question_id']);
				$result[] = $question;
			}
		}
		$data['list'] = $result;
		$data['user'] = $this->user_info;
		$this->load->view('quest_list',$data);
	}
	public function category_list(){
		$id = $this->input->get_post('id');
		$result = array();
		$list = $this->project_category_model->get_by_pid($id);
		if(!empty($list)){
			foreach($list as $tmp){
				$category = $this->category_model->get_by_id($tmp['category_id']);
				$result[] = $category;
			}
		}
		$data['user'] = $this->user_info;

		$data['list'] = $result;
		$data['pid'] = $id;
		$this->load->view('category_list',$data);
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
		$province = $this->input->get_post('province');
		$search_time = $this->input->get_post('search_time');
		$param1 = array();
		$param2 = array();
		$param = array();
		if(!empty($province)){
			$param1=array('province'=> $province);
		}if(!empty($search_time)){
			$param2=array('year(create_time)'=>$search_time);
		}
		$param = array_merge($param1,$param2);
		$result = $this->project_model->get_by_condition($param);
		$data['user'] = $this->user_info;
		$data['list'] = $result;
		$data['province']  = $province;
		$data['search_time'] = $search_time;
		$this->load->view('project_list',$data);
          
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
