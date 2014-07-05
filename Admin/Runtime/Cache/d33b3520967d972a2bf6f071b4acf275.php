<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>修改商户</title>
<link rel="stylesheet" href="__PUBLIC__/css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/invalid.css" type="text/css" media="screen">
<script type="text/javascript" src="__PUBLIC__/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/simpla.jquery.configuration.js"></script>

<!--ckfinder-->
<script type="text/javascript">
	function BrowseServer(inputId) {
		var finder = new CKFinder() ;
		finder.basePath = '__PUBLIC__/Ckeditor/ckfinder/'; //导入CKFinder的路径
		finder.selectActionFunction = SetFileField; //设置文件被选中时的函数
		finder.selectActionData = inputId; //接收地址的input ID
		finder.popup() ;
	}
	//文件选中时执行
	function SetFileField(fileUrl,data){
		document.getElementById(data["selectActionData"]).value = fileUrl ;
	}
</script>
<script type="text/javascript" src="__PUBLIC__/Ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="__PUBLIC__/Ckeditor/config.js"></script>
<script type="text/javascript" src="__PUBLIC__/Ckeditor/ckfinder/ckfinder.js"></script>


<body>
<div id="body-wrapper">
	<div id="sidebar">
    <div id="sidebar-wrapper">
      <h1 id="sidebar-title"><a href="#">商城临沂网站后台</a></h1>
      <a href="#"><img id="logo" src="__PUBLIC__/images/logo.png" alt="Simpla Admin logo"></a>
      <div id="profile-links"> 尊敬的管理员<a href="#" title="修改会员信息"><?php echo $_SESSION['admin_uname'] ?></a>，您好！<a href="__APP__/Login/logout" title="退出登陆">退出</a><br>
        	<br>
        <?php if($_SESSION['companyname']!=''){echo '当前商户：'.$_SESSION['companyname'].' <a href="__APP__/shanghu/shifang">释放</a>';}else{echo '当前无选中商铺';} ?></div>
      <ul id="main-nav">
        <li> <a href="#" class="nav-top-item">
          商户管理 </a>
          <ul>
            <li><a href="__APP__/shanghu/index">商户列表</a></li>
            <!--<li><a class="current" href="#">认证管理</a></li>-->
            <li><a href="__APP__/shanghu/add">商户添加</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item">
          产品管理 </a>
          <ul>
            <li><a href="__APP__/product/index">产品列表</a></li>
            <li><a href="__APP__/product/add">产品添加</a></li>
            <li><a href="__APP__/product/prolist">产品分类</a></li>
            <li><a href="__APP__/product/prolistadd">分类添加</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> 分类管理 </a>
          <ul>
            <li><a href="__APP__/fenlei/shichang">市场管理</a></li>
            <li><a href="__APP__/fenlei/shichangadd">市场添加</a></li>
            <li><a href="__APP__/fenlei/hangye">行业分类</a></li>
            <li><a href="__APP__/fenlei/hangyeadd">行业添加</a></li>
            <li><a href="__APP__/fenlei/chengshi">城市分类</a></li>
            <li><a href="__APP__/fenlei/chengshiadd">城市添加</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> 新闻内容管理 </a>
          <ul>
            <li><a href="#">新闻列表</a></li>
            <li><a href="#">新闻添加</a></li>
            <li><a href="#">新闻分类</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> 招聘管理 </a>
          <ul>
            <li><a href="#">招聘列表</a></li>
            <li><a href="#">招聘添加</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> 广告管理 </a>
          <ul>
            <li><a href="#">广告列表</a></li>
            <li><a href="#">广告添加</a></li>
            <li><a href="#">广告分类列表</a></li>
            <li><a href="#">广告分类添加</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> 系统设置 </a>
          <ul>
            <li><a href="#">管理员管理</a></li>
            <li><a href="#">系统参数</a></li>
            <li><a href="#">会员级别管理</a></li>
          </ul>
        </li>
      </ul>
      <!-- End #messages -->
    </div>
  </div>
    <div id="main-content">
    	<p id="page-intro">修改商户>>
<hr>
        </p>
        <form action="__APP__/shanghu/editsave/" method="post">
        	<input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>" />
            <table border="1" cellpadding="1" cellspacing="0">
                <tr>
                    <td width="60">商户名：</td><td><input type="text" name="companyname" class="text-input" value="<?php echo ($company["companyname"]); ?>" />&nbsp; &nbsp; &nbsp; &nbsp;等级：&nbsp; &nbsp;<select name="star" id="star">
                        	<option value="0">无</option>
                        	<option value="1">1星级</option>
                        	<option value="2">2星级</option>
                        	<option value="3">3星级</option>
                        	<option value="4">4星级</option>
                        	<option value="5">5星级</option>
                        	<option value="6">6星级</option>
                        	<option value="7">7星级</option>
                        	<option value="8">8星级</option>
                        	<option value="9">9星级</option>
                        </select>
                        <script type="text/javascript">
			                document.getElementById("star").value='<?php echo ($company["star"]); ?>';
			            </script>
                        
                        </td>
                </tr>
                <tr>
                  <td>认证：</td>
                  <td><input type="checkbox" name="renzheng" id="renzheng" />
                  <script type="text/javascript">
						if(<?php echo ($company["renzheng"]); ?> > 0 )
						{
							document.getElementById('renzheng').checked = true;
						}
				  </script>
                  
                   &nbsp; &nbsp;年份：<input type="text" name="comyear" class="text-input" value="<?php echo ($company["comyear"]); ?>" /></td>
                </tr>
                <tr>
                	<td>所属市场：</td>
                	<td>
                    	<select name="shichang" id="shichang">
                        	<?php if(is_array($shichang)): $i = 0; $__LIST__ = $shichang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voshichang): $mod = ($i % 2 );++$i;?><option value="<?php echo ($voshichang["id"]); ?>"><?php echo ($voshichang["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        	
                        </select>&nbsp; &nbsp; &nbsp; &nbsp;所属地区：&nbsp; &nbsp;
                        <select name="chengshi" id="chengshi">
	                        <?php if(is_array($chengshi)): $i = 0; $__LIST__ = $chengshi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vochengshi): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vochengshi["id"]); ?>"><?php echo ($vochengshi["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        
                        
                        <script type="text/javascript">
			                document.getElementById("shichang").value='<?php echo ($company["shichang"]); ?>';
			            </script>
                        
                        <script type="text/javascript">
			                document.getElementById("chengshi").value='<?php echo ($company["chengshi"]); ?>';
			            </script>
                    </td>
                </tr>
                <tr>
                	<td>LOGO：</td>
                	<td><input type="text" name="logo" id="logos" class="text-input small-input" value="<?php echo ($company["logo"]); ?>" /> <input type="button" value=" 浏 览 " onClick="BrowseServer('logos');" class="button" />&nbsp; &nbsp; &nbsp; &nbsp;老板照：&nbsp; &nbsp;<input type="text" name="mastertu" id="mastertu" class="text-input small-input" value="<?php echo ($company["mastertu"]); ?>" />  <input type="button" value=" 浏 览 " onClick="BrowseServer('mastertu');" class="button" /></td>
                </tr>
                <tr>
                	<td>轮播一：</td>
                	<td><input type="text" name="banner1" id="banner1" class="text-input small-input" value="<?php echo ($company["banner1"]); ?>" /> <input type="button" value=" 浏 览 " onClick="BrowseServer('banner1');" class="button" />&nbsp; &nbsp; &nbsp; &nbsp;轮播二：&nbsp; &nbsp;<input type="text" name="banner2" id="banner2" class="text-input small-input" value="<?php echo ($company["banner2"]); ?>" />  <input type="button" value=" 浏 览 " onClick="BrowseServer('banner2');" class="button" /></td>
                </tr>
                <tr>
                	<td>公司地址：</td>
                	<td><input type="text" name="address" class="text-input large-input" value="<?php echo ($company["address"]); ?>" /></td>
                </tr>
                <tr>
                	<td style="vertical-align:middle">公司简介：</td>
                	<td height="200"><textarea name="jianjie" id="jianjie"><?php echo ($company["jianjie"]); ?></textarea>
                    	<script type="text/javascript">
							CKEDITOR.replace( 'jianjie',     {
								filebrowserBrowseUrl : '__PUBLIC__/ckeditor/ckfinder/ckfinder.html',     
								filebrowserImageBrowseUrl : '__PUBLIC__/ckeditor/ckfinder/ckfinder.html?Type=Images',    
								filebrowserFlashBrowseUrl : '__PUBLIC__/ckeditor/ckfinder/ckfinder.html?Type=Flash',     
								filebrowserUploadUrl : '__PUBLIC__/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',     
								filebrowserImageUploadUrl : '__PUBLIC__/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',     
								filebrowserFlashUploadUrl : '__PUBLIC__/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'     })
                        </script>
                    </td>
                </tr>
                <tr>
                  <td>运营模式：</td>
                  <td>
                  	<select name="yunying" id="yunying">
                        <option value="批发">批发</option>
                        <option value="零售">零售</option>
                        <option value="批发零售">批发零售</option>
                    </select>
                    <script type="text/javascript">
						document.getElementById("yunying").value='<?php echo ($company["yunying"]); ?>';
					</script>
                    </td>
                </tr>
                <tr>
                	<td>公司电话：</td>
                	<td><input type="text" name="hotline" class="text-input" value="<?php echo ($company["hotline"]); ?>" /></td>
                </tr>
                <tr>
                	<td>QQ：</td>
                	<td><input type="text" name="qq" class="text-input" value="<?php echo ($company["qq"]); ?>" /></td>
                </tr>
                <tr>
                	<td>负责人：</td>
                	<td><input type="text" name="fuzeren" class="text-input" value="<?php echo ($company["fuzeren"]); ?>" />&nbsp; &nbsp; &nbsp; &nbsp;服务监督电话：&nbsp; &nbsp;<input type="text" name="supervise" class="text-input" value="<?php echo ($company["supervise"]); ?>" /></td>
                </tr>
                <tr>
                	<td>公司场景：</td>
                	<td>
                    	<input type="text" name="changjing" id="changjing" class="text-input small-input"  value="<?php echo ($company["changjing"]); ?>"/>  <input type="button" value=" 浏 览 " onClick="BrowseServer('changjing');" class="button" />&nbsp;
                    	<input type="text" name="changjing1" id="changjing1" class="text-input small-input"  value="<?php echo ($company["changjing1"]); ?>"/>  <input type="button" value=" 浏 览 " onClick="BrowseServer('changjing1');" class="button" /><br><br>
                    	<input type="text" name="changjing2" id="changjing2" class="text-input small-input"  value="<?php echo ($company["changjing2"]); ?>"/>  <input type="button" value=" 浏 览 " onClick="BrowseServer('changjing2');" class="button" />&nbsp;
                    	<input type="text" name="changjing3" id="changjing3" class="text-input small-input"  value="<?php echo ($company["changjing3"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('changjing3');" class="button" /><br><br>
                    	<input type="text" name="changjing4" id="changjing4" class="text-input small-input"  value="<?php echo ($company["changjing4"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('changjing4');" class="button" /> &nbsp;
                    	<input type="text" name="changjing5" id="changjing5" class="text-input small-input"  value="<?php echo ($company["changjing5"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('changjing5');" class="button" /><br><br>
                    	<input type="text" name="changjing6" id="changjing6" class="text-input small-input"  value="<?php echo ($company["changjing6"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('changjing6');" class="button" /> &nbsp;
                    	<input type="text" name="changjing7" id="changjing7" class="text-input small-input"  value="<?php echo ($company["changjing7"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('changjing7');" class="button" /> 
                    </td>
                </tr>
                <tr>
                	<td>荣誉资质：</td>
                	<td>
                    	<input type="text" name="rongyu" id="rongyu" class="text-input small-input"  value="<?php echo ($company["rongyu"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('rongyu');" class="button" /> &nbsp;
                    	<input type="text" name="rongyu1" id="rongyu1" class="text-input small-input"  value="<?php echo ($company["rongyu1"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('rongyu1');" class="button" /><br><br>
                    	<input type="text" name="rongyu2" id="rongyu2" class="text-input small-input"  value="<?php echo ($company["rongyu2"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('rongyu2');" class="button" /> &nbsp;
                    	<input type="text" name="rongyu3" id="rongyu3" class="text-input small-input"  value="<?php echo ($company["rongyu3"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('rongyu3');" class="button" /><br><br>
                    	<input type="text" name="rongyu4" id="rongyu4" class="text-input small-input"  value="<?php echo ($company["rongyu4"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('rongyu4');" class="button" /> &nbsp;
                    	<input type="text" name="rongyu5" id="rongyu5" class="text-input small-input"  value="<?php echo ($company["rongyu5"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('rongyu5');" class="button" /><br><br>
                    	<input type="text" name="rongyu6" id="rongyu6" class="text-input small-input"  value="<?php echo ($company["rongyu6"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('rongyu6');" class="button" /> &nbsp;
                    	<input type="text" name="rongyu7" id="rongyu7" class="text-input small-input"  value="<?php echo ($company["rongyu7"]); ?>"/> <input type="button" value=" 浏 览 " onClick="BrowseServer('rongyu7');" class="button" />
                    </td>
                </tr>
                <tr>
                	<td>标题：</td>
                	<td><input type="text" name="title" class="text-input large-input"  value="<?php echo ($company["title"]); ?>" /></td>
                </tr>
                <tr>
                	<td>关键词：</td>
                	<td><input type="text" name="keywords" class="text-input large-input"  value="<?php echo ($company["keywords"]); ?>" /></td>
                </tr>
                <tr>
                	<td style="vertical-align:top">描述：</td>
                	<td><textarea name="description" style="height:60px"><?php echo ($company["description"]); ?></textarea></td>
                </tr>
                <tr>
                  <td>风格：</td>
                  <td>
                  	<select name="templet" id="templet">
                        <option value="default">默认</option>
                        <option value="blue">蓝色</option>
                        <option value="red">红色</option>
                    </select>
                    
                    <script type="text/javascript">
						document.getElementById("templet").value='<?php echo ($company["templet"]); ?>';
					</script>
                  </td>
                </tr>
                <tr>
                	<td></td>
                	<td><button type="submit" class="button">修 改</button>&nbsp; &nbsp;<button type="reset" class="button">重 置</button></td>
	            </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>