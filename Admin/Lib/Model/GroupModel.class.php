<?php
/**
 +------------------------------------------------------------------------------
 * 配置类型模型
 +------------------------------------------------------------------------------
 * @category   Model
 * @package  Lib
 * @subpackage  Model
 * @author   668FreeCloud <chinasoftstar@qq.com>
 * @version  $Id: GroupModel.class.php 2791 2013/7/28  668FreeCloud $
 +------------------------------------------------------------------------------
 */
class GroupModel extends Model {
	protected $_validate = array(
		array('name','require','名称必须'),
		);

	protected $_auto		=	array(
        array('status',1,self::MODEL_INSERT,'string'),
		array('create_time','time',self::MODEL_INSERT,'function'),
		);
	public function getNav(){
		$modules = array(
				'0'=>'系统管理',
				'1'=>'会员管理',
				'2'=>'公司管理',
				'3'=>'信息管理',
				'4'=>'运营管理',
				
		);
		return $modules;
	}
}
?>