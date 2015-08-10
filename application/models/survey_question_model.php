<?php 
class Survey_question_model extends CI_Model{
	private $tab_name ='survey_question';
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
	public function get_by_id($id){
		$this->db->where('survey_id',$id);
		$this->db->order_by("number","asc");
		$query = $this->db->get($this->tab_name);
		return $query->result_array();
	}
	public function get_by_condition($param){
		foreach($param as $key=>$val){
                	$this->db->where($key,$val);
		}
                $this->db->order_by("number","asc");
                $query = $this->db->get($this->tab_name);
                return $query->result_array();
        }
	public function get_by_name($name){
		$this->db->where('name',$name);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}
	public function get_by_publisher($publisher){
		$this->db->where('publisher',$publisher);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}


}

?>
