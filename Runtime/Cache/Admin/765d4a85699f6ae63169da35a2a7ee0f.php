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
<link rel="stylesheet" type="text/css" href="/github/201506cafessite/Public/Admin/css/common.css?v=1433214062" />
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/common/common.js?v=1433214062"></script>




		<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/theme/fix_<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>.css" />
		
		
	
	<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/select2/4.0.0/css/select2.min.css" />
	<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/select2/4.0.0/css/cosmo-skin.css" />
	
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
			<div class="well clearfix">
				<form class="form form-inline">
					<div class="col-lg-12 col-md-12">
						<label for="ss_keyword" class="control-label">首次关注时响应关键词：</label>
						<select id="ss_keyword" name="ss_keyword" data-href="<?php echo U('Admin/Wxaccount/saveFirstResp');?>" class="sle_ajax_post form-control input-normal select2">
								<option value="">=请选择=</option>
								<?php if(is_array($keywords)): $i = 0; $__LIST__ = $keywords;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["keyword"]); ?>" <?php if( $wxaccount['ss_keyword'] == $vo['keyword'] ): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["keyword"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					
						<div class="help-block">当前关键词：<?php echo ($wxaccount["ss_keyword"]); ?></div>
					</div>
				</form>
			</div>
			<ul class="nav nav-tabs" role="tablist" id="configTab">
				<li role="presentation" class="active">
					<a href="#tab1" role="tab" data-toggle="tab">文本回复</a>
				</li>
				<li role="presentation" class="">
					<a href="<?php echo U('Admin/WxreplyNews/index');?>" role="tab" >图文回复</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content ">
				<div role="tabpanel" class="tab-pane fade clearfix active in" id="tab1">
					<div class="controls">
						<a class="btn btn-primary btn-sm" href="<?php echo U('Admin/WxreplyText/add');?>"><i class="fa fa-plus"></i>新增</a>
						<a href="<?php echo U('Admin/WxreplyText/bulkDelete');?>" class="confirm ajax-post btn btn-danger btn-sm" target-form="selectitem"><i class="fa fa-trash"></i>删除</a>
					</div>

					<table class="table table-striped table table-hover  table-condensed">
						<thead>
							<tr>
								<th>
									<input type="checkbox" class="selectall" onclick="myUtils.selectall(this,'.selectitem');" /><?php echo L('SELECT_ALL');?> 
								</th>
								<th>
									关键词
								</th>
								<th>
									内容
								</th>
								<th>
									更新时间
								</th>
								<th>
									<?php echo L('OPERATOR');?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="ids[]" class="selectitem" /></td>
									<td><?php echo ($vo["keyword"]); ?></td>
									<td><?php echo ($vo["content"]); ?></td>
									<td><?php echo (date("y-m-d",$vo["updatetime"])); ?></td>
									<td>
										<a href="<?php echo U('Admin/WxreplyText/edit',array('id'=>$vo['id']));?>" class="btn btn-sm btn-primary"><i class="fa fa-trash"></i>编辑</a>										
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
					<div><?php echo ($show); ?></div>
				</div>
				<div role="tabpanel" class="tab-pane fade clearfix" id="tab1">
					图文回复
				</div>
			</div>
		</div>
		<!-- END admin-main-content -->
	</div>
	<!-- END admin-main-->

		

	<script src="/github/201506cafessite/Public/cdn/select2/4.0.0/js/select2.min.js"></script>
	<script src="/github/201506cafessite/Public/cdn/select2/4.0.0/js/i18n/zh-CN.js"></script>
	<!--<script src="/github/201506cafessite/Public/cdn/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>-->
	<script>
		$(function() {
			
			$(".select2").select2({
				language:"zh-CN"
			});
		});
	</script>

		<div class="admin-footer well text-center">
			<p><?php echo C('WEBSITE_OWNER');?> <a href="http://www.miitbeian.gov.cn"><?php echo C('WEBSITE_ICP');?></a></p>
			<p>&copy;2013-<?php echo date('Y');?> Version <?php echo C('APP_VERSION');?></p>
			<p>{__RUNTIME__}</p>
		</div>
		
	</body>

</html>