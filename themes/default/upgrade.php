<!DOCTYPE html>
<html>
<head>
<meta content='' name='description'>
<meta charset='UTF-8'>
<meta content='True' name='HandheldFriendly'>
<meta content='width=device-width, initial-scale=1.0' name='viewport'>
<title>升级 - 管理后台 - Startbbs开源轻量社区系统</title>
<?php $this->load->view ( 'header-meta' ); ?>
<script type="text/javascript">
$(document).ready(function() {
	$("#do_upgrade").click(function(){
    $.ajax({
		type:"GET",
		url:"<?php echo site_url()?>/upgrade/do_upgrade",
		dataType: "json",
		success: function(data){
				var msg=data.success;
				$("#result_1").append(data.msg_1).fadeIn(2000);
				$("#result_2").append(data.msg_2).fadeIn(3000);
				$("#result_v").append(data.msg_v).fadeIn(4000);
				//$("#result_del").append(data.msg_del).fadeIn(5000);
				$("#result_error").append(data.msg_error).fadeIn(6000);
				$("#done").append(data.msg_done).fadeIn(7000);
				$("#do_upgrade").fadeOut(8000);
				$("#home").fadeIn(9000);
		}
	})
});
});
</script>
</head>
<body id="startbbs">
<div class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<a class="btn btn-navbar collapsed" data-target=".nav-collapse" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a><a href="/" class="brand">StartBBS</a>
<div class="nav-collapse collapse">
<form class="navbar-search pull-left">
<input class="search-query" data-domain="startbbs.com" id="q" maxlength="40" name="q" placeholder="搜索话题" type="text" />
</form>
<ul class="nav pull-right">
<li class=""><a href="http://www.startbbs.com">Startbbs官方</a></li>
</ul>
</div></div></div></div>


<div id="wrap">
<div class="container" id="page-main">
<div class="row">


<div class='col-xs-12 col-sm-12 col-md-12'>

<div class='row'>
<div class='box col-md-12'>
<div class='cell'>
欢迎进入startbbs社区升级系统
</div>
<div class='inner'>
<span>当前版本：<?php echo $old_version;?> 最新版本：<?php echo $new_version;?></span>
<dl>
<dt><?php echo $msg;?></dt>
<dd></dd>
</dl>
</div>
</div>
</div>
<?php if($new_version!=$old_version){?>
<form action="<?php echo site_url('install/step');?>" class="form-horizontal" method="post" id="dbform">
<div class='row'>
<div class='box col-md-12'>
<div class='cell'>
系统升级 <?php echo $old_version;?> - <?php echo $new_version;?>
</div>
<div class='inner'>
<div class='form-group'>
    <dl class="dl-horizontal">
    <dt>升级数据库:<?php echo $this->db->database;?></dt>
    <dd id="result_1" style="display:none" class="green"></dd>
    <dt></dt>
    <dd id="result_2" style="display:none" class="green"></dd>
    <dt></dt>
    <dd id="result_v" style="display:none" class="green"></dd>
    <!--<dt></dt>
    <dd id="result_del" style="display:none" class="green"></dd>-->
    <dt></dt>
    <dd id="result_error" style="display:none" class="red"></dd>
    <dt></dt>
    <dd id="done" style="display:none" class="red"></dd>
    </dl>
</div>
<div class='form-actions'>
<a id="do_upgrade" class="left btn btn-white btn-primary"><span>开始升级</span></a>

<!--<input id="btnSubmit" class="btn btn-white btn-primary" name="commit" type="submit" value="下一步" />-->
<a href="/" id="home" class="left btn btn-white btn-primary" style="display:none;"><span>进入首页</span></a>
</div>


</div>
</div>
</div>
</form>
<?php }?>
</div>
</div></div></div>
<div id='footer'>
<div class='container' id='footer-main'>
<ul class='page-links'>
<!--<li><a href="/page/about" class="dark nav">StartBBS 简介</a></li>
<li class='snow'>·</li>
<li><a href="/page/support" class="dark nav">技术支持</a></li>-->
</ul>
<div class='copywrite'>
<div class="pull-right"> <!--<a href="" target="_blank"><img src="" border="0" alt="Linode" width="120"></a>--></div>
<p>&copy; 2013 Startbbs Inc, Some rights reserved.</p>
</div>
<small class='text-muted'>
Powered by
<a href="<?php echo $this->config->item('sys_url');?>" class="text-muted" target="_blank"><?php echo $this->config->item('sys_name');?></a>
<?php echo $this->config->item('sys_version');?>
</small>
</div>
</div>
</body></html>