<?php 
class Account_model extends CI_Model{
	private $tab_name ='account';
	public function __construct(){
		$this->load->database('master');
	}
	public function insert($array){
		$this->db->insert($this->tab_name,$array);

		return $this->db->insert_id();

	}
	public function update($user_id,$array){
		$this->db->where('id',$user_id);
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
	public function get_user_by_nickname($nickname){
		$this->db->where('name',$nickname);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}
	public function get_user_by_email($email){
		$this->db->where('email',$email);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}
	public function get_user_by_phone($phone){
		$this->db->where('phone',$phone);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}
	public function get_user_by_macaddress($macaddress){
		$this->db->where('mac_address',$macaddress);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}
	public function get_user_by_udid($udid){
		$this->db->where('udid',$udid);
		$query = $this->db->get($this->tab_name);
		return $query->row_array();
	}


}

?>
