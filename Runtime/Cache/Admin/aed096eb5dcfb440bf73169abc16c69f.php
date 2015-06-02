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
<link rel="stylesheet" type="text/css" href="/github/201506cafessite/Public/Admin/css/common.css?v=1433210936" />
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/common/common.js?v=1433210936"></script>




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
			<div class="table-responsive well">
				<!-- 操作按钮 -->
				<div class="btn-controls">
					<a class="btn btn-sm  btn-primary" href="<?php echo U('Admin/AuthGroup/add');?>"><i class="fa fa-plus"></i><?php echo L('BTN_ADD');?></a>
					<a target-form="selectitem" class="ajax-post btn btn-sm  btn-primary" href="<?php echo U('Admin/AuthGroup/enable');?>"><i class="fa fa-check-circle"></i><?php echo L('BTN_ENABLE');?></a>
					<a target-form="selectitem" class="ajax-post btn btn-sm  btn-primary" href="<?php echo U('Admin/AuthGroup/disable');?>"><i class="fa fa-minus-circle"></i><?php echo L('BTN_DISABLE');?></a>
				</div>
				<!-- 过滤\查询按钮 -->
				<div class="filter-controls">
					
				</div>

				<table class="table table-striped table table-hover  table-condensed">
					<thead>
						<tr>
							<th>								
								<input type="checkbox" class="selectall" onclick="myUtils.selectall(this,'.selectitem');" />
								<?php echo L('V_AUTHMANAGE_AUTH_GROUP_TITLE');?>
							</th>
							<th>
								<?php echo L('V_AUTHMANAGE_AUTH_GROUP_NOTES');?>
							</th>							
							<th>
								<?php echo L('V_AUTHMANAGE_GRANT_AUTHORIZATION');?>
							</th>
							<th>
								<?php echo L('STATUS');?>
							</th>
							<th>
								<?php echo L('OPERATOR');?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php if(empty($list)): ?><tr>
								<td colspan="5" class="text-center"><?php echo L('NO_DATA');?></td>
							</tr>
						<?php else: ?>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td>
									<input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="ids[]" class="selectitem" /><a href="<?php echo U('Admin/AuthGroup/edit',array('id'=>$vo['id']));?>" ><?php echo ($vo["title"]); ?></a></td>
								<td><?php echo ($vo["notes"]); ?></td>
								<td><a href="<?php echo U('Admin/AuthManage/access',array('groupid'=>$vo['id']));?>" class="btn btn-sm btn-primary"><?php echo L('BTN_NODE_GRANT_AUTHORITY');?></a>
									<a href="<?php echo U('Admin/AuthManage/user',array('groupid'=>$vo['id']));?>" class="btn btn-sm  btn-primary"><?php echo L('BTN_MEMBER_GRANT_AUTHORITY');?></a> 
									<!--<a href="<?php echo U('Admin/AuthManage/apiaccess');?>" class="btn btn-sm  btn-primary">API授权</a>-->
								</td>
								<td><?php echo (getStatus($vo["status"])); ?></td>
								<td>
									<a href="<?php echo U(CONTROLLER_NAME .'/enable',array('id'=>$vo['id']));?>" class="btn btn-default btn-sm"><i class="fa fa-check-circle"></i><?php echo L('BTN_ENABLE');?></a>
									<a href="<?php echo U(CONTROLLER_NAME .'/disable',array('id'=>$vo['id']));?>" class="btn btn-default btn-sm"><i class="fa fa-minus-circle"></i><?php echo L('BTN_DISABLE');?></a>
									<a href="<?php echo U(CONTROLLER_NAME .'/delete',array('id'=>$vo['id']));?>" class="btn btn-danger btn-sm ajax-get confirm"><i class="fa fa-trash-o"></i> <?php echo L('BTN_DELETE');?></a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</tbody>
				</table>
				<div><?php echo ($show); ?></div>
			</div>
			
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