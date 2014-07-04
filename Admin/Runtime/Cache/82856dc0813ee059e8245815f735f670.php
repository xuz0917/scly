<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台登陆</title>

<link rel="stylesheet" href="__PUBLIC__/css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/invalid.css" type="text/css" media="screen">
<script type="text/javascript" src="__PUBLIC__/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/facebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/jquery.wysiwyg.js"></script>
</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <h1>商城临沂后台管理</h1>
    <!-- Logo (221px width) -->
    <a href="#"><img id="logo" src="__PUBLIC__/images/logo.png" alt="Simpla Admin logo"></a> </div>
  <!-- End #logn-top -->
  <div id="login-content">
    <form action="__URL__/checkLogin/" method="post">
      <p>
        <label>用户名 ：</label>
        <input class="text-input" name="uname" type="text">
      </p>
      <div class="clear"></div>
      <p>
        <label>密码 ：</label>
        <input class="text-input" name="upass" type="password">
      </p>
      <div class="clear"></div>
      <p>
        <input class="button" type="submit" value="登陆">
      </p>
    </form>
  </div>
  <!-- End #login-content -->
</div>
<!-- End #login-wrapper -->
</body>
</html>