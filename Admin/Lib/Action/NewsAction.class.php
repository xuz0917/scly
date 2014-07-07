<?php
class NewsAction extends CommonAction {
	
	public function index() {
		$newsModel=M('News');
		import('ORG.Util.Page');// 导入分页类
		$count      = $newsModel->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('theme',"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %linkPage% %downPage% %nextPage% %end%");
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$news= $newsModel->limit($Page->firstRow,$Page->listRows)->where($where)->select();
		$this->assign('news',$news);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	
	public function add() {
		$this->display ();
	}
	public function addsave() {
		$data=array();
		
		$data['title']=$_POST['title'];
		$data['adder']=$_POST['adder'];
		$data['body']=$_POST['body'];
		
		$newsModel=M('News');
		if ($newsModel->add($data)) {
			$this->success('添加成功');
		}
	}
	
	public function edit($id) {
		$newsModel=M('News');
		$news=$newsModel->where("id='{$id}'")->find();
		$this->assign("news",$news);
		$this->display();
	}
	public function editsave() {
		$id=$_POST['id'];
		$data=array();
		
		$data['title']=$_POST['title'];
		$data['adder']=$_POST['adder'];
		$data['body']=$_POST['body'];
		
		$newsModel=M('News');
		
		$newsModel->where("id='{$id}'")->save($data);

		$this->success("保存成功");
	}
	public function 	del($id) {
		$newsModel=M('News');
		$news=$newsModel->where("id='{$id}'")->delete();
		$this->success("删除成功");
	}

}