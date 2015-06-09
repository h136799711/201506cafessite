<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Home\Controller;
use Think\Controller;
use Think\Storage;
/*
 * 官网首页
 */
class IndexController extends HomeController {
	
	
	
	public function index(){
		
		$where['post_category'] = getDatatree("NEWS_NOTICE");
		
		$list = D('Post')-> where($where)->order('id desc')->limit(3)->select();
		
		$this->assign('list',$list);
		$position = getDatatree("BANNERS_POS_INDEX");
		$page = array("curpage"=>0,'size'=>5);
		$order= " sort desc ";
		$banners = apiCall("BoyeBase/Banners/queryWithPosition", array($position,$page,$order));
		
		if(!$banners['status']){
			$this->error($banners['info']);
		}
		
		$this->assign("banners",$banners['info']);
		$this->theme($this->theme)->display();
	}
	
	public function distributor(){
		
		$this->theme($this->theme)->display();
	}
	
	/**
	 * 商品
	 */
	public function products(){
		//获取产品类型
		$map = array();
		
		$map['parentid'] = getDatatree("PRODUCT_CATE");
		
		$type_list = apiCall("Admin/Datatree/queryNoPaging", array($map,"sort desc"));
		
		if(!$type_list['status']){
			$this->error($type_list['info']);
		}
		
		$this->assign("type_list",$type_list['info']);
		$all_type = array();
		
		foreach($type_list['info'] as $vo){
			array_push($all_type,$vo['id']);
		}
		
		//获取产品列表
		$type =  I('get.type',-1);
		$map = array();
		$params = array();
		
		if($type === -1){
			$map['post_category'] = array('in',$all_type);
		}else{
			$map['post_category'] = $type;
			$params['type'] = $type;
		}
		$order=  " post_date desc ";
		$page = array('curpage'=>I('get.p',0),'size'=>9);
		$result = apiCall("Admin/Post/query", array($map,$page,$order,$params));	
		
		if(!$result['status']){
			$this->error($result['info']);
		}
		$this->assign("type",$type);
		$this->assign("list",$result['info']['list']);
		$this->assign("show",$result['info']['show']);
		$this->theme($this->theme)->display();
	}
	
	
	public function details(){
		$id=I('get.id');
		$where["id"] = $id;
		
		$result = apiCall("Admin/Post/getInfo",array($where));
		if(!$result['status']){
			$this->error($result['info']);
		}
		
		$this->assign("entity",$result['info']);
		$map = array();
		
		$map['post_category'] = $result['info']['post_category'];
		$map['id'] = array("neq",$id);
		$order=  " rand()  ";
		$page = array('curpage'=>0,'size'=>3);
		$result = apiCall("Admin/Post/query", array($map,$page,$order));	
		
		if(!$result['status']){
			$this->error($result['info']);
		}
		$this->assign("goods",$result['info']['list']);
		$this->theme($this->theme)->display();
	}
	
	
	public function cafenews_view(){
		$id = I("get.id",0);
		
		$result = apiCall("Admin/Post/getInfo", array(array("id"=>$id)));
		
		if(!$result['status']){
			$this->error($result['info']);
		}

		$this->assign("vo",$result['info']);
		$this->theme($this->theme)->display();
	}
	
	public function aboutus(){
		$this->assign("meta_title","关于我们");
		$this->theme($this->theme)->display();
	}
	
	public function news(){
		$title = I('post.title','');
		$this->assign("meta_title","企业新闻");
		$map = array(
			'post_category'=>getDatatree("NEWS_NOTICE"),
		);
		if(!empty($title)){
			$map['post_title'] = array("like",'%'.$title.'%');
			$param['title'] = $title;
		}
		$order = "post_date desc";
		$page = array("curpage"=>I('get.p',0),'size'=>10);
		$result = apiCall("Admin/Post/query", array($map,$page,$order,$param));
		
		if(!$result['status']){
			$this->error($result['info']);
		}
		
		$this->assign('title',$title);
		$this->assign('list',$result['info']['list']);
		$this->assign('show',$result['info']['show']);
		$this->theme($this->theme)->display();
	}
	
	
	public function faqs(){
		$this->assign("meta_title","常见问题解答");
		$this->theme($this->theme)->display();
	}
	
	
	public function contact(){
		if(IS_GET){
			$this->assign("meta_title","联系我们");
			$this->theme($this->theme)->display();
		}else{
			
			$formcontact = I("post.formcontact","");
			$entity = array(
				'email'=>$formcontact['email'],
				'IP'=> ip2long(get_client_ip()),
				'name'=>$formcontact['surname'],
				'text'=>$formcontact['comments'],
				'tel'=>$formcontact['phone'],
				'create_time'=>time(),
				
			);
	
			$result = apiCall("BoyeBase/Suggest/add",array($entity));
			
			if(!$result['status']){
				
				$this->error($result['info']);
			}
			
			$this->success("成功提交信息!");
			
		}
	}
	
	/**
	 * 咖啡机会员登记
	 */
	public function cafemember(){
		if(IS_GET){
			$this->assign("meta_title","会员登记");
			$this->theme($this->theme)->display();
		}else{

			
			$formcontact = I("post.formcontact","");
			
			$entity = array(
				
				
				'reg_ip'=> ip2long(get_client_ip()),
				'openid'=>'',
				
			);
			
			foreach($formcontact as $key=>$value){
			
					$entity[$key] =$value;
				
			}
			
			
			
			$result = apiCall("Admin/Cafemember/add",array($entity));
			
			if(!$result['status']){
				
				$this->error($result['info']);
			}
			
			$this->success("成功提交信息!");
			
		}
	}
	
}

