<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/index.css"/>
<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/global.css"/>
</head>

<body>

<!--top begin-->
<div class="top">
	<div class="top_L">
		<iframe src="__APP__/index.php/Index/tplist" frameborder="0" allowTransparency="true" height="590"></iframe>
	</div>
    <div class="top_R">
    	<a href="#" target="_blank">商城临沂</a> |
    	<a href="#" target="_blank">新闻资讯</a> |
    	<a href="#" target="_blank">商铺入住</a> |
    	<a href="#" target="_blank">加入收藏</a> |
    	<a href="#" target="_blank">设为首页</a> |
    	<a href="#" target="_blank">联系我们</a>
    </div>
</div>
<!--top end-->


<div class="logo">
	<img src="__PUBLIC__/images/logo.jpg" width="426" height="212" />
</div>
<div class="search">
	<form action="__APP__/search" method="get">
    <input name="keywords" type="text" placeholder="请输入公司名称或产品"/>
    <button type="submit"> </button>
    </form>
</div>
<div style="clear:both;"></div>
<div class="shichang">批发市场>></div>
<div class="shichangm">
	<?php if(is_array($shichang)): $i = 0; $__LIST__ = $shichang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voshichang): $mod = ($i % 2 );++$i;?><a href="__APP__/search?sc=<?php echo ($voshichang["name"]); ?>" target="_blank"><?php echo ($voshichang["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    <div style="clear:both"></div>
</div>

<!--foot begin-->
<div class="foot">
	<a href="#" target="_blank" rel="nofollow">关于我们</a>  <a href="#" target="_blank" rel="nofollow">广告服务</a>  <a href="#" target="_blank" rel="nofollow">商铺入住</a>  <a href="#" target="_blank" rel="nofollow">联系我们</a>    版权所有  ©  shangchengly.com 商城临沂
</div>
<!--foot end-->

</body>
</html>