<?php
	class CommonAction extends Action{
		Public function _initialize(){
			
			if(!isset($_SESSION['admin_uname']) || $_SESSION['admin_uname']==''){
				$this->error('请登录',U('Login/login'));
			}
			
			//开启日志记录
			$logmodel=M('adminlog');
			$logdata=array();
			$logdata['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
			
			if($_SERVER['HTTP_CLIENT_IP']){
				$logdata['ip']=$_SERVER['HTTP_CLIENT_IP'];
			}elseif($_SERVER['HTTP_X_FORWARDED_FOR']){
				$logdata['ip']=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
				$logdata['ip']=$_SERVER['REMOTE_ADDR'];
			}
			
			$logdata['uname'] = $_SESSION['admin_uname'];
			$logdata['addtime']=date('Y-m-d H:i:s',time());
			$logmodel->add($logdata);
			//writing
		}
	}
