<?php
require_once (APPPATH . 'PHPExcel/Classes/PHPExcel.php');	
require_once (APPPATH . 'PHPExcel/Classes/PHPExcel/IOFactory.php');
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
			$this->load->model('community_info_model');
			ini_set("memory_limit","-1");
	}
	public function update_data(){
		$reader = PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
		$PHPExcel = $reader->load(APPPATH ."community.xls"); // 载入excel文件
		$sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
		$highestRow = $sheet->getHighestRow(); // 取得总行数
		$highestColumm = $sheet->getHighestColumn(); // 取得总列数
 
		/** 循环读取每个单元格的数据 */
		for ($row = 2; $row <= $highestRow; $row++){//行数是以第1行开始
			$dataset = array();
    			for ($column = 'A'; $column <= $highestColumm; $column++) {//列数是以A列开始
        			$dataset[] = $sheet->getCell($column.$row)->getValue();
    			}
			$this->community_info_model->insert(array('district'=>$dataset[0],'street'=>$dataset[1],'community'=>$dataset[2]));
		}
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
		$num = 1;
		if(!empty($questions)){
                        foreach($questions as $tmp){
                                $quest = $this->question_model->get_by_id($tmp['question_id']);
                                $question[] = $quest['question'];
				$num ++;
                        }
                }
		$num = 1;
		$questions1 = $this->survey_question_model->get_by_condition(array('survey_id'=>$id,'category_id'=>3));
                if(!empty($questions1)){
                        foreach($questions1 as $tmp){
                                $quest = $this->question_model->get_by_id($tmp['question_id']);
                                $question[] = $quest['question'];
				$num ++;
                        }
                }

		$tableheader = array_merge(array('编号','户编号','调查员编号','个人编号','工作单位(学校)地址','区','详细地址','经度','纬度'),$question);
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
						$excel->getActiveSheet()->setCellValue("$letter[0]$i",$user['home_id']);
						$excel->getActiveSheet()->setCellValue("$letter[1]$i",substr($user['identifier'],7,3));
						$excel->getActiveSheet()->setCellValue("$letter[2]$i",substr($user['identifier'],3,4));
						$excel->getActiveSheet()->setCellValue("$letter[3]$i",substr($user['identifier'],10,2));
						$excel->getActiveSheet()->setCellValue("$letter[4]$i",$user['address']);
						$excel->getActiveSheet()->setCellValue("$letter[5]$i",$user['district']);
						$excel->getActiveSheet()->setCellValue("$letter[6]$i",$user['detail_address']);
						$excel->getActiveSheet()->setCellValue("$letter[7]$i",$user['lng']);
						$excel->getActiveSheet()->setCellValue("$letter[8]$i",$user['lat']);
						$j = 9;
						foreach($questions as $tmp){
                                        		$answer = $this->answer_model->get_by_condition(array('number'=>$tmp['question_id'],'user_id'=>$user['id']));
                                        		if(!empty($answer)){
                                                		$myanswer = $answer[0];
								if($myanswer['result'] == -1){$myanswer['result'] ="";}
                                                		$excel->getActiveSheet()->setCellValue("$letter[$j]$i",$myanswer['result']);
                                        		}
                                        		$j++;
                                		}
						foreach($questions1 as $tmp){
                                                        $answer = $this->answer_model->get_by_condition(array('number'=>$tmp['question_id'],'user_id'=>$user['id']));
                                                        if(!empty($answer)){
                                                                $myanswer = $answer[0];
								if($myanswer['result'] == -1){$myanswer['result'] ="";}
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
		$way = array('1'=>array('name'=>'萧山机场','lat'=>'30.238700','lng'=>'120.443345'),
			     '2'=>array('name'=>'杭州火车东站','lat'=>'30.297145','lng'=>'120.219395'),
			     '3'=>array('name'=>'杭州火车城站','lat'=>'30.249206','lng'=>'120.189606'),
			     '4'=>array('name'=>'余杭火车站','lat'=>'30.157856','lng'=>'119.992272'),
			     '5'=>array('name'=>'杭州汽车客运中心站','lat'=>'30.318269','lng'=>'120.285978'),
			     '6'=>array('name'=>'杭州长途汽车北站','lat'=>'30.160924','lng'=>'120.293498'),
			     '7'=>array('name'=>'余杭长途汽车西站','lat'=>'30.379065','lng'=>'119.868887'),
                             '8'=>array('name'=>'余杭长途汽车南站','lat'=>'30.265311','lng'=>'119.954273'),
				);
		$id = $this->input->get_post('id');
                $excel = new PHPExcel();
                $objProps = $excel->getProperties ();
                $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
                $question = array();
                $tableheader = array('编号','户编号','调查员编号','个人编号','出行目的','同行人数','出发时间','出发地(是否为家)','出发地(是否为工作地点)','出发地经度','出发地纬度','出发地详细地址','出发地点(市外)枢纽','出发地点(市外)省','出发地点(市外)市','出发地点(市外)区','出发地其他','出发地用地性质','到达时间','到达地(是否为家)','到达地(是否为工作地点)','到达地经度','到达地纬度','到达地详细地址','到达地点(市外)枢纽','到达地点(市外)省','到达地点(市外)市','到达地点(市外)区','到达地其他','到达地用地性质','是否全程步行','出行交通工具一','出行交通工具二','出行交通工具三','出行交通工具四','出行交通工具五','停车费或出租车费','出发地到车站时耗(分钟)','出发地到车站费用','上车站','下车站','乘车时耗(分钟)','乘车费用','下车站到目的地时耗(分钟)','下车站到目的地费用');
                for($i = 0;$i < count($tableheader);$i++) {
                        $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
                }
		$trip_list = $this->trip_info_model->get_by_pid($id);
		if(!empty($trip_list)){
			$i = 2;
			foreach($trip_list as $trip){
				$user_info = $this->user_info_model->get_user_by_uid($trip['user_id']);
				$home_info = $this->home_info_model->get($user_info['home_id']);
				$time = strtotime($trip['start_time']);
                                $end_time = strtotime($trip['end_time']);
				$excel->getActiveSheet()->setCellValue("$letter[0]$i",$home_info['id']);
				$excel->getActiveSheet()->setCellValue("$letter[1]$i",substr($user_info['identifier'],7,3));
                                $excel->getActiveSheet()->setCellValue("$letter[2]$i",substr($user_info['identifier'],3,4));
                                $excel->getActiveSheet()->setCellValue("$letter[3]$i",substr($user_info['identifier'],10,2));
				$excel->getActiveSheet()->setCellValue("$letter[4]$i",$trip['purpose']);
				$excel->getActiveSheet()->setCellValue("$letter[5]$i",$trip['people_num']);
				$excel->getActiveSheet()->setCellValue("$letter[6]$i",date("H:i",$time));
				if($trip['start_type'] == 1){
					$excel->getActiveSheet()->setCellValue("$letter[7]$i",1);
					$excel->getActiveSheet()->setCellValue("$letter[8]$i",0);
					$excel->getActiveSheet()->setCellValue("$letter[9]$i",$home_info['lng']);
                                        $excel->getActiveSheet()->setCellValue("$letter[10]$i",$home_info['lat']);
					$excel->getActiveSheet()->setCellValue("$letter[11]$i",$home_info['address']);
				}
				else if($trip['start_type'] == 2){
					$excel->getActiveSheet()->setCellValue("$letter[7]$i",0);
                                        $excel->getActiveSheet()->setCellValue("$letter[8]$i",1);
					$excel->getActiveSheet()->setCellValue("$letter[9]$i",$user_info['lng']);
                                        $excel->getActiveSheet()->setCellValue("$letter[10]$i",$user_info['lat']);
                                        $excel->getActiveSheet()->setCellValue("$letter[11]$i",$user_info['address']);
                                }
				else{
					$excel->getActiveSheet()->setCellValue("$letter[7]$i",0);
                                        $excel->getActiveSheet()->setCellValue("$letter[8]$i",0);
					$excel->getActiveSheet()->setCellValue("$letter[9]$i",$trip['start_lng']);
                                        $excel->getActiveSheet()->setCellValue("$letter[10]$i",$trip['start_lat']);
					$excel->getActiveSheet()->setCellValue("$letter[11]$i",$trip['start_address']);
				}
				if($trip['start_other_station'] >0){
					$excel->getActiveSheet()->setCellValue("$letter[12]$i",$way[$trip['start_other_station']]['name']);
					$excel->getActiveSheet()->setCellValue("$letter[9]$i",$way[$trip['start_other_station']]['lng']);
                                        $excel->getActiveSheet()->setCellValue("$letter[10]$i",$way[$trip['start_other_station']]['lat']);
				}
				$excel->getActiveSheet()->setCellValue("$letter[13]$i",$trip['start_province']);
				$excel->getActiveSheet()->setCellValue("$letter[14]$i",$trip['start_city']);
				$excel->getActiveSheet()->setCellValue("$letter[15]$i",$trip['start_distict']);
				$excel->getActiveSheet()->setCellValue("$letter[16]$i",$trip['start_other']);
				$excel->getActiveSheet()->setCellValue("$letter[17]$i",$trip['start_address_type']);
                                $excel->getActiveSheet()->setCellValue("$letter[18]$i",date("H:i",$end_time));
				if($trip['end_type'] == 1){
					$excel->getActiveSheet()->setCellValue("$letter[19]$i",1);
                                        $excel->getActiveSheet()->setCellValue("$letter[20]$i",0);
                                        $excel->getActiveSheet()->setCellValue("$letter[21]$i",$home_info['lng']);
                                        $excel->getActiveSheet()->setCellValue("$letter[22]$i",$home_info['lat']);
                                        $excel->getActiveSheet()->setCellValue("$letter[23]$i",$home_info['address']);
                                }
                                else if($trip['end_type'] == 2){
					$excel->getActiveSheet()->setCellValue("$letter[19]$i",0);
                                        $excel->getActiveSheet()->setCellValue("$letter[20]$i",1);
                                        $excel->getActiveSheet()->setCellValue("$letter[21]$i",$user_info['lng']);
                                        $excel->getActiveSheet()->setCellValue("$letter[22]$i",$user_info['lat']);
                                        $excel->getActiveSheet()->setCellValue("$letter[23]$i",$user_info['address']);
                                }
                                else{
					$excel->getActiveSheet()->setCellValue("$letter[19]$i",0);
                                        $excel->getActiveSheet()->setCellValue("$letter[20]$i",0);
                                        $excel->getActiveSheet()->setCellValue("$letter[21]$i",$trip['end_lng']);
                                        $excel->getActiveSheet()->setCellValue("$letter[22]$i",$trip['end_lat']);
                                        $excel->getActiveSheet()->setCellValue("$letter[23]$i",$trip['end_address']);
                                }
				$ouyways = explode(',',$trip['outway']);
				$excel->getActiveSheet()->setCellValue("$letter[24]$i",$trip['end_other_station']);
                                $excel->getActiveSheet()->setCellValue("$letter[25]$i",$trip['end_province']);
                                $excel->getActiveSheet()->setCellValue("$letter[26]$i",$trip['end_city']);
                                $excel->getActiveSheet()->setCellValue("$letter[27]$i",$trip['end_distict']);
                                $excel->getActiveSheet()->setCellValue("$letter[28]$i",$trip['end_other']);
                                $excel->getActiveSheet()->setCellValue("$letter[29]$i",$trip['end_address_type']);
                                $excel->getActiveSheet()->setCellValue("$letter[30]$i",$trip['iswalk']);
				if(isset($ouyways[0])){
					$excel->getActiveSheet()->setCellValue("$letter[31]$i",$ouyways[0]);
				}
				if(isset($ouyways[1])){
                                        $excel->getActiveSheet()->setCellValue("$letter[32]$i",$ouyways[1]);
                                }
				if(isset($ouyways[2])){
                                        $excel->getActiveSheet()->setCellValue("$letter[33]$i",$ouyways[2]);
                                }
				if(isset($ouyways[3])){
                                        $excel->getActiveSheet()->setCellValue("$letter[34]$i",$ouyways[3]);
                                }
				if(isset($ouyways[4])){
                                        $excel->getActiveSheet()->setCellValue("$letter[35]$i",$ouyways[4]);
                                }
				$excel->getActiveSheet()->setCellValue("$letter[36]$i",$trip['pay_off']);
                                $excel->getActiveSheet()->setCellValue("$letter[37]$i",$trip['to_subway_time']);
                                $excel->getActiveSheet()->setCellValue("$letter[38]$i",$trip['to_subway_cost']);
                                $excel->getActiveSheet()->setCellValue("$letter[39]$i",$trip['start_station']);
                                $excel->getActiveSheet()->setCellValue("$letter[40]$i",$trip['end_station']);
				$excel->getActiveSheet()->setCellValue("$letter[41]$i",$trip['bus_time']);
                                $excel->getActiveSheet()->setCellValue("$letter[42]$i",$trip['bus_cost']);
				$excel->getActiveSheet()->setCellValue("$letter[43]$i",$trip['to_dest_time']);
                                $excel->getActiveSheet()->setCellValue("$letter[44]$i",$trip['to_dest_cost']);
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
		$letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL');
		$question = array();
		$questions = $this->survey_question_model->get_by_condition(array('survey_id'=>$id,'category_id'=>1));
		if(!empty($questions)){
			$num= 1;
			foreach($questions as $tmp){
				$quest = $this->question_model->get_by_id($tmp['question_id']);
				$question[] = $quest['question'];
				$num ++;
			}
			
		}
		$tableheader = array_merge(array('编号','户编号','调查员','调查开始日期:月','日','星期','开始时间','结束时间','调查持续时间','区','街道','社区','家庭详细地址','地图住址','经度','纬度'),$question);
		for($i = 0;$i < count($tableheader);$i++) {
			$excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
		}
		$home_list = $this->home_info_model->get_by_pid($id);
		if(!empty($home_list)){
			$i = 2;
			foreach($home_list as $home){
				$time = strtotime($home['start_time']);
				$end_time = strtotime($home['end_time']);
				$create_time =  strtotime($home['create_date']);
				$cost_time = round(($end_time - $create_time)/60);
				$weeks = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
				$account = $this->account_model->get_user_by_uid($home['user_id']);
				$excel->getActiveSheet()->setCellValue("$letter[0]$i",$home['id']);
				$excel->getActiveSheet()->setCellValue("$letter[1]$i",$home['number']);
				if(isset($account['name'])){
				$excel->getActiveSheet()->setCellValue("$letter[2]$i",$account['name']);
				}
				$excel->getActiveSheet()->setCellValue("$letter[3]$i",date("m",$time));
				$excel->getActiveSheet()->setCellValue("$letter[4]$i",date("d",$time));
				$excel->getActiveSheet()->setCellValue("$letter[5]$i",$weeks[date("w",$time)]);
				$excel->getActiveSheet()->setCellValue("$letter[6]$i",date("H:i",$create_time));
                                $excel->getActiveSheet()->setCellValue("$letter[7]$i",date("H:i",$end_time));
				$excel->getActiveSheet()->setCellValue("$letter[8]$i",$cost_time);
				$excel->getActiveSheet()->setCellValue("$letter[9]$i",$home['district']?$home['district']:'');
				$excel->getActiveSheet()->setCellValue("$letter[10]$i",$home['street']?$home['street']:'');
				$excel->getActiveSheet()->setCellValue("$letter[11]$i",$home['community']?$home['community']:'');
				$excel->getActiveSheet()->setCellValue("$letter[12]$i",$home['detail_address']?$home['detail_address']:'');
				$excel->getActiveSheet()->setCellValue("$letter[13]$i",$home['address']?$home['address']:'');
				$excel->getActiveSheet()->setCellValue("$letter[14]$i",$home['lng']?$home['lng']:'');
				$excel->getActiveSheet()->setCellValue("$letter[15]$i",$home['lat']?$home['lat']:'');
				$j = 16;
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
