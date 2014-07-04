<?PHP
/*
 *makehtml()
 *生成HTML
 *$fileurl：获取$fileurl页面中的内容
 *$filedir：生成页面的位置
 *$filename：生成页面的文件名
 */
class Makehtml{
	
	function makecomhtml($fileurl,$filedir,$filename)
	{
		$filedir='/Company/'.$filedir;
		ob_start();
		echo file_get_contents($fileurl);
		$out1 = ob_get_contents();
		ob_end_clean();
		if(!file_exists($_SERVER['DOCUMENT_ROOT'].$filedir)){
			mkdir($_SERVER['DOCUMENT_ROOT'].$filedir,0777);
		}
		$fp = fopen($_SERVER['DOCUMENT_ROOT'].$filedir.$filename,"w");
		if(!$fp)
		{
			return false;
		}
		else
		{
			fwrite($fp,$out1);
			fclose($fp);
			return true;
		}
	}
	
	function delcomhtml($dir)
	{
		if ($dir==''&&$dir==null) {
			return false;
		}
		$dir=$_SERVER['DOCUMENT_ROOT'].'/Company/'.$dir;
		$dh = opendir($dir);
		while ($file = readdir($dh))
		{
			if ($file != "." && $file != "..")
			{
				$fullpath = $dir . "/" . $file;
				if (!is_dir($fullpath))
				{
					unlink($fullpath);
				} else
				{
					$this->delcomhtml($fullpath);
				}
			}
		}
		closedir($dh);
		if (rmdir($dir))
		{
			return true;
		} else
		{
			return false;
		}
	}
}