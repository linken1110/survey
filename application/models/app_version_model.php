<?php 
class App_version_model extends CI_Model{
	private $tab_name ='app_version';
	public function __construct(){
		$this->load->database('master');
	}
	public function insert($array){
		$this->db->insert($this->tab_name,$array);

		return $this->db->insert_id();

	}
	public function update($id,$array){
		$this->db->where('id',$id);
		$this->db->update($this->tab_name,$array);
		if($this->db->affected_rows() >0 ){
			return true;
		}
		return false;
	}
	public function get(){
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}

}

?>
