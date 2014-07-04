<?php

class DaoqiModel extends Model {
	
	public function getPictureList()
	{
		$model=new Model();
		$members=$model->table('wl_picture as P')
		->join('wl_picturetype as T on T.id=P.tid')
		->field('P.* ,T.typename')
		->where("P.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")
		->order('P.endtime')
		->select();
		return $members;
	}
	public function getWenziList()
	{
		$model=new Model();
		$members=$model->table('wl_link as L')
		->join('wl_linktype as T on T.id=L.tid')
		->field('L.* ,T.typename')
		->where("L.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")
		->order('L.endtime')
		->select();
		return $members;
	}
	public function getZhidingList()
	{
		$model=new Model();
		$members=$model->table('wl_recommend as R')
		->join('wl_company as C on C.id=R.cid')
		->field('R.* ,C.companyname')
		->where("R.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")
		->order('R.endtime')
		->select();
		return $members;
	}
	
	public function getTuwenZhidingList()
	{
		$model=new Model();
		$members=$model->table('wl_recompic as R')
		->field('R.*')
		->where("R.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")
		->order('R.endtime')
		->select();
		return $members;
	}

	
}