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
		$this->load->model('project_model');
		$this->load->model('survey_question_model');
		$this->load->model('question_model');
		$this->load->model('question_option_model');
		$this->load->model('trip_question_option_model');
		$this->load->model('survey_trip_question_model');
        }
	public function quest_list(){
		$id = $this->input->get_post('id');
                $category_id = $this->input->get_post('category_id');
		$this->get_quest_list($id,$category_id);
	}
	public function get_quest_list($id,$category_id){
		$list  = $this->survey_question_model->get_by_condition(array('survey_id'=>$id,'category_id'=>$category_id));
		$result = array();
		if(!empty($list)){
			foreach($list as $tmp){
				$question = $this->question_model->get_by_id($tmp['question_id']);
				$result[] = $question;
			}
		}
		$data['id'] = $id;
		$data['category'] = $this->category_model->get_by_id($category_id);
		$data['list'] = $result;
		$data['user'] = $this->user_info;
		$status = 0;
		if($category_id == 4){
			$question = $this->survey_trip_question_model->get_by_id($id,1);
			if(!empty ($question)){
				$status = $question['status'];
			}
			$data['status'] = $status;
			$data['options1'] = $this->trip_question_option_model->get_by_type($id,1);
                        $data['options2'] = $this->trip_question_option_model->get_by_type($id,2);
                        $data['options3'] = $this->trip_question_option_model->get_by_type($id,3);
			$this->load->view('trip_quest_list',$data);
		}else{
			$this->load->view('quest_list',$data);
		}
	}
	public function delete_question(){
		$id = $this->input->get_post('id');
		$pid = $this->input->get_post('pid');
		$this->question_model->delete_by_id($id);
		$this->survey_question_model->delete_by_question_id($id);
                $category_id = $this->input->get_post('category_id');
                $this->get_quest_list($pid,$category_id);	
	}
	public function category_list(){
		$id = $this->input->get_post('id');
		$result = array();
		$list = $this->project_category_model->get_by_pid($id);
		if(!empty($list)){
		$a = substr( $list['category_id'], 0, 1 );
                        $b = substr( $list['category_id'], 1, 1 );
                        $c = substr( $list['category_id'], 2, 1 );
                        $d = substr( $list['category_id'], 3, 1 );
                        if($a ==1){
                                $result[] = $this->category_model->get_by_id(1);
                        }
                        if($b ==1){
                                $result[] = $this->category_model->get_by_id(2);
                        }
                        if($c ==1){
                                $result[] = $this->category_model->get_by_id(3);
                        }
                        if($d ==1){
                                $result[] = $this->category_model->get_by_id(4);
                        }
		}
		$data['user'] = $this->user_info;

		$data['list'] = $result;
		$data['pid'] = $id;
		$this->load->view('category_list',$data);
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
                                $data['sub_question'] = $this->get_subquestion($question_id);
				$data['default'] = $question['default_value'];
                        }
                        return $data;
                }
	private function get_subquestion($question_id){
                        $result = array();
                        $data = $this->question_model->get_by_parentid($question_id);
                        if(!empty($data)){
                                foreach($data as $tmp){
                                $question = $this->get_question($tmp['id']);

				}
                        }
                        return $result;
       }
	public function edit_question(){
		$id = $this->input->get_post('id');
		$pid = $this->input->get_post('pid');
		$question = $this->get_question($id);
		$data['user'] = $this->user_info;
		$data['question'] = $question;
		$data['pid'] = $pid;
		if($question['is_parent'] == 0){
			$this->load->view('edit_question',$data);
		}else{
			$this->load->view('sub_quest_list',$data);
		}
	}
	public function add_question(){
		$id = $this->input->get_post('id');
                $category_id = $this->input->get_post('category_id');
		$data['user'] = $this->user_info;
                $data['category'] = $this->category_model->get_by_id($category_id);
		$data['project'] = $this->project_model->get_by_id($id);
		$this->load->view('add_quest',$data);
	}
	public function update_trip(){
		$pid = $this->input->get_post('pid');
		$status = $this->input->get_post('status');
		$options1 = $this->input->get_post('option1_list');
		$options2 = $this->input->get_post('option2_list');
		$options3 = $this->input->get_post('option3_list');
		$this->update_trip_question($options1,$pid,1);
		$this->update_trip_question($options2,$pid,2);
		$this->update_trip_question($options3,$pid,3);
		$tmp = $this->survey_trip_question_model->get_by_id($pid,1);
		if(empty($tmp)){
			$this->survey_trip_question_model->insert(array('survey_id'=>$pid,'number'=>1,'status'=>$status));
		}else{
			$this->survey_trip_question_model->update($pid,array('number'=>1,'status'=>$status));
		}
		$result = array();
                $list = $this->project_category_model->get_by_pid($pid);
                if(!empty($list)){
                $a = substr( $list['category_id'], 0, 1 );
                        $b = substr( $list['category_id'], 1, 1 );
                        $c = substr( $list['category_id'], 2, 1 );
                        $d = substr( $list['category_id'], 3, 1 );
                        if($a ==1){
                                $result[] = $this->category_model->get_by_id(1);
                        }
                        if($b ==1){
                                $result[] = $this->category_model->get_by_id(2);
                        }
                        if($c ==1){
                                $result[] = $this->category_model->get_by_id(3);
                        }
                        if($d ==1){
                                $result[] = $this->category_model->get_by_id(4);
                        }
                }
                $data['user'] = $this->user_info;

                $data['list'] = $result;
                $data['pid'] = $pid;
                $this->load->view('category_list',$data);
	}
	private function update_trip_question($options,$id,$type){
		$option_list = $this->trip_question_option_model->get_by_type($id,$type);
		$option_str = "";
		if(!empty ($option_list)){
                                foreach($option_list as $option){
                                        $option_str = $option_str.$option['number'].":".$option['content'].";";
                                }
			}
                        if($options !== $option_str){
                                $this->trip_question_option_model->delete_by_type($id,$type);
                                $this->add_trip_option_list($options,$id,$type);
                        }
	}
	public function update(){
		$id = $this->input->get_post('id');
		$pid = $this->input->get_post('pid');
		$question = $this->input->get_post('question');
		$type = $this->input->get_post('type');
		$options = $this->input->get_post('option_list');
		$default = $this->input->get_post('default');
		$option_str ="";
		if($type == 2 || $type == 3){
			$option_list = $this->question_option_model->get_by_questionid($id);
			if(!empty ($option_list)){
				foreach($option_list as $option){
					$option_str = $option_str.$option['number'].":".$option['content'].";";
				}
			}
			if($options !== $option_str){
				$this->question_option_model->delete_by_questionid($id);
				$this->add_option_list($options,$id);
			}
		}
		$this->question_model->update($id,array('type'=>$type,'question'=>$question,'default_value' =>$default));
		$question = $this->get_question($id);
		$category_id = $question['category_id'];
                $list  = $this->survey_question_model->get_by_condition(array('survey_id'=>$pid,'category_id'=>$category_id));
                $result = array();
                if(!empty($list)){
                        foreach($list as $tmp){
                                $question = $this->question_model->get_by_id($tmp['question_id']);
                                $result[] = $question;
                        }
                }
                $data['id'] = $pid;
                $data['category'] = $this->category_model->get_by_id($category_id);
                $data['list'] = $result;
                $data['user'] = $this->user_info;
                $this->load->view('quest_list',$data);	
	}
	private function add_option_list($options,$question_id){
		if(!empty($options)){
                                $arr = explode(';',$options);
                                if(!empty($arr)){
                                        foreach($arr as $tmp){
                                                if(!empty($tmp)){
                                                        $str = explode(':',$tmp);
                                                        $num = $str[0];
                                                        $content = $str[1];
                                                        $this->question_option_model->insert(array('number'=>$num,'question_id'=>$question_id,'content' =>$content));
                                                }
                                        }
                                }
               	}
	}
	private function add_trip_option_list($options,$id,$type){
		if(!empty($options)){
                                $arr = explode(';',$options);
                                if(!empty($arr)){
                                        foreach($arr as $tmp){
                                                if(!empty($tmp)){
                                                        $str = explode(':',$tmp);
                                                        $num = $str[0];
                                                        $content = $str[1];
                                                        $this->trip_question_option_model->insert(array('number'=>$num,'id'=>$id,'content' =>$content,'type'=>$type));
                                                }
                                        }
                                }
                }
	}
	public function add(){
		$id = $this->input->get_post('pid');
		$type = $this->input->get_post('type');
		$category_id = $this->input->get_post('category_id');
		$question = $this->input->get_post('question');
		$options = $this->input->get_post('option_list');
		$default = $this->input->get_post('default_value');		
		$question_id = $this->question_model->insert(array('type'=>$type,'category_id'=>$category_id,'question'=>$question,'default_value'=>$default));
		if($type == 2 || $type == 3){
			$this->add_option_list($options,$question_id);
		}
		$num = $this->survey_question_model->get_max_number($id);
		if(empty($num)){
			$number = 1;
		}else{
			$number = $num['number'] + 1;
		}
		$this->survey_question_model->insert(array('survey_id'=>$id,'category_id'=>$category_id,'question_id'=>$question_id,'number'=>$number));
		$list  = $this->survey_question_model->get_by_condition(array('survey_id'=>$id,'category_id'=>$category_id));
                $result = array();
                if(!empty($list)){
                        foreach($list as $tmp){
                                $question = $this->question_model->get_by_id($tmp['question_id']);
                                $result[] = $question;
                        }
                }
                $data['id'] = $id;
                $data['category'] = $this->category_model->get_by_id($category_id);
                $data['list'] = $result;
                $data['user'] = $this->user_info;
                $this->load->view('quest_list',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
