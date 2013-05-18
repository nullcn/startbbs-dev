<!DOCTYPE html><html><head><meta content='' name='description'>
<meta charset='UTF-8'>
<meta content='True' name='HandheldFriendly'>
<meta content='width=device-width, initial-scale=1.0' name='viewport'>
<title><?php echo $title?> - <?php echo $settings['site_name']?></title>
<?php $this->load->view ('header-meta');?>
</head>

<body id="startbbs">
<a id="top" name="top"></a>
<?php $this->load->view ('header'); ?>

<div id="wrap">
<div class="container" id="page-main">
<div class="row-fluid">
<div class='span8'>

<div class='box'>
<div class='cell'>
<a href="/" class="rabel"><?php echo $settings['site_name']?></a> <span class="chevron">&nbsp;›&nbsp;</span> <?php echo $title?>
</div>
<div class='inner'>
<span class="alert-block">
<?php echo $msg;?>
</span>
</div>
</div>

</div>
<div class='span4' id='Rightbar'>
<?php $this->load->view('block/right_login');?>

<?php $this->load->view('block/right_ad');?>




</div>
</div></div></div>
<?php $this->load->view ('footer'); ?>