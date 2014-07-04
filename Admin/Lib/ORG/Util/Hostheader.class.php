<?php 
	class Hostheader{
		//增加域名
		function addcomhost($id,$host){
			$hostdir=$_SERVER['DOCUMENT_ROOT'].'/Configs/vhost.tyr';
			$companydir=explode('.',$host);
			$allhost=file_get_contents($hostdir);
			$allhost=trim($allhost."\r\n[".$id."]\r\n".$host." /Company/".$companydir[0]."\r\n[/".$id."]");
			$fp=fopen($hostdir,"w+");
			if(fwrite($fp,$allhost)){
				return true;
			}else{
				return false;
			}
			fclose($fp);
		}
		//删除域名
		function delcomhost($id){
			$hostdir=$_SERVER['DOCUMENT_ROOT'].'/Configs/vhost.tyr';
			$allhost=file_get_contents($hostdir);
			$arr=(explode("[$id]",$allhost));
			$arr1=(explode("[/$id]",$arr[1]));
			$allhost=trim(trim($arr[0]).$arr1[1]);
			$fp=fopen($hostdir,"w+");
			if(fwrite($fp,$allhost)){
				return true;
			}else{
				return false;
			}
			fclose($fp);
		}
		//修改域名
		function savecomhost($id,$host){
			$hostdir=$_SERVER['DOCUMENT_ROOT'].'/Configs/vhost.tyr';
			$companydir=explode('.',$host);
			$allhost=file_get_contents($hostdir);
			$arr=(explode("[$id]",$allhost));
			$arr1=(explode("[/$id]",$arr[1]));
		
			$center=trim("\r\n[".$id."]\r\n".$host." /Company/".$companydir[0]."\r\n[/".$id."]");
				
			$allhost=trim(trim($arr[0]).$center.$arr1[1]);
			$fp=fopen($hostdir,"w+");
			if(fwrite($fp,$allhost)){
				return true;
			}else{
				return false;
			}
			fclose($fp);
		}
		
		function addwebhost($id,$host){
			$hostdir=$_SERVER['DOCUMENT_ROOT'].'/Configs/vhost.tyr';
			$companydir=explode('.',$host);
			$allhost=file_get_contents($hostdir);
			$allhost=trim($allhost."\r\n[".$id."]\r\n".$host." /Childsite/".$companydir[0]."\r\n[/".$id."]");
			$fp=fopen($hostdir,"w+");
			if(fwrite($fp,$allhost)){
				return true;
			}else{
				return false;
			}
			fclose($fp);
		}
		function delwebhost($id){
			$hostdir=$_SERVER['DOCUMENT_ROOT'].'/Configs/vhost.tyr';
			$allhost=file_get_contents($hostdir);
			$arr=(explode("[$id]",$allhost));
			$arr1=(explode("[/$id]",$arr[1]));
			$allhost=trim(trim($arr[0]).$arr1[1]);
			$fp=fopen($hostdir,"w+");
			if(fwrite($fp,$allhost)){
				return true;
			}else{
				return false;
			}
			fclose($fp);
		}
		
		
		function delallhost(){
			$hostdir=$_SERVER['DOCUMENT_ROOT'].'/Configs/vhost.tyr';
			$fp=fopen($hostdir,"w+");
			if(fwrite($fp,'')){
				return true;
			}else{
				return false;
			}
			fclose($fp);
		}
	}
