<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Admin\Controller;

class PostController extends  AdminController{
	
	public function index(){
		$name = I('name','');
		$cate_list = apiCall("Admin/Datatree/queryNoPaging", array(array("parentid"=>getDatatree("POST_CATEGORY"))));
		if(!$cate_list['status']){
			$this->error($cate_list['info']);
		}
		if(is_null($cate_list['info'])){
			$this->error("请先添加相关产品分类!",U("Admin/Datatree/index"));
		}
		
		$map = array();
		$cate_ids = array();
		foreach($cate_list['info'] as $vo){
			array_push($cate_ids,$vo['id']);
		}
		
		$map['post_category'] = array('in',$cate_ids);
		
		$map = array();
		
		if(!empty($name)){
			//分页时带参数get参数
			$params = array(
				'name'=>$name,
			);
			
			$map['name'] = array('like','%'.$name.'%');
			
		}
		
		
		$page = array('curpage' => I('get.p', 0), 'size' => C('LIST_ROWS'));
		$order = " post_modified desc ";
		//
		$result = apiCall('Admin/Post/query',array($map,$page,$order,$params));
		//
		if($result['status']){
			$this->assign('startdatetime',$startdatetime);
			$this->assign('enddatetime',$enddatetime);
			$this->assign('show',$result['info']['show']);
			$this->assign('list',$result['info']['list']);
			$this->display();
		}else{
			LogRecord('INFO:'.$result['info'],'[FILE] '.__FILE__.' [LINE] '.__LINE__);
			$this->error(L('UNKNOWN_ERR'));
		}
	}
	
	
	public function add(){
		if(IS_GET){
			
			$this->display();
		}else{
			$post_category = I('post.post_category',20);

			$entity = array(
				'main_img'=>I('post.main_img',''),
				'post_category'=>$post_category,
				'post_content'=>I('post_content',''),
				'post_excerpt'=>I('post_excerpt',''),
				'post_title'=>I('post_title',''),
				'post_author'=>UID,
				'post_status'=>I('post_status','draft'),
				'comment_status'=>I('commen_status','closed'),
				'post_parent'=>0,
				'post_type'=>'post_type',
				'comment_count'=>0
			);
			
			$result = apiCall("Admin/Post/add", array($entity));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("操作成功！",U('Admin/Post/index'));
			
		}
	}
	
	public function edit(){
		$id = I('id',0);
		if(IS_GET){
			$result = apiCall("Admin/Post/getInfo", array(array("id"=>$id)));
			if(!$result['info']){
				$this->error($result['info']);
			}
			$this->assign("vo",$result['info']);
			$this->display();
		}else{
			$post_category = I('post.post_category',20);
			
			$entity = array(
				'main_img'=>I('post.main_img',''),
				'post_category'=>$post_category,
				'post_content'=>I('post_content',''),
				'post_excerpt'=>I('post_excerpt',''),
				'post_title'=>I('post_title',''),
				'post_status'=>I('post_status','draft'),
				'comment_status'=>I('commen_status','closed'),
			);
			$result = apiCall("Admin/Post/saveByID", array($id,$entity));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("保存成功！",U('Admin/Post/index'));
			
		}
	}
	
	public function delete(){
		$id = I('id',0);
		
		$result = apiCall("Admin/Post/delete", array(array("id"=>$id)));
		
		if(!$result['status']){
			$this->error($result['info']);
		}
		
		$this->success("删除成功！");
	
	}
	
}
