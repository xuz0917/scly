<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>产品管理</title>
<link rel="stylesheet" href="__PUBLIC__/css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/invalid.css" type="text/css" media="screen">
<script type="text/javascript" src="__PUBLIC__/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/simpla.jquery.configuration.js"></script>
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
    	<p id="page-intro">产品列表>>
        <hr>
        </p>
            <table border="1" cellpadding="1" cellspacing="0">
                <tr align="center">
                    <td width="5%">ID</td>
                    <td width="35%">产品名</td>
                    <td width="15%">所属分类</td>
                    <td width="15%">所属商户</td>
                    <td width="5%">价格</td>
                    <td width="15%">添加时间</td>
                    <td width="10%">操作</td>
                </tr>
                <?php if(is_array($company)): $i = 0; $__LIST__ = $company;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vocompany): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vocompany["id"]); ?></td>
                    <td><div style="width:100%;height:30px;overflow:hidden"><?php echo ($vocompany["companyname"]); ?></div></td>
                    <td><?php echo ($vocompany["name"]); ?></td>
                    <td><?php echo ($vocompany["companyname"]); ?></td>
                    <td><?php echo ($vocompany["jiage"]); ?>元</td>
                    <td><?php echo ($vocompany["addtime"]); ?></td>
                    <td><a href="__APP__/product/edit/id/<?php echo ($vocompany["id"]); ?>">修改</a>&nbsp;<a href="__APP__/product/del/id/<?php echo ($vocompany["id"]); ?>">删除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                <td colspan="7">
                  <div class="pagination"> <?php echo ($page); ?> </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </table>
    </div>
</div>
</body>
</html>