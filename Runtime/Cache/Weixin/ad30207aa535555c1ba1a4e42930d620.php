<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

	<head>
		<meta charset="utf-8">
		<title>微信测试</title>
		<meta name="viewport" content="target-densitydpi=device-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- 系统基本样式 -->
		<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/bootstrap/3.3.0/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="/github/201506cafessite/Public/cdn/fontawesome/4.3.0/css/font-awesome.min.css?V=4.3.0" />
		<!-- 脚本 -->
		<script type="text/javascript" src="/github/201506cafessite/Public/cdn/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="/github/201506cafessite/Public/cdn/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	</head>

	<body>
		<div class="container">
			<div>
				<form class="form form-horizontal">
					<input type="hidden" name="test" value="1"/>
					<!--<div class="form-group">
						<label for="token" class="col-md-2 col-lg-2 control-label">Token</label>
						<div class="col-lg-10 col-md-10">
							<input class="form-control" type="text" id="token" name="token" value="" />
						</div>
					</div>-->
					<!--<div class="form-group">
						<label for="url" class="col-md-2 col-lg-2 control-label">Token</label>
						<div class="col-lg-10 col-md-10">
							<input class="form-control" type="text" name="url" value="http://localhost/github/2015cjfx/index.php/Weixin/Connect/index/token/" />
						</div>
					</div>-->

					<div class="form-group">
						<label for="url" class="col-md-2 col-lg-2 control-label">消息类型MsgType</label>
						<div class="col-lg-10 col-md-10">
							<select name="msgtype" class="form-control">
								<option value="text">文本</option>
								<option value="event">事件</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="url" class="col-md-2 col-lg-2 control-label">Event事件</label>
						<div class="col-lg-10 col-md-10">
							<select name="event" class="form-control">
								<option value="">无</option>
								<option value="subscribe">首次关注</option>
								<option value="unsubscribe">取消关注</option>
								<option value="scan">扫描二维码</option>
								<option value="location">扫描二维码</option>
								<option value="click">菜单click</option>
								<option value="view">菜单链接</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="url" class="col-md-2 col-lg-2 control-label">发送关键词</label>
						<div class="col-lg-10 col-md-10">
							<input class="form-control" type="text" name="keyword" value="" />
						</div>
					</div>
					<div class="form-group">
						<label for="btns" class="col-md-2 col-lg-2 control-label">&nbsp;</label>
						<div class="col-lg-10 col-md-10">
							<button type="button" id="submit" class="btn btn-primary">提交</button>
						</div>
					</div>
				</form>
			</div>
			<div class="well col-lg-12 col-md-12">
				<pre><code id="result"></code></pre>
			</div>
		</div>
		<script type="text/javascript">
			Date.prototype.format = function(format){ 
					var o = { 
					"M+" : this.getMonth()+1, //month 
					"d+" : this.getDate(), //day 
					"h+" : this.getHours(), //hour 
					"m+" : this.getMinutes(), //minute 
					"s+" : this.getSeconds(), //second 
					"q+" : Math.floor((this.getMonth()+3)/3), //quarter 
					"S" : this.getMilliseconds() //millisecond 
					} 
					
					if(/(y+)/.test(format)) { 
					format = format.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
					} 
					
					for(var k in o) { 
					if(new RegExp("("+ k +")").test(format)) { 
					format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length)); 
					} 
					} 
					return format; 
					} 
			$(function(){
				
				$(window).keydown(function(e){ 
		            var curKey = e.which; 
		            if(curKey == 13){ 
		                $("#submit").click(); 
		                return false; 
		            } 
		        }); 
				
				$("#submit").click(function(){
					var query = $(".form").serialize();
					var url = "<?php echo U('Weixin/Connect/index');?>"+"?test=1&token=eotprkjn1426473619"
					$.post(url,query).done(function(data){
						
						$("#result").html($("#result").html()+"["+new Date().format("yyyy/MM/dd hh:mm:ss")+"]: "+data.toString()+"</br>");
						
					}).always(function(){});
					
					
				})
			})
		</script>
	</body>

</html>