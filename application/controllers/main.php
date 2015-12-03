<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {
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
		$this->load->model('home_info_model');
		$this->load->model('user_info_model');
		$this->load->model('trip_info_model');
		$this->load->model('user_info_model');
		$this->load->model('trip_question_option_model');
        }
	public function index()
	{
		$data['user'] = $this->user_info;
		$this->load->view('index',$data);
	}
	public function admin(){
		$data['user'] = $this->user_info;
		$this->load->view('admin-index');
	}
	public function test(){
		$data['user'] = $this->user_info;
		$this->load->view('test',$data);	
	}
	public function map(){
		$pid = $this->input->get_post('id');
		$home_list = $this->home_info_model->get_by_pid($pid);
		$data['user'] = $this->user_info;
		$data['list'] = $home_list;
		$data['id'] = $pid;
                $this->load->view('map_main',$data);
        }
	public function map_add_trip(){
                $data['user'] = $this->user_info;
		$uid = $this->input->get_post('uid');
                $user = $this->user_info_model->get_user_by_uid($uid);
                $home_info = $this->home_info_model->get($user['home_id']);
		$project_id = $home_info['project_id'];
                $data['user'] = $this->user_info;
		$data['uid'] = $uid;
                $data['lat'] = $home_info['lat'];
		$data['lng'] = $home_info['lng'];
		$data['options1'] = $this->trip_question_option_model->get_by_type($project_id,1);
                $data['options2'] = $this->trip_question_option_model->get_by_type($project_id,2);
                $data['options3'] = $this->trip_question_option_model->get_by_type($project_id,3);
                $this->load->view('map_add_trip',$data);
        }
	public function map_edit_trip(){
		$id = $this->input->get_post('id');
		$trip_info  = $this->trip_info_model->get_by_id($id);
		$data['options1'] = $this->trip_question_option_model->get_by_type($trip_info['project_id'],1);
                $data['options2'] = $this->trip_question_option_model->get_by_type($trip_info['project_id'],2);
                $data['options3'] = $this->trip_question_option_model->get_by_type($trip_info['project_id'],3);
		if(!empty ($trip_info)){
				$user_info = $this->user_info_model->get_user_by_uid($trip_info['user_id']);
                                        $home_info = $this->home_info_model->get($user_info['home_id']);
				if($trip_info['start_type'] == 1){
					$trip_info['start_lng'] = $home_info['lng'];
					$trip_info['start_lat'] = $home_info['lat'];
				}else if($trip_info['start_type'] == 2){
                                        $trip_info['start_lng'] = $user_info['lng'];
                                        $trip_info['start_lat'] = $user_info['lat'];
                                }
				if($trip_info['end_type'] == 1){
                                        $trip_info['end_lng'] = $home_info['lng'];
                                        $trip_info['end_lat'] = $home_info['lat'];
                                }else if($trip_info['end_type'] == 2){
                                        $trip_info['end_lng'] = $user_info['lng'];
                                        $trip_info['end_lat'] = $user_info['lat'];
				}
				
		}
		$data['trip_info'] = $trip_info;
		if(!empty ($trip_info['outway'])){
			$outways = json_encode(explode(',',$trip_info['outway']));
		}else{
			$outways = "";
		}
		$data['outways'] = $outways ;
		$data['id'] = $id;
		$data['uid'] = $trip_info['user_id'];
		$this->load->view('map_edit_trip',$data);
	}
	public function map2(){
                $data['user'] = $this->user_info;
                $this->load->view('map2',$data);
        }
	public function mymap(){
		$data['user'] = $this->user_info;
		$this->load->view('mymap',$data);
	}
	public function project_list(){
		$data['user'] = $this->user_info;
		$data['list'] = $this->project_model->get_all();
		$this->load->view('project_list',$data);
	}
	public function add_project(){
		$data['user'] = $this->user_info;
		$this->load->view('add_project',$data);
	}
	public function home_list(){
		$data['user'] = $this->user_info;
		$this->load->view('home_list',$data);
	}
	public function quest_category(){
		$data['user'] = $this->user_info;
                $this->load->view('quest_category',$data);
        }
	public function add_quest_category(){
		$data['user'] = $this->user_info;
                $this->load->view('add_quest_category',$data);
        }
	public function quest_list(){
		$data['user'] = $this->user_info;
                $this->load->view('quest_list',$data);
        }
	public function add_quest(){
		$data['user'] = $this->user_info;
                $this->load->view('add_quest',$data);
        }
	public function quest_info(){
		$data['user'] = $this->user_info;
                $this->load->view('quest_info',$data);
        }
	public function home_info(){
		$data['user'] = $this->user_info;
                $this->load->view('home_info',$data);
        }
	public function survey_list(){
		$data['user'] = $this->user_info;
		 $this->load->view('survey_list',$data);
	}
	public function  trip_info(){
		$data['user'] = $this->user_info;
		$id= $this->input->get_post('id');
		$data['id'] = $id;
		$this->load->view('edit_trip_info',$data);
	}
	public function  add_trip(){
		$uid = $this->input->get_post('uid');
		$data['user'] = $this->user_info;
		$data['uid'] = $uid;
                $this->load->view('test_add_trip',$data);
        }
	public function statics(){
		$data['user'] = $this->user_info;
                $this->load->view('statics',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
