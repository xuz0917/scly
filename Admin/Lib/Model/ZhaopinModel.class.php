<?php

class ZhaopinModel extends Model {
	public function getZhaopinList($firstRow,$listRows,$uname=''){
		$model=new Model();
		$joinarr='INNER JOIN wl_user AS U ON U.id = Z.uid';
		$where='1=1';
		if($uname!='')$where=" U.uname like '%$uname%'";
		
		$members=$model->table('wl_zhaopin as Z')
		->join($joinarr)
		->field('Z.id ,Z.zpcompanyname ,Z.zpposition ,Z.zpcount ,Z.zpphone ,U.uname ,Z.addtime')
		->where($where)
		->order('Z.id desc')
		->limit($firstRow,$listRows)
		->select();
		return $members;
	}
	public function count(){
		$userModel=M('Zhaopin');
		$count=0;
		$count=$userModel->count('id');
		return $count;
	}
}
?>