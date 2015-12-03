<?php 
class Trip_info_model extends CI_Model{
	private $tab_name ='trip_info';
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
	public function get_by_uid($uid){
		$this->db->where('user_id',$uid);
		$query = $this->db->get($this->tab_name);
		return $query->result_array();
	}
	public function get_by_id($id){
		$this->db->where('id',$id);
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
	public function get_num_by_pid($pid){
		$this->db->select("count(*) as num");
		$this->db->where('project_id',$pid);
                $query = $this->db->get($this->tab_name);
                return $query->row_array();
	}
	public function get_user_num_by_pid($pid){
               // $this->db->where('project_id',$pid);
		$query =  $this->db->query('select distinct user_id from trip_info where project_id='.$pid);
               // $query = $this->db->get($this->tab_name);
                return $query->result_array();
        }
	public function get_time_cost_by_pid($pid){
		$query = $this->db->query('select unix_timestamp(end_time) - unix_timestamp(start_time) as num FROM trip_info  where start_time != "0000-00-00 00:00:00" and end_time != "0000-00-00 00:00:00" and  project_id='.$pid);
		return $query->result_array();
	}
	public function get_num_by_type($pid,$number,$type){
		$this->db->select("count(*) as num");
                $this->db->where('project_id',$pid);
		if($type ==1){
			$this->db->where('purpose',$number);
		}else if($type ==2){
			$this->db->where('start_address_type',$number);
		}else if($type ==3){
			$this->db->where('outway',$number);
		}
                $query = $this->db->get($this->tab_name);
                return $query->row_array();
	}
	public function get_by_pid($pid){
		$this->db->where('project_id',$pid);
		$this->db->order_by('user_id');
                $query = $this->db->get($this->tab_name);
                return $query->result_array();	
	}
	public function delete_by_id($id){
                $this->db->where('id',$id);
                $this->db->delete($this->tab_name);
        }
	public function delete_by_uid($id){
                $this->db->where('user_id',$id);
                $this->db->delete($this->tab_name);
	}

}

?>
