<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Admin\Controller;

class BannersController extends  AdminController{
	
	public function index(){
		
		$position = getDatatree("BANNERS_POS_INDEX").','.getDatatree("MOBILE_BANNERS_POS_INDEX");
		
		$page = array('curpage' => I('get.p', 0), 'size' => C('LIST_ROWS'));
		//
		$result = apiCall('BoyeBase/Banners/queryWithPosition', array($position, $page, $params));
		//
		if ($result['status']) {
			$this -> assign('show', $result['info']['show']);
			$this -> assign('list', $result['info']['list']);
			$this -> display();
		} else {
			LogRecord('INFO:' . $result['info'], '[FILE] ' . __FILE__ . ' [LINE] ' . __LINE__);
			$this -> error(L('UNKNOWN_ERR'));
		}
	}
	
	public function add(){
		if(IS_GET){
			
			$this->display();
		}else{
			$title = I('post.title','');
//			$url = 
			$notes = I('post.notes','');
			$sort  = I('post.sort',0);
			
			$position = I('post.position',getDatatree("BANNERS_POS_INDEX"));
			if(empty($position)){
				$this->error("配置错误！");
			}
			
			$entity = array(
				'uid'=>UID,
				'position'=>$position,
				'storeid'=>-1,
				'title'=>$title,
				'notes'=>$notes,
				'img'=>I('img',''),
				'url'=>I('url',''),
				'starttime'=>0,
				'endtime'=>0,
				'noticetime'=>0,
				'sort'=>$sort,
			);
		
			
			$result = apiCall("BoyeBase/Banners/add", array($entity));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("保存成功！",U('Admin/Banners/index'));
			
		}
	}
	
	
	public function edit(){
		$id = I('id',0);
		if(IS_GET){
			$result = apiCall("BoyeBase/Banners/getInfo", array(array('id'=>$id)));
			if(!$result['status']){
				$this->error($result['info']);
			}
			$this->assign("vo",$result['info']);
			$this->display();
		}else{
			$title = I('post.title','');
//			$url = 
			$notes = I('post.notes','');
			$position = I('post.position',getDatatree("BANNERS_POS_INDEX"));
			if(empty($position)){
				$this->error("配置错误！");
			}
			$entity = array(
				'title'=>$title,
				'notes'=>$notes,
				'position'=>$position,
				'img'=>I('post.img',''),
				'url'=>I('post.url',''),
			);
		
			
			$result = apiCall("BoyeBase/Banners/saveByID", array($id,$entity));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("保存成功！",U('Admin/Banners/index'));
			
		}
	}
		
	
	
	
}
