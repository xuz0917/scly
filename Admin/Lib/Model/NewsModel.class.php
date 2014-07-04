<?php

class NewsModel extends Model {
	
	public function getNewsList($firstRow,$listRows,$tid=0,$title='')
	{
		$model=new Model();
		$where="N.fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if($tid!=0) $where=$where." and N.tid = '$tid'";
		if($title!='')$where=$where." and N.newstitle like '%$title%'";
		$members=$model->table('wl_news as N')
		->join('wl_newstype as T on T.id=N.tid')
		->where($where)
		->field('N.* ,T.typename')
		->order('N.id desc')
		->limit($firstRow,$listRows)
		->select();
		return $members;
	}	
	public function count($typeid=0){
		$model=M('News');
		if ($typeid==0) {
			return $model->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'")->count();
		}else {
			return $model->where("fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}' and tid='{$typeid}'")->count();
		}
		
	}
	
}