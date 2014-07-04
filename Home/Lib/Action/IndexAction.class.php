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
    	
    	//取得产品分类
    	$HangyeModel=M('Hangye');
    	$Hangye=$HangyeModel->select();    	
    	$Hangyearr=$this->getparent($Hangye);
    	$this->assign('hangye',$Hangyearr);
    	
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
    

    /*
    *@param $cp 产品名称
    *@param $gs 公司名称
    *@param $sc 市场名称
    *@param $hy 产品分类名称
    */
    public function search($cp=0,$gs=0,$sc=0,$hy=0) {
    	 
    	$where='';
    	$join='';
    	
    	
    	if($cp){
    		
    		$where=$where." and cp='$cp'";
    	}
    	if($gs){
    		
    	}
    	if($sc){
    		$where=$where." and sc='$sc'";
    	}
    	if($hy){
    		$where=$where." and hy='$hy'";
    	}

    	
    	$ProductModel=new Model();
    	$Product=$ProductModel->query("
    			select * from sc_company as c
    			
    			left join sc_shichang as s on c.shichang=s.id
    			right join sc_product as p on p.cid=c.id
    			
    			where status=1");
    	 
    	$this->display();
    }
}