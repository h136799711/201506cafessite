<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Admin\Controller;

/**
 * 站点信息
 */

 class SiteController extends AdminController{
	
	protected function _initialize(){
		parent::_initialize();
	}
	
	public function index(){
		
		$this->display();
	}
	
}