<?php
class RencaiAction extends CommonAction {
    public function index(){
    	$nowtime=date('Y-m-d H:i:s',time());
    	$CityModel=M('fzinfo');
    	$City=$CityModel->where("domain='{$GLOBALS['FZHOST']}'")->find();
    	$this->assign('city',$City);
    	 
    	$CityList=$this->GetCityList();
    	$this->assign('citylist',$CityList);
    	
    	//顶部广告位
    	$PictureModel=M('Picture');
    	$dingbuad=$PictureModel->where("tid=3 and fzid='{$GLOBALS['FZID']}' and endtime>'$nowtime'")->limit(2)->select();
    	$count=count($dingbuad);
    	if ($count<2) {
    		for ($i = 0; $i < (2-$count); $i++) {
    			$dingbuad[$i+$count]=array("adpic"=>"/Upload/ads/dingbu".$i.".gif","adaddress"=>"www.56cheng.com");
    		}
    	}
    	$this->assign('dingbuad',$dingbuad);
    	
    	//底部广告位
    	$dibuad=$PictureModel->where("tid=6 and fzid='{$GLOBALS['FZID']}' and endtime>'$nowtime'")->limit(1)->select();
    	$count=count($dibuad);
    	if ($count<1) {
    		for ($i = 0; $i < (1-$count); $i++) {
    			$dibuad[$i+$count]=array("adpic"=>"/Upload/ads/cdibu".$i.".jpg","adaddress"=>"www.56cheng.com");
    		}
    	}
    	$this->assign('dibuad',$dibuad);

    	//优秀企业推荐
    	$YouxiuModel=M('Link');
    	$Youxiu=$YouxiuModel->where("fzid='{$GLOBALS['FZID']}' and endtime>'$nowtime' and tid=2")->order('id')->select();
    	$this->assign('youxiu',$Youxiu);
    	 
    	//新闻列表
    	$ZhaopinModel=M('Zhaopin');
		import('ORG.Util.Page');// 导入分页类
		$count      = $ZhaopinModel->where("fzid={$GLOBALS['FZID']}")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,30);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->rollPage=12;
		$Page->url='rencai';
		$Page->setConfig('theme'," %upPage% %linkPage% %downPage% %nextPage%");
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$Zhaopinlist=$ZhaopinModel->field('id,zpcompanyname,zpposition,zpcount,addtime')->where("fzid={$GLOBALS['FZID']}")->order('id desc')->limit($Page->firstRow,$Page->listRows)->select();
		$this->assign('zhaopinlist',$Zhaopinlist);
		$this->assign('page',$show);// 赋值分页输出
    	
    	$this->display();
    }
    
    public function view($id) {
    	
    	$nowtime=date('Y-m-d H:i:s',time());
    	$CityModel=M('fzinfo');
    	$City=$CityModel->where("domain='{$GLOBALS['FZHOST']}'")->find();
    	$this->assign('city',$City);
    	
    	$CityList=$this->GetCityList();
    	$this->assign('citylist',$CityList);
    	 
    	//顶部广告位
    	$PictureModel=M('Picture');
    	$dingbuad=$PictureModel->where("tid=3 and fzid='{$GLOBALS['FZID']}' and endtime>'$nowtime'")->limit(2)->select();
    	$count=count($dingbuad);
    	if ($count<2) {
    		for ($i = 0; $i < (2-$count); $i++) {
    			$dingbuad[$i+$count]=array("adpic"=>"/Upload/ads/dingbu".$i.".gif","adaddress"=>"www.56cheng.com");
    		}
    	}
    	$this->assign('dingbuad',$dingbuad);
    	
    	//底部广告位
    	$dibuad=$PictureModel->where("tid=6 and fzid='{$GLOBALS['FZID']}' and endtime>'$nowtime'")->limit(1)->select();
    	$count=count($dibuad);
    	if ($count<1) {
    		for ($i = 0; $i < (1-$count); $i++) {
    			$dibuad[$i+$count]=array("adpic"=>"/Upload/ads/cdibu".$i.".jpg","adaddress"=>"www.56cheng.com");
    		}
    	}
    	$this->assign('dibuad',$dibuad);

    	//优秀企业推荐
    	$YouxiuModel=M('Link');
    	$Youxiu=$YouxiuModel->where("fzid='{$GLOBALS['FZID']}' and endtime>'$nowtime' and tid=2")->order('id')->select();
    	$this->assign('youxiu',$Youxiu);
    	 
    	$ZhaopinModel=M('Zhaopin');
    	$Zhaopin=$ZhaopinModel->where("id='$id'")->find();
    	if(!empty($Zhaopin['id'])){
	    	$this->assign('zhaopin',$Zhaopin);
	    	$this->display();
    	}else{
    		$this->error("信息不存在，请联系管理员",'http://'.$GLOBALS['FZHOST'].'/');
    	}
    }
    
    public function GetCityList() {
    	$CityModel=D('Fzinfo');
    	$City=$CityModel->getCityList();
    	return $City;
    }
}