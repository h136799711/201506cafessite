<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

	<head>
		<meta charset="utf-8">
		<title><?php echo ((isset($seo["title"]) && ($seo["title"] !== ""))?($seo["title"]):L('TITLE')); ?>-<?php echo C('WEBSITE_TITLE');?></title>
		<meta name="viewport" content="target-densitydpi=device-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="keywords" content="<?php echo ((isset($seo["keywords"]) && ($seo["keywords"] !== ""))?($seo["keywords"]):" "); ?>" />
		<meta name="description" content="<?php echo ((isset($seo["description"]) && ($seo["description"] !== ""))?($seo["description"]):" "); ?>" />
		<meta name="author" content="<?php echo ((isset($cfg["owner"]) && ($cfg["owner"] !== ""))?($cfg["owner"]):" itboye "); ?>" />
		<!-- 系统基本样式 -->
		<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/bootstrap/3.3.0/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/fontawesome/4.3.0/css/font-awesome.min.css?V=4.3.0" />
		<!-- 自定义主题 -->
		<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/theme/<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>.min.css" />
		
		<!-- 脚本 -->
		<script type="text/javascript" src="/github/201506cafessite/Public/cdn/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="/github/201506cafessite/Public/cdn/bootstrap/3.3.0/js/bootstrap.min.js"></script>

		
<!-- nprogress plugin -->
<link rel="stylesheet" type="text/css" href="/github/201506cafessite/Public/cdn/nprogress/nprogress.css" />
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/nprogress/nprogress.js"></script>
<!-- scojs plugin -->
<link rel="stylesheet" type="text/css" href="/github/201506cafessite/Public/cdn/sco1.0.2-8/css/scojs.css" />
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/sco1.0.2-8/js/sco.modal.js"></script>
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/sco1.0.2-8/js/sco.confirm.js"></script>
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/sco1.0.2-8/js/sco.message.js"></script>
<!-- 自定义模块通用样式 -->
<link rel="stylesheet" type="text/css" href="/github/201506cafessite/Public/Admin/css/common.css?v=1433212830" />
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/common/common.js?v=1433212830"></script>




		<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/theme/fix_<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>.css" />
		
		

	
		<!--[if lt IE 9]>
		<script type="text/javascript" src="/github/201506cafessite/Public/cdn/respond/1.4.2/respond.min.js"></script>
		<![endif]--> 
		
	</head>

	<body class="theme-<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>">
		
		
	<?php echo W('Menus/topbar');?>
	<div class="admin-main container-fluid">
		<?php echo W('Menus/left');?>
		<div class="admin-main-content">
			<?php echo W('Menus/breadcrumb');?>
			<div class="controls">
				
						<a class="btn btn-primary btn-sm" href="<?php echo U('Admin/Wxmenu/add');?>"><i class="fa fa-plus"></i>新增</a>
						<a href="<?php echo U('Admin/Wxmenu/bulkDelete');?>" class="confirm ajax-post btn btn-danger btn-sm" target-form="selectitem"><i class="fa fa-trash"></i>删除</a>
						<a href="<?php echo U('Admin/Wxmenu/sendToWXServer');?>" class="ajax-post btn btn-primary" target-form="selectitem"><i class="fa fa-send"></i>创建菜单到微信平台</a>
						<a href="<?php echo U('Admin/Wxmenu/deleteMenu');?>" class="ajax-post btn btn-danger" target-form="selectitem"><i class="fa fa-trash"></i>删除菜单从微信平台</a>
					</div>
					
					<table class="table table-striped table table-hover  table-condensed">
						<thead>
							<tr>
								<th >
									<input type="checkbox" class="selectall" onclick="myUtils.selectall(this,'.selectitem');" /><?php echo L('SELECT_ALL');?> 
								</th>
								<th>
									菜单名称
								</th>
								<th>
									关键词
								</th>
								<th class="text-wordbreak" >
									外链URL
								</th>
								<th>
									排序
								</th>
								<th>
									是否主菜单
								</th>
								<th>
									<?php echo L('OPERATOR');?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="ids[]" class="selectitem" /></td>
									<td><?php echo ($vo["name"]); ?></td>
									<td><?php echo ($vo["menukey"]); ?></td>
									<td class="text-wordbreak" style="max-width:320px;"><?php echo ($vo["url"]); ?></td>
									<td><?php echo ($vo["sort"]); ?></td>
									<td><?php echo ($vo['pid'] == 0?"是":"否"); ?></td>
									<td>
										<a href="<?php echo U('Admin/Wxmenu/edit',array('id'=>$vo['id']));?>" class="btn btn-sm btn-primary"><i class="fa fa-trash"></i>编辑</a>										
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
					<div><?php echo ($show); ?></div>
		</div>
		<!-- END admin-main-content -->
	</div>
		<!-- END admin-main-->

		


		<div class="admin-footer well text-center">
			<p><?php echo C('WEBSITE_OWNER');?> <a href="http://www.miitbeian.gov.cn"><?php echo C('WEBSITE_ICP');?></a></p>
			<p>&copy;2013-<?php echo date('Y');?> Version <?php echo C('APP_VERSION');?></p>
			<p>{__RUNTIME__}</p>
		</div>
		
	</body>

</html>