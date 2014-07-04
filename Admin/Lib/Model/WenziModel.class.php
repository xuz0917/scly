<?php

class WenziModel extends Model {
	
	public function getWenziList($tid='')
	{
		$model=new Model();
		$where="L.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if($tid!='')$where=$where." and L.tid = '$tid'";
		$members=$model->table('wl_link as L')
		->join('wl_linktype as T on T.id=L.tid')
		->where($where)
		->field('L.* ,T.typename')
		->order('L.id desc')
		->select();
		return $members;
	}
	
}