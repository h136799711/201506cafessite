<?php if (!defined('THINK_PATH')) exit();?>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(empty($vo['hidden_value'])): ?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo['id']) == $checkedID): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["title_show"]); ?></option>
	<?php else: ?>
		<option value="<?php echo ($vo["hidden_value"]); ?>" <?php if(($vo['hidden_value']) == $checkedID): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["title_show"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
{__NORUNTIME__}