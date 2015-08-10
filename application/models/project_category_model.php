<?php 
class Project_category_model extends CI_Model{
	private $tab_name ='project_category';
	public function __construct(){
		$this->load->database('master');
	}
	public function insert($array){
		$this->db->insert($this->tab_name,$array);

	}
	public function get_by_pid($pid){
		$this->db->where('project_id',$pid);
		$query = $this->db->get($this->tab_name);
		return $query->result_array();
	}
	public function get_by_cid($cid){
		$this->db->where('category_id',$cid);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}
	public function get_by_pid_cid($pid,$cid){
		$this->db->where('project_id',$pid);
                $this->db->where('category_id',$cid);
                $query = $this->db->get($this->tab_name);
                return $query->row_array();
        }



}

?>
