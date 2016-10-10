<?php
namespace Admin\Controller;

use Think\Controller;

class AdminController extends Controller
{
	
	public function __construct ()  //构造方法初始化
	{
        parent::__construct();
        if (!session('?login')&&!session('?type')) {
            showMessage('请登录~',__MODULE__.'/login/index');
		}
	}
	
    public function index() //获取管理员名单
    {
       if (session('type')&&session('type')=='超级管理员') 
       {
       	$admin = D('Admin');
       	$adminInfo = $admin->getAdmin();
       	$empty = "<p style='color:red;font-size: strong 20 px; '>暂时没有管理员信息</p>";
       	$this->assign('empty',$empty);
       	$this->assign('adminInfo',$adminInfo);
       	$this->display(adminList);
       } else 
       {
       	 showMessage('您没有该权限','Index/error');

       }
    }
    
    public function adminAdd ()//新增管理员信息页面
    {
    	$this->display(adminAdd);
    }
    
    public function updatePass () //修改密码页面
    {
    	$this->display(updatePass);
    }
    
    public function updateS () //禁用或启用管理员权限
    { 
    	$data = I('get.');
    	$state = changeState($data['type']);
    	$admin = D('Admin');
    	$flag = $admin->updateState($state,$data['id']);
    	if (flag) 
    	{
    		showMessage('操作成功');
    	} else 
    	{
    		showMessage('操作失败');
    	}
    }
    
    public function deleteA () //删除管理员信息
    {
    	$id = I('get.id');
    	$admin = D('Admin');
    	$flag = $admin->deleteAdmin($id);
    	if ($flag)
    	{
    		showMessage('删除成功');
    	} else 
    	{
    		showMessage('删除失败');
    	}
    }
    
    
    public function addA () //新增管理员操作
    {
    	$admin = D('Admin');
    	$data = $admin->create();
    	$flag = $admin->addAdmin($data);
    	if ($flag==1) 
    	{
    		showMessage('添加成功','admin');
    	}else if ($flag==0)
    	{
    		showMessage('用户名已经存在');
    	} else 
    	{
    		showMessage('用户名或密码为空');
    	} 
    }
    
    public function updateP ()//修改管理员密码
    {	
    	$data = I('post.');
    	$admin = D('Admin');
    	if($admin->checkPwd($data['oldPass'])==1)
    	{	
    		if($data['newPass']==$data['confirm'])
    		{
    			if($admin->updatePass($data['newPass']))
    				showMessage('密码修改成功');
    		} else 
    		{
    			showMessage('两次密码输入不一致');
    		}
    	} else 
    	{
    		showMessage('原始密码错误');
    	}
    }
    
    public function _empty() 
    {
    	showMessage('空操作','index/error');
    }
}