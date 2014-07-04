<?php

class FahuoModel extends Model {
	
	public function getFahuoList($firstRow,$listRows,$keyword='')
	{
		$where="F.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if ($keyword!='') {
			$where=$where." and C.companyname like '%$keyword%'";
		}
		$fahuoModel=new model();
    	$fahuo=$fahuoModel->table('wl_fahuo as F')
    	->join('wl_company as C ON F.cid=C.id')
    	->field('F.id ,C.companyname ,F.chufa ,F.daoda ,F.contacts ,F.phone ,F.addtime')
    	->where($where)
    	->limit($firstRow,$listRows)
    	->order('F.id desc')
    	->select();
    	return $fahuo;
	}
	public function count($keyword=''){
		$model=new model();
		$where='F.fzid='.$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid'];
		if ($keyword!='') {
			$where=$where." and companyname like '%$keyword%'";
		}
		$count=$model->table('wl_fahuo as F')
    	->join('wl_company as C ON F.cid=C.id')
    	->field('F.id ,C.companyname ,F.chufa ,F.daoda ,F.contacts ,F.phone ,F.addtime')
    	->where($where)
		->count('F.id');
		return $count;
	}
	public function getFahuo($id)
	{
		$where="F.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		$where=$where." and F.id = '$id'";
		$fahuoModel=new model();
		$fahuo=$fahuoModel->table('wl_fahuo as F')
		->join('wl_company as C ON F.cid=C.id')
		->field('F.* ,C.companyname')
		->where($where)
		->find();
		return $fahuo;
	}
	
}