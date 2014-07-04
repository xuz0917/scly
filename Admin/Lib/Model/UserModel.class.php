<?php

class UserModel extends Model {
	public function getUserList($firstRow,$listRows,$wheredata=''){
		$model=new Model();
		$joinarr=array('INNER JOIN wl_userinfo AS UI ON  UI.uid = U.id','INNER JOIN wl_usertype AS UT ON U.tid = UT.id');
		$where="fzid='{$_SESSION[C('TMPL_PARSE_STRING.__FZHOSTFIX__').'_admin_fzid']}'";
		if($wheredata!='')$where=$wheredata;
		
		$members=$model->table('wl_user as U')
		->join($joinarr)
		->field('U.id ,U.uname ,UI.companyname ,UI.addtime ,UT.typename ,UI.phone ,UI.mobile ,UI.contacts')
		->where($where)
		->order('U.id desc')
		->limit($firstRow,$listRows)
		->select();
		return $members;
	}
	public function count($wheredata=''){
		$where='1=1';
		if($wheredata!='')$where=$wheredata;
		$userModel=M('User');
		$count=0;
		$count=$userModel->where($where)->count('id');
		return $count;
	}
	
	public function delete($id){
		$userModel=M('User');
		$userModel->where("id='$id'")->delete();
		$uinfoModel=M('Userinfo');
		$uinfoModel->where("uid=$id'")->delete();
	}
	public function repass($id){
		$userModel=M('User');
		$data=array('upass'=>md5('123456'),'errorcount'=>0);
		$userModel->where("id='$id'")->save($data);
	}
}
?>