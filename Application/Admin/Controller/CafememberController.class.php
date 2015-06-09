<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------


namespace Admin\Controller;

class CafememberController extends AdminController{
	
	protected function _initialize(){
		parent::_initialize();
	}
	
	public function index(){
		
		$name = I('name','');
		$code = I('cafe_club_code','');
		
		
		$map = array();		
		$params = array();
		if(!empty($name)){
			$map['name'] = array('like','%'.$name.'%');
			$params['name'] = $name;
		}
		
		if(!empty($code)){
			$map['cafe_club_code'] = array('like','%'.$code.'%');
			$params['cafe_club_code'] = $code;
		}
		
		$page = array('curpage'=>I('get.p',0),'size'=>20);
		$order = " create_time desc ";
		$result = apiCall("Admin/Cafemember/query", array($map,$page,$order,$params));
		
		if(!$result['status']){
			$this->error($result['info']);
		}
		
		$this->assign("code",$code);
		$this->assign("name",$name);
		$this->assign("list",$result['info']['list']);
		$this->assign("show",$result['info']['show']);
		$this->display();
	}
	
	public function delete(){
		$id = I("get.id",0);
		$map = array();
		$map['id'] = $id;
		$result = apiCall("Admin/Cafemember/delete", array($map));
		
		if(!$result['status']){
			$this->error($result['info']);
		}
		
		$this->success("删除成功!");
	}
	
	public function edit(){
		$id = I('get.id',0);
		if(IS_GET){
			
			$result = apiCall("Admin/Cafemember/getInfo", array(array("id"=>$id)));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->assign("vo",$result['info']);
			$this->display();
		}else{
			
			$entity['has_milk_frother'] = I('post.has_milk_frother',0);
			$entity['birthday'] = I('post.birthday',0,'strtotime');
			
			$entity['cafe_club_code'] = I('post.cafe_club_code','');
			$entity['post_code'] = I('post.post_code','');
			$entity['sex'] = I('post.sex',0);
			$entity['email'] = I('post.email','');
			$entity['phone'] = I('post.phone','');
			$entity['openid'] = I('post.openid','');
			$entity['name'] = I('post.name','');
			$entity['address2'] = I('post.address2','');
			$entity['address1'] = I('post.address1','');
			$entity['city'] = I('post.city','');
			$entity['district'] = I('post.district','');
			$entity['province'] = I('post.province','');
			$entity['country'] = I('post.country','');
			$entity['wish_color'] = I('post.wish_color','');
			$entity['machine_type'] = I('post.machine_type',0);
			$entity['color'] = I('post.color','');
			

			$result = apiCall("Admin/Cafemember/saveByID", array($id,$entity));
	
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("更新成功!",U('Admin/Cafemember/index'));
		}
	}
	
	public function add(){
		if(IS_GET){
			
			$this->display();
		}else{
			
			$entity = array(
				
				'reg_ip'=> ip2long(get_client_ip()),
				'openid'=>'',
			);
			
			$entity['has_milk_frother'] = I('post.has_milk_frother',0);
			$entity['birthday'] = I('post.birthday',0,'strtotime');
			
			$entity['cafe_club_code'] = I('post.cafe_club_code','');
			$entity['post_code'] = I('post.post_code','');
			$entity['sex'] = I('post.sex',0);
			$entity['email'] = I('post.email','');
			$entity['phone'] = I('post.phone','');
			$entity['openid'] = I('post.openid','');
			$entity['name'] = I('post.name','');
			$entity['address2'] = I('post.address2','');
			$entity['address1'] = I('post.address1','');
			$entity['city'] = I('post.city','');
			$entity['district'] = I('post.district','');
			$entity['province'] = I('post.province','');
			$entity['country'] = I('post.country','');
			$entity['wish_color'] = I('post.wish_color','');
			$entity['machine_type'] = I('post.machine_type',0);
			$entity['color'] = I('post.color','');
			

			$result = apiCall("Admin/Cafemember/add", array($entity));
	
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("添加成功!",U('Admin/Cafemember/index'));
			
		}
		
	}
	
}
