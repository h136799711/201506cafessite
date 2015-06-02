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
<link rel="stylesheet" type="text/css" href="/github/201506cafessite/Public/Admin/css/common.css?v=1433212516" />
<script type="text/javascript" src="/github/201506cafessite/Public/cdn/common/common.js?v=1433212516"></script>




		<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/theme/fix_<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>.css" />
		
		
	<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/comp/wxuploader.css?v=1433212516" />
	<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/jquery-uploadify/3.2.1/uploadify.css" />
	<script type="text/javascript" src="/github/201506cafessite/Public/cdn/jquery-uploadify/3.2.1/jquery.uploadify.min.js"></script>
	
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
			<form class="form-horizontal well wxaccountForm">
				<input type="hidden" name="id" value="<?php echo ($wxaccount["id"]); ?>"  />
				<fieldset>
					<legend>
						公众号资料-编辑</legend>
					<div class="form-group">
						<label for="btns" class="col-md-2 col-lg-2 control-label">&nbsp;</label>
						<div class="col-lg-10 col-md-10">
							<a target-form="wxaccountForm" class="ajax-post btn btn-primary"  onclick="return getData();"  href="<?php echo U('Admin/'.CONTROLLER_NAME.'/store');?>" autofocus="autofocus"><i class="fa fa-save"></i> <?php echo L('BTN_SAVE');?></a>
							<a href="<?php echo U('Admin/Wxaccount/help',array('id'=>$wxaccount['id']));?>" class="btn btn-default">公众号绑定信息</a>
							<!--<a class="btn btn-default" href="<?php echo U('Admin'.CONTROLLER_NAME.'/index');?>"><i class="fa fa-times-circle"></i> <?php echo L('BTN_CANCEL');?></a>-->
						</div>
					</div>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">公众号昵称</label>
						<div class="col-md-10 col-lg-10">
							<input type="text" value="<?php echo ($wxaccount["wxname"]); ?>" class="required form-control input-short" name="wxname" placeholder="请输入公众号昵称">
							<div class="help-block">(公众号昵称)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">微信号</label>
						<div class="col-md-10 col-lg-10">
							<input type="text" value="<?php echo ($wxaccount["weixin"]); ?>"  class="required form-control input-short" name="weixin"placeholder="请输入微信号">
							<div class="help-block">(微信号)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">原始ID</label>
						<div class="col-md-10 col-lg-10">
							<input type="text" value="<?php echo ($wxaccount["wxuid"]); ?>"  class="required form-control input-short" name="wxuid" placeholder="请输入原始ID">
							<div class="help-block">(原始ID)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">二维码地址</label>
						<div class="col-md-10 col-lg-10">
							<input type="hidden" value="" id="qrcode_img" class="required form-control" name="qrcode"  placeholder="请输入二维码地址">
							<!-- 图片选择DOM结构 -->
							<div class="wxuploaderimg clearfix <?php if(!empty($wxaccount["qrcode"])): ?>checked<?php endif; ?>" data-maxitems="1">
								<div class="img-preview clearfix" >
									<?php if(!empty($wxaccount["qrcode"])): ?><div class="pull-left clearfix img-item">
												<img src="<?php echo ($wxaccount["qrcode"]); ?>" />
												<div class="edit_pic_wrp"><a href="javascript:;" class="fa fa-lg fa-trash js_delete"></a></div>
											</div><?php endif; ?>
								</div>
								<div class="add">
									<i class="fa fa-plus"></i>
								</div>
							</div>
							<!-- 图片选择DOM结构 -->
							
							<div class="help-block">(二维码地址)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">头像地址</label>
						<div class="col-md-10 col-lg-10">
							<input type="text" value="<?php echo ($wxaccount["headerpic"]); ?>"  class="required form-control" name="headerpic"  placeholder="请输入头像地址">
							<div class="help-block">(头像地址)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">公众号APPID</label>
						<div class="col-md-10 col-lg-10">
							<input type="text" value="<?php echo ($wxaccount["appid"]); ?>"  class="required form-control input-short" name="appid" placeholder="请输入公众号APPID">
							<div class="help-block">(公众号APPID)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">公众号APPSECRET</label>
						<div class="col-md-10 col-lg-10">
							<input type="text" value="<?php echo ($wxaccount["appsecret"]); ?>"  class="required form-control" name="appsecret" placeholder="请输入公众号APPSECRET">
							<div class="help-block">(公众号APPSECRET)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label">EncodingAESKey</label>
						<div class="col-md-10 col-lg-10">
							<input type="text" readonly="readonly" value="<?php echo ($wxaccount["encodingaeskey"]); ?>"  class="required form-control" name="encodingAESKey" id="encodingAESKey" placeholder="请输入EncodingAESKey">
							 <a href="javascript:createEncodingAESKey();" class="btn btn-primary">重新生成</a> 
							<div class="help-block">(请慎重更改，更改后必须重新配置微信开发者中心中的服务器配置！)</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="btns" class="col-md-2 col-lg-2 control-label">&nbsp;</label>
						<div class="col-lg-10 col-md-10">
							<a target-form="wxaccountForm" class="ajax-post btn btn-primary" onclick="return getData();" href="<?php echo U('Admin/'.CONTROLLER_NAME.'/store');?>" autofocus="autofocus"><i class="fa fa-save"></i> <?php echo L('BTN_SAVE');?></a>
							<!--<a class="btn btn-default" href="<?php echo U('Admin'.CONTROLLER_NAME.'/index');?>"><i class="fa fa-times-circle"></i> <?php echo L('BTN_CANCEL');?></a>-->
						</div>
					</div>
				</fieldset>
			</form>
			<!-- form -->
			<!-- Modal -->
<div class="modal " id="wxuploadimg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">选择图片</h4>
			</div>
			<div class="modal-body clearfix">
				<div class="col-lg-12 col-md-12 form-inline">
						<input type="text" name="q"  class="form-control" placeholder="输入文件名查找" />
						
						<button class="btn btn-sm btn-primary js_search" type="button" ><i class="fa fa-search"></i>查找</button>	
				</div>
				<div class="col-lg-12 col-md-12">
					
					<div class="btns pull-right">
						<a href="javascript:void(0);" id="upload_picture"><i class="fa fa-upload"></i>本地上传</a>
					</div>
					<div class="imgs-container pull-left">
						<div class="loading">
							<img src="/github/201506cafessite/Public/cdn/common/loading.gif" />
						</div>
						<div class="imgs-list clearfix"></div>
						<div class="pager"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="pull-left">已选<span class="js_checked"></span>张,可选<span class="js_total"></span>张</div>
				<button type="button" class="btn btn-primary js_check_img"><i class="fa fa-check"></i>确定</button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i>取消</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	window.wxuploadimg = (function() {
		var pager = {
			index: 0,
			size: 10, //页面数
		};
		var checked = 0;
		var hadBind = false;
		/**
		 * 将数据组合成HTML
		 */
		function appendImgList(list) {
			if (list) {
				$cont = $("#wxuploadimg .imgs-list").empty();
				for (var i = 0; i < list.length; i++) {
					var imgsrc = list[i].imgurl;
					if(!imgsrc){
						imgsrc = '<?php echo C("SITE_URL");?>'+list[i].path;
					}
					$item = $("<div class='img-item '><img class='img-responsive  thumbnail js_img_click' src='" + imgsrc  + "'/><p class='img-desc'>"+list[i].ori_name+"</p></div>");
					$cont.append($item);
					
				}
			}else{
				$("#wxuploadimg .imgs-list").html("没有相关图片信息!");
			}
		}
		
	/**
	 * 处理分页点击事件
	 */
	function pagerClick(){
		
		$("#wxuploadimg .imgs-container").click(function(ev){
//			console.log(ev);
			$target = $(ev.target);
			if($target.hasClass("img-selected")){
				$target.removeClass("img-selected");
				checked--;
				$("#wxuploadimg .js_checked").text(parseInt($("#wxuploadimg .js_checked").text())-1);
			}
			if($target.hasClass("js_img_click")){
				if(checked == window.wxuploadimg.setting.MaxChecked){					
					var len = $(".img-preview img",window.wxuploadimg.current).length;
					$.scojs_message('最多可选'+(wxuploadimg.setting.MaxChecked-len)+'张!', $.scojs_message.TYPE_OK);
				}
				
				if(checked < window.wxuploadimg.setting.MaxChecked){
					$target.parent().addClass("img-selected");
					checked++;
					$("#wxuploadimg .js_checked").text(parseInt($("#wxuploadimg .js_checked").text())+1);
				}
			}
//			console.log($target);
				ev.preventDefault();
			if($target.hasClass("num")){
				pager.index = parseInt($target.text());
				queryImgList();
				ev.preventDefault();
			}else if($target.hasClass("next")){
				pager.index = pager.index+1;
				queryImgList();		
				ev.preventDefault();
			}else if($target.hasClass("prev")){
				pager.index = pager.index-1;		
				if(pager.index <0 ){
					pager.index = 0;
				}
				queryImgList();
				ev.preventDefault();
			}
			
			});
		}
		/**
		 * 向服务器请求数据
		 */
		function queryImgList() {
			var q = $("#wxuploadimg input[name='q']").val();
			$.ajax({
				type: "post",
				url: "<?php echo U('Admin/File/picturelist');?>?p="+wxuploadimg.pager.index,
				data: {
					q:q,
					size: wxuploadimg.pager.size
				},
				dataType: "json",
				beforeSend: function() {
					$("#wxuploadimg .imgs-container .loading").removeClass("hidden");
				}
			}).done(function(data) {
				if (data.status) {
					var info = data.info;
					var list = info.list;
					var show = info.show;
					appendImgList(list);
					$("#wxuploadimg .imgs-container .pager").html(show);
				}
			}).always(function() {
				$("#wxuploadimg .imgs-container .loading").addClass("hidden");
			});
		}
		
		function clearSelected(){			
			$("#wxuploadimg .img-item.img-selected").removeClass("img-selected");			
		}
		/**
		 * callback
		 * @param {Object} cont 触发模态框的选择器
		 * @param {Object} callback 选中图片后的触发器
		 */
		function init(setting){
//			console.log(hadBind);
			if(setting.callback){
				wxuploadimg.callBack = setting.callback;
			}
			wxuploadimg.setting = $.extend({},wxuploadimg.setting, setting);
			pager.size = setting.size || pager.size;
			//上传按钮点击处理
			$(".add",wxuploadimg.setting.cont).each(function(index,item){
				$(item).click(function(ev){
//					console.log(this);
					$ele = $(this);
//					if($ele.hasClass('add')){
						window.wxuploadimg.current =  $ele.parent();
						open($(window.wxuploadimg.current).attr("data-maxitems"));					
						clearSelected();
//					}
				});	
			});
			queryImgList();
			if(!hadBind){
				//使用此标志来防止 当调用多次init方法来初始化时，#wxuploadimg绑定了多次click监听器
				pagerClick();
				//选中图片
				$("#wxuploadimg .js_check_img").click(function(){
					
					window.wxuploadimg.setting.callback = wxuploadimg.setting.callback || callback;
					
					window.wxuploadimg.setting.callback.apply(this,$("#wxuploadimg .img-selected img"));
					
					if(checked == wxuploadimg.setting.MaxChecked){
						$(".add",window.wxuploadimg.current).hide();
					}
					$('#wxuploadimg').modal("hide");
					
				});
				// 预览图片
				$(".img-preview",window.wxuploadimg.current).click(function(ev){
					window.wxuploadimg.current = $(ev.target).parents(".wxuploaderimg");
					if($(ev.target).hasClass("js_delete")){
	//					console.log($(ev.target));
						$(ev.target,window.wxuploadimg.current).parents(".img-item").remove();
						var len = $(".img-preview img",window.wxuploadimg.current).length;
//						console.log($(".img-preview img",window.wxuploadimg.current));
//						console.log(len);
						//已全部选择
						if(len == 0){
							$(".img-preview",window.wxuploadimg.current).hide();
							$(window.wxuploadimg.current).removeClass("checked");
							$(".add",window.wxuploadimg.current).show();
						}
						
						//还剩余
						if(len < wxuploadimg.setting.MaxChecked){
							$(".add",window.wxuploadimg.current).show();
						}
						
					}
					ev.preventDefault();
					ev.stopPropagation();
				})
				
				//查找
				$(".js_search").click(function(){
					queryImgList();
				})
			}
			hadBind = true;
		}
		
		function open(maxchecked){
			checked = $(".img-preview img",wxuploadimg.current).length ;
			wxuploadimg.setting.MaxChecked = maxchecked || wxuploadimg.setting.MaxChecked;
			$("#wxuploadimg .js_checked").text(0);
			$("#wxuploadimg .js_total").text(wxuploadimg.setting.MaxChecked - checked);
			$('#wxuploadimg').modal("show");
		}
		function callback(){
			var data = arguments;
			for(var i=0;i<data.length;i++){
				var $ele = $('<div class="pull-left clearfix img-item"><div class="edit_pic_wrp"><a href="javascript:;" class="fa fa-lg fa-trash js_delete"></a></div></div>');
				$(".img-preview",wxuploadimg.current).append($ele).css("display","inline-block");//.show();
				$ele.prepend($(data[i]).clone());
				
			}
			
		}
		return {
			setting: {
				MaxChecked:1,//最多可选图片数
				size: 10, //每页图片数					
				callback:null //默认回调函数
			},
			current:null,
			pager: pager,
			appendImgList:appendImgList,
			pagerClick:pagerClick,
			queryImgList:queryImgList,
			init:init,
		};
		
	})();
	
		//上传图片
		/* 初始化上传插件  */
	$("#wxuploadimg #upload_picture").uploadify({
		'buttonClass': 'btn btn-primary btn-sm',
		"height": "30px",
		"swf": "/github/201506cafessite/Public/cdn/jquery-uploadify/3.2.1/uploadify.swf",
		"fileObjName": "wxshop", //wxshop
		"buttonText": "<i class='fa fa-upload'></i>本地上传",
		"uploader": "<?php echo U('Admin/File/uploadWxshopPicture',array('session_id'=>session_id()));?>",
		"width": 120,
		'removeTimeout': 1,
		'fileTypeExts': '*.jpg; *.png; *.gif;*.jpeg',
		"onUploadSuccess": uploadPicture
	});

	function uploadPicture(file, data) {
		var data = $.parseJSON(data);
		var src = '';
		if (data.status) {
			var imgsrc = data.imgurl;
			if(!imgsrc){
				imgsrc = '<?php echo C("SITE_URL");?>'+data.path;
			}
			$item = $("<div class='img-item '><img class='img-responsive  thumbnail js_img_click' src='" + imgsrc + "'/><p class='img-desc'>"+data.ori_name+"</p></div>");
			$(".imgs-list").prepend($item);
			
		} else {
			$.scojs_message(data.info, $.scojs_message.TYPE_OK);
		}
	}
	$(function(){			
		var init = '[autoinit]';
		if(init == 'true'){
			wxuploadimg.init({cont:".wxuploaderimg"});
		}
	})
</script>
		</div>
		<!-- END admin-main-content -->
	</div>
	<!-- END admin-main-->

		
	<script type="text/javascript">
		function getData(){
			var img = $(".wxuploaderimg img").attr("src");
			$("#qrcode_img").val(img);
		}
		$(function(){
			wxuploadimg.init({cont:".wxuploaderimg"});
			
		})
		 function createEncodingAESKey(){
        var encodingAESKey  = randomString();
        $("#encodingAESKey").val(encodingAESKey);
    }
    function randomString(len) {
　　len = len || 43;
　　var $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
　　var maxPos = $chars.length;
　　var pwd = '';
　　for (i = 0; i < len; i++) {
　　　　pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
　　}
　　return pwd;
}
		
	</script>

		<div class="admin-footer well text-center">
			<p><?php echo C('WEBSITE_OWNER');?> <a href="http://www.miitbeian.gov.cn"><?php echo C('WEBSITE_ICP');?></a></p>
			<p>&copy;2013-<?php echo date('Y');?> Version <?php echo C('APP_VERSION');?></p>
			<p>{__RUNTIME__}</p>
		</div>
		
	</body>

</html>