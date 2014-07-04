<?php

class ZhidingModel extends Model {
	
	public function getZhidingList($keyword='')
	{
		$model=new Model();
		$where="fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if($keyword!='')$where=$where." and C.cname like '%$keyword%'";
		$members=$model->table('wl_recommend as R')
		->join('wl_company as C on R.cid=C.id')
		->where($where)
		->field('C.cname ,R.*')
		->order('C.id')
		->select();
		return $members;
	}
}