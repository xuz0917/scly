<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/prolist.css"/>
<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/global.css"/>
</head>

<body>
<!--top begin-->
<div class="top">
	<div class="top_L">
		<iframe src="__APP__/index.php/Index/tplist" frameborder="0" height="590"></iframe>
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

<div class="top1">
    <div class="logo">
        <img src="__PUBLIC__/images/c_logo.jpg" width="160" height="79" />
    </div>
    <div class="search">
    <form action="__APP__/search" method="get">
        <input name="keywords" type="text" placeholder="请输入公司名称或产品"/>
        <button type="submit"> </button>
    </form>
    </div>
	<div style="clear:both;"></div>
</div>
<div class="shichang">
    <div class="shichangm">
        市场：<strong>全部</strong>
        
        <?php if(is_array($shichang)): $i = 0; $__LIST__ = $shichang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voshichang): $mod = ($i % 2 );++$i;?><a href="__APP__/search?sc=<?php echo ($voshichang["id"]); ?>"><?php echo ($voshichang["name"]); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
        
    </div>
    <div class="search">
    <form action="__APP__/search" method="get">
        <input name="keywords" type="text" placeholder="请输入公司名称或产品"/>
        <button type="submit">搜 索</button>
    </form>
    </div>
    <div style="clear:both"></div>
</div>
<div class="lunbo">
	<a href="#"><img src="__PUBLIC__/images/lunbo.jpg" width="968" height="180" /></a>
</div>
<div class="main">
	<div class="main_l">
		<div class="sidebar">
  <h1><span class="color">商品分类</span></h1>
    <ul>
    <?php foreach($hangye as $value){ ?>
    <li>
    	<a href="__APP__/search?hy=<?php echo $value['region_id'] ?>">
    		<i class="fa fa-user push"></i>
    		<?php echo $value['region_name']; ?>
    		<i class="fa fa-angle-right"></i>
    	</a>
    	<span class="hover"></span>
		<ul class="sub-menu">
	    	<?php foreach($value['son'] as $sonvalue){ ?>
		     <li>
             	<a href="__APP__/search?hy=<?php echo $sonvalue['region_id'] ?>">
                	<?php echo $sonvalue['region_name']; ?>
                    <i class="fa fa-angle-right"></i>
                </a>
                <span class="hover"></span>
             </li>
		    <?php } ?>
		</ul>
    </li>
    <?php } ?>
    
  </ul>
</div>
    </div>
	<div class="main_r">
    	<div class="main_r_t"></div>
    	<div class="main_r_f">
        	<ul>
            	<?php if(is_array($company)): $i = 0; $__LIST__ = $company;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vocompany): $mod = ($i % 2 );++$i;?><li>
                	<a href="__APP__/company-<?php echo ($vocompany["id"]); ?>" target="_blank">
                    	<table border="0" cellpadding="0" cellspacing="0" class="table">
                        	<tr>
                            	<td width="44"><img src="<?php echo ($vocompany["logo"]); ?>" /></td>
                            	<td width="300">
                                	<table border="0" cellpadding="0" cellspacing="0" class="table1">
                                    	<tr>
                                    	  <td width="13">&nbsp;</td>
                                        	<td width="249"><h1><?php echo ($vocompany["companyname"]); ?> <img src="__PUBLIC__/images/star<?php echo ($vocompany["star"]); ?>.jpg" /></h1> </td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                        	<td>市场：<span style="color:#33f"><?php echo ($vocompany["shichangname"]); ?></span>&nbsp;会员年份：<span style="color:#F00; font-weight:bold">第<?php echo ($vocompany["comyear"]); ?>年</span></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                        	<td>主营：<?php echo ($vocompany["zhuying"]); ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div style="clear:both"></div>
</div>
<div class="page">
   <?php echo ($page); ?>
</div>
<!--foot begin-->
<div class="foot">
	<a href="#" target="_blank" rel="nofollow">关于我们</a>  <a href="#" target="_blank" rel="nofollow">广告服务</a>  <a href="#" target="_blank" rel="nofollow">商铺入住</a>  <a href="#" target="_blank" rel="nofollow">联系我们</a>    版权所有  ©  shangchengly.com 商城临沂
</div>
<!--foot end-->
  <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
  <script src="__PUBLIC__/js/left.js" type="text/javascript"></script>
</body>
</html>