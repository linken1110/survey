<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_info extends MY_Controller {
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
		$this->load->model('home_info_model');
		$this->load->model('user_info_model');
		$this->load->model('answer_model');
		$this->load->model('trip_info_model');
		$this->load->model('survey_question_model');
                $this->load->model('question_option_model');
                $this->load->model('question_model');
        }
	public function delete(){
		$id = $this->input->get_post('id');

		$users = $this->user_info_model->get_by_home_id($id);
		if(!empty($users)){
			foreach($users as $user){
				$this->trip_info_model->delete_by_uid($user['id']);
			}
		}
		$this->home_info_model->delete_by_id($id);
		$this->user_info_model->delete_by_home_id($id);
		$this->answer_model->delete_by_home_id($id);
	
		$data['result'] = 1;
		$data['id'] = $id;
		echo json_encode($data);
	}
	public function add(){
		$id = $this->input->get_post('id');
		$question_list = $this->get_question_list($id,1);
		$data['id'] = $id;
		$data['list'] = $question_list;
		$data['user'] = $this->user_info;
		$this->load->view('home_add',$data);
	}
	public function add_home_info(){
		$user = $data['user'] = $this->user_info;
		$pid = $this->input->get_post('id');
		$answer_list = $this->input->get_post('answer_list');
                $address = $this->input->get_post('address');
                $lng = $this->input->get_post('lng');
                $lat = $this->input->get_post('lat');
		$home_num = $this->home_info_model->get_home_num($user['uid']);
                $newId= sprintf('%03s', $pid);
                $newUid= sprintf('%04s', $user['uid']);
                $newNum= sprintf('%03s', $home_num['num']+1 );
                $num = $newId.$newUid.$newNum."00";

		$home_id = $this->home_info_model->insert(array('address'=>$address,'lat'=>$lat,'lng'=>$lng,'type'=>"入住户",'user_id'=>$user['uid'],'create_date'=>date('Y-m-d H:i:s',time()),'home_id'=>99,'project_id'=>$pid,'identifier'=>$num));
		if(!empty($answer_list)){
                        $answer = explode(';',$answer_list);
                        if(!empty($answer)){
                                        foreach($answer as $tmp){
                                                if(!empty($tmp)){
                                                        $str = explode(':',$tmp);
                                                        $num = $str[0];
                                                        $content = $str[1];
                                                        $this->answer_model->insert(array('number'=>$num,'home_id'=>$home_id,'result'=>$content));
                                                }
                                        }
                                }
                }

		redirect("/survey_result/index?id=".$pid, 'refresh');
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
