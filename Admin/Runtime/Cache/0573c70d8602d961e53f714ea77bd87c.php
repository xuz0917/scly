<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>商城临沂网站后台</title>
<link rel="stylesheet" href="__PUBLIC__/css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/invalid.css" type="text/css" media="screen">
<script type="text/javascript" src="__PUBLIC__/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/facebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/jquery.date.js"></script>
</head>
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
  <!-- End #sidebar -->
  <div id="main-content">
    <h2>欢迎您</h2>
    <p id="page-intro">快速选择>>
    <hr>
    </p>
    <ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="#"><span> <img src="__PUBLIC__/images/icons/pencil_48.png" alt="icon"><br>
        管理商户信息 </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="__PUBLIC__/images/icons/paper_content_pencil_48.png" alt="icon"><br>
        管理产品信息</span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="__PUBLIC__/images/icons/image_add_48.png" alt="icon"><br>
        管理分类 </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="__PUBLIC__/images/icons/clock_48.png" alt="icon"><br>
        管理广告位 </span></a></li>
      <li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="__PUBLIC__/images/icons/comment_48.png" alt="icon"><br>
        管理新闻信息  </span></a></li>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>即将到期商户</h3>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <table>
            <thead>
              <tr>
                <th>商户名称</th>
                <th>商户级别</th>
                <th>所在市场</th>
                <th>截至日期</th>
                <th>操作</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="5">
                  
                  <div class="pagination"> <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a> <a href="#" class="number" title="1">1</a> <a href="#" class="number" title="2">2</a> <a href="#" class="number current" title="3">3</a> <a href="#" class="number" title="4">4</a> <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a> </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
              <tr>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="续费"><img src="__PUBLIC__/images/icons/pencil.png" alt="续费"></a> <a href="#" title="删除"><img src="__PUBLIC__/images/icons/cross.png" alt="删除"></a> </td>
              </tr>
              <tr>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="续费"><img src="__PUBLIC__/images/icons/pencil.png" alt="续费"></a> <a href="#" title="删除"><img src="__PUBLIC__/images/icons/cross.png" alt="删除"></a> </td>
              </tr>
              <tr>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="续费"><img src="__PUBLIC__/images/icons/pencil.png" alt="续费"></a> <a href="#" title="删除"><img src="__PUBLIC__/images/icons/cross.png" alt="删除"></a> </td>
              </tr>
              <tr>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="续费"><img src="__PUBLIC__/images/icons/pencil.png" alt="续费"></a> <a href="#" title="删除"><img src="__PUBLIC__/images/icons/cross.png" alt="删除"></a> </td>
              </tr>
              <tr>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="续费"><img src="__PUBLIC__/images/icons/pencil.png" alt="续费"></a> <a href="#" title="删除"><img src="__PUBLIC__/images/icons/cross.png" alt="删除"></a> </td>
              </tr>
              <tr>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="续费"><img src="__PUBLIC__/images/icons/pencil.png" alt="续费"></a> <a href="#" title="删除"><img src="__PUBLIC__/images/icons/cross.png" alt="删除"></a> </td>
              </tr>
              <tr>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="续费"><img src="__PUBLIC__/images/icons/pencil.png" alt="续费"></a> <a href="#" title="删除"><img src="__PUBLIC__/images/icons/cross.png" alt="删除"></a> </td>
              </tr>
              <tr>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="续费"><img src="__PUBLIC__/images/icons/pencil.png" alt="续费"></a> <a href="#" title="删除"><img src="__PUBLIC__/images/icons/cross.png" alt="删除"></a> </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- End #tab1 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="content-box column-left">
      <div class="content-box-header">
        <h3>即将到期广告位</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>Maecenas dignissim</h4>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo. </p>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="content-box column-right">
      <div class="content-box-header">
        <!-- Add the class "closed" to the Content box header to have it closed by default -->
        <h3>最新新闻内容</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>This box is closed by default</h4>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo. </p>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="clear"></div>
    <!-- End #footer -->
    </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>