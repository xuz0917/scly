<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/global.css"/>
</head>

<body>
<div class="category category-status-close" id="category-container">
    <h3 class="category-title">所有商品分类</h3>
    <div class="category-content">
    
    <?php foreach($hangye as $value){ ?>
    
    <div class="category-item">
        <div class="category-item-one">
            <em></em>
                <span><a href="__APP__/search?hy=<?php echo $value['region_id'] ?>" target="_blank"><?php echo $value['region_name']; ?></a></span>
        </div>
        <div class="category-item-two" style="top: -10px;">
            <div class="category-list" data-key="subCatList">
                <div class="category-item-list">
                    <h4 class="title1 " style="background:#eca1a1">
                        <a href="__APP__/search?hy=<?php echo $value['region_id'] ?>" target="_blank"><?php echo $value['region_name']; ?></a>
                    </h4>
                    <div class="category-item-small">
                    <?php foreach($value['son'] as $sonvalue){ ?>
                        <a class="" target="_blank" href="__APP__/search?hy=<?php echo $sonvalue['region_id'] ?>"><?php echo $sonvalue['region_name']; ?></a>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    
    </div>
</div>
            
	<script src="__PUBLIC__/js/global.js" type="text/javascript"></script>	
</body>
</html>