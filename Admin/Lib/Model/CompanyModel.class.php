<?php

class CompanyModel extends Model {
	
	public function getCompanyList($firstRow,$listRows,$keyword='')
	{
		$model=M('Approve');
		$where="fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if ($keyword!='') {
			$where=$where." and companyname like '%$keyword%'";
		}
        $members=$model->where($where)
        ->field('cid as id ,companyname ,star ,endtime ,domain')
		->limit($firstRow,$listRows)
        ->order('cid desc')
        ->select();
        return $members;
	}
	public function count($keyword=''){
		$model=M('Approve');
		$where="fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if ($keyword!='') {
			$where=$where." and companyname like '%$keyword%'";
		}
		$count=$model->where($where)
		->count('id');
		return $count;
	}
	public function getCompany($id=''){
		$model=new Model();
		$where="c.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if ($id!='') {
			$where=$where." and c.id='$id'";
		}
		$members=$model->table('wl_company as c')
		->join(array('wl_approve as a ON c.id=a.cid','wl_recommend as r ON c.id=r.cid','wl_comimg as i ON c.id=i.cid','wl_user as u on c.uid=u.id'))
		->where($where)
		->field('c.* ,
				 a.* ,
				 r.city ,
				 i.* ,
				 u.uname
				')
		->find();
		return $members;
	}
	public function delCompany($id){
		
		$comid=$id;
		$CompanyModel=M('Company');
		$ApproveModel=M('Approve');
		$ComimgModel=M('Comimg');
		
		$CompanyData=$CompanyModel->where("id='$id'")->find();
		$ApproveData=$ApproveModel->where("cid='$id'")->find();
		$ComimgData=$ComimgModel->where("cid='$id'")->find();
		
		//删除会员
		$UserModel=M('User');
		$UserModel->where("id='{$CompanyData['uid']}'")->delete();
		
		$recycle['companyname']=$CompanyData['companyname'];
    	$recycle['title']=$CompanyData['title'];
    	$recycle['logo']=$CompanyData['logo'];
    	$recycle['mastertu']=$CompanyData['mastertu'];
    	$recycle['yunying']=$CompanyData['yunying'];
    	$recycle['yunshu']=$CompanyData['yunshu'];
    	$recycle['baoxian']=$CompanyData['baoxian'];
    	$recycle['fangkuanzhouqi']=$CompanyData['fangkuanzhouqi'];
    	$recycle['fangkuanshijian']=$CompanyData['fangkuanshijian'];
    	$recycle['fangkuan']=$CompanyData['fangkuan'];
    	$recycle['jianjie']=$CompanyData['jianjie'];
    	$recycle['chengnuo']=$CompanyData['chengnuo'];
    	$recycle['shouhuo']=$CompanyData['shouhuo'];
    	$recycle['xiehuo']=$CompanyData['xiehuo'];
    	$recycle['keywords']=$CompanyData['keywords'];
    	$recycle['description']=$CompanyData['description'];
    	$recycle['hotline']=$CompanyData['hotline'];
    	$recycle['fuzeren']=$CompanyData['fuzeren'];
    	$recycle['supervise']=$CompanyData['supervise'];
    	$recycle['templet']=$CompanyData['templet'];
		
		$recycle['banner1']=$ComimgData['banner1'];
		$recycle['banner2']=$ComimgData['banner2'];
		$recycle['dangan']=$ComimgData['dangan'];
		$recycle['dangan1']=$ComimgData['dangan1'];
		$recycle['dangan2']=$ComimgData['dangan2'];
		$recycle['dangan3']=$ComimgData['dangan3'];
		$recycle['dangan4']=$ComimgData['dangan4'];
		$recycle['dangan5']=$ComimgData['dangan5'];
		$recycle['dangan6']=$ComimgData['dangan6'];
		$recycle['dangan7']=$ComimgData['dangan7'];
		$recycle['changjing']=$ComimgData['changjing'];
		$recycle['changjing1']=$ComimgData['changjing1'];
		$recycle['changjing2']=$ComimgData['changjing2'];
		$recycle['changjing3']=$ComimgData['changjing3'];
		$recycle['changjing4']=$ComimgData['changjing4'];
		$recycle['changjing5']=$ComimgData['changjing5'];
		$recycle['changjing6']=$ComimgData['changjing6'];
		$recycle['changjing7']=$ComimgData['changjing7'];
		$recycle['rongyu']=$ComimgData['rongyu'];
		$recycle['rongyu1']=$ComimgData['rongyu1'];
		$recycle['rongyu2']=$ComimgData['rongyu2'];
		$recycle['rongyu3']=$ComimgData['rongyu3'];
		$recycle['rongyu4']=$ComimgData['rongyu4'];
		$recycle['rongyu5']=$ComimgData['rongyu5'];
		$recycle['rongyu6']=$ComimgData['rongyu6'];
		$recycle['rongyu7']=$ComimgData['rongyu7'];

		
		$recycle['logos']=$ApproveData['logos'];
		$recycle['domain']=$ApproveData['domain'];
		$recycle['zhida']=$ApproveData['zhida'];
		$recycle['zhongzhuan']=$ApproveData['zhongzhuan'];
		$recycle['address']=$ApproveData['address'];
		$recycle['qq']=$ApproveData['qq'];
		$recycle['caddtime']=$ApproveData['addtime'];
		$recycle['endtime']=$ApproveData['endtime'];
		$recycle['fzid']=$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'];
		
		$recycleModel=M('recycle');
		if($recycleModel->add($recycle)){
			$CompanyModel->where("id='$id'")->delete();
			$ApproveModel->where("cid='$id'")->delete();
			$ComimgModel->where("cid='$id'")->delete();
		}else {
			return 0;
		}
		
		return 1;
		
	}
	
}