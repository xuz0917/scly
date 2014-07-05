<?php

class CompanyAction extends Action {
	
    public function index($id){

    	$this->assign('company',$this->getcompany($id));
    	$ProModel=M('Product');
    	$Pro=$ProModel->where("cid='{$id}'")->limit("0,12")->select();
    	$this->assign('product',$Pro);
    	
    	$this->assign('prolist',$this->getprolist($id));
    	$this->display();
    }
    
    public function jianjie($id) {
    	$this->assign('company',$this->getcompany($id));
    	$this->assign('prolist',$this->getprolist($id));
    	
    	$this->display();
    }
    
    public function changjing($id) {
    	$this->assign('company',$this->getcompany($id));
    	$this->assign('prolist',$this->getprolist($id));
    	
    	$this->display();
    }
    
    public function rongyu($id) {
    	$this->assign('company',$this->getcompany($id));
    	$this->assign('prolist',$this->getprolist($id));
    	
    	$this->display();
    }
    
    public function product($id) {
    	
    	$this->assign('company',$this->getcompany($id));
    	$this->assign('prolist',$this->getprolist($id));
    	
    	$ProductModel=M('Product');
    	import('ORG.Util.Page');// 导入分页类
    	$count      = $ProductModel->where("cid='{$id}'")->count();// 查询满足要求的总记录数
    	$Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
    	$Page->setConfig('theme',"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
    	$show       = $Page->show();// 分页显示输出
    	
    	$Product=$ProductModel->where("cid='{$id}'")->limit($Page->firstRow,$Page->listRows)->select();
    	$this->assign('product',$Product);
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display();
    	
    }
    
    public function lianxi($id) {
    	$this->assign('company',$this->getcompany($id));
    	$ProModel=M('Product');
    	$this->assign('prolist',$this->getprolist($id));
    	
    	$this->display();
    }
    
    
    
    
    //获取公司信息
    public function getcompany($id){
    	$CompanyModel=M("Company");
    	$Company=$CompanyModel->where("id='{$id}'")->find();
    	return $Company;
    }
    //获取产品列表
    public function getprolist($id) {
    	$prolistModel=new Model();
		$prolist=$prolistModel->table('sc_prolist as l')
							->join('sc_company as c on l.cid=c.id')
							->field('l.*,c.companyname')
							->where("cid='{$id}'")
							->select();
		
		$prolist=$this->build_tree(0, $prolist);
		return $prolist;
    }
    
    //产品分类建树
    function findChild($arr,$id){
    
    	$childs=array();
    	foreach ($arr as $k => $v){
    		if($v['pid']== $id){
    			$childs[]=$v;
    				
    		}
    
    	}
    
    	return $childs;
    
    }
    function build_tree($root_id,$rows){
    	//global $rows;
    	$childs=$this->findChild($rows,$root_id);
    	if(empty($childs)){
    		return null;
    	}
    	foreach ($childs as $k => $v){
    		$rescurTree=$this->build_tree($v['id'],$rows);
    		if( null !=   $rescurTree){
    			$childs[$k]['childs']=$rescurTree;
    		}
    	}
    	return $childs;
    }

}