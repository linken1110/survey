<?php 
class User_info_model extends CI_Model{
	private $tab_name ='user_info';
	public function __construct(){
		$this->load->database('master');
	}
	public function insert($array){
		$this->db->insert($this->tab_name,$array);

		return $this->db->insert_id();

	}
	public function update($user_id,$array){
		$this->db->where('user_id',$user_id);
		$this->db->update($this->tab_name,$array);
		if($this->db->affected_rows() >0 ){
			return true;
		}
		return false;
	}
	public function get_user_by_uid($uid){
		$this->db->where('id',$uid);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}
	public function get_by_home_id($id){
		$this->db->where('home_id',$id);
                $query = $this->db->get($this->tab_name);
                return $query->result_array();
	}
	public function get_user_num($home_id){
		$this->db->select("count(*) as num");
                $this->db->where('home_id',$home_id);
                $query = $this->db->get($this->tab_name);
                return $query->row_array();
	}
	public function delete_by_home_id($id){
		$this->db->where('home_id',$id);
                $this->db->delete($this->tab_name);
	}
}

?>
