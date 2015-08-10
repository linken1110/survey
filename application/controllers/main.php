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
        }
	public function index()
	{
		$data['user'] = $this->user_info;
		$this->load->view('main',$data);
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
		$data['user'] = $this->user_info;
                $this->load->view('map',$data);
        }
	public function map1(){
                $data['user'] = $this->user_info;
                $this->load->view('map1',$data);
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
		$this->load->view('test_trip_info',$data);
	}
	public function  add_trip(){
		$data['user'] = $this->user_info;
                $this->load->view('test_add_trip',$data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
