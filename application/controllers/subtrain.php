<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subtrain extends MY_Controller {

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
		$this->load->model('subtrain_model');
                $this->load->model('subtrain_detail_model');
        }
	public function index()
	{
		$id = $this->input->get_post('id');
		$subtrains =  $this->subtrain_model->get_by_pid($id);
		$data['subtrains'] = $subtrains;
		$data['id'] = $id;
		$this->load->view('subtrain',$data);
	}
	public function add_subtrain(){
		$id = $this->input->get_post('id');
		$data['id'] = $id;
                $this->load->view('add_subtrain',$data);
	}
	public function add(){
		$pid = $this->input->get_post('pid');
		$station_list = $this->input->get_post('station_list');
		$name = $this->input->get_post('name');
		$subtrain_id = $this->subtrain_model->insert(array('pid'=>$pid,'name'=>$name));
		$this->add_station_list($station_list,$subtrain_id);
		$subtrains =  $this->subtrain_model->get_by_pid($pid);
                $data['subtrains'] = $subtrains;
                $data['id'] = $pid;
                $this->load->view('subtrain',$data);
	}
	private function add_station_list($station_list,$subtrain_id){
		$arr = explode(';',$station_list);
                if(!empty($arr)){
                        foreach($arr as $tmp){
				if(!empty($tmp)){
                                	$this->subtrain_detail_model->insert(array('subtrain_id'=>$subtrain_id,'name'=>$tmp));
				}
                        }
                }
	}
	public function update(){
		$id = $this->input->get_post('id');
		$pid = $this->input->get_post('pid');
                $station_list = $this->input->get_post('station_list');
                $name = $this->input->get_post('name');
		$this->subtrain_model->update($id,array('name'=>$name));
		$subtrain =  $this->subtrain_model->get_by_id($id);
		$option_str="";
                if(!empty($subtrain)){
			$sublist = $this->subtrain_detail_model->get_by_subtrain_id($id);
			if(!empty ($sublist)){
				foreach($sublist as $option){
                                        $option_str = $option_str.$option['name'].";";
                                }
				if($station_list !== $option_str){
                                	$this->subtrain_detail_model->delete_by_id($id);
                                	$this->add_station_list($station_list,$id);
                        	}
			}
                }                
		$subtrains =  $this->subtrain_model->get_by_pid($pid);
                $data['subtrains'] = $subtrains;
                $data['id'] = $pid;
                $this->load->view('subtrain',$data);
	}
	public function edit_subtrain(){
		$id = $this->input->get_post('id');
		$pid =  $this->input->get_post('pid');
		$subtrain =  $this->subtrain_model->get_by_id($id);
		if(!empty($subtrain)){
			$subtrain['subtrain_list'] = $this->subtrain_detail_model->get_by_subtrain_id($id);
		}
		$data['train'] = $subtrain;
		$data['id'] = $id;
		$data['pid'] = $pid;
		$maxid = $this->subtrain_detail_model->get_by_max_subid($id);
		if(!empty($maxid)){
			$data['max_id'] = $maxid['id'];
		}else{
			$data['max_id'] = 0;
		}
		$this->load->view('edit_subtrain',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
