<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------

defined("BOYE_SYS_NAME") or die("未定义");
/**
 * 若程序中使用到Datatree表中数据则都需要在此填写相关信息，并调用getDatatree('POST_CATEGORY')方法来获取值
 * 不要直接用21，23等ID数
 */
 
 return array(
	'DATATREE'=>array(		
		'POST_CATEGORY'=>21, //文章分类
		'TEST_TABLE_TYPES'=>23,//量表类型
		'TEST_TABLE_APPLICABLE'=>26,//适用群体、人群。
		'TEST_TABLE_CATE'=>197,
		'NEWS'=>30,//新闻类型文章
		'NEWS_NOTICE'=>22,//新闻通知公告
		'PRODUCT_CATE'=>31,//产品分类
		'BANNERS_POS_INDEX'=>38,//banners首页大图
		'MOBILE_BANNERS_POS_INDEX'=>50,//移动端banners首页大图
        'SHOP_BRANCH'=>47, //购买店铺来源——分店
	)
);
