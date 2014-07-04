<?php

	class CompanyAction extends CommonAction {
		
		public function index($keyword=''){
			if(isset($_GET['keyword'])&&$_GET['keyword']){
				$keyword=$_GET['keyword'];
			}
			$CompanyModel=D('Company');
			import('ORG.Util.Page');// 导入分页类
			$count      = $CompanyModel->count($keyword);// 查询满足要求的总记录数
			$Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
			$Page->setConfig('theme',"共%totalRow%条  %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$Comlist=$CompanyModel->getCompanyList($Page->firstRow,$Page->listRows,$keyword);
			$this->assign('Comlist',$Comlist);
			$this->assign('page',$show);// 赋值分页输出
			
	    	$this->display();
	    }
	    public function add(){
	    	$this->display();
	    }
	    public function addsave(){

	    	$_POST['name']=trim($_POST['name']);
	    	$_POST['supervise']=trim($_POST['supervise']);
	    	
	    	//$CompanyData Company表
	    	$CompanyData=array();
	    	
	    	//$CompanyData approve表
	    	$ApproveData=array();
	    	
	    	//$CompanyData comimg表
	    	$ComimgData=array();
	    	
	    	//会员添加
	    	$UserData=array();
	    	

	    	$UserData['uname']=$_POST['name'];
	    	if(isset($_POST['supervise'])&&$_POST['supervise']!='')
	    		$UserData['upass']=md5(trim($_POST['supervise']));
	    	else 
	    		$UserData['upass']=md5($UserData['uname']);
	    	//插入会员信息
	    	$UserData['mobile']=$_POST['supervise'];
	    	$UserData['suozai']=C("TMPL_PARSE_STRING.__FZCITY__");
	    	if ($isuname=$this->isgsuser($_POST['name'])) {
	    		$i=1;
	    		while($isuname){
	    			$i++;
	    			$UserData['uname']=$_POST['name'].$i;
	    			$isuname=$this->isgsuser($UserData['uname']);
	    		}
	    	}
	    	$UserModel=M('User');
	    	$uid=$UserModel->add($UserData);
	    	if(!$uid){
	    		$this->error('添加会员信息错误');
	    	}
	    	
	    	//插入公司基本信息
	    	$CompanyData['companyname']=trim($_POST['name']);
	    	$CompanyData['title']=$_POST['title'];
	    	$CompanyData['uid']=$uid;
	    	$CompanyData['logo']=$_POST['logo'];
	    	$CompanyData['mastertu']=$_POST['mastertu'];
	    	$CompanyData['yunying']=$_POST['yunying'];
	    	
	    	$CompanyData['yunshu']=$_POST['yunshu1'].'/'.$_POST['yunshu2'].'/'.$_POST['yunshu3'].'/'.$_POST['yunshu4'];
	    	$CompanyData['yunshu']=$this->manycheckbox($CompanyData['yunshu']);
	    	
	    	$CompanyData['baoxian']=$_POST['baoxian'];
	    	$CompanyData['fangkuanzhouqi']=$_POST['fangkuanzhouqi'];
	    	$CompanyData['fangkuanshijian']=$_POST['fangkuanshijian'];
	    	
	    	$CompanyData['fangkuan']=$_POST['fangkuan1'].'/'.$_POST['fangkuan2'];
	    	$CompanyData['fangkuan']=$this->manycheckbox($CompanyData['fangkuan']);
	    	
	    	$CompanyData['jianjie']=$_POST['jianjie'];
	    	$CompanyData['chengnuo']=$_POST['chengnuo'];
	    	$CompanyData['shouhuo']=$_POST['shouhuo'];
	    	$CompanyData['xiehuo']=$_POST['xiehuo'];
	    	$CompanyData['keywords']=$_POST['keywords'];
	    	$CompanyData['description']=$_POST['description'];
	    	$CompanyData['hotline']=$_POST['hotline'];
	    	$CompanyData['fuzeren']=$_POST['fuzeren'];
	    	$CompanyData['supervise']=$_POST['supervise'];
	    	$CompanyData['templet']=$_POST['templet'];
	    	$CompanyData['fzid']=$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'];
	    	
	    	$CompanyModel=M('Company');
	    	if(!$Comid=$CompanyModel->add($CompanyData)) $this->error('插入公司基本信息错误');
	    	else{
		    	$ApproveData['cid']=$Comid;
		    	$ComimgData['cid']=$Comid;
	    	}
	    	
	    	//插入图片表
	    	$ComimgData['banner1']=$_POST['banner1'];
	    	$ComimgData['banner2']=$_POST['banner2'];
	    	$ComimgData['dangan']=$_POST['dangan'];
	    	$ComimgData['dangan1']=$_POST['dangan1'];
	    	$ComimgData['dangan2']=$_POST['dangan2'];
	    	$ComimgData['dangan3']=$_POST['dangan3'];
	    	$ComimgData['dangan4']=$_POST['dangan4'];
	    	$ComimgData['dangan5']=$_POST['dangan5'];
	    	$ComimgData['dangan6']=$_POST['dangan6'];
	    	$ComimgData['dangan7']=$_POST['dangan7'];
	    	$ComimgData['changjing']=$_POST['changjing'];
	    	$ComimgData['changjing1']=$_POST['changjing1'];
	    	$ComimgData['changjing2']=$_POST['changjing2'];
	    	$ComimgData['changjing3']=$_POST['changjing3'];
	    	$ComimgData['changjing4']=$_POST['changjing4'];
	    	$ComimgData['changjing5']=$_POST['changjing5'];
	    	$ComimgData['changjing6']=$_POST['changjing6'];
	    	$ComimgData['changjing7']=$_POST['changjing7'];
	    	$ComimgData['rongyu']=$_POST['rongyu'];
	    	$ComimgData['rongyu1']=$_POST['rongyu1'];
	    	$ComimgData['rongyu2']=$_POST['rongyu2'];
	    	$ComimgData['rongyu3']=$_POST['rongyu3'];
	    	$ComimgData['rongyu4']=$_POST['rongyu4'];
	    	$ComimgData['rongyu5']=$_POST['rongyu5'];
	    	$ComimgData['rongyu6']=$_POST['rongyu6'];
	    	$ComimgData['rongyu7']=$_POST['rongyu7'];

	    	//插入图片
	    	$ComimgModel=M('Comimg');
	    	if(!$ComimgModel->add($ComimgData)) $this->error('插入公司图片信息错误');
	    	
	    	//插入认证
	    	$ApproveData['star']=$_POST['star'];
	    	$ApproveData['companyname']=$_POST['name'];
	    	$ApproveData['logos']=$_POST['logos'];
	    	$ApproveData['zhida']=$_POST['zhida'];
	    	$ApproveData['zhongzhuan']=$_POST['zhongzhuan'];
	    	$ApproveData['address']=$_POST['address'];
	    	$ApproveData['qq']=$_POST['qq'];
	    	$ApproveData['comyear']=1;
	    	$ApproveData['addtime']=date("Y-m-d H:i:s",time());
	    	$ApproveData['endtime']=date("Y-m-d H:i:s",time()+365*24*3600);
	    	$ApproveData['fzid']=$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'];
	    	$ApproveModel=M('Approve');
	    	if(!$ApproveModel->add($ApproveData)) $this->error('插入公司认证信息错误');
	    	if($_POST['star']){
	    		$this->fzjfinfo((-((int)$_POST['star']*100)), "开通网站".$_POST['name']);
	    	}
	    	
	    	
	    	
	    		    	
	    	$this->success('添加成功',__APP__.'/Company/edit/id/'.$Comid);
	    }
	    public function edit($id){
	    	
	    	$comid=$id;
	    	$ComModel=D('Company');
	    	$Company=$ComModel->getCompany($comid);
	    	$this->assign('company',$Company);
	    	$this->display();
	    	
	    }
	    public function editsave(){
	    
	    	$comid=$_POST['id'];
	    	//$CompanyData Company表
	    	$CompanyData=array();
	    	
	    	//$CompanyData approve表
	    	$ApproveData=array();
	    	
	    	//$CompanyData comimg表
	    	$ComimgData=array();
	    	
	    	//插入公司基本信息
	    	$CompanyData['companyname']=$_POST['name'];
	    	$CompanyData['title']=$_POST['title'];
	    	$CompanyData['logo']=$_POST['logo'];
	    	$CompanyData['mastertu']=$_POST['mastertu'];
	    	$CompanyData['yunying']=$_POST['yunying'];
	    	
	    	$CompanyData['yunshu']=$_POST['yunshu1'].'/'.$_POST['yunshu2'].'/'.$_POST['yunshu3'].'/'.$_POST['yunshu4'];
	    	$CompanyData['yunshu']=$this->manycheckbox($CompanyData['yunshu']);
	    	
	    	$CompanyData['baoxian']=$_POST['baoxian'];
	    	$CompanyData['fangkuanzhouqi']=$_POST['fangkuanzhouqi'];
	    	$CompanyData['fangkuanshijian']=$_POST['fangkuanshijian'];
	    	
	    	
	    	$CompanyData['fangkuan']=$_POST['fangkuan1'].'/'.$_POST['fangkuan2'];
	    	$CompanyData['fangkuan']=$this->manycheckbox($CompanyData['fangkuan']);
	    	
	    	$CompanyData['jianjie']=$_POST['jianjie'];
	    	$CompanyData['chengnuo']=$_POST['chengnuo'];
	    	$CompanyData['shouhuo']=$_POST['shouhuo'];
	    	$CompanyData['xiehuo']=$_POST['xiehuo'];
	    	$CompanyData['keywords']=$_POST['keywords'];
	    	$CompanyData['description']=$_POST['description'];
	    	$CompanyData['hotline']=$_POST['hotline'];
	    	$CompanyData['fuzeren']=$_POST['fuzeren'];
	    	$CompanyData['supervise']=$_POST['supervise'];
	    	$CompanyData['templet']=$_POST['templet'];
	    	
	    	$CompanyModel=M('Company');
	    	$CompanyModel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and id='$comid'")->data($CompanyData)->save();
	  
	    	
	    	//插入图片表
	    	$ComimgData['banner1']=$_POST['banner1'];
	    	$ComimgData['banner2']=$_POST['banner2'];
	    	$ComimgData['dangan']=$_POST['dangan'];
	    	$ComimgData['dangan1']=$_POST['dangan1'];
	    	$ComimgData['dangan2']=$_POST['dangan2'];
	    	$ComimgData['dangan3']=$_POST['dangan3'];
	    	$ComimgData['dangan4']=$_POST['dangan4'];
	    	$ComimgData['dangan5']=$_POST['dangan5'];
	    	$ComimgData['dangan6']=$_POST['dangan6'];
	    	$ComimgData['dangan7']=$_POST['dangan7'];
	    	$ComimgData['changjing']=$_POST['changjing'];
	    	$ComimgData['changjing1']=$_POST['changjing1'];
	    	$ComimgData['changjing2']=$_POST['changjing2'];
	    	$ComimgData['changjing3']=$_POST['changjing3'];
	    	$ComimgData['changjing4']=$_POST['changjing4'];
	    	$ComimgData['changjing5']=$_POST['changjing5'];
	    	$ComimgData['changjing6']=$_POST['changjing6'];
	    	$ComimgData['changjing7']=$_POST['changjing7'];
	    	$ComimgData['rongyu']=$_POST['rongyu'];
	    	$ComimgData['rongyu1']=$_POST['rongyu1'];
	    	$ComimgData['rongyu2']=$_POST['rongyu2'];
	    	$ComimgData['rongyu3']=$_POST['rongyu3'];
	    	$ComimgData['rongyu4']=$_POST['rongyu4'];
	    	$ComimgData['rongyu5']=$_POST['rongyu5'];
	    	$ComimgData['rongyu6']=$_POST['rongyu6'];
	    	$ComimgData['rongyu7']=$_POST['rongyu7'];

	    	//插入图片
	    	$ComimgModel=M('Comimg');
	    	$ComimgModel->where("cid='$comid'")->save($ComimgData);
	    	
	    	//插入认证
	    	$ApproveData['companyname']=$_POST['name'];
	    	$ApproveData['logos']=$_POST['logos'];
	    	
	    	$ApproveData['zhida']=$_POST['zhida'];
	    	$ApproveData['zhongzhuan']=$_POST['zhongzhuan'];
	    	$ApproveData['address']=$_POST['address'];
	    	$ApproveData['qq']=$_POST['qq'];
	    	$ApproveModel=M('Approve');
	    	$Approve = $ApproveModel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and cid='$comid'")->find();
	    	if (isset($_POST['star'])&&$_POST['star']&&($Approve['star']==0||$Approve['star']=='')) {
	    		$ApproveData['star']=$_POST['star'];
	    		$this->fzjfinfo((-((int)$_POST['star']*100)), "开通网站".$_POST['name']);
	    	}
	    	
	    	$ApproveModel->where("cid='$comid'")->save($ApproveData);
	    	
	    	$Comdomain=$ApproveModel->where("cid='$comid'")->field("domain")->find();
	    	$companydir=explode('.',$Comdomain['domain']);
	    	$filedir='/'.$companydir[0].'/';
	    	
	    	import('@.ORG.Util.Makehtml');
	    	$Mhtmlcom=new Makehtml();
	    	$companydir=explode('.',$Comdomain['domain']);
	    	$filedir='/'.$companydir[0].'/';
	    	$Mhtmlcom->delcomhtml($filedir);
	    	 
	    	$fileurl='http://'.$_SERVER['HTTP_HOST'].'/company-'.$comid.'.html';
	    	$filename='index.html';
	    	 
	    	$fileurljianjie='http://'.$_SERVER['HTTP_HOST'].'/company-jianjie-'.$comid.'.html';
	    	$filenamejianjie='jianjie.html';
	    	 
	    	$fileurlrongyu='http://'.$_SERVER['HTTP_HOST'].'/company-rongyu-'.$comid.'.html';
	    	$filenamerongyu='rongyu.html';
	    	 
	    	$fileurlchangjing='http://'.$_SERVER['HTTP_HOST'].'/company-changjing-'.$comid.'.html';
	    	$filenamechangjing='changjing.html';
	    	
	    	$fileurldangan='http://'.$_SERVER['HTTP_HOST'].'/company-dangan-'.$comid.'.html';
	    	$filenamedangan='dangan.html';
	    	 
	    	$fileurltousu='http://'.$_SERVER['HTTP_HOST'].'/company-tousu-'.$comid.'.html';
	    	$filenametousu='tousu.html';
	    	 
	    	$Mhtmlcom->makecomhtml($fileurl,$filedir,$filename);
	    	$Mhtmlcom->makecomhtml($fileurljianjie,$filedir,$filenamejianjie);
	    	$Mhtmlcom->makecomhtml($fileurlrongyu,$filedir,$filenamerongyu);
	    	$Mhtmlcom->makecomhtml($fileurlchangjing,$filedir,$filenamechangjing);
	    	$Mhtmlcom->makecomhtml($fileurldangan,$filedir,$filenamedangan);
	    	$Mhtmlcom->makecomhtml($fileurltousu,$filedir,$filenametousu);
	    	
	    	$this->success('修改成功');
	    
	    }
	    
	    public function del($id){

	    	$ApproveModel=M('Approve');
	    	$checkdomain=$ApproveModel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and cid='$id'")->field("domain,companyname,star,addtime,starttime")->find();
	    	import('@.ORG.Util.Timestamp');
	    	$mytime=new Timestamp();
	    	$riqichazhi=$mytime->chazhi($checkdomain['addtime'],date("Y-m-d H:i:s"));
	    	if($riqichazhi<3&&!$checkdomain['starttime']){
	    		$this->fzjfinfo((((int)$checkdomain['star']*100)), "删除网站".$checkdomain['companyname']);
	    	}
	    	
	    	$zhidingModel=M('Recommend');
	    	$zhiding=$zhidingModel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and cid='$id'")->find();
	    	if($zhiding){
	    		$this->error("有置顶城市，请先删除置顶城市！");
	    	}
	    	
	    	$ComModel=D('Company');
	    	if($ComModel->delCompany($id)){
	    		
	    		import('@.ORG.Util.Hostheader');
	    		$MHost=new Hostheader();
	    		$MHost->delcomhost($id);
	    		
	    		import('@.ORG.Util.Makehtml');
	    		$Mhtmlcom=new Makehtml();
	    		
	    		$companydir=explode('.',$checkdomain['domain']);
	    		$filedir='/'.$companydir[0].'/';
	    		$Mhtmlcom->delcomhtml($filedir);
	    		
	    		$this->success("删除成功");
	    	}else{
	    		$this->error("删除失败");
	    	}
	    	
	    }
	    public function xufei($id){
	    	$ApproveModel=M('Approve');
	    	$ApproveDomain=$ApproveModel->where("cid='$id' and fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")->field('companyname,star,domain,comyear,endtime')->find();
	    	if(!empty($ApproveDomain['domain'])){
	    		import('@.ORG.Util.Timestamp');
	    		$Tstamp=new Timestamp();
	    		
	    		$data['endtime']=$Tstamp->tostamp($ApproveDomain['endtime']);
	    		$data['endtime']=date("Y-m-d H:i:s",$data['endtime']+31536000);
	    		$data['comyear']=$data['comyear']+1;
	    		$ApproveModel->where("cid='$id' and fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")->save($data);
	    		$this->fzjfinfo((-((int)$ApproveDomain['star']*100)), "网站".$ApproveDomain['companyname'].'续费');
	    		
	    		$this->success("续费成功");
	    	}else{
	    		$this->error('正式会员，请开通二级域名！');
	    	}
	    }
	    
		function manycheckbox($param){
			$vowels = array("////", "///", "//");
			$param1 = str_replace($vowels, "/", $param);
			
			if (substr($param1, 0, 1)=='/') {
				$param1 = substr($param1, 1);
			}
			if (substr($param1, -1, 1)=='/') {
				$param1 = substr($param1, 0,strlen($param1)-1);
			}
			
			return $param1;
		}
	    
	    public function domain($id){
	    	$ApproveModel=M('Approve');
	    	$Domain=$ApproveModel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and cid='$id'")->find();
	    	$this->assign("domain",$Domain['domain']);
	    	$this->display();
	    }
	    public function domainaddsave(){
	    	$cid=$_POST['cid'];
	    	$data['domain']=C('TMPL_PARSE_STRING.__FZHOSTFIX__').trim($_POST['domain']).'.56cheng.com';
	    	if ($_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']==1) {
	    		$data['domain']=trim($_POST['domain']).'.56cheng.com';
	    	}
	    	$data['starttime']=date("Y-m-d H:i:s",time());
	    	if($this->domaincheck($data['domain'])){
	    		$ApproveModel=M('Approve');
	    		$ApproveModel->where(" cid='$cid' and fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")->save($data);
	    		
	    		import('@.ORG.Util.Makehtml');
	    		$Mhtmlcom=new Makehtml();
	    		
	    		$companydir=explode('.',$data['domain']);
	    		$filedir='/'.$companydir[0].'/';
	    		$Mhtmlcom->delcomhtml($filedir);
	    		
	    		$fileurl='http://'.$_SERVER['HTTP_HOST'].'/company-'.$cid.'.html';
	    		$filename='index.html';
	    		
	    		$fileurljianjie='http://'.$_SERVER['HTTP_HOST'].'/company-jianjie-'.$cid.'.html';
	    		$filenamejianjie='jianjie.html';
	    		
	    		$fileurlrongyu='http://'.$_SERVER['HTTP_HOST'].'/company-rongyu-'.$cid.'.html';
	    		$filenamerongyu='rongyu.html';
	    		
	    		$fileurlchangjing='http://'.$_SERVER['HTTP_HOST'].'/company-changjing-'.$cid.'.html';
	    		$filenamechangjing='changjing.html';

	    		$fileurldangan='http://'.$_SERVER['HTTP_HOST'].'/company-dangan-'.$cid.'.html';
	    		$filenamedangan='dangan.html';
	    		
	    		$fileurltousu='http://'.$_SERVER['HTTP_HOST'].'/company-tousu-'.$cid.'.html';
	    		$filenametousu='tousu.html';
	    		
	    		$Mhtmlcom->makecomhtml($fileurl,$filedir,$filename);
	    		$Mhtmlcom->makecomhtml($fileurljianjie,$filedir,$filenamejianjie);
	    		$Mhtmlcom->makecomhtml($fileurlrongyu,$filedir,$filenamerongyu);
	    		$Mhtmlcom->makecomhtml($fileurlchangjing,$filedir,$filenamechangjing);
	    		$Mhtmlcom->makecomhtml($fileurldangan,$filedir,$filenamedangan);
	    		$Mhtmlcom->makecomhtml($fileurltousu,$filedir,$filenametousu);
	    		
	    		import('@.ORG.Util.Hostheader');
	    		$MHost=new Hostheader();
	    		$MHost->delcomhost($cid);
	    		if ($_POST['olddomain']!='') {
		    		if(!$MHost->addcomhost($cid, $data['domain'])){
		    			$this->error('域名清单写入未成功');
		    		}
	    		}else{
	    			if(!$MHost->savecomhost($cid, $data['domain'])){
	    				$this->error('域名清单写入未成功');
	    			}
	    		}
	    		
	    		$this->success("添加成功");
	    	}else{
	    		$this->error("已经有人使用，请换一个");
	    	}
	    }
	    
	    public function domaindel($id){
	    	$data['domain']="";
	    	$ApproveModel=M('Approve');
	    	$olddomain=$ApproveModel->where("cid='$id'")->field("domain")->find($data);
	    	$ApproveModel->where(" cid='$id' and fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")->save($data);
	    	import('@.ORG.Util.Hostheader');
	    	$MHost=new Hostheader();
	    	$MHost->delcomhost($id);
	    	
	    	import('@.ORG.Util.Makehtml');
	    	$Mhtmlcom=new Makehtml();
	    	
	    	
	    	$companydir=explode('.',$olddomain['domain']);
	    	$filedir='/'.$companydir[0].'/';
	    	$Mhtmlcom->delcomhtml($filedir);
	    	
	    	
	    	$this->success("已成功删除");
	    }
	    
	    public function domainajax($domain='') {
	    	if($domain==''){
	    		echo "1";
	    	}else{
	    		if($this->domaincheck($domain)){
	    			echo "0";
	    		}else{
	    			echo "1";
	    		}
	    	}
	    }
	     
	    public function compnayajax($name="") {
	    	if($name==''){
	    		echo "请输入公司名";
	    	}else{
	    		if($this->companycheck($name)){
	    			echo "恭喜！可以使用";
	    		}else{
	    			echo "已经有人使用，请换一个。如果您一定要使用，请确认后添加";
	    		}
	    	}
	    }
	    
	    public function domaincheck($domain='') {
	    	$DomainModel=M('Approve');
	    	$isappear=$DomainModel->where("domain='$domain'")->find();
	    	if(!$isappear){
	    		$Domain1Model=M('Fzinfo');
	    		$isappear1=$Domain1Model->where("domain='$domain'")->find();
	    		if(!$isappear1){
	    			//保留域名
	    			$Domain2Model=M('Savedomain');
	    			$isappear2=$Domain2Model->where("domain='$domain'")->find();
	    			if (!$isappear2) {
	    				return 1;
	    			}else{
	    				return 0;
	    			}
	    		}else{
	    			return 0;
	    		}
	    	}else{
	    		return 0;
	    	}
	    }
	    //检查公司名
	    public function companycheck($name='') {
	    	$CompanyModel=M('Approve');
	    	$isappear=$CompanyModel->where("companyname='$name'")->find();
	    	if(!$isappear){
	    		return 1;
	    	}else{
	    		return 0;
	    	}
	    }
	   
	    public function huishou($keyword=''){
	    	$recyclemodel = M('recycle'); 
	    	import('ORG.Util.Page');// 导入分页类
	    	$where="fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
	    	if($keyword)$where=$where." and `companyname` like '%$keyword%'";
	    	$count      = $recyclemodel->where($where)->count();// 查询满足要求的总记录数
	    	$Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
	    	$Page->setConfig('theme',"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
	    	$show       = $Page->show();// 分页显示输出
	    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	    	$recycle = $recyclemodel->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    	$this->assign('recycle',$recycle);// 赋值数据集
	    	$this->assign('page',$show);// 赋值分页输出
	    	$this->display(); // 输出模板
	    }
	    public function huishouhuanyuan($id){
	    	$recyclemodel = M('recycle');
	    	$where="fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and id='$id'";
	    	$recycle = $recyclemodel->where($where)->find();
	    	$this->assign('company',$recycle);
	    	$this->display();
	    	
	    }
	    public function huishouhuanyuansave(){
	    	//$CompanyData Company表
	    	$CompanyData=array();
	    	
	    	//$CompanyData approve表
	    	$ApproveData=array();
	    	
	    	//$CompanyData comimg表
	    	$ComimgData=array();

	    	//会员添加
	    	$UserData=array();
	    	
	    	$UserData['uname']=$_POST['name'];
	    	if(isset($_POST['supervise'])&&$_POST['supervise']!='')
	    		$UserData['upass']=md5(trim($_POST['supervise']));
	    	else
	    		$UserData['upass']=md5($UserData['uname']);
	    	//插入会员信息
	    	$UserData['mobile']=$_POST['supervise'];
	    	$UserData['suozai']=C("TMPL_PARSE_STRING.__FZCITY__");
	    	if ($isuname=$this->isgsuser($_POST['name'])) {
	    		$i=1;
	    		while($isuname){
	    			$i++;
	    			$UserData['uname']=$_POST['name'].$i;
	    			$isuname=$this->isgsuser($UserData['uname']);
	    		}
	    	}
	    	$UserModel=M('User');
	    	$uid=$UserModel->add($UserData);
	    	if(!$uid){
	    		$this->error('添加会员信息错误');
	    	}
	    	
	    	//插入公司基本信息
	    	$CompanyData['companyname']=$_POST['name'];
	    	$CompanyData['title']=$_POST['title'];
	    	$CompanyData['uid']=$uid;
	    	$CompanyData['logo']=$_POST['logo'];
	    	$CompanyData['mastertu']=$_POST['mastertu'];
	    	$CompanyData['yunying']=$_POST['yunying'];
	    	
	    	$CompanyData['yunshu']=$_POST['yunshu1'].'/'.$_POST['yunshu2'].'/'.$_POST['yunshu3'].'/'.$_POST['yunshu4'];
	    	$CompanyData['yunshu']=$this->manycheckbox($CompanyData['yunshu']);
	    	
	    	$CompanyData['baoxian']=$_POST['baoxian'];
	    	$CompanyData['fangkuanzhouqi']=$_POST['fangkuanzhouqi'];
	    	$CompanyData['fangkuanshijian']=$_POST['fangkuanshijian'];
	    	
	    	$CompanyData['fangkuan']=$_POST['fangkuan1'].'/'.$_POST['fangkuan2'];
	    	$CompanyData['fangkuan']=$this->manycheckbox($CompanyData['fangkuan']);
	    	
	    	$CompanyData['jianjie']=$_POST['jianjie'];
	    	$CompanyData['chengnuo']=$_POST['chengnuo'];
	    	$CompanyData['shouhuo']=$_POST['shouhuo'];
	    	$CompanyData['xiehuo']=$_POST['xiehuo'];
	    	$CompanyData['keywords']=$_POST['keywords'];
	    	$CompanyData['description']=$_POST['description'];
	    	$CompanyData['hotline']=$_POST['hotline'];
	    	$CompanyData['fuzeren']=$_POST['fuzeren'];
	    	$CompanyData['supervise']=$_POST['supervise'];
	    	$CompanyData['templet']=$_POST['templet'];
	    	$CompanyData['fzid']=$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'];
	    	
	    	$CompanyModel=M('Company');
	    	if(!$Comid=$CompanyModel->add($CompanyData)) $this->error('插入公司基本信息错误');
	    	else{
	    		$ApproveData['cid']=$Comid;
	    		$ComimgData['cid']=$Comid;
	    	}
	    	
	    	//插入图片表
	    	$ComimgData['banner1']=$_POST['banner1'];
	    	$ComimgData['banner2']=$_POST['banner2'];
	    	$ComimgData['dangan']=$_POST['dangan'];
	    	$ComimgData['dangan1']=$_POST['dangan1'];
	    	$ComimgData['dangan2']=$_POST['dangan2'];
	    	$ComimgData['dangan3']=$_POST['dangan3'];
	    	$ComimgData['dangan4']=$_POST['dangan4'];
	    	$ComimgData['dangan5']=$_POST['dangan5'];
	    	$ComimgData['dangan6']=$_POST['dangan6'];
	    	$ComimgData['dangan7']=$_POST['dangan7'];
	    	$ComimgData['changjing']=$_POST['changjing'];
	    	$ComimgData['changjing1']=$_POST['changjing1'];
	    	$ComimgData['changjing2']=$_POST['changjing2'];
	    	$ComimgData['changjing3']=$_POST['changjing3'];
	    	$ComimgData['changjing4']=$_POST['changjing4'];
	    	$ComimgData['changjing5']=$_POST['changjing5'];
	    	$ComimgData['changjing6']=$_POST['changjing6'];
	    	$ComimgData['changjing7']=$_POST['changjing7'];
	    	$ComimgData['rongyu']=$_POST['rongyu'];
	    	$ComimgData['rongyu1']=$_POST['rongyu1'];
	    	$ComimgData['rongyu2']=$_POST['rongyu2'];
	    	$ComimgData['rongyu3']=$_POST['rongyu3'];
	    	$ComimgData['rongyu4']=$_POST['rongyu4'];
	    	$ComimgData['rongyu5']=$_POST['rongyu5'];
	    	$ComimgData['rongyu6']=$_POST['rongyu6'];
	    	$ComimgData['rongyu7']=$_POST['rongyu7'];
	    	
	    	//插入图片
	    	$ComimgModel=M('Comimg');
	    	if(!$ComimgModel->add($ComimgData)) $this->error('插入公司图片信息错误');
	    	
	    	//插入认证
	    	$ApproveData['star']=$_POST['star'];
	    	$ApproveData['companyname']=$_POST['name'];
	    	$ApproveData['logos']=$_POST['logos'];
	    	$ApproveData['zhida']=$_POST['zhida'];
	    	$ApproveData['zhongzhuan']=$_POST['zhongzhuan'];
	    	$ApproveData['address']=$_POST['address'];
	    	$ApproveData['qq']=$_POST['qq'];
	    	$ApproveData['comyear']=1;
	    	$ApproveData['addtime']=date("Y-m-d H:i:s",time());
	    	$ApproveData['endtime']=date("Y-m-d H:i:s",time()+365*24*3600);
	    	$ApproveData['fzid']=$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'];
	    	$ApproveModel=M('Approve');
	    	if(!$ApproveModel->add($ApproveData)) $this->error('插入公司认证信息错误');
	    	if($_POST['star']){
	    		$this->fzjfinfo((-((int)$_POST['star']*100)), "还原网站".$_POST['name']);
	    	}
	    	
	    	$Recycleid=$_POST['reid'];
	    	$RecycleModel=M('Recycle');
	    	$RecycleModel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and id='$Recycleid'")->delete();
	    	
	    	$this->success('还原成功',__APP__.'/Company/edit/id/'.$Comid);
	    }
	    public function huishoudel($id){

	    	$comid=$id;
	    	$ComModel=M('Recycle');
	    	$Company=$ComModel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and id='$comid'")->delete();
	    	$this->success('删除成功');
	    }
	    
	    public function liuyan(){
	    	$fankuimodel = M('fankui');
	    	import('ORG.Util.Page');// 导入分页类
	    	$where='fzid='.$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'];
	    	$count      = $fankuimodel->where($where)->count();// 查询满足要求的总记录数
	    	$Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
	    	$Page->setConfig('theme',"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
	    	$show       = $Page->show();// 分页显示输出
	    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	    	$fankui = $fankuimodel->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    	$this->assign('fankui',$fankui);// 赋值数据集
	    	$this->assign('page',$show);// 赋值分页输出
	    	$this->display(); // 输出模板
	    }
	    public function liuyandel($id){
	    	$fankuimodel = M('fankui');
	    	$fankuimodel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and id= '$id'")->delete();
	    	$this->success("删除成功");
	    }
	    public function fahuo($keyword=''){
	    	$FahuoModel=D('Fahuo');
	    	import('ORG.Util.Page');// 导入分页类

	    	$count      = $FahuoModel->count($keyword);// 查询满足要求的总记录数
	    	$Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
	    	$Page->setConfig('theme',"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
	    	$show       = $Page->show();// 分页显示输出
	    	$Fahuo=$FahuoModel->getFahuoList($Page->firstRow,$Page->listRows,$keyword);
	    	$this->assign('fahuo',$Fahuo);// 赋值数据集
	    	$this->assign('page',$show);// 赋值分页输出
	    	$this->display();
	    }
	    public function fahuoview($id) {
	    	$FahuoModel=D('Fahuo');
	    	$Fahuo=$FahuoModel->getFahuo($id);
	    	$this->assign('fahuo',$Fahuo);
	    	$this->display();
	    }
	    
	    //查看是否存在会员
	    public function isgsuser($uname) {
	    	$UserModel=M('User');
	    	if ($UserModel->where("uname='$uname'")->find()) {
	    		return true;
	    	}else {
	    		return false;
	    	}
	    }
	    //批量生成企业静态
	    public function compiliang() {
	    	$ApproveModel=M('Approve');
	    	$where='fzid='.$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'].' and LENGTH(`domain`)>1';
	    	$count=$ApproveModel->where($where)->count();
	    	$this->assign('count',$count);
	    	$this->display();
	    }
	    //批量生成企业静态
	    public function compiliangstart() {
	    	//起始-结束
	    	$start=$_POST['start'];
	    	$count=$_POST['count'];
	    	
	    	//取出域名数据
	    	$ApproveModel=M('Approve');
	    	$where='fzid='.$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'].' and LENGTH(`domain`)>1';
	    	$comlist=$ApproveModel->where($where)->limit($start,$count)->field("cid,domain")->select();
	    		    	
	    	import('@.ORG.Util.Hostheader');
	    	$MHost=new Hostheader();

	    	import('@.ORG.Util.Makehtml');
	    	$Mhtmlcom=new Makehtml();
	    	
	    	
	    	foreach ($comlist as $value) {
	    		
	    		//删除主机头
	    		$MHost->delcomhost($value['cid']);
	    		
	    		//生成静态页
	    		$companydir=explode('.',$value['domain']);
	    		$filedir='/'.$companydir[0].'/';
	    		$Mhtmlcom->delcomhtml($filedir);
	    		
	    		$fileurl='http://'.C('TMPL_PARSE_STRING.__FZHOST__').'/company-'.$value['cid'].'.html';
	    		$filename='index.html';
	    		
	    		$fileurljianjie='http://'.C('TMPL_PARSE_STRING.__FZHOST__').'/company-jianjie-'.$value['cid'].'.html';
	    		$filenamejianjie='jianjie.html';
	    		
	    		$fileurlrongyu='http://'.C('TMPL_PARSE_STRING.__FZHOST__').'/company-rongyu-'.$value['cid'].'.html';
	    		$filenamerongyu='rongyu.html';
	    		
	    		$fileurlchangjing='http://'.C('TMPL_PARSE_STRING.__FZHOST__').'/company-changjing-'.$value['cid'].'.html';
	    		$filenamechangjing='changjing.html';
	    		 
	    		$fileurldangan='http://'.C('TMPL_PARSE_STRING.__FZHOST__').'/company-dangan-'.$value['cid'].'.html';
	    		$filenamedangan='dangan.html';
	    		
	    		$fileurltousu='http://'.C('TMPL_PARSE_STRING.__FZHOST__').'/company-tousu-'.$value['cid'].'.html';
	    		$filenametousu='tousu.html';
	    		
	    		$Mhtmlcom->makecomhtml($fileurl,$filedir,$filename);
	    		$Mhtmlcom->makecomhtml($fileurljianjie,$filedir,$filenamejianjie);
	    		$Mhtmlcom->makecomhtml($fileurlrongyu,$filedir,$filenamerongyu);
	    		$Mhtmlcom->makecomhtml($fileurlchangjing,$filedir,$filenamechangjing);
	    		$Mhtmlcom->makecomhtml($fileurldangan,$filedir,$filenamedangan);
	    		$Mhtmlcom->makecomhtml($fileurltousu,$filedir,$filenametousu);
	    		
		    	//写入主机头
	    		if(!$MHost->addcomhost($value['cid'], $value['domain'])){
	    			$this->error('写入未成功，请与管理员联系');
	    		}
	    		
	    	}
	    	 
	    	$this->success('生成成功');
	    }
	    
	}