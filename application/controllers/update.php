<?php

class Update extends MY_Controller{
	
	public function __construct(){
                parent::__construct();
		$this->load->model('app_version_model');
	}
	public function check_update(){
		$data = array('status_code'=>0,'verson'=>0,'apkurl'=>'');
		$version = $this->input->get_post('version');
		if(empty($version))
                {
                        $data['status_code'] = 0;
			echo json_encode($data);
			return;
                }
		$now_version = $this->app_version_model->get();
		if(!empty($now_version)){
			if(!$this->check_now_version($version,$now_version['version'])){
				$data['status_code'] = 1;
				$data['version'] = $now_version['version'];
				$data['apkurl'] = $now_version['apk_url'];
			}
		}
		echo json_encode($data);
		return;
	}
	public function check_now_version($version1, $version2){

                $v1 = explode('.', $version1);
                $v2 = explode('.', $version2);
                if( (int)$v1[0] < (int)$v2[0] ) {
                        return false;
                }elseif((int)$v1[0] <= (int)$v2[0] && (int)$v1[1] < (int)$v2[1] ) {
                        return false;
                }elseif( (int)$v1[0] <= (int)$v2[0] && (int)$v1[1] <= (int)$v2[1] && (int)$v1[2] < (int)$v2[2] ) {
                        return false;
                }

                return true;
        }

}
?>
