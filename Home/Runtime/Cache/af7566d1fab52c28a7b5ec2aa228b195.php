<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>公司场景-<?php echo ($company["companyname"]); ?></title>
<meta name="keywords" content="<?php echo ($company["keywords"]); ?>" />
<meta name="description" content="<?php echo ($company["description"]); ?>" />
<link rel="shortcut icon" href="/favicon.ico" />
<link href="__PUBLIC__/company/css/style.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
<div class="topbox">
    <div class="top">
        <div class="logo"><a href="__APP__/company-<?php echo ($company["id"]); ?>"><img src="<?php echo ($company["youshangtu"]); ?>" /></a></div>
        <div class="head">
            <div class="head-b">
            	<div class="tip1">
                    <strong class="font-yanse1">推荐指数：</strong><img src="__PUBLIC__/company/images/star<?php echo ($company["star"]); ?>.jpg" style="vertical-align:middle" /> 
                    <strong class="font-yanse1">会员年份：</strong><strong class="font-yanse1">第<strong class="font-yanse2"><?php echo ($company["comyear"]); ?></strong>年</strong>
                </div>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="nav">
    	<ul>
            <li id="now"><a href="__APP__/company-<?php echo ($company["id"]); ?>">首 页</a></li>
            <li><a href="__APP__/company-jianjie-<?php echo ($company["id"]); ?>">公司简介</a></li>
            <li><a href="__APP__/company-changjing-<?php echo ($company["id"]); ?>">公司场景</a></li>
            <li><a href="__APP__/company-rongyu-<?php echo ($company["id"]); ?>">荣誉资质</a></li>
            <li><a href="__APP__/company-product-<?php echo ($company["id"]); ?>">产品列表</a></li>
            <li><a href="__APP__/company-lianxi-<?php echo ($company["id"]); ?>">联系我们</a></li>
        </ul>
    </div>
    <div style="clear:both"></div>
</div> 

<div id="sw">
  <div class="wp">
    <div id=myjQuery>
      <div id=myjQueryContent>
       <script language='javascript'> 
			linkarr = new Array();
			picarr = new Array();
			textarr = new Array();
			var swf_width=952;
			var swf_height=232;
			//文字颜色|文字位置|文字背景颜色|文字背景透明度|按键文字颜色|按键默认颜色|按键当前颜色|自动播放时间|图片过渡效果|是否显示按钮|打开方式
			var configtg='0xffffff|0|0x3FA61F|5|0xffffff|0xC5DDBC|0x000033|2|3|1|_blank';
			var files = "";
			var links = "";
			var texts = "";
			//这里设置调用标记
			
			picarr[1]  = "<?php echo ($company["banner1"]); ?>";
			picarr[2]  = "<?php echo ($company["banner2"]); ?>";
			
			 
			for(i=1;i<picarr.length;i++){
			if(files=="") files = picarr[i];
			else files += "|"+picarr[i];
			}
			for(i=1;i<linkarr.length;i++){
			if(links=="") links = linkarr[i];
			else links += "|"+linkarr[i];
			}
			for(i=1;i<textarr.length;i++){
			if(texts=="") texts = textarr[i];
			else texts += "|"+textarr[i];
			}
			document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
			document.write('<param name="movie" value="__PUBLIC__/images/bcastr3.swf"><param name="quality" value="high">');
			document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
			document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');
			document.write('<embed src="__PUBLIC__/images/bcastr3.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>'); 
		</script>
      </div>
    </div>
  </div>
</div>
<div class="mainbox0">
    <div class="main">
    	<div class="left">
        	<div class="lm mb15">
            	<div class="lm-t"></div>
            	<div class="lm-m">
                    <div class="lm-bt"><span class="more1"><a href="__APP__/company-lianxi-<?php echo ($company["id"]); ?>" target="_blank"><img src="__PUBLIC__/company/images/more.gif" /></a></span><div class="title"><span class="color1">
                        基本信息</span><span class="color2"> / BASE</span></div></div>
                    <div class="lm-nr">
                    	<h1>临沂天马灯饰</h1>
                        <img src="<?php echo ($company["mastertu"]); ?>" width="229" height="153" /><br /><br />
                        负 责 人：<?php echo ($company["fuzeren"]); ?><br />
						服务监督：<?php echo ($company["supervise"]); ?><br />
                        -----------------------------<br />
                        <a href="__APP__/company-lianxi-<?php echo ($company["id"]); ?>" target="_blank">查看更多>></a>

                    </div>
                </div>
            	<div class="lm-b"></div>
            </div>
        	<div class="cy mb15">
                <div class="left1-t"></div>
                <div class="left1-m">
                    <div class="left1-bt"><div class="title3"><span class="color1">产品列表</span><span class="color2"> / PRODUCTS</span></div>
                    </div>
                    <div class="left1-nr">
                        <ul>
                        	<?php foreach($prolist as $value){ ?>
                            <li style="cursor: pointer;" class="tab-bt"><div class="biaoti"><span class="jian"><?php echo $value['name']; ?></span></div>
                                <ul>
                                    <li class="tab-nr">
                                        <div class="kk">
                                            <ul>
                                            <?php foreach($value['childs'] as $sonvalue){ ?>
                                                 <li><a href="__APP__/company-product-<?php echo ($company["id"]); ?>?id=<?php echo $sonvalue['id']; ?>"><?php echo $sonvalue['name']; ?></a></li>
                                            <?php } ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        	<?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="left1-b"></div>
            </div>
        </div>
        <div class="right">
            
        	<div class="shiting mb15">
            	<div class="shiting-t"></div>
            	<div class="shiting-m">
                    <div class="shiting-bt">
                    	<div class="title"><span class="color1">产品中心</span><span class="color2"> / PRODUCT</span></div>
                    </div>
                    <div class="shiting-nr" id="nrtt1"  style="display:">
                          <ul>
                          	<?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voproduct): $mod = ($i % 2 );++$i;?><li>
	                          		<a href="__APP__/item-<?php echo ($voproduct["id"]); ?>">
			                    	<img src="<?php echo ($voproduct["pic1"]); ?>" width='343' height='205'  />
			                  		<div><?php echo ($voproduct["title"]); ?></div>
			                  	</a>
			                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
                          </ul>
                         
  					</div><div style="clear:both"></div>
                    <div class="page">
                    	<div class="page-zuo">
                        <!--<div class="fenye">-->
                              <?php echo ($page); ?>
                         <!-- </div>-->
                    	 </div>
                    </div>
                    <div style="clear:both"></div>
                     
                </div>
            	<div class="shiting-b"></div>
            </div>   
        </div>
            
    </div>
    <div style="clear:both"></div>
</div>  

<div class="bottombox">
    <div class="bottom">
        <ul>
            <li>
             
             <div class="bottomnav">  
                
                
            	<a href="__APP__/company-<?php echo ($company["id"]); ?>">首 页</a> |
            	<a href="__APP__/company-jianjie-<?php echo ($company["id"]); ?>">公司简介</a> |
            	<a href="__APP__/company-changjing-<?php echo ($company["id"]); ?>">公司场景</a> |
            	<a href="__APP__/company-rongyu-<?php echo ($company["id"]); ?>">荣誉资质</a> |
            	<a href="__APP__/company-product-<?php echo ($company["id"]); ?>">产品列表</a> |
            	<a href="__APP__/company-lianxi-<?php echo ($company["id"]); ?>">联系我们</a>
                
              
                </div>
                
                
                <div class="qixia">
                    <table cellpadding="0" cellspacing="0" border="0" width="400" height="25">
                        <tr>
                            <td width="226" height="25"></td>
                            <td width="174" height="25" align="right">鲁ICP备05009188号</td>
                        </tr>
                    </table>
                    
                </div>  
            </li>
            <li class="hei"><span class="fr">
                <span id="bottom3_Label1"></span>　技术支持：<a  target="_blank"  href="http://www.shangchengly.com/">商城临沂</a></span>Copyright © 2014 shangchengly.com All Rights Reserved.</li>
        </ul>
    </div>
    <div style="clear:both"></div>
</div>
<div style="clear:both"></div> 
</body>
</html>