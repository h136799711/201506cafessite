<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------


namespace BoyeBase\Api;

use Common\Api\Api;
use BoyeBase\Model\BannersModel;
	
class BannersApi extends Api{
	protected function _init(){
		$this->model = new BannersModel();
	}
	
	/**
	 * 查询
	 */
	public function queryWithPosition($position, $page = array('curpage'=>0,'size'=>10), $order = false, $params = false){
		
		$map = array("b.position"=>$position);
		
		$field = 'b.id,dt.name as position_name,b.url,b.noticetime,b.endtime,b.starttime,b.title,b.createtime,b.storeid,b.img,b.position,b.notes';
		
		$query = $this->model->alias("as b")->field($field)->join('LEFT JOIN common_datatree  dt ON dt.id = b.position')->where($map)->order("b.createtime desc")-> page($page['curpage'] . ',' . $page['size'])-> select();
		
		
		$list = $query ;
		
		if ($list === false) {
			$error = $this -> model -> getDbError();
			return $this -> apiReturnErr($error);
		}
		
		$count = $this -> model->alias("as b")-> where($map) -> count();
		// 查询满足要求的总记录数
		$Page = new \Think\Page($count, $page['size']);

		//分页跳转的时候保证查询条件
		if ($params !== false) {
			foreach ($params as $key => $val) {
				$Page -> parameter[$key] = urlencode($val);
			}
		}

		// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page -> show();

		return $this -> apiReturnSuc(array("show" => $show, "list" => $list));
	}
}
