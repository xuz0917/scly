<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
    public function index(){
		$this->display('login');
    }
    public function login() {
    	$this->display();
    }
    public function checklogin() {
    	
    	$uname=$_POST['uname'];
    	$upass=md5($_POST['upass']);
    	
   		//检验是否为空
    	if(empty($uname)) {
			$this->error('帐号错误！');
		}elseif (empty($upass)){
			$this->error('密码必须！');
		}
		
		$user_list=M('Admin');
		
		$where=array();
		$where['uname']=$uname;
		
		//开启日志记录
		$logmode=M('adminlog');
		$logdata=array();
		$logdata['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		
		if($_SERVER['HTTP_CLIENT_IP']){
			$logdata['ip']=$_SERVER['HTTP_CLIENT_IP'];
		}elseif($_SERVER['HTTP_X_FORWARDED_FOR']){
			$logdata['ip']=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$logdata['ip']=$_SERVER['REMOTE_ADDR'];
		}
		
		
		$logdata['uname'] = $uname;
		$logdata['addtime']=time();
		$logmode->add($logdata);
		//writing
		
		$finduser=$user_list->where($where)->find();
		if ($finduser) {
			//记录成功登陆
			if($finduser['upass']===$upass){

				$_SESSION['admin_qx']=$finduser['qx'];
				$_SESSION['admin_uid']=$finduser['id'];
				$_SESSION['admin_uname']=$uname;
				$this->success("登陆成功",U('Index/index'));
			
			}else{
				//记录失败登陆
				$this->error('用户名或密码错误！');
			}
		}else{
			//记录失败登陆
			$this->error('用户名或密码错误！');
		}
		
    }
    public function logout() {
    	if(isset($_SESSION['admin_uname'])) {
			unset($_SESSION['admin_uname']);
			unset($_SESSION);
			session_destroy();
            $this->success('登出成功！',U('Login/login'));
        }else {
            
            $this->success('已经登出！',U('Login/login'));
        }
    }
}