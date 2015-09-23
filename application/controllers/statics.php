<?php
require_once (APPPATH . 'PHPExcel/Classes/PHPExcel.php');	
class Statics extends MY_Controller{
	public function __construct(){
			$this->need_login = true;
			parent::__construct();
            		$this->load->model('answer_model');
			$this->load->model('project_model');
			$this->load->model('trip_info_model');
			$this->load->model('trip_question_option_model');
			$this->load->model('home_info_model');
			$this->load->model('account_model');
			$this->load->model('survey_question_model');
			$this->load->model('question_model');
			$this->load->model('answer_model');
			$this->load->model('user_info_model');
			$this->load->model('trip_info_model');
			$this->load->model('question_option_model');

	}
	public function trip(){
                $user = $this->user_info;
		if($user['type'] != 1){
			$this->result($user['project']);
			return;
		}
		$data['user'] = $user;
		$data['list'] = $this->project_model->get_all();
		$this->load->view('statics_project_list',$data);
        }
	public function question(){
		$user = $this->user_info;
                if($user['type'] != 1){
                        $this->question_result($user['project']);
                        return;
                }
                $data['user'] = $user;
                $data['list'] = $this->project_model->get_all();
                $this->load->view('statics_question_list',$data);
	}
	public function question_result($pid=0){
		if(empty($pid)){
		$pid = $this->input->get_post('id');
		}
		$question_list = $this->get_question_list($pid);
		$result_list = array();
		if(!empty($question_list)){
			foreach($question_list as $question){
				$total = $this->answer_model->get_by_condition(array('number'=>$question['id']));
				$totalnum = count($total);
				$options = $this->question_option_model->get_by_questionid($question['id']);
				$question['totalnum'] = $totalnum;
				if(!empty($options)){
					foreach($options as $option){
						$tmp['name'] = $option['content'];
						$total = $this->answer_model->get_by_condition(array('number'=>$question['id'],'result'=>$option['number']));
						$tmp['y'] = count($total);
						$question['result'][] = $tmp;
					}
				}
				$result_list[] = $question;
			}
		}
		$data['user'] = $this->user_info;
		$data['list'] =$result_list;
		$this->load->view('statics_question',$data);
	}
	private function get_question_list($pid){
                        $result = array();
                        $question_list = $this->survey_question_model->get_by_id($pid);
                        if(!empty ($question_list)){
                                foreach ($question_list as $question){
                                        $tmp = $this->question_model->get_by_id($question['question_id']);
					if($tmp['type'] == 2){
						$result[] = $tmp;
					}
                                }
                        }
                        return $result;
        }
	public function download_index(){
		$data['user'] = $this->user_info;
                $data['list'] = $this->project_model->get_all();
                $this->load->view('download_list',$data);
	}
	public function result($pid=0){
		if(empty ($pid)){
		$pid = $this->input->get_post('id');
		}
		$data['user'] = $this->user_info;
		$totul_num = $this->trip_info_model->get_num_by_pid($pid);
		$user_num = $this->trip_info_model->get_user_num_by_pid($pid);
		$count = 0;
		$time = 0;
		$type_list = array();
		$pupose_list = array();
		$address_type_list = array();
		if(!empty ($totul_num['num'])){
			$count = number_format($totul_num['num']/count($user_num),2);
			$time_cost =0;
			$time_cost_list = $this->trip_info_model->get_time_cost_by_pid($pid);
			if(!empty ($time_cost_list)){
				foreach($time_cost_list as $tmp){
					$time_cost += $tmp['num'];
				}
			}
			$time = $time_cost/$totul_num['num'];
			$pupose_list = $this->get_detail_list($pid,1,$totul_num);
			$address_type_list = $this->get_detail_list($pid,2,$totul_num);
			$type_list = $this->get_detail_list($pid,3,$totul_num);
		}
		$data['count'] = $count;
		$data['time'] = $time;
	
		$data['type_list'] = $type_list;
		$data['pupose_list'] = $pupose_list;
		$data['address_type_list'] = $address_type_list;
                $this->load->view('statics',$data);
	}
	private function get_detail_list($pid,$type,$totul_num){
		$type_list = array();
		$tmp_type_list = $this->trip_question_option_model->get_by_type($pid,$type);

                        if(!empty ($tmp_type_list)){
                                foreach($tmp_type_list as $tmp){
					$mytype= array();
                                        $mytype['name'] = $tmp['content'];
                                        $result = $this->trip_info_model->get_num_by_type($pid,$tmp['number'],$type);
                                        $mytype['y'] = number_format($result['num']/$totul_num['num'],2)*100 ;
                                        $type_list[] = $mytype;
                                }
                        }
		return $type_list;
	}
	public function test1(){
		$id = $this->input->get_post('id');
                $excel = new PHPExcel();
                $objProps = $excel->getProperties ();
                $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                $question = array();
                $questions = $this->survey_question_model->get_by_condition(array('survey_id'=>$id,'category_id'=>2));
		if(!empty($questions)){
                        foreach($questions as $tmp){
                                $quest = $this->question_model->get_by_id($tmp['question_id']);
                                $question[] = $quest['question'];
                        }
                }
		$tableheader = array_merge(array('户编号','用户编号'),$question);
                for($i = 0;$i < count($tableheader);$i++) {
                        $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
                }
		$home_list = $this->home_info_model->get_by_pid($id);
                if(!empty($home_list)){
			$i = 2;
                        foreach($home_list as $home){
				$user_list = $this->user_info_model->get_by_home_id($home['id']);
				if(!empty($user_list)){
					foreach($user_list as $user){
						$excel->getActiveSheet()->setCellValue("$letter[0]$i",$home['id']);
						 $excel->getActiveSheet()->setCellValue("$letter[1]$i",$user['id']);
						$j = 2;
						foreach($questions as $tmp){
                                        		$answer = $this->answer_model->get_by_condition(array('number'=>$tmp['question_id'],'user_id'=>$user['id']));
                                        		if(!empty($answer)){
                                                		$myanswer = $answer[0];
                                                		$excel->getActiveSheet()->setCellValue("$letter[$j]$i",$myanswer['result']);
                                        		}
                                        		$j++;
                                		}
                                		$i++;
					}
				}
			}
		}
		$excel->getActiveSheet()->setTitle('个人信息汇总');
		$str = date("Y-m-d",time());
                $finalFileName= "个人信息汇总".$str.".xls";
		$write = new PHPExcel_Writer_Excel5($excel);
                
                        header("Pragma: public");
                        header("Expires: 0");
                        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
                        header("Content-Type:application/force-download");
                        header("Content-Type:application/vnd.ms-execl");
                header("Content-Type:application/octet-stream");
                header("Content-Type:application/download");;
		header("Content-Disposition:attachment;filename=\"$finalFileName\"");
                header("Content-Transfer-Encoding:binary");
                $write->save('php://output');
                
	}
	public function test2(){
		$id = $this->input->get_post('id');
                $excel = new PHPExcel();
                $objProps = $excel->getProperties ();
                $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                $question = array();
                $tableheader = array('用户编号','出行时间','同行人数','出行目的','出行地点','出行用地性质','出行经度','出行纬度','结束时间','结束地点' ,' 结束用地性质','结束经度','结束纬度','出行方式','是否全程步行','停车费或出租车费','出发地到车站耗时','出发地到车站耗费','上车站','下车站','下车站到目的地耗时','下车站到目的地耗费');
                for($i = 0;$i < count($tableheader);$i++) {
                        $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
                }
		$trip_list = $this->trip_info_model->get_by_pid($id);
		if(!empty($trip_list)){
			$i = 2;
			foreach($trip_list as $trip){
				$user_info = $this->user_info_model->get_user_by_uid($trip['user_id']);
				$excel->getActiveSheet()->setCellValue("$letter[0]$i",$user_info['identifier']);
				$excel->getActiveSheet()->setCellValue("$letter[1]$i",$trip['start_time']);
				$excel->getActiveSheet()->setCellValue("$letter[2]$i",$trip['people_num']);
				$excel->getActiveSheet()->setCellValue("$letter[3]$i",$trip['purpose']);
				$excel->getActiveSheet()->setCellValue("$letter[4]$i",$trip['start_address']);
				$excel->getActiveSheet()->setCellValue("$letter[5]$i",$trip['start_address_type']);
                                $excel->getActiveSheet()->setCellValue("$letter[6]$i",$trip['start_lng']);
                                $excel->getActiveSheet()->setCellValue("$letter[7]$i",$trip['start_lat']);
                                $excel->getActiveSheet()->setCellValue("$letter[8]$i",$trip['end_time']);
                                $excel->getActiveSheet()->setCellValue("$letter[9]$i",$trip['end_address']);
				$excel->getActiveSheet()->setCellValue("$letter[10]$i",$trip['end_address_type']);
                                $excel->getActiveSheet()->setCellValue("$letter[11]$i",$trip['end_lng']);
                                $excel->getActiveSheet()->setCellValue("$letter[12]$i",$trip['end_lat']);
                                $excel->getActiveSheet()->setCellValue("$letter[13]$i",$trip['outway']);
                                $excel->getActiveSheet()->setCellValue("$letter[14]$i",$trip['iswalk']);
				$excel->getActiveSheet()->setCellValue("$letter[15]$i",$trip['pay_off']);
                                $excel->getActiveSheet()->setCellValue("$letter[16]$i",$trip['to_subway_time']);
                                $excel->getActiveSheet()->setCellValue("$letter[17]$i",$trip['to_subway_cost']);
                                $excel->getActiveSheet()->setCellValue("$letter[18]$i",$trip['start_station']);
                                $excel->getActiveSheet()->setCellValue("$letter[19]$i",$trip['end_station']);
				$excel->getActiveSheet()->setCellValue("$letter[20]$i",$trip['to_dest_time']);
                                $excel->getActiveSheet()->setCellValue("$letter[21]$i",$trip['to_dest_cost']);
				$i++;
			}
		}
		$excel->getActiveSheet()->setTitle('出行链信息汇总');
		$str = date("Y-m-d",time());
		$finalFileName= "出行链信息汇总".$str.".xls";
		$write = new PHPExcel_Writer_Excel5($excel);
                        header("Pragma: public");
                        header("Expires: 0");
                        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
                        header("Content-Type:application/force-download");
                        header("Content-Type:application/vnd.ms-execl");
                header("Content-Type:application/octet-stream");
                header("Content-Type:application/download");
		header("Content-Disposition:attachment;filename=\"$finalFileName\"");
                header("Content-Transfer-Encoding:binary");
                $write->save('php://output');
	}
	public function test(){
		$id = $this->input->get_post('id');
		$excel = new PHPExcel();
		$objProps = $excel->getProperties ();
		$letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$question = array();
		$questions = $this->survey_question_model->get_by_condition(array('survey_id'=>$id,'category_id'=>1));
		if(!empty($questions)){
			foreach($questions as $tmp){
				$quest = $this->question_model->get_by_id($tmp['question_id']);
				$question[] = $quest['question'];
			}
		}
		$tableheader = array_merge(array('户编号','调查开始时间','调查员','住址','经度','纬度'),$question);
		for($i = 0;$i < count($tableheader);$i++) {
			$excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
		}
		$home_list = $this->home_info_model->get_by_pid($id);
		if(!empty($home_list)){
			$i = 2;
			foreach($home_list as $home){
				$excel->getActiveSheet()->setCellValue("$letter[0]$i",$home['identifier']);
				$excel->getActiveSheet()->setCellValue("$letter[1]$i",$home['create_date']);
				$account = $this->account_model->get_user_by_uid($home['user_id']);
				$excel->getActiveSheet()->setCellValue("$letter[2]$i",$account['name']);
				$excel->getActiveSheet()->setCellValue("$letter[3]$i",$home['address']);
				$excel->getActiveSheet()->setCellValue("$letter[4]$i",$home['lng']);
				$excel->getActiveSheet()->setCellValue("$letter[5]$i",$home['lat']);
				$j = 6;
				foreach($questions as $tmp){
					$answer = $this->answer_model->get_by_condition(array('number'=>$tmp['question_id'],'home_id'=>$home['id']));
					if(!empty($answer)){
						$myanswer = $answer[0];
						$excel->getActiveSheet()->setCellValue("$letter[$j]$i",$myanswer['result']);
					}
					$j++;
				}
				$i++;
			}
		}
		$excel->getActiveSheet()->setTitle('户信息汇总');
		$str = date("Y-m-d",time());
		$finalFileName= "户信息汇总".$str.".xls";
		$write = new PHPExcel_Writer_Excel5($excel);
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
			header("Content-Type:application/force-download");
			header("Content-Type:application/vnd.ms-execl");
		header("Content-Type:application/octet-stream");
		header("Content-Type:application/download");;
		header("Content-Disposition:attachment;filename=\"$finalFileName\"");
		header("Content-Transfer-Encoding:binary");
		$write->save('php://output');

	//	$write->save($finalFileName);
	}
}
?>
