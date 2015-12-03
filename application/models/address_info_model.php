<?php 
class Address_info_model extends CI_Model{
	private $tab_name ='address_info';
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
	public function get_province_list(){
		$query =  $this->db->query('select distinct province from address_info');
               // $query = $this->db->get($this->tab_name);
                return $query->result_array();
	}
	public function get_city_list_by_province($province){
		$query =  $this->db->query("select distinct city from address_info where province ='".$province."'");
		return $query->result_array();
	}
	public function get_county_list_by_city($city){
                $query =  $this->db->query("select distinct county from address_info where city ='".$city."'");
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
	public function get_all(){
		$this->db->order_by('create_time','desc');
		$query = $this->db->get($this->tab_name);
                return $query->result_array();
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
