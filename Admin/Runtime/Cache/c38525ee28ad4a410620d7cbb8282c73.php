<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>添加产品</title>
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
    	<p id="page-intro">添加产品>>
<hr>
        </p>
        <form action="__APP__/product/addsave/" method="post">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr>
                    <td width="60">产品名：</td><td><input type="text" name="title" class="text-input large-input" /></td>
                </tr>
                <tr>
                	<td>所属行业：</td>
                	<td>
                    	<select name="hangye">
                        	
                        	<?php for ($i = 0; $i < count($hangye); $i++) { echo "<option value='".$hangye[$i]['region_id']."'>".$hangye[$i]['region_name'].'</option>'; if ($hangye[$i]['childs']>0) { for ($j = 0; $j < count($hangye[$i]['childs']); $j++) { echo "<option value='".$hangye[$i]['childs'][$j]['region_id']."'>┗━".$hangye[$i]['childs'][$j]['region_name'].'</option>'; if (count($hangye[$i]['childs'][$j])>0) { for ($k = 0; $k < count($hangye[$i]['childs'][$j]['childs']); $k++) { echo "<option value='".$hangye[$i]['childs'][$j]['childs'][$k]['region_id']."'>&nbsp; ┗━".$hangye[$i]['childs'][$j]['childs'][$k]['region_name'].'</option>'; if (count($hangye[$i]['childs'][$j]['childs'][$k]['childs'])>0) { for ($l = 0; $l < count($hangye[$i]['childs'][$j]['childs'][$k]['childs']); $l++) { echo "<option value='".$hangye[$i]['childs'][$j]['childs'][$k]['childs'][$l]['region_id']."'>&nbsp; &nbsp; ┗━".$hangye[$i]['childs'][$j]['childs'][$k]['childs'][$l]['region_name'].'</option>'; } } } } } } } ?>
                            
                            
                        </select>&nbsp; &nbsp; &nbsp; &nbsp;产品分类：&nbsp; &nbsp;
                        <select name="prolist">
                        
                        <?php for ($i = 0; $i < count($protree); $i++) { echo "<option value='".$protree[$i]['id']."'>".$protree[$i]['name'].'</option>'; if ($protree[$i]['childs']>0) { for ($j = 0; $j < count($protree[$i]['childs']); $j++) { echo "<option value='".$protree[$i]['childs'][$j]['id']."'>┗━".$protree[$i]['childs'][$j]['name'].'</option>'; } } } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="60">价格：</td><td><input type="text" name="jiage" class="text-input" style="width:50px" />元</td>
                </tr>
                <tr>
                	<td>产品大图：</td>
                	<td>
                    	<input type="text" name="pic1" id="pic1" class="text-input small-input" />  <input type="button" value=" 浏 览 " onClick="BrowseServer('pic1');" class="button" />&nbsp;
                    	<input type="text" name="pic2" id="pic2" class="text-input small-input" />  <input type="button" value=" 浏 览 " onClick="BrowseServer('pic2');" class="button" />&nbsp;
                    	<input type="text" name="pic3" id="pic3" class="text-input small-input" />  <input type="button" value=" 浏 览 " onClick="BrowseServer('pic3');" class="button" />&nbsp;<br><br></td>
                </tr>
                <tr>
                	<td style="vertical-align:middle">产品详情：</td>
                	<td height="200"><textarea name="contents" id="contents"></textarea>
                    	<script type="text/javascript">
							CKEDITOR.replace( 'contents',     {
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
                	<td>关键词：</td>
                	<td><input type="text" name="keywords" class="text-input large-input" /></td>
                </tr>
                <tr>
                	<td style="vertical-align:top">描述：</td>
                	<td><textarea name="description" style="height:60px"></textarea></td>
                </tr>
                <tr>
                	<td></td>
                	<td><button type="submit" class="button">添 加</button>&nbsp; &nbsp;<button type="reset" class="button">重 置</button></td>
	            </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>