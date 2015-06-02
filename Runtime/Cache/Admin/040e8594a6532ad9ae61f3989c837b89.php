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
<link rel="stylesheet" type="text/css" href="/github/201506cafessite/Public/Admin/css/common.css?v=1433212968" />
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/common/common.js?v=1433212968"></script>




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
			<!-- 带验证 form -->
			<form class="form-horizontal well validateForm">
				<fieldset>
					<legend>
						微信文本回复添加表单</legend>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">关键词</label>
						<div class="col-md-10 col-lg-10">
							<input type="text" class="required form-control input-short" name="keyword" id="inputtitle" placeholder="<?php echo L('PLACEHOLDER_TITLE');?>">
							<div class="help-block">(关键词)</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">响应文本</label>
						<div class="col-md-10 col-lg-10">
							<textarea rows="5" class="required form-control" name="content" id="content" placeholder="请输入响应文本"></textarea>
							<div class="help-block">(例子：欢迎使用博也公众号&lt;a href="http://baidu.com"&gt;跳转到百度&lt;/a&gt;)注意： a跟&gt;之间不能有空格</div>
						</div>
					</div>
					<div class="form-group">
						<label for="btns" class="col-md-2 col-lg-2 control-label">&nbsp;</label>
						<div class="col-lg-10 col-md-10">
							<a target-form="validateForm" class="ajax-post btn btn-primary" href="<?php echo U('Admin/'.CONTROLLER_NAME.'/add');?>" autofocus="autofocus"><i class="fa fa-save"></i> <?php echo L('BTN_SAVE');?></a>
							<a class="btn btn-default" href="<?php echo U('Admin/'.CONTROLLER_NAME.'/index');?>"><i class="fa fa-times-circle"></i> <?php echo L('BTN_CANCEL');?></a>
						</div>
					</div>
				</fieldset>
			</form>
			<!-- form -->
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