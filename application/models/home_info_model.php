<?php 
class Home_info_model extends CI_Model{
	private $tab_name ='home_info';
	public function __construct(){
		$this->load->database('master');
	}
	public function insert($array){
		$this->db->insert($this->tab_name,$array);

		return $this->db->insert_id();

	}
	public function get($id){
		$this->db->where('id',$id);
                $query = $this->db->get($this->tab_name);
                return $query->row_array();
	}
	public function update($id,$array){
		$this->db->where('id',$id);
		$this->db->update($this->tab_name,$array);
		if($this->db->affected_rows() >0 ){
			return true;
		}
		return false;
	}
	public function get_by_pid($pid){
		$this->db->where('project_id',$pid);
                $query = $this->db->get($this->tab_name);
                return $query->result_array();
	}
	public function get_by_id($uid,$time){
		$this->db->where('user_id',$uid);
		$this->db->where('timestamp',$time);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}
	public function get_max_home_id($uid){
		$this->db->where('user_id',$uid);
		$this->db->order_by('home_id','desc');
		$this->db->limit(1);
		$query = $this->db->get($this->tab_name);
                return $query->row_array();
	}
	public function get_home_num($uid){
		$this->db->select("count(*) as num");
		$this->db->where('user_id',$uid);
		$query = $this->db->get($this->tab_name);
                return $query->row_array();
	}
	public function get_by_condition($param){
                foreach($param as $key=>$val){
                        $this->db->where($key,$val);
                }
                $query = $this->db->get($this->tab_name);
                return $query->result_array();
        }
	public function delete_by_id($id){
                $this->db->where('id',$id);
                $this->db->delete($this->tab_name);
        }
}

?>
