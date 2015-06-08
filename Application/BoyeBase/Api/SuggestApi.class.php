<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------


namespace BoyeBase\Api;

use Common\Api\Api;
use BoyeBase\Model\SuggestModel;

class SuggestApi extends Api{
	protected function _init(){
		$this->model = new SuggestModel();
	}
}
