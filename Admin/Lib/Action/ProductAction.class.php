<?php
class ProductAction extends CommonAction {
	
	public function index() {
		$ProductModel=new Model();
		$where="p.cid='{$_SESSION['companyid']}'";
		
		if(isset($_POST['keywords'])&&$_POST['keywords']!=''){
			$where=$where." and p.title like '%{$_POST['keyword']}%'";
		}
		
		import('ORG.Util.Page');// 导入分页类
		$count      = $ProductModel->table("sc_product as p")->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('theme',"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$Product= $ProductModel->table("sc_product as p")
							->join(array("sc_prolist as l on p.prolist=l.id","sc_company as c on p.cid=c.id"))
							->field("p.id,p.title,p.jiage,p.addtime,l.name,c.companyname")
							->where($where)
							->limit($Page->firstRow,$Page->listRows)->select();
		$this->assign('company',$Product);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	
	public function add() {

		//取出产品分类
		$prolistModel=new Model();
		$prolist=$prolistModel->table('sc_prolist as l')
		->field('l.*')
		->where("l.cid='{$_SESSION['companyid']}'")
		->select();
		$prolist=$this->build_tree(0, $prolist);
		$this->assign("protree",$prolist);

		//取出行业
		$hangyeModel=M('Hangye');
		$hangye=$hangyeModel->select();
		$hangye=$this->build_hytree(0, $hangye);
		$this->assign("hangye",$hangye);
		$this->display();
	}

	public function addsave() {
		
		$data=array();
		$data['title']=trim($_POST['title']);
		$data['hangye']=trim($_POST['hangye']);
		$data['prolist']=trim($_POST['prolist']);
		$data['jiage']=trim($_POST['jiage']);
		$data['pic1']=trim($_POST['pic1']);
		$data['pic2']=trim($_POST['pic2']);
		$data['pic3']=trim($_POST['pic3']);
		$data['contents']=trim($_POST['contents']);
		$data['keywords']=trim($_POST['keywords']);
		$data['description']=trim($_POST['description']);
		$data['cid']=$_SESSION['companyid'];
		
		$productModel=M('Product');
		if ($productModel->add($data)) {
			$this->success('添加成功',__APP__.'/product/index');
		}else {
			$this->error('添加失败');
		}
	}
	
	public function edit($id) {
		
		//取出产品分类
		$prolistModel=new Model();
		$prolist=$prolistModel->table('sc_prolist as l')
		->field('l.*')
		->where("l.cid='{$_SESSION['companyid']}'")
		->select();
		$prolist=$this->build_tree(0, $prolist);
		$this->assign("protree",$prolist);

		//取出行业
		$hangyeModel=M('Hangye');
		$hangye=$hangyeModel->select();
		$hangye=$this->build_hytree(0, $hangye);
		$this->assign("hangye",$hangye);
	
		//取出产品
		$productModel=M('Product');
		$product=$productModel->where("id='$id'")->find();
		$this->assign('product',$product);
		
		$this->display ();
	}
	
	public function editsave() {
		$data=array();
		$data['title']=trim($_POST['title']);
		$data['hangye']=trim($_POST['hangye']);
		$data['prolist']=trim($_POST['prolist']);
		$data['jiage']=trim($_POST['jiage']);
		$data['pic1']=trim($_POST['pic1']);
		$data['pic2']=trim($_POST['pic2']);
		$data['pic3']=trim($_POST['pic3']);
		$data['contents']=trim($_POST['contents']);
		$data['keywords']=trim($_POST['keywords']);
		$data['description']=trim($_POST['description']);
		
		$productModel=M('Product');
		$productModel->where("id='{$_POST['id']}'")->save($data);
		$this->success('修改成功');
	}
	
	public function del($id) {
		$CompanyModel=M('Company');
		$CompanyModel->where("id='$id'")->delete();
		$this->success('删除成功');
	}

	//产品
	
	//产品分类
	public function prolist() {
		$prolistModel=new Model();
		$prolist=$prolistModel->table('sc_prolist as l')
							->join('sc_company as c on l.cid=c.id')
							->field('l.*,c.companyname')
							->select();
		
		$this->assign("prolist",$prolist);
		$prolist=$this->build_tree(0, $prolist);
		$this->assign("tree",$prolist);
		$this->display ();
	}
	
	public function prolistadd() {
		$prolistModel=M('Prolist');
		$prolist=$prolistModel->where("pid=0")->select();
		$this->assign("prolist",$prolist);
		$this->display();
	}
	public function prolistaddsave() {
		$data=array();
		//提交一级
		if (isset($_POST['add1'])&&$_POST['add1']!='') {
			if ($_POST['toedit1']=='') {
				$this->error('必要信息不能为空');
			}
			$data['name']=trim($_POST['toedit1']);
			$data['pid']=$_POST['add1'];
		}
		//提交二级
		if (isset($_POST['add2'])&&$_POST['add2']!='') {
			if ($_POST['toedit2']=='') {
				$this->error('必要信息不能为空');
			}
			$data['name']=trim($_POST['toedit2']);
			$data['pid']=trim($_POST['list1']);
		}
		$data['cid']=$_SESSION['companyid'];
		$prolistModel=M('Prolist');
		if ($prolistModel->add($data)) {
			$this->success('添加成功');
		}
	}
	
	public function prolistedit($id) {
		$prolistModel=M('Prolist');
		$prolist=$prolistModel->where("id='{$id}'")->find();
		$this->assign("prolist",$prolist);
		$this->display();
	}
	public function prolisteditsave() {
		$id=$_POST['id'];
		$prolistModel=M('Prolist');
		$name=$_POST['name'];
		$prolist=$prolistModel->where("id='{$id}'")->data("name=$name")->save();
		$this->success("保存成功");
	}
	public function prolistdel($id) {
		$prolistModel=M('Prolist');
		$prolist=$prolistModel->where("id='{$id}'")->delete();
		$this->success("删除成功");
	}
	
	//ajax
	public function get_prolist() {
		$id = $_POST ['id'];
		$region = M( 'Prolist' );
		$condition ['pid'] = $id;
		$list = $region->where ( $condition )->select ();
		echo json_encode ( $list );
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
	
	//行业分类建树
	function findhyChild($arr,$id){
	
		$childs=array();
		foreach ($arr as $k => $v){
			if($v['parent_id']== $id){
				$childs[]=$v;
					
			}
	
		}
	
		return $childs;
	
	}
	function build_hytree($root_id,$rows){
		//global $rows;
		$childs=$this->findhyChild($rows,$root_id);
		if(empty($childs)){
			return null;
		}
		foreach ($childs as $k => $v){
			$rescurTree=$this->build_hytree($v['region_id'],$rows);
			if( null !=   $rescurTree){
				$childs[$k]['childs']=$rescurTree;
			}
		}
		return $childs;
	}
}