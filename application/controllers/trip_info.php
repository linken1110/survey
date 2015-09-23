<?php
	
class Trip_info extends MY_Controller{
		public function __construct(){
			parent::__construct();
            		$this->load->model('trip_info_model');
			$this->load->model('home_info_model');
			$this->load->model('user_info_model');
			$this->load->model('answer_model');
			$this->load->model('question_model');
			$this->load->model('survey_question_model');		
			$this->load->model('question_option_model');
			$this->load->model('project_model');
		}
		public function add_trip(){
			$uid = $this->input->get_post('uid');
			$project_id = 0;
			$user_info = $this->user_info_model->get_user_by_uid($uid);
			$home_info = $this->home_info_model->get($user_info['home_id']);
			$project_id = $home_info['project_id'];
			$purpose = $this->input->get_post('purpose');
			$people_num = $this->input->get_post('people_num');
			$start_time = $this->input->get_post('start_time');
			$end_time = $this->input->get_post('end_time');
			$start_address = $this->input->get_post('start_address');
			$end_address = $this->input->get_post('end_address');
			$start_lng = $this->input->get_post('start_lng');
			$start_lat = $this->input->get_post('start_lat');
			$end_lng = $this->input->get_post('end_lng');
			$end_lat = $this->input->get_post('end_lat');
			$iswalk = $this->input->get_post('iswalk');
			$outway = $this->input->get_post('outway');
			$pay_off = $this->input->get_post('pay_off');
			$start_station = $this->input->get_post('start_station');
			
			$end_station = $this->input->get_post('end_station');
                        $to_subway_time = $this->input->get_post('to_subway_time');
                        $to_dest_time = $this->input->get_post('to_dest_time');
                        $to_subway_cost = $this->input->get_post('to_subway_cost');
                        $to_dest_cost = $this->input->get_post('to_dest_cost');
                        $start_address_type = $this->input->get_post('start_address_type');
			$end_address_type = $this->input->get_post('end_address_type');
			$this->trip_info_model->insert(array('user_id'=>$uid,'purpose'=>$purpose,'people_num'=>$people_num,'start_time'=>$start_time,'end_time'=>$end_time,'start_address'=>$start_address,'start_address_type'=>$start_address_type,'end_address'=>$end_address,'end_address_type'=>$end_address_type,'start_lng'=>$start_lng,'start_lat'=>$start_lat,'end_lng'=>$end_lng,'end_lat'=>$end_lat,'iswalk'=>$iswalk,'outway'=>$outway,'pay_off'=>$pay_off,'start_station'=>$start_station,'end_station'=>$end_station,'to_subway_time'=>$to_subway_time,'to_dest_time'=>$to_dest_time,'to_subway_cost'=>$to_subway_cost,'to_dest_cost'=>$to_dest_cost,'project_id'=>$project_id));
			$home_list = $this->home_info_model->get_by_pid($project_id);
               		$data['user'] = $this->user_info;
                	$data['list'] = $home_list;
                	$data['id'] = $project_id;
                	$this->load->view('map_main',$data);
                	return;
		}
	public function delete_trip(){
		$id = $this->input->get_post('id');
		$this->trip_info_model->delete_by_id($id);
		$data['result'] =1;
		echo json_encode($data);
	
	}
	private function get_question_list($pid,$category){
                $result = array();
                $question_list = $this->survey_question_model->get_by_condition(array('survey_id'=>$pid,'category_id'=>$category));
                if(!empty ($question_list)){
                        foreach ($question_list as $question){
                                $result[] = $this->get_question($question['question_id'],$question['number']);
                        }
                }
                return $result;
        }
        private function get_question($question_id,$number){
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
                                $data['number']  = $number;
                        }
                        return $data;
        }
}
?>
