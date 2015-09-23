<?php
	
class Survey extends MY_Controller{
		public function __construct(){
			parent::__construct();
            		$this->load->model('project_model');
			$this->load->model('project_category_model');
			$this->load->model('question_model');
			$this->load->model('question_option_model');
			$this->load->model('survey_model');
			$this->load->model('survey_question_model');
			$this->load->model('category_model');
			$this->load->model('trip_question_option_model');
			$this->load->model('survey_trip_question_model');
			$this->load->model('subtrain_model');
			$this->load->model('subtrain_detail_model');
			$this->load->model('home_info_model');
			$this->load->model('answer_model');
			$this->load->model('user_info_model');
			$this->load->model('trip_info_model');
		}
		public function quest_group(){
			$data = array('code'=>1,'message'=>'ok');
			$pid = $this->input->get_post('areaid');
			if(!$pid) {
				$data['code'] = 4001;
                                $data['message'] = 'error parameters';
                                echo json_encode($data);
                                return;
			}
			$list = $this->project_category_model->get_by_pid($pid);
			if(empty ($list)){
				$data['code'] = 4002;
                                $data['message'] = 'no data';
				echo json_encode($data);
				return;
			}
			$question_list = $this->get_question_list($pid);
			$a = substr( $list['category_id'], 0, 1 );
			$b = substr( $list['category_id'], 1, 1 );
			$c = substr( $list['category_id'], 2, 1 );
			$d = substr( $list['category_id'], 3, 1 );
			if($a ==1){
				$result[] = $this->get_category($pid,1,$question_list);
			}
			if($b ==1){
                                $result[] = $this->get_category($pid,2,$question_list);
                        }
			if($c ==1){
                                $result[] = $this->get_category($pid,3,$question_list);
                        }
			if($d ==1){
                               // $result[] = $this->get_category($pid,4,$question_list);
				$data['trip'] = $this->get_trip_data($pid);
                        }
			$data['result'] = $result;
			$data['subtrain'] = $this->get_subtrain($pid);
			echo json_encode($data, JSON_UNESCAPED_UNICODE); 
		}
		private function get_subtrain($id){
			$result = array();
			$subtrains =  $this->subtrain_model->get_by_pid($id);
			if(!empty($subtrains)){
				foreach($subtrains as $subtrain){
					$tmp['id'] = $subtrain['id'];
                                	$tmp['name'] = $subtrain['name'];
					$data = $this->subtrain_detail_model->get_by_subtrain_id($subtrain['id']);
					$tmp['subtrain_list'] = $data;
					$result[] = $tmp;
				}
			}
			return $result;
		}
		private function get_trip_data($id){
			$result = array();
			$status = 0;
			$question = $this->survey_trip_question_model->get_by_id($id,1);
                        if(!empty ($question)){
                                $status = $question['status'];
                        }
                        $result['controlflag'] = $status;
			$result['options1'] = $this->trip_question_option_model->get_by_type($id,1);
                        $result['options2'] = $this->trip_question_option_model->get_by_type($id,2);
                        $result['options3'] = $this->trip_question_option_model->get_by_type($id,3);
			return $result;			
		}
		private function get_category($pid,$cid,$question_list){
			$result = array();
			$detail = $this->category_model->get_by_id($cid);
                                if(!empty ($detail)){
                                        $tmp['id'] = $cid;
                                        $tmp['areaid'] = $pid;
                                        $tmp['questname'] = $detail['name'];
                                        $tmp['question_list'] = $this->get_question_list_by_category_id($question_list,$cid);
                                        $result = $tmp;
                                }
			return $result;
		}
		private function get_question_list_by_category_id($question_list,$category_id){
			$result = array();
			foreach ($question_list as $data){
				if(!empty($data)){
				if($data['category_id'] == $category_id){
					$result[] = $data;
				}
				}
			}
			return $result;
		}
		private function get_question_list($pid){
			$result = array();
			$question_list = $this->survey_question_model->get_by_id($pid);
                        if(!empty ($question_list)){
                                foreach ($question_list as $question){
                                        $result[] = $this->get_question($question['question_id']);
                                }
                        }
			return $result;
		}
		private function get_question($question_id){
			$data = array();
			$question = $this->question_model->get_by_id($question_id);
			if(!empty ($question)){
				$data['id'] = $question['id'];
				$data['type'] = $question['type'];
				$data['category_id'] = $question['category_id'];
				$data['question'] = $question['question'];
				$data['option_list'] = $this->question_option_model->get_by_questionid($question_id);
				$data['is_parent']  = ($question['type'] == 0)?1:0;
				$data['default']  = $question['default_value'];
				$data['sub_question'] = $this->get_subquestion($question_id);
			}
			return $data;
		}
		private function get_subquestion($question_id){
			$result = array();
			$data = $this->question_model->get_by_parentid($question_id);
			if(!empty($data)){
				foreach($data as $tmp){
				$question = $this->get_question($tmp['id']);
				$result[] = $question;
				}
			}
			return $result;
		}
		public function quick_login(){
			$data = array('code'=>0,'user_id'=>'','message'=>'');
			$mac_address = $this->input->get_post('mac_address');
			$udid = urldecode($this->input->get_post('udid'));
			$os_type = $this->input->get_post('os_type');
			$os_version = $this->input->get_post('os_version');

			if(is_null ($os_type) || ($os_type == 1 && !$udid) || ($os_type == 2 && !$mac_address)){

				$data['code'] = 4001;
				$data['message'] = 'error parameters';
            			echo json_encode($data);
            			return;
			}
			if($os_type == 1){//ios			
				$result = $this->account_model->get_user_by_udid($udid);
				if(empty ($result)){
				$param = array('udid'=>$udid,
							   'create_time'=>date("Y-m-d H:i:s" ,strtotime( time() )) ,
								'nickname'=>'unkonwuser',
							   'os_type'=>$os_type,
							   'password'=>sha1($this->password));
				$uid = $this->account_model->insert($param);
				$data['user_id'] = $uid;
				$data['code'] = 1;
				$data['message'] = 'success';
				}
				else{
					$data['user_id'] = $result['user_id'];
					$data['code'] = 1;
					$data['message'] = 'success';
				}
			}else if($os_type == 2){
				$result = $this->account_model->get_user_by_macaddress($mac_address);
				if(empty ($result)){
				$param = array('udid'=>$udid,
								'create_time'=>date("Y-m-d H:i:s" ,strtotime( time() )) ,
								'nickname'=>'unkonwuser',
							   'os_type'=>$os_type,
							   'password'=>sha1($this->password));
				$uid = $this->account_model->insert($param);
				$data['user_id'] = $uid;
				$data['code'] = 1;
				$data['message'] = 'success';
				}
				else{
				$data['user_id'] = $result['user_id'];
				$data['code'] = 1;
				$data['message'] = 'success';
				}
			
			}
            	echo json_encode($data);
	}
	public function login(){
		$data = array('code'=>0,'user_id'=>'','message'=>'','token'=>'');
		$login_name = $this->input->get_post('login_name');
		$password = $this->input->get_post('password');
		if(!$login_name || !$password){
			$data['code'] = 4001;
			$data['message'] = 'error parameters';
			echo json_encode($data);
			return;
		}
		//step1:check uid
		$user = $this->account_model->get_user_by_nickname($login_name);
		if(!empty($user)){
			if(sha1($password) == $user['pass']){
				$data['user_id'] = $user['id'];
				$data['code'] = 1;
				$data['message'] = 'success';
				echo json_encode($data);
				return;
			}
		}
		$data['code'] = 4002;
		$data['message'] = 'login failed';
		echo json_encode($data);
	}
	public function update_nickname(){
		$data = array('code'=>0,'message'=>'');
		$os_type = $this->input->get_post('os_type');
		$nickname = urldecode($this->input->get_post('nickname'));
		$mac_address = $this->input->get_post('mac_address');
		$udid = urldecode($this->input->get_post('udid'));
		if(empty ($os_type) || ($os_type == 1 && !($udid)) || ($os_type == 2 && !($mac_address))){
			$data['code'] = 4001;
			$data['message'] = 'error parameters';
			echo json_encode($data);
			return;
		}
		if(!$nickname){
			$data['code'] = 4005;
			$data['message'] = 'error nickname';
			echo json_encode($data);
			return;
		}
		if($os_type == 1){//ios
			$result = $this->account_model->get_user_by_udid($udid);
		}else if($os_type == 2){
			$result = $this->account_model->get_user_by_macaddress($mac_address);
		}
		$data = $this->_update_nickname($result,$nickname);
		echo json_encode($data);
		return;
	}
	private function _update_nickname($result,$nickname){
		$data = array('code'=>0,'message'=>'');
		if(empty ($result)){
			$data['code'] = 4003;
			$data['message'] = 'user error';
		}
		else {
			$param = array('nickname' => $nickname,
				'update_time' => date("Y-m-d H:i:s", strtotime(time()))
			);
			if ($this->account_model->update($result['user_id'], $param)) {
				$data['code'] = 1;
				$data['message'] = 'success';
			} else {
				$data['code'] = 4004;
				$data['message'] = 'system error';
			}
		}
		return $data;
	}
	public function register_user(){
		$data = array('code'=>0,'user_id'=>'','message'=>'');
                $login_name = $this->input->get_post('login_name');
                $password = $this->input->get_post('password');
		if(!$login_name || !$password){
                        $data['code'] = 4001;
                        $data['message'] = 'error parameters';
                        echo json_encode($data);
                        return;
                }	
		$user = $this->account_model->get_user_by_nickname($login_name);
		if(!empty($user)){
			$data['code'] = 4002;
                        $data['message'] = 'user name has already exist';
                        echo json_encode($data);
                        return;
		}
		 $param = array(
                                                                'create_date'=>date("Y-m-d H:i:s" ,time() ) ,
                                                                'name'=>$login_name,
                                                           'pass'=>sha1($password));
                                $uid = $this->account_model->insert($param);
		$data['code'] = 1;
		$data['user_id'] = $uid;
		$data['message'] = 'ok';
		echo json_encode($data);
	}
	public function upload_data(){
		$json = $this->input->get_post('parameter');
		$result=array('status'=>0,'message'=>'');
		$data = json_decode($json,true);
		$familyInfo =  $data['familyInfo'];
		$pid = $data['pid'];
		if(!empty($familyInfo)){
			$home_info = $this->home_info_model->get_by_id($familyInfo['userId'],$familyInfo['id']);
			if(empty($home_info)){
				$home_num = $this->home_info_model->get_home_num($familyInfo['userId']);
				$newId= sprintf('%03s', $pid);
                		$newUid= sprintf('%04s', $familyInfo['userId']);
                		$newNum= sprintf('%03s', $home_num['num']+1 );
                		$num = $newId.$newUid.$newNum."00";
				$home_id = $this->home_info_model->insert(array('address'=>$familyInfo['address'],'lat'=>$familyInfo['lat'],'lng'=>$familyInfo['lng'],'type'=>$familyInfo['zhuhuType'],'phone'=>$familyInfo['phoneNumber'],'user_id'=>$familyInfo['userId'],'create_date'=>date('Y-m-d H:i:s',($familyInfo['createTime']/1000)),'home_id'=>$familyInfo['id'],'project_id'=>$pid,'identifier'=>$num));
				$arrs = explode('|',$familyInfo['questionAndAnswer']);
				if(!empty($arrs)){
					foreach($arrs as $arr){
						$key_values = explode(':',$arr);
						if(!empty($key_values)){
							$question = $key_values[0];
							$answer = $key_values[1];
							$this->answer_model->insert(array('home_id'=>$home_id,'number'=>$question,'result'=>$answer));
						}
					}
				}
				$people_list = $data['peopleList'];
				if(!empty($people_list)){
					foreach($people_list as $people){
						$user_num = $this->user_info_model->get_user_num($home_id);
						$new_num = sprintf('%02s', $user_num['num']+1 );
						$num = $newId.$newUid.$newNum.$new_num;
						$people_info = $people['peopleInfo'];
						$people_id = $this->user_info_model->insert(array('home_id'=>$home_id,'people_id'=>$people_info['id'],'identifier'=>$num));
						$arrs = explode('|',$people_info['questionAndAnswer']);
						if(!empty($arrs)){
                                        		foreach($arrs as $arr){
                                                		$key_values = explode(':',$arr);
                                                		if(!empty($key_values)){
                                                	        	$question = $key_values[0];
                                                        		$answer = $key_values[1];
                                                        		$this->answer_model->insert(array('home_id'=>$home_id,'number'=>$question,'result'=>$answer,'user_id'=>$people_id));
                                                		}
                                        		}
                                		}
						$outlist = $people['outList'];
						if(!empty($outlist)){
							foreach($outlist as $out){
								$this->trip_info_model->insert(array('user_id'=>$people_id,'purpose'=>$out['outpurpose'],'people_num'=>$out['totalPeople'],'start_time'=>date('Y-m-d H:i:s',($out['outStartTime']/1000)),'end_time'=>date('Y-m-d H:i:s',($out['outEndTime']/1000)),'start_address'=>$out['outStartAddress'],'end_address'=>$out['outEndAddress'],'start_lng'=>$out['startLng'],'start_lat'=>$out['startLat'],'end_lng'=>$out['endLng'],'end_lat'=>$out['endLat'],'iswalk'=>$out['isWalk'],'outway'=>$out['outtype'],'pay_off'=>$out['payOff'],'start_station'=>$out['aboardAddress'],'end_station'=>$out['debusAddress'],'to_subway_time'=>$out['outToSubwayUseTime'],'to_dest_time'=>$out['subwayToDestUseTime'],'to_subway_cost'=>$out['outToSubwayCost'],'to_dest_cost'=>$out['subwayToDestCost'],'start_address_type'=>$out['land_usage1'],'end_address_type'=>$out['land_usage2'],'project_id'=>$pid));
							}
						}
						
					}
				}
				$result['status'] = 1;
				$result['message'] = "ok";
			}else{
				$result['status'] = 4002;
                        	$result['message'] = "data has exists";
			}
			
		}else{
			$result['status'] = 4001;
			$result['message'] = "invalid data";
		}
		echo json_encode($result);
	}
	public function Synchronous(){
		$data = array('home_number'=>0,'max_home_id'=>0);
		$uid = $this->input->get_post('userId');
		if(!empty($uid)){
			$home_num = $this->home_info_model->get_home_num($uid);
			$max_home_id = $this->home_info_model->get_max_home_id($uid);
			if(!empty($home_num)){
				$data['home_number'] = $home_num['num'];
			}
			if(!empty($max_home_id)){
				$data['max_home_id'] = $max_home_id['home_id'];
			}
		}
		echo json_encode($data);
		
	}
}
?>
