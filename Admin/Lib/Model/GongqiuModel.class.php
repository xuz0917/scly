<?php

class GongqiuModel extends Model {
	public function getGongqiuList($firstRow,$listRows,$uname=''){
		$model=new Model();
		$joinarr='INNER JOIN wl_user AS U ON U.id = G.uid';
		$where="G.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if($uname!='')$where=$where." and U.uname like '%$uname%'";
		
		$members=$model->table('wl_gongqiu as G')
		->join($joinarr)
		->field('G.id ,G.title ,U.uname ,G.phone ,G.addtime')
		->where($where)
		->order('G.id desc')
		->limit($firstRow,$listRows)
		->select();
		return $members;
	}
	public function count(){
		$userModel=M('Gongqiu');
		$count=0;
		$count=$userModel->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")->count('id');
		return $count;
	}
}
?>