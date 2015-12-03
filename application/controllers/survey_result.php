<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey_result extends MY_Controller {
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
		$this->load->model('project_model');
		$this->load->model('account_model');
		$this->load->model('category_model');
		$this->load->model('project_category_model');
		$this->load->model('home_info_model');
		$this->load->model('survey_question_model');
		$this->load->model('question_option_model');
		$this->load->model('question_model');
		$this->load->model('answer_model');
		$this->load->model('user_info_model');
		$this->load->model('trip_info_model');
        }
	public function home_page(){
		$user = $data['user'] = $this->user_info;
		if($this->user_info['type'] == 1){
			$data['list'] = $this->project_model->get_all();
			$this->load->view('survey_project_list',$data);
		}else{
			$this->index($user['project']);
		}
	}
	public function survey_list(){
		$id = $this->input->get_post('id');
		$user_list = $this->user_info_model->get_by_home_id($id);
		if(!empty($user_list)){

		}
		$home_info = $this->home_info_model->get($id);
		$data['pid'] = $home_info['project_id'];
		$data['list'] = $user_list;
		$data['user'] = $this->user_info;
		$data['id'] = $id;
                $this->load->view('survey_list',$data);
	}
	public function home_list(){
		$pid = $this->input->get_post('pid');
		$uname = $this->input->get_post('uname');
		$date = $this->input->get_post('date');
		$user = $this->account_model->get_user_by_nickname($uname);
		$param1 = array('project_id'=>$pid);
                $param2 = array();
                $param = array();
                if(!empty($user)){
                        $param1=array_merge($param1,array('user_id'=> $user['id']));
                }if(!empty($date)){
                        $param2=array('date(create_date)'=>date($date));
                }
                $param = array_merge($param1,$param2);
		$result = $this->home_info_model->get_by_condition($param);
		$data['user'] = $this->user_info;
		$data['result'] = 1;
		$data['list'] = $result ;
		$data['count'] = count($result);
	//	echo json_encode($data);
		$this->load->view('home_list',$data);
	}
	public function index($pid=0){
		if(empty($pid)){
		$pid = $this->input->get_post('id');
		}
		$home_list = $this->home_info_model->get_by_pid($pid);
                $totul_num = $this->trip_info_model->get_num_by_pid($pid);
                $user_num = $this->trip_info_model->get_user_num_by_pid($pid);
		$data['project_info'] = $this->project_model->get_by_id($pid);
                $data['user'] = $this->user_info;
                $data['list'] = $home_list;
                $data['id'] = $pid;
                $data['home_count'] = 0;
                $data['user_count'] = count($user_num);
                $data['trip_count'] = 0;
                if(!empty($home_list)){
                        $data['home_count'] = count($home_list);
                }
                if(!empty($totul_num)){
                        $data['trip_count'] = $totul_num['num'];
                }
		$this->load->view('main',$data);
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
	public function edit_category(){
                $id = $this->input->get('id');
                $data['info'] = $this->project_model->get_by_id($id);
                $data['user'] = $this->user_info;
		$list = $this->project_category_model->get_by_pid($id);
                if(!empty($list)){
                        foreach($list as $tmp){
                                $category = $this->category_model->get_by_id($tmp['category_id']);
                                $result[] = $category;
                        }
                }

                $data['list'] = $result;
		$data['id'] = $id;
		$this->load->view('edit_category',$data);
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
	public function home_info(){
		$id = $this->input->get_post('id');
		$home_info = $this->home_info_model->get($id);
		
                $data['user'] = $this->user_info;
		$list = array();
		$question_list = $this->get_question_list($home_info['project_id'],1);
		if(!empty($question_list)){
			foreach($question_list as $question){
				$answer = $this->answer_model->get_by_condition(array('number'=>$question['number'],'home_id'=>$id));
				$question['answer'] = 0;
				if(!empty($answer)){
					$question['answer'] = $answer[0]['result'];
				}
				$list[] = $question;
			}
		}
		$data['info'] = $home_info;
		$data['list'] = $list;
		$this->load->view('home_info',$data);
        }
	private function get_question_list($pid,$category){
		$result = array();
                $question_list = $this->survey_question_model->get_by_condition(array('survey_id'=>$pid,'category_id'=>$category));
                if(!empty ($question_list)){
                	foreach ($question_list as $question){
                        	$result[] = $this->get_question($question['question_id']);
                        }
                }
               	return $result;
	}
	private function get_question($question_id){
                        $data = array();
                        $question = $this->question_model->get_by_id($question_id);
                        if(!empty ($question)){
                                $data['id'] = $question['id'];
                                $data['type'] = $question['type'];
                                $data['category_id'] = $question['category_id'];
                                $data['question'] = $question['question'];
                                $data['option_list'] = $this->question_option_model->get_by_questionid($question_id);
                                $data['is_parent']  = ($question['type'] == 0)?1:0;
                                $data['default']  = $question['default_value'];
				$data['number']  = $question_id;
                        }
                        return $data;
       	}
	public function update_home_info(){
		$id = $this->input->get_post('id');
		$answer_list = $this->input->get_post('answer_list');
		$address = $this->input->get_post('address');
		$lng = $this->input->get_post('lng');
		$lat = $this->input->get_post('lat');
		$this->home_info_model->update($id,array('address'=>$address,'lng'=>$lng,'lat'=>$lat));
		if(!empty($answer_list)){
			$answer = explode(';',$answer_list);
			if(!empty($answer)){
                                        foreach($answer as $tmp){
                                                if(!empty($tmp)){
                                                        $str = explode(':',$tmp);
                                                        $num = $str[0];
                                                        $content = $str[1];
                                                        $this->answer_model->update_result(array('number'=>$num,'home_id'=>$id),$content);
                                                }
                                        }
                                }
		}
		$data['result']= 1;
                echo json_encode($data);
	}
	public function add_user(){
		$id = $this->input->get_post('id');
		$pid = $this->input->get_post('pid');
		$data['user'] = $this->user_info;
                $question_list = $this->get_question_list($pid,2);
                $data['home_id'] = $id ;
                $data['pid'] = $pid;
                $data['list'] = $question_list;
		$this->load->view('add_user_info',$data);
	}
	public function user_add(){
		$home_id = $this->input->get_post('home_id');
		$question_list = $this->input->get_post('question_list');
		$user_num = $this->user_info_model->get_user_num($home_id);
		$home_info = $this->home_info_model->get($home_id);
                $num = $home_info['identifier'] + $user_num['num']+1;
		$num = sprintf('%012s',$num);
		$people_id = $this->user_info_model->insert(array('home_id'=>$home_id,'people_id'=>99,'identifier'=>$num));
		$arrs = explode('|',$question_list);
                                                if(!empty($arrs)){
                                                        foreach($arrs as $arr){
                                                                $key_values = explode(':',$arr);
                                                                if(!empty($key_values) && !empty($key_values[0])){
                                                                        $question = $key_values[0];
                                                                        $answer = $key_values[1];
                                                                        $this->answer_model->insert(array('home_id'=>$home_id,'number'=>$question,'result'=>$answer,'user_id'=>$people_id));
                                                                }
                                                        }
                                                }
		$data['result'] = 1;
		$data['id'] = $people_id;
		echo json_encode($data);
	}
	public function user_update(){
		$question_list = $this->input->get_post('question_list');
		$uid = $this->input->get_post('uid');
		$arrs = explode('|',$question_list);
		if(!empty($arrs)){
                	foreach($arrs as $arr){
                        	$key_values = explode(':',$arr);
                                if(!empty($key_values) && !empty($key_values[0])){
                                	$question = $key_values[0];
                                        	$answer = $key_values[1];
                                              	$this->answer_model->update($uid,$question,$answer);
                              	}
                        }
                }
		$data['result'] = 1;
                echo json_encode($data);
	}
	public function quest_info(){
		$id = $this->input->get_post('id');
		$pid = $this->input->get_post('pid');
                $data['user'] = $this->user_info;
		$list = array();
		$list1 = array();
                $question_list = $this->get_question_list($pid,2);
                if(!empty($question_list)){
                        foreach($question_list as $question){
                                $answer = $this->answer_model->get_by_condition(array('number'=>$question['number'],'user_id'=>$id));
                                $question['answer'] = 0;
                                if(!empty($answer)){
                                        $question['answer'] = $answer[0]['result'];
                                }
                                $list[] = $question;
                        }
                }
		$question_list1 = $this->get_question_list($pid,3);
		if(!empty($question_list1)){
                        foreach($question_list1 as $question){
                                $answer = $this->answer_model->get_by_condition(array('number'=>$question['number'],'user_id'=>$id));
                                $question['answer'] = 0;
                                if(!empty($answer)){
                                        $question['answer'] = $answer[0]['result'];
                                }
                                $list[] = $question;
                        }
                }
		$data['uid'] = $id ;
		$data['pid'] = $pid;
                $data['list'] = $list;
		$trip_list = $this->trip_info_model->get_by_uid($id);
		$data['trip_list'] = $trip_list;
                $this->load->view('quest_info',$data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
