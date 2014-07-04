<?php

class TuwenModel extends Model {
	
	public function getTuwenList($tid)
	{
		$model=new Model();
		$where="P.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if($tid!=0)$where=$where." and P.tid = '$tid'";
		$members=$model->table('wl_picture as P')
		->join('wl_picturetype as T on T.id=P.tid')
		->where($where)
		->field('P.* ,T.typename')
		->order('P.tid asc')
		->select();
		return $members;
	}
	
}