<?php
class ShanghuAction extends CommonAction {
	
	public function index() {
		$CompanyModel=M('Company');
		$where="1=1";
		
		if(isset($_POST['keywords'])&&$_POST['keywords']!=''){
			$where="companyname like '%{$_POST['keyword']}%'";
		}
		
		import('ORG.Util.Page');// 导入分页类
		$count      = $CompanyModel->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('theme',"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$Company= $CompanyModel->limit($Page->firstRow,$Page->listRows)->where($where)->select();
		$this->assign('company',$Company);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	
	public function add() {
		//取出市场
		$shichangModel=M('Shichang');
		$shichang=$shichangModel->select();
		$this->assign('shichang',$shichang);
		//取出地区
		$chengshiModel=M('Chengshi');
		$chengshi=$chengshiModel->select();
		$this->assign('chengshi',$chengshi);
		
		$this->display ();
	}

	public function addsave() {
		
		$data=array();
		$data['companyname']=trim($_POST['companyname']);
		$data['star']=trim($_POST['star']);
		$data['address']=trim($_POST['address']);
		$data['qq']=trim($_POST['qq']);
		$data['chengshi']=trim($_POST['chengshi']);
		if (isset($_POST['renzheng'])) {
			$data['renzheng']=1;
		}
		$data['comyear']=trim($_POST['comyear']);

		$data['title']=trim($_POST['title']);
		$data['keywords']=trim($_POST['keywords']);
		$data['description']=trim($_POST['description']);
		
		$data['yunying']=trim($_POST['yunying']);

		$data['logo']=trim($_POST['logo']);
		$data['mastertu']=trim($_POST['mastertu']);
		$data['jianjie']=trim($_POST['jianjie']);
		$data['hotline']=trim($_POST['hotline']);
		$data['shichang']=trim($_POST['shichang']);
		$data['fuzeren']=trim($_POST['fuzeren']);
		$data['supervise']=trim($_POST['supervise']);
		$data['templet']=trim($_POST['templet']);
		$data['addtime']=date('Y-m-d H:i:s',time());
		if (isset($_POST['renzheng'])) {
			$data['endtime']=date('Y-m-d H:i:s',time()+31536000);
		}
		
		$data['banner1']=trim($_POST['banner1']);
		$data['banner2']=trim($_POST['banner2']);
		$data['changjing']=trim($_POST['changjing']);
		$data['changjing1']=trim($_POST['changjing1']);
		$data['changjing2']=trim($_POST['changjing2']);
		$data['changjing3']=trim($_POST['changjing3']);
		$data['changjing4']=trim($_POST['changjing4']);
		$data['changjing5']=trim($_POST['changjing5']);
		$data['changjing6']=trim($_POST['changjing6']);
		$data['changjing7']=trim($_POST['changjing7']);
		$data['rongyu']=trim($_POST['rongyu']);
		$data['rongyu1']=trim($_POST['rongyu1']);
		$data['rongyu2']=trim($_POST['rongyu2']);
		$data['rongyu3']=trim($_POST['rongyu3']);
		$data['rongyu4']=trim($_POST['rongyu4']);
		$data['rongyu5']=trim($_POST['rongyu5']);
		$data['rongyu6']=trim($_POST['rongyu6']);
		$data['rongyu7']=trim($_POST['rongyu7']);
		
		$companyModel=M('Company');
		if ($companyModel->add($data)) {
			$this->success('添加成功',__APP__.'/shanghu/index');
		}else {
			$this->error('添加失败');
		}
	}
	
	public function edit($id) {
		
		//取出市场
		$shichangModel=M('Shichang');
		$shichang=$shichangModel->select();
		$this->assign('shichang',$shichang);
		//取出地区
		$chengshiModel=M('Chengshi');
		$chengshi=$chengshiModel->select();
		$this->assign('chengshi',$chengshi);
	
		//取出商户
		$shanghuModel=M('Company');
		$company=$shanghuModel->where("id='$id'")->find();
		$this->assign('company',$company);
		
		$this->display ();
	}
	
	public function editsave() {
		
		$data=array();
		$data['companyname']=trim($_POST['companyname']);
		$data['star']=trim($_POST['star']);
		$data['address']=trim($_POST['address']);
		$data['qq']=trim($_POST['qq']);
		$data['chengshi']=trim($_POST['chengshi']);
		if (isset($_POST['renzheng'])) {
			$data['renzheng']=1;
		}
		$data['comyear']=trim($_POST['comyear']);

		$data['title']=trim($_POST['title']);
		$data['keywords']=trim($_POST['keywords']);
		$data['description']=trim($_POST['description']);
		
		$data['yunying']=trim($_POST['yunying']);

		$data['logo']=trim($_POST['logo']);
		$data['mastertu']=trim($_POST['mastertu']);
		$data['jianjie']=trim($_POST['jianjie']);
		$data['hotline']=trim($_POST['hotline']);
		$data['shichang']=trim($_POST['shichang']);
		$data['fuzeren']=trim($_POST['fuzeren']);
		$data['supervise']=trim($_POST['supervise']);
		$data['templet']=trim($_POST['templet']);
		$data['addtime']=date('Y-m-d H:i:s',time());
		if (!isset($_POST['renzheng'])) {
			$data['endtime']='';
		}
		
		
		$data['banner1']=trim($_POST['banner1']);
		$data['banner2']=trim($_POST['banner2']);
		$data['changjing']=trim($_POST['changjing']);
		$data['changjing1']=trim($_POST['changjing1']);
		$data['changjing2']=trim($_POST['changjing2']);
		$data['changjing3']=trim($_POST['changjing3']);
		$data['changjing4']=trim($_POST['changjing4']);
		$data['changjing5']=trim($_POST['changjing5']);
		$data['changjing6']=trim($_POST['changjing6']);
		$data['changjing7']=trim($_POST['changjing7']);
		$data['rongyu']=trim($_POST['rongyu']);
		$data['rongyu1']=trim($_POST['rongyu1']);
		$data['rongyu2']=trim($_POST['rongyu2']);
		$data['rongyu3']=trim($_POST['rongyu3']);
		$data['rongyu4']=trim($_POST['rongyu4']);
		$data['rongyu5']=trim($_POST['rongyu5']);
		$data['rongyu6']=trim($_POST['rongyu6']);
		$data['rongyu7']=trim($_POST['rongyu7']);
		
		$companyModel=M('Company');
		$companyModel->where("id='{$_POST['id']}'")->save($data);
		$this->success('修改成功');
	}
	
	public function xufei($id) {
		
		$companyModel=M('Company');
		$company=$companyModel->where("id='$id'")->find();
		
		import('@.ORG.Util.Timestamp');
		$Tstamp=new Timestamp();
		 
		$data['endtime']=$Tstamp->tostamp($company['endtime']);
		$data['endtime']=date("Y-m-d H:i:s",$data['endtime']+31536000);
		
		$companyModel->where("id='$id'")->data($data)->save();
		$this->success('续费成功');
	}
	
	public function del($id) {
		$CompanyModel=M('Company');
		$CompanyModel->where("id='$id'")->delete();
		$this->success('删除成功');
	}

	public function xuanzhong($id) {
		$CompanyModel=M('Company');
		$Company=$CompanyModel->where("id='$id'")->find();
		$_SESSION['companyid']=$id;
		$_SESSION['companyname']=$Company['companyname'];
		$this->success('选中成功',__APP__.'/product/index');
	}

	public function shifang() {
		unset($_SESSION['companyid']);
		unset($_SESSION['companyname']);
		$this->success('释放成功');
	}
}