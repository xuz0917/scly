<?php

	class SystemAction extends CommonAction {
		//系统
		public function index(){
			//echo C('TMPL_PARSE_STRING.__FZHOSTFIX__');
			$sysmode=M("Fzinfo");
			$sysfond=$sysmode->where("id='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")->field('webtitle,keywords,description')->find();
			$this->assign("sysfond",$sysfond);
	    	$this->display();
	    }
	    //保存系统
	    public function indexsave(){
	    	$sysmode=M("Fzinfo");
	    	$data=array();
	    	$data['webtitle']=$_POST['title'];
	    	$data['keywords']=$_POST['keywords'];
	    	$data['description']=$_POST['description'];
	    	
	    	$sysmode->where("id={$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}")->save($data);
	    	$this->success('保存成功');
	    }
	    
	    public function admin(){
	    	$sysadminmode=M('Admin');
	    	$sysadmin=$sysadminmode->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")->select();
	    	$this->assign('sysadmin',$sysadmin);
	    	$this->display();
	    }
	    public function admindel($id){
	    	if($_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_uname']!=='admin'){
	    		$this->error('只有内置管理员才能删除会员',__APP__.'/Index/index');
	    	}
	    	if($id==1){
	    		$this->error('内置管理员不可删除');
	    	}
	    	//权限判断代码
	    	
	    	$sysadminmode=M('admin');
	    	$sysadminmode->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and id='$id'")->delete();
	    	$this->success("删除成功");
	    }
	    public function adminadd(){
	    	if($_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_qx']<10){
	    		$this->error('只有内置管理员才能添加会员',__APP__.'/Index/index');
	    	}
	    	$this->display();
	    }
	    public function adminaddsave(){
	    	if($_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_qx']<10){
	    		$this->error('权限不够',__APP__.'/Index/index');
	    	}
	    	if(isset($_POST['uname'])&&$_POST['uname']==''){
	    		$this->error('用户名不能为空');
	    	}
	    	if(isset($_POST['upass'])&&$_POST['upass']==''){
	    		$this->error('密码不能为空');
	    	}
	    	$sysadminmode=M('admin');
	    	$data=array();
	    	$data['uname']=$_POST['uname'];
	    	$data['upass']=md5($_POST['upass']);
	    	$data['qx']=9;
	    	$data['fzid']=$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'];
	    	$data['fzfix']=$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzfix'];
	    	$data['fzname']=$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzname'];
	    	
	    	//判断重名
	    	$chongming=$sysadminmode->where('uname',$data['uname'])->find();
	    	if($chongming){
	    		$this->error('已存在此用户');
	    	}
	    	if($sysadminmode->add($data)){
	    		$this->success('添加成功');
	    	}else {
	    		$this->error('添加失败');
	    	}
	    	
	    }
	    public function adminedit($id){
	    	
	    	$admineditmodel=M('Admin');
	    	$adminedit=$admineditmodel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and id='$id'")->find();
	    	if($_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_qx']<10){
	    		if($adminedit['id']!=$id){
	    			$this->error('不能编辑别人的信息');
	    		}
	    	}
	    	$this->assign('adminedit',$adminedit);
	    	$this->display();
	    }
	    public function admineditsave($id){
	    	$admineditmodel=M('Admin');
	    	$adminedit=$admineditmodel->where("id='$id'")->find();
	    	if($_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_qx']<10){
	    		if($adminedit['id']!=$id){
	    			$this->error('不能编辑别人的信息');
	    		}
	    	}
	    	$data=array();
	    	
	    	$data['upass']=md5($_POST['upass']);
	    	if($admineditmodel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and id='$id'")->save($data)){
	    		$this->success('修改成功');
	    		if($_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_qx']<10){
		    		if(isset($_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_uname'])) {
		    			unset($_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_uname']);
		    			unset($_SESSION);
		    			session_destroy();
		    			$this->success('请重新登陆！',U('Login/login'));
		    		}else {
		    			$this->success('请重新登陆！',U('Login/login'));
		    		}
	    		}
	    		
	    	}else{
	    		$this->error('修改失败');
	    	}
	    }
	    
	    
	    public function bakdbstart(){
	    	$db =   Db::getInstance();
	    	$tables = $db->getTables();
	    	foreach ($tables as $tbname){
	    		//表结构
	    		$tempsql.="DROP TABLE IF EXISTS `$tbname`;\n";
	    		$struct=$db->query("show create table `$tbname`");
	    		$tempsql.= $struct[0]['Create Table'].";\n\n";
	    		$sql='';
	    		//数据
	    		$coumt=$db->getFields($tbname);
	    		$modelname=str_replace(C('DB_PREFIX'),'',$tbname);
	    		$row=D($modelname);
	    		$row=$row->select();
	    	
	    		$values = array();
	    		foreach ($row as $value) {
	    			$sql = "INSERT INTO `{$tbname}` VALUES (";
	    			foreach($value as $v) {
	    			$sql .="'".mysql_real_escape_string($v)."',";
	    			}
	    			$sql=substr($sql,0,-1);
	    			$sql .= ");\n\n";
	    			$tempsql.= $sql;
	    			$sql='';
	    		}
	    	}
	    	$filename= 'db-'.date('Y').'-'.date('m').'-'.date('d').'-'.date('H').'-'.date('i').'-'.date('s').'.sql';
	    	$filepath = '../Admin/Public/BAK/'.$filename;
			$fp = fopen($filepath,'w');
	    	if(fputs($fp,$tempsql) === false){
	    	$this->error('备份数据失败！');
	    	}else{
		    	$this->success('备份成功');
			}
	    }
	    
	    public function koufei(){
	    	
	    	$where="fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
	    	
	    	$fzjfmodel = M('Fzjf'); // 实例化User对象
	    	$fzjf=$fzjfmodel->where($where)->find();
	    	$this->assign('fzjf',$fzjf['count']);// 赋值分页输出
	    	
	    	$fzjfinfomodel = M('Fzjfinfo');
	    	import('ORG.Util.Page');// 导入分页类
	    	$count      = $fzjfinfomodel->where($where)->count();// 查询满足要求的总记录数
	    	$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
	    	$Page->setConfig('theme',"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
	    	$show       = $Page->show();// 分页显示输出
	    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	    	$fzjfinfo = $fzjfinfomodel->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    	$this->assign('fzjfinfo',$fzjfinfo);// 赋值数据集
	    	$this->assign('page',$show);// 赋值分页输出
	    	$this->display(); // 输出模板
	    	
	    }
	    
	}