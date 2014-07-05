<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>产品分类</title>
<link rel="stylesheet" href="__PUBLIC__/css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="__PUBLIC__/css/invalid.css" type="text/css" media="screen">
<script type="text/javascript" src="__PUBLIC__/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/simpla.jquery.configuration.js"></script>
<body onload="region_default();">
<script type="text/javascript">
  //设置默认,页面加载时恢复默认选项。
function region_default() {
    $("option[value='-1']").attr('selected','selected');
  }
  function setregion(num,address_id) {
     var next=num+1;
     $.ajax({
        type:'POST',
        //设置json格式,接收返回数组。
        dataType:'json',
        url:'__APP__/fenlei/get_region/',
        //ajax传递当前选项的value值,也就是当前的region_id。
        data:'region_id='+$('#region_'+num+'_'+address_id).val(),
        success:function(msg) {
        //如果返回值不为空则执行。
if (msg!=null) {
            var option_str='';
            //循环书写下一个select中要添加的内容。并添加name标记。
for (var i=0; i<msg.length; i++) {
                 option_str+='<option name="region_'+next+'"value="'+msg[i].region_id+'">'+msg[i].region_name+'</option>';
            }
            //删除下一个select中标记name为next的内容。
            $("option[name='region_"+next+"']").remove();
            //向下一个select中添加书写好的内容。
            $('#region_'+next+'_'+address_id).append(option_str);
           }else{
                //如果返回值为空,则移除所有带标记的option,恢复默认选项。
for (var i=next; i<=4; i++) {
                 $("option[name='region_"+i+"']").remove();   
                }
           }
        }
     
     })
  }
  
</script>

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
    	<p id="page-intro">产品分类>>
        <hr>
        </p>
        <table border="1" cellpadding="1" cellspacing="0">
            <tr align="center">
                <td width="10%">ID</td><td>名称</td><td width="10%">所属商户</td><td width="10%">操作</td>
            </tr>
            
            
            <?php for ($i = 0; $i < count($tree); $i++) { echo "<tr><td>".$tree[$i]['id']."</td><td>".$tree[$i]['name'].'</td><td>'.$tree[$i]['companyname'].'</td><td><a href="__APP__/product/prolistedit/id/'.$tree[$i]['id'].'" target="_blank">修改</a> | <a href="__APP__/product/prolistdel/id/'.$tree[$i]['id'].'" target="_blank">删除</a></td></tr>'; if ($tree[$i]['childs']>0) { for ($j = 0; $j < count($tree[$i]['childs']); $j++) { echo "<tr><td>".$tree[$i]['childs'][$j]['id']."</td><td>┗━".$tree[$i]['childs'][$j]['name'].'</td><td>'.$tree[$i]['childs'][$j]['companyname'].'</td><td><a href="__APP__/product/prolistedit/id/'.$tree[$i]['childs'][$j]['id'].'" target="_blank">修改</a> | <a href="__APP__/product/prolistdel/id/'.$tree[$i]['childs'][$j]['id'].'" target="_blank">删除</a></td></tr>'; } } } ?>
        </table>
    </div>
</div>
</body>
</html>