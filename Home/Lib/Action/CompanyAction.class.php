<?php

class CompanyAction extends Action {
	
    public function index($id){

    	$ApproveModel=M('Approve');
    	$ComimgModel=M('Comimg');
    	$CompanyModel=M('Company');
    	$Approve=$ApproveModel->where("cid='$id'")->field("star,companyname,domain,zhida,zhongzhuan,qq,comyear,searchtime,endtime")->find();
    	if(empty($Approve)){
    		$this->error("不存在的企业");
    	}
    	if($Approve['endtime']>date("Y-m-d",time())){
    		$Company=$CompanyModel->where("id='$id'")->field("title,keywords,description,yunying,yunshu,baoxian,fangkuanzhouqi,fangkuanshijian,fangkuan,chengnuo,logo,mastertu,(LEFT(jianjie,800)) as jianjie,shouhuo,xiehuo,hotline,fuzeren,supervise,templet")->find();
    		if(!empty($Company)){$Company=array_merge($Approve,$Company);}else{$this->error("不存在的企业，请联系管理员");}
	    	$Comimg=$ComimgModel->where("cid='$id'")->field("banner1,banner2,changjing,changjing1,changjing2,changjing3,changjing4,changjing5,changjing6,changjing7,rongyu,rongyu1,rongyu2,rongyu3,rongyu4,rongyu5,rongyu6,rongyu7,dangan,dangan1,dangan2,dangan3,dangan4,dangan5,dangan6,dangan7")->find();
	    	if(!empty($Comimg)){$Company=array_merge($Company,$Comimg);}
	    	$strarray=array(' ','&nbsp;');
	    	$Company['jianjie']=strip_tags($Company['jianjie']);
	    	$Company['jianjie']=str_replace($strarray,'',$Company['jianjie']);
	    	$Company['jianjie']=mb_strcut($Company['jianjie'],0,500,'UTF-8');
    	}else{
    		$this->error("该企业会员业务已到期，请选择其他企业",'javascript:window.close();');
    	}
    	
    	if($Company['zhida']){
    		$nowtime=date('Y-m-d H:i:s',time());
    		$RecommendModel=M('Recommend');
    		$Recommend=$RecommendModel->where("cid = '$id' and endtime > '$nowtime'")->field('city')->select();
    		if(!empty($Recommend)){
	    		$imgarr=array(0=>'<img alt="" src="http://www.56cheng.com/fckeditor/editor/images/smiley/msn/lightbulb.gif" />');
	    		
	    		$cityarr=array();
	    		foreach ($Recommend as $key=>$value) {
	    			$cityarr[$key]=$value['city'];
	    		}
	    		
	    		$cityarrs=array_merge($cityarr,$imgarr);
	    		$Company['zhida']=str_replace($cityarrs, '', $Company['zhida']);
	    		
	    		$Recommendcity=implode('<img src="http://'.C('TMPL_PARSE_STRING.__FZHOST__').'/public/images/huangguan.gif" style="vertical-align:text-bottom" alt="精品企业推荐" /> ', $cityarr);
	    		$Recommendcity=$Recommendcity.'<img src="http://'.C('TMPL_PARSE_STRING.__FZHOST__').'/public/images/huangguan.gif" style="vertical-align:text-bottom" alt="精品企业推荐" /> ';

	    		$Zhidaarr=explode('-', $Company['zhida']);
	    		$Zhidaarr[1]=$Recommendcity.$Zhidaarr[1];
	    		
	    		$Company['zhida']=implode('-', $Zhidaarr);
	    		
	    		//var_dump($Recommendcity);
	    		//$Company['zhida']=$Recommendcity.'<img src="http://'.C('TMPL_PARSE_STRING.__FZHOST__').'/public/images/huangguan.gif" style="vertical-align:text-bottom" alt="精品企业推荐" /> '.$Company['zhida'];
    		}
    	}
    	/*
    	$searchtime['searchtime']=date('Y-m-d H:i:s',time());
    	$ApproveModel->where("cid = '$id'")->save($searchtime);
    	*/
    	$this->assign("company",$Company);
    	$this->display('Company/'.$Company['templet'].'/index');
    }

    public function jianjie($id){
    	
    	$ApproveModel=M('Approve');
    	$ComimgModel=M('Comimg');
    	$CompanyModel=M('Company');
    	$Approve=$ApproveModel->where("cid='$id'")->field("star,companyname,domain,qq,comyear,endtime")->find();
    	if(empty($Approve)){
    		$this->error("不存在的企业");
    	}
    	if($Approve['endtime']>date("Y-m-d",time())){
    		$Company=$CompanyModel->where("id='$id'")->field("keywords,description,yunying,yunshu,baoxian,fangkuanzhouqi,fangkuanshijian,fangkuan,chengnuo,logo,mastertu,jianjie,shouhuo,xiehuo,hotline,fuzeren,supervise,templet")->find();
    		if(!empty($Company)){$Company=array_merge($Approve,$Company);}else{$this->error("不存在的企业，请联系管理员");}
    		$Comimg=$ComimgModel->where("cid='$id'")->field("banner1,banner2,changjing")->find();
    		if(!empty($Comimg)){$Company=array_merge($Company,$Comimg);}
    	}else{
    		$this->error("该企业会员业务已到期，请选择其他企业");
    	}
    	$this->assign("company",$Company);
    	$this->display('Company/'.$Company['templet'].'/jianjie');
    }
    public function rongyu($id){
    	 
    	$ApproveModel=M('Approve');
    	$ComimgModel=M('Comimg');
    	$CompanyModel=M('Company');
    	$Approve=$ApproveModel->where("cid='$id'")->field("star,companyname,domain,qq,comyear,endtime")->find();
    	if(empty($Approve)){
    		$this->error("不存在的企业");
    	}
    	if($Approve['endtime']>date("Y-m-d",time())){
    		$Company=$CompanyModel->where("id='$id'")->field("keywords,description,yunying,yunshu,baoxian,fangkuanzhouqi,fangkuanshijian,fangkuan,chengnuo,logo,mastertu,hotline,fuzeren,supervise,templet")->find();
    		if(!empty($Company)){$Company=array_merge($Approve,$Company);}else{$this->error("不存在的企业，请联系管理员");}
    		$Comimg=$ComimgModel->where("cid='$id'")->field("banner1,banner2,changjing,rongyu,rongyu1,rongyu2,rongyu3,rongyu4,rongyu5,rongyu6,rongyu7")->find();
    		if(!empty($Comimg)){$Company=array_merge($Company,$Comimg);}
    	}else{
    		$this->error("该企业会员业务已到期，请选择其他企业");
    	}
    	 
    	if(empty($Company)){
    		$this->error("不存在的企业");
    	}
    	 
    	$this->assign("company",$Company);
    	$this->display('Company/'.$Company['templet'].'/rongyu');
    }
    
    public function changjing($id){
    
    	$ApproveModel=M('Approve');
    	$ComimgModel=M('Comimg');
    	$CompanyModel=M('Company');
    	$Approve=$ApproveModel->where("cid='$id'")->field("star,companyname,domain,qq,comyear,endtime")->find();
    	if(empty($Approve)){
    		$this->error("不存在的企业");
    	}
    	if($Approve['endtime']>date("Y-m-d",time())){
    		$Company=$CompanyModel->where("id='$id'")->field("keywords,description,yunying,yunshu,baoxian,fangkuanzhouqi,fangkuanshijian,fangkuan,chengnuo,logo,mastertu,hotline,fuzeren,supervise,templet")->find();
    		if(!empty($Company)){$Company=array_merge($Approve,$Company);}else{$this->error("不存在的企业，请联系管理员");}
    		$Comimg=$ComimgModel->where("cid='$id'")->field("banner1,banner2,changjing,changjing1,changjing2,changjing3,changjing4,changjing5,changjing6,changjing7")->find();
    		if(!empty($Comimg)){$Company=array_merge($Company,$Comimg);}
    	}else{
    		$this->error("该企业会员业务已到期，请选择其他企业");
    	}
    
    	$this->assign("company",$Company);
    	$this->display('Company/'.$Company['templet'].'/changjing');
    }
    
    public function dangan($id){
    
    	$ApproveModel=M('Approve');
    	$ComimgModel=M('Comimg');
    	$CompanyModel=M('Company');
    	$Approve=$ApproveModel->where("cid='$id'")->field("star,companyname,domain,qq,comyear,endtime")->find();
    	if(empty($Approve)){
    		$this->error("不存在的企业");
    	}
    	if($Approve['endtime']>date("Y-m-d",time())){
    		$Company=$CompanyModel->where("id='$id'")->field("keywords,description,yunying,yunshu,baoxian,fangkuanzhouqi,fangkuanshijian,fangkuan,chengnuo,logo,mastertu,hotline,fuzeren,supervise,templet")->find();
    		if(!empty($Company)){$Company=array_merge($Approve,$Company);}else{$this->error("不存在的企业，请联系管理员");}
    		$Comimg=$ComimgModel->where("cid='$id'")->field("banner1,banner2,changjing,dangan,dangan1,dangan2,dangan3,dangan4,dangan5,dangan6,dangan7")->find();
    		if(!empty($Comimg)){$Company=array_merge($Company,$Comimg);}
    	}else{
    		$this->error("该企业会员业务已到期，请选择其他企业");
    	}
    
    	$this->assign("company",$Company);
    	$this->display('Company/'.$Company['templet'].'/dangan');
    }
    public function tousu($id){
    	$ApproveModel=M('Approve');
    	$ComimgModel=M('Comimg');
    	$CompanyModel=M('Company');
    	$Approve=$ApproveModel->where("cid='$id'")->field("star,companyname,domain,qq,fzid,comyear,endtime")->find();
    	if(empty($Approve)){
    		$this->error("不存在的企业");
    	}
    	if($Approve['endtime']>date("Y-m-d",time())){
    		$Company=$CompanyModel->where("id='$id'")->field("keywords,description,yunying,yunshu,baoxian,fangkuanzhouqi,fangkuanshijian,fangkuan,chengnuo,logo,mastertu,hotline,fuzeren,supervise,templet")->find();
    		if(!empty($Company)){$Company=array_merge($Approve,$Company);}else{$this->error("不存在的企业，请联系管理员");}
    		$Comimg=$ComimgModel->where("cid='$id'")->field("banner1,banner2")->find();
    		if(!empty($Comimg)){$Company=array_merge($Company,$Comimg);}
    	}else{
    		$this->error("该企业会员业务已到期，请选择其他企业");
    	}
    	
    	$this->assign("company",$Company);
    	$this->display('Company/'.$Company['templet'].'/tousu');
    }
    public function toususave(){
    	if(!isset($_POST['companyname'])&&$_POST['companyname']==''&&$_POST['contacts']&&$_POST['contacts']==''&&$_POST['phone']&&$_POST['phone']==''&&$_POST['common']&&$_POST['common']==''&&$_POST['verify']&&$_POST['verify']==''){
    		$this->error("请填写必要信息");
    	}else {
    		if(md5($_POST['verify']) != session('verify')) {
    			$this->error('验证码错误！');
    		}else{
    			$fankuiModel=M('Fankui');
    			$fankuidata=array();
    			$fankuidata['source']=$_POST['companyname'];
    			$fankuidata['cid']=$_POST['cid'];
    			$fankuidata['contacts']=$_POST['contacts'];
    			$fankuidata['phone']=$_POST['phone'];
    			$fankuidata['message']=$_POST['common'];
    			$fankuidata['fzid']=$_POST['fzid'];
    			$fankuiModel->data($fankuidata)->add();
    			$this->success("提交成功");
    		}
    	}
    }
    
    public function pingfensave(){
    	$data=array();
    	$data['cid']=$_POST['comid'];
    	$data['fuwu']=$_POST['fuwu'];
    	$data['yunshu']=$_POST['yunsu'];
    	$data['fankuan']=$_POST['fankuan'];
    	$data['lipei']=$_POST['lipei'];
    	
    	if($_SERVER['HTTP_CLIENT_IP']){
    		$data['ip']=$_SERVER['HTTP_CLIENT_IP'];
    	}elseif($_SERVER['HTTP_X_FORWARDED_FOR']){
    		$data['ip']=$_SERVER['HTTP_X_FORWARDED_FOR'];
    	}else{
    		$data['ip']=$_SERVER['REMOTE_ADDR'];
    	}
    	 
    	$daystart=date('Y-m-d',time()).' 00:00:00';
    	$dayend=date('Y-m-d',time()).' 23:59:59';
    	$PingfenModel=M('Pingfen');
    	$where="ip='{$data['ip']}' and cid='{$data['cid']}' and addtime>'$daystart' and addtime<'$dayend'"; 	
    	$oldpingfen=$PingfenModel->where($where)->find();
    	if ($_COOKIE['uname']==''||$_COOKIE['uid']==''||$_COOKIE['tid']==''||$_COOKIE['cookey']=='') {
    		$this->error("请登陆后评分！");
    	}else{
	    	if($oldpingfen){
	    		$this->error("今天已评分！");
	    	}else{
	    		$PingfenModel->add($data);
	    		$this->success("感谢您的支持，评分已提交！");
	    	}
    	}
    	
    }
    
    public function pingfen($id){
    	$PingfenModel=M('Pingfen');
    	$Pingfen=$PingfenModel->where("cid='$id'")->select();
    	$data=array();
    	
    	$data['sum']=0;       //总评次数
    	
    	/**评价服务次数**/
    	$data['fw']=0;
    	$data['fw1']=0;
    	$data['fw2']=0;
    	$data['fw3']=0;
    	$data['fw4']=0;
    	$data['fw5']=0;
    	
    	/**评价服务分数**/
    	$data['fwsum']=0;
    	$data['fw1sum']=0;
    	$data['fw2sum']=0;
    	$data['fw3sum']=0;
    	$data['fw4sum']=0;
    	$data['fw5sum']=0;
    	
    	/**评价运输次数**/
    	$data['ys']=0;
    	$data['ys1']=0;
    	$data['ys2']=0;
    	$data['ys3']=0;
    	$data['ys4']=0;
    	$data['ys5']=0;
    	
    	/**评价运输分数**/
    	$data['yssum']=0;
    	$data['ys1sum']=0;
    	$data['ys2sum']=0;
    	$data['ys3sum']=0;
    	$data['ys4sum']=0;
    	$data['ys5sum']=0;
    	
    	/**返款运输次数**/
    	$data['fk']=0;
    	$data['fk1']=0;
    	$data['fk2']=0;
    	$data['fk3']=0;
    	$data['fk4']=0;
    	$data['fk5']=0;
    	
    	/**返款运输分数**/
    	$data['fksum']=0;
    	$data['fk1sum']=0;
    	$data['fk2sum']=0;
    	$data['fk3sum']=0;
    	$data['fk4sum']=0;
    	$data['fk5sum']=0;
    	
    	/**理赔运输次数**/
    	$data['lp']=0;
    	$data['lp1']=0;
    	$data['lp2']=0;
    	$data['lp3']=0;
    	$data['lp4']=0;
    	$data['lp5']=0;
    	
    	/**理赔运输分数**/
    	$data['lpsum']=0;
    	$data['lp1sum']=0;
    	$data['lp2sum']=0;
    	$data['lp3sum']=0;
    	$data['lp4sum']=0;
    	$data['lp5sum']=0;
    	if(!empty($Pingfen)){
	    	foreach ($Pingfen as $value) {
	    		if($value['fuwu']!=0){
					$data['fw']++;
					$data['fwsum']=$data['fwsum']+$value['fuwu'];
					switch ($value['fuwu']){
						case 1:
							$data['fw1']++;
							$data['fw1sum']=$data['fw1sum']+$value['fuwu'];
							break;
						case 2:
							$data['fw2']++;
							$data['fw2sum']=$data['fw2sum']+$value['fuwu'];
							break;
						case 3:
							$data['fw3']++;
							$data['fw3sum']=$data['fw3sum']+$value['fuwu'];
							break;
						case 4:
							$data['fw4']++;
							$data['fw4sum']=$data['fw4sum']+$value['fuwu'];
							break;
						case 5:
							$data['fw5']++;
							$data['fw5sum']=$data['fw5sum']+$value['fuwu'];
							break;
						default:
							break;
					}
				}
				
				if($value['yunshu']!=0){
					$data['ys']++;
					$data['yssum']=$data['yssum']+$value['yunshu'];
					switch ($value['yunshu']){
						case 1:
							$data['ys1']++;
							$data['ys1sum']=$data['ys1sum']+$value['yunshu'];
							break;
						case 2:
							$data['ys2']++;
							$data['ys2sum']=$data['ys2sum']+$value['yunshu'];
							break;
						case 3:
							$data['ys3']++;
							$data['ys3sum']=$data['ys3sum']+$value['yunshu'];
							break;
						case 4:
							$data['ys4']++;
							$data['ys4sum']=$data['ys4sum']+$value['yunshu'];
							break;
						case 5:
							$data['ys5']++;
							$data['ys5sum']=$data['ys5sum']+$value['yunshu'];
							break;
						default:
							break;
					}
				}
				
				if($value['fankuan']!=0){
					$data['fk']++;
					$data['fksum']=$data['fksum']+$value['fankuan'];
					switch ($value['fankuan']){
						case 1:
							$data['fk1']++;
							$data['fk1sum']=$data['fk1sum']+$value['fankuan'];
							break;
						case 2:
							$data['fk2']++;
							$data['fk2sum']=$data['fk2sum']+$value['fankuan'];
							break;
						case 3:
							$data['fk3']++;
							$data['fk3sum']=$data['fk3sum']+$value['fankuan'];
							break;
						case 4:
							$data['fk4']++;
							$data['fk4sum']=$data['fk4sum']+$value['fankuan'];
							break;
						case 5:
							$data['fk5']++;
							$data['fk5sum']=$data['fk5sum']+$value['fankuan'];
							break;
						default:
							break;
					}
				}
				
				if($value['lipei']!=0){
					$data['lp']++;
					$data['lpsum']=$data['lpsum']+$value['lipei'];
					switch ($value['lipei']){
						case 1:
							$data['lp1']++;
							$data['lp1sum']=$data['lp1sum']+$value['lipei'];
							break;
						case 2:
							$data['lp2']++;
							$data['lp2sum']=$data['lp2sum']+$value['lipei'];
							break;
						case 3:
							$data['lp3']++;
							$data['lp3sum']=$data['lp3sum']+$value['lipei'];
							break;
						case 4:
							$data['lp4']++;
							$data['lp4sum']=$data['lp4sum']+$value['lipei'];
							break;
						case 5:
							$data['lp5']++;
							$data['lp5sum']=$data['lp5sum']+$value['lipei'];
							break;
						default:
							break;
					}
				}
				$data['sum']++;
				
	    	}
    		
    	}else{
    			$data['fw']=1;
    			$data['ys']=1;
    			$data['fk']=1;
    			$data['lp']=1;
    	}
    	
    	$this->assign("pingfens",$data);
    	$this->display('Company/blue/pingfen');
    }
	public function fahuo($id){
		$ApproveModel=M('Approve');
    	$ComimgModel=M('Comimg');
    	$CompanyModel=M('Company');
    	$Approve=$ApproveModel->where("cid='$id'")->field("cid,star,companyname,domain,qq,comyear,fzid,endtime")->find();
    	if(empty($Approve)){
    		$this->error("不存在的企业");
    	}
    	if($Approve['endtime']>date("Y-m-d",time())){
    		$Company=$CompanyModel->where("id='$id'")->field("keywords,description,yunying,yunshu,baoxian,fangkuanzhouqi,fangkuanshijian,fangkuan,chengnuo,logo,mastertu,hotline,fuzeren,supervise,templet,fzid")->find();
    		if(!empty($Company)){$Company=array_merge($Approve,$Company);}else{$this->error("不存在的企业，请联系管理员");}
    		$Comimg=$ComimgModel->where("cid='$id'")->field("banner1,banner2")->find();
    		if(!empty($Comimg)){$Company=array_merge($Company,$Comimg);}
    	}else{
    		$this->error("该企业会员业务已到期，请选择其他企业",'javascript:window.close();');
    	}
    
    	if(empty($Company)){
    		$this->error("不存在的企业");
    	}
    
    	$this->assign("company",$Company);
    	$this->display('Company/'.$Company['templet'].'/fahuo');
	}
	public function fahuosave(){
		
		$verify=md5($_POST['verify']);
		$verifyl=session('verify');
		if($verify != $verifyl) {
			$this->error('验证码错误！');
		}
		
		$data=array();
		$data['cid']=$_POST['cid'];
		$data['chufa']=$_POST['chufa'];
		$data['daoda']=$_POST['daoda'];
		$data['starttime']=$_POST['starttime'];
		$data['contacts']=$_POST['contacts'];
		$data['address']=$_POST['address'];
		$data['phone']=$_POST['phone'];
		$data['mingcheng']=$_POST['mingcheng'];
		$data['count']=$_POST['count'];
		$data['zhongliang']=$_POST['zhongliang'];
		$data['tiji']=$_POST['tiji'];
		$data['fuwu']=implode(",", $_POST['fuwu']);
		$data['zhifu']=implode("", $_POST['zhifu']);
		$FahuoModel=M('Fahuo');
		if($FahuoModel->add($data)){
			$this->success('发货成功，我们会在第一时间与您联系');
		}else{
			$this->error('请重新填写信息');
		}
	}
}