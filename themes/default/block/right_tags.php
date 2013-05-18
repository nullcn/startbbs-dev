<div class='box'>
<div class='box-header'>
最新标签
</div>
<div class='inner'>
<?php if($taglist){?>
<ul class="inline">
<?php foreach($taglist as $v){?>
	<li class="tags"><a href="<?php echo site_url('tag/index/'.$v['tag_title']);?>"><?php echo $v['tag_title'];?></a></li>
<?}?>
</ul>
<?}?>
</div>
</div>