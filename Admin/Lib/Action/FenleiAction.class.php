<?php
class FenleiAction extends CommonAction {
	
	public function hangye() {
		$hangyeModel=M('Hangye');
		$hangye=$hangyeModel->select();
		$this->assign("hangye",$hangye);
		$hangye=$this->build_tree(0, $hangye);
		$this->assign("tree",$hangye);
		$this->display ();
	}
	
	public function hangyeadd() {
		$hangyeModel=M('Hangye');
		$hangye=$hangyeModel->where("parent_id=0")->select();
		$this->assign("hangye",$hangye);
		$this->display ();
	}
	public function hangyeaddsave() {
		$data=array();
		//提交一级
		if (isset($_POST['add1'])&&$_POST['add1']!='') {
			if ($_POST['toedit1']=='') {
				$this->error('必要信息不能为空');
			}
			$data['region_name']=trim($_POST['toedit1']);
			$data['parent_id']=$_POST['add1'];
		}
		//提交二级
		if (isset($_POST['add2'])&&$_POST['add2']!='') {
			if ($_POST['toedit2']=='') {
				$this->error('必要信息不能为空');
			}
			$data['region_name']=trim($_POST['toedit2']);
			$data['parent_id']=trim($_POST['list1']);
		}
		//提交三级
		if (isset($_POST['add3'])&&$_POST['add3']!='') {
			if ($_POST['toedit3']=='') {
				$this->error('必要信息不能为空');
			}
			$data['region_name']=trim($_POST['toedit3']);
			$data['parent_id']=trim($_POST['list2']);
		}
		//提交四级
		if (isset($_POST['add4'])&&$_POST['add4']!='') {
			if ($_POST['toedit4']=='') {
				$this->error('必要信息不能为空');
			}
			$data['region_name']=trim($_POST['toedit4']);
			$data['parent_id']=trim($_POST['list3']);
		}
		$hangyeModel=M('Hangye');
		if ($hangyeModel->add($data)) {
			$this->success('添加成功');
		}
	}
	
	public function hangyeedit($id) {
		$hangyeModel=M('Hangye');
		$hangye=$hangyeModel->where("region_id='{$id}'")->find();
		$this->assign("hangye",$hangye);
		$this->display();
	}
	public function hangyeeditsave() {
		$id=$_POST['id'];
		$hangyeModel=M('Hangye');
		$region_name=$_POST['name'];
		$hangye=$hangyeModel->where("region_id='{$id}'")->data("region_name=$region_name")->save();
		$this->success("保存成功");
	}
	public function hangyedel($id) {
		$hangyeModel=M('Hangye');
		$hangye=$hangyeModel->where("region_id='{$id}'")->delete();
		$this->success("删除成功");
	}
	
	public function shichang() {
		$shichangModel=M('Shichang');
		$shichang=$shichangModel->select();
		$this->assign("shichang",$shichang);
		$this->display();
	}
	public function shichangaddsave() {
		$data=array();
		$shichangModel=M('Shichang');
		
		$data['name']=$_POST['name'];
		$shichang=$shichangModel->add($data);
		$this->success("添加成功");
	}
	public function shichangedit($id) {
		$shichangModel=M('Shichang');
		$shichang=$shichangModel->where("id='$id'")->find();
		$this->assign("shichang",$shichang);
		$this->display();
	}
	public function shichangeditsave() {
		$id=$_POST['id'];
		$shichangModel=M('Shichang');
		$region_name=$_POST['name'];
		$shichang=$shichangModel->where("id='{$id}'")->data("name=$region_name")->save();
		$this->success("保存成功");
	}
	public function shichangdel($id) {
		$shichangModel=M('Shichang');
		$shichang=$shichangModel->where("id='{$id}'")->delete();
		$this->success("删除成功");
	}
	
	//城市
	public function chengshi() {
		$chengshiModel=M('Chengshi');
		$chengshi=$chengshiModel->select();
		$this->assign("chengshi",$chengshi);
		$this->display();
	}
	public function chengshiaddsave() {
		$data=array();
		$chengshiModel=M('Chengshi');
	
		$data['name']=$_POST['name'];
		$chengshi=$chengshiModel->add($data);
		$this->success("添加成功");
	}
	public function chengshiedit($id) {
		$chengshiModel=M('Chengshi');
		$chengshi=$chengshiModel->where("id='$id'")->find();
		$this->assign("chengshi",$chengshi);
		$this->display();
	}
	public function chengshieditsave() {
		$id=$_POST['id'];
		$chengshiModel=M('Chengshi');
		$region_name=$_POST['name'];
		$chengshi=$chengshiModel->where("id='{$id}'")->data("name=$region_name")->save();
		$this->success("保存成功");
	}
	public function chengshidel($id) {
		$chengshiModel=M('Chengshi');
		$chengshi=$chengshiModel->where("id='{$id}'")->delete();
		$this->success("删除成功");
	}
	
	
	//行业ajax
	public function get_region() {
		$region_id = $_POST ['region_id'];
		$region = M( 'Hangye' );
		$condition ['parent_id'] = $region_id;
		$list = $region->where ( $condition )->select ();
		echo json_encode ( $list );
	}
	
	//行业分类建树
	function findChild($arr,$id){
	
		$childs=array();
		foreach ($arr as $k => $v){
			if($v['parent_id']== $id){
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
			$rescurTree=$this->build_tree($v['region_id'],$rows);
			if( null !=   $rescurTree){
				$childs[$k]['childs']=$rescurTree;
			}
		}
		return $childs;
	}

}