<?php
class IndexAction extends Action{
    public function index(){
    	
    	//取得市场
    	$ShichangModel=M('Shichang');
    	$shichang=$ShichangModel->select();
    	$this->assign('shichang',$shichang);
    	
    	$this->display();
    }
    public function tplist(){
    	C('SHOW_PAGE_TRACE',false);
    	
    	//取得行业
    	$HangyeModel=M('Hangye');
    	$Hangye=$HangyeModel->select();    	
    	$Hangyearr=$this->getparent($Hangye);
    	$this->assign('hangye',$Hangyearr);
    	
    	$this->display();
    }
    
    /*
     *@param $cp 产品名称
     *@param $gs 公司名称
     *@param $sc 市场名称
     *@param $hy 产品分类名称 
     */
    public function search($keywords=0) {
    	
    	//取得市场
    	$ShichangModel=M('Shichang');
    	$shichang=$ShichangModel->select();
    	$this->assign('shichang',$shichang);
    	
    	
    	//取得行业
    	$HangyeModel=M('Hangye');
    	$Hangye=$HangyeModel->select();
    	$Hangyearr=$this->getparent($Hangye);
    	$this->assign('hangye',$Hangyearr);
    	
    	
    	//搜索结果
    	$where='1=1';
    	$join='left join sc_shichang as s on c.shichang=s.id'; 
    			
    	//left join sc_product as p on c.id=p.cid     			right join sc_shichang  as s on c.shichang =s.id
    	
    	if ($_GET['cp']) {
    		$join=$join." right join sc_product as p on c.id=p.cid";
    		$where=$where." and p.title like '%{$_GET['cp']}%'";
    	}
    	if ($_GET['gs']) {
    		$where=$where." and c.companyname like '%{$_GET['gs']}%'";
    	}
    	if ($_GET['sc']) {
    		$where=$where." and c.shichang = '{$_GET['sc']}'";
    	}
    	if ($_GET['hy']) {
    		$join=$join." left join sc_product as p on c.id=p.cid";
    		$where=$where." and p.hangye= '{$_GET['hy']}'";
    	}
    	
    	if($keywords){
    		$join="left join sc_shichang as s on c.shichang=s.id 
    				left join sc_product as p on c.id=p.cid";
    		$where="p.title like '%{$keywords}%' or  c.companyname like '%{$keywords}%'";
    	}
    	
    	
    	$Model=new Model();
    	import('ORG.Util.Page');// 导入分页类
    	$count      = $Model->table("sc_company as c")
    						->field("c.id")
    						->join($join)
    						->where($where)
    						->group("c.id")
    						->count();// 查询满足要求的总记录数
    	$Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
    	$Page->setConfig('theme',"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
    	$show       = $Page->show();// 分页显示输出
    	$Company=$Model->table("sc_company as c")
		    			->field("c.id,c.companyname,s.name as shichangname,c.comyear,c.zhuying,c.logo,c.star")
		    			->join($join)
    					->where($where)
	    				->limit($Page->firstRow,$Page->listRows)
		    			->group("c.companyname")
    					->select();
    	
    	$this->assign('company',$Company);
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display();
    }
    
    //获取父分类
    public function getparent($arr) {
    	$parentarr=array();
    	$i=0;
    	foreach ($arr as $key=>$value) {
    		if($value['parent_id']==0){
    			$value['son']=$this->getsonforparent($value['region_id'], $arr);
    			$parentarr[$i]=$value;
    			$i++;
    		}
    	}
    	return $parentarr;
    }
    //查找子分类
    public function getsonforparent($region_id,$arr) {
    	$sonarr=array();
    	$i=0;
    	foreach ($arr as $value) {
    		if($value['parent_id']==$region_id){
    			$sonarr[$i]=$value;
    			$i++;
    		}
    	}
    	return $sonarr;
    }
}