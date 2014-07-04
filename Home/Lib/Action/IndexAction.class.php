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
    
    /*
     *@param $cp 产品名称
     *@param $gs 公司名称
     *@param $sc 市场名称
     *@param $cpl 产品分类名称 
     */
    public function search($cp,$gs,$sc,$hy) {
    	
    	$where='1=1';
    	
    	$ProductModel=M('Product');
    	$Product=$ProductModel->where($where)->order("id desc")->select();
    	
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