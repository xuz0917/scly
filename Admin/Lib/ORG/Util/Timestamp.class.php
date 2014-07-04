<?php 
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2010 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: Cookie.class.php 2601 2012-01-15 04:59:14Z liu21st $

class Timestamp {
	
	public function chazhi($starttime,$endtime) {
		
		$d1=$this->tostamp($starttime);
		
		$d2=$this->tostamp($endtime);
		
		$Days=round(($d2-$d1)/3600/24);
		return $Days;
	}
	
	public function tostamp($time) {
		$Date_List=array();
		$Date_List_one=array();
		$Date_List_two=array();
		$Date_List=explode(" ", $time);
		$Date_List_one=explode("-",$Date_List[0]);
		$Date_List_two=explode(":",$Date_List[1]);
		$stamp=mktime($Date_List_two[0],$Date_List_two[1],$Date_List_two[2],$Date_List_one[1],$Date_List_one[2],$Date_List_one[0]);
		return $stamp;
	}
	

	
}