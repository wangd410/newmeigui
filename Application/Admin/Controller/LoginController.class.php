<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Event\LoginEvent;

class LoginController extends Controller
{	
	
	public function index()
	{
		$this->display(login);
	}
	
	public function checkLogin() //检查登陆
	{
		$data = I('post.');
		$Admin = D('Admin');
		$result = $Admin->checkInfo($data);
		$event = new LoginEvent();
		$event->go($result);
	}
	
	public function quit () //退出登录
	{
		$event = new LoginEvent();
		$event->quit();
	}
}