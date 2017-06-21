<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if(isset($site_title)): echo $site_title; else: ?><?php echo getSetting('site_title');?> - <?php echo getSetting('site_sub_title');?><?php endif; ?></title>
    <meta name="keywords" content="<?php if(isset($site_keywords)){ echo $site_keywords; } ?>" />
    <meta name="description" content="<?php if(isset($site_description)){ echo $site_description; } ?>" />
    <script type="text/javascript" src="<?=S('base','js/jquery.min.js');?>"></script>
    <script src="<?php echo S('base','js/jquery.form.js');?>"></script>
    <script src="<?php echo S('base','dialog/jquery.artDialog.js?skin=modern');?>"></script>
    <script src="<?php echo S('base','dialog/plugins/iframeTools.js');?>"></script>
    <link rel="stylesheet" href="<?=ST('css/user.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?=S('base','webuploader/webuploader.css')?>" type="text/css" />
    <script src="<?php echo S('base','webuploader/webuploader.min.js');?>"></script>
    <script src="<?php echo S('user','js/my.js');?>"></script>
</head>
<body>
<div class="my-header">
    <div class="inner clearfix">
        <div class="head-user">
            <?php if($_G['user']): ?>
            <ul class="main-list">
                <li class="sub-list-trigger"><a class="user-info" href="<?=U('my','index')?>"><img src="<?=app('user')->getAvatar($_G['user'],'small')?>" /><?php echo $_G['user']['nickname'];?></a>
                    <ul class="sub-list">
                        <li><a href="<?=U('my','index')?>">用户中心</a></li>
                        <li><a href="<?=U('my','setting')?>">用户设置</a></li>
                        <li><a href="<?=U('user','login','a=logout')?>">退出</a></li>
                    </ul>
                </li>
                <li><a href="<?=U('album','post')?>" class="publish-btn">发布</a></li>
            </ul>
            <?php else: ?>
            <a href="<?=U('user','login')?>">登录</a> <a href="<?=U('user','register')?>">注册</a>
            <?php endif; ?>
        </div>

        <a class="head-logo" href="<?=U('base','index')?>"><i>用户中心</i><em>返回首页</em></a>
        <div class="head-nav">
            <?php 
            $applist = app('my')->getAppMenus();
            ?>
            <ul class="main-list">
                <li <?php if ('my'==$_G['uri']['app']){echo 'class="active"';}?>><a href="<?php echo U('my','index'); ?>">我的</a></li>
                <?php foreach ($applist as $key => $value): 
                    if($value['ismy']):
                    ?>
                    <li <?php if ($value['id']==$_G['uri']['app']){echo 'class="active"';}?>><a href="<?php echo U($value['id'],'my'); ?>"><?php echo $value['name']; ?></a></li>
                <?php 
                    endif;
                endforeach ?>
            </ul>
        </div>
    </div>
</div>