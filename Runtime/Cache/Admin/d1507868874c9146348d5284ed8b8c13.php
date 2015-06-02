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
<link rel="stylesheet" type="text/css" href="/github/201506cafessite/Public/Admin/css/common.css?v=1433210864" />
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/common/common.js?v=1433210864"></script>




		<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/theme/fix_<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>.css" />
		
		

	<link rel="stylesheet" type="text/css" media="all" href="/github/201506cafessite/Public/cdn/jquery-datetimepicker/jquery.datetimepicker.css">
	<script type="text/javascript" src="/github/201506cafessite/Public/cdn/jquery-datetimepicker/jquery.datetimepicker.js"></script>
	
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
			<!-- 过滤\查询按钮 -->
				<div class="filter-controls">
					<!-- 日期查询 -->
					<form action="<?php echo U('Admin/OrgMember/index');?>" method="post" class="form-inline">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									成员昵称
								</div>
								<input type="text" name="name" id="OrgMember" class="form-control input-short" value="<?php echo ($name); ?>" />
							</div>
						</div>
						<button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i><?php echo L('BTN_SEARCH');?></button>
					</form>
				</div>
				<!-- 操作按钮 -->
				<div class="btn-controls">
					<a class="btn btn-primary btn-sm" href="<?php echo U('Admin/OrgMember/add',array('orgid'=>$orgid,'orgparent'=>$orgparent));?>"><i class="fa fa-plus"></i><?php echo L('BTN_ADD');?></a>	
					<a class="btn btn-default btn-sm" href="<?php echo U('Admin/Organization/index',array('parent'=>$orgparent));?>"><i class="fa fa-reply"></i>返回</a>					
				</div>
				<table class="table table-striped table table-hover  table-condensed">
					<thead>
						<tr>
							<th>
								<input type="checkbox" class="selectall" onclick="myUtils.selectall(this,'.selectitem');" />
							</th>
							<th>
								用户昵称
							</th>
							<th>
								操作
							</th>
						</tr>
					</thead>
					<tbody>
						<?php if(empty($list)): ?><tr>
								<td colspan="4" class="text-center"><?php echo L('NO_DATA');?></td>
							</tr>
							<?php else: ?>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td>
										<input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="ids[]" class="selectitem" /></td>
									<td>
										<a href="<?php echo U('Admin/Member/view',array('id'=>$vo['member_id'],'orgid'=>$vo['orgid'],'orgparent'=>$orgparent));?>"><?php echo ($vo["member_nickname"]); ?></a>
									</td>
									<td>
										<a href="<?php echo U('Admin/OrgMember/delete',array('mid'=>$vo['member_id'],'orgid'=>$vo['orgid']));?>" class="ajax-get confirm btn btn-sm btn-danger"><i class="fa fa-edit"></i>移出[<?php echo ($vo['orgname']); ?>]</a>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</tbody>
				</table>
				<div><?php echo ($show); ?></div>
			</div>

			<script type="text/javascript">
				$(function() {
				});
			</script>
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