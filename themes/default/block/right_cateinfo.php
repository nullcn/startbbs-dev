<div class="box">
<div class='box-header'>
<?php echo $cate['cname'];?>
</div>
<div class='inner'>
<?php echo $cate['content'];?>
<div style="margin-top:10px">
<a href="<?php echo site_url('forum/flist/'.$cate['cid']);?>" class="btn btn-small">查看节点</a>
<a href="<?php echo site_url('forum/flist/'.$cate['cid'].'#new_topic')?>" class="btn btn-small btn-success">新建话题</a>
<a href="<?php echo $content['previous']?>" class="btn btn-small">上一贴</a>
<a href="<?php echo $content['next']?>" class="btn btn-small">下一贴</a>
</div>
</div>
</div>