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
	
<<<<<<< HEAD
	
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
=======
	public function yscl(){
		$this->display();
	}
	public function map(){
		$this->display();
	}
	public function quality(){
		$this->display();
	}
//	private $allow_domain = array(
//		"localhost",
//		"127.0.0.1",
//		"192.168.0.102",
//		"20150505.itboye.com",
//	);
//	
//	/**
//	 * 跨域资源访问控制
//	 */
//	public function asset(){
//		$referer = I('server.HTTP_REFERER','');
//		//TODO: 判断path不能以.或/开头
//		$path = I("get.path",'');
//		//TODO: 去数据库中查询$referer 是否被允许访问
////		dump($referer);
//		$str = preg_replace("/http:\/\/|https:\/\//u","",$referer);  //去掉http://
////		dump($str);
//		$strdomain = explode("/",$str);               // 以“/”分开成数组
//		$domain    = $strdomain[0];
////		dump($domain);
//		if(!in_array($domain, $this->allow_domain)){
//			echo "NOT ALLOWED!";
//			exit();
//		}
//		
//		header("Access-Control-Allow-Origin:".$domain);
////		Storage::read("./Public/".$path);
//		$asset = Storage::read("./Public/".$path);
//		echo $asset;
//		exit();
//	}
	
//	
//	/**
//	 * 注销/退出系统
//	 */
//	public function logout(){
//		session('[destroy]');
//		$this->success("退出成功!",U("Home/Index/index"));
//	}
//	
//	/**
//	 * 登录地址
//	 */
//	public function login(){
//		if(IS_GET){
//			$this->theme($this->theme)->display();
//		}else{
//			//检测用户
//			$verify = I('post.verify', '', 'trim');
//			if (!$this -> check_verify($verify, 1)) {
//				$this -> error("验证码错误!");
//			}
//			
//			$username = I('post.username', '', 'trim');
//			$password = I('post.password', '', 'trim');
//			
//			$result = apiCall('Uclient/User/login', array('username' => $username, 'password' => $password));
////			dump($result);
//			//调用成功
//			if ($result['status']) {
//				$uid = $result['info'];
//				$userinfo = array();
//				$result = apiCall('Uclient/User/getInfo', array($uid));
//				
//				if ($result['status'] && is_array($result['info'])) {
//					
//					$this->setUserinfo($result['info']);
//					
//					
//					$this -> success("登录成功！", U('Home/TestSys/index'));
//
//				} else {
//					LogRecord($result['info'], __FILE__.__LINE__);
//					$this -> error("登录失败!");
//				}
//
//			} else {
//				$this -> error($result['info']);
//			}
//		}
//	}
//	
//  public function index(){
//  	$map = array('parentid'=>getDatatree("POST_CATEGORY"));
//		$cates = apiCall("Home/Datatree/queryNoPaging",array($map));
//		if(!$cates['status']){
//			$this->error($cates['info']);
//		}
//		$com=M('Post');
//		$list = $com->select();
//		$this->assign('list',$list);
//		$user=M('member','common_');
//		$users=$user->select();		
//		
//		$this->assign("users",$users);
//		$this->assign("cates",$cates['info']);
//		$this->display();
//	} 
>>>>>>> branch 'master' of git@github.com:h136799711/201506cafessite.git

			
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

